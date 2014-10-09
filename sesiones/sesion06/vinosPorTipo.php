<!DOCTYPE html>
<html>
<head>
    <?php
        require_once("cabecera.php");
    ?>
<body>

<!-- Página -->
<div id = "page1" data-role="page">

	<!-- Cabecera -->
	<div data-role="header" data-position = "fixed">
        <a href="#" data-icon="back" data-rel="back">Atrás</a>
  		<h1>Supervinos</h1>
	</div>
	<!-- Cuerpo -->
	<div data-role = "content">
		<ul data-role = "listview" data-inset = "false" data-filter="true" data-filter-placeholder = "Vino ..." data-autodividers="true">
            <?php
                require_once("constantes.php");

                $tipoVino = $_GET['tipo'];

                $conexion = mysqli_connect(HOST, USER, PASS, BD) or die("Error al conectar");  

                $cadenaSQL = "SELECT idVino, vino, DOVino, precioVino FROM vinos WHERE tipoVino = ? ORDER BY vino";

                $sentencia = mysqli_stmt_init($conexion);
                mysqli_stmt_prepare($sentencia, $cadenaSQL);

                mysqli_stmt_bind_param($sentencia, "s", $tipoVino);

                mysqli_stmt_execute($sentencia);

                mysqli_stmt_bind_result($sentencia, $idVino, $vino, $DOVino, $precioVino);

                while (mysqli_stmt_fetch($sentencia)) {
                    echo "<li>";
                    echo "<a href = 'descripcionVino.php?idVino=$idVino'><img src = 'imagenes/" . $idVino . "_thu_1'>" . "<h4>$vino</h4>" . 
                        "<h4>$tipoVino</h4>" . "<p>$DOVino, $precioVino €</p></a>";
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
