<?php
namespace App\Model\Entity;

class pessoa
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $sobremim;
    public $mensagem;

    function getID()
    {
        return $this->id;
    }

    function setID($id)
    {
        $this->id = $id;

    }

    function getNome()
    {
        return $this->nome;
    }

    function setNome($nome)
    {
        $this->nome = $nome;

    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($email)
    {
        $this->email = $email;

    }
    function getSenha()
    {
        return $this->senha;
    }

    function setSenha($senha)
    {
        $this->senha = $senha;

    }

    function getSobreMim()
    {
        return $this->sobremim;
    }

    function setSobreMim($sobremim)
    {
        $this->sobremim = $sobremim;

    }
}
?>