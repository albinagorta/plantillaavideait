<?php
$m_titulo = $_NOMBRE_APLICACION;
$m_descripcion = '';
$m_keyword = '';


if($url[0]=='index.php'){
	echo "<script> location='".URL_DOMINIO."'; </script>";
	//header('Location: '.URL_DOMINIO);
}

require_once(MODELOS.'web.php');
// url amigable de info producto

switch($url[0]){	
	

	case '':		
		$PAG = 'home.php';
	break;

	default:
		$PAG = 'error404.php';
	break;
   
}

?>