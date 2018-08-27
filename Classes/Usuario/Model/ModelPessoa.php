<?php include_once("../../Conexao/Conexao.php") ?>
<?php include_once("ModelUsuario.php") ?>
<?php
class ModelPessoa extends ModelUsuario
{
	//Propriedades
	private $conexao;
	private $idPessoa;
	private $cpf;
	
	//Construtor
	public function __construct($conexao ="",$idPessoa = 0, $cnpj ="", $nome ="", $cpf ="", $dataNascimento ="", $dataCadastro ="", $email ="", $nivelAcesso ="", $ddd1 ="", $telefone ="", $ddd2 ="", $celular ="", $endereco ="", $complemento ="", $bairro ="", $cidade ="", $estado ="", $cep ="", $sexo ="", $senha ="")
	{
		$this->conexao = $conexao;
        $this->idPessoa = $idPessoa;
        $this->cpf = $cpf;
		
		parent::__construct($nome , $cpf , $dataNascimento , $dataCadastro , $email , $nivelAcesso, $ddd1, $telefone, $ddd2, $celular, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $sexo, $senha);
    }

        //METODOS GET E SET
    public function getIdPessoa() {
        return $this->idPessoa;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setIdPessoa($idPessoa) {
        $this->idPessoa = $idPessoa;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
        
        //METODOS
	public function cadastrarPessoa($nome, $cpf, $dataNascimento, $dataCadastro, $email, $nivelAcesso, $ddd1, $telefone, $ddd2, $celular, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $sexo, $senha)
	{
		$sqlComand = "insert into tbEmpresa(nome, cnpj, dataNascimento, dataCadastro, email, nivelAcesso, ddd1, telefone, ddd2, celular, endereco, complemento, bairro, cidade, estado, cep, senha) values('";
		
		$sqlComand = $sqlComand . $this->getNome() . "','";
		$sqlComand = $sqlComand . $this->getCpf() . "','";
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
		$sqlComand = $sqlComand . $this->getSexo() . "','";
		$sqlComand = $sqlComand . $this->getSenha() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//CADASTRAR EMPRESA
	
	public function alterarPessoa()
	{
		
	}//AlterarPessoa
        
	public function buscarPessoa()
	{
		
	}//BuscarPessoa
	
	public function deletarPessoa()
	{
		
	}//DeletarPessoa
	
	public function demitir()
	{
			
	}//demitir
	
	public function suspender()
	{
		
	}//suspender
	
	public function vender()
	{
		
	}//vender
	
	public function atender()
	{
		
	}//atender
	
	public function deletarDados()
	{
			
	}//deletarDados
	
	public function cadastrarDados()
	{
		
	}//cadastrarDados
	
}//class
?>