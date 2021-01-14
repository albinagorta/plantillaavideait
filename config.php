<?php

if (preg_match("/config.php/i", $_SERVER['PHP_SELF'])) die();

$_URL = 'www.avideait.com/';//dominio de la forma www.ejemplo.com/

$_URL_LOCAL = 'http://localhost/plantillaavideait/';//url de la web en local http://localhost/ejemplo/

$_URL_NOMBRE_LOCAL = 'plantillaavideait';


$_ADMIN = 'admin/';

$_TIMEZONE = 'America/Lima'; // ejemplo->Peru

$_SERVER_DB = "localhost";//ip del servidor ejemplo.com cpanel

$_DB_DB = "avideait";//nombre de la base de datos local

$_DB_DB_ADMIN = "";//nombre de la base de datos dominio

$_USER_DB_ADMIN = "root";//usuario de la base de datos 

$_PASS_DB_ADMIN = "";//password de la base de datos

/*
//remoto
 
$_USER_DB_ADMIN = "";//usuario de la base de datos 

$_PASS_DB_ADMIN = "";//password de la base de datos
 */

$_CORREO_ADMIN='';


$_NOMBRE_APLICACION = "sistema web";

$_AUTOR = "www.avideait.pw";

define('MONEDA','$. ');


require('core_avideait.php');

?>