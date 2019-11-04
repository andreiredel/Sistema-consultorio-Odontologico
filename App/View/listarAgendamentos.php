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
          <li class="breadcrumb-item active">Agendamentos</li>
        </ol>
        <!--form  search -->
      <fieldset class="form-group">
        <legend>Listar Agendamentos</legend>
        <div class="card mb-3">
          <div class="col-12 col-md-10 col-lg-8" style="margin: auto;">
              <form class="searchRecord">
                  <div class="card-body row no-gutters align-items-center">
                      <!--end of col-->
                      <div class="col">
                          <input class="form-control form-control-md form-control-borderless" type="search" placeholder="Digite o nome do paciente">
                      </div>
                      <!--end of col-->
                      <div class="col-auto">
                          <button class="btn btn-md btn-primary" type="submit"><i class="fas fa-search"></i> Buscar</button>
                      </div>
                      <!--end of col-->
                  </div>
              </form>
          </div>
          <!--end of col-->
        </div>
          <!--end form search-->
      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Lista de Agendamentos
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                <thead>
                  <tr>
                    <th>Data</th>
                    <th>Paciente</th>
                    <th>Profissional</th>
                    <th>Procedimento</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>12/09/2019</td>
                    <td>Paulo</td>
                    <td>Pedro</td>
                    <td>Limpeza</td>
                    <td>
                        <button class="btn btn-md btn-danger" type="submit"><i class="fas fa-times-circle"></i> Excluir</button>
                        <button class="btn btn-md btn-primary" type="submit" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit"></i> Editar</button>
                    </td>
                  </tr>
                  <tr>
                    <td>18/09/2019</td>
                    <td>Marcos</td>
                    <td>Pedro</td>
                    <td>Limpeza</td>
                    <td>
                        <button class="btn btn-md btn-danger" type="submit"><i class="fas fa-times-circle"></i> Excluir</button>
                        <button class="btn btn-md btn-primary" type="submit" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit"></i> Editar</button>
                    </td>
                  </tr>
                  <tr>
                    <td>22/09/2019</td>
                    <td>Fernando</td>
                    <td>Pedro</td>
                    <td>Limpeza</td>
                    <td>
                        <button class="btn btn-md btn-danger" type="submit"><i class="fas fa-times-circle"></i> Excluir</button>
                        <button class="btn btn-md btn-primary" type="submit" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit"></i> Editar</button>
                    </td>
                  </tr>
                  <tr>
                    <td>30/09/2019</td>
                    <td>Joaquin</td>
                    <td>Pedro</td>
                    <td>Limpeza</td>
                    <td>
                        <button class="btn btn-md btn-danger" type="submit"><i class="fas fa-times-circle"></i> Excluir</button>
                        <button class="btn btn-md btn-primary" type="submit" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-edit"></i> Editar</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
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
  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="cabecalhoModal">
            <h5 class="modal-title" id="exampleModalLabel">Editar Agendamento</h5>
          </div>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
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
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="login.html">Salvar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../componentes/jquery/jquery.min.js"></script>
  <script src="../../componentes/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../componentes/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../../componentes/datatables/jquery.dataTables.js"></script>
  <script src="../../componentes/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>
