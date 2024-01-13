<?php 
require_once('Modelo.php');

class Usuario extends Modelo {
	public $id;
	public $username;
	public $passwrd;

	function __construct() {
		parent::__construct();
		$this->tabla = "usuario";
	} 

	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($ID) {
		$this->consulta = "select * from $this->tabla where ID = $ID";

	 	$dato = $this->encuentraUno();	
	 	
	 	if ( isset($dato) ) {
	 		$this->username = $dato->username;
	 		$this->passwrd = $dato->passwrd;
	 	}
	}

	function insertaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"insert into $this->tabla (id,username,passwrd) ".
		"values ( " .
		"$this->id," .
		"'$this->username',".
		"'$this->passwrd');";

		echo $this->consulta;
		
		$errores=$this->validarDatos();

		if (count($errores)==0){
			$this->ejecutaComandoIUD();
			return $errores;
		}
		else {
			return $errores;
		}

	}

	function actualizaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"update $this->tabla set " .
		"username = '$this->username',".
		"passwrd = '$this->passwrd'" .
		"where id = $this->id;";
		
		echo $this->consulta;

		$errores=$this->validarDatos();

		if (count($errores)==0){
			echo 'Consulta Exitosa';
			$this->ejecutaComandoIUD();
			return $errores;
		}
		else {
			return $errores;
		}
	}

	function eliminaRegistro($ID) {
		$this->consulta = 
		"delete from $this->tabla ".
		"where id = $ID;";

		$this->ejecutaComandoIUD();
	}

	function traerDatos(){
		$this->id = $_POST['id'];
		$this->username = $_POST['username'];
		$this->passwrd = md5($_POST['passwrd']);
	}

	function validarDatos(){
		$errores = array();
		
		return $errores;
		
	}
	function login(){
		
		$this->username = $_POST['username'];
	
		$this->consulta = "select * from $this->tabla where username = '$this->username'";

		$dato = $this->encuentraUno();
		
		if ( isset($dato) ) {
            $this->id = $dato->id;
            $this->username = $dato->username;
            $this->passwrd = $dato->passwrd;
		}
	}
}
?>