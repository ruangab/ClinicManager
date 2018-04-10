<?php
class Usuario{
	private $id_user;
	private $user;
	private $pass;
	private $type_user;
	
	public function setUser($user){
		$this->user = $user;
	}
	public function getUser(){
		return  $this->user;
	}
	public function setTypeUser($type_user){
		$this->type_user = $type_user;
	}
	public function getTypeUser(){
		return  $this->type_user;
	}
	public function setPass($pass){
		$this->pass = $pass;
	}
	public function getPass(){
		return  $this->pass;
	}
	public function setIdUser($id_user){
		$this->id_user = $id_user;
	}
	public function getIdUser(){
		return  $this->id_user;
	}
	public function select($user, $pass):bool{
		$sql = new BancoDeDados();
		try {
			$results = $sql->select("SELECT * FROM usuario WHERE  user = :user AND pass = :pass", array(
			":user" => $user,
			":pass" => $pass
			));
		
		if (count($results) > 0) {

			$row = $results[0];
			$this->setUser($row['user']);	
			$this->setIdUser($row['id_user']);	
			$this->setPass($row['pass']);	
			$this->setTypeUser($row['type_user']);

			return true;
			
		}else {
			echo 'login não existe';
			return false;
		}
		} catch (Exception $e) {
			echo'DEU RUIM';
			return false;
		}
		

	}
	
	public function insert(){
		$sql = new BancoDeDados();

		$sql->query("INSERT INTO usuario(user, pass, type_user) VALUES (:user, :pass, :type_user)", array(
			":user" => $this->getUser(),
			":pass" => $this->getPass(),
			":type_user" => $this->getTypeUser()
		));

	}
	public function update($id, $new_user, $new_pass, $new_type_user){

		$sql = new BancoDeDados();

		$sql->query("UPDATE usuario SET user=:new_user, pass=:new_pass, type_user=:new_type_user WHERE id_user = :id", array(
			":id" => $id,
			":new_user" => $new_user,
			":new_pass" => $new_pass,
			":new_type_user" => $new_type_user
		)); 

	}
	public function delete($id){

		$sql = new BancoDeDados();

		$sql->query("DELETE FROM usuario WHERE id_user = :id", array(
			":id" => $id
		)); 

	}
	public function __toString(){
		return json_encode(array(
			"Usuario:" => $this->getUser(),
			"Tipo Usuario" => $this->getTypeUser(),
			"pass:" => $this->getPass(),
			"Id Usuário" => $this->getIdUser()
		));
	}
	



}




  ?>