<?php
	// Incluir el archivo de datos de conexión
	include_once("datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = oci_connect(USER, PASSWORD, BD) or
					die("Error al conectar");

	echo "Conectado de forma procedimiental";

	$cadenaSQL = "INSERT INTO vinos(idVino, vino, 
		cosechaVino, precioVino, tipoVino, DOVino, paisVino,
		productorVino, uvasVino) 
		VALUES (:idVino, :vino, :cosechaVino, :precioVino, 
		:tipoVino, :DOVino, :paisVino, :productorVino, :uvasVino)";

	// Prepara una sentencia
	$sentencia = oci_parse($conexion, $cadenaSQL);

	// Valores de vino
	$idVino = 'zzzz3';
	$vino = 'Vino Z';
	$cosechaVino = 2011;
	$precioVino = 10;
	$tipoVino = 'Crianza';
	$DOVino = 'Somontano';
	$paisVino = 'Espana';
	$productorVino = 'Hospital';
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
	echo " Ejecutando " . oci_execute($sentencia, OCI_NO_AUTO_COMMIT) . " filas insertadas</br>";

	oci_rollback($conexion);
	echo "Haciendo Rollback</br>";

	// Cerrar la conexión
	oci_close($conexion);
	echo "Conexión cerrada";


?>
