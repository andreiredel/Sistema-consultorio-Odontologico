<?php

namespace App\Dao;

class LoginDao{
    
    private $connect;
    
    public function __construct()
    {
        $this->connect = new \App\Util\Conexao();
    }

    public function selectLogin($user, $tipoUsuario)
    {

            $sql = "SELECT * FROM ".$tipoUsuario." WHERE nome= '".$user->getNome() ."'";
            $stmt = $this->connect->getInstance()->prepare($sql);

            var_dump($sql);

            if($stmt->execute()){
                    
                    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    foreach($result as $linha){
                        if(password_verify($user->getSenha(), $linha['senha'])){  
                            return $linha;  
                        } 
                    }
                    //se tiver result encontrou o usuario
                    // echo '<pre>$result';
                    // print_r($result);
                    // echo'</pre>';
                    return false;   
            }else{
                echo '<pre>$result';
                print_r($stmt->execute());
                echo'</pre>';
                $stmt->errorInfo();
                return false;
            }
                   
    }


}