<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/Funcionario.php"); ?>
<?php include_once("DALUsuario.php"); ?>
<?php
class DALFuncionario extends DALUsuario
{
	//ATRIBUTOS
	private $conexao;
	
	//CONSTRUTOR
	public function __construct($conexao)
	{
        $this->conexao = $conexao;
    }
	
    //METODOS
	
	//CADASTRAR FUNCIONARIO
	public function cadastrarFuncionario($funcionario)
	{
		$sqlComand = "insert into tbFuncionario(nome, cpf, dataNascimento, dataCadastro, email, nivelAcesso, ddd1, telefone, ddd2, celular, endereco, complemento, bairro, cidade, estado, cep, sexo, senha, dataContratacao, comentContratacao, dataDemissao, comentDemissao, Escolaridade, expProfissional, cargo, gerenteResp,rg, departamento, historico, imagem) values('";
		
		$sqlComand = $sqlComand . $funcionario->getNome() . "','";
		$sqlComand = $sqlComand . $funcionario->getCpf() . "','";
		$sqlComand = $sqlComand . $funcionario->getDataNascimento() . "','";
		$sqlComand = $sqlComand . $funcionario->getDataCadastro() . "','";
		$sqlComand = $sqlComand . $funcionario->getEmail() . "','";
		$sqlComand = $sqlComand . $funcionario->getNivelAcesso() . "','";
		$sqlComand = $sqlComand . $funcionario->getDdd1() . "','";
		$sqlComand = $sqlComand . $funcionario->getTelefone() . "','";
		$sqlComand = $sqlComand . $funcionario->getDdd2() . "','";
		$sqlComand = $sqlComand . $funcionario->getCelular() . "','";
		$sqlComand = $sqlComand . $funcionario->getEndereco() . "','";
		$sqlComand = $sqlComand . $funcionario->getComplemento() . "','";
		$sqlComand = $sqlComand . $funcionario->getBairro() . "','";
		$sqlComand = $sqlComand . $funcionario->getCidade() . "','";
		$sqlComand = $sqlComand . $funcionario->getEstado() . "','";
		$sqlComand = $sqlComand . $funcionario->getCep() . "','";
		$sqlComand = $sqlComand . $funcionario->getSexo() . "','";
		$sqlComand = $sqlComand . $funcionario->getSenha() . "','";
		$sqlComand = $sqlComand . $funcionario->getDataContratacao() . "','";
		$sqlComand = $sqlComand . $funcionario->getComentContrat() . "','";
		$sqlComand = $sqlComand . $funcionario->getDataDemissao() . "','";
		$sqlComand = $sqlComand . $funcionario->getComentDemissao() . "','";
		$sqlComand = $sqlComand . $funcionario->getEscolaridade() . "','";
		$sqlComand = $sqlComand . $funcionario->getExpProfissional() . "','";
		$sqlComand = $sqlComand . $funcionario->getCargo() . "','";
		$sqlComand = $sqlComand . $funcionario->getGerenteResp() . "','";
		$sqlComand = $sqlComand . $funcionario->getRg() . "','";
		$sqlComand = $sqlComand . $funcionario->getDepartamento() . "','";
		$sqlComand = $sqlComand . $funcionario->getHistorico() . "','";
		$sqlComand = $sqlComand . $funcionario->getImagem() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//CADASTRAR FUNCIONARIO
	
	//ALTERAR FUNCIONARIO
	public function alterarFuncionario($funcionario)
	{
		$sqlComand = "UPDATE tbFuncionario
		SET email = '". $funcionario->getEmail() ."',
		nivelAcesso = '". $funcionario->getNivelAcesso() ."',
		ddd1 = '". $funcionario->getDdd1() ."',
		telefone = '". $funcionario->getTelefone() ."',
		ddd2 = '". $funcionario->getDdd2() ."',
		celular = '". $funcionario->getCelular() ."',
		endereco = '". $funcionario->getEndereco() ."',
		complemento = '". $funcionario->getComplemento() ."',
		bairro = '". $funcionario->getBairro() ."',
		cidade = '". $funcionario->getCidade() ."',
		estado = '". $funcionario->getEstado() ."',
		cep = '". $funcionario->getCep() ."',
		sexo = '". $funcionario->getSexo() ."',
		senha = '". $funcionario->getSenha() ."',
		comentContratacao = '". $funcionario->getComentContrat() ."',
		dataDemissao = '". $funcionario->getDataDemissao() ."',
		comentDemissao = '". $funcionario->getComentDemissao() ."',
		Escolaridade = '". $funcionario->getEscolaridade() ."',
		expProfissional = '". $funcionario->getExpProfissional() ."',
		cargo = '". $funcionario->getCargo() ."',
		gerenteResp = '". $funcionario->getGerenteResp() ."',
		departamento = '". $funcionario->getDepartamento() ."',
		historico = '". $funcionario->getHistorico() ."',
		imagem = '". $funcionario->getImagem() ."'
		
		WHERE idFuncionario = '". $funcionario->getIdFuncionario() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
		
		return "Funcionário(a) ". $funcionario->getNome() ." alterado(a) com sucesso";
	}//ALTERAR FUNCIONARIO
	
	//ALTERAR FUNCIONARIO COMPLETO
	public function alterarFuncionarioCompleto($funcionario)
	{
		$sqlComand = "UPDATE tbFuncionario
		SET nome = '". $funcionario->getNome() ."',
		cpf = '". $funcionario->getCpf() ."',
		rg = '". $funcionario->getRg() ."',
		dataNascimento = '". $funcionario->getDataNascimento() ."',
		dataCadastro = '". $funcionario->getDataCadastro() ."',
		email = '". $funcionario->getEmail() ."',
		nivelAcesso = '". $funcionario->getNivelAcesso() ."',
		ddd1 = '". $funcionario->getDdd1() ."',
		telefone = '". $funcionario->getTelefone() ."',
		ddd2 = '". $funcionario->getDdd2() ."',
		celular = '". $funcionario->getCelular() ."',
		endereco = '". $funcionario->getEndereco() ."',
		complemento = '". $funcionario->getComplemento() ."',
		bairro = '". $funcionario->getBairro() ."',
		cidade = '". $funcionario->getCidade() ."',
		estado = '". $funcionario->getEstado() ."',
		cep = '". $funcionario->getCep() ."',
		sexo = '". $funcionario->getSexo() ."',
		senha = '". $funcionario->getSenha() ."',
		
		dataContratacao = '". $funcionario->getDataContratacao() ."',
		comentContratacao = '". $funcionario->getComentContrat() ."',
		dataDemissao = '". $funcionario->getDataDemissao() ."',
		comentDemissao = '". $funcionario->getComentDemissao() ."',
		Escolaridade = '". $funcionario->getEscolaridade() ."',
		expProfissional = '". $funcionario->getExpProfissional() ."',
		cargo = '". $funcionario->getCargo() ."',
		gerenteResp = '". $funcionario->getGerenteResp() ."',
		departamento = '". $funcionario->getDepartamento() ."',
		historico = '". $funcionario->getHistorico() ."',
		imagem = '". $funcionario->getImagem() ."'
		
		WHERE idFuncionario = '". $funcionario->getIdFuncionario() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
		
		return "Funcionário(a) ". $funcionario->getNome() ." alterado(a) com sucesso";
	}//ALTERAR FUNCIONARIO COMPLETO
        
	//LOCALIZAR FUNCIONARIO
	public function localizarFuncionario($id)
	{
		$sqlComand = "select * from tbFuncionario where idFuncionario = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR FUNCIONARIO
	
	//LOCALIZAR FUNCIONARIO AVANÇADO
	public function localizarFuncionarioAvancado($data1, $data2, $nome, $email, $nivelAcesso)
	{
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($email) && $email != null && isset($nivelAcesso) && $nivelAcesso != null)
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%' and email = '". $email ."' and nivelAcesso = '". $nivelAcesso ."' ";
		}
		else if(isset($nome) && $nome != null)
		{
			$sqlComand = "select * from tbFuncionario where nome like '%".$nome."%'";
		}
		else if(isset($email) && $email != null)
		{
			$sqlComand = "select * from tbFuncionario where email = '". $email ."'";
		}
		else if(isset($nivelAcesso) && $nivelAcesso != null)
		{
			$sqlComand = "select * from tbFuncionario where nivelAcesso = '". $nivelAcesso ."'";
		}
		else if(isset($data1) && $data1 != null)
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."')";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2)
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."')";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'";
		}
		else if(isset($data1) && $data1 != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and email = '".$email."'";
		}
		else if(isset($data1) && $data1 != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nivelAcesso = '".$nivelAcesso."'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and email = '".$email."'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nivelAcesso = '".$nivelAcesso."'";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'  and email = '".$email."' ";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		else if(isset($data1) && $data1 != null && isset($email) && $email != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and email = '".$email."'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'  and email = '".$email."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($email) && $email != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbFuncionario where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and email = '".$email."'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		else if(isset($email) && $email != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbFuncionario where email = '".$email."'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		else if(isset($nome) && $nome != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbFuncionario where nome like '%".$nome."%'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR FUNCIONARIO AVANÇADO
	
	//EXCLUIR FUNCIONARIO
	public function excluirFuncionario($id)
	{
		$sqlComand = "delete from tbFuncionario where idFuncionario = ". $id ;		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//EXCLUIR FUNCIONARIO
	
	//LISTAR FUNCIONARIOS
	public function listarFuncionario()
	{
		$sqlComand = " select * from tbFuncionario ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LISTAR FUNCIONARIOS
	
	public function demitir($pessoa)
	{
			
	}//demitir
	
	public function suspender($pessoa)
	{
		
	}//suspender
}//CLASS
?>