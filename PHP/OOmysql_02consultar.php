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
	$cadenaSQL = "SELECT * 
			FROM vinos 
			WHERE DOVino = 'Somontano'  AND 
			cosechaVino > 2010";

	// Ejecutar la consulta y volcar en $resultado
	$resultado = $conexion->query($cadenaSQL);

	// Cabecera de la tabla
	echo "<table><tr>";
	echo "<th>Vino</th>";
	echo "<th>Productor</th>";
	echo "<th>Precio</th>";
	echo "</tr>";

	// Iterar sobre los registros y colocarlos como filas en la tabla
	while ($fila = $resultado->fetch_array()) {
		echo "<tr>";
		echo "<td>" . $fila['vino'] . "</td>";
		echo "<td>" . $fila['productorVino'] . "</td>"; 
		echo "<td>" . $fila['precioVino'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";

	// Cerrar la conexión
	$conexion->close();
	echo "Conexión cerrada";
?>