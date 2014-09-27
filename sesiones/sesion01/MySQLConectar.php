<?php
	require_once("constantes.php");

	$conexion = mysqli_connect(HOST, USER, PASS, BD) or die("Error al conectar");
	echo "Conectado<br/>";

	mysqli_close($conexion);
	echo "Desconectado<br/>";
?>
