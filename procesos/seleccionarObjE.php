<?php
	require_once "php/connect.php";
	
	if(isset($_GET['id'])){
    $id=$_GET['id'];

    

	$consulta4=$pdo->prepare("SELECT avance,descripcion FROM objetivos_esp INNER JOIN proyectos ON proyectos.id = objetivos_esp.proyectos_id where proyectos.id = $id ");
	$consulta4->execute();

	if($consulta4->rowCount()>=1){
		while($row=$consulta4->fetch()){
			$avance=$row['avance'];
			$descripcion=$row['descripcion'];
		?>
			

					<tr>
						
						<td colspan="7"><input type="txt" name="obj_e" value ="<?php echo $descripcion;?>" readonly></td>
				
						<td colspan="1"><input type="txt" name="avance_e" value ="<?php echo $avance,"%" ;?>" readonly></td>
					</tr>
					
					

					
  <?php
			}
	}else
		echo "
    			<td colspan=7><input   readonly='readonly'></td>
    			<td colspan=1><input   readonly='readonly'></td>
  			 ";


}


?>

