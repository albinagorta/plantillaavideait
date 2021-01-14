<?php

 	/*=============================================
  	MOSTRAR LA TABLA DE USUARIOS
  	=============================================*/ 

		$item = null;
 		$valor = null;

 		$reporte = Web::consultas('reportecotizacion RC INNER JOIN usuarios C ON C.id=RC.cliente_id INNER JOIN proveedor P ON P.id=RC.proveedor_id INNER JOIN aduana A ON A.id=RC.aduana_id INNER JOIN regimen R ON R.id=RC.regimen_id','AND C.id="'.$_SESSION["id"].'" ','RC.orden,RC.mercancia,RC.bultos,RC.bl_awb,RC.fecha_llegada,RC.fecha_numeracion,RC.dam,RC.fecha_embarque,RC.fecha_limite_retiro,RC.fecha_retiro,RC.estado,RC.tipo_carga,RC.canal,RC.id,C.razonsocial,P.nombre proveedor,A.codigo aduana,R.codigo regimen');

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($reporte); $i++){
	 		
             
          $accion= "<div class='btn-group'><a href='".URL_DOMINIO."reportecotizaciondetalle?id=".$reporte[$i]['id']."' class='btn btn-info'><i class='fas fa-eye'></i></a></div>";


             	if($reporte[$i]["tipo_carga"]==="AEREO") {
                     $img=URL_DOMINIO."img/aereos.png";
                 }else{
                      $img=URL_DOMINIO."img/maritimo.png";
                   }

                   $canalcol="";
                   if ($reporte[$i]["canal"]=='ROJO') {
                   	$canalcol="color:red;font-weight: 600;";
                   }else if ($reporte[$i]["canal"]=='VERDE') {
                   	$canalcol="color:green;font-weight: 600;";
                   }else if ($reporte[$i]["canal"]=='NARANJA') {
                   	$canalcol="color:orange;font-weight: 600;";
                   }

                   $CANAL="<span style='".$canalcol."'>".$reporte[$i]['canal']."</span>";

			/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/
		

			$datosJson	 .= '[
				      "'.($i+1).'",
				       "'.$reporte[$i]["orden"].'",
				       "<img src='.$img.' style=width:60px;>",
				      "'.$reporte[$i]["aduana"].'",
				      "'.$reporte[$i]["regimen"].'",
				      "'.$reporte[$i]["proveedor"].'",
				      "'.$reporte[$i]["mercancia"].'",
				      "'.$reporte[$i]["bultos"].'",
				      "'.$reporte[$i]["bl_awb"].'",
				      "'.($reporte[$i]["fecha_llegada"]).'",
				      "'.($reporte[$i]["fecha_numeracion"]).'",
				      "'.($reporte[$i]["dam"]).'",
				      "'.$CANAL.'",
				      "'.($reporte[$i]["fecha_embarque"]).'",
				      "'.($reporte[$i]["fecha_limite_retiro"]).'",
				      "'.($reporte[$i]["fecha_retiro"]).'",
				      "'.($reporte[$i]["estado"]).'",
				       "'.$accion.'"    
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	




