<?php
class Usuario{
	private $idusuario;
	private $nomeusu;
	private $senha;
	private $tipousu;
	
	public function setNomeusu($nomeusu){
		$this->nomeusu = $nomeusu;
	}
	public function getNomeusu(){
		return  $this->nomeusu;
	}
	public function setTipoUsuario($tipousu){
		$this->tipousu = $tipousu;
	}
	public function getTipoUsuario(){
		return  $this->tipousu;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getSenha(){
		return  $this->senha;
	}
	public function setIdusuario($idusuario){
		$this->Idusuario = $idusuario;
	}
	public function getIdusuario(){
		return  $this->idusuario;
	}
	public function loadById($idusuario){
		$sql = new BancoDeDados();

		$results = $sql->select("SELECT * FROM `usuario` WHERE  idusuario = :idusuario", array(
			":idusuario" => $idusuario
		));
		
		if (count($results) > 0) {

			$row = $results[0];
			$this->setNomeusu($row['nomeusu']);	
			$this->setIdusuario($row['idusuario']);	
			$this->setSenha($row['senha']);	
			$this->setTipoUsuario($row['tipousu']);

		}
	}
	public function Insert(){
		$sql = new BancoDeDados();

		$sql->query("INSERT INTO `usuario`(`nomeusu`, `senha`, `tipousu`) VALUES (:nomeusu, :senha, :tipousu)", array(
			":nomeusu" => $this->getNomeusu(),
			":senha" => $this->getSenha(),
			":tipousu" => $this->getTipoUsuario()
		));
	}
	public function __toString(){
		return json_encode(array(
			"Usuario:" => $this->getNomeusu(),
			"Tipo Usuario" => $this->getTipoUsuario(),
			"Senha:" => $this->getSenha(),
			"Id Usuário" => $this->getIdusuario()
		));
	}
	



}




  ?>