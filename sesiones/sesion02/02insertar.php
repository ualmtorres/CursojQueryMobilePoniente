<?php
	// Incluir el archivo de datos de conexión
	include_once("datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = oci_connect(USER, PASSWORD, BD) or
					die("Error al conectar");

	echo "Conectado de forma procedimiental";

	// Crear la cadena SQL
	$cadenaSQL = "INSERT INTO VINOS(IDVINO, VINO, DOVINO, PRECIOVINO) 
				VALUES('ZZZZZZ1', 'Vino Z', 'Somontano', 10)";

	// Prepara una sentencia
	$sentencia = oci_parse($conexion, $cadenaSQL);

	// Ejecutar la consulta y volcar en $resultado
	oci_execute($sentencia);
	echo "Sentencia ejecutada</br>";

	// Cerrar la conexión
	oci_close($conexion);
	echo "Conexión cerrada";


?>
