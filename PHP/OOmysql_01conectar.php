<?php
	// Incluir el archivo de datos de conexión
	include_once("mysql_00datosConexion.php");

	// Realizar la conexión
	$conexion = new mysqli(HOST, USER, PASSWORD, BD);

	if (!$conexion->connect_errno) {
		echo "Conectado<br/>";
	}
	else {
		echo "No conectado</br>";
	}

	$conexion->close();
	echo "Conexión cerrada</br>";

?>