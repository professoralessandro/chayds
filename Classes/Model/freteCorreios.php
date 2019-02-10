<?php
namespace Chayds
{
	class FreteCorreios
	{
		//ATRIBUTOS
		private $altura; //Altura do produto (VALOR EM INTEIRO, VALOR EM CM)
		private $largura; //Largura do produto (VALOR EM INTEIRO, VALOR EM CM)
		private $comprimento; //Comprimento da encomenda (VALOR EM INTEIRO, VALOR EM CM)
		private $diametro; //Caixa nao possui diametro. VL = 0 (VALOR EM INTEIRO, VALOR EM CM)
		private $peso; //Peso do produto (VALOR EM FLOAT, VALOR EM KG)
		private $tempoDiasUteis; //Tempo de entrega
		private $valorDeclarado; //Valor declarado da encomenda (VALOR EM FLOAT)
		private $valorFrete; //VALOR DO FRETE
		private $valorFreteSemSeguro; //VALOR DO FRETE SEM SEGURO
		private $cepOrigem; //Cep de origem do produto (SOMENTE VALORES NUMERICOS SEM TRAÇOS)
		private $cepDestino; //Cep de destino (SOMENTE VALORES NUMERICOS SEM TRAÇOS)
		private $numeroCodigoEmpresa; //Numero de cadastro da empresa nos correios
		private $senhaCodigoEmpresa; //Senha da empresa
		private $formato; //Formato da Emcomenda, 1 = Caixa
		private $entregaMaos; //Serviço de entrega nas maos do destinatario, N = NAO
		private $avisoRecebimento; //AVISO DE RECEBIMENTO
		private $tipoFrete; //Tipo de frete	
		//FIM ATRIBUTOS

		//CONSTRUTOR
		public function __construct($altura='', $largura='', $comprimento='', $peso='', $valorDeclarado='', $cepOrigem='', $cepDestino='', $numeroCodigoEmpresa='', $senhaCodigoEmpresa='', $entregaMaos='', $avisoRecebimento='', $tipoFrete='')
		{		
			$this->altura = $altura;
			$this->largura = $largura;
			$this->comprimento = $comprimento;
			$this->diametro = '0';
			$this->peso = $peso;
			$this->valorDeclarado = $valorDeclarado;
			$this->cepOrigem = $cepOrigem;
			$this->cepDestino = $cepDestino;
			$this->numeroCodigoEmpresa = $numeroCodigoEmpresa;
			$this->senhaCodigoEmpresa = $senhaCodigoEmpresa;
			$this->formato ='1';
			$this->entregaMaos = $entregaMaos;
			$this->avisoRecebimento = $avisoRecebimento;
			$this->tipoFrete = $tipoFrete;
		}
		//FIM CONSTRUTOR

		//PROPRIEDADES

		//GET ALTURA
		public function getAltura()
		{
			return $this->altura;
		}//GET ALTURA

		//SET ALTURA
		public function setAltura($altura)
		{
			$this->altura =  $altura;
		}//SET ALTURA

		//GET ALTURA
		public function getLargura()
		{
			return $this->largura;
		}//GET ALTURA

		//SET ALTURA
		public function setLargura($largura)
		{
			$this->largura =  $largura;
		}//SET ALTURA

		//GET Comprimento
		public function getComprimento()
		{
			return $this->comprimento;
		}//GET Comprimento

		//SET Comprimento
		public function setComprimento($comprimento)
		{
			$this->comprimento = $comprimento;
		}//SET Comprimento

		//GET PESO
		public function getPeso()
		{
			return $this->peso;
		}//GET PESO

		//SET PESO
		public function setPeso($peso)
		{
			$this->peso = $peso;
		}//SET PESO

		//GET TEMPO DIAS UTEIS
		public function getTempoDiasUteis()
		{
			return $this->tempoDiasUteis;
		}//GET TEMPO DIAS UTEIS

		//SET TEMPO DIAS UTEIS
		public function setTempoDiasUteis($tempoDiasUteis)
		{
			$this->tempoDiasUteis = $tempoDiasUteis;
		}//SET TEMPO DIAS UTEIS

		//GET VALOR FRETE
		public function getValorFrete()
		{
			return $this->valorFrete;
		}//GET VALOR FRETE

		//SET VALOR FRETE
		public function setValorFrete($valorFrete)
		{
			$this->valorFrete = $valorFrete;
		}//SET VALOR FRETE

		//GET VALOR FRETE SEM SEGURO
		public function getValorFreteSemSeguro()
		{
			return $this->valorFreteSemSeguro;
		}//GET VALOR FRETE SEM SEGURO

		//SET VALOR FRETE SEM SEGURO
		public function setValorFreteSemSeguro($valorFreteSemSeguro)
		{
			$this->valorFreteSemSeguro = $valorFreteSemSeguro;
		}//SET VALOR FRETE SEM SEGURO

		//GET CEP ORIGEM
		public function getCepOrigem()
		{
			return $this->cepOrigem;
		}//GET CEP ORIGEM

		//SET CEP ORIGEM
		public function setCepOrigem($cepOrigem)
		{
			$this->cepOrigem = $cepOrigem;
		}//SET CEP ORIGEM

		//GET CEP DESTINO
		public function getCepDestino()
		{
			return $this->cepDestino;
		}//GET CEP DESTINO

		//SET CEP DESTINO
		public function setCepDestino($cepDestino)
		{
			$this->cepDestino = $cepDestino;
		}//SET CEP DESTINO

		//GET DIAMETRO
		public function getDiametro()
		{
			return $this->diametro;
		}//GET DIAMETRO

		//SET DIAMETRO
		public function setDiametro($diametro)
		{
			$this->diametro = $diametro;
		}//SET DIAMETRO

		//GET CODIGO EMPRESA
		public function getNumeroCodigoEmpresa()
		{
			return $this->numeroCodigoEmpresa;
		}//GET CODIGO EMPRESA

		//SET CODIGO EMPRESA
		public function setNumeroCodigoEmpresa($numeroCodigoEmpresa)
		{
			$this->numeroCodigoEmpresa = $numeroCodigoEmpresa;
		}//SET CODIGO EMPRESA

		//GET SENHA EMPRESA
		public function getSenhaCodigoEmpresa()
		{
			return $this->senhaCodigoEmpresa;
		}//GET SENHA EMPRESA

		//SET SENHA EMPRESA
		public function setSenhaCodigoEmpresa($senhaCodigoEmpresa)
		{
			$this->senhaCodigoEmpresa = $senhaCodigoEmpresa;
		}//SET SENHA EMPRESA

		//GET FORMATO
		public function getFormato()
		{
			return $this->formato;
		}//GET FORMATO

		//SET FORMATO
		public function setFormato($formato)
		{
			$this->formato =  $formato;
		}//SET FORMATO

		//GET ENTREGA EM MAOS
		public function getEntregaMaos()
		{
			return $this->entregaMaos;
		}//GET ENTREGA EM MAOS

		//SET ENTREGA EM MAOS
		public function setEntregaMaos($entregaMaos)
		{
			$this->entregaMaos =  $entregaMaos;
		}//SET ENTREGA EM MAOS

		//GET AVISO RECEBIMENTO
		public function getAvisoRecebimento()
		{
			return $this->avisoRecebimento;
		}//GET AVISO RECEBIMENTO

		//SET AVISO RECEBIMENTO
		public function setAvisoRecebimento($avisoRecebimento)
		{
			$this->avisoRecebimento =  $avisoRecebimento;
		}//SET AVISO RECEBIMENTO

		//GET VALOR DECLARADO
		public function getValorDeclarado()
		{
			return $this->valorDeclarado;
		}//GET VALOR DECLARADO

		//SET VALOR DECLARADO
		public function setValorDeclarado($valorDeclarado)
		{
			$this->valorDeclarado =  $valorDeclarado;
		}//SET VALOR DECLARADO

		//GET TIPO FRETE
		public function getTipoFrete()
		{
			return $this->tipoFrete;
		}//GET TIPO FRETE

		//SET TIPO FRETE
		public function setTipoFrete($tipoFrete)
		{
			$this->tipoFrete =  $tipoFrete;
		}//SET TIPO FRETE

		//FIM PROPRIEDADES
	}//CLASS
}//NAMESPACE

?>