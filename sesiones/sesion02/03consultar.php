<?php
	// Incluir el archivo de datos de conexión
	include_once("datosConexion.php");

	// Realizar la conexión de forma procedimental
	$conexion = oci_connect(USER, PASSWORD, BD) or
					die("Error al conectar");

	echo "Conectado de forma procedimiental";

	// Crear la cadena SQL
	//$cadenaSQL = "select * from vinos WHERE DOVino = 'Somontano' AND cosechaVino > 2010";
	$cadenaSQL = "select * from vinos WHERE idVino like 'ZZ%'";

	// Prepara una sentencia
	$sentencia = oci_parse($conexion, $cadenaSQL);

	// Ejecutar la consulta y volcar en $resultado
	oci_execute($sentencia);

	echo "Recuperando como array mixto<br/>";

	// Cabecera de la tabla
	echo "<table><tr>";
	echo "<th>idVino</th>";
	echo "<th>Vino</th>";
	echo "<th>Productor</th>";
	echo "<th>Precio</th>";
	echo "</tr>";

	// Iterar sobre los registros y colocarlos como filas en la tabla
	// OJO !! LOS NOMBRES DE LOS CAMPOS HAN DE IR EN MAYUSCULA
	while ($fila = oci_fetch_object($sentencia, OCI_ASSOC+OCI_RETURN_NULLS)) {
		echo "<tr>";
		echo "<td>" . $fila->IDVINO . "</td>";
		//echo "<td>" . $fila['VINO'] . "</td>";
		//echo "<td>" . $fila['PRODUCTORVINO'] . "</td>"; 
		//echo "<td>" . $fila['PRECIOVINO'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";
	// Cerrar la conexión
	oci_close($conexion);
	echo "Conexión cerrada";


?>
