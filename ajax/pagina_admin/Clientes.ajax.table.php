<?php

 	/*=============================================
  	MOSTRAR LA TABLA DE USUARIOS
  	=============================================*/ 

		$item = null;
 		$valor = null;

 		$usuarios = Web::consultas('clientes','ORDER BY id DESC');

 		$datosJson = '{
		 
	 	"data": [ ';

	 	for($i = 0; $i < count($usuarios); $i++){

	 	$accion="<div class='btn-group'><button class='btn btn-danger' onclick='eliminar(".$usuarios[$i]['id'].")'><i class='far fa-trash-alt'></i></button></div>";



	 		/*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

			$datosJson	 .= '[
				      "'.($i+1).'",
				      "'.$usuarios[$i]["nombres"].'",
				      "'.$usuarios[$i]["email"].'",
				      "'.$usuarios[$i]["pais"].'",
				      "'.$usuarios[$i]["ciudad"].'",
				      "'.$usuarios[$i]["direccion"].'",
				       "'.$accion.'"    
				    ],';

	 	}

	 	$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']
			  
		}'; 

		echo $datosJson;

 	





