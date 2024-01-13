<?php
class Modelo {
	protected $host ="localhost";
	protected $user = "root";
	protected $contraseña = "";
	protected $database = "soundrecord";
	protected $mbd;
	protected $tabla;
	protected $consulta;

	function __construct() {
		try {
    		$this->mbd = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->contraseña);
		} 
		catch (PDOException $e) {
		    print "Error: Constuctor ". $e->getMessage() . "<br/>";
		    die();
		}
	}
	function __destruct() {
		$mbd = null;
	}

	function encuentraTodos() {
		try {

		    $stm = $this->mbd->query($this->consulta);
				
		    $filas = $stm->fetchAll(PDO::FETCH_OBJ);

		} catch (PDOException $e) {
		    print "Error: Find All " . $e->getMessage() . "<br>";
		    die();
		}
	    return $filas;
	}

	function encuentraUno() {
		try {

		    $stm = $this->mbd->query($this->consulta);

		    $fila = $stm->fetch(PDO::FETCH_OBJ);

		} catch (PDOException $e) {
		    print "Error: Find One ". $e->getMessage() . "<br>".$this->consulta;
		    die();
		}
	    return $fila;
	}

	function ejecutaComandoIUD() {
		try {

		    $result = $this->mbd->query($this->consulta);

		} catch (PDOException $e) {
		    print "Error: ExecuteIUD " . $e->getMessage() . "<br/>".$this->consulta;
		    die();
		}
	    return $result;
	}
}
?>