<?php 
ob_start();
require_once('../modelo/Soundtrack.php');
require_once('Security.php');

$soundtrack = new Soundtrack();
$placeholder = new Soundtrack();


?>
<html>
<head>
    <title>SASPG - Agregar Soundtrack</title>
    <link rel="icon" type="image/png" href="../imagenes/icon16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="../imagenes/icon24.png" sizes="24x24">
    <link rel="icon" type="image/png" href="../imagenes/icon32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="../imagenes/icon48.png" sizes="48x48">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../../../css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body style="background-color:#001122">
<div class="container py-2 w-50">
<?php 
if (isset($_POST['id'])) {
    $placeholder->traerDatos();
    $error = $soundtrack->insertaRegistro();
    if (count($error)==0){
        header("Location: index.php");
    }
    else{?>
        <div class="alert alert-danger" role="alert">
            <?='algo salio mal'?>
        </div>
        
    <?php
        }

    }
?>
</div>
<div class="container py-2 w-50 justify-content-center">
    <div class="card ">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Regresar</a>
        <h2 class="mt-4 text-black ms-5 ">Agregar un Soundtrack</h2>
    </div>
    <form name="frmInsProd" method="post" action="insertar.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="null">
  	<table class="table mt-4">
    <tr>
        <td colspan="2">
        	<label class="control-label ms-2">Nombre del Soundtrack</label>
        	<input type="text" name="nombre" placeholder="Nombre del Soundtrack" value="<?=$placeholder->nombre?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td colspan="2">
        	<label class="control-label ms-2">Compositor Principal</label>
        	<input type="text" name="compositor" placeholder="Compositor del Soundtrack" value="<?=$placeholder->compositor?>" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        	<label class="control-label ms-2">No. de Discos</label>
        	<input type="text" name="nodiscos" placeholder="No. de Discos" value="<?=$placeholder->nodiscos?>" class="form-control">
        </td>
        <td>
        	<label class="control-label ms-2">Año de Lanzamiento</label>
        	<input type="text" name="añolanzamiento" placeholder="Año de Lanzamiento" value="<?=$placeholder->añolanzamiento?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td>
        	<label class="control-label ms-2">No de Catalogo</label>
        	<input type="text" name="catalogo" placeholder="No de Catalogo" value="<?=$placeholder->catalogo?>" class="form-control">
        </td>
        <td>
        	<label class="control-label ms-2">Codigo de Barras</label>
        	<input type="text" name="barcode" placeholder="Codigo de Barras" value="<?=$placeholder->barcode?>" class="form-control">
        </td>
     </tr>
     <tr>
        <td colspan="2">
        	<label class="control-label ms-2">Coverart del Soundtrack</label>
        	<input type="file" name="coverart" placeholder="Cover Art del Soundtrack" value="" class="form-control">
            <label class="form-text ms-2">Debe ser un archivo *.JPG</label>
        </td>
    </tr>
     <tr>
        <td>
			<div class="form-group ms-2">
            <button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i>&nbsp;Guardar Datos</button>
			</div>
        </td>
    </tr>
    </table>
    </form>
</div>
</div>
</body>
</html>