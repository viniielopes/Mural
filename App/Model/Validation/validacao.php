<?php
declare (strict_types = 1);

namespace App\Model\Validation;

require '../../vendor/autoload.php';

use App\Model\Entity\pessoa;

class validacao
{
    public $mensagem;

    function validarPessoa(string $nomeUsuario, string $senha, string $email) : pessoa
    {

        $nomevalidado = $this->validarNome($nomeUsuario);
        $emailvalidado = $this->validarEmail($email);
        $senhavalidado = $this->validarSenha($senha);
        $pessoa = new pessoa();
        if ($this->mensagem == '') {
            $pessoa->setNome($nomevalidado);
            $pessoa->setEmail($emailvalidado);
            $pessoa->setSenha($senhavalidado);

            return $pessoa;

        }

        $pessoa->mensagem = $this->mensagem;

        return $pessoa;
    }

    function validarLogin(string $nomeUsuario, string $senha) : pessoa
    {
        $nomevalidado = $this->validarNome($nomeUsuario);
        $senhavalidado = $this->validarSenha($senha);

        $pessoa = new pessoa();
        if ($this->mensagem == '') {
            $pessoa->setNome($nomevalidado);
            $pessoa->setSenha($senhavalidado);

            return $pessoa;
        }
        $pessoa->mensagem = $this->mensagem;

        return $pessoa;
    }

    function validarInformacoes(string $sobremim) : pessoa
    {
        $this->validaSobremim($sobremim);
        $pessoa = new pessoa();
        if ($this->mensagem == '') {
            $pessoa->setSobreMim($sobremim);
            return $pessoa;
        }
        $pessoa->mensagem = $this->mensagem;
        return $pessoa;
    }

    function validaSobremim(string $sobremim)
    {
        if ($sobremim > 250) {
            $this->mensagem = 'Escreveu demais sobre você parceiro';
        }

    }

    function validarNome(string $nome) : string
    {
        $nomevalidado = \filter_var($nome, \FILTER_SANITIZE_STRING);

        if (\strlen($nomevalidado) > 25) {
            \is_string($this->mensagem);
            $this->mensagem .= 'Nome muito grande, no maximo 25 caracteres! <br />';
        }
        $this->campoVazio($nomevalidado, 'Nome');

        return $nomevalidado;
    }

    function validarEmail(string $email) : string
    {
        $emailvalidado = \filter_var($email, \FILTER_SANITIZE_EMAIL);

        if (!\filter_var($emailvalidado, \FILTER_VALIDATE_EMAIL)) {
            $this->mensagem .= 'Email Invalido! <br/ >';

        }
        $this->campoVazio($emailvalidado, 'Email');

        return $emailvalidado;
    }

    function validarSenha(string $senha) : string
    {
        $senhavalidado = \filter_var($senha, \FILTER_SANITIZE_STRING);

        if (\strlen($senhavalidado) > 20) {
            $this->mensagem .= 'Senha excede 20 caracteres! <br />';
        }
        $this->campoVazio($senhavalidado, 'Senha');

        return $senhavalidado;
    }

    function campoVazio(string $dado, string $nomeDoCampo)
    {
        if (isset($campoDoFormulario)) {
            $this->mensagem .= "$nomeDoCampo esta vazio!";
        }

    }

}
