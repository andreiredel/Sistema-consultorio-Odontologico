<?php 
 session_start();
require_once '../../vendor/autoload.php';
// echo '<pre>POST';
//         print_r($_POST);
//         echo'</pre>';
//         die;
$operation = filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING);

switch($operation){
    case 'cadastrar':
        $retorno = cadastraAgendamento();
        echo json_encode($retorno);
    break;
    case 'editar':
        $retorno = editarAgendamento();
        echo json_encode($retorno);
    break;
    case 'cancelar':
        $retorno = cancelarAgendamento();
    break;
    case 'getDadosAgendamento';
        $retorno = getDadosAgendamento();
        echo json_encode($retorno);
    break;

}

function cadastraAgendamento(){
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $color = ($status == 'agendado')? '#35A60D' :'#EE2846' ;

    $agendamento = array(
        "idProfissional" => filter_input(INPUT_POST, 'idProfissional', FILTER_SANITIZE_STRING),
        "IdPaciente" => filter_input(INPUT_POST, 'paciente', FILTER_SANITIZE_STRING),
        "inicio" => filter_input(INPUT_POST, 'inicio', FILTER_SANITIZE_STRING),
        "data" => filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING),
        "fim" => filter_input(INPUT_POST, 'fim', FILTER_SANITIZE_STRING),
        "descricao" => filter_input(INPUT_POST, 'procedimento', FILTER_SANITIZE_STRING),
        "status" => $status,
        "color" => $color      
    );

    $agendamentoDao = new App\Dao\AgendamentoDao();
    $retorno = $agendamentoDao->create($agendamento);
    if($retorno){
        $_SESSION['mensagemModal'] = 'Dados pessoais salvo com sucesso !!';
        $_SESSION['statusModal'] =  'success';
        return true;
    }else{
        $_SESSION['mensagemModal'] = 'Não foi possivel salvar os dados !!';
        $_SESSION['statusModal'] =  'danger';
        return true;
    }
    

}

function cancelarAgendamento()
{
        $color ='#EE2846';
        $status = 'cancelado';
        $agendamento = array(
            "status" => $status,
            "id" => filter_input(INPUT_POST, 'id_consulta', FILTER_SANITIZE_STRING),
            "color" => $color      
        );
        $agendamentoDao = new App\Dao\AgendamentoDao();
        $retorno = $agendamentoDao->cancelar($agendamento);
        header("Location: ../view/listarAgendamentos.php");

}

function getDadosAgendamento(){
    $idAgendamento = filter_input(INPUT_POST, 'idAgendamento', FILTER_SANITIZE_STRING);
    $agendamentoDao = new App\Dao\AgendamentoDao();
    $retorno = $agendamentoDao->getDadosAgendamento($idAgendamento);      
    return $retorno;
}

function editarAgendamento(){
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $color = ($status == 'agendado')? '#35A60D' :'#EE2846' ;

    $agendamento = array(
        "idProfissional" => filter_input(INPUT_POST, 'idProfissional', FILTER_SANITIZE_STRING),
        "IdPaciente" => filter_input(INPUT_POST, 'paciente', FILTER_SANITIZE_STRING),
        "id_consulta" => filter_input(INPUT_POST, 'id_consulta', FILTER_SANITIZE_STRING),
        "inicio" => filter_input(INPUT_POST, 'inicio', FILTER_SANITIZE_STRING),
        "data" => filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING),
        "fim" => filter_input(INPUT_POST, 'fim', FILTER_SANITIZE_STRING),
        "descricao" => filter_input(INPUT_POST, 'procedimento', FILTER_SANITIZE_STRING),
        "status" => $status,
        "color" => $color      
    );

    $agendamentoDao = new App\Dao\AgendamentoDao();
    $retorno = $agendamentoDao->update($agendamento);
    if($retorno){
        $_SESSION['mensagemModal'] = 'Dados pessoais salvo com sucesso !!';
        $_SESSION['statusModal'] =  'success';
        return true;
    }else{
        $_SESSION['mensagemModal'] = 'Não foi possivel salvar os dados !!';
        $_SESSION['statusModal'] =  'danger';
        return true;
    }
    

}