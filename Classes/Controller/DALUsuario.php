<?php include_once("../../Conexao/Conexao.php"); ?>
<?php include_once("../Model/Usuario.php"); ?>
<?php
class DALUsuario 
{
	//Propriedades
	private $conexao;
	
	//Construtor
	public function __construct($conexao)
    {
        $this->conexao = $conexao;
		//$this->conexao = new Conexao();
    }

        //METODOS GET E SET
    
		//METODOS
	public function inserirUsuario($usuario)
	{
		$sqlComand = "insert into usuario(nome, email, senha) values('";
		$sqlComand = $sqlComand . $usuario->getNome() . "','";
		$sqlComand = $sqlComand . $usuario->getEmail() . "','";
		$sqlComand = $sqlComand . $usuario->getSenha() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		//$this->conexao->Desconectar();
	}//INSERIR
	
	public function alterarUsuario($usuario)
	{
		$sqlComand = "update usuario set nome = ". $usuario->getNome() .
		", email = ". $usuario->getEmail() .
		" senha = ". $usuario->getSenha() .
		" where id = ". $usuario->getId()
		;
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		//$this->conexao->Desconectar();
	}
	
	public function excluirUsuario($id)
	{
		$sqlComand = "delete from usuario where id = ". $id ;		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		//$this->conexao->Desconectar();
	}
	
	public function localizarUsuario($id)
	{
		$sqlComand = "select * from usuario where id = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		//$this->conexao->Desconectar();
	}
	
	public function listarUsuario()
	{
		$sqlComand = " select * from usuario ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		//$this->conexao->Desconectar();
	}
	
	//FUNÇÃO  PRIMEIRO NOME
	public function primeiroNome($str)
	{
		$pos_espaco = strpos($str, ' ');// perceba que há um espaço aqui
		$primeiro_nome = substr($str, 0, $pos_espaco);
		$resto_nome = substr($str, $pos_espaco, strlen($str));

		return $primeiro_nome;
		//return array('primeiro_nome'=> $primeiro_nome, 'resto_nome' => $resto_nome);
	}
	
	//FUNÇÃO TRATAR DDD
	function tratarDdd($ddd)
	{
		$source = array('(', ')');
		$replace = array('', '');
		$valor = str_replace($source, $replace, $ddd); //remove os pontos e substitui a virgula pelo ponto
		return $valor; //retorna o valor formatado para gravar no banco
	}
	
	//FUNÇÃO TRATAR TELEFONE
	function tratarTelefone($telefone)
	{
		$source = array(' ', '-');
		$replace = array('', '');
		$valor = str_replace($source, $replace, $telefone); //remove os pontos e substitui a virgula pelo ponto
		return $valor; //retorna o valor formatado para gravar no banco
	}
	
	//TRATAR CPF
	function tratarCpf($cpf)
	{
		$source = array('.', '-');
		$replace = array('', '');
		$valor = str_replace($source, $replace, $cpf); //remove os pontos e substitui a virgula pelo ponto
		return $valor; //retorna o valor formatado para gravar no banco
	}
	
	//TRATAR  CPF
	function tratarCep($cep)
	{
		$source = array(' ', '-');
		$replace = array('', '');
		$valor = str_replace($source, $replace, $cep); //remove os pontos e substitui a virgula pelo ponto
		return $valor; //retorna o valor formatado para gravar no banco
	}
	
	//BUSCAR DADOS
	function buscaTextos($texto)
	{
		$source = array('https:/%', '');
	}
	
	//FIM DA FUNÇÃO
}//class
?>