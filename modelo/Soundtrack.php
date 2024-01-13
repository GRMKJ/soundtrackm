<?php 
require_once('Modelo.php');

class Soundtrack extends Modelo {
	public $id;
	public $nombre;
	public $compositor;
	public $nodiscos;
	public $añolanzamiento;
	public $catalogo;
	public $barcode;
	public $coverart;

	function __construct() {
		parent::__construct();
		$this->tabla = "soundtrack";
	} 

	function lista() {
		$this->consulta = "select * from $this->tabla";

		return $this->encuentraTodos();
	}

	function recuperaRegistro($ID) {
		$this->consulta = "select * from $this->tabla where id = $ID";

	 	$dato = $this->encuentraUno();	
	 	
	 	if ( isset($dato) ) {
	 		$this->nombre = $dato->nombre;
	 		$this->compositor = $dato->compositor;
	 		$this->nodiscos = $dato->nodiscos;
	 		$this->añolanzamiento = $dato->añolanzamiento;
	 		$this->catalogo = $dato->catalogo;
	 		$this->barcode = $dato->barcode;
			$this->coverart = $dato->coverart;
	 	}
	}

	function insertaRegistro() {
		$this->traerDatos();

		$this->consulta = 
		"insert into $this->tabla (id,nombre,compositor,nodiscos,añolanzamiento,catalogo,barcode,coverart) ".
		"values ( " .
		"$this->id," .
		"'$this->nombre',".
		"'$this->compositor',".
		"$this->nodiscos,".
		"'$this->añolanzamiento',".
		"'$this->catalogo',".
		"'$this->barcode',".
		"'$this->coverart');";

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

		if($_FILES['coverart']['error']!=4){
			$this->consulta = 
			"update $this->tabla set " .
			"nombre = '$this->nombre',".
			"compositor = '$this->compositor',".
			"nodiscos = $this->nodiscos,".
			"añolanzamiento = '$this->añolanzamiento',".
			"catalogo = '$this->catalogo'," .
			"coverart = '$this->coverart'," .
			"barcode = '$this->barcode'".
			"where id = $this->id;";
		}
		else{
			$this->consulta = 
			"update $this->tabla set " .
			"nombre = '$this->nombre',".
			"compositor = '$this->compositor',".
			"nodiscos = $this->nodiscos,".
			"añolanzamiento = '$this->añolanzamiento',".
			"catalogo = '$this->catalogo',".
			"barcode = '$this->barcode'".
			"where id = $this->id;";
		}


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
		$this->nombre = $_POST['nombre'];
		$this->compositor = $_POST['compositor'];
		$this->nodiscos = $_POST['nodiscos'];
		$this->añolanzamiento = $_POST['añolanzamiento'];
		$this->catalogo = $_POST['catalogo'];
		$this->barcode = $_POST['barcode'];
		if($_FILES['coverart']['error']!=4){
			$this->coverart = addslashes(file_get_contents($_FILES['coverart']['tmp_name']));
		}
	
	}

	function validarDatos(){
		$errores = array();
		
		return $errores;
		
	}

}

?>