<?php
session_start();
include_once("../bd/conexao/conexao.php");

$nome_comp_usu = $_SESSION['usuarioNome'];
$email_comp_usu = $_SESSION['usuarioEmail'];

$sql = "SELECT * FROM tb_compra WHERE email_comp_usu = '$email_comp_usu' && status_int_comp_usu = 0";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
$nome_prod_usu = "Compra Carrinho";
$totComp = 0.00;
$cont = 0;
	 while($dados = mysqli_fetch_array($resultado))
	{	
		$data['itemQuantity1'] = $dados['quant_prod_usu'] ;
		$data['itemAmount1'] = $dados['val_comp_usu'];
		//$data['itemAmount1'] = $totComp;
	}
	
	//$data['itemAmount1'];
	//$data['itemQuantity1'];
	$data['itemId1'] = '1';
	$data['token'] ='BC4F456821414523B1D3F14D193F909B';
	$data['email'] = 'professor_alessandro@hotmail.com';
	$data['currency'] = 'BRL';
	$data['itemId1'] = '1';
	$data['itemDescription1'] = 'Compra do carrinho Chayds';
	
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/';

$data = http_build_query($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
$xml= curl_exec($curl);

curl_close($curl);

$xml= simplexml_load_string($xml);
echo $xml -> code;
echo $totComp;
header('Location:https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code='.$xml -> code);

?>