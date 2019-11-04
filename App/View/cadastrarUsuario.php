<?php
    session_start();
    require_once '../../vendor/autoload.php';
    require_once 'Alertas.php';
    include 'header.php';
    include 'menuLateral.php';
    mostraAlerta();

?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Usuário</a>
          </li>
          <li class="breadcrumb-item active">Cadastrar</li>
        </ol>
        <!--form  search -->
      <fieldset class="form-group">
        <legend>Cadastrar Usuário</legend>
            <div class="card-body">
                <form action='../Controller/UsuarioController.php' method='POST'>
                    <input type="hidden" name="operation" value="create">
                    <div class="form-group">
                            <div class="form-label-group">
                              <input type="text" id="nome" name='nome' class="form-control" placeholder="Nome do Uuário" required="required" autofocus="autofocus">
                              <label for="nome">Nome</label>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="form-label-group">
                              <input type="text" id="telefone" name='telefone' class="form-control" placeholder="(xx) xxxxx xxxx " required="required">
                              <label for="telefone">Telefone</label>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="form-label-group">
                              <input type="email" id="email" name='email' class="form-control" placeholder="exemplo@teste.com" required="required">
                              <label for="email">Email</label>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="form-label-group">
                            <input type="password" id="senha" name='senha' class="form-control" placeholder="Digite uma senha com minimo de 8 caracteres" required="required">
                            <button type="button" id="showPassword" name="showPassword" class="fa fa-eye-slash" aria-hidden="true"></button> 
                            <label for="senha">Senha</label>
                            </div>
                    </div>
                    <div class="form-group">
                          <label for="tipoUsuario">Tipo de Usuário</label>
                        <div class="btn-group" id="radioBtn" data-toggle="buttons">
                               <label class="btn btn-primary active" data-toggle="tipo" data-title="Profissional">
                                  <input type="radio" name="tipoUsuario" id="option2" value='profissional' autocomplete="off" checked>
                                  <span class="fas fa-check"></span>
                                  <span class="tipo"> Profisional</span>
                                </label>
                              <label class="btn btn-primary notActive" data-toggle="tipo" data-title="Paciente">
                                <input type="radio" name="tipoUsuario" id="option1" value='paciente' autocomplete="off">
                                <span class="fas fa-check"></span>
                                <span class="tipo"> Paciente</span>
                              </label>
                          </div>  
                    </div>
                    <div class="form-group">
                          <label for="acesso">Acesso ao sistema</label>
                          <div class="btn-group " id="radioBtn" data-toggle="buttons">
                               <label class="btn btn-primary active" data-toggle="happy" data-title="permitido">
                                  <input type="radio" name="acesso" id="option2" value='permitido' autocomplete="off" checked>
                                  <span class="fas fa-check"></span>
                                  <span class="tipo"> Permitir</span>
                                </label>
                              <label class="btn btn-primary notActive" data-toggle="happy" data-title="Negado">
                                <input type="radio" name="acesso" id="option1" value='negado' autocomplete="off">
                                <span class="fas fa-check"></span>
                                <span class="tipo"> Negar</span>
                              </label>
                            </div>
                    </div>
                    <?php
                      if(isset($_SESSION['mensagem'])){
                    ?>
                        <div class="alert alert-<?= $_SESSION['status']?>" role="alert" style='text-align: center;'>
                          <?= $_SESSION['mensagem']?>
                        </div>
                      <?php
                      }
                    ?> 
                    <button class="btn btn-primary btn-block" type='submit' >Salvar</button>
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
  <!-- Modal -->
<!-- <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <?php
              if($_SESSION['operation'] == 'success'){     
        ?>
        <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
          <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
            <span class="swal2-success-line-tip"></span>
            <span class="swal2-success-line-long"></span>
            <div class="swal2-success-ring"></div> 
            <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
            <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
        </div>
        <?php
              } else {
        ?>     
        <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
            <span class="swal2-x-mark">
                <span class="swal2-x-mark-line-left"></span>
                <span class="swal2-x-mark-line-right"></span>
            </span>
        </div>
        <?php
              }        
        ?>      
        <div class="alert alert-<?=$_SESSION['operation'] ?>" role="alert" style='text-align: center;'>
            <?= $_SESSION['mensagem'] ?>
        </div>
      </div>
      <div class="modal-footer">
        <div class='buttonConfirm' style='margin: auto;'>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>
</div> -->
  <!-- Bootstrap core JavaScript-->
  <script src="../../componentes/jquery/jquery.min.js"></script>
  
  <script src="../../componentes/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <script type="text/javascript" src="../../css/bootstrap/js/moment.min.js"></script>

  <script type="text/javascript" src="../../css/bootstrap/datetimepicker/datetimepicker.min.js"></script>

    <script>
        $('#radioBtn label').on('click', function(e){
          var sel = $(this).data('title');
          var tog = $(this).data('toggle');
          console.log("sel: ", sel);
          console.log("tog: ", tog);
          $('#'+tog).prop('value', sel);
          
          $('label[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
          $('label[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
        }) 

        $(document).ready(function(){

          $('#modalExemplo').modal('show');
          
          $('#showPassword').on('click', function(){

            console.log('teste');
            
            var passwordField = $('#senha');
            var passwordFieldType = passwordField.attr('type');
            if(passwordFieldType == 'password')
            {
                passwordField.attr('type', 'text');
                $(this).val('Hide');
                $('#showPassword').attr("class", 'fa fa-eye');
            } else {
                passwordField.attr('type', 'password');
                $(this).val('Show');
                $('#showPassword').attr("class", 'fa fa-eye-slash');
            }
          });
        }); 

    </script>

</body>

</html>
