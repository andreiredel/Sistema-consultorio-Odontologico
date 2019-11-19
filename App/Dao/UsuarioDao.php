<?php

namespace App\Dao;

class UsuarioDao{
    
    private $connect;
    
    public function __construct()
    {
        $this->connect = new \App\Util\Conexao();
    }

    public function create($p)
    {
            $sql = "INSERT INTO ". $p->getTipoUsuario() ." (nome, senha, email, telefone, tipousuario, acessosistema, created_at, update_at )".   
            "VALUES ('".$p->getNome()."','".$p->getSenha()."','".$p->getEmail()."' , '".$p->getTelefone()."','".$p->getTipoUsuario()."','".$p->getAcessoSistema()."', '".$p->getCreated_at()."', '".$p->getUpdate_at()."')";
            $stmt = $this->connect->getInstance()->prepare($sql);

            if($stmt->execute()){
                return true;
            }else{
                $stmt->errorInfo();
                return false;
            }
                   
    }

    public function read($tipoUsuario)
    {
            $sql = "SELECT  id_".$tipoUsuario." as id, nome, tipousuario FROM ". $tipoUsuario;
            $stmt = $this->connect->getInstance()->prepare($sql);
            if($stmt->execute()){
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return  $result;
            }else{
                echo $stmt->errorInfo();
                return false;
            }

    }

    public function update($dados)
    {   

        $nome = ($dados['nome'])? "nome = '".$dados['nome']."'," : '';
        $email = ($dados['email'])? "email='".$dados['email']."'," : '';
        $senha = ($dados['senha'])? "senha= '".$dados['senha']."'," : '';
        $acesso = ($dados['acesso'])? "acessosistema='".$dados['acesso']."'," : '';
        $tipoUsuario = ($dados['tipoUsuario'])? "tipousuario='".$dados['tipoUsuario']."'," : '';
        $telefone = ($dados['telefone'])? "telefone='".$dados['telefone']."'," : '';
        $update = ($dados['update'])? "update_at= '".$dados['update']."'" : '';
        $condicao = "id_".$dados['tipoUsuario']."=". $dados['id'];

        $sql = "UPDATE ".$dados['tipoUsuario']."
        SET ".
            $nome.''. $email.''.$senha.''.$acesso.''.$tipoUsuario.''.$telefone.''.$update
        ." WHERE ". $condicao;

        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){           
            return  true;
        }else{
            echo "<pre>sqllll";
                print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }

    }

    public function delete($id, $tipoUsuario)
    {
        $sql = "DELETE FROM ". $tipoUsuario. " where id_".$tipoUsuario." = ".$id;
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            return  TRUE;
        }else{
             $stmt->errorInfo();
            return false;
        }
    }

    public function getDados($id , $tipoUsuario)
    {
        $sql = "SELECT * FROM ". $tipoUsuario. " where id_".$tipoUsuario." = ".$id;
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return  $result;
        }else{
            echo "<pre>sqllll";
                print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }


    }
    public function buscaPorNomeUsuario($tabela,$palavra){

        $sql = "SELECT  id_".$tabela." as id, nome, tipousuario FROM ". $tabela. " where nome ilike '%".$palavra."%'";
        

        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return  $result;
        }else{
            echo "<pre>sqllll";
                print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }


    }
    public function getUsuario($tabela){

        $sql = "SELECT  nome, id_".$tabela." as id FROM " .$tabela;
        
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return  $result;
        }else{
            echo "<pre>sqllll";
                print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }


    }
}