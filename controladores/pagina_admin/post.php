<?php
require(MODELOS.'web.php'); 


switch($_POST['pro']){
	case 'loginadmin':
		require(MODELOS.'administrador.php');
		$admin = new Administrador();		
		$admin->email = $_POST['user'];
		$admin->pass = $_POST['pass'];
		$admin->revision();
		echo "<script> location.href='".URL_DOMINIO_ADMIN."'; </script>";
	break;
   
	case 'notificaciones':
		switch($_POST['op']){
		case 'editar':
				$data=array(); $data[$_POST['item']] = 0;
				echo Web::actualizar('notificaciones',$data,1);
		break;
		}		
	break;

	case 'perfiles':
		switch($_POST['op']){
		case 'estado':
			$data=array();
			$data['estado'] = $_POST['estado'];
			echo Web::actualizar('administradores',$data,$_POST['id']);
		break;
		
		case 'eliminar':
				/*Web::borrar_img('perfiles',$_POST['foto']);*/
				Web::eliminar('administradores',$_POST['id']);				
		break;			

		case 'edit':
			$data=array();
				foreach ($_POST as $a=>$b) {
					if ($a=='pro'|| $a=='op'||$a=='id') {
						
					}else{
						$data[$a] = $_POST[$a];
					}
				}

				if ($_POST['id']==0 || $_POST['id']==null){
				echo Web::guardar('administradores',$data);	
				}else{
				echo Web::actualizar('administradores',$data,$_POST['id']);
				}					
		break;

		case 'mostrar':
				 $respuesta=Web::consulta('administradores','AND id='.$_POST['id']);
				echo json_encode($respuesta);	
		break;	

		}		
	break;





	case 'productos':
		switch($_POST['op']){
		case 'estado':
			$data=array();
			$data['estado'] = $_POST['estado'];
			echo Web::actualizar('productos',$data,$_POST['id']);
		break;
		
		case 'eliminar':

				$res=Web::consulta('productos','AND id="'.$_POST['id'].'"');
				if ($res['img']!=null) {
						Web::borrar_img('../img/productos/'.$res['img']);
					}

				Web::eliminar('productos',$_POST['id']);				
		break;			

		case 'edit':
			$data=array();
				foreach ($_POST as $a=>$b) {
					if ($a=='pro'|| $a=='op'||$a=='id'||$a=='imagen') {
						
					}else{
						$data[$a] = $_POST[$a];
					}
				}

				if($_FILES["img"]['name']!=NULL) {
					if ($_POST['imagen']!=NULL) {
						Web::borrar_img('../img/productos/'.$_POST['imagen']);
					}
					
					$imgurl=Web::GuardarImg('../img/productos',$_FILES["img"],544,362);
					$data['img'] = $imgurl;
				}

				if ($_POST['id']==0 || $_POST['id']==null){
				echo Web::guardar('productos',$data);	
				}else{
				echo Web::actualizar('productos',$data,$_POST['id']);
				}					
		break;

		case 'mostrar':
				 $respuesta=Web::consulta('productos','AND id='.$_POST['id']);
				echo json_encode($respuesta);	
		break;	

		case 'validarproductos':
				 $respuesta=Web::consulta('productos','AND titulo="'.$_POST['titulo'].'"');
				echo json_encode($respuesta);	
		break;	

		}		
	break;




}

