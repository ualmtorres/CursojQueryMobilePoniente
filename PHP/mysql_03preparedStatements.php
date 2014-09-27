<?php
	// Incluir el archivo de datos de conexión
	include_once("mysql_00datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = mysqli_connect(HOST, USER, PASSWORD, BD) or
					die("Error al conectar");
	// Informar de la conexión
	echo "Conectado de forma procedimiental";

	// Crear la cadena SQL
	$cadenaSQL = "SELECT vino, precioVino, productorVino 
		FROM vinos 
		WHERE DOVino = ? AND cosechaVino > ?";

	// Crear la sentencia preparada
	$sentencia = mysqli_stmt_init($conexion);
	mysqli_stmt_prepare($sentencia, $cadenaSQL);

	// Asociar los parámetros a la consulta
	$DOVino = "Somontano";
	$cosechaVino = 2010;

	mysqli_stmt_bind_param($sentencia, "si", $DOVino, $cosechaVino);

	// Ejecutar la consulta
	mysqli_stmt_execute($sentencia);

	// Establecer variables de resultado
	mysqli_stmt_bind_result($sentencia, $vino, $precioVino, $productorVino);

	// Cabecera de la tabla
	echo "<table><tr>";
	echo "<th>Vino</th>";
	echo "<th>Productor</th>";
	echo "<th>Precio</th>";
	echo "</tr>";

	// Iterar sobre los registros y colocarlos como filas en la tabla
	while (mysqli_stmt_fetch($sentencia)) {
		echo "<tr>";
		echo "<td>" . $vino . "</td>";
		echo "<td>" . $precioVino . "</td>"; 
		echo "<td>" . $productorVino . "</td>";
		echo "</tr>";
	}

	echo "</table>";

	// Cerrar la sentencia
	mysqli_stmt_close($sentencia);

	// Cerrar la conexión
	mysqli_close($conexion);
	echo "Conexión cerrada";	
?>
