<?php
namespace App\View;

require '../../vendor/autoload.php';

use App\Controller\controleDeLogins;

session_start();

$mensagem = '';

if ($_POST) {
    $nomeUsuario = $_POST['nomeUsuario'];
    $senha = $_POST['senha'];

    if ($mensagem == '') {
        $controle = new controleDeLogins();
        $_SESSION['mensagem'] = $controle->login($nomeUsuario, $senha);
    }
}

?>

    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
            crossorigin="anonymous">
        <link rel="stylesheet" href="css\style.css">
        <title>Login</title>
    </head>

    <body>
        <?php 
        include 'Components/navbarInterna.php';
        ?>

        <div class="container-fluid bg-transparent">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 class="text-center font-weight-bold mx-auto display-1 font-weight-light">Login</h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <!-- Formulario -->
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Nome de usuario" class="form-control m-1 ">
                            <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control m-1">

                            <button type="submit" id="btnCadastro" name="btnCadastro" class="btn btn-danger form-control m-1">Logar</button>
                        </div>
                    </form>
                    <!-- //Formulario -->

                    <?php
                    if (isset($_SESSION['mensagem'])) {
                        switch ($_SESSION['mensagem']) {
                            case "Deu bom": ?>
                        <?php header("Location: ..\..\index.php"); ?>

                        <?php
                        break;
                    case "":

                        break;
                    default: ?>
                            <p class="text-danger border border-danger text-center">
                                <?php echo $_SESSION['mensagem'];;
                        }
                    } ?>
                            </p>
                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
        <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
    </body>

    </html>