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

	// Crear la cadena SQL
	$cadenaSQL = "SELECT vino, precioVino, productorVino 
	FROM vinos 
	WHERE DOVino = ? AND cosechaVino > ?";

	// Crear la sentencia preparada
	$sentencia = $conexion->prepare($cadenaSQL);

	// Asociar los parámetros a la consulta
	$DOVino = "Somontano";
	$cosechaVino = 2010;

	$sentencia->bind_param("si", $DOVino, $cosechaVino);

	// Ejecutar la consulta
	$sentencia->execute();

	// Establecer variables de resultado
	$sentencia->bind_result($vino, $precioVino, $productorVino);

	// Cabecera de la tabla
	echo "<table><tr>";
	echo "<th>Vino</th>";
	echo "<th>Precio</th>";
	echo "<th>Productor</th>";
	echo "</tr>";

	// Iterar sobre los registros y colocarlos como filas en la tabla
	while ($sentencia->fetch()) {
		echo "<tr>";
		echo "<td>" . $vino . "</td>";
		echo "<td>" . $precioVino . "</td>"; 
		echo "<td>" . $productorVino . "</td>";
		echo "</tr>";
	}

	echo "</table>";

	// Cerrar la sentencia
	$sentencia->close();

	// Cerrar la conexión
	$conexion->close();
	echo "Conexión cerrada";	
?>