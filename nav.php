<?php




?>
<body>
    <div class="container-fluid ">
    <header class="row ">
        
    <div class="col "><h1><a href="index.php"><img src="img/header.png" height="80" width="150"> </a></h1></div>
     <?php if(checkLogin()==="Instituto") : ?>
      <div class="col">
      </div class>
      <?php endif?>
      <?php if(checkLogin()==="Voluntario") : ?>
      <?php endif?>
    </header>




       <!-- Caso seja instituto --> 
    <?php if(checkLogin()==="Instituto") : ?>

      <nav class=" navbar-expand-sm bg-primary navbar-dark">
  <!-- Brand -->
  

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo 'logout.php' . '?id=' . $_SESSION['id']  ?>">Logout</a>
    </li>
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Procurar Voluntarios
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo 'search.php' . '?id=' . $_SESSION['id'] . '&search=local'  ?>">Voluntarios Perto</a>
        <a class="dropdown-item" href="<?php echo 'search.php' . '?id=' . $_SESSION['id'] . '&search=choose'  ?>">Voluntarios por Local </a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Mensagens</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo 'settings.php' . '?id=' . $_SESSION['id']  ?>">Preferências</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo 'profile.php' . '?id=' . $_SESSION['id']  ?>">Meu Perfil</a>
    </li>
  </ul>
  

    
</nav>
     <?php endif?>

    <!-- Caso seja voluntario -->
     <?php if(checkLogin()==="Voluntario") : ?>

      <nav class=" navbar-expand-sm bg-primary navbar-dark">
  <!-- Brand -->
  

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo 'logout.php' . '?id=' . $_SESSION['id']  ?>">Logout</a>
    </li>
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Procurar Institutos
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Institutos Perto</a>
        <a class="dropdown-item" href="#">Institutos por Local </a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Mensagens</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Preferências</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Meu Perfil</a>
    </li>
  </ul>
  

    
</nav>
    <?php endif?>


    <?php if(checkLogin()==NULL) : ?>

      <nav class=" navbar-expand-sm bg-primary navbar-dark">
  <!-- Brand -->
  

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo 'index.php' . '?page=' . "login" ?>">Login</a>
    </li>
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Registar
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo 'index.php' . '?page=' . "registerInst" ?>">Instituto</a>
        <a class="dropdown-item" href="<?php echo 'index.php' . '?page=' . "register" ?>">Voluntario</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Missão</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Contacto</a>
    </li>

  </ul>
  

    
</nav>
    <?php endif?>

   
</nav>
