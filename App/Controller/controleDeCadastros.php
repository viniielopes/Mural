<?php 
declare (strict_types = 1);

namespace App\Controller;

use App\Model\DAO\pessoaDAO;
use App\Model\Validation\validacao;
use App\Model\Entity\pessoa;

class controleDeCadastros
{

    function cadastrarUsuario(string $nomeUsuario, string $senha, string $email) : string
    {
        $validacao = new validacao();
        $pessoa = new pessoa();

        $pessoa = $validacao->validarPessoa($nomeUsuario, $senha, $email);
        if ($pessoa->mensagem == '') {
            $pessoaDAO = new pessoaDAO();
            $pessoa->mensagem = $pessoaDAO->salvarPessoa($pessoa);
            return $pessoa->mensagem;
        }
        return $pessoa->mensagem;
    }

    function cadastrarInformacoes(string $id, string $sobremim) : string
    {
        $validacao = new validacao();
        $pessoa = new pessoa();
        $pessoa = $validacao->validarInformacoes($sobremim);
        if ($pessoa->mensagem == '') {
            $pessoaDAO = new pessoaDAO();
            $pessoa->setID($id);
            $pessoa->mensagem = $pessoaDAO->salvarInformacoes($pessoa);
            return $pessoa->mensagem;
        }
        return $pessoa->mensagem;
    }

}