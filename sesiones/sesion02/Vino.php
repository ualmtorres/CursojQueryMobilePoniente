<?php
require_once("MySQL.php");

class Vino {
	private $idVino;
	private $vino;
	private $cosechaVino;
	private $precioVino;
	private $tipoVino;
	private $DOVino;
	private $paisVino;
	private $productorVino;
	private $uvasVino;

	public function __construct($idVino, $vino, $cosechaVino, $precioVino, $tipoVino, $DOVino, $paisVino, $productorVino, $uvasVino) {
		$this->idVino = $idVino;
		$this->vino = $vino;
		$this->cosechaVino = $cosechaVino;
		$this->precioVino = $precioVino;
		$this->tipoVino = $tipoVino;
		$this->DOVino = $DOVino;
		$this->paisVino = $paisVino;
		$this->productorVino = $productorVino;
		$this->uvasVino = $uvasVino;
	}

	public function __destruct() {

	}

	public function getIdVino() {
		return $this->idVino;
	}

	public function getVino() {
		return $this->vino;
	}

	public function getCosechaVino() {
		return $this->cosechaVino;
	}

	public function getPrecioVino() {
		return $this->precioVino;
	}

	public function getTipoVino() {
		return $this->tipoVino;
	}

	public function getDOVino() {
		return $this->DOVino;
	}

	public function getPaisVino() {
		return $this->paisVino;
	}

	public function getProductorVino() {
		return $this->productorVino;
	}

	public function getUvasVino() {
		return $this->uvasVino;
	}

	public function setIdVino($idVino) {
		$this->idVino = $idVino;
	}

	public function setVino($vino) {
		$this->vino = $vino;
	}

	public function setCosechaVino($cosechaVino) {
		$this->cosechaVino = $cosechaVino;
	}

	public function setPrecioVino($precioVino) {
		$this->precioVino = $precioVino;
	}

	public function setTipoVino($tipoVino) {
		$this->tipoVino = $tipoVino;
	}

	public function setDOVino($DOVino) {
		$this->DOVino = $DOVino;
	}

	public function setPaisVino($paisVino) {
		$this->paisVino = $paisVino;
	}

	public function setProductorVino($productorVino) {
		$this->productorVino = $productorVino;
	}

	public function setUvasVino($uvasVino) {
		$this->uvasVino = $uvasVino;
	}

	public function search() {
		$encontrado = false;

		$miMySQL = new MySQL();

		$sql = "SELECT * FROM vinos WHERE idVino = '$this->idVino'";

		$resultado = $miMySQL->getResultSetFromSQL($sql);

		if ($fila = $miMySQL->getArrayFromResultSet($resultado)) {
			$this->vino = $fila['vino'];
			$this->cosechaVino = $fila['cosechaVino'];
			$this->precioVino = $fila['precioVino'];
			$this->tipoVino = $fila['tipoVino'];
			$this->DOVino = $fila['DOVino'];
			$this->paisVino = $fila['paisVino'];
			$this->productorVino = $fila['productorVino'];
			$this->uvasVino = $fila['uvasVino'];
		
			$encontrado = true;
		}

		$miMySQL->freeResultSet($resultado);
		$miMySQL->closeConnection();

		return $encontrado;
	}

	function insert() {
		$miMySQL = new MySQL();

		$sql = "INSERT INTO vinos (
					idVino, 
					vino, 
					cosechaVino, 
					precioVino,
					tipoVino, 
					DOVino, 
					paisVino, 
					productorVino, 
					uvasVino) 
				VALUES(
					'$this->idVino', 
					'$this->vino', 
					$this->cosechaVino, 
					$this->precioVino,
					'$this->tipoVino', 
					'$this->DOVino', 
					'$this->paisVino', 
					'$this->productorVino', 
					'$this->uvasVino')";

		$miMySQL->runSQL($sql);
		$miMySQL->closeConnection();
	}

	function update() {
		$miMySQL = new MySQL();
		$sql = "UPDATE vinos SET 
					idVino = '$this->idVino', 
					vino = '$this->vino', 
					cosechaVino = $this->cosechaVino, 
					precioVino = $this->precioVino,
					tipoVino = '$this->tipoVino', 
					DOVino = '$this->DOVino', 
					paisVino = '$this->paisVino', 
					productorVino = '$this->productorVino', 
					uvasVino = '$this->uvasVino'
				WHERE idVino = '$this->idVino'";

		$miMySQL->runSQL($sql);
		$miMySQL->closeConnection();
	}

	function delete() {
		$miMySQL = new MySQL();
		$sql = "DELETE FROM vinos 
				WHERE idVino = '$this->idVino'";

		$miMySQL->runSQL($sql);
		$miMySQL->closeConnection();
	}
}
?>