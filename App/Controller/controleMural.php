<?php
declare (strict_types = 1);

namespace App\Controller;

use App\Model\DAO\muralDAO;

class controleMural
{
    public function nomesDoMural() : array
    {
        $muralDAO = new muralDAO();
        $listaNomes = $muralDAO->buscarTodosNomes();

        return $listaNomes;
    }

    public function informacoesPessoa(string $id) : array
    {
        $muralDAO = new muralDAO();
        $listaNomes = $muralDAO->buscarTodasInformacoes($id);

        return $listaNomes;
    }

}