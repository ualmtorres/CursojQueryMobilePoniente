<?php
	// Incluir el archivo de datos de conexión
	include_once("oracle_00datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = oci_connect(USER, PASSWORD, BD) or
					die("Error al conectar");

	// Informar de la conexión
	echo "Conectado de forma procedimiental<br/>";

	// Crear la cadena SQL
	$cadenaSQL = "INSERT INTO vinos(idVino, vino, 
		cosechaVino, precioVino, tipoVino, DOVino, paisVino,
		productorVino, uvasVino) 
		VALUES (:idVino, :vino, :cosechaVino, :precioVino, 
		:tipoVino, :DOVino, :paisVino, :productorVino, :uvasVino)";

	// Prepara una sentencia
	$sentencia = oci_parse($conexion, $cadenaSQL);

	// Valores de vino
	$idVino = 'yyyyyyy';
	$vino = 'Vino Y';
	$cosechaVino = 2011;
	$precioVino = 10;
	$tipoVino = 'Crianza';
	$DOVino = 'Somontano';
	$paisVino = 'Espana';
	$productorVino = 'Y';
	$uvasVino = 'Garnacha';

	// Asociar los parámetros a la consulta
	oci_bind_by_name($sentencia, ':idVino', $idVino);
	oci_bind_by_name($sentencia, ":vino", $vino);
	oci_bind_by_name($sentencia, ":cosechaVino", $cosechaVino);
	oci_bind_by_name($sentencia, ":precioVino", $precioVino);
	oci_bind_by_name($sentencia, ":tipoVino", $tipoVino);
	oci_bind_by_name($sentencia, ":DOVino", $DOVino);
	oci_bind_by_name($sentencia, ":paisVino", $paisVino);
	oci_bind_by_name($sentencia, ":productorVino", $productorVino);
	oci_bind_by_name($sentencia, ":uvasVino", $uvasVino);

	// Ejecutar la consulta y volcar en $resultado
	echo " Ejecutando " . oci_execute($sentencia) . " filas insertadas</br>";

	// Cerrar la conexión
	oci_close($conexion);
	echo "Conexión cerrada";	
?>
