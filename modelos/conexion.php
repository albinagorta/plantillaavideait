<?php

class Conexion{

	static public function conectar(){	

		$link = new PDO("mysql:host=".SERVER_DB.";dbname=".DB_DB.";charset=utf8mb4",
						USER_DB,
						PASSWORD_DB,array(PDO::ATTR_EMULATE_PREPARES => false,
								PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		return $link;

	}
 
}
