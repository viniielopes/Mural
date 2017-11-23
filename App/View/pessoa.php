<?php
declare (strict_types = 1);
namespace App\View;

require '../../vendor/autoload.php';

use App\Controller\controleMural;

$id = $_GET['id'];
$controleMural = new controleMural();
$listaInformacao = $controleMural->informacoesPessoa($id);

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
        <title>
            <?php echo $listaInformacao[0]['nome']; ?>
        </title>
    </head>

    <body>
        <?php 
        require 'Components/navbarInterna.php';
        ?>
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 class="text-center font-weight-bold mx-auto display-4 font-weight-light">Informações de
                        <?php echo $listaInformacao[0]['nome']; ?>
                    </h1>
                </div>

                <!-- Cards -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="card bg-transparent border-dark">
                        <div class="card-body text-center">
                            <h4 class="card-title">Olha o que ele escreveu:</h4>
                            <?php if ($listaInformacao[0]['sobremim'] != null) { ?>
                            <p class="card-text">
                                <?php echo $listaInformacao[0]['sobremim']; ?>
                            </p>
                            <?php 
                        } else { ?>
                            <p class="card-text text-danger">Ele ainda não escreveu nada sobre ele (deve ser stalker) <br> 
                            Tem o email dele ai para você mandar spam.
                        </p>
                            <?php 
                        } ?>

                            <hr>
                            <p class="card-text">Email:
                                <?php echo $listaInformacao[0]['email']; ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <!-- //Cards -->
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