<?php 
require_once(MODELOS.'web.php');

if(isset($_GET['pro'])){
switch ($_GET['pro']) { 
		
	case 'realizarpago':
	switch ($_GET['op']) { 
		
		case 'paypal':			
			

		break;
		}	

	break;
	}	

	exit();
}
 ?>