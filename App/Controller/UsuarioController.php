<?php 
 session_start();
require_once '../../vendor/autoload.php';

$operation = filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING);

switch($operation){
    case 'create':
        $retorno = createUsuario();
        break;
    case 'editar':
        $retorno = editarUsuario();
        echo json_encode($retorno);
        break;
    case 'remover':

        break;
    case 'listar':

        break;
    case 'getDados':
        $retorno = getDados();
        echo json_encode($retorno);
        break;
    case 'buscarUsuarios':
        $retorno = buscarUsuarios();
        break;

        
}

function createUsuario(){

    $usuario = new \App\Model\Usuario();
    $usuario->setNome(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $usuario->setEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $usuario->setSenha(sha1(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)));
    $usuario->setAcessoSistema(filter_input(INPUT_POST, 'acesso', FILTER_SANITIZE_STRING));
    $usuario->setTipoUsuario(filter_input(INPUT_POST, 'tipoUsuario', FILTER_SANITIZE_STRING));
    $usuario->setTelefone(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING));
    $date = new DateTime();
    $date = $date->format('d-m-Y');
    $usuario->setCreated_at($date);
    $usuario->setUpdate_at($date);

    $pacienteDao = new App\Dao\UsuarioDao();
    $retorno = $pacienteDao->create($usuario);
    echo 'retorno<br/>';
    var_dump($retorno);
    if($retorno){
        $_SESSION['text'] = 'cadastro realizado com sucesso !!';
        $_SESSION['status'] = 'success';

        echo '<pre>session controller';
            print_r($_SESSION);
        echo '</pre>';

        header("Location: ../view/cadastrarUsuario.php");
    }else{
        $_SESSION['text'] = 'Não foi possivel realizar o cadastro';
        $_SESSION['status'] = 'danger';
        header("Location: ../view/cadastrarUsuario.php");
    }
        
}

function listar(){

    
}

function getDados(){
    $idUsuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_STRING);
    $tipoUsuario = filter_input(INPUT_POST, 'tipo_Usuario', FILTER_SANITIZE_STRING);

    $usuarioDao = new App\Dao\UsuarioDao();
    return $usuarioDao->getDados($idUsuario, $tipoUsuario);
}

function editarUsuario(){

    $date = new DateTime();
    $date = $date->format('d-m-Y');

    $tipoAnterior = filter_input(INPUT_POST, 'tipoAntesUpdate', FILTER_SANITIZE_STRING);

    $dados = array(
        "id" => filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING),
        "nome" => (filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING) : FALSE ),
        "email" => (filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) : FALSE ),
        "senha" => (filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING) : FALSE ),
        "acesso" => (filter_input(INPUT_POST, 'acesso', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'acesso', FILTER_SANITIZE_STRING) : FALSE ),
        "tipoUsuario" => (filter_input(INPUT_POST, 'tipoUsuario', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'tipoUsuario', FILTER_SANITIZE_STRING) : $tipoAnterior ),
        "telefone" => (filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING) : FALSE ),
        "update" => $date
    );
    
    $usuarioDao = new App\Dao\UsuarioDao();
    $retorno = $usuarioDao->update($dados);
    if($retorno){
        $mensagem= 'Dados salvo com sucesso !!';
        $operation = 'success';
        $array = array('mensagem'=> $mensagem , 'status'=> $operation);
    }else{
      
        $mensagem= 'Não foi possivel salvar os dados';
        $operation = 'danger';
        $array = array('mensagem'=> $mensagem , 'status'=> $operation);
    }
    return $array;

}

function buscarUsuarios()
{

    $palavra = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);


    $usuarioDao = new App\Dao\UsuarioDao();
    $listaPaciente = $usuarioDao->buscaPorNomeUsuario('paciente', $palavra);

    $listaProfissional = $usuarioDao->buscaPorNomeUsuario('profissional', $palavra);

    $result = array_merge($listaPaciente, $listaProfissional);
  

    $_SESSION['buscaUsuarios'] = $result;
    header("Location: ../view/listarUsuario.php");
    return $result;

}