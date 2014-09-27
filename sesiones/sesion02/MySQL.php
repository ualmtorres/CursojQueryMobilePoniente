<?php
include_once("conectarMySQL.php");

class MySQL {
	private $conexion;

	public function __construct() {
		$this->conexion = mysqli_connect(HOST, USER, PASSWORD, BD);
	}

	public function __destruct() {

	}

	public function getResultSetFromSQL($sql) {
		$resultado = mysqli_query($this->conexion, $sql);

		return $resultado;
	}

	public function freeResultSet($resultado) {
		mysqli_free_result($resultado);
	}

	public function getArrayFromResultSet($resultado) {
		$fila = mysqli_fetch_array($resultado);

		return $fila;
	}

	public function runSQL($sql) {
		mysqli_query($this->conexion, $sql);
	}

	public function closeConnection() {
		mysqli_close($this->conexion);
	}
}
?>