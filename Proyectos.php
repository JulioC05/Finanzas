<?php 
include("inc/cabeza.php");


 ?>
    <title>Mis proyecto</title>

    


  <style>
  table { 
    width: 85%;
    border: 1px solid #000;
  }
  tr, td {
    text-align: left;
    vertical-align: top;  
    border: 1px solid #000;
  }
  th {
    background: #F8C471;
    color: #fff;
    }
  input{
  width: 100%;
  }

  </style>



    


  
<?php 

  

  require_once "php/connect.php";
  $id_usuario = $_SESSION['id'];

  $consulta=$pdo->prepare("SELECT proyectos.id as id_proyectos,nom_proy,id_inst,codigo,fecha_reg,vigencia,tipo_proy,tipo_doc,num_reg,linea_gen,linea_esp,fecha_ini,fecha_fin,objetivo_gen FROM proyectos RIGHT OUTER JOIN crea ON crea.proyectos_id = proyectos.id INNER JOIN usuarios on usuarios.id = crea.usuarios_id where usuarios.id = ".$_SESSION['id']." ");
  $consulta->execute();//listar proyectos

	if($consulta->rowCount()>=1){
	while($fila=$consulta->fetch()){


  


 ?>
 <center>
<table class="egt" id="maintable">
  <tr>
    <th colspan="4" ><h3><center><?php echo $fila['nom_proy']?></center></h3></th>
  </tr> 


 
 
  
</table>

  <tr>
    <br>
          <a  class="agregar_gastos" href='agregarGastos.php?id="<?php echo  $fila['id_proyectos']?>"'><span class="glyphicon glyphicon-minus"></span>Agregar Gastos</a><br><br>
          <a  class="generar_informe" href='generarInforme.php?id="<?php echo  $fila['id_proyectos']?>"'>Generar Informe<i class="material-icons" data-toggle="tooltip" title="Editar"style="color:white" >assignment</i></a>
          <br><br>
          </tr>
  </center>

<?php
}
}

 ?>

<style type="text/css">

.agregar_gastos{
    text-decoration: none;
    padding: 4px;
    font-weight: 300;
    font-size: 15px;
    color: #ffffff;
    background-color: #C64242;
    border-radius: 6px;
    border: 3px solid red;
  }
  .generar_informe{
    text-decoration: none;
    padding: 5px;
    font-weight: 400;
    font-size: 15px;
    color: #ffffff;
    background-color: #4D536A;
    border-radius: 6px;
    border: 3px solid #4D536A;
  }
</style>

  </body>
  </html>