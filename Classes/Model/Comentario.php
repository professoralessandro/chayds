<?php
class Comentario
{
    //ATRIBUTOS
    private $idComentario;
    private $idPessoa;
    private $idProduto;
    private $isCompra;
    private $nome;
    private $data;
    private $comentario;
    
    //CONSTRUTOR
    public function __construct($idComentario ="", $idPessoa ="", $idProduto ="", $isCompra ="", $nome ="", $data ="", $comentario ="") {
        $this->idComentario = $idComentario;
        $this->idPessoa = $idPessoa;
        $this->idProduto = $idProduto;
        $this->isCompra = $isCompra;
        $this->nome = $nome;
        $this->data = $data;
        $this->comentario = $comentario;
    }
    //CONSTRUTOR
    
    //PROPRIEDADES
    public function getIdComentario() {
        return $this->idComentario;
    }
    
    public function getIdPessoa() {
        return $this->idPessoa;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getIsCompra() {
        return $this->isCompra;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getData() {
        return $this->data;
    }

    public function getComentario() {
        return $this->comentario;
    }
    
    public function setIdComentario($idComentario) {
        $this->idComentario = $idComentario;
    }
        
    public function setIdPessoa($idPessoa) {
        $this->idPessoa = $idPessoa;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function setIsCompra($isCompra) {
        $this->isCompra = $isCompra;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }
    //PROPRIEDADES
}//CLASS
?>