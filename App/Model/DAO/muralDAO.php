<?php
declare (strict_types = 1);

namespace App\Model\DAO;

require 'vendor/autoload.php';

use App\Model\BD;

class muralDAO
{
    public function buscarTodosNomes() : array
    {
        $BD = new BD();
        $conexao = $BD->conectar();
        $declaracao = $conexao->prepare(" SELECT nome from pessoa;");
        $declaracao->execute();
        $resultado = $declaracao->fetchAll(\PDO::FETCH_ASSOC);

        return $resultado;
    }

}