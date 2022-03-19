<?php
if(isset($_SESSION['logged'])){
  $userName = $_SESSION['name'];
  $loginButton = 'logout';
}else{
  $loginButton = 'login';
}

?>
<body>
    <div class="container-fluid ">
    <header class="row ">
        
    <div class="col "><h1><a href="index.html"><img src="img/header.png" height="80" width="150"> </a></h1></div>
    </header>
<nav class="navbar navbar-expand-md navbar-dark bg-primary bg-gradient ">
  <a class="navbar-brand" href="<?php echo 'index.php' . '?page=' . $loginButton ?>"><?php echo $loginButton  ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link"  href="index.php?page=content">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Voluntários</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Instituições</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sobre nós</a>
      </li>
    
    </ul>
  </div>
</nav>
