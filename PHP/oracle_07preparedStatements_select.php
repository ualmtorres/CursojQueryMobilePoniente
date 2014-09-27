<?php
	// Incluir el archivo de datos de conexión
	include_once("oracle_00datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = oci_connect(USER, PASSWORD, BD) or
					die("Error al conectar");

	// Informar de la conexión
	echo "Conectado de forma procedimiental";

	// Crear la cadena SQL
	$cadenaSQL = "select * 
				from vinos 
				WHERE DOVino = :DOVino AND cosechaVino > :cosechaVino";

	// Prepara una sentencia
	$sentencia = oci_parse($conexion, $cadenaSQL);

	// Asociar los parámetros a la consulta
	$DOVino = "Somontano";
	$cosechaVino = 2010;

	oci_bind_by_name($sentencia, ":DOVino", $DOVino);
	oci_bind_by_name($sentencia, ":cosechaVino", $cosechaVino);

	// Ejecutar la consulta y volcar en $resultado
	oci_execute($sentencia);

	// Cabecera de la tabla
	echo "<table><tr>";
	echo "<th>Vino</th>";
	echo "<th>Productor</th>";
	echo "<th>Precio</th>";
	echo "</tr>";

	// Iterar sobre los registros y colocarlos como filas en la tabla
	// OJO !! LOS NOMBRES DE LOS CAMPOS HAN DE IR EN MAYUSCULA
	while ($fila = oci_fetch_array($sentencia)) {
		echo "<tr>";
		echo "<td>" . $fila['VINO'] . "</td>";
		echo "<td>" . $fila['PRODUCTORVINO'] . "</td>"; 
		echo "<td>" . $fila['PRECIOVINO'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";

	// Cerrar la conexión
	oci_close($conexion);
	echo "Conexión cerrada";	
?>
