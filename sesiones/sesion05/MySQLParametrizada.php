<?php
	require_once("constantes.php");

	$conexion = mysqli_connect(HOST, USER, PASS, BD) or die("Error al conectar");

	echo "Conectado<br/>";

	$cadenaSQL = "INSERT INTO vinos(idVino, vino) VALUES (?, ?)";

	$sentencia = mysqli_stmt_init($conexion);
	mysqli_stmt_prepare($sentencia, $cadenaSQL);

	mysqli_stmt_bind_param($sentencia, "ss", $idVino, $vino);

	$idVino = 'rrr1';
	$vino = 'Vino R1';

	mysqli_stmt_execute($sentencia);

	$idVino = 'rrr2';
	$vino = 'Vino R2';

	mysqli_stmt_execute($sentencia);

	mysqli_close($conexion);
	echo "Desconectado<br/>";
?>
