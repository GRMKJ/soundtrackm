<?php 
ob_start();
session_start();
require_once('modelo/Usuario.php');

$usuario = new Usuario();
$placeholder = new Usuario();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport">
  <link rel="icon" type="image/png" href="imagenes/icon16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="imagenes/icon24.png" sizes="24x24">
  <link rel="icon" type="image/png" href="imagenes/icon32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="imagenes/icon48.png" sizes="48x48">
  <title>SASPG - Iniciar Sesion</title>
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body style="background-color:#001122">
<?php 

if(isset($_SESSION["sesion"])== true){
    header("Location: soundtracks/index.php");
}

else{
    if (isset($_POST['username']) && isset($_POST['passwrd'])) {
        $placeholder->username = $_POST['username'];
        $placeholder->passwrd = md5($_POST['passwrd']);
        $usuario->login();

        if ($usuario->passwrd == $placeholder->passwrd){
            $_SESSION["sesion"]=$usuario->id;
            header("Location: soundtracks/index.php");
        }
        else{
            ?>
            <div class="alert alert-danger" role="alert">
                <?='Username o Password invalidos'?>
            </div>
            
        <?php
            }
    }
}
?>
    <section class="w-100">
        <div class="container-fluid mb-xxl-3">
            <div class="row w-100 justify-content-center">
                <div class="col col-10 col-xxl-6 mt-5 mb-5 mt-xxl-3 mb-xxl-5">
                    <div class="mt-5">
                        <h2 class="p-3 text-center text-white">Bienvenido al SASPG (Sistema de Administracion de Soundtracks en Posesion de Gabo)</h2>
                    </div>
                    <div class="d-flex justify-content-center w-100 mt-xxl-5 mb-xxl-2 mp-5">
                        <img class="img-fluid w-50" src="imagenes/vinyl.png" alt="Vinyl">
                    </div>
                </div>
                <div class="col col-10 mt-5 mt-xxl-3 mb-xxl-5 col-xxl-3">
                    <div class="d-flex w-100 justify-content-center mt-5">
                        <div id="login" class="card mt-xxl-5 mb-xxl-5">
                            <div class="p-2">
                            </div>
                            <div class="d-flex mb-5 mt-5 w-100 justify-content-center">
                                <svg  id="loginlogo" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </div>
                            <div class="d-flex w-100 justify-content-center">
                                <p class="fs-3 fw-bold"> Iniciar Sesión </p>
                            </div>
                            <div class="w-100 ps-4 pe-4 mb-3">
                            <form name="frmInsProd" method="post" action="index.php">
                            <table class="table bg-white mb-3">
                                <tr>
                                    <td style="vertical-align:middle" align="center"><b>Username</b></td>
                                    <td style="vertical-align:middle"><input type="text" name="username" value="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle" align="center"><b>Password</b></td>
                                    <td style="vertical-align:middle"><input type="password" name="passwrd" value="" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align:middle" align="center" colspan="2">
                                        <button type="submit" class="btn btn-success"><i class="bi bi-save-fill"></i>&nbsp;Iniciar Sesion</button>
                                    </td>
                                </tr>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      <!-- Pie de Pagina -->
    <footer>
        <div id="footerinos" class="container-fluid">
        <div class="row justify-content-md-center ps-sm-5 pe-sm-5 pb-lg-5 m-0 text-white">
                
                <div class="d-flex col-lg-5 mt-5 justify-content-center">
                    <p div class="h7 text-center mt-5">Gabriel Romero Moscoso | Todos los derechos reservados © 2023
                    </p>
                </div>

            </div>
        </div>
    </footer>
</body>
</html>