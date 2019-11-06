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
