<?php 
 session_start();
require_once '../../vendor/autoload.php';

var_dump('cadastrar agendamento');
var_dump($_POST);

$operation = filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING);

switch($operation){
    case 'cadastrar':
        $retorno = cadastraAgendamento();
        break;

}

function cadastraAgendamento(){
    var_dump('function cadastrar');
    die;

}