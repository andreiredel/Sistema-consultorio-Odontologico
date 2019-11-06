<?php
  session_start();
  require_once '../../vendor/autoload.php';
  include 'header.php';
  include 'menuLateral.php';

  $usuarioDao = new App\Dao\UsuarioDao();

    if(isset($_SESSION['buscaUsuarios']) ){
      $result = $_SESSION['buscaUsuarios'];
      unset($_SESSION['buscaUsuarios']);
    }
     
?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Usuário</a>
          </li>
          <li class="breadcrumb-item active">Listar</li>
        </ol>
        <!--form  search -->
      <fieldset class="form-group">
        <legend>Listar Usuários</legend>
        <div class="card mb-3">
          <div class="col-12 col-md-10 col-lg-8" style="margin: auto;">
              <form class="searchRecord" action='../Controller/UsuarioController.php' method='POST'>
                  <input type="hidden" name="operation" value='buscarUsuarios'>
                  <div class="card-body row no-gutters align-items-center">
                      <!--end of col-->
                      <div class="col">
                          <input class="form-control form-control-md form-control-borderless" name='palavra' type="search" placeholder="Digite o nome do paciente">
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
        <?php 
            if(isset($result)){
        ?>      
           
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Lista de Usuários
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Tipo Usuario</th>
                    <th>Ação</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    foreach($result as $usuarios){
                ?>        
                    <tr>
                        <td id='nome_<?= $usuarios['id'] ?>'><?= $usuarios['nome'] ?></td>
                        <td><?= $usuarios['tipousuario'] ?></td>
                        <td>
                          <button class="btn btn-md btn-primary" onclick="buscarDados(<?= $usuarios['id'] ?>, '<?= $usuarios['tipousuario'] ?>');"><i class="fas fa-edit"></i> Editar</button>
                        </td>
                    </tr>
                <?php      
                    }
                ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php 
            }
        ?>
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
            <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
          </div>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <!-- <div class="card-body"> -->
                <form id='editarUsuario'>
                    <input type="hidden" name="operation" value="editar">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="">
                    <input type='hidden' id='tipoAntesUpdate' name='tipoAntesUpdate' value=''>
                    <input type="hidden" id='created_at' name="created_at" value=''>
                    <div class="form-group">
                            <div class="form-label-group">
                              <input type="text" id="nome" name='nome' class="form-control" placeholder="Nome do Uuário" autofocus="autofocus" required="required">
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
                            <input type="password" id="senha" name='senha' class="form-control" placeholder="Digite uma senha com minimo de 8 caracteres" >
                            <button type="button" id="showPassword" name="showPassword" class="fa fa-eye-slash" aria-hidden="true"></button> 
                            <label for="senha">Senha</label>
                            </div>
                    </div>
                    <div class="form-group" style='display: none;'>
                          <label for="tipoUsuario">Tipo de Usuário</label>
                        <div class="btn-group" id="radioBtn" data-toggle="buttons">
                               <label class="btn btn-primary active" id='input_profissional' data-toggle="tipo" data-title="Profissional">
                                  <input type="radio" name="tipoUsuario" id="option2" value='profissional' autocomplete="off" checked>
                                  <span class="fas fa-check"></span>
                                  <span class="tipo"> Profisional</span>
                                </label>
                              <label class="btn btn-primary notActive" id='input_paciente' data-toggle="tipo" data-title="Paciente">
                                <input type="radio" name="tipoUsuario" id="tipoUsuario" value='paciente' autocomplete="off">
                                <span class="fas fa-check"></span>
                                <span class="tipo"> Paciente</span>
                              </label>
                          </div>  
                    </div>
                    <div class="form-group">
                          <label for="acesso">Acesso ao sistema</label>
                          <div class="btn-group " id="radioBtn" data-toggle="buttons">
                               <label class="btn btn-primary active" id='input_permitido' data-toggle="happy" data-title="permitido">
                                  <input type="radio" name="acesso" id="option2" value='permitido' autocomplete="off" checked>
                                  <span class="fas fa-check"></span>
                                  <span class="tipo"> Permitir</span>
                                </label>
                              <label class="btn btn-primary notActive" id='input_negado' data-toggle="happy" data-title="Negado">
                                <input type="radio" name="acesso" id="option1" value='negado' autocomplete="off">
                                <span class="fas fa-check"></span>
                                <span class="tipo"> Negar</span>
                              </label>
                            </div>
                    </div>
                    <div class="form-group" id='mensagemRetorno'>
                    </div>
                    <button class="btn btn-primary btn-block" type='button' onclick='salvarDados();'>Salvar</button>
                    <button class="btn btn-secondary btn-block" type="button" data-dismiss="modal">Voltar</button>
                </form>
            </div>
          <!-- </div> -->
        <!-- <div class="modal-footer">
                    
  
        </div> -->
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../componentes/jquery/jquery.min.js"></script>
  <script src="../../componentes/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../componentes/jquery-easing/jquery.easing.min.js"></script>

  Page level plugin JavaScript-->
  <script src="../../componentes/datatables/jquery.dataTables.js"></script>
  <script src="../../componentes/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages
  <script src="../../js/sb-admin.min.js"></script>

   Demo scripts for this page -->
  <script src="../../js/demo/datatables-demo.js"></script>

  <script>

        $('#radioBtn label').on('click', function(e){
          var sel = $(this).data('title');
          var tog = $(this).data('toggle');
          $('#'+tog).prop('value', sel);
          
          $('label[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
          $('label[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
        }) 

    function buscarDados(id, tipoUsuario){
      document.getElementById("editarUsuario").reset();
      $('#mensagemEditar').remove();
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

            $('#modalEditar').modal('show');

        }  
      });
    }


  function salvarDados(){
      console.log('salvar dados do form');
      var nome = ($( "#nome" ).val()) ?  $( "#nome" ).val() : '' ;
      var telefone = ($( "#telefone" ).val())? $( "#telefone" ).val() : '';
      var email = ($( "#email" ).val())? $( "#email" ).val() : '' ;
      var senha = ($( "#senha" ).val()) ? $( "#senha" ).val() : '' ;
      var tipoUsuario = $("input[name='tipoUsuario']:checked").val();
      var acesso = $("input[name='acesso']:checked").val();
      var idUsuario = $('#idUsuario').val();

      if(validateEmail(email)) {
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
      } else {
        var mensagem  = `<div class="alert alert-danger" id='mensagemEditar' role="alert" style='text-align: center;'>
                            Email inválido
                          </div>`; 
          $('#mensagemRetorno').html(mensagem);

      }
      
  }

  $(document).ready(function(){
          $('#showPassword').on('click', function(){
            
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

        function validateEmail(email) {
          var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
          if( !emailReg.test( email ) ) {
              return false;
          } else {
              return true;
          }
        }



  </script>

</body>

</html>
