<?php
	// Incluir el archivo de datos de conexión
	include_once("mysql_00datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = mysqli_connect(HOST, USER, PASSWORD, BD) or
					die("Error al conectar");

	// Informar de la conexión
	echo "Conectado de forma procedimiental";

	// Crear la cadena SQL
	$cadenaSQL = "SELECT * 
			FROM vinos 
			WHERE DOVino = 'Somontano' AND 
			cosechaVino > 2010";

	// Ejecutar la consulta y volcar en $resultado
	$resultado = mysqli_query($conexion, $cadenaSQL);

	// Cabecera de la tabla
	echo "<table><tr>";
	echo "<th>Vino</th>";
	echo "<th>Productor</th>";
	echo "<th>Precio</th>";
	echo "</tr>";

	// Iterar sobre los registros y colocarlos como filas en la tabla
	while ($fila = mysqli_fetch_array($resultado)) {
		echo "<tr>";
		echo "<td>" . $fila['vino'] . "</td>";
		echo "<td>" . $fila['productorVino'] . "</td>"; 
		echo "<td>" . $fila['precioVino'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";

	// Cerrar la conexión
	mysqli_close($conexion);
	echo "Conexión cerrada";	
?>
