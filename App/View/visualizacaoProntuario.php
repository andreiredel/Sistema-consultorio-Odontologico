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
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Prontuario Completo</li>
        </ol>
        <!--form  search -->
      <fieldset class="form-group">
        <legend>Prontuario Completo</legend>
        <div class="card-body">
            <button class="btn btn-primary btn-block" type="submit">Gerar PDF</button>
        </div>
            <div class="card-body">
            <form action="mail.php" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3></i>IDENTIFICAÇÃO DO PACIENTE</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Nome:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>RG:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Órgão expedidor:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>CPF:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Data de Nascimento:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label> Gênero:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>E-mail:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Naturalidade:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Nacionalidade:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Estado civil:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label> Profissão:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Endereço residencial:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>CEP:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Cidade:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Estado:</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group">      
                                            <input type="text" required>
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label>Telefones:</label>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>

                        </div>
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
    <style>
    * { box-sizing:border-box; }

/* basic stylings ------------------------------------------ */
body 				 { background:url(https://scotch.io/wp-content/uploads/2014/07/61.jpg); }

h2 		 { 
  text-align:center; 
  margin-bottom:50px; 
}
h2 small { 
  font-weight:normal; 
  color:#888; 
  display:block; 
}
.footer 	{ text-align:center; }
.footer a  { color:#53B2C8; }

/* form starting stylings ------------------------------- */
.group 			  { 
  position:relative; 
  margin-bottom:45px; 
}
input 				{
  font-size:18px;
  padding:10px 10px 10px 5px;
  display:block;
  width:300px;
  border:none;
  border-bottom:1px solid #757575;
}
input:focus 		{ outline:none; }

/* LABEL ======================================= */
label 				 {
  color:#999; 
  font-size:18px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:5px;
  top:10px;
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}

/* active state */
input:focus ~ label, input:valid ~ label 		{
  top:-20px;
  font-size:14px;
  color:#5264AE;
}

/* BOTTOM BARS ================================= */
.bar 	{ position:relative; display:block; width:300px; }
.bar:before, .bar:after 	{
  content:'';
  height:2px; 
  width:0;
  bottom:1px; 
  position:absolute;
  background:#5264AE; 
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}
.bar:before {
  left:50%;
}
.bar:after {
  right:50%; 
}

/* active state */
input:focus ~ .bar:before, input:focus ~ .bar:after {
  width:50%;
}

/* HIGHLIGHTER ================================== */
.highlight {
  position:absolute;
  height:60%; 
  width:100px; 
  top:25%; 
  left:0;
  pointer-events:none;
  opacity:0.5;
}

/* active state */
input:focus ~ .highlight {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
@keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
    
    
    </style>

</body>

</html>
