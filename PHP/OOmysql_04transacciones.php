<?php
	// Incluir el archivo de datos de conexión
	include_once("mysql_00datosConexion.php");

	// Realizar la conexión
	$conexion = new mysqli(HOST, USER, PASSWORD, BD);

	if (!$conexion->connect_errno) {
		echo "Conectado";
	}
	else {
		echo "No conectado";
		exit();
	}

	// Poner a falso el modo autocommit
	$conexion->autocommit(false);

	// Crear la cadena SQL
	$cadenaSQL = "INSERT INTO vinos(idVino, vino, 
		cosechaVino, precioVino, tipoVino, DOVino, paisVino,
		productorVino, uvasVino) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

	// Crear la sentencia preparada
	$sentencia = $conexion->prepare($cadenaSQL);

	// Asociar los parámetros a la consulta
	$sentencia->bind_param("ssidsssss", $idVino, $vino, 
		$cosechaVino, $precioVino, $tipoVino, $DOVino, $paisVino,
		$productorVino, $uvasVino);

	// Valores de vino que después de insertado se le hará rollback
	$idVino = "mmmmmmm";
	$vino = "Vino m";
	$cosechaVino = 2011;
	$precioVino = 10.0;
	$tipoVino = "Vino tinto crianza";
	$DOVino = "Somontano";
	$paisVino = "Espana";
	$productorVino = "Productor M";
	$uvasVino = "Garnacha";

	// Ejecutar la consulta
	$sentencia->execute();

	// Rollback
	$conexion->rollback();

	// Valores de vino que será confirmado después de ser insertado
	$idVino = "nnnnnnn";
	$vino = "Vino n";
	$cosechaVino = 2011;
	$precioVino = 10.0;
	$tipoVino = "Vino tinto crianza";
	$DOVino = "Somontano";
	$paisVino = "Espana";
	$productorVino = "Productor N";
	$uvasVino = "Garnacha";

	// Ejecutar la consulta
	$sentencia->execute();

	// Commit
	$conexion->commit();

	// Cerrar la sentencia
	$sentencia->close();

	// Cerrar la conexión
	$conexion->close();
	echo "Conexión cerrada";	
?>