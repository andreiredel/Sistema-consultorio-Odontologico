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
          <li class="breadcrumb-item active">Editar Dados</li>
        </ol>
        <!--form  search -->
      <fieldset class="form-group">
        <legend>Editar Dados</legend>
            <div class="card-body">
                <form action='../Controller/UsuarioController.php' method='POST'>
                    <input type="hidden" name="operation" value="update">
                    <input type='hidden' name='id' id='id' value='<?= $_SESSION['id'] ?>'>
                    <input type='hidden' name='tipoUsuario' id='tipoUsuario' value='profissional'>
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
                    <div class="form-group" id='mensagemRetorno'></div>
                    <button class="btn btn-primary btn-block" type='button' onclick='salvarDados();' >Salvar</button>
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
          
          var tipoUsuario = $('#tipoUsuario').val();
          var id = $('#id').val();
          console.log('id: ', id);
          console.log("tipo_busca: ", tipoUsuario);
          var idTipo = 'id_'+tipoUsuario;
          $.ajax({
              url: "../Controller/UsuarioController.php",
              type: "POST",
              data : {
                  operation : "getDados",
                  id_usuario : id,
                  tipo_Usuario : tipoUsuario
              }

          }).done(function(resposta) {

            if(resposta){
                var retorno = JSON.parse(resposta);
                console.log('resposta', retorno);
                let id = retorno[idTipo];
                $('#idUsuario').val(id);
                let nome = retorno['nome'];
                $('#nome').val(nome);
                let telefone = retorno['telefone'];
                $('#telefone').val(telefone);
                let email = retorno['email'];
                $('#email').val(email);
                let acesso = retorno['acessosistema'];
                $('#tipoAntesUpdate').val(tipoUsuario);
                $('#created_at').val(retorno['created_at']);
                console.log('acesso: ', acesso);
                $('#input_'+acesso).click();
                $('#input_'+retorno['tipousuario']).click();

            }  
          });
         
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


      function salvarDados(){
      console.log('salvar dados do form');
      var nome = ($( "#nome" ).val()) ?  $( "#nome" ).val() : false ;
      var telefone = ($( "#telefone" ).val())? $( "#telefone" ).val() : false;
      var email = ($( "#email" ).val())? $( "#email" ).val() : false ;
      var senha = ($( "#senha" ).val()) ? $( "#senha" ).val() : false ;
      var tipoUsuario = $("#tipoUsuario").val();
      var acesso = $("input[name='acesso']:checked").val();
      var idUsuario = $('#id').val();
   
      console.log('id: ', idUsuario);
      $.ajax({
          url: "../Controller/UsuarioController.php",
          type: "POST",
          data : {
              operation : "editar",
              id :idUsuario ,
              tipoUsuario : 'tipoUsuario',
              nome : nome,
              telefone : telefone,
              email :email,
              senha : senha,
              acesso : acesso,
              tipoUsuario : tipoUsuario
          }
      }).done(function(resposta) {
        console.log('resposta: ', resposta);
        var retorno = JSON.parse(resposta);
        var mensagem  = `<div class="alert alert-${retorno.status}" id='mensagemEditar' role="alert" style='text-align: center;'>
                          ${retorno.mensagem}
                        </div>`; 
        $('#mensagemRetorno').html(mensagem);
        console.log('id usuario: ', idUsuario);
        $("#nome_"+idUsuario).html(nome);
      });


  }

    </script>

</body>

</html>
