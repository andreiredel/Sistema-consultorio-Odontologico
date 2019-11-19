<?php 
 session_start();
require_once '../../vendor/autoload.php';

$operation = filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING);

switch($operation){
    case 'login':
        $retorno = login();
        break;

}

function login(){

    $usuario = new \App\Model\Usuario();
    $usuario->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $usuario->setSenha(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
   
    
    $pacienteDao = new App\Dao\LoginDao();
    $retornoProfissional = $pacienteDao->selectLogin($usuario, 'profissional');
    $retornoPaciente = $pacienteDao->selectLogin($usuario, 'paciente');

    $retornoProfissional = verificaUsuario($retornoProfissional);
    $retornoPaciente = verificaUsuario($retornoPaciente);

   

    if($retornoProfissional){
        if($retornoProfissional == 'permitido'){
            header("Location: ../view/dashboard.php");
        }else{
            header("Location: ../index.php");
        }
    } elseif ($retornoPaciente) {
        if($retornoPaciente == 'permitido'){
            header("Location: ../view/dashboard.php");
        }else{
            header("Location: ../index.php");
        }
    }else{
        header("Location: ../index.php");
    }
    
        
}

function verificaUsuario($retorno){
   
    if($retorno){
        if($retorno['acessosistema'] == 'permitido'){
    
            $id = "id_".$retorno["tipousuario"];
            $_SESSION['id'] = $retorno[$id];
            $_SESSION['nome'] = $retorno["nome"];
            $_SESSION['tipo'] = $retorno["tipousuario"];
            $_SESSION['mensagemLogin'] = 'Bem vindo ao SG-Odonto !!';
            $_SESSION['statusLogin'] = 'success';
            return 'permitido';
           
        } else if ($retorno['acessosistema'] == 'negado'){
            $_SESSION['mensagem'] = 'Usuário não tem mais acesso ao sistema';
            return 'negado';
        }
    }else{
        $_SESSION['mensagem'] = 'Esta combinação de nome do usuário e senha é inválida. !!';
        return false;   
    }

}