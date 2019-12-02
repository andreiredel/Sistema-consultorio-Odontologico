<?php 
 session_start();
require_once '../../vendor/autoload.php';

   
$operation = filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING);
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_STRING);



switch($operation){
    case 'cadastrarDadosPessoais':
        $retorno = cadastrarDadosPessoais();
        break;
    case 'getDadosProntuario':
        $retorno = getDadosProntuario();
        echo json_encode($retorno);
    break; 
    case 'cadastrarAnamnese':
        $retorno = cadastrarAnamnese();
    break;
    case 'cadastrarExameFisico':
        $retorno = cadastrarExameFisico();
    break;
    case 'cadastrarExameClinico':
        $retorno = cadastrarExameClinico();
    break;
    case 'cadastrarExamePerio':
        $retorno = cadastrarExamePerio();
    break;
    case 'cadastrarRegistroAtendimento':
        $retorno = cadastrarRegistroAtendimento();
    break;
    case 'getDadosCompleto':
        $retorno = getDadosCompleto();
    break;
    
    
    
    
    
}

function cadastrarDadosPessoais(){
    
    $dados = array(
        "idPaciente" => filter_input(INPUT_POST, 'idPaciente', FILTER_SANITIZE_STRING),
        "rg" => filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING),
        "orgaoEx" => filter_input(INPUT_POST, 'orgaoEx', FILTER_SANITIZE_STRING),
        "cpf" => filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING),
        "nascimento" => filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING),
        "estado_civil" => filter_input(INPUT_POST, 'estado_civil', FILTER_SANITIZE_STRING),
        "naturalidade" => filter_input(INPUT_POST, 'naturalidade', FILTER_SANITIZE_STRING),
        "nacionalidade" => filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_STRING),
        "profissao" => filter_input(INPUT_POST, 'profissao', FILTER_SANITIZE_STRING),
        "endereco" => filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING),
        "cep" => filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING),
        "cidade" => filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING),
        "estado" => filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING),
        "telefone" => filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING),
        "cor" => filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING),
        "moradia" => filter_input(INPUT_POST, 'moradia', FILTER_SANITIZE_STRING),
        "genero" => filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING)
     
    );

    $prontuariDao = new App\Dao\ProntuarioDao();
    $retorno =  $prontuariDao->cadastrarDadosPessoais($dados);
    var_dump("retorno");
    var_dump($retorno);
    // die;
    if($retorno){
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['mensagemModal'] = 'Dados pessoais salvo com sucesso !!';
        $_SESSION['statusModal'] =  'success';
        header("Location: ../view/EditarProntuario.php");
    }else{
        
        $_SESSION['mensagemModal'] = 'Não foi possivel salvar os dados !!';
        $_SESSION['statusModal'] =  'danger';
        header("Location: ../view/EditarProntuario.php");
    }

        
}

function getDadosProntuario(){
    $idUsuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_STRING);
   
    $prontuariDao = new App\Dao\ProntuarioDao();
    $retorno =  $prontuariDao->getDadosProntuario($idUsuario);
    if($retorno){
        $_SESSION['info'] = $retorno;
        return true;
    }
}
function getProntuario($idPaciente){
            var_dump('teste');
            var_dump($idPaciente);
            die();

}

function cadastrarAnamnese(){
    $dados = array(

        "idPaciente" => filter_input(INPUT_POST, 'idPaciente', FILTER_SANITIZE_STRING),
        "evolucao_queixa" => filter_input(INPUT_POST, 'evolucao_queixa', FILTER_SANITIZE_STRING),
        "expectativa" => filter_input(INPUT_POST, 'expectativa', FILTER_SANITIZE_STRING),
        "alergia" => filter_input(INPUT_POST, 'alergia', FILTER_SANITIZE_STRING),
        "medicamentos" => filter_input(INPUT_POST, 'medicamentos', FILTER_SANITIZE_STRING),
        "gravida" => filter_input(INPUT_POST, 'gravida', FILTER_SANITIZE_STRING),
        "ulti_dentista" => filter_input(INPUT_POST, 'ulti_dentista', FILTER_SANITIZE_STRING),
        "motivo_consulta" => filter_input(INPUT_POST, 'motivo_consulta', FILTER_SANITIZE_STRING),
        "tipo_servico" => filter_input(INPUT_POST, 'tipo_servico', FILTER_SANITIZE_STRING),
        "avalia_saude" => filter_input(INPUT_POST, 'avalia_saude', FILTER_SANITIZE_STRING),
        "freq_escovacao" => filter_input(INPUT_POST, 'freq_escovacao', FILTER_SANITIZE_STRING),
        "limpeza_entre_dentes" => filter_input(INPUT_POST, 'limpeza_entre_dentes', FILTER_SANITIZE_STRING),
        "frequencia_limpeza_entre_dentes" => filter_input(INPUT_POST, 'frequencia_limpeza_entre_dentes', FILTER_SANITIZE_STRING),
        "tipo_escova" => filter_input(INPUT_POST, 'tipo_escova', FILTER_SANITIZE_STRING),
        "freq_acucar" => filter_input(INPUT_POST, 'freq_acucar', FILTER_SANITIZE_STRING),
        "anestesiado" => filter_input(INPUT_POST, 'anestesiado', FILTER_SANITIZE_STRING),
        "Complicações" => filter_input(INPUT_POST, 'Complicações', FILTER_SANITIZE_STRING),
        "doencas" => filter_input(INPUT_POST, 'doencas', FILTER_SANITIZE_STRING),
        "medicamento_receitado_por" => filter_input(INPUT_POST, 'medicamento_receitado_por', FILTER_SANITIZE_STRING),
        "habitos" => filter_input(INPUT_POST, 'habitos', FILTER_SANITIZE_STRING),
        "data" => filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING)
     
    );
    $prontuariDao = new App\Dao\ProntuarioDao();
    $retorno =  $prontuariDao->cadastrarAnamnese($dados);
    
    if($retorno){
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['mensagemModal'] = 'Dados pessoais salvo com sucesso !!';
        $_SESSION['statusModal'] =  'success';
        header("Location: ../view/EditarProntuario.php");
    }else{
        
        $_SESSION['mensagemModal'] = 'Não foi possivel salvar os dados !!';
        $_SESSION['statusModal'] =  'danger';
        header("Location: ../view/EditarProntuario.php");
    }
}

function cadastrarExameFisico(){


    $dados = array(

        "idPaciente" => filter_input(INPUT_POST, 'idPaciente', FILTER_SANITIZE_STRING),
        "geral" => filter_input(INPUT_POST, 'geral', FILTER_SANITIZE_STRING),
        "tecidos_moles" => filter_input(INPUT_POST, 'tecidos_moles', FILTER_SANITIZE_STRING),
        "descricao_tecidos" => filter_input(INPUT_POST, 'descricao_tecidos', FILTER_SANITIZE_STRING),
        "angle" => filter_input(INPUT_POST, 'angle', FILTER_SANITIZE_STRING),
        "data" => filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING)
     
    );
    $prontuariDao = new App\Dao\ProntuarioDao();
    $retorno =  $prontuariDao->cadastrarExameFisico($dados);
    if($retorno){
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['mensagemModal'] = 'Dados pessoais salvo com sucesso !!';
        $_SESSION['statusModal'] =  'success';
        header("Location: ../view/EditarProntuario.php");
    }else{
        
        $_SESSION['mensagemModal'] = 'Não foi possivel salvar os dados !!';
        $_SESSION['statusModal'] =  'danger';
        header("Location: ../view/EditarProntuario.php");
    }

}

function cadastrarExameClinico(){


    $dados = array(

        "idPaciente" => filter_input(INPUT_POST, 'idPaciente', FILTER_SANITIZE_STRING),
        "descricao" => filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING),
        "numero_dente" => filter_input(INPUT_POST, 'numero_dente', FILTER_SANITIZE_STRING),
        "data" => filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING)
     
    );
    $prontuariDao = new App\Dao\ProntuarioDao();
    $retorno =  $prontuariDao->cadastrarExameClinico($dados);
    if($retorno){
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['mensagemModal'] = 'Dados pessoais salvo com sucesso !!';
        $_SESSION['statusModal'] =  'success';
        header("Location: ../view/EditarProntuario.php");
    }else{
        
        $_SESSION['mensagemModal'] = 'Não foi possivel salvar os dados !!';
        $_SESSION['statusModal'] =  'danger';
        header("Location: ../view/EditarProntuario.php");
    }

}

function cadastrarExamePerio(){


    $dados = array(

        "idPaciente" => filter_input(INPUT_POST, 'idPaciente', FILTER_SANITIZE_STRING),
        "avaliativo" => filter_input(INPUT_POST, 'avaliativo', FILTER_SANITIZE_STRING),
        "observacoes" => filter_input(INPUT_POST, 'observacoes', FILTER_SANITIZE_STRING),
        "dente" => filter_input(INPUT_POST, 'dente', FILTER_SANITIZE_STRING),
        "v" => (filter_input(INPUT_POST, 'v', FILTER_SANITIZE_STRING))? filter_input(INPUT_POST, 'v', FILTER_SANITIZE_STRING) : NULL,
        "p" => (filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING))? filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING) : NULL,
        "dv" => (filter_input(INPUT_POST, 'dv', FILTER_SANITIZE_STRING))? filter_input(INPUT_POST, 'dv', FILTER_SANITIZE_STRING) : NULL,
        "dp" => (filter_input(INPUT_POST, 'dp', FILTER_SANITIZE_STRING))? filter_input(INPUT_POST, 'dp', FILTER_SANITIZE_STRING) : NULL,
        "mv" => (filter_input(INPUT_POST, 'mv', FILTER_SANITIZE_STRING))? filter_input(INPUT_POST, 'mv', FILTER_SANITIZE_STRING) : NULL,
        "mp" => (filter_input(INPUT_POST, 'mp', FILTER_SANITIZE_STRING))? filter_input(INPUT_POST, 'mp', FILTER_SANITIZE_STRING) : NULL,
        "data" => filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING)
     
    );
    $prontuariDao = new App\Dao\ProntuarioDao();
    $retorno =  $prontuariDao->cadastrarExamePerio($dados);
    if($retorno){
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['mensagemModal'] = 'Dados pessoais salvo com sucesso !!';
        $_SESSION['statusModal'] =  'success';
        header("Location: ../view/EditarProntuario.php");
    }else{
        
        $_SESSION['mensagemModal'] = 'Não foi possivel salvar os dados !!';
        $_SESSION['statusModal'] =  'danger';
        header("Location: ../view/EditarProntuario.php");
    }

}


function cadastrarRegistroAtendimento(){


    $dados = array(

        "idPaciente" => filter_input(INPUT_POST, 'idPaciente', FILTER_SANITIZE_STRING),
        "descricao" => filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING),
        "data" => filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING)
     
    );
    $prontuariDao = new App\Dao\ProntuarioDao();
    $retorno =  $prontuariDao->cadastrarRegistroAtendimento($dados);
    if($retorno){
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['mensagemModal'] = 'Dados pessoais salvo com sucesso !!';
        $_SESSION['statusModal'] =  'success';
        header("Location: ../view/EditarProntuario.php");
    }else{
        
        $_SESSION['mensagemModal'] = 'Não foi possivel salvar os dados !!';
        $_SESSION['statusModal'] =  'danger';
        header("Location: ../view/EditarProntuario.php");
    }

}

function getDadosCompleto(){


    $idPaciente = filter_input(INPUT_GET, 'idPaciente', FILTER_SANITIZE_STRING);
   
        
    $arrayDadosProntuario = array(); 
    $prontuariDao = new App\Dao\ProntuarioDao();
    $arrayDadosProntuario['dados_pessoais'] =  $prontuariDao->getDadosCompleto("dados_pessoais", $idPaciente);
    $arrayDadosProntuario['anamnese'] =  $prontuariDao->getDadosCompleto("anamnese", $idPaciente);
    $arrayDadosProntuario['exameFisico'] =  $prontuariDao->getDadosCompleto("exame_Fisico", $idPaciente);
    $arrayDadosProntuario['exameClinico'] =  $prontuariDao->getDadosCompleto("exame_clinico", $idPaciente);
    $arrayDadosProntuario['examePeriodontal'] =  $prontuariDao->getDadosCompleto("exameperio", $idPaciente);
    $arrayDadosProntuario['registro'] =  $prontuariDao->getDadosCompleto("registro_atendimento", $idPaciente);

    if($arrayDadosProntuario){
        $_SESSION['dadosProntuario'] = $arrayDadosProntuario;
        header("Location: ../view/visualizacaoProntuario.php");
    }else{
  
        $_SESSION['mensagemModal'] = 'Não foi possivel salvar os dados !!';
        $_SESSION['statusModal'] =  'danger';
        header("Location: ../view/visualizacaoProntuario.php");
    }

}




