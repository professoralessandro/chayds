<?php
class ModelCargo
{
	//Propriedades
	private $id;
	private $nome;
	private $dataCriacao;
	
	//Construtor
	function __construct($id = 0,$nome = " ", $dataCriacao = " ")
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->dataCriacao = $dataCriacao;
	}
	
	//METODOS GET AND SET
	public function setId($valor)
	{
		$this->id = $valor;
	}
	public function getId()
	{
		return $this->id;
	}
	public function setNome($valor)
	{
		$this->nome = $valor;
	}
	public function getNome()
	{
		return $this->nome;
	}
	public function setDataCriacao($valor)
	{
		$this->dataCriacao = $valor;
	}
	public function getDataCriacao()
	{
		return $this->dataCriacao;
	}
	
	//METODOS
	
}//class
?>