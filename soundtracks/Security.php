<?php 
session_start();
require_once('../modelo/Usuario.php');

$ua = new Usuario();
if(isset($_SESSION['sesion'])){
    $ua->recuperaRegistro($_SESSION['sesion']);
}
else{
    session_destroy();
    header("Location: ../../inicio.php");
}
?>