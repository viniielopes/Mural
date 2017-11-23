<?php
declare (strict_types = 1);

namespace App\Model\DAO;

use App\Model\BD;

class muralDAO
{
    public function buscarTodosNomes() : array
    {
        $BD = new BD();
        $conexao = $BD->conectar();
        $declaracao = $conexao->prepare(" SELECT id, nome from pessoa;");
        $declaracao->execute();
        $resultado = $declaracao->fetchAll(\PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function buscarTodasInformacoes(string $id) : array
    {
        try {
            $BD = new BD();
            $conexao = $BD->conectar();
            $declaracao = $conexao->prepare(" SELECT id, nome, email, sobremim FROM pessoa
        LEFT JOIN informacoes ON  pessoa.id = informacoes.pessoaid
        where id = :id ;");
            $declaracao->bindValue(':id', $id);
            $declaracao->execute();
            $resultado = $declaracao->fetchAll(\PDO::FETCH_ASSOC);

            return $resultado;
        } catch (\Exception $e) {
            echo 'Erro! voce ta me trolando! ' . $e->getMessage();

        }
    }

}