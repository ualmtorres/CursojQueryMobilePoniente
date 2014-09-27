<?php
	// Incluir el archivo de datos de conexión
	include_once("datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = oci_connect(USER, PASSWORD, BD) or
					die("Error al conectar");

	echo "Conectado de forma procedimiental<br/>";

	// Cerrar la conexión
	oci_close($conexion);
	echo "Conexión cerrada<br/>";


?>
