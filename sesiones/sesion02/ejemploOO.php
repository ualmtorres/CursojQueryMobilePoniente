<?php
	include_once("Vino.php");

	$idVino = 'p1';
	$vino = 'Vino P1';
	$cosechaVino = 2010;
	$precioVino = 5;
	$tipoVino = "Crianza";
	$DOVino = "Somontano";
	$paisVino = "España";
	$productorVino = "Productor P1";
	$uvasVino = "Garnacha";

	$miVino = new Vino($idVino, $vino, $cosechaVino, $precioVino, $tipoVino, $DOVino, $paisVino, $productorVino, $uvasVino);

	if ($miVino->search()) {
		echo "Vino encontrado</br>";
	}
	else {
		echo "Vino no encontrado<br/>";
		echo "Insertando vino ... <br/>";
		$miVino->insert();
		echo "Vino insertado<br/>";

		// Comprobar que ahora sí está insertado
		if ($miVino->search()) {
			echo "Vino encontrado</br>";
		}
	}

	echo "Precio vino antes: " . $miVino->getPrecioVino() . "<br/>";

	$miVino->setPrecioVino(10);
	echo "Cambiando precio ...<br/>";

	echo "Precio vino después: " . $miVino->getPrecioVino() . "<br/>";

	$miVino->update();
	echo "Actualizando en la base de datos </br>";

	$miVino->delete();
	echo "Borrando vino de la base de datos ...<br/>";

	// Comprobar que ya no está insertado
	if ($miVino->search()) {
		echo "Vino encontrado</br>";
	}
	else {
		echo "Vino no encontrado<br/>";
	}



?>