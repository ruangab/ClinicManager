<?php 
	include("conexao.php");
	$user = (!empty($_POST['user']) ? $_POST['user']:null);
	$type_user = (!empty($_POST['type_user']) ? $_POST['type_user']:null);
	$pass = (!empty($_POST['pass']) ? $_POST['pass']:null);
	
	

	$insert = $pdo->prepare("INSERT INTO usuario (nomeusu, senha, tipousu) VALUES (:nomeusu, :senha, :tipousu)");
	$insert->bindValue(":nomeusu",$user);
	$insert->bindValue(":senha",$pass);
	$insert->bindValue(":tipousu",$type_user);
	$insert->execute();	

	



 ?>