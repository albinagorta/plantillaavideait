<?php 
require_once(EXTENSIONES."PHPMailer/PHPMailerAutoload.php");
$productos=Web::consultas('productos',' ORDER BY precio DESC');
$producto='';
foreach ($productos as $pro) {
    if ($pro['precio']==0) {
        $precio='Gratis';
    }else{
        $precio='USD '.$pro['precio'];
    }

     $producto.='<div style="box-sizing: border-box;margin: 1.5rem 0;-webkit-box-flex: 0;-ms-flex: 0 0 33.333333%;flex: 0 0 33.333333%;max-width: 33.333333%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
    <a href="'.URL_DOMINIO.$pro['ruta'].'" title="Ver detalle" style="box-sizing: border-box;text-decoration: none;color: #007bff;background-color: transparent;">
        <div style="box-sizing: border-box;background: white;padding-bottom: 59px;">
            <img  src="'.URL_DOMINIO.'img/productos/'.$pro['img'].'" style="box-sizing: border-box;width: 100%;" title="Ver detalle" name="'.$pro['titulo'].'" alt="'.$pro['titulo'].'" >
            <div style="box-sizing: border-box;margin: 0 1rem;font-weight: bold;color: #3161A3;text-align: center!important;" >
            '.$pro['titulo'].'
            </div>
            <p style="box-sizing: border-box;font-size: 14px;margin: 0 1rem;color: #3161A3;text-align: center;padding-top: 10px;opacity: 1;transform: translate(0);transition: all 300ms linear;" >'.$pro['titular'].'</p>
            <p style="box-sizing: border-box;font-size: 14px;margin: 0 1rem;color: #fe4f6c;text-align: center;padding-top: 10px;opacity: 1;transform: translate(0);transition: all 300ms linear;">'.$precio.'</p>
            <div style="box-sizing: border-box;font-size: 3.2rem;background: #fe4f6c !important;border-radius: 2rem;text-align: center;width: 63px;height: 63px;color: white;margin: auto;position: absolute;bottom: -25px;left: 0;right: 0;font-weight: bold;line-height: 59px;">+</div>

        </div>
    </a>
</div>';
 } 
              

$envio='<section style="background:#222b5e;padding: 2rem 0;
    overflow-x: hidden;
    font-size: 17px;">
<div>
  <div style="box-sizing: border-box;text-align: center;margin: 40px;box-sizing: border-box;">
    <a href="'.URL_DOMINIO.'"><img src="'.URL_DOMINIO.'img/logo.png" alt="" style="width: 30%;box-sizing: border-box;" ></a>
  </div>

    <div style="max-width: 1140px;width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;box-sizing: border-box;">

        <h2 style="color: #fe4f6c;text-align: center;font-size: 3rem;margin-bottom: 40px;font-weight: bold;line-height: 1.2;box-sizing: border-box;">🎁 Sistemas Web Premium 🌟</h2>
        <div style="box-sizing: border-box;display: -webkit-box;display: -ms-flexbox;display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">  
        '.$producto.'
        </div>
    </div>
    </div>
</section>
<footer>
<div style="background: #222b5e;color: #FFF;font-size: 1.3rem;padding: 5rem 0;position: relative;text-align: justify;overflow-x: hidden;font-size: 17px;">
  <div style="max-width: 1140px;width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;box-sizing: border-box;">

  <div style="box-sizing: border-box;display: -webkit-box;display: -ms-flexbox;display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">

    <div style="-webkit-box-flex: 0;-ms-flex: 0 0 45%;flex: 0 0 45%;max-width: 45%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">

           <h3 style="color: #fe4f6c;font-size: 1.75rem;    margin-bottom: .5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;margin-top: 0;">Servicios</h3>

          <ul style="list-style: none;padding: 0;margin-top: 0;margin-bottom: 1rem;">
                <li style="margin-bottom: 6px;font-size: 1rem;"><a href="'.URL_DOMINIO.'productos" style="color: #FFF;text-decoration: none;
                 background-color: transparent;text-align: left !important;">Productos Web</a></li>
                <li style="margin-bottom: 6px;font-size: 1rem;"><a href="'.URL_DOMINIO.'paginas-web" style="color: #FFF;text-decoration: none;background-color: transparent;text-align: left !important;">Páginas Web</a></li>
               <li style="margin-bottom: 6px;font-size: 1rem;"> <a style="color: #FFF;text-decoration: none;background-color: transparent;text-align: left !important;" href="'.URL_DOMINIO.'tienda-online">Tienda Online – E- Commerce</a></li>
               <li style="margin-bottom: 6px;font-size: 1rem;"><a style="color: #FFF;text-decoration: none;background-color: transparent;text-align: left !important;" href="'.URL_DOMINIO.'tienda-online">Tiendas Virtuales</a></li>
               <li style="margin-bottom: 6px;font-size: 1rem;"><a style="color: #FFF;text-decoration: none;
    background-color: transparent;text-align: left !important;" href="'.URL_DOMINIO.'tienda-online">Desarrollo de intranets</a></li>
               <li style="margin-bottom: 6px;font-size: 1rem;"><a style="color: #FFF;text-decoration: none;
    background-color: transparent;text-align: left !important;" href="'.URL_DOMINIO.'app-moviles">Desarrollo Móvil</a></li>

                <li style="margin-bottom: 6px;font-size: 1rem;"><a style="color: #FFF;text-decoration: none;
    background-color: transparent;text-align: left !important;" href="'.URL_DOMINIO.'marketing-digital">Marketing Digital</a></li>
                <li style="margin-bottom: 6px;font-size: 1rem;"><a style="color: #FFF;text-decoration: none;
    background-color: transparent;text-align: left !important;" href="'.URL_DOMINIO.'videos-corporativos">Videos para empresas</a></li>              
                <li style="margin-bottom: 6px;font-size: 1rem;"><a style="color: #FFF;text-decoration: none;
    background-color: transparent;text-align: left !important;" href="'.URL_DOMINIO.'social-media">Social Media</a></li>                
                <li style="margin-bottom: 6px;font-size: 1rem;"><a style="color: #FFF;text-decoration: none;
    background-color: transparent;text-align: left !important;" href="'.URL_DOMINIO.'diseno-de-logotipos">Diseño de Logotipos</a></li>

            </ul>

    </div>


    <div style="-webkit-box-flex: 0;-ms-flex: 0 0 45%;flex: 0 0 45%;max-width: 45%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;display: inline-block;">

      <h3 style="color: #fe4f6c;font-size: 1.75rem;    margin-bottom: .5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;margin-top: 0;">Contacto</h3>

      <p style="font-weight: bold;">Escríbenos:</p>

      <p style="text-align: left !important;    margin: 0;
    padding-bottom: 10px;opacity: 1;transform: translate(0);transition: all 300ms linear;font-size: 1rem;"><a href="mailto:info@avideait.pw" style="text-decoration: none;color: #fff;">Email: info@avideait.pw</a></p>

      <p style="font-weight: bold;text-align: left !important;    margin: 0;
    padding-top: 10px;opacity: 1;transform: translate(0);transition: all 300ms linear;font-size: 1rem;">Llámenos o mensajes al:</p>

      <p style="text-align: left !important;    margin: 0;
    padding-bottom: 10px;opacity: 1;transform: translate(0);transition: all 300ms linear;font-size: 1rem;    margin-top: 10px;"><a href="tel:+953 161 072" style="text-decoration: none;color: #fff;">Telefono: +51953161072</a></p>

      <p style="font-weight: bold;text-align: left !important;    margin: 0;
    padding-top: 10px;opacity: 1;transform: translate(0);transition: all 300ms linear;font-size: 1rem;">Síguenos en:</p>

      <p style="text-align: left !important;    margin: 0;
    padding-top: 10px;opacity: 1;transform: translate(0);transition: all 300ms linear;font-size: 1rem;"><a style="color: #FFF;" href="https://www.facebook.com/AvideaIT" target="_black">Facebook</a>
    <a style="color: #FFF;margin-left: 10px;"href="https://twitter.com/AvideaIT" target="_black">Twitter</a>
      <a style="color: #FFF;margin-left: 10px;" href="https://www.youtube.com/AvideaIT" target="_black">YouTube</a>
      <a style="color: #FFF;margin-left: 10px;"  href="https://www.instagram.com/angel.albinagorta/" target="_black"> Instagram</a>

  </p>
      

    </div>

  </div>

</div>

<div style="position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: #043E68;
    font-size: 0.8rem;
    padding: 7px 0;">

  <div style="max-width: 1140px;width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;box-sizing: border-box;"><div>Copy right © 2017 - 2020 www.avideait.pw </div>
</div>

</div>
</div>
</footer>';



$asunto='🎁 Sistemas Web Premium | AvideaIT 🌟';

$comercio=Web::consulta('comercio','AND id=1');

$clientes=Web::consultas('clientes');

$i=0;

foreach ($clientes as $key => $val) {

		$smtp_email = $val['email'];
				
		$mail = new PHPMailer();
		//$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
		
		$mail->setFrom($comercio['email'], 'AvideaIT');
		$mail->addReplyTo($comercio['email'], 'AvideaIT');
		$mail->addAddress($smtp_email,$comercio['email']);

		$mail->Subject =$asunto;
		$mail->MsgHTML($envio);
		
		$mail->AltBody = 'Para ver el mensaje, por favor, utilice un visor de correo electrónico HTML compatible';
		$PDF='';
		$mail->AddAttachment($PDF);//adjuntar imagen
		$mail->CharSet = 'UTF-8';
		
		if ($mail->send()){
			$i++;
		}
		
		$mail->ClearAddresses();
}

echo $i;

 ?>