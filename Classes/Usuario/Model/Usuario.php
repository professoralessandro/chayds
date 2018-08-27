<?php
class Usuario
{
	//Propriedades
	private $id;
	private $nome;
	private $email;
	private $senha;
	
	//Construtor
	function __construct($id = 0,$nome = "Alessandro", $email = "alessandro@chayds.com.br", $senha="123456")
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->email = $email;
		$this->senha = $senha;
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
	public function setEmail($valor)
	{
		$this->email = $valor;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setSenha($valor)
	{
		$this->senha = $valor;
	}
	public function getSenha()
	{
		return $this->senha;
	}
}//class
?>