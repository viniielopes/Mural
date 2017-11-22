<?php
namespace App\Model;

class BD
{

    function conectar() : \PDO
    {
        $conexao = new \PDO("mysql:host=127.0.0.1;dbname=crud", "vinicius", "rosangela123");
        return $conexao;
    }
    function desconectar()
    {
        $conexao = null;
        return $conexao;
    }

}