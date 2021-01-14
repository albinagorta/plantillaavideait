<?php 
	$nombre ='ReporteCotizaion_'.date('d-m-Y h:i:s A').'_.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$nombre.'"');
			header("Content-Transfer-Encoding: binary");

			$bg="style='font-weight:bold; border:1px solid #eee;background: #00c0ef; color: white;'";
			 

	echo utf8_decode("<table border='0'> 
 
						<tr> 

						<td ".$bg.">#</td> 
						<td ".$bg.">ORDEN</td>
                           <td ".$bg.">VIA</td>
                           <td ".$bg.">ADUANA</td>
                          <td ".$bg.">REGIMEN</td>
                           <td ".$bg.">PROVEEDOR</td>
                           <td ".$bg.">MERCANCIA</td>             
                           <td ".$bg.">BULTOS</td>
                           <td ".$bg.">BL / AWB</td>
                           <td ".$bg.">FECHA LLEGADA</td> 
                           <td ".$bg.">FECHA NUMERACION</td>
                           <td ".$bg.">DAM</td>
                           <td ".$bg.">CANAL</td>
                           <td ".$bg.">FECHA EMBARQUE</td>
                           <td ".$bg.">FECHA LIMITE RETIRO</td>
                           <td ".$bg.">FECHA  RETIRO</td> 
                           <td ".$bg.">ESTADO</td>");


				$reporte = Web::consultas('reportecotizacion RC INNER JOIN usuarios C ON C.id=RC.cliente_id INNER JOIN proveedor P ON P.id=RC.proveedor_id INNER JOIN aduana A ON A.id=RC.aduana_id INNER JOIN regimen R ON R.id=RC.regimen_id','AND C.id="'.$_SESSION["id"].'" ','RC.orden,RC.mercancia,RC.bultos,RC.bl_awb,RC.fecha_llegada,RC.fecha_numeracion,RC.dam,RC.fecha_embarque,RC.fecha_limite_retiro,RC.fecha_retiro,RC.estado,RC.tipo_carga,RC.canal,RC.id,C.razonsocial,P.nombre proveedor,A.codigo aduana,R.codigo regimen');

					$bd="style='border:1px solid #eee;'";
				foreach ($reporte as $key => $value) {
						if($value["tipo_carga"]==="AEREO") {
	                     $img="AEREO";
		                 }else{
		                   $img="MARITIMO";
		                  }

	                   $canalcol="";
	                   if ($value["canal"]=='ROJO') {
	                   	$canalcol="color:red";
	                   }else if ($value["canal"]=='VERDE') {
	                   	$canalcol="color:green";
	                   }else if ($value["canal"]=='NARANJA') {
	                   	$canalcol="color:orange";
	                   }

                   $CANAL="<span style='".$canalcol."'>".$value['canal']."</span>";

					 echo utf8_decode("<tr>
					 <td ".$bd.">".($key+1)."</td>
                     <td ".$bd.">".$value["orden"]."</td>
					 <td ".$bd."> ".$img."</td>
				      <td ".$bd.">".$value["aduana"]."</td>
				      <td ".$bd.">".$value["regimen"]."</td>
				      <td ".$bd.">".$value["proveedor"]."</td>
				      <td ".$bd.">".$value["mercancia"]."</td>
				      <td ".$bd.">".$value["bultos"]."</td>
				      <td ".$bd.">".$value["bl_awb"]."</td>
				      <td ".$bd.">".$value["fecha_llegada"]."</td>
				      <td ".$bd.">".$value["fecha_numeracion"]."</td>
				      <td ".$bd.">".$value["dam"]."</td>
				     <td ".$bd."> ".$CANAL."</td>
				      <td ".$bd.">".$value["fecha_embarque"]."</td>
				      <td ".$bd.">".$value["fecha_limite_retiro"]."</td>
				      <td ".$bd.">".$value["fecha_retiro"]."</td>
				      <td ".$bd.">".$value["estado"]."</td>");

				 			
					 /*=============================================
  					REVISAR ESTADO
  					=============================================*/

		  			

				 	echo utf8_decode(" 					  	 
			 					  </tr>"); 		

				}


			echo "</table>";


			 ?>