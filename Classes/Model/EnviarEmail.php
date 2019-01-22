<?php
class EnviarEmail
{
	//Propriedades
	private $emailDestino;
	private $assunto;
	private $remetente;
	private $mensagem;
	
	//Construtor
	function EnviarEmail($emailDestino ="professor_alessandro@hotmail.com", $assunto = "Construtor", $remetente = "Construtor", $mensagem = "Construtor")
	{
		$this->emailDestino = "professor_alessandro@hotmail.com";
		$this->assunto = "Nulo";
		$this->remetente = "Nulo";
		$this->mensagem = "Nulo";
	}

	//METODOS GET AND SET
	public function SetEmailDestino($valor)
	{
		$this->emailDestino = $valor;
	}
	public function GetEmailDestino()
	{
		return $this->emailDestino;
	}
	public function SetAssunto($valor)
	{
		$this->assunto = $valor;
	}
	public function GetAssunto()
	{
		return $this->assunto;
	}
	public function SetRemetente($valor)
	{
		$this->remetente = $valor;
	}
	public function GetRemetente()
	{
		return $this->remetente;
	}
	public function SetMensagem($valor)
	{
		$this->mensagem = $valor;
	}
	public function GetMensagem()
	{
		return $this->mensagem;
	}
}//class
?>