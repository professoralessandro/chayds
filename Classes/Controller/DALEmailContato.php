<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/EmailContato.php"); ?>
<?php
class DALEmailContato
{
	//ATRIBUTOS
	private $conexao;
	
	//CONSTRUTOR
	public function __construct($conexao)
	{
        $this->conexao = $conexao;
    }
    //METODOS
	
	//ENVIAR EMAIL
	public function enviarEmail($email)
	{
		mail(" {$email->GetEmailDestino()} ", " {$email->GetAssunto()} ","

		esta é um contato enviado por ". $email->GetNome() ." com as seguntes informações:

		Assunto:". $email->GetAssunto() ."
		Nome: ". $email->GetNome() ."
		Endereço: ". $email->GetEndereco() ."
		Complemento: ". $email->GetComplemento() ."
		Bairro: ". $email->GetBairro() ."
		Cidade: ". $email->GetCidade() ."
		Estado: ". $email->GetEstado() ."
		CEP: ". $email->GetCep() ."
		Remetente: ". $email->GetRemetente() ."
		Telefone: ". $email->GetTelefone() ."

		--
		mensagem:
		" . $email->GetMensagem() . "
			");
	}//ENVIAR EMAIL
	
	//LISTAR EMAILS
	public function enviarEmais($email)
	{
		$sqlComand = " select email from tbpessoa ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		
		
		$this->conexao->Desconectar();
	}//LISTAR EMPRESA
}//CLASS
?>