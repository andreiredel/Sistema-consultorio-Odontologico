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
            <a href="#">Agendamento</a>
          </li>
          <li class="breadcrumb-item active">Cadastrar</li>
        </ol>
        <!--form  search -->
      <fieldset class="form-group">
        <legend>Cadastrar agendamento</legend>
            <div class="card-body">
                <form>
                    <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="firstName" class="form-control" placeholder="Nome do Paciente" required="required" autofocus="autofocus">
                            <label for="firstName">Nome Paciente</label>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="lastName" class="form-control" placeholder="Nome do Profissional" required="required">
                            <label for="lastName">Nome Profissional</label>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" placeholder="Data e hora do atendimento" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="procedimento" class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                            <label for="procedimento">Procedimento</label>
                            </div>
                    </div>
                    <button class="btn btn-primary btn-block" >Salvar</button>
                </form>
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
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>

</body>

</html>
