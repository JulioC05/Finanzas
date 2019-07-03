<?php 
include("inc/cabeza.php");

//session_start();

 ?>

<html lang="es">

<meta charset="utf-8"/>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Agregar Gastos</title>
  </head>
  <body>

    <?php
  
  //add
  include("modal/add/gastos.php");

  //update
  include("modal/update/gastos.php"); 

    ?>

    <input class="form-control datetimepicker" type="hidden" id="date"  name="date" value="<?php echo date("m/Y");?>">

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

    <center>
  <table class="egt" id="maintable">

  <tr>
    <th colspan="8"><h3><center>FORMULACIÓN DEL PROYECTO</center></h3></th>
  </tr> 

  <tr>
    <th colspan="8">DATOS GENERALES </th>
  </tr> 

  
  <tr>
    <td colspan="2">Institución</td>
    <td colspan="2"><input type="text" name="id_inst"></td>
    <td colspan="2">Código</td>
    <td colspan="2"><input type="text" name="codigo"></td>
  </tr>

  <tr>
    <td colspan="2">Fecha</td>
    <td colspan="2"><input type="text" name="fecha_reg"></td> 
    <td colspan="2">Vigencia</td>
    <td colspan="2"><input type="text" name="vigencia"></td>
  </tr>

  <tr>
    <td colspan="2">Tipo de Proyecto</td>
    <td colspan="2"><input type="text" name="tipo_proy"></td>
    <td colspan="2">Tipo de Documento</td>
    <td colspan="2"><input type="text" name="tipo_doc"></td>
  </tr>

  <tr>
    <th colspan="8">DATOS DE PROYECTO </th>
  </tr>

  <tr>
    <td colspan="2">Número de Registro</td>
    <td colspan="2"><input type="text" name="num_reg"></td>
    <td colspan="2">Nombre de Proyecto</td>
    <td colspan="2"><input type="text" name="nom_proy"></td>
  </tr>

 <tr>
  <td colspan="2">Linea de Investigación General</td>
    <td colspan="2"><input type="text" name="id_linea_inv_1"></td>
    <td colspan="2">Linea de Investigación Específica</td>
    <td colspan="2"><input type="text" name="id_linea_inv_2"></td>
 </tr>

  <tr>
    <th colspan="8">FECHAS DE PROYECTO </th>
  </tr>

  <tr>
  <td colspan="2">Fecha inicio</td>
    <td colspan="2"><input type="date" name="fecha_ini"></td>
    <td colspan="2">Fecha de finalización</td>
    <td colspan="2"><input type="date" name="fecha_fin"></td>
 </tr>

  <tr>
    <th colspan="8">ACTIVIDADES DE PROYECTO </th>
  </tr>

   <tr>
  <td colspan="4">Actividad</td>
    <td >Avance %</td>
    <td colspan="3">Observaciones</td>
  </tr>

  <tr>
    <td colspan="4"><input type="txt" name="item"></td>
    <td ><input type="txt" name="avance"></td>
    <td colspan="3"><input type="txt" name="observaciones"></td>
  </tr>

  <tr>
    <th colspan="8">OBJETIVOS DE PROYECTO </th>
  </tr>

<tr>
  <td colspan="3">Objetivo General</td>
    <td >Avance %</td>
    <td colspan="3">Objetivos Específicos</td>
    <td >Avance %</td>
  </tr>

  <tr>
    <td colspan="3"><input type="txt" name="obj_g"></td>
    <td ><input type="txt" name="avance_g"></td>
    <td colspan="3"><input type="txt" name="obj_e"></td>
    <td ><input type="txt" name="avance_e"></td>
  </tr>

<tr>
    <th colspan="8">INFORME FINANCIERO </th>
  </tr>

<tr>
  <td colspan="1">Item</td>
  <td colspan="1">Descripción</td>
    <td colspan="2">Monto Asignado</td>
    <td colspan="1">Monto Ejecutado</td>
    <td colspan="2">Diferencia</td>
    <td colspan="1"><a href="#modalGastos" data-target="#modalGastos" class="add" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" style="color:blue">playlist_add</i></a></td>
  </tr>

  <?php
      require_once "procesos/seleccionaraAdd.php";// LISTAR FINANZAS
      
      
      ?>  


</table>


  </center>

  <?php
require_once "jquery/jquery.php";
?>




  </body>
  </html>
