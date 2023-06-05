<?php

class Pet{

	private $id;
	private $cliente;
	private $nome;
	private $nascimento;
	private $pelagem;
	private $imagem;

	public function setId($id)
	{
		$this->id=$id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setCliente($cliente)
	{
		$this->cliente=$cliente;
	}

	public function getCliente()
	{
		return $this->cliente;
	}

	public function setNome($nome)
	{
		$this->nome=$nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNascimento($nascimento)
	{
		$this->nascimento=$nascimento;
	}

	public function getNascimento()
	{
		return $this->nascimento;
	}

	public function setPelagem($pelagem)
	{
		$this->pelagem=$pelagem;
	}

	public function getPelagem()
	{
		return $this->pelagem;
	}

	public function setImagem($imagem)
	{
		$this->imagem=$imagem;
	}

	public function getImagem()
	{
		return $this->imagem;
	}
}

?>