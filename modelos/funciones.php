<?php

function precio( $p ) {
	return number_format( $p, 2 );
}

function precio2($p){
  return number_format($p, 2, '.', ',');
}

function hace_cuanto($fecha){//Y-m-d H:i:s

	$start_date = new DateTime($fecha);

	$since_start = $start_date->diff(new DateTime(date("Y-m-d")." ".date("H:i:s")));

	$echo = "Hace ";

	if($since_start->y==0){

		if($since_start->m==0){

			if($since_start->d==0){

			   if($since_start->h==0){

				   if($since_start->i==0){

					  if($since_start->s==0){

						 $echo.= $since_start->s.' segundos';

					  }else{

						  if($since_start->s==1){

							 $echo.= $since_start->s.' segundo'; 

						  }else{

							 $echo.= $since_start->s.' segundos'; 

						  }

					  }

				   }else{

					  if($since_start->i==1){

						  $echo.= $since_start->i.' minuto'; 

					  }else{

						$echo.= $since_start->i.' minutos';

					  }

				   }

			   }else{

				  if($since_start->h==1){

					$echo.= $since_start->h.' hora';

				  }else{

					$echo.= $since_start->h.' horas';

				  }

			   }

			}else{

				if($since_start->d==1){

					$echo.= $since_start->d.' día';

				}else{

					$echo.= $since_start->d.' días';

				}

			}

		}else{

			if($since_start->m==1){

			   $echo.= $since_start->m.' mes';

			}else{

				$echo.= $since_start->m.' meses';

			}

		}

	}else{

		if($since_start->y==1){

			$echo.= $since_start->y.' año';

		}else{

			$echo.= $since_start->y.' años';

		}

	}

	return $echo;

}


function json_mostrar($data){
	return json_decode(htmlspecialchars_decode($data),true);
}

function basico( $numero, $u2 = 1 ) {
	if ( $u2 == 2 ) {
		$valor = array( 'UN', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO',
			'NUEVE', 'DIEZ', "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
			"VEINTE", 'VEINTIUN', 'VEINTIDOS', 'VEINTITRES', 'VEINTICUATRO', 'VEINTICINCO', 'VEINTISÉIS', 'VEINTISIETE', 'VEINTIOCHO', 'VEINTINUEVE' );
	} else {
		$valor = array( 'UNO', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO',
			'NUEVE', 'DIEZ', "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
			"VEINTE", 'VEINTIUNO', 'VEINTIDOS', 'VEINTITRES', 'VEINTICUATRO', 'VEINTICINCO', 'VEINTISÉIS', 'VEINTISIETE', 'VEINTIOCHO', 'VEINTINUEVE' );
	}
	return $valor[ $numero - 1 ];
}

function decenas( $n, $u2 = 1 ) {
	$decenas = array( 30 => 'TREINTA', 40 => 'CUARENTA', 50 => 'CINCUENTA', 60 => 'SESENTA',
		70 => 'SETENTA', 80 => 'OCHENTA', 90 => 'NOVENTA' );
	if ( $n <= 29 ) return basico( $n, $u2 );
	$x = $n % 10;
	if ( $x == 0 ) {
		return $decenas[ $n ];
	} else {
		if ( $u2 == 2 && $n <= 29 ) {
			return $decenas[ $n - $x ] . '' . basico( $x, $u2 );
		} else {
			return $decenas[ $n - $x ] . ' Y ' . basico( $x, $u2 );
		}
	}
}

function centenas( $n, $u2 = 1 ) {
	$cientos = array( 100 => 'CIEN', 200 => 'DOSCIENTOS', 300 => 'TRECIENTOS',
		400 => 'CUATROCIENTOS', 500 => 'QUINIENTOS', 600 => 'SEISCIENTOS',
		700 => 'SETECIENTOS', 800 => 'OCHOCIENTOS', 900 => 'NOVECIENTOS' );
	if ( $n >= 100 ) {
		if ( $n % 100 == 0 ) {
			return $cientos[ $n ];
		} else {
			$u = ( int )substr( $n, 0, 1 );
			$d = ( int )substr( $n, 1, 2 );
			return ( ( $u == 1 ) ? 'CIENTO' : $cientos[ $u * 100 ] ) . ' ' . decenas( $d, $u2 );
		}
	} else return decenas( $n, $u2 );
}

function miles( $n ) {
	if ( $n > 999 ) {
		if ( $n == 1000 ) {
			return 'MIL';
		} else {
			$l = strlen( $n );
			$c = ( int )substr( $n, 0, $l - 3 );
			$x = ( int )substr( $n, -3 );
			if ( $c == 1 ) {
				$cadena = 'MIL ' . centenas( $x );
			} else if ( $x != 0 ) {
				$cadena = centenas( $c, 2 ) . ' MIL ' . centenas( $x );
			} else $cadena = centenas( $c, 2 ) . ' MIL';
			return $cadena;
		}
	} else return centenas( $n );
}

function millones( $n ) {
	if ( $n == 1000000 ) {
		return 'UN MILLÓN';
	} else {
		$l = strlen( $n );
		$c = ( int )substr( $n, 0, $l - 6 );
		$x = ( int )substr( $n, -6 );
		if ( $c == 1 ) {
			$cadena = ' MILLÓN '; 
		} else {
			$cadena = ' MILLONES ';
		}
		return miles( $c ) . $cadena . ( ( $x > 0 ) ? miles( $x ) : '' );
	}
}


function numtoletras( $n ,$moneda) {

	$xpos_punto = strpos( $n, "." );
	$xaux_int = $n;
	$xdecimales = "00";
	if ( !( $xpos_punto === false ) ) {
		if ( $xpos_punto == 0 ) {
			$n = "0" . $n;
			$xpos_punto = strpos( $n, "." );
		}
		$xaux_int = substr( $n, 0, $xpos_punto ); // obtengo el entero de la cifra a covertir
		$xdecimales = substr( $n . "00", $xpos_punto + 1, 2 ); // obtengo los valores decimales
	} 
	$n = $xaux_int;
	switch ( true ) {
		case ( $n >= 1 && $n <= 29 ):
			$int = basico( $n );
			break;
		case ( $n >= 30 && $n < 100 ):
			$int = decenas( $n );
			break;
		case ( $n >= 100 && $n < 1000 ):
			$int = centenas( $n );
			break;
		case ( $n >= 1000 && $n <= 999999 ):
			$int = miles( $n );
			break;
		case ( $n >= 1000000 ):
			$int = millones( $n );
	}
	return $int . " Y  $xdecimales/100 ".$moneda;
}


function fecha_1_ano( $fecha, $_MESES, $modify = "0 day" ) {
	$date = new DateTime($fecha);
	$date->modify($modify);
	return $date->format( 'd ' ) .substr(ucfirst(strtolower( $_MESES[ $date->format( 'n ' ) - 1 ] ) ), 0, 3 ).' '.($date->format('y'));
}

function C_M_latin1 ($str) {
    $str = strtoupper(strtr($str, LATIN1_LC_CHARS, LATIN1_UC_CHARS));
    return strtr($str, array("ß" => "SS"));
}

function fechamdmy($f){
	return date("d/m/Y", strtotime($f));
}

function fechamdmyhora($fecha_hora){

		

	return date('d/m/Y h:i:s A', strtotime($fecha_hora));
}





?>