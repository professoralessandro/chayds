<?php include_once("Produto.php"); ?>
<?php include_once("Compra.php"); ?>
<?php
class Carrinho extends Compra
{
    //ATRIBUTOS
    private $idCarrinho;
    //ATRIBUTOS
    
    //CONSTRUTOR
    public function __construct($idCarrinho ='', $QuantidadeProdutoCarrinho ='', $dataCompraCarrinho ='', $valorTotalCarrinho ='', $statusCarrinho ='', $tipoFreteCarrinho='',$valorFreteCarrinho, $alturaCarrinho ='', $larguraCarrinho ='', $comprimentoCarrinho ='', $pesoCarrinho ='', $codigoRastreioCarrinho ='', $comentarioCompraCarrinho ='', $imagemCarrinho ='', $videoCarrinho ='')
	{		
		parent::__construct('', '', '', '', '', $QuantidadeProdutoCarrinho, $dataCompraCarrinho, $valorFreteCarrinho, '', $valorTotalCarrinho, '', $statusCarrinho, $tipoFreteCarrinho, '', $codigoRastreioCarrinho, '', $imagemCarrinho, $alturaCarrinho, $larguraCarrinho, $comprimentoCarrinho, $pesoCarrinho, '', $videoCarrinho);
		
        $this->idCarrinho = $idCarrinho;
    }
    //CONSTRUTOR
    
    //PROPRIEDADES
    public function getIdCarrinho() {
        return $this->idCarrinho;
    }

    public function setIdCarrinho($idCarrinho) {
        $this->idCarrinho = $idCarrinho;
    }
    //PROPRIEDADES
}//CLASS
?>