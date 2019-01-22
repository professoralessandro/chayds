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
		$sqlComand = "insert into tbCompra(idComprador, idProdutoCompra, nomeComprador, emailComprador, quantidadeProduto, dataCompra, valorFrete, precoVenda, valorTotal, cpfComprador, comentarioCompra, statusCompra, tipoFrete, nomeCompra, codigoRastreio) values('";
		
		$sqlComand = $sqlComand . $compra->getIdComprador() . "','";
		$sqlComand = $sqlComand . $compra->getIdProduto() . "','";
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
		
		$sqlComand = "insert into tbCompra(idComprador, idProdutoCompra, nomeComprador, emailComprador, quantidadeProduto, dataCompra, valorFrete, precoVenda, valorTotal, cpfComprador, statusCompra, tipoFrete,imagemCompra, nomeCompra, totalAltura, totalLargura, totalComprimento, 	totalPeso) values('";
		
		
		$sqlComand = $sqlComand . $compra->getIdComprador() . "','";
		$sqlComand = $sqlComand . $compra->getIdProduto() . "','";
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
			valorTotal = '". $compra->getValorTotal() ."',
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
	
	//ALTERAR CODIGO DE RASTREIO
	public function alterarCompraCodigoRasreio($compra)
	{
		$sqlComand = "UPDATE tbCompra
		SET codigoRastreio = '". $compra->getCodigoRastreio() ."'
		
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
	
	//LOCALIZAR COMPRA AVANÇADO
	public function localizarCompraAvancado($data1, $data2, $preco1, $preco2,  $nomeCompra, $nomeCliente,$tipoFrete, $email, $idCompra, $statusCompra)
	{
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($idCompra) && $idCompra != null && isset($preco1) && $preco1 != null && isset($tipoFrete) && $tipoFrete != null && isset($nomeCliente) && $nomeCliente != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and idCompra '".$idCompra."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and tipoFrete = '".$tipoFrete."' and nomeComprador like '%".$nomeCliente."%' ";
		}
		
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($idCompra) && $idCompra != null && isset($preco1) && $preco1 != null && isset($nomeCliente) && $nomeCliente != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and idCompra '".$idCompra."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and nomeComprador like '%".$nomeCliente."%' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($idCompra) && $idCompra != null && isset($preco1) && $preco1 != null && isset($tipoFrete) && $tipoFrete != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and idCompra '".$idCompra."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and tipoFrete = '".$tipoFrete."' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($idCompra) && $idCompra != null && isset($preco1) && $preco1 != null && isset($tipoFrete) && $tipoFrete != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and idCompra '".$idCompra."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and tipoFrete = '".$tipoFrete."' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($idCompra) && $idCompra != null && isset($nomeCliente) && $nomeCliente != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and idCompra '".$idCompra."' and nomeComprador like '%".$nomeCliente."%' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($idCompra) && $idCompra != null && isset($tipoFrete) && $tipoFrete != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and idCompra '".$idCompra."' and tipoFrete '".$tipoFrete."' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($idCompra) && $idCompra != null && isset($preco1) && $preco1 != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and idCompra '".$idCompra."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($tipoFrete) && $tipoFrete != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and tipoFrete '".$tipoFrete."' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($nomeCliente) && $nomeCliente != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and nomeComprador like '%".$nomeCliente."%' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($preco1) && $preco1 != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null && isset($idCompra) && $idCompra != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' and idCompra '".$idCompra."' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and statusCompra = '". $statusCompra ."' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($idCompra) && $idCompra != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and idCompra = '". $idCompra ."' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($tipoFrete) && $tipoFrete != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and tipoFrete = '". $tipoFrete ."' ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($preco1) && $preco1 != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') ";
		}
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null && isset($tipoFrete) && $nomeCliente != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%' and emailComprador = '". $email ."' and nomeComprador like '%".$nomeCliente."%' ";
		}
		else if(isset($nomeCliente) && $nomeCliente != null)
		{
			$sqlComand = "select * from tbCompra where nomeComprador like '%".$nomeCliente."%'";
		}
		else if(isset($preco1) && $preco1 != null)
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."')";
		}
		else if(isset($data1) && $data1 != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $preco2 ."')";
		}
		else if(isset($nomeCompra) && $nomeCompra != null)
		{
			$sqlComand = "select * from tbCompra where nomeCompra like '%".$nomeCompra."%'";
		}
		else if(isset($nomeCliente) && $nomeCliente != null)
		{
			$sqlComand = "select * from tbCompra where nomeComprador like '%".$nomeCliente."%'";
		}
		else if(isset($statusCompra) && $statusCompra != null)
		{
			$sqlComand = "select * from tbCompra where statusCompra = '".$statusCompra."'";
		}
		else if(isset($idCompra) && $idCompra != null)
		{
			$sqlComand = "select * from tbCompra where idCompra = '".$idCompra."'";
		}
		else if(isset($tipoFrete) && $tipoFrete != null)
		{
			$sqlComand = "select * from tbCompra where tipoFrete = '".$tipoFrete."'";
		}
		else if(isset($email) && $email != null)
		{
			$sqlComand = "select * from tbCompra where emailComprador = '". $email ."'";
		}
		else if(isset($statusCompra) && $statusCompra != null)
		{
			$sqlComand = "select * from tbCompra where statusCompra = '". $statusCompra ."'";
		}
		else if(isset($data1) && $data1 != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."')";
		}
		else if(isset($data1) && $data1 != null && isset($nomeCompra) && $nomeCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nomeCompra like '%".$nomeCompra."%'";
		}
		else if(isset($data1) && $data1 != null && isset($nomeCliente) && $nomeCliente != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nomeComprador like '%".$nomeCliente."%'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."')";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCliente) && $nomeCliente != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeComprador like '%".$nomeCliente."%'";
		}
		else if(isset($data1) && $data1 != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and emailComprador = '".$email."'";
		}
		else if(isset($data1) && $data1 != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and statusCompra = '".$statusCompra."'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and emailComprador = '".$email."'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and statusCompra = '".$statusCompra."'";
		}
		else if(isset($data1) && $data1 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nomeCompra like '%".$nomeCompra."%'  and emailComprador = '".$email."' ";
		}
		else if(isset($data1) && $data1 != null && isset($nomeCliente) && $nomeCliente != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nomeComprador like '%".$nomeCliente."%'  and emailComprador = '".$email."' ";
		}
		else if(isset($data1) && $data1 != null && isset($nomeCompra) && $nomeCompra != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nomeCompra like '%".$nomeCompra."%'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($data1) && $data1 != null && isset($nomeCliente) && $nomeCliente != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nomeComprador like '%".$nomeCliente."%'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($data1) && $data1 != null && isset($nomeCliente) && $nomeCliente != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nomeComprador like '%".$nomeCliente."%'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($data1) && $data1 != null && isset($nomeCompra) && $nomeCompra != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nomeCompra like '%".$nomeCompra."%'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($data1) && $data1 != null && isset($nomeCompra) && $nomeCompra != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nomeCompra like '%".$nomeCompra."%'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($data1) && $data1 != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and emailComprador = '".$email."'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%'  and emailComprador = '".$email."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCliente) && $nomeCliente != null && isset($email) && $email != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeComprador like '%".$nomeCliente."%'  and emailComprador = '".$email."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCompra) && $nomeCompra != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeCompra like '%".$nomeCompra."%'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nomeCliente) && $nomeCliente != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and nomeComprador like '%".$nomeCliente."%'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and emailComprador = '".$email."'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($email) && $email != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where emailComprador = '".$email."'  and statusCompra = '".$statusCompra."' ";
		}
		
		else if(isset($nomeCompra) && $nomeCompra != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeCompra like '%".$nomeCompra."%'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($nomeCliente) && $nomeCliente != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador like '%".$nomeCliente."%'  and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($nomeCliente) && $nomeCliente != null && isset($preco1) && $preco1 != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador like '%".$nomeCliente."%'  and valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') ";
		}
		else if(isset($nomeCliente) && $nomeCliente != null && isset($nomeCliente) && $nomeCliente != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador like '%".$nomeCliente."%'  and nomeComprador = '".$nomeCliente."' ";
		}
		else if(isset($nomeCliente) && $nomeCliente != null && isset($tipoFrete) && $tipoFrete != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador like '%".$nomeCliente."%'  and tipoFrete = '".$tipoFrete."' ";
		}
		else if(isset($nomeCliente) && $nomeCliente != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador like '%".$nomeCliente."%'  and idCompra = '".$idCompra."' ";
		}
		else if(isset($nomeCliente) && $nomeCliente != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador like '%".$nomeCliente."%'  and idCompra = '".$idCompra."' ";
		}
		else if(isset($data1) && $data1 != null && isset($preco1) && $preco1 != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."')  and valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') ";
		}
		else if(isset($data1) && $data1 != null && isset($nomeCliente) && $nomeCliente != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."')  and nomeComprador = '". $nomeCliente ."' ";
		}
		else if(isset($data1) && $data1 != null && isset($tipoFrete) && $tipoFrete != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."')  and tipoFrete = '". $tipoFrete ."' ";
		}
		else if(isset($data1) && $data1 != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."')  and idCompra = '". $idCompra ."' ";
		}
		else if(isset($data1) && $data1 != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."')  and statusCompra = '". $statusCompra ."' ";
		}
		else if(isset($email) && $email != null && isset($preco1) && $preco1 != null )
		{
			$sqlComand = "select * from tbCompra where emailComprador '".$email."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') ";
		}
		else if(isset($email) && $email != null && isset($nomeCliente) && $nomeCliente != null )
		{
			$sqlComand = "select * from tbCompra where emailComprador '".$email."' and nomeComprador = '".$nomeCliente."'";
		}
		else if(isset($email) && $email != null && isset($tipoFrete) && $tipoFrete != null )
		{
			$sqlComand = "select * from tbCompra where emailComprador '".$email."' and tipoFrete = '".$tipoFrete."'";
		}
		else if(isset($email) && $email != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where emailComprador '".$email."' and idCompra = '".$idCompra."'";
		}
		else if(isset($email) && $email != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where emailComprador '".$email."' and statusCompra = '".$statusCompra."'";
		}
		else if(isset($nomeCompra) && $nomeCompra != null && isset($preco1) && $preco1 != null )
		{
			$sqlComand = "select * from tbCompra where nomeCompra '".$nomeCompra."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') ";
		}
		else if(isset($nomeCompra) && $nomeCompra != null && isset($nomeCliente) && $nomeCliente != null )
		{
			$sqlComand = "select * from tbCompra where nomeCompra '".$nomeCompra."' and nomeComprador = '".$nomeCliente."'";
		}
		else if(isset($nomeCompra) && $nomeCompra != null && isset($tipoFrete) && $tipoFrete != null )
		{
			$sqlComand = "select * from tbCompra where nomeCompra '".$nomeCompra."' and tipoFrete = '".$tipoFrete."'";
		}
		else if(isset($nomeCompra) && $nomeCompra != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeCompra '".$nomeCompra."' and idCompra = '".$idCompra."'";
		}
		else if(isset($nomeCompra) && $nomeCompra != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeCompra '".$nomeCompra."' and statusCompra = '".$statusCompra."'";
		}
		else if(isset($preco1) && $preco1 != null && isset($nomeCliente) && $nomeCliente != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and nomeComprador = '".$nomeCliente."'";
		}
		else if(isset($preco1) && $preco1 != null && isset($tipoFrete) && $tipoFrete != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and tipoFrete = '".$tipoFrete."'";
		}
		else if(isset($preco1) && $preco1 != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and idCompra = '".$idCompra."'";
		}
		else if(isset($preco1) && $preco1 != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and statusCompra = '".$statusCompra."'";
		}
		else if(isset($nomeCliente) && $nomeCliente != null && isset($tipoFrete) && $tipoFrete != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador = '". $nomeCliente ."' and tipoFrete = '".$tipoFrete."'";
		}
		else if(isset($nomeCliente) && $nomeCliente != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador = '". $nomeCliente ."' and tipoFrete = '".$idCompra."'";
		}
		else if(isset($nomeCliente) && $nomeCliente != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador = '". $nomeCliente ."' and tipoFrete = '".$statusCompra."'";
		}
		else if(isset($tipoFrete) && $tipoFrete != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where tipoFrete = '". $tipoFrete ."' and idCompra = '".$idCompra."'";
		}
		else if(isset($tipoFrete) && $tipoFrete != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where tipoFrete = '". $tipoFrete ."' and statusCompra = '".$statusCompra."'";
		}
		else if(isset($idCompra) && $idCompra != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where idCompra = '". $tipoFrete ."' and statusCompra = '".$statusCompra."'";
		}
		else if(isset($data1) && $data1 != null  && isset($email) && $email != null && isset($preco1) && $preco1 != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and emailComprador = '".$email."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."')";
		}
		else if(isset($data1) && $data1 != null  && isset($email) && $email != null && isset($nomeCliente) && $nomeCliente != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and emailComprador = '".$email."' and nomeComprador = '". $nomeCliente ."'";
		}
		else if(isset($data1) && $data1 != null  && isset($email) && $email != null && isset($tipoFrete) && $tipoFrete != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and emailComprador = '".$email."' and tipoFrete = '". $tipoFrete ."'";
		}
		else if(isset($data1) && $data1 != null  && isset($email) && $email != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and emailComprador = '".$email."' and idCompra = '". $idCompra ."'";
		}
		else if(isset($data1) && $data1 != null  && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data2 ."') and emailComprador = '".$email."' and statusCompra = '". $statusCompra ."'";
		}
		else if(isset($email) && $email != null  && isset($nomeCompra) && $nomeCompra != null && isset($preco1) && $preco1 != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and emailComprador = '".$email."' and nomeCompra = '". $nomeCompra ."'";
		}
		else if(isset($nomeCompra) && $nomeCompra != null  && isset($email) && $email != null && isset($nomeCliente) && $nomeCliente != null )
		{
			$sqlComand = "select * from tbCompra where nomeCompra = '". $nomeCompra ."' and emailComprador = '".$email."' and nomeCliente = '". $nomeCliente ."'";
		}
		else if(isset($nomeCompra) && $nomeCompra != null  && isset($email) && $email != null && isset($tipoFrete) && $tipoFrete != null )
		{
			$sqlComand = "select * from tbCompra where nomeCompra = '". $nomeCompra ."' and emailComprador = '".$email."' and tipoFrete = '". $tipoFrete ."'";
		}
		else if(isset($nomeCompra) && $nomeCompra != null  && isset($email) && $email != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeCompra = '". $nomeCompra ."' and emailComprador = '".$email."' and idCompra = '". $idCompra ."'";
		}
		else if(isset($nomeCompra) && $nomeCompra != null  && isset($email) && $email != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeCompra = '". $nomeCompra ."' and emailComprador = '".$email."' and statusCompra = '". $statusCompra ."'";
		}		
		else if(isset($preco1) && $preco1 != null  && isset($nomeCompra) && $nomeCompra != null && isset($nomeCliente) && $nomeCliente != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and nomeCompra = '".$nomeCompra."' and nomeCliente = '". $nomeCliente ."'";
		}
		else if(isset($preco1) && $preco1 != null  && isset($nomeCompra) && $nomeCompra != null && isset($tipoFrete) && $tipoFrete != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and nomeCompra = '".$nomeCompra."' and tipoFrete = '". $tipoFrete ."'";
		}
		else if(isset($preco1) && $preco1 != null  && isset($nomeCompra) && $nomeCompra != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and nomeCompra = '".$nomeCompra."' and idCompra = '". $idCompra ."'";
		}
		else if(isset($preco1) && $preco1 != null  && isset($nomeCompra) && $nomeCompra != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and nomeCompra = '".$nomeCompra."' and statusCompra = '". $statusCompra ."'";
		}
		else if(isset($preco1) && $preco1 != null  && isset($nomeCliente) && $nomeCliente != null && isset($tipoFrete) && $tipoFrete != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and nomeComprador = '".$nomeCliente."' and tipoFrete = '". $tipoFrete ."'";
		}
		else if(isset($preco1) && $preco1 != null  && isset($nomeCliente) && $nomeCliente != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and nomeComprador = '".$nomeCliente."' and idCompra = '". $idCompra ."'";
		}
		else if(isset($preco1) && $preco1 != null  && isset($nomeCliente) && $nomeCliente != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') and nomeComprador = '".$nomeCliente."' and statusCompra = '". $statusCompra ."'";
		}
		else if(isset($nomeCliente) && $nomeCliente != null  && isset($tipoFrete) && $tipoFrete != null && isset($idCompra) && $idCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador and '". $nomeCliente ."' and $tipoFrete = '".$tipoFrete."' and idCompra = '". $idCompra ."'";
		}
		else if(isset($nomeCliente) && $nomeCliente != null  && isset($tipoFrete) && $tipoFrete != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where nomeComprador and '". $nomeCliente ."' and tipoFrete = '".$tipoFrete."' and statusCompra = '". $statusCompra ."'";
		}
		else if(isset($idCompra) && $idCompra != null  && isset($tipoFrete) && $tipoFrete != null && isset($statusCompra) && $statusCompra != null )
		{
			$sqlComand = "select * from tbCompra where idCompra and '". $idCompra ."' and tipoFrete = '".$tipoFrete."' and statusCompra = '". $statusCompra ."'";
		}
		else if(isset($data1) && $data1 != null  && isset($email) && $email != null && isset($nomeCompra) && $nomeCompra != null  && isset($preco1) && $preco1 != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data1 ."') and emailComprador = '".$email."' and nomeCompra = '". $nomeCompra ."' and valorTotal BETWEEN('". $preco1 ."') and ('". $preco2 ."') ";
		}
		else if(isset($data1) && $data1 != null  && isset($email) && $email != null && isset($nomeCompra) && $nomeCompra != null  && isset($nomeCliente) && $nomeCliente != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data1 ."') and emailComprador = '".$email."' and nomeCompra = '". $nomeCompra ."' and nomeComprador = '". $nomeCliente ."' ";
		}
		else if(isset($data1) && $data1 != null  && isset($email) && $email != null && isset($nomeCompra) && $nomeCompra != null  && isset($tipoFrete) && $tipoFrete != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data1 ."') and emailComprador = '".$email."' and nomeCompra = '". $nomeCompra ."' and tipoFrete = '". $tipoFrete ."' ";
		}
		else if(isset($data1) && $data1 != null  && isset($email) && $email != null && isset($nomeCompra) && $nomeCompra != null  && isset($idCompra) && $idCompra != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data1 ."') and emailComprador = '".$email."' and nomeCompra = '". $nomeCompra ."' and idCompra = '". $idCompra ."' ";
		}
		else if(isset($data1) && $data1 != null  && isset($email) && $email != null && isset($nomeCompra) && $nomeCompra != null  && isset($statusCompra) && $statusCompra != null)
		{
			$sqlComand = "select * from tbCompra where dataCompra BETWEEN('". $data1 ."') and ('". $data1 ."') and emailComprador = '".$email."' and nomeCompra = '". $nomeCompra ."' and statusCompra = '". $statusCompra ."' ";
		}
		else if(isset($email) && $email != null  && isset($nomeCompra) && $nomeCompra != null && isset($preco1) && $preco1 != null  && isset($nomeCliente) && $nomeCliente != null)
		{
			$sqlComand = "select * from tbCompra where emailComprador = '".$email."' and nomeCompra = '". $nomeCompra ."' valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') and nomeComprador = '".$nomeCliente."' ";
		}
		else if(isset($email) && $email != null  && isset($nomeCompra) && $nomeCompra != null && isset($preco1) && $preco1 != null  && isset($tipoFrete) && $tipoFrete != null)
		{
			$sqlComand = "select * from tbCompra where emailComprador = '".$email."' and nomeCompra = '". $nomeCompra ."' valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') and tipoFrete = '".$tipoFrete."' ";
		}
		else if(isset($email) && $email != null  && isset($nomeCompra) && $nomeCompra != null && isset($preco1) && $preco1 != null  && isset($idCompra) && $idCompra != null)
		{
			$sqlComand = "select * from tbCompra where emailComprador = '".$email."' and nomeCompra = '". $nomeCompra ."' valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') and idCompra = '".$idCompra."' ";
		}
		else if(isset($email) && $email != null  && isset($nomeCompra) && $nomeCompra != null && isset($preco1) && $preco1 != null  && isset($statusCompra) && $statusCompra != null)
		{
			$sqlComand = "select * from tbCompra where emailComprador = '".$email."' and nomeCompra = '". $nomeCompra ."' valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($nomeCompra) && $nomeCompra != null  && isset($preco1) && $preco1 != null && isset($nomeCliente) && $nomeCliente != null  && isset($tipoFrete) && $tipoFrete != null)
		{
			$sqlComand = "select * from tbCompra where nomeCompra = '". $nomeCompra ."' valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') and nomeComprador = '".$nomeCliente."' and tipoFrete = '".$tipoFrete."' ";
		}
		else if(isset($nomeCompra) && $nomeCompra != null  && isset($preco1) && $preco1 != null && isset($nomeCliente) && $nomeCliente != null  && isset($idCompra) && $idCompra != null)
		{
			$sqlComand = "select * from tbCompra where nomeCompra = '". $nomeCompra ."' valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') and nomeComprador = '".$nomeCliente."' and idCompra = '".$idCompra."' ";
		}
		else if(isset($nomeCompra) && $nomeCompra != null  && isset($preco1) && $preco1 != null && isset($nomeCliente) && $nomeCliente != null  && isset($statusCompra) && $statusCompra != null)
		{
			$sqlComand = "select * from tbCompra where nomeCompra = '". $nomeCompra ."' valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') and nomeComprador = '".$nomeCliente."' and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($preco1) && $preco1 != null && isset($nomeCliente) && $nomeCliente != null  && isset($tipoFrete) && $tipoFrete != null && isset($idCompra) && $idCompra != null)
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') and nomeComprador = '".$nomeCliente."' and tipoFrete = '".$tipoFrete."' and idCompra = '".$idCompra."' ";
		}
		else if(isset($preco1) && $preco1 != null && isset($nomeCliente) && $nomeCliente != null  && isset($tipoFrete) && $tipoFrete != null && isset($statusCompra) && $statusCompra != null)
		{
			$sqlComand = "select * from tbCompra where valorTotal BETWEEN('". $preco1 ."') and ('". $preco1 ."') and nomeComprador = '".$nomeCliente."' and tipoFrete = '".$tipoFrete."' and statusCompra = '".$statusCompra."' ";
		}
		else if(isset($nomeCliente) && $nomeCliente != null  && isset($tipoFrete) && $tipoFrete != null && isset($idCompra) && $idCompra != null && isset($statusCompra) && $statusCompra != null)
		{
			$sqlComand = "select * from tbCompra where nomeComprador = '".$nomeCliente."' and tipoFrete = '".$tipoFrete."' and statusCompra = '".$statusCompra."' and idCompra '".$idCompra."' ";
		}
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR COMPRA AVANÇADO
	//CONSTRUIR CLASSE
	
	//EXCLUIR COMPRA
	public function excluirCompra($id)
	{
		$sqlComand = "delete from tbCompra where idCompra = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//EXCLUIR COMPRA
	
	//LISTAR  COMPRA
	public function listarCompra()
	{
		$sqlComand = " select * from tbCompra ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LISTAR COMPRA
	
	public function listarIsCompraCliente($idCliente)
	{
		$sqlComand = " select * from tbCompra where idComprador = '".$idCliente."' LIMIT 1";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LISTAR COMPRA
	
	public function listarHistoricoCompraUsuario($id)
	{
		$sqlComand = "select * from tbCompra where idComprador = '". $id . "'" ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR COMPRA
	
	public function listarCompraUsuario($compra)
	{
		
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