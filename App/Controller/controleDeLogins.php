<?php
declare (strict_types = 1);

namespace App\Controller;


use App\Model\Validation\validacao;
use App\Model\Entity\pessoa;
use App\Model\DAO\pessoaDAO;

class controleDeLogins
{

    function login(string $nomeUsuario, string $senha) : string
    {
        $validacao = new validacao();
        $pessoa = new pessoa();
        $pessoa = $validacao->validarLogin($nomeUsuario, $senha);
        if ($pessoa->mensagem == '') {
            $pessoaDAO = new pessoaDAO();
            $pessoa->mensagem = $pessoaDAO->loginDeUsuario($pessoa);
            return $pessoa->mensagem;
        }

        return $pessoa->mensagem;
    }

}