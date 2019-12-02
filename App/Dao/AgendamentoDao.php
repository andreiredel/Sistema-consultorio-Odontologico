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
        $sql = "SELECT id_consulta, color, descricao_tratamento as title, inicio as start,fim as end,  id_profissional, id_paciente FROM consulta WHERE id_".$user->getTipoUsuario()." = ".$user->getId() ."";
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            
            foreach($stmt->fetchAll(\PDO::FETCH_ASSOC)  as $result ){
                $eventos[] = [
                    'id' => $result['id_consulta'],
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

        $sql = "INSERT INTO  consulta (status, inicio, descricao_tratamento, id_paciente, id_profissional, fim, color, data )".   
        "VALUES ('".$agendamento['status']."','".$agendamento['inicio']."','".$agendamento['descricao']."' , '".$agendamento['IdPaciente']."','".$agendamento['idProfissional']."','".$agendamento['fim']."', '".$agendamento['color']."', '".$agendamento['data']."')";
 
        
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            return true;
        }else{
            $stmt->errorInfo();
            return false;
        }
    }

    public function update($agendamento)
    {
        

        $sql = "UPDATE consulta SET status = '".$agendamento['status']."' , inicio = '".$agendamento['inicio']."' , descricao_tratamento =  '".$agendamento['descricao']."' , id_paciente ='".$agendamento['IdPaciente']."' , id_profissional = '".$agendamento['idProfissional']."', fim = '".$agendamento['fim']."' , color =  '".$agendamento['color']."', data = '".$agendamento['data']."' ".
        "WHERE id_consulta = ".$agendamento['id_consulta']; 
        
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            return true;
        }else{
            $stmt->errorInfo();
            return false;
        }
    }

    public function cancelar($agendamento)
    {
        $sql = "UPDATE consulta  SET status = '".$agendamento['status']."', color = '". $agendamento['color']."' WHERE id_consulta =". $agendamento['id'];

        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            return true;
        }else{
            $stmt->errorInfo();
            return false;
        }
    }

    public function getDadosAgendamento($idAgendamento){
       
        $sql ="SELECT pro.nome as nomeProfissional , pa.nome AS nomePaciente, c.descricao_tratamento as tratamento, pa.id_paciente as idPaciente".
        " FROM consulta AS C".
        " INNER JOIN profissional AS pro ON C.id_profissional = pro.id_profissional".
        " INNER JOIN paciente AS pa ON C.id_paciente = pa.id_paciente".
        " where c.id_consulta = ". $idAgendamento;
        
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return  $result;
        }else{
            $stmt->errorInfo();
            return false;
        }

    }


}