<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/Compra.php"); ?>
<?php include_once("../Model/Pessoa.php"); ?>
<?php include_once("../Model/Usuario.php"); ?>
<?php include_once("DALProduto.php"); ?>
<?php include_once("DALPessoa.php"); ?>
<?php
class DALCompra extends DALProduto
{
	//ATRIBUTOS
	private $conexao;
	
	//CONSTRUTOR
	public function __construct($conexao)
	{
        $this->conexao = $conexao;
    }
	
    //METODOS
	
	//CADASTRAR COMPRA
	public function cadastrarCompra($compra)
	{
		$sqlComand = "insert into tbCompra(idComprador, nomeComprador, emailComprador, quantidadeProduto, dataCompra, valorFrete, precoVenda, valorTotal, cpfComprador, comentarioCompra, statusCompra, tipoFrete, nomeCompra, codigoRastreio) values('";
		
		$sqlComand = $sqlComand . $compra->getIdComprador() . "','";
		$sqlComand = $sqlComand . $compra->getNomeComprador() . "','";
		$sqlComand = $sqlComand . $compra->getEmailComprador() . "','";
		$sqlComand = $sqlComand . $compra->getQuantidade() . "','";
		$sqlComand = $sqlComand . $compra->getData() . "','";
		$sqlComand = $sqlComand . $compra->getValorFrete() . "','";
		$sqlComand = $sqlComand . $compra->getPreco() . "','";
		$sqlComand = $sqlComand . $compra->getValorTotal() . "','";
		$sqlComand = $sqlComand . $compra->getCpfComprador() . "','";
		$sqlComand = $sqlComand . $compra->getComentario() . "','";
		$sqlComand = $sqlComand . $compra->getStatusCompra() . "','";
		$sqlComand = $sqlComand . $compra->getTipoFrete() . "','";
		$sqlComand = $sqlComand . $compra->getNome() . "','";
		$sqlComand = $sqlComand . $compra->getCodigoRastreio() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//CADASTRAR PRODUTOS
	
	//CADASTRAR COMPRA NOVO
	public function comprarAgora($compra)
	{
		//quantidade, data, preco, comentario
		
		$sqlComand = "insert into tbCompra(idComprador, nomeComprador, emailComprador, quantidadeProduto, dataCompra, valorFrete, precoVenda, valorTotal, cpfComprador, statusCompra, tipoFrete,imagemCompra, nomeCompra, totalAltura, totalLargura, totalComprimento, 	totalPeso) values('";
		
		
		$sqlComand = $sqlComand . $compra->getIdComprador() . "','";
		$sqlComand = $sqlComand . $compra->getNomeComprador() . "','";
		$sqlComand = $sqlComand . $compra->getEmailComprador() . "','";
		$sqlComand = $sqlComand . $compra->getQuantidade() . "','";
		$sqlComand = $sqlComand . $compra->getData() . "','";
		$sqlComand = $sqlComand . $compra->getValorFrete() . "','";
		$sqlComand = $sqlComand . $compra->getPreco() . "','";
		$sqlComand = $sqlComand . $compra->getValorTotal() . "','";
		$sqlComand = $sqlComand . $compra->getCpfComprador() . "','";
		$sqlComand = $sqlComand . $compra->getStatusCompra() . "','";
		$sqlComand = $sqlComand . $compra->getTipoFrete() . "','";
		$sqlComand = $sqlComand . $compra->getImagem() . "','";
		$sqlComand = $sqlComand . $compra->getNome() . "','";
		$sqlComand = $sqlComand . $compra->getAltura() . "','";
		$sqlComand = $sqlComand . $compra->getLargura() . "','";
		$sqlComand = $sqlComand . $compra->getComprimento() . "','";
		$sqlComand = $sqlComand . $compra->getPeso() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//CADASTRAR PRODUTOS NOVO
	
	//ALTERAR COMPRA
	public function alterarCompra($compra)
	{
		$sqlComand = "UPDATE tbCompra
		SET idComprador = '". $compra->getidComprador() ."',
		nomeComprador = '". $compra->getNomeComprador() ."',
		emailComprador = '". $compra->getEmailComprador() ."',
		quantidadeProduto = '". $compra->getQuantidade() ."',
		dataCompra = '". $compra->getData() ."',
		valorFrete = '". $compra->getValorFrete() ."',
		precoVenda = '". $compra->getPreco() ."',
		valorTotal = '". $compra->getValorTotal() ."',
		cpfComprador = '". $compra->getCpfComprador() ."',
		comentarioCompra = '". $compra->getComentario() ."',
		statusCompra = '". $compra->getStatusCompra() ."',
		tipoFrete = '". $compra->getTipoFrete() ."',
		codigoRastreio = '". $compra->getCodigoRastreio() ."'
		
		WHERE idCompra = '". $compra->getIdCompra() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//ALTERAR COMPRA
	
	//ALTERAR COMPRA CARRINHO PAG SEGURO
	public function alterarCompraCarrinhoPagSeguro($compra)
	{
		$resultado = $this->listarCompraUsuario($compra);
		
		while($dados = mysqli_fetch_array($resultado))
		{
			$comprinha = new Compra($dados['idCompra']);
			
			$sqlComand = "UPDATE tbCompra
			SET statusCompra = '21',
			tipoFrete = '". $compra->getTipoFrete() ."',
			valorFrete = '". $compra->getValorFrete() ."',
			idCarrinho = '". $compra->getIdCarrinhoCompra() ."'
		
			WHERE idCompra = '". $comprinha->getIdCompra() ."'
			";
		
			$banco = $this->conexao->GetBanco();
			$result = $banco->query($sqlComand);
		}
		
		$this->conexao->Desconectar();
		//AINDA NAO TEM O TRATAMENTO DO EMAIL, ELE ESTÁ EM FASE DE TESTE
	}//ALTERAR COMPRA CARRINHO PAG SEGURO
	
	/*
	FUNCAO ANTIGA
	
	//ALTERAR COMPRA PAG SEGURO
	public function alterarCompraPagSeguro($compra, $usuario)
	{
		if($compra->getTipoFrete() == 'S')
		{
			$tpFrete = 'SEDEX';
		}
		else if($compra->getTipoFrete() == 'P')
		{
			$tpFrete = 'PAC';
		}
		else
		{
			$tpFrete = 'Retirar em Mãos';
		}
		
		$emailDestinatario = $usuario->getEmail();
		$assunto = 'Compra processada Chayds';
		
		$resultado = $this->listarCompraUsuario($compra);
		
		//STRING PARA O ENVIO DE MENSAGEM
		$mensagem ="Parabéns, você acaba de fazer o pedido de um produto maravilhoso
Gostaríamos de ajudá-lo a dar continuidade ao seu pedido, informando-o
Que seu pedido está sendo processado. Quando o pague seguro liberar o pagamento
Postaremos o produto em até dois dias úteis.
";
		//STRING PARA O ENVIO DE MENSAGEM

		while($dados = mysqli_fetch_array($resultado))
		{
			$comprinha = new Compra($dados['idCompra']);
			//TRATAMENTO MENSAGEM
			$mensagem += "Produto: ".$dados['nomeCompra']." Quantidade: ".$dados['quantidadeProduto']." Valor Unitário: R$ ".$dados['precoVenda']." Soma dos Valores: R$ ". $dados['valorTotal']. "";
			//TRATAMENTO MENSAGEM
			
			//SQLCOMANDO
			$sqlComand = "UPDATE tbCompra
			SET statusCompra = '21',
			tipoFrete = '". $compra->getTipoFrete() ."',
			valorFrete = '". $compra->getValorFrete() ."'
		
			WHERE idCompra = '". $comprinha->getIdCompra() ."'
			";
		
			$banco = $this->conexao->GetBanco();
			$result = $banco->query($sqlComand);
		}//WHILE PRODUTOS
		
		//MENSAGEM
		$mensagem+="
		Tipo de Frete: ".$tpFrete."
		Valor Frete: R$ ".$compra->getValorFrete() ."
		
		Status compra: Aguardando pagamento.
		
		Telefone(".$usuario->getDdd1().")".$usuario->getTelefone()."
		Endereco: ".$usuario->getEndereco()." Complement: ".$usuario->getComplemento()."
		Bairro: ".$usuario->getBairro()."
		Cidade: ".$usuario->getCidade()."
		Estado: ".$usuario->getEstado()."
		CEP: ".$usuario->getCep()."
		
		Atenciosamente Chayds Vitamins, Suapplements and Minerals
		";
		
		mail($emailDestinatario, $assunto, $mensagem);
		mail('professor_alessandro@hotmail.com', $assunto, $mensagem);
		//MENSAGEM
		
		$this->conexao->Desconectar();
	}//ALTERAR COMPRA PAG SEGURO
	FUNCAO ANTIGA
	*/
	
	//ALTERAR COMPRA PAG SEGURO
	public function alterarCompraPagSeguro($compra, $usuario)
	{
		$resultado = $this->listarCompraUsuario($compra);

		while($dados = mysqli_fetch_array($resultado))
		{
			$comprinha = new Compra($dados['idCompra']);
			//TRATAMENTO MENSAGEM
			
			//SQLCOMANDO
			$sqlComand = "UPDATE tbCompra
			SET statusCompra = '20',
			valorTotal = '". $compra->getValorTotal() ."',
			tipoFrete = '". $compra->getTipoFrete() ."',
			valorFrete = '". $compra->getValorFrete() ."'
		
			WHERE idCompra = '". $comprinha->getIdCompra() ."'
			";
		
			$banco = $this->conexao->GetBanco();
			$result = $banco->query($sqlComand);
		}//WHILE PRODUTOS
		
		$this->conexao->Desconectar();
	}//ALTERAR COMPRA PAG SEGURO
	
	//ALTERAR COMPRA QUANTIDADE
	public function alterarCompraQuantidade($compra)
	{
		$sqlComand = "UPDATE tbCompra
		SET quantidadeProduto = '". $compra->getQuantidade() ."',
		valorTotal = '". $compra->getValorTotal() ."',
		
		totalAltura = '". $compra->getAltura() ."',
		totalLargura = '". $compra->getLargura() ."',
		totalComprimento = '". $compra->getComprimento() ."',
		totalPeso = '". $compra->getPeso() ."'
		
		WHERE idCompra = '". $compra->getIdCompra() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//ALTERAR COMPRA QUANTIDADE
        
	//LOCALIZAR COMPRA
	public function localizarCompra($id)
	{
		$sqlComand = "select * from tbCompra where idCompra = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR COMPRA
	
	//EXCLUIR COMPRA
	public function excluirCompra($id)
	{
		$sqlComand = "delete from tbCompra where idCompra = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//EXCLUIR PRODUTO
	
	//LISTAR  COMPRA
	public function listarCompra()
	{
		$sqlComand = " select * from tbCompra ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LISTAR COMPRA
	
	public function listarCompraUsuario($compra)
	{
		//$compra = new Compra();
		$sqlComand = "select * from tbCompra where idComprador = ". $compra->getIdComprador() ." and statusCompra = ". $compra->getStatusCompra() ." and cpfComprador = ". $compra->getCpfComprador() ." and emailComprador = '". $compra->getEmailComprador()."'" ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR COMPRA
	
	public function listarCarrinho($compra)
	{
		$sqlComand = "select * from tbCompra where idComprador = ". $compra->getIdComprador() ." and statusCompra = ". $compra->getStatusCompra() ." and cpfComprador = ". $compra->getCpfComprador() ." and emailComprador = '". $compra->getEmailComprador()."'" ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR COMPRA
	
	//CONTADORCARRINHO
	public function contadorCompraCarrinho($compra)
	{
		$sqlComand = "select idComprador, quantidadeProduto from tbCompra where idComprador = ". $compra->getIdComprador() ." and statusCompra = ". $compra->getStatusCompra() ." and cpfComprador = ". $compra->getCpfComprador() ." and emailComprador = '". $compra->getEmailComprador()."'" ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//CONTADORCARRINHO
	
	//CALCULAR FRETE
	public function calcularPrecoQuantidade($valor, $quantidade)
	{
		$valorTotal = $valor * $quantidade;
		return $valorTotal;
	}//CALCULAR FRETE
}//CLASS
?>