<?php
	require_once("constantes.php");

	$conexion = mysqli_connect(HOST, USER, PASS, BD) or die("Error al conectar");

	echo "Conectado<br/>";

	mysqli_autocommit($conexion, true);

	$cadenaSQL = "SELECT * FROM vinos WHERE idVino like 'RRRR%'";

	$resultado = mysqli_query($conexion, $cadenaSQL);



	echo "<table>";
	echo "<tr>";
	echo "<th>id vino</th>";
	echo "<th>vino</th>";
	echo "</tr>";

	while ($fila = mysqli_fetch_array($resultado)) {
		echo "<tr>";
		echo "<td>" . $fila[0] . "</td>";
		echo "<td>" . $fila['vino'] . "</td>";
		echo "</tr>";

	}

	echo "</table>";

	mysqli_close($conexion);
	echo "Desconectado<br/>";
?>
