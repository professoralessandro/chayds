<?php include_once("../../Conexao/Conexao.php") ?>
<?php include_once("Usuario.php") ?>
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
	
}//class
?>