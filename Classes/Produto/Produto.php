<?php
class Produto
{
	//Propriedades
	private $idProduto;
	private $nome;
	private $altura;
    private $largura;
    private $cumprimento;
    private $peso;
    private $codigoInterno;
    private $dataCadastro;
    private $descricaoProduto;
    private $quantidade;
    private $publicoAlvo;
    private $codigoBarras;
    private $fornecedor;
    private $precoCusto;
    private $precoVenda;
    private $comentarioProduto;
        
        //METODO CONSTRUTOR
	public function __construct($idProduto = 0, $nome = "", $altura = 0, $largura = 0, $cumprimento = 0, $peso = 0.00, $codigoInterno = 0, $dataCadastro = "", $descricaoProduto = "", $quantidade = 0, $publicoAlvo = "", $codigoBarras = "", $fornecedor = "", $precoCusto = 0.00, $precoVenda = 0.00, $comentarioProduto = "")
        {
            $this->idProduto = $idProduto;
            $this->nome = $nome;
            $this->altura = $altura;
            $this->largura = $largura;
            $this->cumprimento = $cumprimento;
            $this->peso = $peso;
            $this->codigoInterno = $codigoInterno;
            $this->dataCadastro = $dataCadastro;
            $this->descricaoProduto = $descricaoProduto;
            $this->quantidade = $quantidade;
            $this->publicoAlvo = $publicoAlvo;
            $this->codigoBarras = $codigoBarras;
            $this->fornecedor = $fornecedor;
            $this->precoCusto = $precoCusto;
            $this->precoVenda = $precoVenda;
            $this->comentarioProduto = $comentarioProduto;
        }
        
        //METODOS GET E SET
        public function getIdProduto() {
            return $this->idProduto;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getAltura() {
            return $this->altura;
        }

        public function getLargura() {
            return $this->largura;
        }

        public function getCumprimento() {
            return $this->cumprimento;
        }

        public function getPeso() {
            return $this->peso;
        }

        public function getCodigoInterno() {
            return $this->codigoInterno;
        }

        public function getDataCadastro() {
            return $this->dataCadastro;
        }

        public function getDescricaoProduto() {
            return $this->descricaoProduto;
        }

        public function getQuantidade() {
            return $this->quantidade;
        }

        public function getPublicoAlvo() {
            return $this->publicoAlvo;
        }

        public function getCodigoBarras() {
            return $this->codigoBarras;
        }

        public function getFornecedor() {
            return $this->fornecedor;
        }

        public function getPrecoCusto() {
            return $this->precoCusto;
        }

        public function getPrecoVenda() {
            return $this->precoVenda;
        }

        public function getComentarioProduto() {
            return $this->comentarioProduto;
        }

        public function setIdProduto($idProduto) {
            $this->idProduto = $idProduto;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setAltura($altura) {
            $this->altura = $altura;
        }

        public function setLargura($largura) {
            $this->largura = $largura;
        }

        public function setCumprimento($cumprimento) {
            $this->cumprimento = $cumprimento;
        }

        public function setPeso($peso) {
            $this->peso = $peso;
        }

        public function setCodigoInterno($codigoInterno) {
            $this->codigoInterno = $codigoInterno;
        }

        public function setDataCadastro($dataCadastro) {
            $this->dataCadastro = $dataCadastro;
        }

        public function setDescricaoProduto($descricaoProduto) {
            $this->descricaoProduto = $descricaoProduto;
        }

        public function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }

        public function setPublicoAlvo($publicoAlvo) {
            $this->publicoAlvo = $publicoAlvo;
        }

        public function setCodigoBarras($codigoBarras) {
            $this->codigoBarras = $codigoBarras;
        }

        public function setFornecedor($fornecedor) {
            $this->fornecedor = $fornecedor;
        }

        public function setPrecoCusto($precoCusto) {
            $this->precoCusto = $precoCusto;
        }

        public function setPrecoVenda($precoVenda) {
            $this->precoVenda = $precoVenda;
        }

        public function setComentarioProduto($comentarioProduto) {
            $this->comentarioProduto = $comentarioProduto;
        }
        
        //METODOS
        
        public function cadastrarProduto()
        {
            
        }
        public function AlterarProduto()
        {
            
        }
        public function deletarProduto()
        {
            
        }
        public function buscarProduto()
        {
            
        }

}//class
?>