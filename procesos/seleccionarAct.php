<?php
	require_once "php/connect.php";
	
	if(isset($_GET['id'])){
    $id=$_GET['id'];

    

	$consulta3=$pdo->prepare("SELECT avance,item,observaciones FROM actividades INNER JOIN proyectos ON proyectos.id = actividades.proyectos_id where proyectos.id = $id ");
	$consulta3->execute();

	if($consulta3->rowCount()>=1){
		while($row=$consulta3->fetch()){
			$item=$row['item'];
			$avance=$row['avance'];
			$observaciones=$row['observaciones'];
		?>
			

					<tr>
						<!--<td colspan=1><input  id='txt_item'  name='txt_item'  value ="<?php //echo $item;?>" required=''></td>-->
						<td colspan="4"><input type="txt" id='txt_item' name="txt_item" value ="<?php echo $item;?>" readonly></td>
					<!--	<td colspan=4><input  id='txt_des'  name='txt_des'  value ="<?php //echo $description;?>" required=''></td>-->
						<td ><input type="txt" id='txt_des' name="avance" value ="<?php echo $avance ,"%";?>" readonly></td>
					<!--	<td colspan=1><input  id='txtm_asig'  name='txtm_asig'  value ="<?php //echo ($observaciones,'%');?>" readonly='readonly'></td>-->
						<td colspan="3"><input type="txt" id='observaciones' name='observaciones' name="observaciones" value ="<?php echo $observaciones;?>" readonly></td>
						<!--<td colspan=1><input  id='txtm_eje'  name='txtm_eje'  value ="<?php// echo number_format($real,2,'.','');?>" required=''></td>-->
					</tr>

					
  <?php
			}
	}else
		echo "<tr>
    			<td colspan=4><input   readonly='readonly'></td>
   				<td><input   readonly='readonly'></td>
    			<td colspan=3><input   readonly='readonly'></td>
  			</tr>";


}


?>



						