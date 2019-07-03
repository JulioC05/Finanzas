<?php
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';


  
if($action == 'ajax'){
	
	require_once ("../php/connect.php");
	
	
   
	
	//insertamos
	if (isset($_POST['descripcion_gastos'])){
		

		$item=$_POST['item'];
		$descripcion=$_POST['descripcion_gastos'];
		$precio_previsto=$_POST['monto_asignado'];
		$precio_real=$_POST['monto_ejecutado'];
		$diferencia=($precio_previsto-$precio_real);
		$date_added=date("Y-m-d");
		$id_proyecto=$_POST['id_proyecto'];	
	

		//insertamos
		//$sql="INSERT INTO `gastos` (`item`, `descripcion`, `monto_asignado`, `monto_ejecutado`, `diferencia`, `fecha_creado`,'proyectos_id	') 
	//		  VALUES (?,?,?,?,?,?,1)";
		
    	


		$sql="INSERT INTO `gastos`( `item`, `descripcion`, `monto_asignado`, `monto_ejecutado`, `diferencia`, `fecha_creado`, `proyectos_id`)
			  VALUES (?,?,?,?,?,?,$id_proyecto)";	  
		$insert=$pdo->prepare($sql);

		$insert->bindParam(1,$item);
		$insert->bindParam(2,$descripcion);
		$insert->bindParam(3,$precio_previsto);
		$insert->bindParam(4,$precio_real);
		$insert->bindParam(5,$diferencia);
		$insert->bindParam(6,$date_added);
		
		$insert->execute();
	}

	//actualizamos
	if (isset($_POST['edit_id_gastos'])){

		$id=$_POST['edit_id_gastos'];	
		$item=$_POST['edit_item'];	
		$descripcion=$_POST['edit_descripcion'];
		$precio_previsto=$_POST['edit_asignado'];
		$precio_real=$_POST['edit_ejecutado'];
		$diferencia=($precio_previsto-$precio_real);

		//$sql="UPDATE gastos SET descripcion=':descripcion', monto_asignado=':precio_previsto', monto_ejecutado=':precio_real', diferencia=':diferencia' WHERE id=':id'";

		$sql="UPDATE `gastos` SET `item`='$item',`descripcion`='$descripcion',`monto_asignado`='$precio_previsto',`monto_ejecutado`='$precio_real',`diferencia`='$diferencia' WHERE id='$id'";

		$update=$pdo->prepare($sql);
		//$update->bindParam(":item",$item);
		//$update->bindParam(":descripcion",$descripcion);
		//$update->bindParam(":precio_previsto",$precio_previsto);
		//$update->bindParam(":monto_ejecutado",$monto_ejecutado);
		//$update->bindParam(":diferencia",$diferencia);
		//$update->bindParam(":id",$id);

		$update->execute();
	}
	if (isset($_REQUEST['id'])){
		$id=intval($_REQUEST['id']);
		$sql="DELETE FROM gastos WHERE id='$id'";
		$delete=$pdo->prepare($sql);
		$delete->execute();
	}


	if (isset($_GET['fecha'])) {
		$fecha=$_GET['fecha'];
		$fecha_det= explode("/",$fecha);
		$mes =$fecha_det[0];
		$año=$fecha_det[1];		
	}
	
	
	//select gastos.id,item,descripcion,monto_asignado,monto_ejecutado,diferencia from gastos INNER JOIN proyectos ON proyectos.id = gastos.proyectos_id where proyectos.id = 1//select dinamico para que dependa del proyecto
	

}