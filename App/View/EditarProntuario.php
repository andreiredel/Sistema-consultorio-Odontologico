<?php
  session_start();
  require_once '../../vendor/autoload.php';
  require_once 'Alertas.php';
  include 'header.php';
  include 'menuLateral.php';
  mostraAlerta();
    // echo '<pre>session';
    // print_r($_SESSION);
    // echo'</pre>';
    
    $prontuarioDao = new App\Dao\ProntuarioDao();
    $dadosProntuario = $prontuarioDao->getProntuario($_SESSION['info']['idpaciente']);
    $displayDadosPessoais = (isset($dadosProntuario) && !empty($dadosProntuario))? 'disabled' :'' ;
    $arrayDadosProntuario['anamnese'] =  $prontuarioDao->getDadosCompleto("anamnese", $_SESSION['info']['idpaciente']);
    $displayAnamnese = (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? 'disabled' :'' ;
    $arrayDadosProntuario['exameFisico'] =  $prontuarioDao->getDadosCompleto("exame_Fisico", $_SESSION['info']['idpaciente']);
    $displayExameFisico = (isset($arrayDadosProntuario['exameFisico']) && !empty($arrayDadosProntuario['exameFisico']))? 'disabled' :'' ;
    $arrayDadosProntuario['exameClinico'] =  $prontuarioDao->getDadosCompleto("exame_clinico", $_SESSION['info']['idpaciente']);
    $displayExameClinico = (isset($arrayDadosProntuario['exameClinico']) && !empty($arrayDadosProntuario['exameClinico']))? 'disabled' :'' ;
    $arrayDadosProntuario['examePeriodontal'] =  $prontuarioDao->getDadosCompleto("exameperio", $_SESSION['info']['idpaciente']);
    $displayExamePeriodontal = (isset($arrayDadosProntuario['examePeriodontal']) && !empty($arrayDadosProntuario['examePeriodontal']))? 'disabled' :'' ;
    $arrayDadosProntuario['registro'] =  $prontuarioDao->getDadosCompleto("registro_atendimento",$_SESSION['info']['idpaciente']);
    $displayRegistro = (isset($arrayDadosProntuario['registro']) && !empty($arrayDadosProntuario['registro']))? 'disabled' :'' ;
    
    $operation = (isset($dadosProntuario) && !empty($dadosProntuario))? "editarDadosPessoais" : "cadastrarDadosPessoais";

    $arrayDadosProntuario['registro'] =  $prontuarioDao->getTodosOsDados("registro_atendimento", $_SESSION['info']['idpaciente']);
    echo '<pre>registro';
    print_r($arrayDadosProntuario['registro']);
    echo'</pre>';
?>
    <style>
        
    </style>
    <script src="../../componentes/jquery/jquery.min.js"></script>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Prontuário</li>
        </ol>
        <!--form  search -->
      <fieldset class="form-group">
        <legend>Prontuário</legend>
            <div class="card-body">
                    <div class="col-md-12">
                            <div class="">
                                <h4 for="firstName">Paciente: <?= $_SESSION['info']['nomepaciente'] ?></h4>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="">
                            <a href="../Controller/prontuarioController.php?operation=getDadosCompleto&idPaciente=<?=$_SESSION['info']['idpaciente']?>"><button class="btn btn-md btn-primary" type="submit"><i class="fas fa-folder"></i> VIsualizar Prontuario Completo</button></a>
                            </div>
                    </div>
            </div>
            <div class="card-body">
                <fieldset class="form-group">
                    <legend>Dados do prontuário</legend>
                    <div class="container">
              <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12 col-xs-12 ">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dados Pessoais</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" onclick='getAnamnese();'>Anamnese</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Exame Físico</a>
                            <a class="nav-item nav-link" id="nav-clinico-tab" data-toggle="tab" href="#nav-clinico" role="tab" aria-controls="nav-clinico" aria-selected="false">Exame Clínico</a>
                            <a class="nav-item nav-link" id="nav-perio-tab" data-toggle="tab" href="#nav-perio" role="tab" aria-controls="nav-perio" aria-selected="false">Exame Periodontal</a>
                            <a class="nav-item nav-link" id="nav-registro-tab" data-toggle="tab" href="#nav-registro" role="tab" aria-controls="nav-registro" aria-selected="false">Registro de Atendimento</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form id="formDadosPessoais" action='../Controller/ProntuarioController.php' method='POST'>
                                    <input type="hidden" name="idPaciente" value='<?=$_SESSION['info']['idpaciente']?>'>
                                    <input type="hidden" name="operation" value='<?=  $operation ?>'>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="rg" class="form-control" name='rg' placeholder="Numero do RG" required="required" autofocus="autofocus" value="<?= ($dadosProntuario)? $dadosProntuario['rg'] :''  ?>">
                                                <label for="rg">RG</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="orgãoEx" class="form-control" name='orgaoEx' placeholder="Órgão expedidor" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['rg'] :''?>" >
                                                <label for="orgãoEx">Órgão expedidor</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="cpf" class="form-control" name='cpf' placeholder="Digite o numero do CPF" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['cpf'] :''?>" >
                                                <label for="cpf">CPF</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                    <input type="text" id="dataNascimento" name='nascimento' class="form-control" placeholder="Data de nascimento" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['data_nascimento'] :''?>">
                                                <label for="dataNascimento">Data de nascimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <select class="form-control" id="selectGenero" name='genero' placeholder="Gênero" >
                                                    <option value="" disabled selected>Gênero</option>
                                                    <option value="feminino">Feminino</option>
                                                    <option value="masculino">Masculino</option>
                                                </select>
                                                <?php   
                                                        $retorno = ($dadosProntuario)? $dadosProntuario['genero'] : false ;
                                                        if($retorno){
                                                            ?>
                                                             <script>
                                                                 $('#selectGenero').val('<?= $retorno ?>');
                                                             </script>               
                                                            <?php
                                                        }
                                                ?>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="estado_civil" class="form-control" name='estado_civil' placeholder="Descreva qual sera o procedimento" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['estado_civil'] :''?>">
                                                <label for="estado_civil">Estado civil</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="Naturalidade" class="form-control" name='naturalidade' placeholder="Descreva qual sera o procedimento" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['naturalidade'] :''?>" >
                                                <label for="Naturalidade">Naturalidade </label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="Nacionalidade" class="form-control" name='nacionalidade' placeholder="Descreva qual sera o procedimento" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['nacionalidade'] :''?>" >
                                                <label for="Nacionalidade">Nacionalidade</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="Profissão" class="form-control" name='profissao' placeholder="Descreva qual sera o procedimento" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['profissao'] :''?>" >
                                                <label for="Profissão">Profissão</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="Endereço" class="form-control" name='endereco' placeholder="Descreva qual sera o procedimento" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['end_residencial'] :''?>" >
                                                <label for="Endereço">Endereço residencial </label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="CEP" class="form-control" name='cep' placeholder="Descreva qual sera o procedimento" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['cep'] :''?>" >
                                                <label for="CEP">CEP</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="Cidade" class="form-control" name='cidade' placeholder="Descreva qual sera o procedimento" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['cidade'] :''?>" >
                                                <label for="Cidade">Cidade</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="Estado" class="form-control" name='estado' placeholder="Descreva qual sera o procedimento" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['estado'] :''?>" >
                                                <label for="Estado">Estado </label>
                                                </div>
                                        </div>
                                        <!-- <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="Telefone" class="form-control" name='telefone' placeholder="Descreva qual sera o procedimento" required="required" value="<?= ($dadosProntuario)? $dadosProntuario['telefone'] :''  ?>">
                                                <label for="Telefone">Telefone</label>
                                                </div>
                                        </div> -->
                                        
                                    <!-- </div>
                                    <div class="row"> -->
                                        <div class="form-group col-md-4">
                                            <div class="form-label-group">
                                                <select class="form-control" id="selectRaca" name='cor' >
                                                    <option value="" disabled selected>Qual a sua cor/raça?</option>
                                                    <option value="branca">Branca</option>
                                                    <option value="parda">Parda</option>
                                                    <option value="preta">Preta</option>
                                                    <option value="amarela">Amarela</option>
                                                    <option value="indigena">Indígena</option>
                                                    <option value="naosei">Não sei</option>
                                                </select>
                                                </div>
                                        </div>
                                        <?php   
                                                        $retorno = ($dadosProntuario)? $dadosProntuario['cor_raca'] : false ;
                                                        if($retorno){
                                                            ?>
                                                             <script>
                                                                 $('#selectRaca').val('<?= $retorno ?>');
                                                             </script>               
                                                            <?php
                                                        }
                                                ?>
                                        <div class="form-group col-md-4">
                                            <div class="form-label-group">
                                                <select class="form-control" id="reside" name='moradia' >
                                                    <option value="" disabled selected>Mora com quem/onde?</option>
                                                    <option value="sozinho">Sozinho</option>
                                                    <option value="com_familiares">Com familiares</option>
                                                    <option value="com_cuidador">Com Cuidador</option>
                                                    <option value="intituicao_publica">Instituição pública</option>
                                                    <option value="intituicao_privada">Instituição privada</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php   
                                                        $retorno = ($dadosProntuario)? $dadosProntuario['moradia'] : false ;
                                                        if($retorno){
                                                            ?>
                                                             <script>
                                                                 $('#reside').val('<?= $retorno ?>');
                                                             </script>               
                                                            <?php
                                                        }
                                                ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-label-group" style="float: right;">
                                                <button class="btn btn-md btn-primary" type="submit"><i class="fas fa-edit"></i> Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form id="forAnamnese" action='../Controller/ProntuarioController.php' method='POST'>
                                    <input type="hidden" name="idPaciente" value='<?=$_SESSION['info']['idpaciente']?>'>
                                    <input type="hidden" name="operation" value='cadastrarAnamnese'>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="queixa" class="form-control" name="evolucao_queixa" placeholder="Queixa principal e evolução da doença atual" <?= $displayAnamnese ?> required="required" value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['doencas'] :''?>">
                                                    <label for="queixa">Queixa e evolução da doença atual</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                        <input type="text" id="expectativa" name="expectativa" class="form-control" placeholder="Expectativa com o tratamento" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['expectativa'] :''?>">
                                                        <label for="expectativa">Expectativa com o tratamento</label>
                                                    </div>
                                            </div>
                                        
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="alergia" class="form-control" name="alergia" placeholder="Paciente tem alguma alergia? qual?" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['alergias'] :''?>">
                                                    <label for="alergia">Paciente tem alguma alergia? qual?</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="medicamentos" class="form-control" name="medicamentos" placeholder="Medicamentos em uso" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['medicamentos'] :''?>">
                                                    <label for="medicamentos">Medicamentos em uso</label>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="gravida" class="form-control" name="gravida" placeholder="Está grávida?" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['gravida'] :''?>">
                                                    <label for="gravida">Está grávida?</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="ulti_dentista" class="form-control" name="ulti_dentista" placeholder="Última visita ao dentista?" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['ult_visita_dentista'] :''?>">
                                                    <label for="ulti_dentista">Última visita ao dentista?</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="motivo_consulta" class="form-control" name="motivo_consulta" placeholder="Motivo da consulta" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['motivo_consulta'] :''?>">
                                                    <label for="motivo_consulta">Motivo da consulta</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="tipo_servico" class="form-control" name="tipo_servico" placeholder="Qual o tipo de serviço odontológico que procurou na última consulta?" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['tipo_servico'] :''?>">
                                                    <label for="tipo_servico">Tipo de serviço odontológico que procurou na última consulta?</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="avalia_saude" class="form-control" name="avalia_saude" placeholder="Como você avalia sua condição de saúde bucal?" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['avalia_saud_bucal'] :''?>"> 
                                                    <label for="avalia_saude">Como você avalia sua condição de saúde bucal?</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="freq_escovacao" class="form-control" name="freq_escovacao" placeholder="Frequência de escovação:" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['frequancia_escovacao'] :''?>">
                                                    <label for="freq_escovacao">Frequência de escovação:</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="limpeza_entre_dentes" class="form-control" name="limpeza_entre_dentes" placeholder="Faz limpeza entre os dentes:" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['limpeza_entre_dentes'] :''?>">
                                                    <label for="limpeza_entre_dentes">Faz limpeza entre os dentes:</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="frequencia_limpeza_entre_dentes" class="form-control" name="frequencia_limpeza_entre_dentes" placeholder="Faz limpeza entre os dentes:" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['frequencia_limp_entre_dentes'] :''?>">
                                                    <label for="frequencia_limpeza_entre_dentes">Qual a frequência de limpeza entre os dentes no mês?</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="tipo_escova" class="form-control" name="tipo_escova" placeholder="Qual o tipo de escova dental: " required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['tipo_escova'] :''?>">
                                                    <label for="tipo_escova">Qual o tipo de escova dental: </label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="freq_acucar" class="form-control" name="freq_acucar" placeholder="Frequência de açúcar / bebidas/alimentos ácidos" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['frequencia_acucar'] :''?>">
                                                    <label for="freq_acucar">Frequência de açúcar / bebidas/alimentos ácidos</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="anestesiado" class="form-control" name="anestesiado" placeholder="Já foi anestesiado no dentista alguma vez?" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['anestesiado_dentista'] :''?>">
                                                    <label for="anestesiado">Já foi anestesiado no dentista alguma vez? sim? como foi?</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="Complicações" class="form-control" name="Complicações" placeholder="Complicações em tratamentos odontológicos anteriores:" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['complicacoes_tratamento'] :''?>">
                                                    <label for="Complicações">Complicações em tratamentos odontológicos anteriores:</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="doencas" name="doencas" class="form-control" placeholder="Doencas" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['doencas'] :''?>">
                                                    <label for="doencas">Teve ou tem alguma tipo de doença?</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="medicamento_receitado_por" name='medicamento_receitado_por' class="form-control" placeholder="Quem receitou?" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['medicamento_receitado_por'] :''?>">
                                                    <label for="medicamento_receitado_por">Quem receitou?</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="habitos" name='habitos' class="form-control" placeholder="Hábitos parafuncionais" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['habito_parafuncional'] :''?>">
                                                    <label for="habitos">Hábitos parafuncionais</label>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <div class="form-label-group">
                                                    <input type="text" id="dataAnamnese" name='data' class="form-control" placeholder="Data" required="required" <?= $displayAnamnese ?> value="<?= (isset($arrayDadosProntuario['anamnese']) && !empty($arrayDadosProntuario['anamnese']))? $arrayDadosProntuario['anamnese']['data'] :''?>">
                                                    <label for="dataAnamnese">Data</label>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="form-label-group" style="float: right;">
                                                <?php
                                                    if(!isset($arrayDadosProntuario['exameFisico']) && empty($arrayDadosProntuario['anamnese'])){
                                                 ?>
                                                        <button class="btn btn-md btn-primary" type="submit"><i class="fas fa-edit"></i> Salvar</button>
                                                <?php
                                                    }
                                                ?>                                                 </div>
                                            </div>
                                        </div>
                                    
                                </form>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <form id="exameFisico" action='../Controller/ProntuarioController.php' method='POST'>
                                    <input type="hidden" name="idPaciente" value='<?=$_SESSION['info']['idpaciente']?>'>
                                    <input type="hidden" name="operation" value='cadastrarExameFisico'>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                                <div class="form-label-group">
                                                <input type="text" id="geral" name='geral' class="form-control" placeholder="Geral:" required="required"  <?= $displayExameFisico ?> value="<?= (isset($arrayDadosProntuario['exameFisico']) && !empty($arrayDadosProntuario['exameFisico']))? $arrayDadosProntuario['exameFisico']['geral'] :''?>">
                                                <label for="geral">Geral:</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-label-group">
                                                <input type="text" id="tecidos_moles" name='tecidos_moles' class="form-control" placeholder="Avaliação de tecidos moles" required="required" <?= $displayExameFisico ?> value="<?= (isset($arrayDadosProntuario['exameFisico']) && !empty($arrayDadosProntuario['exameFisico']))? $arrayDadosProntuario['exameFisico']['avaliacao_tecidos_moles'] :''?>">
                                                <label for="tecidos_moles">Avaliação de tecidos moles</label>
                                                </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                                <div class="form-label-group">
                                                <input type="text" id="descricao_tecidos" name='descricao_tecidos' class="form-control" placeholder="Nome do Profissional" required="required" <?= $displayExameFisico ?> value="<?= (isset($arrayDadosProntuario['exameFisico']) && !empty($arrayDadosProntuario['exameFisico']))? $arrayDadosProntuario['exameFisico']['descricao_tecidos_moles'] :''?>">
                                                <label for="descricao_tecidos">Avaliação de tecidos moles(descrição)</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-label-group">
                                                <input type="text" id="angle" name='angle' class="form-control" placeholder="Classificação de Angle" required="required" <?= $displayExameFisico ?> value="<?= (isset($arrayDadosProntuario['exameFisico']) && !empty($arrayDadosProntuario['exameFisico']))? $arrayDadosProntuario['exameFisico']['classificacao_angle'] :''?>">
                                                <label for="angle">Classificação de Angle</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-label-group">
                                                <input type="text" id="dataFisico" name='data' class="form-control" placeholder="Digite a data" required="required" <?= $displayExameFisico ?> value="<?= (isset($arrayDadosProntuario['exameFisico']) && !empty($arrayDadosProntuario['exameFisico']))? $arrayDadosProntuario['exameFisico']['data'] :''?>">
                                                <label for="dataFisico">Data</label>
                                                </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-label-group" style="float: right;">
                                            <?php
                                                    if(!isset($arrayDadosProntuario['exameFisico']) && empty($arrayDadosProntuario['exameFisico'])){
                                                 ?>
                                                        <button class="btn btn-md btn-primary" type="submit"><i class="fas fa-edit"></i> Salvar</button>
                                                <?php
                                                    }
                                                ?> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                </div>
                                <div class="tab-pane fade" id="nav-clinico" role="tabpanel" aria-labelledby="nav-clinico-tab">
                                <form id='exameClinico' action='../Controller/ProntuarioController.php' method='POST'>
                                    <input type="hidden" name="idPaciente" value='<?=$_SESSION['info']['idpaciente']?>'>
                                    <input type="hidden" name="operation" value='cadastrarExameClinico'>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                                <div class="form-label-group">
                                                <input type="text" id="dataClinico" name='data' class="form-control" placeholder="Data" required="required" <?= $displayExameClinico ?> value="<?= (isset($arrayDadosProntuario['exameFisico']) && !empty($arrayDadosProntuario['exameClinico']))? $arrayDadosProntuario['exameClinico']['data'] :''?>">
                                                <label for="dataClinico">Data</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-label-group">
                                                <input type="text" id="numero_dente" name='numero_dente' class="form-control" placeholder="Numero do dente" required="required" <?= $displayExameClinico ?> value="<?= (isset($arrayDadosProntuario['exameFisico']) && !empty($arrayDadosProntuario['exameClinico']))? $arrayDadosProntuario['exameClinico']['dente'] :''?>">
                                                <label for="numero_dente">Numero do dente</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-label-group">
                                                <input type="text" id="descricao_clinico" name='descricao' class="form-control" placeholder="Descrição" required="required" <?= $displayExameClinico ?> value="<?= (isset($arrayDadosProntuario['exameFisico']) && !empty($arrayDadosProntuario['exameClinico']))? $arrayDadosProntuario['exameClinico']['descricao'] :''?>">
                                                <label for="descricao_clinico">Descrição:</label>
                                                </div>
                                        </div>
                            
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-label-group" style="float: right;">
                                                <?php
                                                    if(!isset($arrayDadosProntuario['exameFisico']) && empty($arrayDadosProntuario['exameClinico'])){
                                                 ?>
                                                        <button class="btn btn-md btn-primary" type="submit"><i class="fas fa-edit"></i> Salvar</button>
                                                <?php
                                                    }
                                                ?> 
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                </div>
                                <div class="tab-pane fade" id="nav-perio" role="tabpanel" aria-labelledby="nav-perio-tab">
                                <form id='examePerio'action='../Controller/ProntuarioController.php' method='POST'>
                                    <input type="hidden" name="idPaciente" value='<?=$_SESSION['info']['idpaciente']?>'>
                                    <input type="hidden" name="operation" value='cadastrarExamePerio'>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                                <div class="form-label-group">
                                                <input type="text" id="dataPerio" name='data' class="form-control" placeholder="Data" required="required" <?= $displayExamePeriodontal ?> value="<?= (isset($arrayDadosProntuario['examePeriodontal']) && !empty($arrayDadosProntuario['examePeriodontal']))? $arrayDadosProntuario['examePeriodontal']['data'] :''?>">
                                                <label for="dataPerio">Data</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-label-group">
                                                <input type="text" id="avaliativo" name="avaliativo" class="form-control" placeholder="Parâmentro avaliativo" required="required" <?= $displayExamePeriodontal ?> value="<?= (isset($arrayDadosProntuario['examePeriodontal']) && !empty($arrayDadosProntuario['examePeriodontal']))? $arrayDadosProntuario['examePeriodontal']['parametro_avaliativo'] :''?>">
                                                <label for="avaliativo">Parâmentro avaliativo</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-label-group">
                                                <input type="text" id="dentePerio" name='dente' class="form-control" placeholder="Número do dente:" required="required" <?= $displayExamePeriodontal ?> value="<?= (isset($arrayDadosProntuario['examePeriodontal']) && !empty($arrayDadosProntuario['examePeriodontal']))? $arrayDadosProntuario['examePeriodontal']['numero_dente'] :''?>">
                                                <label for="dentePerio">Número do dente:</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-group">
                                                <input type="checkbox" id="v" name='v'  <?= $displayExamePeriodontal ?> <?= (isset($arrayDadosProntuario['examePeriodontal']) && $arrayDadosProntuario['examePeriodontal']['perio_v'])? "checked" :''?>>
                                                <label for="v">V:</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-group">
                                                <input type="checkbox" id="p" name="p" <?= $displayExamePeriodontal ?> <?= (isset($arrayDadosProntuario['examePeriodontal']) && $arrayDadosProntuario['examePeriodontal']['perio_p'])? 'checked' :''?>>
                                                <label for="p">P/L:</label>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                                <div class="form-group">
                                                <input type="checkbox" id="dv" name="dv" <?= $displayExamePeriodontal ?> <?= (isset($arrayDadosProntuario['examePeriodontal']) &&  $arrayDadosProntuario['examePeriodontal']['perio_dv'])? 'checked' :''?>>
                                                <label for="dv">DV:</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-group">
                                                <input type="checkbox" id="dp" name="dp" <?= $displayExamePeriodontal ?> <?= (isset($arrayDadosProntuario['examePeriodontal']) && ($arrayDadosProntuario['examePeriodontal']['perio_dp']))? 'checked' :''?>>
                                                <label for="dp">DP/DL:</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-group">
                                                <input type="checkbox" id="mv" name="mv" <?= $displayExamePeriodontal ?> <?= (isset($arrayDadosProntuario['examePeriodontal']) && $arrayDadosProntuario['examePeriodontal']['perio_mv'])?'checked'  :''?>>
                                                <label for="mv">MV:</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-group">
                                                <input type="checkbox" id="mp" name="mp" <?= $displayExamePeriodontal ?> <?= (isset($arrayDadosProntuario['examePeriodontal']) && $arrayDadosProntuario['examePeriodontal']['perio_mp'])? 'checked' :''?>>
                                                <label for="mp">MP/ML:</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <div class="form-label-group">
                                                <input type="text" id="observacoes" name="observacoes" class="form-control" placeholder="Observações" required="required" <?= $displayExamePeriodontal ?> value="<?= (isset($arrayDadosProntuario['examePeriodontal']) && !empty($arrayDadosProntuario['examePeriodontal']))? $arrayDadosProntuario['examePeriodontal']['observacoes'] :''?>">
                                                <label for="observacoes">Observações:</label>
                                                </div>
                                        </div>
                            
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-label-group" style="float: right;">
                                            <?php
                                                    if(!isset($arrayDadosProntuario['exameFisico']) && empty($arrayDadosProntuario['examePeriodontal'])){
                                                 ?>
                                                        <button class="btn btn-md btn-primary" type="submit"><i class="fas fa-edit"></i> Salvar</button>
                                                <?php
                                                    }
                                                ?>                                              </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                </div>
                                <div class="tab-pane fade" id="nav-registro" role="tabpanel" aria-labelledby="nav-registro-tab">
                                <form id='RegistroAtendimento' action='../Controller/ProntuarioController.php' method='POST'>
                                    <input type="hidden" name="idPaciente" value='<?=$_SESSION['info']['idpaciente']?>'>
                                    <input type="hidden" name="operation" value='cadastrarRegistroAtendimento'>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                                <div class="form-label-group">
                                                <input type="text" id="dataRegistro" name="data" class="form-control" placeholder="Data" required="required" autofocus="autofocus">
                                                <label for="dataRegistro">Data</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                                <div class="form-label-group">
                                                <input type="text" id="descricaoRegistro" name="descricao" class="form-control" placeholder="Descrição" required="required">
                                                <label for="descricaoRegistro">Descrição</label>
                                                </div>
                                        </div>
                                
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-label-group" style="float: right;">
                                            <button class="btn btn-md btn-success" type="button" data-toggle="modal" data-target="#modalEditar" onclick='$("#history").css("display", "block");'><i class="fas fa-history"></i> Visualizar registros de atendimentos</button>
                                                <button class="btn btn-md btn-primary" type="submit" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit"></i> Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                </div>
                                <!-- DataTables Example -->
                                    <div class="card mb-3" id='history' style='display:none'>
                                    <div class="card-header">
                                        <i class="fas fa-table"></i>
                                         Registro de atendimento
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                                            <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Operação</th>
                                                <th>Usuário</th>
                                                <th>Descrição</th>
                                                <th>Ação</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                 if(isset($arrayDadosProntuario['registro']) && !empty($arrayDadosProntuario['registro'])){

                                                        foreach($arrayDadosProntuario['registro'] as $registro){
                                                ?> 
                                                    <tr>
                                                        <td><?= $registro['data']?></td>
                                                        <td><?= $registro['descricao']?></td>
                                                        <td ><?= $registro['idatendimento']?></td>
                                                        <td><?= $registro['id_paciente']?></td>
                                                        <td>
                                                        <button class="btn btn-md btn-primary" onclick="buscarDados(<?= $usuarios['id'] ?>, '<?= $usuarios['tipousuario'] ?>');"><i class="fas fa-edit"></i> Editar</button>
                                                        <button class="btn btn-md btn-danger" onclick="buscarDados(<?= $usuarios['id'] ?>, '<?= $usuarios['tipousuario'] ?>');"><i class="fas fa-close"></i> Excluir</button>
                                                        </td>
                                                    </tr>
                                                <?php
                                                        }
                                                 }               
                                            ?>
                                           
                                                
                                            
                                            
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                    </div>
              </div>
        </div>
      </div>
</div>
                
                
                
                </fieldset>
            
            </div>
      </fieldset>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  
  
  <script src="../../componentes/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <script type="text/javascript" src="../../css/bootstrap/js/moment.min.js"></script>

  <script type="text/javascript" src="../../css/bootstrap/datetimepicker/datetimepicker.min.js"></script>
  <script type="text/javascript" src="../../componentes/validator/jquery.validate.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        // $.validator.setDefaults({
        //     submitHandler: function() {
        //         alert("submitted!");
        //     }
	    // });

        (function(){
            $('#modalExemplo').modal('show');
            $("#dataNascimento").mask("99-99-9999",{placeholder:"99/99/9999"});
            $("#dataAnamnese").mask("99-99-9999",{placeholder:"99/99/9999"});
            $("#dataFisico").mask("99-99-9999",{placeholder:"99/99/9999"});
            $("#dataClinico").mask("99-99-9999",{placeholder:"99/99/9999"});
            $("#dataPerio").mask("99-99-9999",{placeholder:"99/99/9999"});
            $("#dataRegistro").mask("99-99-9999",{placeholder:"99/99/9999"});
            var data = moment().format('DD-MM-YYYY');
            $("#dataRegistro").val(data);
            
           
        })();


        // function salvarDadosPessoais(){

        //     console.log("abrir prontuario:", idProntuario);
        //       $.ajax({
        //         url: "../Controller/ProntuarioController.php",
        //         type: "POST",
        //         data : {
        //             operation : "getDadosProntuario",
        //             id_usuario : idProntuario,
        //         }

        //     }).done(function(resposta) {
        //       console.log('retorno', resposta);
        //       if(resposta){
        //           window.location.href = "EditarProntuario.php";
        //       }  
        //     });

        // }

    </script>

</body>

</html>
