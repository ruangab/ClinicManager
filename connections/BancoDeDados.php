<?php 
// Criando uma classe de conexão de banco que extende da classe PDO
class BancoDeDados extends PDO{

	private $conn;

	// Método construtor para receber como parametros os dados do banco como: host, dbname, user, pass na hora de instânciar
	public function __construct(){
		
		$this->conn = new PDO("mysql:dbname=gerenciamento_recepcao;host=localhost", "root", "");

	}

	// Criando um método que recebe uma querySQL e seus parâmetros, que irá preparar a operação(INSERT, SELECT, UPDADE, DELETE)
	public function query($rowQuery, $params = array()){

		$stmt = $this->conn->prepare($rowQuery);

		$this->setParams($stmt, $params);

 		$stmt->execute();

		return $stmt;
		
	}

	private function setParams($stmt, $parameters = array()){

		// Foreach para preparar os valores pra operação dependendo da quantidade do array
		foreach ($parameters as $key => $value) {
			
			$this->setParam($stmt ,$key, $value);
		}
		
	}
	// Método que recebe um parametro unico, logo, será necessário especificar a chave($key) e o valor($value)
	private function setParam($stmt, $key, $value){

		$stmt->bindValue($key, $value);

	}
	// Método para executar o select
	public function select($rowQuery, $params = array()):array{

		$stmt = $this->query($rowQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}


}




?>