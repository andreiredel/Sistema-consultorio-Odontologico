<?php

require_once 'vendor/autoload.php';

$usuario = new \App\Model\Usuario();
$usuario->setId(7);
$usuario->setNome('AndreiRRRRRRRRR');
$usuario->setEmail('Andrei@testee.5000000');
$usuario->setSenha('123456');
$usuario->setAcessoSistema('2');
$usuario->setTipoUsuario(2);
$usuario->setTelefone('3333333333');
$usuario->setCreated_at('2019-10-31');
$usuario->setUpdate_at('2019-10-31');

var_dump($usuario);

$pacienteDao = new App\Dao\UsuarioDao();
$retorno = $pacienteDao->create($usuario);
echo 'retorno: '.$retorno;