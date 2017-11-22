<?php
declare (strict_types = 1);

namespace App\Controller;

require 'vendor/autoload.php';

use App\Model\DAO\muralDAO;

class controleMural
{
    public function nomesDoMural() : array
    {
        $muralDAO = new muralDAO();
        $listaNomes = $muralDAO->buscarTodosNomes();

        return $listaNomes;
    }

}