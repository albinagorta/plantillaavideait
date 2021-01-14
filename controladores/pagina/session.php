<?php
$INICIADO = 0;

if(isset($_SESSION['id']) && is_numeric($_SESSION['id'])){
	$INICIADO = 1;
}


if($INICIADO == 0){
	if($url[0]!=''){
	header('Location: '.URL_DOMINIO);
		echo "<script> location=".URL_DOMINIO."; </script>";
	exit();
}

	include(PAGINA.'session.php');
	exit();
}//else solo corre la aplicacion
?>