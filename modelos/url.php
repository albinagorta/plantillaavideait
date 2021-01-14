<?php
function getVariables()
{	$url = $_SERVER["REQUEST_URI"];
	$parametros = array();
	$url = parse_url($url);
	$array = explode("/", $url['path']);
	foreach($array as $p){
		if ($p!='' && $p!=URL_NOMBRE_LOCAL && $p!="www" && $p!="temporal" && $p!="admin" && $p!="admin2" && $p!="royer"){
			$parametros[] = $p;
		}
	}
	return $parametros;
}

function Url($Salida,$separacion = "-"){
	$reemplazar = array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;","&Ntilde;","&Atilde;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","%20"," ","------","-----","----","---","--","€","á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ",$separacion.$separacion,$separacion.$separacion.$separacion);
	$por = array("a","e","i","o","u","n","n","a","e","i","o","u",$separacion ,$separacion,$separacion,$separacion,$separacion,$separacion,$separacion,"","a","e","i","o","u","a","e","i","o","u","n","n",$separacion,$separacion);
		 
	$Salida = trim($Salida);	 
    $Salida = strtolower(str_replace($reemplazar, $por, $Salida));
	$Salida = preg_replace("/[^a-zA-Z0-9-_]/", $separacion, $Salida);
	
	$ar = array_filter(explode($separacion,$Salida));
	$Salida = implode($separacion,$ar);
	
	return $Salida;
}

$url = getVariables();

if(!isset($url[0])){$url[0] = '';}
if(!isset($url[1])){$url[1] = '';}
if(!isset($url[2])){$url[2] = '';}
if(!isset($url[3])){$url[3] = '';}
if(!isset($url[4])){$url[4] = '';}
?>