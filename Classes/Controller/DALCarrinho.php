<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/Carrinho.php"); ?>
<?php
class DALCarrinho
{
	//Propriedades
	private $conexao;
	
	//Construtor
	public function __construct($conexao)
    {
        $this->conexao = $conexao;
		//$this->conexao = new Conexao();
    }
	
	//METODOS
	
	//INSERIR CARRINHO COMPLETO
	public function inserirCarrinho($carrinho)
	{
		
		$sqlComand = "insert into tbCarrinho(idCarrinho, QuantidadeProdutoCarrinho, dataCompraCarrinho, valorTotalCarrinho, statusCarrinho, tipoFreteCarrinho, valorFreteCarrinho, codigoRastreio, comentarioCompraCarrinho, pesoCarrinho, imagemCarrinho, videoCarrinho) values('";
		
		$sqlComand = $sqlComand . $carrinho->getIdCarrinho() . "','";
		$sqlComand = $sqlComand . $carrinho->getQuantidadeProduto() . "','";
		$sqlComand = $sqlComand . $carrinho->getDataCompra() . "','";
		$sqlComand = $sqlComand . $carrinho->getValorTotal() . "','";
		$sqlComand = $sqlComand . $carrinho->getStatusCompra() . "','";
		$sqlComand = $sqlComand . $carrinho->getTipoFrete() . "','";
		$sqlComand = $sqlComand . $carrinho->getValorFrete() . "','";
		$sqlComand = $sqlComand . $carrinho->getCodigoRastreio() . "','";
		$sqlComand = $sqlComand . $carrinho->getComentarioCompra() . "','";
		$sqlComand = $sqlComand . $carrinho->getPeso() . "','";
		$sqlComand = $sqlComand . $carrinho->getImagem() . "','";
		$sqlComand = $sqlComand . $carrinho->getVideo() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		//$this->conexao->Desconectar();
	}//INSERIR CARRINHO COMPLETO
	
	//INSERIR CARRINHO PAGSEGURO
	public function comprarCarrinhoPagSeguro($carrinho)
	{
		//$carrinho = new Carrinho();
		$sqlComand = "insert into tbCarrinho(idCarrinho, QuantidadeProdutoCarrinho, dataCompraCarrinho, valorTotalCarrinho, statusCarrinho, tipoFreteCarrinho, valorFreteCarrinho, alturaCarrinho, larguraCarrinho, comprimentoCarrinho, pesoCarrinho) values('";
		
		$sqlComand = $sqlComand . $carrinho->getIdCarrinho() . "','";
		$sqlComand = $sqlComand . $carrinho->getQuantidade() . "','";
		$sqlComand = $sqlComand . $carrinho->getData() . "','";
		$sqlComand = $sqlComand . $carrinho->getValorTotal() . "','";
		$sqlComand = $sqlComand . $carrinho->getStatusCompra() . "','";
		$sqlComand = $sqlComand . $carrinho->getTipoFrete() . "','";
		$sqlComand = $sqlComand . $carrinho->getValorFrete() . "','";
		$sqlComand = $sqlComand . $carrinho->getAltura() . "','";
		$sqlComand = $sqlComand . $carrinho->getLargura() . "','";
		$sqlComand = $sqlComand . $carrinho->getComprimento() . "','";
		$sqlComand = $sqlComand . $carrinho->getPeso() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		//$this->conexao->Desconectar();
	}//INSERIR CARRINHO COMPLETO
	
	public function alterarLog($log)
	{
		$sqlComand = "update tbLog set nome = ". $usuario->getNome() .
		", email = ". $usuario->getDataHora() .
		", email = ". $usuario->getAcao() .
		" senha = ". $usuario->getComentLog() .
		" where id = ". $usuario->getIdLog()
		;
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		//$this->conexao->Desconectar();
	}
	
	public function excluirCarrinho($id)
	{
		$sqlComand = "delete from tbCarrinho where idCarrinho = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//EXCLUIR COMPRA
	
	public function localizarLog($idLog)
	{
		$sqlComand = "select * from tbLog where id = ". $idLog ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		//$this->conexao->Desconectar();
	}
	
	public function listarLog()
	{
		$sqlComand = " select * from tbLog ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		//$this->conexao->Desconectar();
	}
	
}//class
?>