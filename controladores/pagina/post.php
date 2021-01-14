<?php
require(MODELOS.'web.php');
switch($_POST['pro']){

	case 'contactos':
	require(CONTROLADORES.'pagina/correos/enviar_contacto.php');
	break;

	case 'realizarpago':
	switch ($_POST['op']) { 
		
		case 'paypal':	
			
				
		break;

		
		}		
	break;


}
