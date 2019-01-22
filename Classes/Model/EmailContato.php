<?php include_once("../EnviarEmail/Model/EnviarEmail.php"); ?>
<?php
class EmailContato extends EnviarEmail
{
	//Propriedades
	private $nome;
	private $endereco;
	private $complemento;
	private $bairro;
	private $cidade;
	private $estado;
	private $cep;
	private $telefone;
	
	//Construtor
	
	function EmailContato($nome = "", $endereco = "", $complemento = "", $bairro = "", $cidade = "", $estado = "", $cep = "", $telefone = "", $emailDestino = "professor_alessandro@hotmail.com", $assunto = "Assunto construtor", $remetente = "construtor", $mensagem = "construtor")
	{
		$this->nome = $nome;
		$this->endereco = $endereco;
		$this->complemento = $complemento;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->estado = $estado;
		$this->cep = $cep;
		$this->telefone = $telefone;
		
		parent::__construct($emailDestino, $assunto, $remetente, $mensagem);
	}
	
	//METODOS GET AND SET
	public function SetNome($valor)
	{
		$this->nome = $valor;
	}
	public function GetNome()
	{
		return $this->nome;
	}
	public function SetEndereco($valor)
	{
		$this->endereco = $valor;
	}
	public function GetEndereco()
	{
		return $this->endereco;
	}
	public function SetComplemento($valor)
	{
		$this->complemento = $valor;
	}
	public function GetComplemento()
	{
		return $this->complemento;
	}
	public function SetBairro($valor)
	{
		$this->bairro = $valor;
	}
	public function GetBairro()
	{
		return $this->bairro;
	}
	public function SetCidade($valor)
	{
		$this->cidade = $valor;
	}
	public function GetCidade()
	{
		return $this->cidade;
	}
	public function SetEstado($valor)
	{
		$this->estado = $valor;
	}
	public function GetEstado()
	{
		return $this->estado;
	}
	public function SetCep($valor)
	{
		$this->cep = $valor;
	}
	public function GetCep()
	{
		return $this->cep;
	}
	public function SetTelefone($valor)
	{
		$this->telefone = $valor;
	}
	public function GetTelefone()
	{
		return $this->telefone;
	}
	//FUNÇÕES
	public function enviarEmail($emailEnviar, $assunto, $nome, $end, $complemento, $bairro, $cidade, $estado,$cep, $remetente, $telefone, $mensagem)
	{	
		$this->SetEmailDestino($emailEnviar);
		$this->SetAssunto($assunto);
		$this->SetNome($nome);
		$this->SetEndereco($end);
		$this->SetComplemento($complemento);
		$this->SetBairro($bairro);
		$this->SetCidade($cidade);
		$this->SetEstado($estado);
		$this->SetCep($cep);
		$this->SetRemetente($remetente);
		$this->SetTelefone($telefone);
		$this->SetMensagem($mensagem);
		
		mail(" {$this->GetEmailDestino()} ", " {$this->GetAssunto()} ","

		esta é um contato enviado por ". $this->GetNome() ." com as seguntes informações:

		Assunto:". $this->GetAssunto() ."
		Nome: ". $this->GetNome() ."
		Endereço: ". $this->GetEndereco() ."
		Complemento: ". $this->GetComplemento() ."
		Bairro: ". $this->GetBairro() ."
		Cidade: ". $this->GetCidade() ."
		Estado: ". $this->GetEstado() ."
		CEP: ". $this->GetCep() ."
		Remetente: ". $this->GetRemetente() ."
		Telefone: ". $this->GetTelefone() ."

		--
		mensagem:
		" . $this->GetMensagem() . "
			");
	}
}//class
?>