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
    case 'editarMeusDados':
        editarMeusDados();
        break;
    case 'listar':
        $retorno = getUsuario();
        echo json_encode($retorno);
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

    $options=[
        'cost' => 12,
      ];

    $usuario = new \App\Model\Usuario();
    $usuario->setNome(trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING)));
    $usuario->setEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $usuario->setSenha(password_hash(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT, $options));
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
        $_SESSION['mensagemModal'] = 'cadastro realizado com sucesso !!';
        $_SESSION['statusModal'] = 'success';
        header("Location: ../view/cadastrarUsuario.php");
    }else{
        $_SESSION['mensagemModal'] = 'Não foi possivel realizar o cadastro';
        $_SESSION['statusModal'] = 'danger';
        header("Location: ../view/cadastrarUsuario.php");
    }
        
}

function verificaSessao(){
    // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['UsuarioID'])) {
        // Destrói a sessão por segurança
        session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: index.php"); exit;
    }

}

function getDados(){
    $idUsuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_STRING);
    $tipoUsuario = filter_input(INPUT_POST, 'tipo_Usuario', FILTER_SANITIZE_STRING);

    $usuarioDao = new App\Dao\UsuarioDao();
    return $usuarioDao->getDados($idUsuario, $tipoUsuario);
}

function editarMeusDados(){

    $date = new DateTime();
    $date = $date->format('d-m-Y');
    $options=[
        'cost' => 12,
      ];

    $tipoAnterior = filter_input(INPUT_POST, 'tipoAntesUpdate', FILTER_SANITIZE_STRING);

    $dados = array(
        "id" => filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING),
        "nome" => (filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING)? trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING)) : NULL ),
        "email" => (filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) : NULL ),
        "senha" => (filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)? password_hash(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT, $options) : NULL ),
        "acesso" => (filter_input(INPUT_POST, 'acesso', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'acesso', FILTER_SANITIZE_STRING) : NULL ),
        "tipoUsuario" => (filter_input(INPUT_POST, 'tipoUsuario', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'tipoUsuario', FILTER_SANITIZE_STRING) : $tipoAnterior ),
        "telefone" => (filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING) : NULL ),
        "update" => $date
    );

    $usuarioDao = new App\Dao\UsuarioDao();
    $retorno = $usuarioDao->update($dados);
    if($retorno){
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['mensagemModal'] = 'Dados salvo com sucesso !!';
        $_SESSION['statusModal'] =  'success';
        header("Location: ../view/editarMeusDados.php");
    }else{
      
        $_SESSION['mensagemModal'] = 'Não foi possivel salvar os dados !!';
        $_SESSION['statusModal'] =  'danger';
        header("Location: ../view/editarMeusDados.php");
    }

}

function editarUsuario(){

    $options=[
        'cost' => 12,
      ];

    $date = new DateTime();
    $date = $date->format('d-m-Y');

    $tipoAnterior = filter_input(INPUT_POST, 'tipoAntesUpdate', FILTER_SANITIZE_STRING);

    $dados = array(
        "id" => filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING),
        "nome" => (filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING)? trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING)) : NULL ),
        "email" => (filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) : NULL ),
        "senha" => (filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)? password_hash(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT, $options) : NULL ),
        "acesso" => (filter_input(INPUT_POST, 'acesso', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'acesso', FILTER_SANITIZE_STRING) : NULL ),
        "tipoUsuario" => (filter_input(INPUT_POST, 'tipoUsuario', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'tipoUsuario', FILTER_SANITIZE_STRING) : $tipoAnterior ),
        "telefone" => (filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING)? filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING) : NULL ),
        "update" => $date
    );

    $usuarioDao = new App\Dao\UsuarioDao();
    $retorno = $usuarioDao->update($dados);
    if($retorno){
        $mensagem= 'Dados salvo com sucesso !!';
        $operation = 'success';
        $_SESSION['nome'] = $dados['nome'];
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
    $servicoProntuario = (filter_input(INPUT_POST, 'servico', FILTER_SANITIZE_STRING))? true : false;
    var_dump($_POST);
    var_dump($servicoProntuario);
    $usuarioDao = new App\Dao\UsuarioDao();
    $listaPaciente = $usuarioDao->buscaPorNomeUsuario('paciente', $palavra);
    if($servicoProntuario){
        var_dump('teste');
        var_dump($result);
        $result = $listaPaciente;
        $_SESSION['buscaUsuarios'] = $result;
        header("Location: ../view/prontuario.php");
    } else {
        $listaProfissional = $usuarioDao->buscaPorNomeUsuario('profissional', $palavra);
        $result = array_merge($listaPaciente, $listaProfissional);
        $_SESSION['buscaUsuarios'] = $result;
        header("Location: ../view/listarUsuario.php");
        return $result;
    }

   

}

function getUsuario(){

        $tipoUsuario = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
        $usuarioDao = new App\Dao\UsuarioDao();
        $listaUsuario = $usuarioDao->getUsuario($tipoUsuario);
        if ($listaUsuario) {
            return $listaUsuario;
        } else {
            return false;
        }

}