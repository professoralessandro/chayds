<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/Empresa.php"); ?>
<?php include_once("DALUsuario.php"); ?>
<?php
class DALEmpresa extends DALUsuario
{
	//ATRIBUTOS
	private $conexao;
	
	//CONSTRUTOR
	public function __construct($conexao)
	{
        $this->conexao = $conexao;
    }
    //METODOS
	
	//CADASTRAR EMPRESA
	public function cadastrarEmpresa($empresa)
	{
		$sqlComand = "insert into tbEmpresa(nome, cnpj, dataNascimento, dataCadastro, email, nivelAcesso, ddd1, telefone, ddd2, celular, endereco, complemento, bairro, cidade, estado, cep,imagem, senha) values('";
		
		$sqlComand = $sqlComand . $empresa->getNome() . "','";
		$sqlComand = $sqlComand . $empresa->getCpf() . "','";
		$sqlComand = $sqlComand . $empresa->getDataNascimento() . "','";
		$sqlComand = $sqlComand . $empresa->getDataCadastro() . "','";
		$sqlComand = $sqlComand . $empresa->getEmail() . "','";
		$sqlComand = $sqlComand . $empresa->getNivelAcesso() . "','";
		$sqlComand = $sqlComand . $empresa->getDdd1() . "','";
		$sqlComand = $sqlComand . $empresa->getTelefone() . "','";
		$sqlComand = $sqlComand . $empresa->getDdd2() . "','";
		$sqlComand = $sqlComand . $empresa->getCelular() . "','";
		$sqlComand = $sqlComand . $empresa->getEndereco() . "','";
		$sqlComand = $sqlComand . $empresa->getComplemento() . "','";
		$sqlComand = $sqlComand . $empresa->getBairro() . "','";
		$sqlComand = $sqlComand . $empresa->getCidade() . "','";
		$sqlComand = $sqlComand . $empresa->getEstado() . "','";
		$sqlComand = $sqlComand . $empresa->getCep() . "','";
		$sqlComand = $sqlComand . $empresa->getImagem() . "','";
		$sqlComand = $sqlComand . $empresa->getSenha() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
		return "Empresa " .$empresa->getNome(). " cadastrado(a) com sucesso";
	}//CADASTRAR EMPRESA
	
	//ALTERAR EMPRESA
	public function alterarEmpresa($empresa)
	{
		
		$sqlComand = "UPDATE tbEmpresa
		SET nome = '". $empresa->getNome() ."',
		email = '". $empresa->getEmail() ."',
		nivelAcesso = '". $empresa->getNivelAcesso() ."',
		ddd1 = '". $empresa->getDdd1() ."',
		telefone = '". $empresa->getTelefone() ."',
		ddd2 = '". $empresa->getDdd2() ."',
		celular = '". $empresa->getCelular() ."',
		endereco = '". $empresa->getEndereco() ."',
		complemento = '". $empresa->getComplemento() ."',
		bairro = '". $empresa->getBairro() ."',
		cidade = '". $empresa->getCidade() ."',
		estado = '". $empresa->getEstado() ."',
		cep = '". $empresa->getCep() ."',
		imagem = '". $empresa->getImagem() ."',
		senha = '". $empresa->getSenha() ."'
		
		WHERE idEmpresa = '". $empresa->getIdEmpresa() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
		
		return "Empresa ". $empresa->getNome() ." alterado(a) com sucesso";
	}//ALTERAR EMPRESA
	
	//ALTERAR EMPRESA COMPLETO
	public function alterarEmpresaCompleto($empresa)
	{
		
		$sqlComand = "UPDATE tbEmpresa
		SET nome = '". $empresa->getNome() ."',
		cnpj = '". $empresa->getCpf() ."',
		dataNascimento = '". $empresa->getDataNascimento() ."',
		dataCadastro = '". $empresa->getDataCadastro() ."',
		email = '". $empresa->getEmail() ."',
		nivelAcesso = '". $empresa->getNivelAcesso() ."',
		ddd1 = '". $empresa->getDdd1() ."',
		telefone = '". $empresa->getTelefone() ."',
		ddd2 = '". $empresa->getDdd2() ."',
		celular = '". $empresa->getCelular() ."',
		endereco = '". $empresa->getEndereco() ."',
		complemento = '". $empresa->getComplemento() ."',
		bairro = '". $empresa->getBairro() ."',
		cidade = '". $empresa->getCidade() ."',
		estado = '". $empresa->getEstado() ."',
		cep = '". $empresa->getCep() ."',
		imagem = '". $empresa->getImagem() ."',
		senha = '". $empresa->getSenha() ."'
		
		WHERE idEmpresa = '". $empresa->getIdEmpresa() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
		
		return "Empresa ". $empresa->getNome() ." alterado(a) com sucesso";
	}//ALTERAR EMPRESA
	
	//LOCALIZAR EMPRESA
	public function localizarEmpresa($id)
	{
		$sqlComand = "select * from tbEmpresa where idEmpresa = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR EMPRESA
	
	//EXCLUIR EMPRESA
	public function excluirEmpresa($id)
	{
		$sqlComand = "delete from tbEmpresa where idEmpresa = ". $id ;		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//EXCLUIR EMPRESA
	
	//LISTAR EMPRESA
	public function listarEmpresa()
	{
		$sqlComand = " select * from tbEmpresa ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LISTAR EMPRESA
}//CLASS
?>