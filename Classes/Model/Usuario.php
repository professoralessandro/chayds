<?php
namespace Chayds
{
	class Usuario
	{
		//ATRIBUTOS
		private $nome;
		private $cpf;
		private $rg;
		private $dataNascimento;
		private $dataCadastro;
		private $email;
		private $senha;
		private $nivelAcesso;
		private $ddd1;
		private $telefone;
		private $ddd2;
		private $celular;
		private $endereco;
		private $complemento;
		private $bairro;
		private $cidade;
		private $estado;
		private $cep;
		private $sexo;
		private $imagem;
		//ATRIBUTOS

		//CONSTRUTORES
		public function __construct($nome = "", $cpf = "",$rg = "", $dataNascimento = "", $dataCadastro = "", $email = "", $nivelAcesso = "", $ddd1 = "", $telefone = "", $ddd2 = "", $celular = "", $endereco = "", $complemento = "", $bairro = "", $cidade = "", $estado = "", $cep = "", $sexo= "", $senha= "", $imagem ="")
		{
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->rg = $rg;
			$this->dataNascimento = $dataNascimento;
			$this->dataCadastro = $dataCadastro;
			$this->email = $email;
			$this->senha = $senha;
			$this->nivelAcesso = $nivelAcesso;
			$this->ddd1 = $ddd1;
			$this->telefone = $telefone;
			$this->ddd2 = $ddd2;
			$this->celular = $celular;
			$this->endereco = $endereco;
			$this->complemento = $complemento;
			$this->bairro = $bairro;
			$this->cidade = $cidade;
			$this->estado = $estado;
			$this->cep = $cep;
			$this->sexo = $sexo;
			$this->imagem = $imagem;
		}//CONSTRUTORES

		//PROPRIEDADES
		public function setNome($valor)
		{
			$this->nome = $valor;
		}
		public function getNome()
		{
			return $this->nome ;
		}
		public function setCpf($valor)
		{
			$this->cpf = $valor;
		}
		public function getCpf()
		{
			return $this->cpf ;
		}
		public function setRg($valor)
		{
			$this->rg = $valor;
		}
		public function getRg()
		{
			return $this->rg ;
		}
		public function setDataNascimento($valor)
		{
			$this->dataNascimento = $valor;
		}
		public function getDataNascimento()
		{
			return $this->dataNascimento ;
		}
		public function setDataCadastro($valor)
		{
			$this->dataCadastro = $valor;
		}
		public function getDataCadastro()
		{
			return $this->dataCadastro ;
		}
		public function setEmail($valor)
		{
			$this->email = $valor;
		}
		public function getEmail()
		{
			return $this->email ;
		}
		public function setSenha($valor)
		{
			$this->senha = $valor;
		}
		public function getSenha()
		{
			return $this->senha ;
		}
		public function setNivelAcesso($valor)
		{
			$this->nivelAcesso = $valor;
		}
		public function getNivelAcesso()
		{
			return $this->nivelAcesso ;
		}
		public function setDdd1($valor)
		{
			$this->ddd1 = $valor;
		}
		public function getDdd1()
		{
			return $this->ddd1 ;
		}
		public function setTelefone($valor)
		{
			$this->telefone = $valor;
		}
		public function getTelefone()
		{
			return $this->telefone ;
		}
		public function setDdd2($valor)
		{
			$this->ddd2 = $valor;
		}
		public function getDdd2()
		{
			return $this->ddd2 ;
		}
		public function setCelular($valor)
		{
			$this->celular = $valor;
		}
		public function getCelular()
		{
			return $this->celular ;
		}
		public function setEndereco($valor)
		{
			$this->endereco = $valor;
		}
		public function getEndereco()
		{
			return $this->endereco ;
		}
		public function setComplemento($valor)
		{
			$this->complemento = $valor;
		}
		public function getComplemento()
		{
			return $this->complemento ;
		}
		public function setBairro($valor)
		{
			$this->bairro = $valor;
		}
		public function getBairro()
		{
			return $this->bairro ;
		}
		public function setCidade($valor)
		{
			$this->cidade = $valor;
		}
		public function getCidade()
		{
			return $this->cidade ;
		}
		public function setEstado($valor)
		{
			$this->estado = $valor;
		}
		public function getEstado()
		{
			return $this->estado ;
		}
		public function setCep($valor)
		{
			$this->cep = $valor;
		}
		public function getCep()
		{
			return $this->cep ;
		}
		public function setSexo($valor)
		{
			$this->sexo = $valor;
		}
		public function getSexo()
		{
			return $this->sexo;
		}
		public function setImagem($valor)
		{
			$this->imagem = $valor;
		}
		public function getImagem()
		{
			return $this->imagem;
		}
		//PROPRIEDADES
	}//CLASS
}//NAMESPACE

?>