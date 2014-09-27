<?php
	// Incluir el archivo de datos de conexión
	include_once("mysql_00datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = mysqli_connect(HOST, USER, PASSWORD, BD) or
					die("Error al conectar");
	// Informar de la conexión
	echo "Conectado de forma procedimiental";

	// Poner a falso el modo autocommit
	mysqli_autocommit($conexion, false);

	// Crear la cadena SQL
	$cadenaSQL = "INSERT INTO vinos(idVino, vino, 
		cosechaVino, precioVino, tipoVino, DOVino, paisVino,
		productorVino, uvasVino) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

	// Crear la sentencia preparada
	$sentencia = mysqli_prepare($conexion, $cadenaSQL);

	// Asociar los parámetros a la consulta
	mysqli_stmt_bind_param($sentencia, "ssidsssss", $idVino, $vino, 
		$cosechaVino, $precioVino, $tipoVino, $DOVino, $paisVino,
		$productorVino, $uvasVino);

	// Valores de vino que después de insertado se le hará rollback
	$idVino = "xxxxxxx";
	$vino = "Vino x";
	$cosechaVino = 2011;
	$precioVino = 10.0;
	$tipoVino = "Vino tinto crianza";
	$DOVino = "Somontano";
	$paisVino = "Espana";
	$productorVino = "Productor X";
	$uvasVino = "Garnacha";

	// Ejecutar la consulta
	mysqli_stmt_execute($sentencia);

	// Rollback
	mysqli_rollback($conexion);

	// Valores de vino que será confirmado después de ser insertado
	$idVino = "zzzzzzz";
	$vino = "Vino z";
	$cosechaVino = 2011;
	$precioVino = 10.0;
	$tipoVino = "Vino tinto crianza";
	$DOVino = "Somontano";
	$paisVino = "Espana";
	$productorVino = "Productor Z";
	$uvasVino = "Garnacha";

	// Ejecutar la consulta
	mysqli_stmt_execute($sentencia);

	// Commit
	mysqli_commit($conexion);


	// Cerrar la sentencia
	mysqli_stmt_close($sentencia);

	// Cerrar la conexión
	mysqli_close($conexion);
	echo "Conexión cerrada";	
?>
