<?php
  

include "procesos/seguridad.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
    
   
    
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
  <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>

<nav class="navbar navbar-inverse"  style="background-color: #F8C471; border-color: #F8C471;">

  <div class="container-fluid" style="background-color: #F8C471; border-color: #F8C471;">
    <div class="navbar-header" style="background-color: #F8C471; border-color: #F8C471;">
      <a class="navbar-brand" style="color: #FFFF" href="dashboard.php">Sistema de Gestion de Investigaciones</a>
    </div>

    <ul class="nav navbar-nav" >
      <li class="active" style="background-color: #FFFF"  ><a href="dashboard.php">Inicio</a></li>
      <li><a href="Proyectos.php" style="color:  #FFFF" >Mis proyectos</a></li>
      <li><a href="Regproy.php" style="color:  #FFFF" >Crear proyecto</a></li>
      <li style="padding-left: 800px"><a href="cierre.php?tk=<?php echo $_SESSION['token']; ?>" style="color:  #FFFF" >Cerrar la sesión</a></li>
    </ul>

  </div>

</nav>



