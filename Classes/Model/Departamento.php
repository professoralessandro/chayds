<?php
class Departamento
{
	//Propriedades
	private $idDepartamento;
	private $nome;
	private $gerente;
	private $email;
	private $emailComercial;
	private $ddd;
	private $telefone;
	private $dataCriacao;
	
	//Construtor
	function __construct($idDepartamento = 0,$nome = "",$gerente="",$email="",$emailComercial="",$ddd="",$telefone="", $dataCriacao = "")
	{
		$this->idDepartamento = $idDepartamento;
		$this->nome = $nome;
		$this->gerente = $gerente;
		$this->email = $email;
		$this->emailComercial = $emailComercial;
		$this->ddd = $ddd;
		$this->telefone = $telefone;
		$this->dataCriacao = $dataCriacao;
	}
	
	//METODOS GET AND SET
	public function setIdDepartamento($valor)
	{
		$this->idDepartamento = $valor;
	}
	public function getIdDepartamento()
	{
		return $this->idDepartamento;
	}
	public function setNome($valor)
	{
		$this->nome = $valor;
	}
	public function getNome()
	{
		return $this->nome;
	}
	
	public function setGerente($valor)
	{
		$this->gerente = $valor;
	}
	public function getGerente()
	{
		return $this->gerente;
	}
	public function setEmail($valor)
	{
		$this->email = $valor;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function setEmailComercial($valor)
	{
		$this->emailComercial = $valor;
	}
	public function getEmailComercial()
	{
		return $this->emailComercial;
	}
	public function setDdd($valor)
	{
		$this->ddd = $valor;
	}
	public function getDdd()
	{
		return $this->ddd;
	}
	public function setTelefone($valor)
	{
		$this->telefone = $valor;
	}
	public function getTelefone()
	{
		return $this->telefone;
	}
	public function setDataCriacao($valor)
	{
		$this->dataCriacao = $valor;
	}
	public function getDataCriacao()
	{
		return $this->dataCriacao;
	}
	
}//class
?>