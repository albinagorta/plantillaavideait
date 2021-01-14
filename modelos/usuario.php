<?php
//version 1.2
//con permiso de usuarios
require_once MODELOS.'conexion.php';
class Usuario {

	public $email;
	public $pass;

	public function buscar_user_email_pagina($email) {

		$stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE email = :email");

		$stmt -> bindParam(":email", $email, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;
	}

	//revisar el login del usuario
	public function revision_pagina(){
		if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $this->email) && preg_match('/^[a-zA-Z0-9]+$/', $this->pass)){

			$encriptar = crypt($this->pass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			$respuesta = $this->buscar_user_email_pagina($this->email);
			if($respuesta["email"] == $this->email && $respuesta["password"] == $this->pass){
				
				if($respuesta['estado'] == 1){
					$_SESSION["validarSesion"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"].' '.$respuesta["apellidos"];
					$_SESSION["email"] = $respuesta["email"];
					$_SESSION["password"] = $respuesta["password"];
					$_SESSION["razonsocial"] = $respuesta["razonsocial"];
					$_SESSION["imgperfil"] = $respuesta["imgperfil"];

					return 1;

				}else{
					return 0;
				}

			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	

	
}
?>