<?php 
 session_start();
require_once '../../vendor/autoload.php';

$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_STRING);

switch($operation){
    case 'listAgendamento':
        $retorno = listaAgendamentos();
        echo json_encode($retorno);
        break;

}

function listaAgendamentos(){

    $usuario = new \App\Model\Usuario();
    $usuario->setId(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING));
    $usuario->setTipoUsuario(filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_STRING));
       
    $agendamentoDao = new App\Dao\AgendamentoDao();
    $retornoAgendamento = $agendamentoDao->buscarAgendamentos($usuario);

    if($retornoAgendamento){
        $retorno = $retornoAgendamento;
    }else{
        $retorno = 'erro';
    }
    return $retorno;    
}
