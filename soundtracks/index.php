<?php 
ob_start();
require_once('../modelo/Soundtrack.php');
require_once('Security.php');

$soundtrack = new Soundtrack();
$soundtracks = $soundtrack->lista();

?>
<html>
<head>
  <link rel="icon" type="image/png" href="../imagenes/icon16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="../imagenes/icon24.png" sizes="24x24">
  <link rel="icon" type="image/png" href="../imagenes/icon32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="../imagenes/icon48.png" sizes="48x48">
  <title>SASPG - Lista de Soundtracks</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="../css/custom.css">
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
  <header class="w-100">
        <nav class="navbar navbar-expand-lg ps-lg-2 pe-lg-2 ps-xll-5 pe-xll-5">
            <div class="container-fluid">
                <a id="logos" class="navbar-brand me-auto me-lg-5" aria-current="page" href="#">
                <img  id="logo" src="../imagenes/vinyl.png" class="img-fluid float-end w-auto" alt="logo">
                </a>
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="collapse" data-bs-target="#userSupportedContent" aria-controls="userSupportedContent" aria-expanded="false" aria-label="Toggle User">
                <span><i class="bi bi-person-fill"></i></span>
            </button>
            <div class="collapse navbar-collapse ms-2" id="navbarSupportedContent">
                <div class="container justify" id="navbar">
                <div class="container rounded" id="navbart">
                    <ul class="nav nav-pills nav-fill justify-content-center me-auto mt-3 mb-3 mb-lg-0">
                    <li class="nav-item m-0">
                        <a class="nav-link align-middle text-white" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link align-middle text-white" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link align-middle text-white" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link align-middle text-white" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link align-middle text-white" href="#"></a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="collapse navbar-collapse ms-2" id="userSupportedContent">
                <div class="container" id="navbar">
                    <div class="container" id="navbar">
                    <ul class="navbar-nav justify-content-center me-auto mt-3 mb-2 mb-lg-0">
                    <li class="nav-item m-2">
                        <label class="dropdown-item ">Usuario Activo: <?=$ua->username?></label>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item  m-2" href="../../logout.php">Cerrar Sesión</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="navbar-brand align-middle" id="userslong"> 
                <div class="btn-group ms-lg-5 mt-1">
                <button id="useraccess" type="button" class="btn btn-lg dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill" ></i>
                </button>
                <ul id="useraccesslist" class="dropdown-menu">
                    <li><label class="dropdown-item">Usuario Activo: <?=$ua->username?></label></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item " href="../logout.php">Cerrar Sesión</a></li>
                </ul>
                </div>
            </div> 
            </div>
        </nav>
    </header>
  <div class="container-fluid w-75 py-2 z-1">
    <div class="card py-2 m-5">
      <div class="row align-items-end justify-content-evenly">
        <div class="col-2 ps-0 mt-4 ">
          <a href="../logout.php" class="btn btn-danger ms-2"><i class="bi bi-arrow-return-left"></i>&nbsp;Regresar</a>
        </div>
        <div class="col-7">
          <h2 class="mt-4 text-center text-black">Soundtracks en Posesión</h2>
        </div>
        <div class="col-2 ps-0 mt-4 me-0 ms-4 ">
          <a href="insertar.php" class="btn btn-success ms-0"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Soundtrack</a>
        </div>
      </div>
      <table class="table table-striped bg-white">
        <tr>
            <td align="center"><b>Nombre del Soundtrack</b></td>
            <td align="center"><b>Compositor Principal</b></td>
            <td align="center"><b>Año de Lanzamiento</b></td>
            <td align="center"><b></b></td>
        </tr>
        <?php
        foreach ($soundtracks as $soundtrack) {
        ?>
        <tr>
            <td><span title="<?=$soundtrack->nombre?>"><?=$soundtrack->nombre?></span></td>
            <td align="center"><span title="<?=$soundtrack->compositor?>"><?=$soundtrack->compositor?></span></td>
            <td align="center"><span title="<?=$soundtrack->añolanzamiento?>"><?=$soundtrack->añolanzamiento?></span></td>
            <td align="center"><a class="btn btn-primary" href="visualizar.php?id=<?=$soundtrack->id?>" title='Ver datalles del Soundtrack'><i class="bi bi-eye-fill"></i></td>
        </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </div>
</body>
</html>