<?php
class Produto
{
    //ATRIBUTOS
    private $idProduto;
    private $nome;
    private $data;
    private $quantidade;
    private $preco;
    private $altura;
    private $largura;
    private $comprimento;
    private $peso;
    private $comentario;
    private $imagem;
    private $imagem2;
    private $imagem3;
    private $video;
    private $descricao;
    private $quantidadeMinima;
    private $codigoBarras;
    private $fornecedor;
    private $precoCusto;
    private $precoDesconto;
    private $publicoAlvo;
    private $titulo1;
    private $titulo2;
    private $titulo3;
    private $titulo4;
    private $descricao1;
    private $descricao2;
    private $descricao3;
    private $descricao4;
    private $quantidadeVendaProduto;
    private $pontosProduto;
        
    //CONSTRUTOR
    public function __construct($idProduto= 0, $nome= "", $data="", $quantidade= 0, $precoVenda= 0, $altura= 0, $largura= 0, $comprimento= 0, $peso= 0, $imagem= "", $video= "", $comentario= "", $descricao= "", $quantidadeMinima= 0, $codigoBarras= "", $fornecedor= "", $precoCusto= 0, $precoDesconto= 0, $publicoAlvo= "", $titulo1= "", $titulo2= "", $titulo3= "", $titulo4= "", $descricao1 ="", $descricao2 ="", $descricao3 ="", $descricao4 ="", $imagem2 ="", $imagem3 ="", $quantidadeVendaProduto ="", $pontosPrduto ="")
    {
        $this->idProduto = $idProduto;
        $this->nome = $nome;
        $this->data = $data;
        $this->quantidade = $quantidade;
        $this->preco = $precoVenda;
        $this->altura = $altura;
        $this->largura = $largura;
        $this->comprimento = $comprimento;
        $this->peso = $peso;
        $this->comentario = $comentario;
        $this->imagem = $imagem;
        $this->video = $video;
        $this->descricao = $descricao;
        $this->quantidadeMinima = $quantidadeMinima;
        $this->codigoBarras = $codigoBarras;
        $this->fornecedor = $fornecedor;
        $this->precoCusto = $precoCusto;
        $this->precoDesconto = $precoDesconto;
        $this->publicoAlvo = $publicoAlvo;
		$this->titulo1 = $titulo1;
		$this->titulo2 = $titulo2;
		$this->titulo3 = $titulo3;
		$this->titulo4 = $titulo4;
		$this->descricao1 = $descricao1;
		$this->descricao2 = $descricao2;
		$this->descricao3 = $descricao3;
		$this->descricao4 = $descricao4;
		$this->imagem2 = $imagem2;
		$this->imagem3 = $imagem3;
        $this->quantidadeVendaProduto = $quantidadeVendaProduto;
        $this->pontosProduto = $pontosPrduto;
    }
    
    //PROPRIEDADES
    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getData() {
        return $this->data;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getLargura() {
        return $this->largura;
    }

    public function getComprimento() {
        return $this->comprimento;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getImagem2() {
        return $this->imagem2;
    }

    public function getImagem3() {
        return $this->imagem3;
    }

    public function getVideo() {
        return $this->video;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getQuantidadeMinima() {
        return $this->quantidadeMinima;
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

    public function getPrecoDesconto() {
        return $this->precoDesconto;
    }

    public function getPublicoAlvo() {
        return $this->publicoAlvo;
    }

    public function getTitulo1() {
        return $this->titulo1;
    }

    public function getTitulo2() {
        return $this->titulo2;
    }

    public function getTitulo3() {
        return $this->titulo3;
    }

    public function getTitulo4() {
        return $this->titulo4;
    }

    public function getDescricao1() {
        return $this->descricao1;
    }

    public function getDescricao2() {
        return $this->descricao2;
    }

    public function getDescricao3() {
        return $this->descricao3;
    }

    public function getDescricao4() {
        return $this->descricao4;
    }

    public function getQuantidadeVendaProduto() {
        return $this->quantidadeVendaProduto;
    }

    public function getPontosProduto() {
        return $this->pontosProduto;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function setLargura($largura) {
        $this->largura = $largura;
    }

    public function setComprimento($comprimento) {
        $this->comprimento = $comprimento;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function setImagem2($imagem2) {
        $this->imagem2 = $imagem2;
    }

    public function setImagem3($imagem3) {
        $this->imagem3 = $imagem3;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setQuantidadeMinima($quantidadeMinima) {
        $this->quantidadeMinima = $quantidadeMinima;
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

    public function setPrecoDesconto($precoDesconto) {
        $this->precoDesconto = $precoDesconto;
    }

    public function setPublicoAlvo($publicoAlvo) {
        $this->publicoAlvo = $publicoAlvo;
    }

    public function setTitulo1($titulo1) {
        $this->titulo1 = $titulo1;
    }

    public function setTitulo2($titulo2) {
        $this->titulo2 = $titulo2;
    }

    public function setTitulo3($titulo3) {
        $this->titulo3 = $titulo3;
    }

    public function setTitulo4($titulo4) {
        $this->titulo4 = $titulo4;
    }

    public function setDescricao1($descricao1) {
        $this->descricao1 = $descricao1;
    }

    public function setDescricao2($descricao2) {
        $this->descricao2 = $descricao2;
    }

    public function setDescricao3($descricao3) {
        $this->descricao3 = $descricao3;
    }

    public function setDescricao4($descricao4) {
        $this->descricao4 = $descricao4;
    }

    public function setQuantidadeVendaProduto($quantidadeVendaProduto) {
        $this->quantidadeVendaProduto = $quantidadeVendaProduto;
    }

    public function setPontosProduto($pontosProduto) {
        $this->pontosProduto = $pontosProduto;
    }

    //PROPRIEDADES
}//CLASS
?>