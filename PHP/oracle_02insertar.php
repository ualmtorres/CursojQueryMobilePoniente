<?php
	// Incluir el archivo de datos de conexión
	include_once("oracle_00datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = oci_connect(USER, PASSWORD, BD) or
					die("Error al conectar");

	// Informar de la conexión
	echo "Conectado de forma procedimiental<br/>";

	// Crear la cadena SQL
	$cadenaSQL = "INSERT INTO VINOS(IDVINO, VINO, DOVINO, PRECIOVINO) 
				VALUES('ZZZZZZZ', 'Vino Z', 'Somontano', 10)";

	// Prepara una sentencia
	$sentencia = oci_parse($conexion, $cadenaSQL);

	// Ejecutar la consulta y volcar en $resultado
	oci_execute($sentencia);
	echo "Sentencia ejecutada</br>";

	// Cerrar la conexión
	oci_close($conexion);
	echo "Conexión cerrada<br/>";	
?>
