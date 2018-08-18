<?php
session_start();
//FUNÇÃO VALOR MOEDA PONTOS
function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}
//FIM DA FUNÇÃO

if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
}
else if(isset($_SESSION['usuarioCep']) && $_SESSION['usuarioCep'] != null && isset($_SESSION['usuarioCPF']) && $_SESSION['usuarioCPF'] != null && isset($_SESSION['usuarioTel']) && $_SESSION['usuarioTel'] != null && isset($_SESSION['usuarioTelDDD']) && $_SESSION['usuarioTelDDD'] != null && isset($_SESSION['usuarioNasci']) && $_SESSION['usuarioNasci'] != null  && isset($_SESSION['usuarioEnd']) && $_SESSION['usuarioEnd'] != null && isset($_SESSION['usuarioBairro']) && $_SESSION['usuarioBairro'] != null && isset($_SESSION['usuarioCid']) && $_SESSION['usuarioCid'] != null && isset($_SESSION['usuarioEstado']) && $_SESSION['usuarioEstado'] != null)
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/login/validausuario.php'>
	<script type= \"text/javascript\">
	alert(\"Erro ao efetivar a compra, você deve completar o seu cadastro com todas as informaçaões obrigatórias solicitadas.\");
	</script>";
}
else if($quant_prod <= 1)
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/loja/indexlja.php'>
	<script type= \"text/javascript\">
	alert(\"Erro ao efetivar a compra, a quantidade tem que ser maior que 0 produtos.\");
	</script>";
}

	if(isset($_SESSION['usuarioEnd']) && $_SESSION['usuarioEnd'] != null && isset($_SESSION['usuarioTel']) && $_SESSION['usuarioEnd'] != null)
	{
		include_once("../bd/conexao/conexao.php");
		$nome_prod = trim($_POST['nome_prod']);
		
		if(isset($_POST['valor_frete_pac']) && $_POST['valor_frete_pac'] != null)
		{
			$valor_frete = trim($_POST['valor_frete_pac']);
			$tp_fret_comp_usu = 'PAC';
		}
		else if(isset($_POST['valor_frete_sedex']) && $_POST['valor_frete_sedex'] != null)
		{
			$valor_frete = trim($_POST['valor_frete_sedex']);
			$tp_fret_comp_usu = 'SEDEX';
		}
		else
		{
			$valor_frete = trim($_POST['valor_frete']);
			$tp_fret_comp_usu = 'RET EM MAOS';
		}
		
		//$tp_fret_comp_usu = trim($_POST['tp_fret_comp_usu']);
		$valor_frete = moeda($valor_frete);
		
		$sql = "SELECT * FROM tb_produto WHERE nome_prod = '$nome_prod' LIMIT 1";
		$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
		if (mysqli_affected_rows($conn) != 0)
		{
		//COMPRA NO MERCADOPAGO
		while($dados = mysqli_fetch_array($resultado))
		{	
			$data['itemDescription1'] = $dados['nome_prod'];
			$data['itemId1'] = $dados['id_prod'];
			$val_uni_comp_usu = $dados['preco_venda'];
			//$data['itemAmount1'] = $totComp;
		}
			
		//$data['itemAmount1'];
		//$data['itemQuantity1'];
		$data['itemQuantity1'] = '1';
		$data['token'] ='BC4F456821414523B1D3F14D193F909B';
		$data['email'] = 'professor_alessandro@hotmail.com';
		$data['currency'] = 'BRL';
					
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/';
		
		//INCLUSAO TABELA COMPRA
		
		$cod1 = date("d/m/Y");
		$cod2 = $_SESSION['usuarioId'];
		$cod3 = $_POST['quant_prod'];
		$cod4 = date("His");
		
		
		$cod_comp_usu = "$cod4"."$cod1"."$cod2"."$cod3";
		$nome_comp_usu = $_SESSION['usuarioNome'];//$_SESSION['usuarioNome'];
		$email_comp_usu = $_SESSION['usuarioEmail'];
		$nome_prod_usu = trim($_POST['nome_prod']);
		$quant_prod_usu = trim($_POST['quant_prod']);
		
		$conf_comp = $_POST['conf_comp'];
		
		//A completar
		$val_comp_usu = ($quant_prod_usu * $val_uni_comp_usu)+$valor_frete;
		$data['itemAmount1'] = $val_comp_usu;
		$cpf_comp_usu = $_SESSION['usuarioCPF'];
		$status_comp_usu = '25';
			
		$sqli_comand = "INSERT INTO `tb_compra`(`cod_comp_usu`,`nome_comp_usu`,`email_comp_usu`,`nome_prod_usu`,`quant_prod_usu`,`dt_comp_usu`,`val_uni_comp_usu`,`val_frete_comp_usu`,`val_comp_usu`,`cpf_comp_usu`,`status_comp_usu`,`tp_fret_comp_usu`) VALUES ('$cod_comp_usu','$nome_comp_usu','$email_comp_usu','$nome_prod_usu','$quant_prod_usu',curdate(),'$val_uni_comp_usu','$valor_frete','$val_comp_usu','$cpf_comp_usu','$status_comp_usu','$tp_fret_comp_usu')";
		$result = mysqli_query($conn, $sqli_comand);

//INCLUSAO TABELA COMPRA FIM

//SETA ID COMPRA

$sql = "SELECT id_comp_usu FROM `tb_compra`";
		$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
		if (mysqli_affected_rows($conn) != 0)
		{
		//COMPRA NO MERCADOPAGO
			while($dados = mysqli_fetch_array($resultado))
			{	
				$id_comp_usu = $dados['id_comp_usu'];
			}
		$data['reference'] = $id_comp_usu;
		}
		
//SETA ID COMPRA FIM
			if($_POST['conf_comp'] == 'false')
			{
				header('Location:https:http://www.chayds.com.br/loja/indexlja.php');
			}
		
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
		
		header('Location:https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code='.$xml -> code);
		
		
		}//if operação concluida
		else
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_compra.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao efetuar a compra do produto $nome_comp_usu. Por favor, tente novamente.\");
			</script>";
		}//Else operação concluida

}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/usuario/cadastro/alt_usuario.php'>
	<script type= \"text/javascript\">
	alert(\"Antes de conclir a sua compra cadastre todas as informações adicionais de usuário.\");
	</script>";
}
mysqli_close($conn);
?>