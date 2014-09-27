<?php
	// Incluir el archivo de datos de conexión
	include_once("mysql_00datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = mysqli_connect(HOST, USER, PASSWORD, BD) or
					die("Error al conectar");

	echo "Conectado de forma procedimiental<br/>";

	mysqli_close($conexión);
	echo "Conexión cerrada</br>";


?>
