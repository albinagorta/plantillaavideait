<?php 
require_once(MODELOS.'web.php');

if(isset($_GET['pro'])){
	if(isset($_SESSION)){
	switch($_GET['pro']){	
		
		case 'tablaclientes':
			require(AJAX.'Clientes.ajax.table.php');
		break;
		
	}
}

	exit();
}
 ?>