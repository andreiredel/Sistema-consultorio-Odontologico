 <!-- Sidebar -->
   <ul class="sidebar navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-user"></i>
        <span>Usuário</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <?php
            if(isset($_SESSION['tipo'])){
              if($_SESSION['tipo'] == 'profissional'){
      ?>
        <a class="dropdown-item" href="cadastrarUsuario.php">Cadastrar</a>
        <a class="dropdown-item" href="editarMeusDados.php">Editar meus dados</a>
        <a class="dropdown-item" href="listarUsuario.php">Listar</a>

      <?php
              }else{
      ?>
          <a class="dropdown-item" href="editarMeusDados.php">Editar meus dados</a>
      <?php
              }
            }
      ?>
        
      </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Agendamento</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        
        <?php
            if(isset($_SESSION['tipo'])){
              if($_SESSION['tipo'] == 'profissional'){
      ?>
        <!-- <a class="dropdown-item" href="cadastrarAgendamento.php">Cadastrar</a> -->
        <a class="dropdown-item" href="listarAgendamentos.php">Listar</a>

      <?php
              }else{
      ?>
            <a class="dropdown-item" href="listarAgendamentos.php">Meus agendamentos</a>
      <?php
              }
            }
      ?>
        </div>
    </li>
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Prontuário</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <?php
            if(isset($_SESSION['tipo'])){
              if($_SESSION['tipo'] == 'profissional'){
      ?>
        <a class="dropdown-item" href="prontuario.php">Buscar Prontuário</a>
      
      <?php
              }else{
      ?>
            <a class="dropdown-item" href="../Controller/prontuarioController.php?operation=getDadosCompleto&idPaciente=<?=$_SESSION['id']?>">Visualizar prontuário</a>
      <?php
              }
            }
      ?>    

        </div>
    </li>
    <?php
            if(isset($_SESSION['tipo'])){
              if($_SESSION['tipo'] == 'profissional'){
      ?>
        <li class="nav-item ">
        <a class="nav-link" href="Logs.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Log</span></a>
        </li>
      <?php
              }
            } 
      ?>
  </ul>