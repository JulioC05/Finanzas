<?php
	require_once "php/connect.php";
	//$id_usuario = $_SESSION['id'];

  	//$consulta=$pdo->prepare("SELECT proyectos.id as id_proyectos,nom_proy,id_inst,codigo,fecha_reg,vigencia,tipo_proy,tipo_doc,num_reg,linea_gen,linea_esp,fecha_ini,fecha_fin,objetivo_gen FROM proyectos RIGHT OUTER JOIN crea ON crea.proyectos_id = proyectos.id INNER JOIN usuarios on usuarios.id = crea.usuarios_id where usuarios.id = ".$_SESSION['id']." ");
  	//$consulta->execute();//listar proyectos

	//$consulta->rowCount();
	//$fila=$consulta->fetch();
	if (isset($_REQUEST['id'])){
		$id=intval($_REQUEST['id']);
		$sql="DELETE FROM gastos WHERE id='$id'";
		$delete=$pdo->prepare($sql);
		$delete->execute();
	}

	if(isset($_GET['id'])){
    $id=$_GET['id'];

	$consulta2=$pdo->prepare("SELECT gastos.id,item,descripcion,monto_asignado,monto_ejecutado,diferencia FROM gastos INNER JOIN proyectos ON proyectos.id = gastos.proyectos_id where proyectos.id = $id ");
	$consulta2->execute();

	$items=1;
	$item=0;
	$total_previsto=0;
	$total_real=0;
	$total_diferencia=0;


	if($consulta2->rowCount()>=1){
		while($row=$consulta2->fetch()){
			$id=$row['id'];
			$item=$row['item'];
			$description=$row['descripcion'];
			$previsto=$row['monto_asignado'];
			$real=$row['monto_ejecutado'];
			$diferencia =$row['diferencia'];
			//$id=$row['id'];	
			if ($real>$previsto) {
				$style="color: rgb(244, 101, 36)";
			} elseif ($real<$previsto){
				$style="color: rgb(0, 153, 51)";
			}else{
				$style='';
			}
		?>
			

					<tr>
						<td colspan=1><input  id='txt_item'  name='txt_item'  value ="<?php echo $item;?>" required=''  readonly='readonly'></td>
						<td colspan=1><input  id='txt_des'  name='txt_des'  value ="<?php echo $description;?>" required=''  readonly='readonly'></td>
						<td colspan=2><input  id='txtm_asig'  name='txtm_asig'  value ="<?php echo number_format($previsto,2,'.','');?>" readonly='readonly'></td>
						<td colspan=1><input  id='txtm_eje'  name='txtm_eje'  value ="<?php echo number_format($real,2,'.','');?>" required=''  readonly='readonly'></td>
						<td colspan=2><input style="<?php echo $style;?>" id='txt_dif'  name='txt_dif'  value ="<?php echo 	number_format($diferencia,2,'.','');?>" readonly='readonly'></td>
						<td colspan=1>
			<a href="#update_gastos"  data-target="#update_gastos" class="edit" data-toggle="modal"  data-id='<?php echo $id;?>'          data-item="<?php echo $item;?>" data-descripcion="<?php echo $description;?>" data-previsto="<?php echo $previsto;?>" data-real="<?php echo $real;?>"><i class="material-icons" data-toggle="tooltip" title="Editar"style="color:#FACC2E" >edit</i></a>
			<a href="javascript:location.reload()" onclick="eliminar_gasto('<?php echo $id;?>')" ><i class="fa fa-trash" style="color:#ff3300"></i></a>
		</td>
					
					
				</tr>
				
		<!--<td class='text-center'><?php //echo $item;?></td>
		<td class='text-center'><?php //echo $description;?></td>
		<td class='text-center'><?php //echo number_format($previsto,2,'.','');?></td>
		<td class='text-center'><?php //echo number_format($real,2,'.','');?></td>
		<td class='text-center' style="<?php //echo $style;?>"><?php //echo number_format($diferencia,2,'.','');?></td>-->

		
		
	
		<?php
		$items++;
		$total_previsto+=$previsto;
		$total_real+=$real;
		$total_diferencia+=$diferencia;
	
								
		}

	}else
		echo "<tr>
			<td colspan=1><input   readonly='readonly'></td>
			<td colspan=1><input   readonly='readonly'></td>
			<td colspan=2><input   readonly='readonly'></td>
			<td colspan=1><input   readonly='readonly'></td>
			<td colspan=2><input   readonly='readonly'></td>
			<td colspan=1><input   readonly='readonly'></td>
			
		</tr>";
	}

?>

<!--	<tr>
		<th colspan='3' >
			 
		</th>		
		<td colspan='1'>
			S/. <?php //echo number_format($total_previsto,2,'.','');?>&nbsp;
		</td>
		<td colspan='1' >

			S/. <?php //echo number_format($total_real,2,'.','');?>&nbsp;
		</td>
		<td colspan='2' style="color: rgb(244, 101, 36);" >

			S/. <?php //echo number_format($total_diferencia,2,'.','');?>&nbsp;
		</td>-->
		
		
	<!--</tr>
	<tr>
		<td colspan='2'>
		
			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalGastos"><span class="glyphicon glyphicon-minus"></span> Agregar Gastos</button>
			<a href="#modalGastos" data-target="#modalGastos" class="add" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" style="color:blue">playlist_add</i></a>
		</td>
	</tr>-->
<?php

