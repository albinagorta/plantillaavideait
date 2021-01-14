<?php
//version 1.2
//con permiso de usuarios
require_once "conexion.php";
class Administrador {

	public $email;
	public $pass;

	public function buscar_user_email($email) {

		$stmt = Conexion::conectar()->prepare("SELECT * FROM administradores WHERE email = :email");

		$stmt -> bindParam(":email", $email, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;
	}



	//revisar el login del usuario
	public function revision() {
		if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $this->email) && preg_match('/^[a-zA-Z0-9]+$/', $this->pass)){

			$encriptar = crypt($this->pass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			
			$respuesta = $this->buscar_user_email($this->email);
			if($respuesta["email"] == $this->email && $respuesta["password"] == $this->pass){
				if($respuesta['estado'] == 1){
					$_SESSION['validarSesionBackend'] = "ok";
					$_SESSION['USER_ID'] = $respuesta["id"];
					$_SESSION['USER_NOMBRE'] = $respuesta["nombre"];
					$_SESSION['USER_FOTO'] = '';
					$_SESSION['USER_EMAIL'] = $respuesta["email"];
					$_SESSION['USER_PASSWORD'] = $respuesta["password"];

				$_SESSION["USER_PERFIL"]=$_TIPO_USUARIOS[$respuesta["cargo"]];

					return 1;

				}else{
					session_destroy();
					return 0;
				}

			}else{
				session_destroy();
				return 0;
			}
		}else{
			return 0;
		}
	}

	
}
?>