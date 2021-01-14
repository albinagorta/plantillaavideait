<?php
require(MODELOS.'url.php');


$_SERVER['PHP_SELF'] = Url($_SERVER['PHP_SELF']);
$_SERVER['QUERY_STRING'] = isset($_SERVER['QUERY_STRING']) ? Url($_SERVER['QUERY_STRING']) : '';
$_SERVER['REQUEST_URI'] = isset($_SERVER['REQUEST_URI']) ? Url($_SERVER['REQUEST_URI']) : '';


if(!isset($_NO_HEADER_FOOTER))$_NO_HEADER_FOOTER=0;

if(isset($_POST) && !empty($_POST)){

	if(!isset($_SESSION['validarSesionBackend'])){@session_start();}
	
	require(CONTROL.'post.php');exit();// TODAS LAS PETICIONES TIPO POST
}


session_start();

if($_TIPO=='admin'){
	require(CONTROL.'session.php');
}
 
/*if($_TIPO=='normal'){
	require(CONTROL.'session.php');
}*/



if(isset($_GET) && !empty($_GET)){
	require(CONTROL.'get.php');	//TODAS LAS PETICIONES TIPO POST
}

if(isset($_TIPO) && !empty($_TIPO)){//includes de la pagina de index necesarios
	include(CONTROL.'meta.php');//metas de html y arrays de menus y variable $PAG que selecciona que contenido renderizara
	include(INCLUDES.'head.php');//cabecera head

	if($_NO_HEADER_FOOTER==1){

	include(PAGINA.$PAG);
	
	echo '</body></html>';

	}else{
		
		include(INCLUDES.'header.php');//cabecera header
		if (file_exists(PAGINA.$PAG)) {
		include(PAGINA.$PAG);//contenido de la pagina
		}
			
		

		include(INCLUDES.'footer.php');//footer de la pagina
	}
}