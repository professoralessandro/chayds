<?php include_once("../Conexao/Conexao.php"); ?>
<?php
class DALDepartamento
{
	//ATRIBUTOS
	private $conexao;
	
	//CONSTRUTOR
	public function __construct($conexao)
	{
        $this->conexao = $conexao;
    }
    //METODOS
	
	//CADASTRAR DEPARTAMENTO
	public function cadastrarDepartamento($departamento)
	{
		$sqlComand = "insert into tbDepartamento(nome, gerente, email, emailComercial, ddd, telefone, dataCriacao)   values('";
		
		$sqlComand = $sqlComand . $departamento->getNome() . "','";
		$sqlComand = $sqlComand . $departamento->getGerente() . "','";
		$sqlComand = $sqlComand . $departamento->getEmail() . "','";
		$sqlComand = $sqlComand . $departamento->getEmailComercial() . "','";
		$sqlComand = $sqlComand . $departamento->getDdd() . "','";
		$sqlComand = $sqlComand . $departamento->getTelefone() . "','";
		$sqlComand = $sqlComand . $departamento->getDataCriacao() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//CADASTRAR DEPARTAMENTO
	
	//ALTERAR EMPRESA
	public function alterarDepartamento($departamento)
	{
		
		$sqlComand = "UPDATE tbDepartamento
		SET gerente = '". $departamento->getGerente() ."',
		email = '". $departamento->getEmail() ."',
		emailComercial = '". $departamento->getEmailComercial() ."',
		ddd = '". $departamento->getDdd() ."',
		telefone = '". $departamento->getTelefone() ."'
		
		WHERE idDepartamento = '". $departamento->getIdDepartamento() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
		
		return "Departamento ". $departamento->getNome() ." alterado(a) com sucesso";
	}//ALTERAR EMPRESA
	
	//ALTERAR EMPRESA
	public function alterarDepartamentoCompleto($departamento)
	{
		
		$sqlComand = "UPDATE tbDepartamento
		SET nome = '". $departamento->getNome() ."',
		gerente = '". $departamento->getGerente() ."',
		email = '". $departamento->getEmail() ."',
		emailComercial = '". $departamento->getEmailComercial() ."',
		ddd = '". $departamento->getDdd() ."',
		telefone = '". $departamento->getTelefone() ."'
		
		WHERE idDepartamento = '". $departamento->getIdDepartamento() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
		
		return "Departamento ". $departamento->getNome() ." alterado(a) com sucesso";
	}//ALTERAR EMPRESA
	
	//LOCALIZAR EMPRESA
	public function localizarDepartamento($id)
	{
		$sqlComand = "select * from tbDepartamento where idDepartamento = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR EMPRESA
	
	//LOCALIZAR DEPARTAMENTO AVANÇADO
	public function localizarDepartamentoAvancado($data1, $data2, $nome, $email, $gerente)
	{
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($email) && $email != null && isset($gerente) && $gerente != null)
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%' and email = '". $email ."' and gerente like '%".$gerente."%' ";
		}
		else if(isset($nome) && $nome != null)
		{
			$sqlComand = "select * from tbDepartamento where nome like '%".$nome."%'";
		}
		else if(isset($email) && $email != null)
		{
			$sqlComand = "select * from tbDepartamento where email = '". $email ."'";
		}
		else if(isset($gerente) && $gerente != null)
		{
			$sqlComand = "select * from tbDepartamento where gerente like '%".$gerente."%'";
		}
		else if(isset($data1) && $data1 != null)
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."')";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2)
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."')";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'";
		}
		else if(isset($data1) && $data1 != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and email = '".$email."'";
		}
		else if(isset($data1) && $data1 != null && isset($gerente) && $gerente != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and gerente like '%".$gerente."%'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and email = '".$email."'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($gerente) && $gerente != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and gerente like '%".$gerente."%'";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'  and email = '".$email."' ";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null && isset($gerente) && $gerente != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'  and gerente like '%".$gerente."%' ";
		}
		else if(isset($data1) && $data1 != null && isset($email) && $email != null && isset($gerente) && $gerente != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and email = '".$email."'  and gerente like '%".$gerente."%' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'  and email = '".$email."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($gerente) && $gerente != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'  and gerente like '%".$gerente."%' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($email) && $email != null && isset($gerente) && $gerente != null )
		{
			$sqlComand = "select * from tbDepartamento where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and email = '".$email."'  and gerente like '%".$gerente."%' ";
		}
		else if(isset($email) && $email != null && isset($gerente) && $gerente != null )
		{
			$sqlComand = "select * from tbDepartamento where email = '".$email."'  and gerente like '%".$gerente."%' ";
		}
		else if(isset($nome) && $nome != null && isset($gerente) && $gerente != null )
		{
			$sqlComand = "select * from tbDepartamento where nome like '%".$nome."%'  and gerente like '%".$gerente."%' ";
		}
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR DEPARTAMENTO AVANÇADO
	
	//EXCLUIR EMPRESA
	public function excluirDepartamento($id)
	{
		$sqlComand = "delete from tbDepartamento where idDepartamento = ". $id ;		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//EXCLUIR EMPRESA
	
	//LISTAR EMPRESA
	public function listarDepartamento()
	{
		$sqlComand = " select * from tbDepartamento ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LISTAR EMPRESA
}//CLASS
?>