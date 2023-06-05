<?php
require_once 'Banco.php';

class PetPA{

	private $banco;

	function __construct(){
		$this->banco=new Banco();
	}

	public function cadastrar($pet)
	{
		$sql="insert into pet values(".
		$pet->getId().",".
		$pet->getCliente().",'".
		$pet->getNome()."','".
		$pet->getNascimento()."','".
		$pet->getPelagem()."',".
		$pet->getImagem().")";
		$resp=$this->banco->executar($sql);
		if(!$resp){
			return false;
		}else{
			return true;
		}
	}

	public function retornaId()
	{
		$sql="select max(id) from pet";
		$consulta=$this->banco->consultar($sql);
		if(!$consulta){
			return false;
		}else{
			while($linha=$consulta->fetch_assoc()){
				$id=$linha['max(id)'];
			}
			return $id;
		}
	}

	public function listar($inicio,$fim)
	{
		$sql="select * from pet where id between $inicio and $fim";
		$consulta=$this->banco->consultar($sql);
		if(!$consulta){
			return false;
		}else{
			return $consulta;
		}
	}

	public function buscar($busca)
	{
		$sql="select * from pet where id='$busca' or cliente='$busca' or nome like '%$busca%' or nascimento like '%$busca%' or pelagem like '%$busca%'";
		$consulta=$this->banco->consultar($sql);
		if (!$consulta) {
			return false;
		} else {
			return $consulta;
		}		
	}

	public function alterar($pet)
	{
		$sql="update pet set nome='".
		$pet->getNome()."', cliente=".$pet->getCliente().
		",nascimento='".$pet->getNascimento()."', pelagem='".$pet->getPelagem()."', imagem=".$pet->getImagem()." where id=".$pet->getId();
		$resp=$this->banco->executar($sql);
		if (!$resp) {
			return false;
		} else {
			return true;
		}
		
	}

	public function deletar($id)
	{
		$sql="delete from pet where id=$id";
		$resp=$this->banco->executar($sql);
		if (!$resp) {
			return false;
		} else {
			return true;
		}		
	}

	public function converteId($id)
	{
		$sql="select nome from pet where id=$id";
		$consulta=$this->banco->consultar($sql);
		if (!$consulta) {
			return false;
		} else {
			return $consulta;
		}	
	}

	public function converteNome($nome)
	{
		$sql="select id from pet where nome='$nome'";
		$consulta=$this->banco->consultar($sql);
		if (!$consulta) {
			return false;
		} else {
			return $consulta;
		}
	}

}
?>