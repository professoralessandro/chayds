<?php
class Compra
{
	//Propriedades
	private $idCompra;
	private $nomeComprador;
	private $nomeProduto;
	private $emailComprador;
	private $QuantidadeProduto;
	private $dataCompra;
	private $valorFrete;
	private $valorTotal;
	private $cpfComprador;
	private $comentarioCompra;
	private $statusCompra;
	private $tipoFrete;
	private $codigoRastreio;
	
        //CONSTRUTOR
        public function __construct($idCompra = 0, $nomeComprador ="", $nomeProduto ="", $emailComprador ="", $QuantidadeProduto =0, $dataCompra ="", $valorFrete =0, $valorTotal =0, $cpfComprador ="", $comentarioCompra ="", $statusCompra =0, $tipoFrete ="", $codigoRastreio ="")
        {
            $this->idCompra = $idCompra;
            $this->nomeComprador = $nomeComprador;
            $this->nomeProduto = $nomeProduto;
            $this->emailComprador = $emailComprador;
            $this->QuantidadeProduto = $QuantidadeProduto;
            $this->dataCompra = $dataCompra;
            $this->valorFrete = $valorFrete;
            $this->valorTotal = $valorTotal;
            $this->cpfComprador = $cpfComprador;
            $this->comentarioCompra = $comentarioCompra;
            $this->statusCompra = $statusCompra;
            $this->tipoFrete = $tipoFrete;
            $this->codigoRastreio = $codigoRastreio;
        }
        
        //METODOS GET E SET
        public function getIdCompra() {
            return $this->idCompra;
        }

        public function getNomeComprador() {
            return $this->nomeComprador;
        }

        public function getNomeProduto() {
            return $this->nomeProduto;
        }

        public function getEmailComprador() {
            return $this->emailComprador;
        }

        public function getQuantidadeProduto() {
            return $this->QuantidadeProduto;
        }

        public function getDataCompra() {
            return $this->dataCompra;
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

        public function getComentarioCompra() {
            return $this->comentarioCompra;
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

        public function setIdCompra($idCompra) {
            $this->idCompra = $idCompra;
        }

        public function setNomeComprador($nomeComprador) {
            $this->nomeComprador = $nomeComprador;
        }

        public function setNomeProduto($nomeProduto) {
            $this->nomeProduto = $nomeProduto;
        }

        public function setEmailComprador($emailComprador) {
            $this->emailComprador = $emailComprador;
        }

        public function setQuantidadeProduto($QuantidadeProduto) {
            $this->QuantidadeProduto = $QuantidadeProduto;
        }

        public function setDataCompra($dataCompra) {
            $this->dataCompra = $dataCompra;
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

        public function setComentarioCompra($comentarioCompra) {
            $this->comentarioCompra = $comentarioCompra;
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

        //METODOS
        public function cadastrarCompra()
        {
            
        }//cadastrarProduto
        public function AlterarCompra()
        {
            
        }//AlterarProduto
        public function deletarCompra()
        {
            
        }//deletarProduto
        public function buscarCompra()
        {
            
        }//buscarProduto

}//class
?>