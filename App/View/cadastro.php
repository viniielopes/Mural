<?php
namespace App\View;

require '../../vendor/autoload.php';

use App\Controller\controleDeCadastros;

$mensagem = "";

if ($_POST) {
    $nomeUsuario = $_POST['nomeUsuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $controle = new controleDeCadastros();
    $mensagem = $controle->cadastrarUsuario($nomeUsuario, $senha, $email);

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
        <title>Cadastro</title>
    </head>

    <body>
        
        <!-- Navbar -->
        <?php include 'Components/navbarInterna.php'; ?>
        <!-- //Navbar -->

        <div class="container-fluid bg-transparent">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 class="text-center font-weight-bold mx-auto display-4 font-weight-light">Cadastro</h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-4">
                    <!-- Formulario -->
                    <form action="cadastro.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Nome de usuario" class="form-control m-1">
                            <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control m-1">
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control m-1">

                            <button type="submit" id="btnCadastro" name="btnCadastro" class="btn btn-danger form-control m-1">Cadastrar</button>
                        </div>
                    </form>
                    <!-- //Formulario -->

                    <?php
                    switch ($mensagem) {
                        case "Deu bom": ?>
                        <p class="text-success border border-success text-center">
                            <?php echo $mensagem; ?>
                        </p>
                        <?php
                        break;
                    case "":

                        break;

                    default: ?>
                            <p class="text-danger border border-danger text-center">
                                <?php echo $mensagem;
                        }
                        ?>
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