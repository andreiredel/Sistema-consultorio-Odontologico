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
                <form id='formAgendamento' action='../Controller/agendamentoController.php' method='POST'>
                    <input type="hidden" id='operation' name="operation" value=''>
                    <input type="hidden" id='id_consulta' name="id_consulta" value=''>
                    <input type="hidden" id='idProfissional' name="idProfissional" value='<?= $_SESSION['id'] ?>'>
                  <?php
                       if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'profissional'){
                  ?>        
                      <div class="form-group">
                            <div class="form-label-group" id='select'>
                            
                            </div>
                    </div> 
                <?php      
                      }
                  
                  ?>
                    <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="nomeProfissional" name='nomeProfissional' class="form-control" placeholder="Nome do Profissional" required="required" value='' disabled="disabled">
                            <label for="lastName">Nome Profissional</label>
                            </div>
                    </div>
                    <div class="form-group">
                          <div class="form-label-group">
                              <input type="text" id="data" name='data' class="form-control" placeholder="Data" required="required" autofocus="autofocus">
                              <label for="firstName">Data</label>
                          </div>
                    </div>
                    <div class="form-group">
                            <!-- <div class="form-label-group">
                              <input type="text" id="inicio" name='inicio' class="form-control" placeholder="Informe a hora de inicio" required="required" >
                              <label for="inicio">Hora de inicio</label>
                            </div> -->
                            <div class="form-label-group content__subsection picker-container">
                              <input type="text" id="timepicker-inicio" name="inicio" class="form-control timepicker-24-hr" placeholder="Descreva qual sera o procedimento" required="required">
                              <label for="inicio">Inicio da consulta</label>
                            </div>
                    </div>
                    <div class="form-group">
                          <!-- <div class='input-group date' id=''>
                            <input type='text' name='fim' id='fim' class="form-control" />
                            <span class="input-group-addon">
                                <span class="fas fa-alarm-clock"></span>
                            </span>
                          </div> -->
                          <div class="form-label-group content__subsection picker-container">
                              <input type="text" id="timepicker-fim" name="fim" class="form-control timepicker-24-hr" placeholder="Descreva qual sera o procedimento" required="required">
                              <label for="inicio">Fim da Consulta</label>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="form-label-group">
                            <input type="text" id="procedimento" name='procedimento' class="form-control" placeholder="Descreva qual sera o procedimento" required="required">
                            <label for="procedimento">Procedimento</label>
                            </div>
                    </div>
                    <div class="form-group" id='resposta'>
                            
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Voltar</button>
          <button class="btn btn-danger" id='cancelarAgendamento' onclick=cancelarAgendamento();>Cancelar Agendamento</button>
          <?= ($_SESSION['tipo'] == 'profissional')?'<button class="btn btn-primary" id="salvar" onclick=cadastrarAgendamento();>Salvar</button>' : ''?>
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
<script src='../../componentes/timepicker/wickedpicker.min.js'></script>
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
      extraParams: function () {
        return {
              cachebuster: new Date().valueOf()
        };
      },
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

      eventClick: function(arg) {
        // opens events in a popup window
          $('.modal-title').html('Informações do Agendamento');
          $('#modalInfoAgendamento #procedimento').val(arg.event.title);
          let dados = getDadosAgendamento(arg.event.id, '<?= $_SESSION['tipo']?>');
          $('#id_consulta').val(arg.event.id);
          
          console.log('dados: ', arg.event);
          var data  = moment(arg.event.start).format('YYYY-MM-DD');
          $('#data').val(data);
          var inicioFormatada =  moment(arg.event.start).format('HH:mm');
          $('#timepicker-inicio').val(inicioFormatada);
          var fimFormatada =  moment(arg.event.end).format('HH:mm');
          $('#timepicker-fim').val(fimFormatada);
          $('#operation').val('editar');
          $('#cancelarAgendamento').css('display', "inline");
          $('#salvar').html("Salvar"); 
          $('#modalInfoAgendamento').modal('show');
      },
      selectable: <?= ($_SESSION['tipo'] == 'profissional')? true : false ?>,
      select: function(info) {
        document.getElementById("formAgendamento").reset();
        console.log('reset');
        $('.modal-title').html('Cadastrar Agendamento');
        $('#operation').val('cadastrar');
        $('#nomeProfissional').val('<?= $_SESSION['nome'];?>');
        $('#cancelarAgendamento').css('display', "none"); 
        $('#salvar').html("Cadastrar"); 
        
        $('#modalInfoAgendamento').modal('show');
        var dataInit= moment(info.start).format('YYYY-MM-DD');
        $('#data').val(dataInit);
        $('#data').attr('disabled','disabled');
      },

      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      },

    });

    calendar.render();
  });

   $(function () {
        var optionsInicio = {
        now: "00:00", //hh:mm 24 hour format only, defaults to current time
        twentyFour: true,  //Display 24 hour format, defaults to false
        upArrow: 'wickedpicker__controls__control-up',  //The up arrow class selector to use, for custom CSS
        downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
        close: 'wickedpicker__close', //The close class selector to use, for custom CSS
        hoverState: 'hover-state', //The hover state class to use, for custom CSS
        title: 'Horario da consulta', //The Wickedpicker's title,
        showSeconds: false, //Whether or not to show seconds,
        timeSeparator: ':', // The string to put in between hours and minutes (and seconds)
        secondsInterval: 1, //Change interval for seconds, defaults to 1,
        minutesInterval: 30, //Change interval for minutes, defaults to 1
        beforeShow: null, //A function to be called before the Wickedpicker is shown
        afterShow: null, //A function to be called after the Wickedpicker is closed/hidden
        show: null, //A function to be called when the Wickedpicker is shown
        clearable: false, //Make the picker's input clearable (has clickable "x")
    };
        $('#timepicker-inicio').wickedpicker(optionsInicio); 
        $('#timepicker-fim').wickedpicker(optionsInicio);
        $(".wickedpicker").css("z-index","99999999");
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
                  var select = '<select class="selectpicker" name="paciente" data-live-search="true">';
                  select +='<option value="false" id="false" data-tokens="usuarios">Selecione um paciente</option>';
                  for(let usuarios in resposta){
                   select +='<option value='+resposta[usuarios].id+' data-tokens='+resposta[usuarios].id+'>'+resposta[usuarios].nome+'</option>';
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
          let data = validate();
          console.log('data: ', data);
          if(data){
              $.ajax({
                  method : "POST",
                  url: "../Controller/AgendamentoController.php",
                  data : {
                    operation : data["operation"],
                    idProfissional : data["idProfissional"],
                    paciente : data["paciente"],
                    data : data["data"],
                    inicio : data["inicio"],
                    fim : data["fim"],
                    procedimento: data["procedimento"]
                  }
              }).done(function(resposta) {
                console.log("retorno: ", resposta);
                var retorno = JSON.parse(resposta);
                      console.log('resposta: ', retorno);
                    if(retorno.status == 'success'){
                      
                      let mensagem =  `<div class="alert alert-${retorno.status}" role="alert">
                                   ${retorno.mensagem}
                              </div>`;
                      $('#resposta').html(mensagem);
                    
                    } else {
                      let mensagem =  `<div class="alert alert-${retorno.status}" role="alert">
                                   ${retorno.mensagem}
                              </div>`;
                      $('#resposta').html(mensagem);
                    } 
                
              });
          }
   }

   function validate(){
          let operation = $('#operation').val();
          let idProfissional = $('#idProfissional').val();
          let data = $('#data').val();
          let inicio = $('#timepicker-inicio').val();
          let fim = $('#timepicker-fim').val();
          let procedimento = $('#procedimento').val();
          let paciente = $('.selectpicker').val();

          inicio = data+' '+inicio;
          console.log('result inicio: ', inicio);
          var dataInicio = new Date(inicio);
          var resultInicio = moment(dataInicio).format('YYYY-MM-DD HH:mm:ss');

          fim = data+' '+fim;
          var dataFim = new Date(fim);
          var resultFim = moment(dataFim).format('YYYY-MM-DD HH:mm:ss');

          if(paciente != false && procedimento && inicio && fim){
            var dados = {
                      operation:operation, 
                      idProfissional:idProfissional, 
                      data:data,
                      inicio:resultInicio,
                      fim:resultFim,
                      procedimento:procedimento,
                      paciente:paciente};
            return dados;
          } else {
              let mensagem =  `<div class="alert alert-danger" role="alert">
                                    Selecione e preencha todos os campos!
                              </div>`;
              $('#resposta').html(mensagem);
          }
   }

   function cancelarAgendamento(){
            $('#operation').val('cancelar');
            $('#formAgendamento').submit();
    }

    function getDadosAgendamento(idAgendamento, tipoUsuario){
              console.log('idAgendamento', idAgendamento);
              $.ajax({
                  method : "POST",
                  url: "../Controller/AgendamentoController.php",
                  data : {
                    operation : 'getDadosAgendamento',
                    idAgendamento: idAgendamento
                  }
              }).done(function(resposta) {
                console.log("retornoAgendamento: ", resposta);
                var retorno = JSON.parse(resposta);
                    console.log('retornoAgendamento: ', retorno);
                    $('#nomeProfissional').val(retorno.nomeprofissional);
                    $('select[name=paciente]').val(retorno.idpaciente);
                    $('.selectpicker').selectpicker('refresh');
                    if(tipoUsuario == 'paciente'){
                      $('#data').attr('disabled','disabled');
                      $('#timepicker-inicio').attr('disabled','disabled');
                      $('#timepicker-fim').attr('disabled','disabled');
                      $('#procedimento').attr('disabled','disabled');
                    }
                    
              });
    }

</script>

</body>

</html>
