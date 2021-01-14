<?php
require_once MODELOS.'conexion.php';
 /// PROCESOS SQL CON CONEXION PDO
// version 1.1 
class Web {

//CONSULTAS DE 2 A MAS REGISTROS COMO RESULTADO
		static public function consultas($tabla,$where='',$select='*'){

			
				$stmt = Conexion::conectar()->prepare(" SELECT $select FROM $tabla WHERE 1=1 $where ");

				$stmt -> execute();

				return $stmt -> fetchAll();


				$stmt -> close();
				
				$stmt = null;
			
			}

		//CONSULTA DE 1 REGISTRO COMO RESULTADO
		static public function consulta($tabla, $where='' , $select='*'){
	 
			
				$stmt = Conexion::conectar()->prepare("SELECT $select FROM $tabla WHERE 1=1 $where ");

				$stmt -> execute();

				return $stmt -> fetch();


			$stmt -> close();
			
			$stmt = null;
		
			}

		//
		static public function ultimo_id($tabla){
				$stmt = Conexion::conectar()->prepare(" SELECT max(id) id FROM $tabla limit 1");

				$stmt -> execute();

				return $stmt -> fetch();


			$stmt -> close();
			
			$stmt = null;
		
		}


	//FUNCION PARA ELIMINAR IMAGEN DANDO POR EL PARAMETRO CARPETA=RUTA Y IMAGEN
	static public function borrar_img($img){
		if (file_exists($img)){
                   		unlink($img);
         }

	}


	//FUNCION PARA ELIMINAR REGISTRO DANDO POR EL PARAMETRO TABLA Y ID VALOR Y ID POR CUAL SERA ELIMINADO 
	static public function eliminar($tabla,$id=0,$ids='id'){
			
		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $ids = :id");
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
				return 1;
			}else{
				return 0;
			}

			$stmt-> close();
			$stmt = null;
	}

	
	//DESABILITAR ESTADO
	static public function deshabilitar($tabla,$id=0,$num=0,$ids='id'){
		
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET estado = :num WHERE $ids = :id");
		$stmt -> bindParam(":num", $num, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){
				return 1;
			}else{
				return 0;
			}

			$stmt-> close();
			$stmt = null;		
		}

	//DESABILITAR ESTADO
	static public function habilitar($tabla,$id=0,$num=1,$ids='id'){
		
		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET estado = :num WHERE $ids = :id");
		$stmt -> bindParam(":num", $num, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		
		if($stmt -> execute()){
				return 1;
			}else{
				return 0;
			}

			$stmt-> close();
			$stmt = null;	
		}

 
	//ACTUALIZAR REGISTRO
	static public function actualizar($tabla,$data,$id,$ids='id'){
	$ex_campos_tag = '';
	$ex_etiquetas_tag = '';
	$sql = "UPDATE ".$tabla." SET ";
		$i=0;
		foreach($data as $key=>$value):
			if($key==$ex_campos_tag){}elseif($ex_campos_tag=='todo'){}else{$ex_etiquetas_tag=='';}

			if($i==0){
				$sql .= '`'.$key."` = '".addslashes(htmlspecialchars(strip_tags(trim($value),$ex_etiquetas_tag)))."'";
			}else{
				$sql .= ' ,`'.$key."` = '".addslashes(htmlspecialchars(strip_tags(trim($value),$ex_etiquetas_tag)))."'";
			}
			$i++;
		endforeach;
		
		$sql.= ' WHERE '.$ids.'=:id';

		$stmt = Conexion::conectar()->prepare($sql);
		$stmt -> bindParam(":id",$id, PDO::PARAM_STR);

		if($stmt -> execute()){			
			return 1;
		}else{
			return 0;
		}

		$stmt-> close();

		$stmt = null;

	}

	//GUARDAR REGISTRO
	static public function guardar($tabla,$data){
		$ex_campos_tag = '';
		$ex_etiquetas_tag = '';

		$sql = "INSERT INTO ".$tabla." (";
			$i=0;
			foreach($data as $key=>$value)://llenamos el string de los campos que se usaron
				if($i==0){
					$sql .= '`'.$key."`";
				}else{
					$sql .= ' ,`'.$key."`";
				}
					$i++;
			endforeach;
			$sql.= ") VALUES (";
			$i=0;
			foreach($data as $key=>$value)://llenamos el string de los valores que tomaran los campos
				if($key==$ex_campos_tag){}else if($ex_campos_tag=='todo'){}else{$ex_etiquetas_tag=='';}
				if($i==0){
				$sql .= "'".addslashes(htmlspecialchars(strip_tags(trim($value),$ex_etiquetas_tag)))."'";
				}else{
					$sql .= " ,'".addslashes(htmlspecialchars(strip_tags(trim($value),$ex_etiquetas_tag)))."'";

				}
				$i++;
			endforeach;
			$sql.= ")";

			$stmt = Conexion::conectar()->prepare($sql);
		if($stmt -> execute()){
					return 1;
				}else{
					return 0;
				}

			$stmt-> close();

			$stmt = null;
	}




	/*=============================================
	SUBIR MULTIMEDIA
	=============================================*/

	static public function SubirMultimedia($datos, $ruta){
		$rutaImg=null;
		if(isset($datos["tmp_name"]) && !empty($datos["tmp_name"])){

			/*=============================================
			DEFINIMOS LAS MEDIDAS
			=============================================*/

			list($ancho, $alto) = getimagesize($datos["tmp_name"]);	

			$nuevoAncho = 1500;
			$nuevoAlto = 1200;

			/*=============================================
			CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DE LA MULTIMEDIA
			=============================================*/

			$directorio = "../img/multimedia/".$ruta;

			/*=============================================
			PRIMERO PREGUNTAMOS SI EXISTE UN DIRECTORIO DE MULTIMEDIA CON ESTA RUTA
			=============================================*/

			if (!file_exists($directorio)){

				mkdir($directorio, 0755);
			
			}

			/*=============================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
			=============================================*/

			if($datos["type"] == "image/jpeg"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$rutaMultimedia = $directorio."/".$datos["name"];
				$rutaImg=$ruta.'/'.$datos["name"];
				$origen = imagecreatefromjpeg($datos["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $rutaMultimedia);

			}

			if($datos["type"] == "image/png"){

				/*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
				=============================================*/

				$rutaMultimedia = $directorio."/".$datos["name"];
				$rutaImg=$ruta.'/'.$datos["name"];
				$origen = imagecreatefrompng($datos["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagealphablending($destino, FALSE);
		
				imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $rutaMultimedia);

			}

			return $rutaImg;	

		}

	}


	//GUARDAR IMG PERFIL
	static public function GuardarImg($carpeta,$foto,$nuevoAncho = 500,$nuevoAlto = 500){
		error_reporting(0);
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/
				$ruta = "";
				$rutaimg = "";

				

				
				if(isset($foto["tmp_name"]) && !empty($foto["tmp_name"])){

					list($ancho, $alto) = getimagesize($foto["tmp_name"]);

					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($foto["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);
						$ruta = $carpeta.DS.$aleatorio.".jpg";
						$rutaimg=$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($foto["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($foto["type"] == "image/png"){
						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/						
						$aleatorio = mt_rand(100,999);
						$ruta =$carpeta.DS.$aleatorio.".png";

						$rutaimg=$aleatorio.".png";

						$origen = imagecreatefrompng($foto["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

				
					}

				}


	return $rutaimg;			

	}

	//GUARDAR IMG BANNER
	static public function GuardarImgBanner($carpeta,$foto,$rutabanner,$fotoantigua = '',$nuevoAncho = 2400,$nuevoAlto = 354){
		error_reporting(0);
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/
				$ruta = "";
				$rutaimg = "";

				if($fotoantigua!=''){
					$ruta = "../img/".$carpeta.DS.$fotoantigua;
									
					$rutaimg = $fotoantigua;
				}else{

					$ruta = "";
					$rutaimg = "";
				}
				


				if(isset($foto["tmp_name"]) && !empty($foto["tmp_name"])){

					list($ancho, $alto) = getimagesize($foto["tmp_name"]);

					
					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($fotoantigua)){
						unlink("../img/".$carpeta.DS.$fotoantigua);
					}

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($foto["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$ruta = "../img/".$carpeta.DS.$rutabanner.".jpg";
						$rutaimg=$rutabanner.".jpg";
						$origen = imagecreatefromjpeg($foto["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($foto["type"] == "image/png"){
						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/						
						$ruta = "../img/".$carpeta.DS.$rutabanner.".png";

						$rutaimg=$rutabanner.".png";

						$origen = imagecreatefrompng($foto["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

				
					}

				}
	

	return $rutaimg;			

	}

   /*=============================================
	ACTUALIZAR LOGO O ICONO
	=============================================*/
	static public function LogoIcono($item,$foto,$fotoantiguo){
	 error_reporting(0);
		/*=============================================
		CAMBIANDO LOGOTIPO O ICONO
		=============================================*/	
		$img='';
		if(isset($foto["tmp_name"])){

			list($ancho, $alto) = getimagesize($foto["tmp_name"]);

			/*=============================================
			CAMBIANDO LOGOTIPO
			=============================================*/
			if($item == "logo"){

				unlink("../img/".$fotoantiguo);

				$nuevoAncho = 500;
				$nuevoAlto = 100;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if($foto["type"] == "image/jpeg"){

					$ruta = "../img/logo.jpg";
					$img = 'logo.jpg';
					$origen = imagecreatefromjpeg($foto["tmp_name"]);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if($foto["type"] == "image/png"){

					$ruta = "../img/logo.png";
					$img = 'logo.png';
					$origen = imagecreatefrompng($foto["tmp_name"]);

					imagealphablending($destino, FALSE);

					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			}

			/*=============================================
			CAMBIANDO ICONO
			=============================================*/	
			if($item == "icono"){

				unlink("../img/".$fotoantiguo);

				$nuevoAncho = 100;
				$nuevoAlto = 100;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if($foto["type"] == "image/jpeg"){

					$ruta = "../img/icono.jpg";
					$img = 'icono.jpg';
					$origen = imagecreatefromjpeg($foto["tmp_name"]);					

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);
			
				}

				if($foto["type"] == "image/png"){

					$ruta = "../img/icono.png";
					$img = 'icono.png';
					$origen = imagecreatefrompng($foto["tmp_name"]);

					imagealphablending($destino, FALSE);
        			 
        			imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
			
				}

			}

		}

		return $img;

	}


	static public function P_IMG($rutadefaul,$carpeta,$datos,$rutap,$nuevoAncho,$nuevoAlto){
				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$ruta = $rutadefaul;
				if(isset($datos["tmp_name"]) && !empty($datos["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/
					list($ancho, $alto) = getimagesize($datos["tmp_name"]);	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($datos["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
						$rutaDestino = "../img/".$carpeta.$rutap.".jpg";
						$ruta=$rutap.".jpg";
						$origen = imagecreatefromjpeg($datos["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaDestino);

					}

					if($datos["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
						$rutadestino = "../img/".$carpeta.$rutap.".png";
						$ruta=$rutap.".png";
						$origen = imagecreatefrompng($datos["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
				
						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutadestino);

					}

				}
			return 	$ruta;	

		}




		static public function subir_documentos($file,$carpeta){

				$d=mt_rand(9000,10200);  
				$url=$d.$file['name'];
				$ruta = $carpeta.'/'.$url;
				if(move_uploaded_file($file['tmp_name'], $ruta))
				{
				  return $url;
				}
				else
				{
				  return '';
				}
		}
	
		static public function eliminar_documentos($carpeta,$file){
				if ($file!='') {
					if (file_exists($carpeta.DS.$file)){
                   		unlink($carpeta.DS.$file);
         			}
				}
				

		}

		static public function paginacion($total_pages,$page){
				
				if($total_pages > 4 ){


                            /*=============================================
                            LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
                            =============================================*/

                            if($page == 1){

           	 echo '<ul class="pagination pagination-lg justify-content-center">';
                                
                                for($i = 1; $i <= 4; $i ++){

            echo '<li class="page-item" id="item'.$i.'" ><a class="page-link " href="javascript:void(0)" onclick="listcurso('.$i.')" >'.$i.'</a></li>';

                                }

       echo ' <li class="disabled page-item"><a class="page-link">...</a></li>
             <li class="page-item" id="item'.$total_pages.'" ><a class="page-link" href="javascript:void(0)" onclick="listcurso('.$total_pages.')" >'.$total_pages.'</a></li>
           	 <li class="page-item" ><a onclick="listcurso(2)" href="javascript:void(0)" class="page-link" >Siguiente</a></li>

                                </ul>';

                            }

                            
                             /*=============================================
                            LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
                            =============================================*/

                            else if($page != $total_pages && 
                                    $page != 1 &&
                                    $page <  ($total_pages/2) &&
                                    $page < ($total_pages-3)
                                    ){

                                    $numPagActual = $page;

					            echo '<ul class="pagination pagination-lg justify-content-center">
					            <li><a  class="page-link" href="javascript:void(0)" onclick="listcurso('.($numPagActual-1).')">Anterior</a></li> ';
					                                
                                    for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){
                                      
                         echo '<li class="page-item" id="item'.$i.'"><a class="page-link " href="javascript:void(0)" onclick="listcurso('.$i.')" >'.$i.'</a></li>';
                                    }

                 	echo ' <li class="page-item disabled"><a class="page-link">...</a></li>
                            <li class="page-item" id="item'.$total_pages.'"><a class="page-link " href="javascript:void(0)" onclick="listcurso('.$total_pages.')" >'.$total_pages.'</a></li>

                           <li class="page-item" ><a class="page-link "  href="javascript:void(0)"  onclick="listcurso('.($numPagActual+1).')">Siguiente</a></li>

                                    </ul>';

                            }

                             /*=============================================
                            LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
                            =============================================*/

                            else if($page != $total_pages && 
                                    $page != 1 &&
                                    $page >=  ($total_pages/2) &&
                                    $page < ($total_pages-3)
                                    ){

                                    $numPagActual = $page;
                                
                               echo '<ul class="pagination pagination-lg justify-content-center">
                                       <li class="page-item" ><a class="page-link " href="javascript:void(0)" onclick="listcurso('.($numPagActual+1).')">Anterior</a></li> 
                                       <li class="page-item" id="item1"><a class="page-link " data-p="1"  href="javascript:void(0)" >1</a></li>
                                       <li class="disabled page-item"><a class="page-link ">...</a></li>
                                    ';
                                
                                    for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

                                          echo '<li class="page-item" id="item'.$i.'" ><a class="page-link " onclick="listcurso('.$i.')" href="javascript:void(0)" >'.$i.'</a></li>';

                                    }


                                    echo '  
                                          <li class="page-item"><a class="page-link " onclick="listcurso('.($numPagActual+1).')" href="javascript:void(0)" >Siguiente</a></li>
                                        </ul>';

                            }


                            /*=============================================
                            LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
                            =============================================*/

                            else{

                                $numPagActual = $page;

                                 echo '<ul class="pagination pagination-lg justify-content-center">
                                        <li class="page-item"><a class="page-link" onclick="listcurso('.($numPagActual+1).')"  href="javascript:void(0)" >Anterior</a></li>
                                       <li class="page-item" id="item1" ><a class="page-link " onclick="listcurso(1)" href="javascript:void(0)">1</a></li>

                                       <li class="disabled page-item"><a class="page-link">...</a></li>
                                    ';
                                
                                for($i = ($total_pages-3); $i <= $total_pages; $i ++){

                                    echo '<li class="page-item" id="item'.$i.'"><a class="page-link" onclick="listcurso('.$i.')" href="javascript:void(0)" >'.$i.'</a></li>';

                                }

                                echo ' </ul>';

                            }

                    }else{

                                echo '<ul class="pagination pagination-lg justify-content-center">';
                                
                                for($i = 1; $i <= $total_pages; $i ++){
                                         echo '<li class="page-item" id="item'.$i.'"><a class="page-link " onclick="listcurso('.$i.')" href="javascript:void(0)">'.$i.'</a></li>';
                                   

                                }

                                echo '</ul>';

                            }

                
				 
			}
		



}

require('funciones.php');
?>