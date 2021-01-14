<?php
require_once(EXTENSIONES."PHPMailer/PHPMailerAutoload.php");

		$envio='<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
			
			<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
			
				<h3 style="font-weight:100; color:#999">Nombre: '.$_POST['nombre'].'</h3>
				<br>
				<h3 style="font-weight:100; color:#999">Email: '.$_POST['email'].'</h3>
				<br>
				<h3 style="font-weight:100; color:#999">telefono: '.$_POST['telefono'].'</h3>
				<br>
				<h3 style="font-weight:100; color:#999">asunto: '.$_POST['asunto'].'</h3>
				<br>
				<h3 style="font-weight:100; color:#999">Empresa o Marca: '.$_POST['empresa'].'</h3>
				<br>

				<h3 style="font-weight:100; color:#999">mensaje:<br> <p>'.$_POST['mensaje'].'</p> </h3>
				

			</div>
		</div>';


	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$correos[] = 'info@avideait.pw';
		foreach($correos as $a){
			$smtp_email = $a;
					
			$mail = new PHPMailer();
			//$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			
			$mail->setFrom('info@avideait.pw', 'SUPER APP WEB PERU');
			$mail->addReplyTo('info@avideait.pw', 'SUPER APP WEB PERU');
			$mail->addAddress($smtp_email,'info@avideait.pw');

			$mail->Subject = "Ha recibido una consulta DE SU WEB SUPER APP WEB PERU -".$_POST["empresa"];
			$mail->MsgHTML($envio);
			
			$mail->AltBody = 'Para ver el mensaje, por favor, utilice un visor de correo electrónico HTML compatible';
			$PDF='';
			$mail->AddAttachment($PDF);//adjuntar imagen
			$mail->CharSet = 'UTF-8';
			
			if ($mail->send()){
				echo 1;
			}

			$mail->ClearAddresses();

		}


	}
?>