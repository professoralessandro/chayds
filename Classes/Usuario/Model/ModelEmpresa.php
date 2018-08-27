<?php include_once("../../Conexao/Conexao.php") ?>
<?php include_once("ModelUsuario.php") ?>
<?php
class ModelEmpresa extends ModelUsuario
{
	//PROPRIEDADES
	private $conexao;
	private $idEmpresa;
	private $cnpj;
        
        //CONSTRUTOR
	public function __construct($conexao ="",$idEmpresa = 0, $cnpj ="", $nome ="", $cpf ="", $dataNascimento ="", $dataCadastro ="", $email ="", $nivelAcesso ="", $ddd1 ="", $telefone ="", $ddd2 ="", $celular ="", $endereco ="", $complemento ="", $bairro ="", $cidade ="", $estado ="", $cep ="", $sexo ="", $senha ="")
	{
		$this->conexao = $conexao;
        $this->idEmpresa = $idEmpresa;
        $this->cnpj = $cnpj;
		
		//CLASSE MAE
		parent::__construct($nome , $cpf , $dataNascimento , $dataCadastro , $email , $nivelAcesso, $ddd1, $telefone, $ddd2, $celular, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $sexo, $senha);
    }
        
        //METODOS GET E SET
    public function getIdEmpresa() {
        return $this->idEmpresa;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

        //METODOS
	public function alterarEmpresa()
	{
		
	}//AlterarEmpresa
        
	public function buscarEmpresa()
	{
		
	}//BuscarEmpresa
	
	public function deletarEmpresa()
	{
		
	}//DeletarEmpresa
	
	
	public function cadastrarEmpresa($nome, $cnpj, $dataNascimento, $dataCadastro, $email, $nivelAcesso, $ddd1, $telefone, $ddd2, $celular, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $senha)
	{
		$sqlComand = "insert into tbEmpresa(nome, cnpj, dataNascimento, dataCadastro, email, nivelAcesso, ddd1, telefone, ddd2, celular, endereco, complemento, bairro, cidade, estado, cep, senha) values('";
		
		$sqlComand = $sqlComand . $this->getNome() . "','";
		$sqlComand = $sqlComand . $this->getCnpj() . "','";
		$sqlComand = $sqlComand . $this->getDataNascimento() . "','";
		$sqlComand = $sqlComand . $this->getDataCadastro() . "','";
		$sqlComand = $sqlComand . $this->getEmail() . "','";
		$sqlComand = $sqlComand . $this->getNivelAcesso() . "','";
		$sqlComand = $sqlComand . $this->getDdd1() . "','";
		$sqlComand = $sqlComand . $this->getTelefone() . "','";
		$sqlComand = $sqlComand . $this->getDdd2() . "','";
		$sqlComand = $sqlComand . $this->getCelular() . "','";
		$sqlComand = $sqlComand . $this->getEndereco() . "','";
		$sqlComand = $sqlComand . $this->getComplemento() . "','";
		$sqlComand = $sqlComand . $this->getBairro() . "','";
		$sqlComand = $sqlComand . $this->getCidade() . "','";
		$sqlComand = $sqlComand . $this->getEstado() . "','";
		$sqlComand = $sqlComand . $this->getCep() . "','";
		$sqlComand = $sqlComand . $this->getSenha() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//CADASTRAR EMPRESA
	
	public function alterarUsuario($id ,$nome, $cnpj, $dataNascimento, $dataCadastro, $email, $nivelAcesso, $ddd1, $telefone, $ddd2, $celular, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $senha)
	{
		$sqlComand = "update tbEmpresa set nome = ". $this->getNome() .
		", email = ". $$this->getCnpj() .
		", email = ". $this->getDataNascimento() .
		", email = ". $this->getDataCadastro() .
		", email = ". $this->getEmail() .
		", email = ". $this->getNivelAcesso() .
		", email = ". $this->getDdd1() .
		", email = ". $this->getTelefone() .
		", email = ". $this->getDdd2() .
		", email = ". $this->getCelular() .
		", email = ". $this->getEndereco() .
		", email = ". $this->getComplemento() .
		", email = ". $this->getBairro() .
		", email = ". $this->getCidade() .
		", email = ". $this->getEstado() .
		", email = ". $this->getCep() .
		", email = ". $this->getSenha() .
			
		" where id = ". $this->getIdEmpresa()
		;
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//ALTERAR EMPRESA
	
	public function excluirUsuario($id)
	{
		$sqlComand = "delete from tbEmpresa where id = ". $this->getIdEmpresa() ;		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}
	
	public function localizarUsuario($id)
	{
		$sqlComand = "select * from tbEmpresa where id = ". $this->getIdEmpresa() ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}
	
	public function listarUsuario()
	{
		$sqlComand = " select * from tbEmpresa ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}
	
}//class
?>