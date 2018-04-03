<?php 
	include("conexao.php");
	$nome = (!empty($_POST['nome']) ? $_POST['nome']:null);
	$sexo = (!empty($_POST['sexo']) ? $_POST['sexo']:null);
	$sus = (!empty($_POST['sus']) ? $_POST['sus']:null);
	$idade = (!empty($_POST['idade']) ? $_POST['idade']:null);
	$peso = (!empty($_POST['peso']) ? $_POST['peso']:null);
	$rg = (!empty($_POST['rg']) ? $_POST['rg']:null);
	$naturalidade = (!empty($_POST['natu']) ? $_POST['natu']:null);
	$profissao = (!empty($_POST['prof']) ? $_POST['prof']:null);

	$insert = $pdo->prepare("INSERT INTO paciente(idsus, nomepaciente, peso, idade, naturalidade, profissao, sexo, rg) VALUES (:idsus,:nomepaciente, :peso, :idade, :naturalidade, :profissao, :sexo, :rg)");
	$insert->bindValue(":nomepaciente",$nome);
	$insert->bindValue(":idsus",$sus);
	$insert->bindValue(":peso",$peso);	
	$insert->bindValue(":idade",$idade);
	$insert->bindValue(":naturalidade",$naturalidade);
	$insert->bindValue(":profissao",$profissao);
	$insert->bindValue(":sexo",$sexo);
	$insert->bindValue(":rg",$rg);
	$insert->execute();	

	



 ?>