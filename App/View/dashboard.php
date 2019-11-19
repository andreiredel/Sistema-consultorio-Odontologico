<?php
    session_start();
    require_once '../../vendor/autoload.php';
    require_once 'Alertas.php';
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
          <!-- <li class="breadcrumb-item active">Cadastrar</li> -->
        </ol>
      
      <!-- /.container-fluid -->
    <?php
        if(isset($_SESSION['mensagemLogin'])){
    ?>
            <div class="alert alert-success" role="alert"style='text-align:center;'>
            <?= $_SESSION['nome']?>. <?=$_SESSION['mensagemLogin']?> 
            
            </div>

    <?php
        }
    ?>
      <div class="card mb-3">
          <div class="col-12 col-md-10 col-lg-8" style="margin: auto;">
          <div class="form-group">
                          <div class='input-group date' id='datetimepicker3'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <i class="fas fa-sign-out"></i>
                            </span>
                          </div>
                    </div>
          </div>
          <!--end of col-->
        </div>






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

  <script src='../../componentes/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'></script>

   
</body>

</html>
