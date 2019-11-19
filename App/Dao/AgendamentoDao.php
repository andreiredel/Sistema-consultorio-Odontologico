<?php

namespace App\Dao;

class AgendamentoDao{
    
    private $connect;
    
    public function __construct()
    {
        $this->connect = new \App\Util\Conexao();
    }

    public function buscarAgendamentos($user)
    {
        $sql = "SELECT status as color, descricao_tratamento as title, inicio as start, fim as end, id_profissional, id_paciente FROM consulta WHERE id_".$user->getTipoUsuario()." = ".$user->getId() ."";
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            
            foreach($stmt->fetchAll(\PDO::FETCH_ASSOC)  as $result ){
                $eventos[] = [
                    'title' => $result['title'],
                    'color' => $result['color'],
                    'start' => $result['start'],
                    'idProfissional' => $result['id_profissional'],
                    'idPaciente' => $result['id_paciente'],
                    'end' => $result['end']
                ];
            }
            return  $eventos;
        }else{
            echo $stmt->errorInfo();
            return false;
        }
                   
    }


}