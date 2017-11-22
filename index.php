<?php 
declare (strict_types = 1);

require 'vendor/autoload.php';

use App\Controller\controleMural;

session_start();

//pega o nomes do BD para o Mural e verifica a quantidade de nomes que precisara em cada coluna.
$controleMural = new controleMural();
$listaNomes = $controleMural->nomesDoMural();
$quantidadeNomes = count($listaNomes);
$quantidadePorColuna = $quantidadeNomes / 3;
$quantidadePorColuna = ceil($quantidadePorColuna);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="App\View\css\style.css">
    <title>Mural Do Clan</title>
</head>

<body>
    <!-- Container fluid-->
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar bg-transparent">

            <!-- Itens do navbar -->

            <?php 
           //Verifica se a sessão não foi iniciada e exibi o botão de cadastro.
            if (isset($_SESSION['nome'])) { ?>

            <a href="App/View/informacoes.php" class="mr-auto font-italic font-weight-bold">Informações</a>
            <?php 
        } else { ?>

            <a href="App/View/cadastro.php" class="mr-auto font-italic font-weight-bold">Cadastro</a>
            <?php 
        } ?>

            <?php
            //Verifica se a sessão ja foi iniciado, caso nao foi iniciado exibi Login;
            if (isset($_SESSION['nome'])) { ?>

                <a class="ml-auto font-italic font-weight-bold" href="App/View/login.php">
                    <?php echo ucfirst($_SESSION['nome']); ?>
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                </a>
                <?php 
            } else { ?>

                <a class="ml-auto font-italic font-weight-bold" href="App/View/login.php">
                    Login
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                </a>
                <?php 
            } ?>
                <!-- //Itens do navbar -->
        </nav>
        <!-- //Navbar -->

        <!-- Row -->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Jumbotron -->
                <div class="jumbotron p-2 bg-transparent">
                    <h1 class="text-center font-weight-bold mx-auto display-1 font-weight-light">Mural</h1>

                    <!-- Card Deck -->
                    <div class="card-deck">
                        <div class="col-12 col-sm-6  col-md-4 col-lg-4">
                            <ul class="list-group text-center">
                                <?php
                                //separa a quantidade por igual em cada coluna do mural
                                for ($i = 0; $i < $quantidadePorColuna; $i++) { ?>

                                    <a href="#" class="list-group-item bg-transparent font-italic border-0">
                                        <?php echo $listaNomes[$i]['nome']; ?>
                                    </a>
                                    <?php 
                                } ?>

                            </ul>
                        </div>
                        
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                            <ul class="list-group text-center">
                                <?php
                                //separa a quantidade por igual em cada coluna do mural
                                // faz i + quantidadeporcoluna para nao printar o texto repetido e assim pegando os outros campos do array
                                for ($i = 0; $i < $quantidadePorColuna; $i++) {
                                    if (!empty($listaNomes[$i + $quantidadePorColuna])) {
                                        ?>

                                    <a href="#" class="list-group-item bg-transparent font-italic border-0">

                                        <?php 
                                        echo $listaNomes[$i + $quantidadePorColuna]['nome']; ?>

                                    </a>
                                    <?php 
                                }
                            } ?>

                            </ul>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                            <ul class="list-group text-center">
                                <?php
                                //separa a quantidade por igual em cada coluna do mural
                                // faz i + quantidadeporcoluna para nao printar o texto repetido e assim pegando os outros campos do array
                                for ($i = 0; $i < $quantidadePorColuna; $i++) {
                                    if (!empty($listaNomes[$i + $quantidadePorColuna + $quantidadePorColuna])) {
                                        ?>

                                    <a href="#" class="list-group-item bg-transparent font-italic border-0">
                                        <?php 
                                        echo $listaNomes[$i + $quantidadePorColuna + $quantidadePorColuna]['nome']; ?>
                                    </a>
                                    <?php 
                                }
                            } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- //Card Deck -->
                </div>
                <!-- //Jumbotron -->
            </div>

        </div>
        <!-- // Row -->
    </div>
    <!-- //Container-fluid -->
  
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>

    <script src="vendor\twbs\bootstrap\dist\js\bootstrap.js"></script>

</body>

</html>