<!DOCTYPE html>
<html>
    <?php
        require_once("cabecera.php");
    ?>
<body>

<!-- Página -->
<div id = "page1" data-role="page">

	<!-- Cabecera -->
	<div data-role="header" data-position = "fixed">
  		<h1>Supervinos</h1>
	</div>
	<!-- Cuerpo -->
	<div data-role = "content">
		<ul data-role = "listview" data-inset = "false" data-filter="true" data-filter-placeholder = "Denominación de origen ...">
            <?php
                require_once("constantes.php");

                $conexion = mysqli_connect(HOST, USER, PASS, BD) or die("Error al conectar");  

                $cadenaSQL = "SELECT tipoVino, COUNT(*) AS cuenta FROM vinos GROUP BY tipoVino ORDER BY tipoVino";

                $sentencia = mysqli_stmt_init($conexion);
                mysqli_stmt_prepare($sentencia, $cadenaSQL);

                mysqli_stmt_execute($sentencia);

                mysqli_stmt_bind_result($sentencia, $tipoVino, $cuenta);

                while (mysqli_stmt_fetch($sentencia)) {
                    echo "<li>";
                    echo "<a href = 'vinosPorTipo.php?tipo=$tipoVino'>" . $tipoVino . "<span class = 'ui-li-count'>" . $cuenta . "</span></a>";
                    echo "</li>";

                }

                mysqli_close($conexion);
            ?>
		</ul>
	</div>

	<!-- Pie -->
</div>
<!-- Fin página -->



</body>
</html>
