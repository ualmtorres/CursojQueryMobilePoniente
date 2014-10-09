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

                $idVino = $_POST['idVino'];
                $comentario = $_POST['comentario'];
                $valoracion = $_POST['valoracion'];

                $conexion = mysqli_connect(HOST, USER, PASS, BD) or die("Error al conectar");  

                $cadenaSQL = "INSERT INTO comentarios(idVino, valoracion, comentario) VALUES (?, ?, ?)";

                $sentencia = mysqli_stmt_init($conexion);

                mysqli_stmt_prepare($sentencia, $cadenaSQL);

                mysqli_stmt_bind_param($sentencia, "sis", $idVino, $valoracion, $comentario);

                mysqli_stmt_execute($sentencia);

                if (mysqli_affected_rows($conexion) == 1) {
                    echo "<p>Comentario añadido</p>";
                }
                else {
                    echo "<p>Error al añadir comentario</p>";
                }

                mysqli_commit($conexion);

                mysqli_close($conexion);
            ?>

            <a href = "descripcionVino.php?idVino=<?php echo $idVino; ?>" data-role = "button">Volver al vino</a>
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
