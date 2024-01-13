<?php 
ob_start();
require_once('../modelo/Soundtrack.php');
require_once('Security.php');

$soundtrack = new Soundtrack();


if ($_GET['id']) {
    $soundtrack->id = $_GET['id'];
    $soundtrack->recuperaRegistro($soundtrack->id);
}
?>
<html>
<head>
  <link rel="icon" type="image/png" href="../imagenes/icon16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="../imagenes/icon24.png" sizes="24x24">
  <link rel="icon" type="image/png" href="../imagenes/icon32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="../imagenes/icon48.png" sizes="48x48">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>SASPG - Detalles de Soundtrack</title>
  <link rel="stylesheet" href="../../../css/custom.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script type="text/javascript">
    function confirma(miurl) {
   
      question = confirm("¿Esta seguro de eliminar este elemento?")
      if (question !="0"){
          top.location = miurl;   }
  }
  </script>
</head>
<body style="background-color:#2f364f">

<div class="container w-50 py-2 justify-content-center">
  <div class="card mt-4">
    <div class="form-group mt-2 mb-2">
        <a href="index.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Regrear</a>
        <h2 class="mt-4 text-black ms-5">Detalles del soundtrack</h2>
    </div>
    <input type="hidden" name="id" value="<?=$soundtrack->id?>">
  	<table class="table">
      <tr>
        <td colspan="4" align="center">
          <img src="data:image/jpg;base64,<?=base64_encode($soundtrack->coverart)?>" width="300px" height="300px">
        </td>     
      </tr>
      <tr>
        <td colspan="1">
          <label class="control-label fw-bold">Nombre del Soundtrack</label>
        </td>
        <td colspan="3">
            <span><?=$soundtrack->nombre?></span>
        </td>        
      </tr>
    <tr>
        <td colspan="1">
        	<label class="control-label fw-bold">Compositor Principal</label>
        </td>
        <td colspan="3">
          <span><?=$soundtrack->compositor?></span>
        </td>       
    </tr>
    <tr>
        <td>
        	<label class="control-label fw-bold">No. de Discos</label>
        </td>
        <td>
          <span><?=$soundtrack->nodiscos?></span>
        </td> 
        <td>
        	<label class="control-label fw-bold">Año de Lanzamiento</label>
        </td>
        <td>
          <span><?=$soundtrack->añolanzamiento?></span>
        </td>        
    </tr>
    <tr>
        <td>
        	<label class="control-label fw-bold">No de Catalogo</label>
        </td>
        <td>
          <span><?=$soundtrack->catalogo?></span>
        </td> 
        <td>
        	<label class="control-label fw-bold">Codigo de Barras</label>
        </td>
        <td>
          <span><?=$soundtrack->barcode?></span>
        </td>        
    </tr>
     <tr>
        <td colspan="4">
			<div class="form-group">
        <a class="btn btn-primary" href="modificar.php?id=<?=$soundtrack->id?>"><i class="bi bi-pencil-fill"></i> Modificar Soundtrack</a>&nbsp;
        <a class="btn btn-danger" href="eliminar.php?id=<?=$soundtrack->id?>"><i class="bi bi-trash-fill"></i> Eliminar Soundtrack</a>
			</div>
      </td>
    </tr>
  </table>
</div>
</div>
</body>
</html>