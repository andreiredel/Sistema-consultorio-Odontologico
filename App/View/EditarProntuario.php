<?php
  session_start();
  require_once '../../vendor/autoload.php';
  include 'header.php';
  include 'menuLateral.php';

?>

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
                                <h4 for="firstName">Paciente: Fulano de Tal</h4>
                            </div>
                    </div>
                    <div class="col-md-12">
                            <div class="">
                            <a href="visualizacaoProntuario.php"><button class="btn btn-md btn-primary" type="submit"><i class="fas fa-folder"></i> VIsualizar Prontuario Completo</button></a>
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
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Anamnese</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Exame Físico</a>
                            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Exame Clínico</a>
                            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Exame Periodontal</a>
                            </div>
                        </nav>
                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form id="formDadosPessoais">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="rg" class="form-control" placeholder="Numero do RG" required="required" autofocus="autofocus">
                                                <label for="firstName">RG</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="orgãoEx" class="form-control" placeholder="Órgão expedidor" required="required">
                                                <label for="lastName">Órgão expedidor</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="cpf" class="form-control" placeholder="Digite o numero do CPF" required="required">
                                                <label for="lastName">CPF</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                    <input type="text" id="dataNascimento" class="form-control" placeholder="Data de nascimento" required="required">
                                                <label for="procedimento">Data de nascimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <select class="form-control" id="exampleFormControlSelect1" placeholder="Gênero">
                                                    <option value="" disabled selected>Gênero</option>
                                                    <option value="feminino">Feminino</option>
                                                    <option value="masculino">Masculino</option>
                                                </select>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Estado civil</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Naturalidade </label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Nacionalidade</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Profissão</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Endereço residencial </label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">CEP</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Cidade</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Estado </label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Telefone</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Telefone</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class="form-label-group">
                                                <select class="form-control" id="selectRaca">
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
                                        <div class="form-group col-md-4">
                                            <div class="form-label-group">
                                                <select class="form-control" id="reside">
                                                    <option value="" disabled selected>Mora com quem/onde?</option>
                                                    <option value="sozinho">Sozinho</option>
                                                    <option value="com_familiares">Com familiares</option>
                                                    <option value="com_cuidador">Com Cuidador</option>
                                                    <option value="intituicao_publica">Instituição pública</option>
                                                    <option value="intituicao_privada">Instituição privada</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-label-group" style="float: right;">
                                                <button class="btn btn-md btn-primary" type="submit" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit"></i> Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form id="forAnamnese">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="queixa" class="form-control" placeholder="Queixa principal e evolução da doença atual" required="required" autofocus="autofocus">
                                                <label for="queixa">Queixa principal e evolução da doença atual</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="expectativa" class="form-control" placeholder="Expectativa com o tratamento" required="required">
                                                <label for="expectativa">Expectativa com o tratamento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="lastName" class="form-control" placeholder="Paciente tem alguma alergia? qual?" required="required">
                                                <label for="lastName">Paciente tem alguma alergia? qual?</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-label-group" style="float: right;">
                                                <button class="btn btn-md btn-primary" type="submit" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit"></i> Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="firstName" class="form-control" placeholder="Nome do Paciente" required="required" autofocus="autofocus">
                                                <label for="firstName">Cidade</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="lastName" class="form-control" placeholder="Nome do Profissional" required="required">
                                                <label for="lastName">Profissão</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="lastName" class="form-control" placeholder="Nome do Profissional" required="required">
                                                <label for="lastName">Cep</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-label-group" style="float: right;">
                                                <button class="btn btn-md btn-primary" type="submit" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit"></i> Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                </div>
                                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="firstName" class="form-control" placeholder="Nome do Paciente" required="required" autofocus="autofocus">
                                                <label for="firstName">Cidade</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="lastName" class="form-control" placeholder="Nome do Profissional" required="required">
                                                <label for="lastName">Profissão</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="lastName" class="form-control" placeholder="Nome do Profissional" required="required">
                                                <label for="lastName">Cep</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                                <div class="form-label-group">
                                                <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                                                <label for="procedimento">Procedimento</label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="form-label-group" style="float: right;">
                                                <button class="btn btn-md btn-primary" type="submit" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit"></i> Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../componentes/jquery/jquery.min.js"></script>
  
  <script src="../../componentes/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <script type="text/javascript" src="../../css/bootstrap/js/moment.min.js"></script>

  <script type="text/javascript" src="../../css/bootstrap/datetimepicker/datetimepicker.min.js"></script>

    <script>
        
    </script>

</body>

</html>
