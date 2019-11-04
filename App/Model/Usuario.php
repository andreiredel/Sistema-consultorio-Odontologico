<?php

namespace App\Model;

class Usuario{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $acessoSistema;
    private $tipoUsuario;
    private $telefone;
    private $created_at;
    private $update_at;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setAcessoSistema($acessoSistema)
    {
        $this->acessoSistema = $acessoSistema;
    }

    public function getAcessoSistema()
    {
        return $this->acessoSistema;
    }

    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setUpdate_at($update_at)
    {
        $this->update_at = $update_at;
    }

    public function getUpdate_at()
    {
        return $this->update_at;
    }



}