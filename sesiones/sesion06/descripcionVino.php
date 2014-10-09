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
        <a href="#" data-icon="back" data-rel="back">Atrás</a>
  		<h1>Supervinos</h1>
	</div>
	<!-- Cuerpo -->
	<div data-role = "content">		
            <?php
                require_once("constantes.php");

                $idVino = $_GET['idVino'];

                $conexion = mysqli_connect(HOST, USER, PASS, BD) or die("Error al conectar");  

                $cadenaSQL = "SELECT vino, precioVino, tipoVino, DOVino, paisVino, productorVino, uvasVino FROM vinos WHERE idVino = ?";

                $sentencia = mysqli_stmt_init($conexion);
                mysqli_stmt_prepare($sentencia, $cadenaSQL);

                mysqli_stmt_bind_param($sentencia, "s", $idVino);

                mysqli_stmt_execute($sentencia);

                mysqli_stmt_bind_result($sentencia, $vino, $precioVino, $tipoVino, $DOVino, $paisVino, $productorVino, $uvasVino);

                mysqli_stmt_fetch($sentencia);

                echo "<br/>";

                echo "<ul data-role='listview'>";
                echo "<li>";
                echo "<img src='imagenes/$idVino" . "_thu_1.jpg'>";
                echo "<h4>$vino</h4>";
                echo "</li>";
                echo "</ul>";

                echo "<br/>";

                echo "<div data-role = 'collapsible-set'>";

                echo "<div data-role = 'collapsible'>";
                echo "<h2>Información</h2>";
                echo "<ul data-role='listview' data-inset='true'>";
                echo "<li>Precio: $precioVino €</li>";
                echo "<li>Tipo: $tipoVino</li>";
                echo "</ul>";
                echo "</div>";

                echo "<div data-role = 'collapsible'>";
                echo "<h2>Detalles</h2>";
                echo "<ul data-role='listview' data-inset='true'>";
                echo "<li>D.O.: $DOVino</li>";
                echo "<li>País: $paisVino</li>";
                echo "<li>Bodega: $productorVino</li>";
                echo "<li>Uva: $uvasVino</li>";
                echo "</ul>";
                echo "</div>";

                echo "</div>";

                echo "<a href = 'formularioComentarios.php?idVino=$idVino' data-role = 'button'>Añadir comentario</a>";

                mysqli_close($conexion);
            ?>
	</div>

	<!-- Pie -->
    <div data-role="footer" data-position="fixed">
        <!-- Barra de navegación data-role = navbar -->
        <div data-role = "navbar">
            <ul>
                <li>
                    <a href = "vinos.php" data-role = "button" data-icon = "home"  class = "ui-btn-active">Inicio</a> 
                </li>

                <li>
                    <a href = "comentarios.php?idVino=<?php echo $idVino; ?>" data-role = "button" data-icon = "grid">Comentarios</a>
                </li>
            </ul>
        </div>
    </div>    
</div>
<!-- Fin página -->



</body>
</html>
