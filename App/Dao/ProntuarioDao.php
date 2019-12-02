<?php

namespace App\Dao;

class ProntuarioDao{
    
    private $connect;
    
    public function __construct()
    {
        $this->connect = new \App\Util\Conexao();
    }

    public function create($p)
    {
            $sql = "INSERT INTO ". $p->getTipoUsuario() ." (nome, senha, email, telefone, tipousuario, acessosistema, created_at, update_at )".   
            "VALUES ('".$p->getNome()."','".$p->getSenha()."','".$p->getEmail()."' , '".$p->getTelefone()."','".$p->getTipoUsuario()."','".$p->getAcessoSistema()."', '".$p->getCreated_at()."', '".$p->getUpdate_at()."')";
            $stmt = $this->connect->getInstance()->prepare($sql);

            if($stmt->execute()){
                return true;
            }else{
                $stmt->errorInfo();
                return false;
            }
                   
    }

    public function read($tipoUsuario)
    {
            $sql = "SELECT  id_".$tipoUsuario." as id, nome, tipousuario FROM ". $tipoUsuario;
            $stmt = $this->connect->getInstance()->prepare($sql);
            if($stmt->execute()){
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return  $result;
            }else{
                echo $stmt->errorInfo();
                return false;
            }

    }

    public function update($dados)
    {   

        $nome = ($dados['nome'])? "nome = '".$dados['nome']."'," : '';
        $email = ($dados['email'])? "email='".$dados['email']."'," : '';
        $senha = ($dados['senha'])? "senha= '".$dados['senha']."'," : '';
        $acesso = ($dados['acesso'])? "acessosistema='".$dados['acesso']."'," : '';
        $tipoUsuario = ($dados['tipoUsuario'])? "tipousuario='".$dados['tipoUsuario']."'," : '';
        $telefone = ($dados['telefone'])? "telefone='".$dados['telefone']."'," : '';
        $update = ($dados['update'])? "update_at= '".$dados['update']."'" : '';
        $condicao = "id_".$dados['tipoUsuario']."=". $dados['id'];

        $sql = "UPDATE ".$dados['tipoUsuario']."
        SET ".
            $nome.''. $email.''.$senha.''.$acesso.''.$tipoUsuario.''.$telefone.''.$update
        ." WHERE ". $condicao;

        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){           
            return  true;
        }else{
            echo "<pre>sqllll";
                print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }

    }

    public function delete($id, $tipoUsuario)
    {
        $sql = "DELETE FROM ". $tipoUsuario. " where id_".$tipoUsuario." = ".$id;
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            return  TRUE;
        }else{
             $stmt->errorInfo();
            return false;
        }
    }

    public function getDadosProntuario($idpaciente){
       
        $sql ="SELECT p.nome as nomePaciente, p.id_paciente as idPaciente ".
        " FROM paciente AS p".
        " where p.id_paciente = ". $idpaciente;
        
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            return  $result;
        }else{
            $stmt->errorInfo();
            return false;
        }

    }
    public function cadastrarDadosPessoais($dados){

        $sql = "INSERT INTO dados_pessoais (profissao, end_residencial, estado_civil, cep, cidade, cor_raca, estado,data_nascimento, cpf, nacionalidade, naturalidade, rg, genero, id_paciente, moradia )".   
            "VALUES ('".$dados['profissao']."','".$dados['endereco']."','".$dados['estado_civil']."' , '".$dados['cep']."','".$dados['cidade']."','".$dados['cor']."', '".$dados['estado']."', '".$dados['nascimento']."', '".$dados['cpf']."', '".$dados['nacionalidade']."', '".$dados['naturalidade']."', '".$dados['rg']."', '".$dados['genero']."', '".$dados['idPaciente']."', '".$dados['moradia']."')";
            echo '<pre>sql';
            print_r($sql);
            echo'</pre>';
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            return  true;
        }else{
            echo "<pre>sqllll";
                print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }


    }
    public function getUsuario($tabela){

        $sql = "SELECT  nome, id_".$tabela." as id FROM " .$tabela;
        
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return  $result;
        }else{
            echo "<pre>sqllll";
                print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }


    }

    function getProntuario($idpaciente){
        
        $sql ="SELECT * ".
        " FROM dados_pessoais AS dados".
        " where dados.id_paciente = ". $idpaciente;
        
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
            
        }else{
            $stmt->errorInfo();
            return false;
        }

    }
    
    function cadastrarAnamnese($dados){
    
        $sql = "INSERT INTO anamnese (avalia_saud_bucal, medicamento_receitado_por, frequancia_escovacao, medicamentos, gravida, frequencia_limp_entre_dentes, expectativa, frequencia_acucar, ult_visita_dentista, queixa_evolucao, tipo_escova, motivo_consulta, tipo_servico, complicacoes_tratamento, habito_parafuncional, anestesiado_dentista,limpeza_entre_dentes, alergias, doencas, data, id_paciente)   
        ".   
            "VALUES ('".$dados['avalia_saude']."','".$dados['medicamento_receitado_por']."','".$dados['freq_escovacao']."' , '".$dados['medicamentos']."','".$dados['gravida']."','".$dados['frequencia_limpeza_entre_dentes']."', '".$dados['expectativa']."', '".$dados['freq_acucar']."', '".$dados['ulti_dentista']."', '".$dados['evolucao_queixa']."', '".$dados['tipo_escova']."', '".$dados['motivo_consulta']."', '".$dados['tipo_servico']."', '".$dados['Complicações']."', '".$dados['habitos']."', '".$dados['anestesiado']."', '".$dados['limpeza_entre_dentes']."', '".$dados['alergia']."', '".$dados['doencas']."', '".$dados['data']."', '".$dados['idPaciente']."')";
           
        $stmt = $this->connect->getInstance()->prepare($sql);
        if($stmt->execute()){
            return  true;
        }else{
            echo "<pre>sqllll";
                print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }
    }

    public function cadastrarExameFisico($dados)
    {
            $sql = "insert into exame_fisico (avaliacao_tecidos_moles, geral, descricao_tecidos_moles, classificacao_angle, id_paciente, data) ".   
            "VALUES ('".$dados['tecidos_moles']."','".$dados['geral']."','".$dados['descricao_tecidos']."' , '".$dados['angle']."','".$dados['idPaciente']."','".$dados['data']."')";
            $stmt = $this->connect->getInstance()->prepare($sql);
            //    echo '<pre>sql';
            //     print_r($sql);
            //     echo'</pre>';
            //     die;
            if($stmt->execute()){
                return true;
            }else{
                $stmt->errorInfo();
                return false;
            }
                   
    }

    public function cadastrarExameClinico($dados)
    {
            $sql = "insert into exame_clinico (dente, descricao, id_paciente, data)".   
            "VALUES ('".$dados['numero_dente']."','".$dados['descricao']."','".$dados['idPaciente']."' , '".$dados['data']."')";
            $stmt = $this->connect->getInstance()->prepare($sql);
            //    echo '<pre>sql';
            //     print_r($sql);
            //     echo'</pre>';
            //     die;
            if($stmt->execute()){
                return true;
            }else{
                $stmt->errorInfo();
                return false;
            }
                   
    }

    public function cadastrarExamePerio($dados)
    {
    
            $v = ($dados['v'])? "'".$dados['v']."'" : 'NULL';
            $p = ($dados['p'])? "'".$dados['p']."'" : 'NULL';
            $dv = ($dados['dv'])? "'".$dados['dv']."'" : 'NULL';
            $dp = ($dados['dp'])? "'".$dados['dp']."'" : 'NULL';
            $mv = ($dados['mv'])? "'".$dados['mv']."'" : 'NULL';
            $mp = ($dados['mp'])? "'".$dados['mp']."'" : 'NULL';

           

            $sql = "insert into exameperio (numero_dente, parametro_avaliativo, perio_p, perio_dv,perio_v, perio_mp,perio_mv, id_paciente, data, perio_dp, observacoes)".   
            "VALUES ('".$dados['dente']."','".$dados['avaliativo']."',".$p." , ".$dv." ,".$v." , ".$mp." , ".$mv." , '".$dados['idPaciente']."', '".$dados['data']."', ".$dp.", '".$dados['observacoes']."')";
            $stmt = $this->connect->getInstance()->prepare($sql);
            // echo '<pre>sql';
            // print_r($sql);
            // echo'</pre>';
            // die; 
            
            if($stmt->execute()){
                return true;
            }else{
                $stmt->errorInfo();
                return false;
            }
                   
    }

    public function cadastrarRegistroAtendimento($dados)
    {
        
            $sql = "insert into registro_atendimento (descricao, data, id_paciente)".   
            "VALUES ('".$dados['descricao']."','".$dados['data']."', '".$dados['idPaciente']."')";
            $stmt = $this->connect->getInstance()->prepare($sql);
           
            
            if($stmt->execute()){
                return true;
            }else{
                $stmt->errorInfo();
                return false;
            }
                   
    }

    function getDadosCompleto($tabela, $condicao)
    {
        
        $sql ="SELECT * FROM ".
        $tabela.
        " where id_paciente = ". $condicao;
        $stmt = $this->connect->getInstance()->prepare($sql);  
        // echo '<pre>sql';
        // print_r($sql);
        // echo'</pre>';
        // die;
        if($stmt->execute()){
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }else{
            $stmt->errorInfo();
            return false;
        }
                   
    }

    public function editarDadosPessoais($dados)
    {
        $sql = "UPDATE  dados_pessoais SET profissao = '".$dados['profissao']."', end_residencial = '".$dados['endereco']."', estado_civil = '".$dados['estado_civil']."', cep = '".$dados['cep']."', cidade = '".$dados['cidade']."', cor_raca = '".$dados['cor']."', estado = '".$dados['estado']."',data_nascimento = '".$dados['nascimento']."', cpf = '".$dados['cpf']."', nacionalidade = '".$dados['nacionalidade']."', naturalidade = '".$dados['naturalidade']."', rg = '".$dados['rg']."', genero = '".$dados['genero']."', id_paciente = '".$dados['idPaciente']."', moradia = '".$dados['moradia']."'";
        echo '<pre>sql';
        print_r($sql);
        echo'</pre>';
    $stmt = $this->connect->getInstance()->prepare($sql);
    if($stmt->execute()){
        return  true;
    }else{
        echo "<pre>sqllll";
            print_r($stmt->errorInfo());
        echo "</pre>";
        return false;
    }


    }

    
}