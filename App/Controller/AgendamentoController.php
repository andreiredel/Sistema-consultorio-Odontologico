<?php 
 session_start();
require_once '../../vendor/autoload.php';

var_dump('cadastrar agendamento');
var_dump($_POST);

$operation = filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING);

switch($operation){
    case 'cadastrar':
        $retorno = cadastraAgendamento();
        echo json_encode($retorno);
        break;

}

function cadastraAgendamento(){
    var_dump('function cadastrar');
    $color ='#35A60D';
    $status = 'agendado';
    $agendamento = array(
        "status" => $status,
        "idProfissional" => filter_input(INPUT_POST, 'idProfissional', FILTER_SANITIZE_STRING),
        "IdPaciente" => filter_input(INPUT_POST, 'paciente', FILTER_SANITIZE_STRING),
        "inicio" => filter_input(INPUT_POST, 'inicio', FILTER_SANITIZE_STRING),
        "data" => filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING),
        "fim" => filter_input(INPUT_POST, 'fim', FILTER_SANITIZE_STRING),
        "descricao" => filter_input(INPUT_POST, 'procedimento', FILTER_SANITIZE_STRING),
        "color" => $color      
    );

    $agendamentoDao = new App\Dao\AgendamentoDao();
    $retorno = $agendamentoDao->create($agendamento);
    if($retorno){
        $operation = 'success';
        $mensagem = 'Dados salvo com sucesso !!';
        $array = array('mensagem'=> $mensagem , 'status'=> $operation);
        return $array;
    }else{
      
        $mensagem = 'Não foi possivel salvar os dados !!';
        $operation =  'danger';
        $array = array('mensagem'=> $mensagem , 'status'=> $operation);
        return $array;
    }
    

}