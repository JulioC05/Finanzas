<?php 
include("inc/cabeza.php");


 ?>
    
    <title>Proyectos</title>

    


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
  
  //add
  include("modal/add/gastos.php");

  //update
  include("modal/update/gastos.php");
  

    ?>


    <center>

 
   <input class="form-control datetimepicker" type="hidden" id="date"  name="date" value="<?php echo date("m/Y");?>">

                         

       
<div class="table-responsive">
  <table class="egt" id="maintable" >
    
    
<?php 

  

  require_once "php/connect.php";
  if(isset($_GET['id'])){
    $id=$_GET['id'];
  $consulta=$pdo->prepare("SELECT * FROM proyectos where id=$id ");
  $consulta->execute();
	if($consulta->rowCount()>=1){
	$fila=$consulta->fetch();

 ?>
 <form method="get" action="">
 <input type="hidden" id="id_proyecto" name="id_proyecto" value=<?php echo $id ?>>
 </form>
  <tr>
    <th colspan="8" ><h3><center><?php echo $fila['nom_proy']?></center></h3></th>
  </tr> 

  <tr>
    <th colspan="8">DATOS GENERALES </th>
  </tr> 

  <tr>
    
    <td colspan="2" >Institución</td>
    <td colspan="2"><input type="text" name="id_inst" value = "<?php echo $fila['id_inst']?>" ></td>
    <td colspan="2">Código</td>
    <td colspan="2"><input type="text" name="codigo" value = "<?php echo $fila['codigo']?>" ></td>
  </tr>

  <tr>
    <td colspan="2">Fecha</td>
    <td colspan="2"><input type="text" name="fecha_reg" value = "<?php echo $fila['fecha_reg']?>" ></td> 
    <td colspan="2">Vigencia</td>
    <td colspan="2"><input type="text" name="vigencia" value = "<?php echo $fila['vigencia']?>" ></td>
  </tr>

  <tr>
    <td colspan="2">Tipo de Proyecto</td>
    <td colspan="2"><input type="text" name="tipo_proy"value = "<?php echo $fila['tipo_proy']?>" ></td>
    <td colspan="2">Tipo de Documento</td>
    <td colspan="2"><input type="text" name="tipo_doc"value = "<?php echo $fila['tipo_doc']?>" ></td>
  </tr>

  <tr>
    <th colspan="8">DATOS DE PROYECTO </th>
  </tr>


  <tr>
    <td colspan="2">Número de Registro</td>
    <td colspan="2"><input type="text" name="num_reg" value = "<?php echo $fila['num_reg']?>" ></td>
    <td colspan="2">Nombre de Proyecto</td>
    <td colspan="2"><input type="text" name="nom_proy" value = "<?php echo $fila['nom_proy']?>" ></td>
  </tr>

 <tr>
  <td colspan="2">Linea de Investigación General</td>
    <td colspan="2"><input type="text" name="id_linea_inv_1" value = "<?php echo $fila['linea_gen']?>" ></td>
    <td colspan="2">Linea de Investigación Específica</td>
    <td colspan="2"><input type="text" name="id_linea_inv_2" value = "<?php echo $fila['linea_esp']?>" ></td>
 </tr>

  <tr>
    <th colspan="8">FECHAS DE PROYECTO </th>
  </tr>

  <tr>
  <td colspan="2">Fecha inicio</td>
    <td colspan="2"><input type="date" name="fecha_ini" value = "<?php echo $fila['fecha_ini']?>" ></td>
    <td colspan="2">Fecha de finalización</td>
    <td colspan="2"><input type="date" name="fecha_fin" value = "<?php echo $fila['fecha_fin']?>" ></td>
 </tr>

  <tr>
    <th colspan="8">ACTIVIDADES DE PROYECTO </th>
  </tr>

   <tr>
  <td colspan="4">Actividad</td>
    <td >Avance %</td>
    <td colspan="3">Observaciones</td>
  </tr>

  <?php
      require_once "procesos/seleccionarAct.php";// LISTAR ACTIVIDADES
      
      
      ?>  

  <tr>
    <th colspan="8">OBJETIVOS DE PROYECTO </th>
  </tr>

<tr>
  <td colspan="7">Objetivo General</td>
    <td colspan="1">Avance %</td>
    
  </tr>
<tr>
    <td colspan="7"><input type="txt" name="obj_g" value = "<?php echo $fila['objetivo_gen']?>" ></td>
    <td colspan="1"><input type="txt" name="avance_g"  value = "<?php echo $fila['avance_og'],"%"?>" ></td>
</tr>


  <tr>
    <th colspan="8"></th>
  </tr>
  <tr>
    <td colspan="7">Objetivos Específicos</td>
    <td colspan="1">Avance %</td>
</tr>

  
    <?php
      require_once "procesos/seleccionarObjE.php";// LISTAR ObjE
      ?>  
 

<tr>
    <th colspan="8">INFORME FINANCIERO </th>
  </tr>

<tr>
  <td colspan="1">Item</td>
  <td colspan="4">Descripción</td>
    <td colspan="1">Monto Asignado</td>
    <td colspan="1">Monto Ejecutado</td>
    <td colspan="1">Diferencia</td>
    

  </tr>

 
  <?php
			require_once "procesos/seleccionar.php";// LISTAR FINANZAS
      require_once "ajax/gastos.php";
      //require_once "procesos/actualizar.php";
			?>	



  
  
</table>
  </div>
  
  </center>

<?php
}

}
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 
 <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


<?php
require_once "jquery/jquery.php";
?>
  </body>
  </html>

  