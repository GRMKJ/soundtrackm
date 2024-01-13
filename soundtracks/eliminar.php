<?php 
ob_start();
require_once('../modelo/Soundtrack.php');
require_once('Security.php');

$soundtrack = new Soundtrack();
if (isset($_GET['id'])) {
    $soundtrack->eliminaRegistro($_GET['id']);
}

header("Location: index.php"); // Redireccionamiento 
?>