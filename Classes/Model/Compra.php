<?php include_once("Produto.php"); ?>
<?php
namespace Chayds
{
	class Compra extends Produto
	{
		//ATRIBUTOS
		private $idCompra;
		private $idComprador;
		private $nomeComprador;
		private $emailComprador;
		private $valorFrete;
		private $valorTotal;
		private $cpfComprador;
		private $statusCompra;
		private $tipoFrete;
		private $codigoRastreio;
		private $idCarrinhoCompra;

		//CONSTRUTOR
		public function __construct($idCompra="", $idComprador="", $idProduto="", $nomeComprador= "", $emailComprador= "", $quantidadeProduto="", $dataCompra ="", $valorFrete="", $precoVenda="", $valorTotal="", $cpfComprador= "", $statusCompra="", $tipoFrete= "",$nomeProduto ="", $codigoRastreio="", $idCarrinhoCompra="", $imagem= "",$alturaCompra = 0, $larguraCompra = 0, $comprimentoCompra="", $pesoCompra="", $comentarioCompra ="", $video= "")
		{
			parent::__construct($idProduto, $nomeProduto, $dataCompra, $quantidadeProduto, $precoVenda, $alturaCompra, $larguraCompra, $comprimentoCompra, $pesoCompra, $imagem);

			$this->idCompra = $idCompra;
			$this->idComprador = $idComprador;
			$this->nomeComprador = $nomeComprador;
			$this->emailComprador = $emailComprador;
			$this->valorFrete = $valorFrete;
			$this->valorTotal = $valorTotal;
			$this->cpfComprador = $cpfComprador;
			$this->statusCompra = $statusCompra;
			$this->tipoFrete = $tipoFrete;
			$this->codigoRastreio = $codigoRastreio;
			$this->idCarrinhoCompra = $idCarrinhoCompra;
		}
		//CONSTRUTOR

		//PROPRIEDADES
		public function getIdCompra() {
			return $this->idCompra;
		}

		public function getIdComprador() {
			return $this->idComprador;
		}

		public function getNomeComprador() {
			return $this->nomeComprador;
		}

		public function getEmailComprador() {
			return $this->emailComprador;
		}

		public function getValorFrete() {
			return $this->valorFrete;
		}

		public function getValorTotal() {
			return $this->valorTotal;
		}

		public function getCpfComprador() {
			return $this->cpfComprador;
		}

		public function getStatusCompra() {
			return $this->statusCompra;
		}

		public function getTipoFrete() {
			return $this->tipoFrete;
		}

		public function getCodigoRastreio() {
			return $this->codigoRastreio;
		}


		public function getIdCarrinhoCompra() {
			return $this->idCarrinhoCompra;
		}

		public function setIdCarrinhoCompra($idCarrinhoCompra) {
			$this->idCarrinhoCompra = $idCarrinhoCompra;
		}

		public function setIdCompra($idCompra) {
			$this->idCompra = $idCompra;
		}

		public function setIdComprador($idComprador) {
			$this->idComprador = $idComprador;
		}

		public function setNomeComprador($nomeComprador) {
			$this->nomeComprador = $nomeComprador;
		}

		public function setEmailComprador($emailComprador) {
			$this->emailComprador = $emailComprador;
		}

		public function setValorFrete($valorFrete) {
			$this->valorFrete = $valorFrete;
		}

		public function setValorTotal($valorTotal) {
			$this->valorTotal = $valorTotal;
		}

		public function setCpfComprador($cpfComprador) {
			$this->cpfComprador = $cpfComprador;
		}

		public function setStatusCompra($statusCompra) {
			$this->statusCompra = $statusCompra;
		}

		public function setTipoFrete($tipoFrete) {
			$this->tipoFrete = $tipoFrete;
		}

		public function setCodigoRastreio($codigoRastreio) {
			$this->codigoRastreio = $codigoRastreio;
		}
		//PROPRIEDADES
	}//CLASS
}//NAMESPACE
?>