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
        <fieldset class="form-group">
          <legend>Buscar Prontuário</legend>
          <!-- div busca-->
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
          <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Lista de Prontuários
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                <thead>
                  <tr>
                    <th>Paciente</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Paulo</td>
                    <td>
                      <a href="EditarProntuario.php"><button class="btn btn-md btn-primary" type="submit"><i class="fas fa-folder"></i> Abrir Prontuário</button></a>
                    </td>
                  </tr>
                  <tr>
                    <td>Marcos</td>
                    <td>
                        <button class="btn btn-md btn-primary" type="submit"><i class="fas fa-folder"></i> Abrir Prontuário</button>
                    </td>
                  </tr>
                  <tr>
                    <td>Fernando</td>
                    <td>
                        <button class="btn btn-md btn-primary" type="submit"><i class="fas fa-folder"></i> Abrir Prontuário</button>
                    </td>
                  </tr>
                  <tr>
                    <td>Joaquin</td>
                    <td>
                        <button class="btn btn-md btn-primary" type="submit"><i class="fas fa-folder"></i> Abrir Prontuário</button>
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
  
  
  <!-- Bootstrap core JavaScript-->
  <script src="../../componentes/jquery/jquery.min.js"></script>
  <script src="../../componentes/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../componentes/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../../componentes/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-bar-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>

</body>

</html>
