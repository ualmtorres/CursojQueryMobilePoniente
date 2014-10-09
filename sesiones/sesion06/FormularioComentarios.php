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

                $cadenaSQL = "SELECT vino FROM vinos WHERE idVino = ?";

                $sentencia = mysqli_stmt_init($conexion);

                mysqli_stmt_prepare($sentencia, $cadenaSQL);

                mysqli_stmt_bind_param($sentencia, "s", $idVino);

                mysqli_stmt_execute($sentencia);

                mysqli_stmt_bind_result($sentencia, $vino);

                mysqli_stmt_fetch($sentencia);

                echo "<br/>";

                echo "<ul data-role='listview'>";
                echo "<li>";
                echo "<img src='imagenes/$idVino" . "_thu_1.jpg'>";
                echo "<h4>$vino</h4>";
                echo "</li>";
                echo "</ul>";

                echo "<br/>";

                mysqli_close($conexion);
            ?>

            <form method = "post" action = "guardarComentario.php">
                <ul data-role = "listview" data-inset = "true">
                    <li data-role = "list-divider">Deja tu opinión</li>
                     <li>
                        <label for = "valoracion">Valoración: </label>
                        <input type="range" id = "valoracion" name = "valoracion" min="0" max="5" value = "0" data-highlight = "true">
                    </li>
                     <li><input type = "text" name = "comentario"></li>
                </ul>
                <a href = "vinos.php?idVino=<?php echo $idVino; ?>" data-role = "button">Cancelar</a>
                <input type = "submit" value = "Enviar" class = "ui-btn-active" data-theme = "b">
            </form>

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
