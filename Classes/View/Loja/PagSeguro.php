<?php session_start(); ?>
<?php include_once("../../Controller/DALUsuario.php"); ?>
<?php include_once("../../Controller/DALPessoa.php"); ?>
<?php include_once("../../Controller/DALProduto.php"); ?>
<?php include_once("../../Controller/DALCompra.php"); ?>
<?php include_once("../../Controller/DALPagSeguro.php"); ?>
<?php include_once("../../Controller/DALCarrinho.php"); ?>
<?php include_once("../../Model/PagSeguro.php"); ?>
<?php include_once("../../Model/Pessoa.php"); ?>
<?php include_once("../../Model/Produto.php"); ?>
<?php include_once("../../Model/Compra.php"); ?>
<?php include_once("../../Model/Carrinho.php"); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php

if(isset($_POST['isCarrinho']) && $_POST['isCarrinho'] != null && $_POST['isCarrinho'] == true)
{
	$compra = new Compra('', $_SESSION['usuarioId'], '', $_SESSION['usuarioNome'], $_SESSION['usuarioEmail'], '', '', '', '', $valorTotal = 0, $_SESSION['usuarioCPF'], 30, '', '', '');
}
else
{
	$compra = new Compra('', $_SESSION['usuarioId'], '', $_SESSION['usuarioNome'], $_SESSION['usuarioEmail'], '', '', '', '', $valorTotal = 0, $_SESSION['usuarioCPF'], 25, '', '', '');
}

$id = trim(filter_input(INPUT_GET, 'idPessoa', FILTER_SANITIZE_NUMBER_INT));

$conexao = new Conexao();
$dalPagSeguro = new DALPagSeguro($conexao);
$dalCompra = new DALCompra($conexao);
$dalPessoa = new DALPessoa($conexao);
$dalCarrinho = new DALCarrinho($conexao);
$dalProduto = new DALProduto($conexao);

//COMPRA
$resultado1 = $dalCompra->listarCompraUsuario($compra);

//USUÁRIO
$resultado2 = $dalPessoa->localizarPessoa($id);

//COMPRA
$dadosVerif = mysqli_fetch_array($resultado1);

//print_r($dadosVerif);

//USUÁRIO
$dadosVerif2 = mysqli_fetch_array($resultado2);

if($dadosVerif['emailComprador'] == $_SESSION['usuarioEmail'] & $dadosVerif['idComprador'] == $_SESSION['usuarioId'] & isset($_SESSION['usuarioId']) & $_SESSION['usuarioId'] == $dadosVerif2['idPessoa'] & $_SESSION['usuarioEmail'] == $dadosVerif2['email'])
{
	if(isset($_POST['isCarrinho']) && $_POST['isCarrinho'] != null && $_POST['isCarrinho'] == true)
	{
		//POST COMPRA CARRINHO
		
		//$idTransacao = preg_replace('/[^[:alnum:]-]/','',$_POST["idTransacao"]);
		
		$idCompra = $dadosVerif['idCompra'];
		$idCarrinho = trim($_POST['idCarrinh']);
		$emailUsuario = $_SESSION['usuarioEmail'];
		$nomeUsuario = $_SESSION['usuarioNome'];
		$dddUsuario = $_SESSION['usuarioTelDDD'];
		$telefoneUsuario = $_SESSION['usuarioTel'];
		$enderecoUsuario = $_SESSION['usuarioEnd'];
		$complementoUsuario = $_SESSION['usuarioCompl'];
		$bairroUsuario = $_SESSION['usuarioBairro'];
		$cidadeUsuario = $_SESSION['usuarioCid'];
		$estadoUsuario = $_SESSION['usuarioEstado'];
		$cepUsuario = $_SESSION['usuarioCep'];
		$valorSedex = trim($_POST['valorSedex']);
		$valorPac = trim($_POST['valorPac']);
		$valorMao = trim($_POST['valorMao']);
		
		$valorFreteSedex = trim($_POST['valorFreteSedex']);
		$valorFreteSedex = $dalCompra->moeda($valorFreteSedex);
		
		$valorFretePac = trim($_POST['valorFretePac']);
		$valorFretePac = $dalCompra->moeda($valorFretePac);
		
		$dataCompra = date('Y-m-d');
		$tipoFrete = $_POST['tipoFrete'];
		$statusCompra = '20'; //CLIENTE CARRINHO ENCAMINHADO AO PAGSEGURO
		$totQuantidade = trim($_POST['totQuantidade']);
		$totAltura = trim($_POST['totAltura']);
		$totLargura = trim($_POST['totLargura']);
		$totComprimento = trim($_POST['totComprimento']);
		$totPeso = trim($_POST['totPeso']);

		if($_POST['tipoFrete'] == 'P')
		{
			$valorTotal = $valorPac;
			$fretinho = $valorFretePac;
			$valorTotal = number_format($valorTotal,2,".","");
		}
		else if($_POST['tipoFrete'] == 'S')
		{
			$valorTotal = $valorSedex;
			$fretinho = $valorFreteSedex;
			$valorTotal = number_format($valorTotal,2,".","");
		}
		else
		{
			$valorTotal = $valorMao;
			$valorTotal = number_format($valorTotal,2,".","");
			$fretinho = 0.00;
		}
		//CONFERIDO E OK
		
		//TRATAMENTO DO CARRINHO DE COMPRAS
		$carrinho = new Carrinho($idCarrinho, $totQuantidade, $dataCompra, $valorTotal, $statusCompra, $tipoFrete, $fretinho, $totAltura, $totLargura, $totComprimento, $totPeso);
		
		$dalCarrinho = new DALCarrinho($conexao);
		
		$dalCarrinho->comprarCarrinhoPagSeguro($carrinho);
		//TRATAMENTO DO CARRINHO DE COMPRAS
		
		//TRATAMENTO DA ALTERAÇÃO DA COMPRA E CRIAÇÃO USUARIO E ENVIO DE EMAIL
		//CRIAR USUARIO
		$usuario = new Pessoa($_SESSION['usuarioId'], $_SESSION['usuarioNome'], $_SESSION['usuarioCPF'], '', '', '', $_SESSION['usuarioEmail'], '',$_SESSION['usuarioTelDDD'], $_SESSION['usuarioTel'], '', '', $_SESSION['usuarioEnd'], $_SESSION['usuarioCompl'], $_SESSION['usuarioBairro'], $_SESSION['usuarioCid'], $_SESSION['usuarioEstado'], $_SESSION['usuarioCep']);
		
		//CRIAR COMPRA
		$comprinha = new Compra('', $_SESSION['usuarioId'], '', $_SESSION['usuarioNome'], $_SESSION['usuarioEmail'], '', '', $fretinho, '', $valorTotal, $_SESSION['usuarioCPF'], 30, $tipoFrete,'','',$idCarrinho, '', $totAltura, $totLargura, $totComprimento, $totPeso);
				
		$resultado = $dalCompra->listarCompraUsuario($comprinha);
		
		//EMAIL PARA USUARIO E SISTEMA
		$mensagem = "Esta e um contato enviado para informar que a sua compra foi processada com sucesso.
		Continue o pagamento no mercado pago, quando constar o pagamento nós seremos informados e daremos continuidade a compra enviando o produto e todas as informações necessárias.
		Segue a baixo algumas informações sobre a sua compra.
		
		";
		//print_r($resultado);
		
		while($dados = mysqli_fetch_array($resultado))
		{
			$cx = new Conexao();
			
			$dalProduto = new DALProduto($cx);
			
			$mensagem += "Id compra: ".$dados['idCompra'].", Nome produto: ".$dados['nomeCompra'].", Quantidade: ".$dados['quantidadeProduto']." ";
			
			$produtinho = new Produto($dados['idProdutoCompra'], $dados['nomeCompra'], '', $dados['quantidadeProduto']);
			
			$resultadoProd = $dalProduto->localizarProduto($dados['idProdutoCompra']);
			
			$dados2 = mysqli_fetch_array($resultadoProd);
			
			if($dados2['quantidade'] < $quantidadeProduto)
			{
				$dalCompra->excluirCompra($dados['idCompra']);
				$dalCarrinho->excluirCarrinho($idCarrinho);
				if($dados == null)
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../../index.php'>
				<script type= \"text/javascript\">
				alert(\"erro ao comprar o produto .A quantidade solicitada é mario que a quantidade em estoque\");
				</script>";
				mail('professor_alessandro@hotmail.com', 'Erro Compra Carrinho Pag Seguro, Estoque', '
				Erro ao efetivar a compra no carrinho, a baixo seguem os detalhes
				Compra: '.$idCompra.'
				Carrinho: '.$idCarrinho.'
				');
				exit();
				}
			}
			else
			{
				$dalProduto->alterarProdutoQuantidadeSubtrair($produtinho, $dados2['quantidade']);
			}
		}
		$mensagem += "id Carrinho: ".$idCarrinho.
			
		"Atenciosamente Chayds Vitamins, supplements and minerals";
		
		mail($_SESSION['usuarioEmail'], 'Parabéns, você acaba de comprar um ótimo produto Chayds', $mensagem);
		mail('professor_alessandro@hotmail.com', 'Parabéns, você acaba de comprar um ótimo produto Chayds', $mensagem);	
		//FIM TRATAMENTO DA ALTERAÇÃO DA COMPRA E CRIAÇÃO USUARIO E ENVIO DE EMAIL
		
		$dalCompra->alterarCompraCarrinhoPagSeguro($comprinha);
		
		$pagSeguro = new PagSeguro($idCompra,'Compra '.$idCompra, $valorTotal, $totPeso, $idCompra, $nomeUsuario, $dddUsuario, $telefoneUsuario, $emailUsuario, $enderecoUsuario, $complementoUsuario, $bairroUsuario, $cidadeUsuario, $estadoUsuario, $cepUsuario);
		//echo($valorTotal);
		
		$dalPagSeguro->executeCheckout($pagSeguro);
		
	}//EXIST POST COMPRA CARRINHO
	else if(isset($_POST['isCompra']) && $_POST['isCompra'] != null && $_POST['isCompra'] == true)
	{   
		//NAO MECHER
		//EXIST POST COMPRA AVULSA
		//$idTransacao = preg_replace('/[^[:alnum:]-]/','',$_POST["idTransacao"]);
		$idCompra = $dadosVerif['idCompra'];
		$emailUsuario = $_SESSION['usuarioEmail'];
		$nomeUsuario = $_SESSION['usuarioNome'];
		$dddUsuario = $_SESSION['usuarioTelDDD'];
		$telefoneUsuario = $_SESSION['usuarioTel'];
		$enderecoUsuario = $_SESSION['usuarioEnd'];
		$complementoUsuario = $_SESSION['usuarioCompl'];
		$bairroUsuario = $_SESSION['usuarioBairro'];
		$cidadeUsuario = $_SESSION['usuarioCid'];
		$estadoUsuario = $_SESSION['usuarioEstado'];
		$cepUsuario = $_SESSION['usuarioCep'];
		$valorSedex = trim($_POST['valorSedex']);
		$valorPac = trim($_POST['valorPac']);
		$valorMao = trim($_POST['valorMao']);
		$tipoFrete = $_POST['tipoFrete'];
		
		$valorFreteSedex = trim($_POST['valorFreteSedex']);
		$valorFreteSedex = $dalCompra->moeda($valorFreteSedex);
		
		$valorFretePac = trim($_POST['valorFretePac']);
		$valorFretePac = $dalCompra->moeda($valorFretePac);
		
		$statusCompra = '21'; //STATUS COMPRA FORA DO CARRINHO ENCAMINHADA AO PAGSEGURO
		
		$totQuantidade = trim($_POST['totQuantidade']);
		$totAltura = trim($_POST['totAltura']);
		$totLargura = trim($_POST['totLargura']);
		$totComprimento = trim($_POST['totComprimento']);
		$totPeso = trim($_POST['totPeso']);

		if($_POST['tipoFrete'] == 'P')
		{
			$valorTotal = $valorPac;
			$fretinho = $valorFretePac;
			$valorTotal = number_format($valorTotal,2,".","");
		}
		else if($_POST['tipoFrete'] == 'S')
		{
			$valorTotal = $valorSedex;
			$fretinho = $valorFreteSedex;
			$valorTotal = number_format($valorTotal,2,".","");
		}
		else
		{
			$valorTotal = $valorMao;
			$fretinho = 0.00;
			$valorTotal = number_format($valorTotal,2,".","");
		}
		
		//TRATAMENTO DA ALTERAÇÃO DA COMPRA E CRIAÇÃO USUARIO E ENVIO DE EMAIL
		
		$usuario = new Pessoa($_SESSION['usuarioId'], $_SESSION['usuarioNome'], $_SESSION['usuarioCPF'], '', '', '', $_SESSION['usuarioEmail'], '',$_SESSION['usuarioTelDDD'], $_SESSION['usuarioTel'], '', '', $_SESSION['usuarioEnd'], $_SESSION['usuarioCompl'], $_SESSION['usuarioBairro'], $_SESSION['usuarioCid'], $_SESSION['usuarioEstado'], $_SESSION['usuarioCep']);
		
		//print_r($usuario);
		
		$comprinha = new Compra('', $_SESSION['usuarioId'], '', $_SESSION['usuarioNome'], $_SESSION['usuarioEmail'], '', '', $fretinho, '', $valorTotal, $_SESSION['usuarioCPF'], 25, $tipoFrete,'','',$idCarrinho = 0, '', $totAltura, $totLargura, $totComprimento, $totPeso);
		
		$resultado = $dalCompra->listarCompraUsuario($comprinha);
		
		//EMAIL PARA USUARIO E SISTEMA
		$mensagem = "Esta e um contato enviado para informar que a sua compra foi processada com sucesso.
		Continue o pagamento no mercado pago, quando constar o pagamento nós seremos informados e daremos continuidade a compra enviando o produto e todas as informações necessárias.
		Segue a baixo algumas informações sobre a sua compra.
		
		";
		
		//print_r($resultado);
		
		while($dados = mysqli_fetch_array($resultado))
		{
			$cx = new Conexao();
			
			$dalProduto = new DALProduto($cx);
			
			$mensagem += "Id compra: ".$dados['idCompra'].", Nome produto: ".$dados['nomeCompra'].", Quantidade: ".$dados['quantidadeProduto']." ";
			
			$produtinho = new Produto($dados['idProdutoCompra'], $dados['nomeCompra'], '', $dados['quantidadeProduto']);
			
			$resultadoProd = $dalProduto->localizarProduto($dados['idProdutoCompra']);
			
			$dados2 = mysqli_fetch_array($resultadoProd);
			
			if($dados2['quantidade'] < $quantidadeProduto)
			{
				$dalCompra->excluirCompra($dados['idCompra']);
				if($dados == null)
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../../index.php'>
				<script type= \"text/javascript\">
				alert(\"erro ao comprar o produto .A quantidade solicitada é mario que a quantidade em estoque\");
				</script>";
				mail('professor_alessandro@hotmail.com', 'Erro Compra Pag Seguro, Estoque', '
				Erro ao efetivar a compra no carrinho, a baixo seguem os detalhes
				Compra: '.$idCompra.'
				');
				exit();
				}
			}
			else
			{
				$dalProduto->alterarProdutoQuantidadeSubtrair($produtinho, $dados2['quantidade']);
			}
			
			$dalProduto->alterarProdutoQuantidadeSubtrair($produtinho, $dados2['quantidade']);
		}
		$mensagem += "id compra: ".$dados['idCompra']."
			
		Atenciosamente Chayds Vitamins, supplements and minerals";
		
		mail($_SESSION['usuarioEmail'], 'Parabéns, você acaba de comprar um ótimo produto Chayds', $mensagem);
		mail('professor_alessandro@hotmail.com', 'Parabéns, você acaba de comprar um ótimo produto Chayds', $mensagem);
		
		
		$dalCompra->alterarCompraPagSeguro($comprinha, $usuario);
		
		//FIM TRATAMENTO DA ALTERAÇÃO DA COMPRA E CRIAÇÃO USUARIO E ENVIO DE EMAIL
		
		$pagSeguro = new PagSeguro($idCompra,'Compra '.$idCompra, $valorTotal, 0, $idCompra, $nomeUsuario, $dddUsuario, $telefoneUsuario, $emailUsuario, $enderecoUsuario, $complementoUsuario, $bairroUsuario, $cidadeUsuario, $estadoUsuario, $cepUsuario);
		//echo($valorTotal);
		
		//REDIRECIONAMENTO PAGSEGURO
		//$resultPagueSeguro = $dalPagSeguro->executeCheckout($pagSeguro);
		
		$dalPagSeguro->executeCheckout($pagSeguro);
		
		//print_r($resultPagueSeguro);

		//header('Location: '.$result.'');
		//REDIRECIONAMENTO PAGSEGURO
		//NAO MECHER
		
	}//EXIST POST COMPRA AVULSA
}//IF SEM ELSEVERIFICA USUARIO

//IF EXISTE NOTIFICAÇÃO
if(isset($_POST["notificationCode"]) && $_POST["notificationCode"] != null)
{
	$emailUsuario = $_SESSION['usuarioEmail'];
	$nomeUsuario = $_SESSION['usuarioNome'];
	$dddUsuario = $_SESSION['usuarioTelDDD'];
	$telefoneUsuario = $_SESSION['usuarioTel'];
	$enderecoUsuario = $_SESSION['usuarioEnd'];
	$complementoUsuario = $_SESSION['usuarioCompl'];
	$bairroUsuario = $_SESSION['usuarioBairro'];
	$cidadeUsuario = $_SESSION['usuarioCid'];
	$estadoUsuario = $_SESSION['usuarioEstado'];
	$cepUsuario = $_SESSION['usuarioCep'];
	$pesoItem = 10; //trim($_POST['$pesoItem']);
	
	$pagSeguro = new PagSeguro($_SESSION['usuarioId'], '', '', '', 0, $nomeUsuario, $dddUsuario, $telefoneUsuario, $emailUsuario, $enderecoUsuario, $complementoUsuario, $bairroUsuario, $cidadeUsuario, $estadoUsuario, $cepUsuario);
	
	$dalPagSeguro->executeNotification($_POST, $pagSeguro);
	
	//$result = $dalPagSeguro->executeNotification($_POST, $pagSeguro);
	
	//print_r($result);
	
	/*
	$notificationCode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]); //TRATAMENTO DE SQL INJECTION
	
	$pagSeguro = new PagSeguro($idCompra, 'Carrinho'.$idCompra, $valorTotal, $pesoItem, $idCompra, $nomeUsuario, $dddUsuario, $telefoneUsuario, $emailUsuario, $enderecoUsuario, $complementoUsuario, $bairroUsuario, $cidadeUsuario, $estadoUsuario, $cepUsuario);
	
	$data['token'] ='BC4F456821414523B1D3F14D193F909B';
	$data['email'] ='professor_alessandro@hotmail.com';

	$data = http_build_query($data);
	$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_URL, $url);
	$xml = curl_exec($curl);
	curl_close($curl);

	$xml = simplexml_load_string($xml);

	$reference = $xml->reference;
	$status = $xml->status;
	*/
}//EXISTE POST NOTIFICAÇÃO
else if(isset($_POST["idTransacao"]) && $_POST["idTransacao"] != null)
{
	$pagSeguro = new PagSeguro();
	//CODIGO PARA TRATAMENTO DE TRNSAÇÃÇÃO COM ID DO PAGUE SEGURO
	$idTransacao = preg_replace('/[^[:alnum:]-]/','',$_POST["idTransacao"]);
	$idTransacao = trim($idTransacao);
	header('Location:'.$pagSeguro->getUrl_redirect().$idTransacao);
}
//FIM POST PHP
?>