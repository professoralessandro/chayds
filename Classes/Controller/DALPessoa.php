<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/Pessoa.php"); ?>
<?php include_once("../Model/Usuario.php"); ?>
<?php include_once("DALUsuario.php"); ?>
<?php
class DALPessoa extends DALUsuario
{
	//ATRIBUTOS
	private $conexao;
	
	//CONSTRUTOR
	public function __construct($conexao)
	{
        $this->conexao = $conexao;
    }
    //METODOS
	
	public function cadastrarPessoa($pessoa)
	{
		
		$sqlComand = "insert into tbPessoa(nome, cpf, dataNascimento, dataCadastro, email, nivelAcesso, ddd1, telefone, ddd2, celular, endereco, complemento, bairro, cidade, estado, cep, sexo, senha, imagem) values('";
		$sqlComand = $sqlComand . $pessoa->getNome() . "','";
		$sqlComand = $sqlComand . $pessoa->getCpf() . "','";
		$sqlComand = $sqlComand . $pessoa->getDataNascimento() . "','";
		$sqlComand = $sqlComand . $pessoa->getDataCadastro() . "','";
		$sqlComand = $sqlComand . $pessoa->getEmail() . "','";
		$sqlComand = $sqlComand . $pessoa->getNivelAcesso() . "','";
		$sqlComand = $sqlComand . $pessoa->getDdd1() . "','";
		$sqlComand = $sqlComand . $pessoa->getTelefone() . "','";
		$sqlComand = $sqlComand . $pessoa->getDdd2() . "','";
		$sqlComand = $sqlComand . $pessoa->getCelular() . "','";
		$sqlComand = $sqlComand . $pessoa->getEndereco() . "','";
		$sqlComand = $sqlComand . $pessoa->getComplemento() . "','";
		$sqlComand = $sqlComand . $pessoa->getBairro() . "','";
		$sqlComand = $sqlComand . $pessoa->getCidade() . "','";
		$sqlComand = $sqlComand . $pessoa->getEstado() . "','";
		$sqlComand = $sqlComand . $pessoa->getCep() . "','";
		$sqlComand = $sqlComand . $pessoa->getSexo() . "','";
		$sqlComand = $sqlComand . $pessoa->getSenha() . "','";
		$sqlComand = $sqlComand . $pessoa->getImagem() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
		
		return true;
	}//CADASTRAR EMPRESA
	
	//ALTERAR PESSOA
	public function alterarPessoa($pessoa)
	{
		$sqlComand = "UPDATE tbPessoa
		SET nome = '". $pessoa->getNome() ."',
		nivelAcesso = '". $pessoa->getNivelAcesso() ."',
		ddd1 = '". $pessoa->getDdd1() ."',
		telefone = '". $pessoa->getTelefone() ."',
		ddd2 = '". $pessoa->getDdd2() ."',
		celular = '". $pessoa->getCelular() ."',
		endereco = '". $pessoa->getEndereco() ."',
		complemento = '". $pessoa->getComplemento() ."',
		bairro = '". $pessoa->getBairro() ."',
		cidade = '". $pessoa->getCidade() ."',
		estado = '". $pessoa->getEstado() ."',
		cep = '". $pessoa->getCep() ."',
		sexo = '". $pessoa->getSexo() ."',
		imagem = '". $pessoa->getImagem() ."',
		senha = '". $pessoa->getSenha() ."'
		
		WHERE idPessoa = '". $pessoa->getIdPessoa() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
		
	}//ALTERAR PESSOA
	
	//ALTERAR PESSOA COMPRA
	public function alterarPessoaCompra($pessoa)
	{
		$sqlComand = "UPDATE tbPessoa
		SET nome = '". $pessoa->getNome() ."',
		ddd1 = '". $pessoa->getDdd1() ."',
		telefone = '". $pessoa->getTelefone() ."',
		ddd2 = '". $pessoa->getDdd2() ."',
		celular = '". $pessoa->getCelular() ."',
		endereco = '". $pessoa->getEndereco() ."',
		complemento = '". $pessoa->getComplemento() ."',
		bairro = '". $pessoa->getBairro() ."',
		cidade = '". $pessoa->getCidade() ."',
		estado = '". $pessoa->getEstado() ."',
		cep = '". $pessoa->getCep() ."',
		sexo = '". $pessoa->getSexo() ."',
		imagem = '". $pessoa->getImagem() ."',
		senha = '". $pessoa->getSenha() ."'
		
		WHERE idPessoa = '". $pessoa->getIdPessoa() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
		
	}//ALTERAR PESSOA COMPRA
	
	//ALTERAR PESSOA COMPLETO
	public function alterarPessoaCompleto($pessoa)
	{
		
		$sqlComand = "UPDATE tbPessoa
		SET nome = '". $pessoa->getNome() ."',
		cpf = '". $pessoa->getCpf() ."',
		dataNascimento = '". $pessoa->getDataNascimento() ."',
		dataCadastro = '". $pessoa->getDataCadastro() ."',
		email = '". $pessoa->getEmail() ."',
		nivelAcesso = '". $pessoa->getNivelAcesso() ."',
		ddd1 = '". $pessoa->getDdd1() ."',
		telefone = '". $pessoa->getTelefone() ."',
		ddd2 = '". $pessoa->getDdd2() ."',
		celular = '". $pessoa->getCelular() ."',
		endereco = '". $pessoa->getEndereco() ."',
		complemento = '". $pessoa->getComplemento() ."',
		bairro = '". $pessoa->getBairro() ."',
		cidade = '". $pessoa->getCidade() ."',
		estado = '". $pessoa->getEstado() ."',
		cep = '". $pessoa->getCep() ."',
		sexo = '". $pessoa->getSexo() ."',
		senha = '". $pessoa->getSenha() ."'
		
		WHERE idPessoa = '". $pessoa->getIdPessoa() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
		
		return "Usuário(a) ". $pessoa->getNome() ." alterado(a) com sucesso";
		
	}//ALTERAR PESSOA COMPLETO
        
	public function localizarPessoa($id)
	{
		$sqlComand = "select * from tbPessoa where idPessoa = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//BuscarPessoa
	
	//LOCALIZAR PESSOA AVANÇADO
	public function localizarPessoaAvancado($data1, $data2, $nome, $email, $nivelAcesso)
	{
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($email) && $email != null && isset($nivelAcesso) && $nivelAcesso != null)
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%' and email = '". $email ."' and nivelAcesso = '". $nivelAcesso ."' ";
		}
		else if(isset($nome) && $nome != null)
		{
			$sqlComand = "select * from tbPessoa where nome like '%".$nome."%'";
		}
		else if(isset($email) && $email != null)
		{
			$sqlComand = "select * from tbPessoa where email = '". $email ."'";
		}
		else if(isset($nivelAcesso) && $nivelAcesso != null)
		{
			$sqlComand = "select * from tbPessoa where nivelAcesso = '". $nivelAcesso ."'";
		}
		else if(isset($data1) && $data1 != null)
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."')";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2)
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."')";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'";
		}
		else if(isset($data1) && $data1 != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and email = '".$email."'";
		}
		else if(isset($data1) && $data1 != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nivelAcesso = '".$nivelAcesso."'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and email = '".$email."'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nivelAcesso = '".$nivelAcesso."'";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'  and email = '".$email."' ";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		else if(isset($data1) && $data1 != null && isset($email) && $email != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and email = '".$email."'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'  and email = '".$email."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($email) && $email != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbPessoa where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and email = '".$email."'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		else if(isset($email) && $email != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbPessoa where email = '".$email."'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		else if(isset($nome) && $nome != null && isset($nivelAcesso) && $nivelAcesso != null )
		{
			$sqlComand = "select * from tbPessoa where nome like '%".$nome."%'  and nivelAcesso = '".$nivelAcesso."' ";
		}
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//BUSCA AVANÇADA PESSOA
	
	public function excluirPessoa($id)
	{
		$sqlComand = "delete from tbPessoa where idPessoa = ". $id ;		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//DeletarPessoa
	
	public function listarPessoa()
	{
		$sqlComand = " select * from tbPessoa ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}
	
	public function demitir($pessoa)
	{
			
	}//demitir
	
	public function suspender($pessoa)
	{
		
	}//suspender
	
	//LOGAR
	public function logar($pessoa)
	{
		session_start();
		$sqlComand = "SELECT * FROM `tbPessoa` WHERE email = '$pessoa->getEmail()' && senha_usu = '$pessoa->getSenha()' LIMIT 1";
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		$resultado = mysqli_fetch_assoc($retorno);
		
		if(empty($resultado))
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../index.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao logar. Por favor verifique login e senha, tente novamente.\");
			</script>";
		}
		elseif(isset($resultado))
		{
			$_SESSION['usuarioId'] = $resultado['idPessoa'];
			$_SESSION['usuarioNome'] = $resultado['nome'];
			$_SESSION['usuarioCPF'] = $resultado['cpf'];
			$_SESSION['usuarioTel'] = $resultado['telefone'];
			$_SESSION['usuarioTelDDD'] = $resultado['ddd1'];
			$_SESSION['usuarioAcessoNiveis'] = $resultado['nivelAcesso'];
			$_SESSION['usuarioNasci'] = $resultado['dataNascimento'];
			$_SESSION['usuarioEmail'] = $resultado['email'];
			$_SESSION['usuarioSenha'] = $resultado['senha'];
			$_SESSION['usuarioEnd'] = $resultado['endereco'];
			$_SESSION['usuarioCompl'] = $resultado['complemento'];
			$_SESSION['usuarioBairro'] = $resultado['bairro'];
			$_SESSION['usuarioCid'] = $resultado['cidade'];
			$_SESSION['usuarioEstado'] = $resultado['estado'];
			$_SESSION['usuarioCep'] = $resultado['cep'];
		
		
			header("Location: ../../indexTeste.php");
		}
		
		$this->conexao->Desconectar();
	}//FIM LOGAR
	public function deslogar()
	{
		unset(
			$_SESSION['usuarioId'],
			$_SESSION['usuarioNome'],
			$_SESSION['usuarioCPF'],
			$_SESSION['usuarioTel'],
			$_SESSION['usuarioTelDDD'],
			$_SESSION['usuarioAcessoNiveis'],
			$_SESSION['usuarioNasci'],
			$_SESSION['usuarioEmail'],
			$_SESSION['usuarioSenha'],
			$_SESSION['usuarioEnd'],
			$_SESSION['usuarioCompl'],
			$_SESSION['usuarioBairro'],
			$_SESSION['usuarioCid'],
			$_SESSION['usuarioEstado'],
			$_SESSION['usuarioCep']
		);
	}//FIM DESLOGAR
}//CLASS
?>