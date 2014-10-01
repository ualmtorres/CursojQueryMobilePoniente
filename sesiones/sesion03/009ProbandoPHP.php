<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>
	<meta name="viewport"
         content="width=device-width, initial-scale=1, user-scalable=no"/>
</head>
<body>

<!-- Página -->
<div id = "page1" data-role="page">

	<!-- Cabecera -->
	<div data-role="header" data-position = "fixed">
  		<!-- Botón a la izquierda con imagen establecida con data-icon -->
  		<a href = "#salir" data-role = "button" data-icon = "shop" data-transition="slide" data-iconpos = "notext"></a>
  		<h1>Mi App</h1>
  		<!-- Botón a la derecha con imagen establecida con data-icon -->
  		<a href = "#entrar" data-role = "button" data-icon = "forward" data-transition="slide" data-iconpos = "right">Entrar</a>
	</div>

	<!-- Cuerpo -->
	<div data-role = "content">
 		<p>
 			<?php
 				echo 2*2;
 			?>
 		</p>
	</div>

	<!-- Pie -->
	<div data-role="footer" data-position="fixed">
		<!-- Barra de navegación data-role = navbar -->
		<div data-role = "navbar">
 			<ul>
				<li>
					<a href = "#salir" data-role = "button" data-icon = "home">Salir</a> 
				</li>

				<li>
					<a href = "#entrar" data-role = "button" data-icon = "forward" class = "ui-btn-active">Entrar</a>
				</li>
			</ul>
		</div>
	</div>

<!-- Fin página -->


<!-- Página -->
<div id = "salir" data-role="page">

	<!-- Cabecera -->
	<div data-role="header">
		<a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
  		<h1>Mi App</h1>
	</div>

	<!-- Cuerpo -->
	<div data-role = "content">
 		<p>Salir</p>
	</div>

	<!-- Pie -->
	<div data-role="footer">
  		<h1>Pie</h1>
	</div>
</div>
<!-- Fin página -->

<!-- Página -->
<div id = "entrar" data-role="page">

	<!-- Cabecera -->
	<div data-role="header">
		<a href="#" data-icon="back" data-rel="back" title="Go back">Back</a>
  		<h1>Mi App</h1>
	</div>

	<!-- Cuerpo -->
	<div data-role = "content">
 		<p>Entrar</p>
	</div>

	<!-- Pie -->
	<div data-role="footer">
  		<h1>Pie</h1>
	</div>
</div>
<!-- Fin página -->
</body>
</html>
