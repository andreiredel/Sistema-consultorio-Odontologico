<?php
    session_start();
    require_once '../../vendor/autoload.php';
    require_once 'Alertas.php';
    include 'header.php';
    include 'menuLateral.php';
    mostraAlerta();
    
        // die;
    $dadosProntuario = $_SESSION["dadosProntuario"];
    echo '<pre>dadosProntuario';
        print_r($dadosProntuario);
        echo'</pre>';

?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Prontuario Completo</li>
        </ol>
        <!--form  search -->
      <fieldset class="form-group">
        <legend>Prontuario Completo</legend>
        <div class="card-body">
                    <div class="col-md-12">
                            <div class="">
                            <button class="btn btn-md btn-primary" type="button" onclick='CriaPDF();'><i class="fas fa-cloud-download-alt"></i> Gerar PDF</button>
                            </div>
                    </div>
            </div>
            <div class="card-body" id='prontuarioCompleto'>
            <!-- <form action="mail.php" method="post"> -->
            <?php
                    if(isset($dadosProntuario) && !empty($dadosProntuario['dados_pessoais'])){
                      $dadosPessoais = $dadosProntuario['dados_pessoais'];
            ?>
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3></i>IDENTIFICAÇÃO DO PACIENTE</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao" style='font-weight: 700;'>Nome : </span><span class='valor'>teste</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">
                                            <span class="descricao">RG : </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">Órgão expedidor: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">CPF: </span><span class='valor'><?= $dadosPessoais['cpf']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Data de Nascimento: </span><span class='valor'><?= $dadosPessoais['data_nascimento']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Gênero: </span><span class='valor'><?= $dadosPessoais['genero']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">E-mail: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Naturalidade: </span><span class='valor'><?= $dadosPessoais['naturalidade']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Nacionalidade: </span><span class='valor'><?= $dadosPessoais['nacionalidade']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Estado civil: </span><span class='valor'><?= $dadosPessoais['estado_civil']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Profissão: </span><span class='valor'><?= $dadosPessoais['profissao']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Endereço residencial: </span><span class='valor'><?= $dadosPessoais['end_residencial']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">CEP: </span><span class='valor'><?= $dadosPessoais['cep']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Cidade: </span><span class='valor'><?= $dadosPessoais['cidade']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Estado: </span><span class='valor'><?= $dadosPessoais['estado']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">Telefone: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                        </div>
                    <?php   
                    }
                    ?>
                    <?php
                    if(isset($dadosProntuario) && !empty($dadosProntuario['dados_pessoais'])){
                      $dadosPessoais = $dadosProntuario['dados_pessoais'];
            ?>
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3></i>ANAMNESE</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao" style='font-weight: 700;'>Nome : </span><span class='valor'>teste</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">
                                            <span class="descricao">RG : </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">Órgão expedidor: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">CPF: </span><span class='valor'><?= $dadosPessoais['cpf']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Data de Nascimento: </span><span class='valor'><?= $dadosPessoais['data_nascimento']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Gênero: </span><span class='valor'><?= $dadosPessoais['genero']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">E-mail: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Naturalidade: </span><span class='valor'><?= $dadosPessoais['naturalidade']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Nacionalidade: </span><span class='valor'><?= $dadosPessoais['nacionalidade']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Estado civil: </span><span class='valor'><?= $dadosPessoais['estado_civil']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Profissão: </span><span class='valor'><?= $dadosPessoais['profissao']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Endereço residencial: </span><span class='valor'><?= $dadosPessoais['end_residencial']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">CEP: </span><span class='valor'><?= $dadosPessoais['cep']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Cidade: </span><span class='valor'><?= $dadosPessoais['cidade']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Estado: </span><span class='valor'><?= $dadosPessoais['estado']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">Telefone: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                        </div>
                    <?php   
                    }
                    ?>
                    <?php
                    if(isset($dadosProntuario) && !empty($dadosProntuario['dados_pessoais'])){
                      $dadosPessoais = $dadosProntuario['dados_pessoais'];
            ?>
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3></i>EXAME FÍSICO</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao" style='font-weight: 700;'>Nome : </span><span class='valor'>teste</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">
                                            <span class="descricao">RG : </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">Órgão expedidor: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">CPF: </span><span class='valor'><?= $dadosPessoais['cpf']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Data de Nascimento: </span><span class='valor'><?= $dadosPessoais['data_nascimento']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Gênero: </span><span class='valor'><?= $dadosPessoais['genero']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">E-mail: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Naturalidade: </span><span class='valor'><?= $dadosPessoais['naturalidade']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Nacionalidade: </span><span class='valor'><?= $dadosPessoais['nacionalidade']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Estado civil: </span><span class='valor'><?= $dadosPessoais['estado_civil']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Profissão: </span><span class='valor'><?= $dadosPessoais['profissao']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Endereço residencial: </span><span class='valor'><?= $dadosPessoais['end_residencial']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">CEP: </span><span class='valor'><?= $dadosPessoais['cep']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Cidade: </span><span class='valor'><?= $dadosPessoais['cidade']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Estado: </span><span class='valor'><?= $dadosPessoais['estado']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">Telefone: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                        </div>
                    <?php   
                    }
                    ?>
                    <?php
                    if(isset($dadosProntuario) && !empty($dadosProntuario['dados_pessoais'])){
                      $dadosPessoais = $dadosProntuario['dados_pessoais'];
            ?>
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3></i>EXAME CLÍNICO</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao" style='font-weight: 700;'>Nome : </span><span class='valor'>teste</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">
                                            <span class="descricao">RG : </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">Órgão expedidor: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">CPF: </span><span class='valor'><?= $dadosPessoais['cpf']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Data de Nascimento: </span><span class='valor'><?= $dadosPessoais['data_nascimento']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Gênero: </span><span class='valor'><?= $dadosPessoais['genero']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">E-mail: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Naturalidade: </span><span class='valor'><?= $dadosPessoais['naturalidade']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Nacionalidade: </span><span class='valor'><?= $dadosPessoais['nacionalidade']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Estado civil: </span><span class='valor'><?= $dadosPessoais['estado_civil']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Profissão: </span><span class='valor'><?= $dadosPessoais['profissao']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Endereço residencial: </span><span class='valor'><?= $dadosPessoais['end_residencial']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">CEP: </span><span class='valor'><?= $dadosPessoais['cep']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Cidade: </span><span class='valor'><?= $dadosPessoais['cidade']?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                        <span class="descricao">Estado: </span><span class='valor'><?= $dadosPessoais['estado']?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <span class="descricao">Telefone: </span><span class='valor'><?= $dadosPessoais['rg']?></span>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                        </div>
                    <?php   
                    }
                    ?>
                    <!-- </form> -->
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
  <script src="../../componentes/jquery/jquery.min.js"></script>
  
  <script src="../../componentes/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <script type="text/javascript" src="../../css/bootstrap/js/moment.min.js"></script>

  <script type="text/javascript" src="../../css/bootstrap/datetimepicker/datetimepicker.min.js"></script>

    <script>
        function CriaPDF() {
        var minhaTabela = document.getElementById('prontuarioCompleto').innerHTML;
        // var style = "<style>";
        // style = style + "table {width: 100%;font: 20px Calibri;}";
        // style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        // style = style + "padding: 2px 3px;text-align: center;}";
        // style = style + "</style>";
        // CRIA UM OBJETO WINDOW
        var win = window.open('', '', 'height=700,width=700');
        win.document.write('<html><head>');
        win.document.write('<title>Prontuario</title>');   // <title> CABEÇALHO DO PDF.
        // win.document.write(style);                                     // INCLUI UM ESTILO NA TAB HEAD
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(minhaTabela);                          // O CONTEUDO DA TABELA DENTRO DA TAG BODY
        win.document.write('</body></html>');
        win.document.close(); 	                                         // FECHA A JANELA
        win.print();                                                            // IMPRIME O CONTEUDO
    }

    </script>
    <style>
    * { box-sizing:border-box; }

/* basic stylings ------------------------------------------ */
body 				 { background:url(https://scotch.io/wp-content/uploads/2014/07/61.jpg); }

h2 		 { 
  text-align:center; 
  margin-bottom:50px; 
}
h2 small { 
  font-weight:normal; 
  color:#888; 
  display:block; 
}
.footer 	{ text-align:center; }
.footer a  { color:#53B2C8; }

/* form starting stylings ------------------------------- */
.group 			  { 
  position:relative; 
  margin-bottom:45px; 
}
input 				{
  font-size:18px;
  padding:10px 10px 10px 5px;
  display:block;
  width:300px;
  border:none;
  border-bottom:1px solid #757575;
}
input:focus 		{ outline:none; }

/* LABEL ======================================= */
label 				 {
  color:#999; 
  font-size:18px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:5px;
  top:10px;
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}

/* active state */
input:focus ~ label, input:valid ~ label 		{
  top:-20px;
  font-size:14px;
  color:#5264AE;
}

/* BOTTOM BARS ================================= */
.bar 	{ position:relative; display:block; width:300px; }
.bar:before, .bar:after 	{
  content:'';
  height:2px; 
  width:0;
  bottom:1px; 
  position:absolute;
  background:#5264AE; 
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}
.bar:before {
  left:50%;
}
.bar:after {
  right:50%; 
}

/* active state */
input:focus ~ .bar:before, input:focus ~ .bar:after {
  width:50%;
}

/* HIGHLIGHTER ================================== */
.highlight {
  position:absolute;
  height:60%; 
  width:100px; 
  top:25%; 
  left:0;
  pointer-events:none;
  opacity:0.5;
}

/* active state */
input:focus ~ .highlight {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
@keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
    
    
    </style>

</body>

</html>
