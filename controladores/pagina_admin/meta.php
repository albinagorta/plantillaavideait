<?php
define('EXT','');
$m_titulo = $_NOMBRE_APLICACION;
$m_descripcion = '';
$m_key = '';

if($url[0]=='index.php'){
	echo "<script>
location='".URL_DOMINIO_ADMIN."';
</script>";
//header('Location: '.URL_DOMINIO_DOMINIO);
}

require_once(MODELOS.'web.php');

switch($url[0]){ 
	case '':
		$PAG = 'home.php';
	break;	

	default:
		$PAG = 'pagina404.php';
	break;
}





?>