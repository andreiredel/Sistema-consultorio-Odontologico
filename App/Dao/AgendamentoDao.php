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
        $sql = "SELECT status as color, descricao_tratamento as title, data as start,  id_profissional, id_paciente FROM consulta WHERE id_".$user->getTipoUsuario()." = ".$user->getId() ."";
        $stmt = $this->connect->getInstance()->prepare($sql);
        var_dump($sql);
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

    public function create($agendamento)
    {
        $sql = "INSERT INTO consulta (status, inicio, descricao_tratamento, id_paciente, id_profissional, fim, color, data )".   
        "VALUES ('".$agendamento['status']."','".$agendamento['inicio']."','".$agendamento['descricao']."' , '".$agendamento['IdPaciente']."','".$agendamento['idProfissional']."','".$agendamento['fim']."', '".$agendamento['color']."', '".$agendamento['data']."')";
        $stmt = $this->connect->getInstance()->prepare($sql);
        var_dump($sql);
        if($stmt->execute()){
            return true;
        }else{
            $stmt->errorInfo();
            return false;
        }
    }


}