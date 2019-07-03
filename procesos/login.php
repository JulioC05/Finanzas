<?php
	$user=$_POST['user'];
	$clave=($_POST['clave']);

	$consulta=$pdo->prepare("SELECT * FROM usuarios WHERE usuario=:user AND clave=:clave AND estado='Activo'");
	$consulta->bindParam(':user',$user);
	$consulta->bindParam(':clave',$clave);
	$consulta->execute();
	if($consulta->rowCount()>=1){
		session_start();
		$fila=$consulta->fetch();
		$_SESSION['id']=$fila['id'];
		$_SESSION['usuario']=$fila['usuario'];
		$_SESSION['token']=md5(uniqid(mt_rand(),true));
		header("Location: dashboard.php");
	}else{

		echo "ERROR los datos no son correctos";
	}