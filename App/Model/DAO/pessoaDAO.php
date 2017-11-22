<?php
declare (strict_types = 1);
namespace App\Model\DAO;

require '../../vendor/autoload.php';

use App\Model\BD;
use App\Model\Entity\pessoa;

class pessoaDAO
{

    function salvarPessoa(pessoa $pessoa) : string
    {
        $BD = new BD();
        $conexao = $BD->conectar();
        $declaracao = $conexao->prepare("INSERT INTO pessoa(nome, senha, email) values
            ( :nome , :senha , :email );");
        $declaracao->bindValue(':nome', $pessoa->getNome());
        $declaracao->bindValue(':senha', $pessoa->getSenha());
        $declaracao->bindValue(':email', $pessoa->getEmail());

        $declaracao->execute();

        $conexao = $BD->desconectar();

        return 'Deu bom';
    }


    function loginDeUsuario(pessoa $pessoa) : string
    {
        $BD = new BD();
        $conexao = $BD->conectar();


        $declaracao = $conexao->prepare("SELECT id, nome, senha from pessoa
         where nome = :nome and senha = :senha ; ");
        $declaracao->bindValue(':nome', $pessoa->getNome());
        $declaracao->bindValue(':senha', $pessoa->getSenha());
        $declaracao->execute();
        $resultado = $declaracao->fetchAll(\PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            $_SESSION['id'] = $resultado[0]['id'];
            $_SESSION['nome'] = $resultado[0]['nome'];

            $conexao = $BD->desconectar();
            return 'Deu bom';
        }
        return "Nome de usuario ou senha invalidos!";
    }

    function salvarInformacoes(pessoa $pessoa) : string
    {
        try {
            $BD = new BD();
            $conexao = $BD->conectar();
            $declaracao = $conexao->prepare("SELECT id, nome, email, sobremim FROM pessoa
                    INNER JOIN informacoes ON  pessoa.id = informacoes.pessoaid
                    where id = :id ;");
            $declaracao->bindValue(':id', $pessoa->getID());
            $declaracao->execute();
            $resultado = $declaracao->fetchAll(\PDO::FETCH_ASSOC);
            if (count($resultado) >= 1) {
                $declaracao = $conexao->prepare("UPDATE informacoes SET sobremim = :sobremim where pessoaid = :id ;");
                $declaracao->bindValue(':id', $pessoa->getID());
                $declaracao->bindValue(':sobremim', $pessoa->getSobreMim());
                $declaracao->execute();
                return 'Deu bom';
            } else {
                $declaracao = $conexao->prepare("INSERT INTO informacoes(pessoaid, sobremim) values
                ( :id , :sobremim );");
                $declaracao->bindValue(':id', $pessoa->getID());
                $declaracao->bindValue(':sobremim', $pessoa->getSobreMim());

                $declaracao->execute();
                $conexao = $BD->desconectar();
                return 'Deu bom';
            }
        } catch (\Exception $e) {
            return 'Algo deu errado';
        }
    }
}