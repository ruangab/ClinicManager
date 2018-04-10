<?php
class Paciente{
	private $idsus;
	private $name_patient;
	private $peso;
	private $idade;
	private $altura;
	private $descricao;
	
	public function setName_patient($name_patient){
		$this->name_patient = $name_patient;
	}
	public function getName_patient(){
		return  $this->name_patient;
	}
	public function setIdade($idade){
		$this->idade = $idade;
	}
	public function getIdade(){
		return  $this->idade;
	}
	public function setpeso($peso){
		$this->peso = $peso;
	}
	public function getpeso(){
		return  $this->peso;
	}
	public function setIdsus($idsus){
		$this->idsus = $idsus;
	}
	public function getIdsus(){
		return  $this->idsus;
	}
	public function setAltura($altura){
		$this->altura = $altura;
	}
	public function getAltura(){
		return  $this->altura;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	public function getDescricao(){
		return  $this->descricao;
	}
	public function select($idsus){
		$sql = new BancoDeDados();

		$results = $sql->select("SELECT * FROM paciente WHERE  idsus = :idsus", array(
			":idsus" => $idsus
		));
		
		if (count($results) > 0) {

			$row = $results[0];
			$this->setname_patient($row['name_patient']);	
			$this->setIdsus($row['idsus']);	
			$this->setpeso($row['peso']);	
			$this->setIdade($row['idade']);
			$this->setAltura($row['altura']);	
			$this->setDescricao($row['descricao']);

		}
		

	}
	public function insert(){
		$sql = new BancoDeDados();

		$sql->query("INSERT INTO paciente (idsus, name_patient, peso, idade, altura, descricao) VALUES (:idsus, :name_patient, :peso, :idade, :altura, :descricao)", array(
			":idsus" => $this->getIdsus(),
			":name_patient" => $this->getname_patient(),
			":peso" => $this->getpeso(),
			":idade" => $this->getIdade(),
			":altura" => $this->getAltura(),
			":descricao" => $this->getDescricao()
		));

	}
	public function update($idsus, $new_name_patient, $new_peso, $new_idade, $new_altura, $new_descricao){

		$sql = new BancoDeDados();

		$sql->query("UPDATE paciente SET name_patient=:new_name_patient, peso=:new_peso, idade=:new_idade, altura=:new_altura, descricao=:new_descricao WHERE idsus = :idsus", array(
			":idsus" => $idsus,
			":new_name_patient" => $new_name_patient,
			":new_peso" => $new_peso,
			":new_idade" => $new_idade,
			":new_altura" => $new_altura,
			":new_descricao" => $new_descricao
		)); 

	}
	public function delete($idsus){

		$sql = new BancoDeDados();

		$sql->query("DELETE FROM paciente WHERE idsus = :idsus", array(
			":idsus" => $idsus
		)); 

	}
	public function __toString(){
		return json_encode(array(
			"Nome do paciente:" => $this->getName_patient(),
			"Número do sus" => $this->getIdsus(),
			"Peso do paciente:" => $this->getPeso(),
			"Idade do paciente:" => $this->getIdade(),
			"Altura do paciente" => $this->getAltura(),
			"Descricão do paciente" => $this->getDescricao()
		));
	}
	



}




  ?>