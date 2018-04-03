<?php 
define("BANCO_DE_DADOS", ["localhost","gerenciamento_recepcao","root", ""]);
	try {
		$pdo = new PDO("mysql:host=".BANCO_DE_DADOS[0].";dbname=".BANCO_DE_DADOS[1]."",BANCO_DE_DADOS[2],BANCO_DE_DADOS[3]);	
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

	if (!is_null($pdo)) {
		echo "";
	}else{
		echo "Não conectado";
	}
		
 ?>