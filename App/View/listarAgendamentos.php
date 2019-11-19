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
          <li class="breadcrumb-item active">Visualizar</li>
        </ol>
        <!--form  search -->
      <fieldset class="form-group">
        <legend>Listar Agendamentos</legend>
        <div class="card mb-3">
        <div class="form-group">
                          <div class='input-group date' id='datetimepicker3'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="fas fa-alarm-clock"></span>
                            </span>
                          </div>
                    </div>
          <div id='loading'>loading...</div>

          <div id='calendar'></div>
          <!--end of col-->
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
  <div class="modal fade" id="modalInfoAgendamento" tabindex="-1" role="dialog" aria-labelledby="modalInfoAgendamento" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="cabecalhoModal" style='margin: auto;'>
            <h5 class="modal-title" id="title"></h5>
          </div>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="card-body">
                <form id='formAgendamento'>
                    <input type="hidden" id='operation' name="operation" value=''>
                    <div class="form-group">
                            <div class="form-label-group" id='select'>
                            <!-- <input type="text" id="firstName" class="form-control" placeholder="Nome do Paciente" required="required" autofocus="autofocus">
                            <label for="firstName">Nome Paciente</label> -->
                            
                            </div>
                    </div>
                    

                    <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="nomeProfissional" class="form-control" placeholder="Nome do Profissional" required="required" value='' disabled="disabled">
                            <label for="lastName">Nome Profissional</label>
                            </div>
                    </div>
                    <div class="form-group">
                          <div class="form-label-group">
                              <input type="text" id="data" class="form-control" placeholder="Data" required="required" autofocus="autofocus"  disabled="disabled">
                              <label for="firstName">Data</label>
                          </div>
                    </div>
                    <div class="form-group">
                          <div class="form-label-group">
                              <input type="text" id="horaInicio" class="form-control " placeholder="Hora de inicio" required="required" autofocus="autofocus">
                              <label for="horaInicial">Hora de inicio</label>
                          </div>
                    </div>
                    <div class="form-group">
                          <div class='input-group date' id=''>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="fas fa-alarm-clock"></span>
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
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Voltar</button>
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary" id='salvarAgendamento' onclick=cadastrarAgendamento();>Salvar</button>
        </div>
      </div>
    </div>
  </div>
  <style>

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>

  <!-- Bootstrap core JavaScript-->
  <script src="../../componentes/jquery/jquery.min.js"></script>
  <script src="../../componentes/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../componentes/bootstrap/js/bootstrap.min.js"></script>
  <script src='../../componentes/moment.min.js'></script>

  <!-- Core plugin JavaScript-->
  <script src="../../componentes/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../../componentes/datatables/jquery.dataTables.js"></script>
  <script src="../../componentes/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../../js/demo/datatables-demo.js"></script>

  <link href='../../componentes/fullcalendar-4.3.1/packages/core/main.css' rel='stylesheet' />
<link href='../../componentes/fullcalendar-4.3.1/packages/daygrid/main.css' rel='stylesheet' />
<link href='../../componentes/fullcalendar-4.3.1/packages/list/main.css' rel='stylesheet' />
<script src='../../componentes/fullcalendar-4.3.1/packages/core/main.js'></script>
<script src='../../componentes/fullcalendar-4.3.1/packages/interaction/main.js'></script>
<script src='../../componentes/fullcalendar-4.3.1/packages/daygrid/main.js'></script>
<script src='../../componentes/fullcalendar-4.3.1/packages/list/main.js'></script>
<script src='../../componentes/fullcalendar-4.3.1/packages/google-calendar/main.js'></script>
<script src='../../componentes/fullcalendar-4.3.1/packages/core/locales/pt-br.js'></script>
<script src='../../componentes/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css" rel="stylesheet" />




<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale : 'pt-br',
      // eventLimit = true,
      editable: true,
      plugins: [ 'interaction', 'dayGrid', 'list', 'googleCalendar' ],
      events: '../Controller/list_eventos.php?operation=listAgendamento&id=<?= $_SESSION['id']?>&tipo=<?= $_SESSION['tipo']?>',
      
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },

      displayEventTime: true, // don't show the time column in list view

      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      // googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',

      // US Holidays
      dayClick: function(date, jsEvent, view, resourceObj) {

        alert('Date: ' + date.format());
        alert('Resource ID: ' + resourceObj.id);

      },

      eventClick: function(arg) {
        // opens events in a popup window
          $('.modal-title').html('Informações do Agendamento');
          $('#modalInfoAgendamento #procedimento').val(arg.event.title);
          console.log('dados: ', arg.event);
          $('#operation').val('editar');
          $('#modalInfoAgendamento').modal('show');
      },
      selectable: true,
      select: function(info) {
        $('.modal-title').html('Cadastrar Agendamento');
        $('#operation').val('cadastrar');
        $('#nomeProfissional').val('<?= $_SESSION['nome'];?>');
        let data = 
        $('#data').val(info.start.toLocaleString());
        $('#modalInfoAgendamento').modal('show');
      },

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      },



    });

    calendar.render();
  });

   $(function () {
        
        getPacientes();

    });

   function getPacientes(){

    $.ajax({
              url: "../Controller/UsuarioController.php",
              type: "POST",
              data : {
                  operation : "listar",
                  tipo : 'paciente'
              }

          }).done(function(resposta) {
                
                if(resposta){
                  var resposta = JSON.parse(resposta);
                  console.log('resposta: ', resposta);
                  var select = '<select class="selectpicker" data-live-search="true">';
                  select +='<option id="false" data-tokens="usuarios">Selecione um paciente</option>';
                  for(let usuarios in resposta){
                   select +='<option id='+resposta[usuarios].id+' data-tokens='+resposta[usuarios].id+'>'+resposta[usuarios].nome+'</option>';
                  }
                  select += '</select>';
                  $("#select").html(select);
                  $('.selectpicker').selectpicker('refresh');
                } else {

                  $("#select").html('<option data-tokens="ketchup mustard">Sem resultados</option>');
                }
            
          });


   }

   function cadastrarAgendamento(){
        console.log('cadastrar');
          event.preventDefault();
          $.ajax({
            method : "POST",
            url: "../Controller/AgendamentoController.php",
            data: $('#formAgendamento').serialize(),
            contentyType: false,
            processData: false,
            success: function(retorno){

            }
          })
    
   }



</script>

</body>

</html>
