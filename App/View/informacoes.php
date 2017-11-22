<?php
declare (strict_types = 1);
namespace App\View;

require '../../vendor/autoload.php';

use App\Controller\controleDeCadastros;

session_start();
$_SESSION['mensagem'] = "";

if ($_POST) {
    $sobremim = $_POST['txaSobremim'];
    $controleCadastro = new controleDeCadastros();
    $_SESSION['mensagem'] = $controleCadastro->cadastrarInformacoes($_SESSION['id'], $sobremim);
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
        <title>Painel</title>
    </head>

    <body>
        <!-- Navbar -->
        <?php include 'Components/navbarInterna.php'; ?>
        <!-- //Navbar -->

        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Escreva um pouco sobre você</h1>
                </div>
            </div>

            <!-- Row -->
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <!-- Formulario -->
                    <form action="informacoes.php" method="POST">

                        <textarea name="txaSobremim" id="txaSobremim" maxlength="250" placeholder="Um pouco, só ate 250 caracter." rows="3" class="form-control text-danger bg-white border-dark m-1"></textarea>

                        <button type="submit" class="btn btn-danger form-control m-1">Salvar</button>

                    </form>
                    <!-- //Formulario -->

                    <?php
                    if (isset($_SESSION['mensagem'])) {
                        switch ($_SESSION['mensagem']) {
                            case "Deu bom": ?>
                        <p class="text-success border border-success text-center">
                            <?php echo $_SESSION['mensagem'];; ?>
                        </p>
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
            <!-- //Row -->
        </div>
        <!-- //Container -->

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
        <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
    </body>

    </html>