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
		include_once("../../bd/conexao/conexao.php");
		
		//VARIAVEIS DO METODO POST
		$nome_prod = trim($_POST['nome_prod']);
		$valor_frete = trim($_POST['valFrete']);
		//COMPRA NO MERCADOPAGO
		$data['itemId1'] = trim($_POST['id_prod']);//CODIFO DO PRODUTO
		$id_prod = trim($_POST['id_prod']);
		
		$data['itemQuantity1'] = '1';//QUANTIDADE DO PRODUTO
		$data['token'] ='BC4F456821414523B1D3F14D193F909B';//TOKEN SANDYBOX PAGUE SEGURO
		$data['email'] = 'professor_alessandro@hotmail.com';//EMAIL PAGUESEGURO
		$data['currency'] = 'BRL';//TIPO DA MOEDA
					
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/';//URL SANDYBOX
		
		//INCLUSAO TABELA COMPRA
		
		//GERA  CODIGO DO PRODUTO
		$cod1 = date("d/m/Y");
		$cod2 = $_SESSION['usuarioId'];
		$cod4 = date("His");
		
		//INFORMAÇÕES DO PRODUTO
		$val_uni_comp_usu = trim($_POST['val_uni_comp_usu']);//VALOR UNITARIO DO PRODUTO
		$quant_prod_usu = trim($_POST['quant_prod_usu']);//QUANTIDADE DO PRODUTO
		$cod_comp_usu = "$cod4"."$cod1"."$cod2"; //CODIGO ALEATÓRIO DA COMPRA
		$val_comp_usu = ($quant_prod_usu * $val_uni_comp_usu) + $valor_frete;//CALCULO DO VALOR TOT DA COMPRA
		$data['itemAmount1'] = $val_comp_usu;//VALOR TOTAL DA COMPRA
		$tp_fret_comp_usu = trim($_POST['tp_fret_comp_usu']);//QUANTIDADE DO PRODUTO
		$status_comp_usu = '25';

		//INFORMAÇÕES DO USUÁRIO
		$nome_comp_usu = $_SESSION['usuarioNome'];//NOME DO USUARIO DA SESSAO
		$email_comp_usu = $_SESSION['usuarioEmail'];//EMAIL  DO USUARIO DA SESSAO
		$nome_prod_usu = trim($_POST['nome_prod']);//NOME DO PRODUTO
		
		$cpf_comp_usu = $_SESSION['usuarioCPF'];//CPF DO UUSUÁRIO

		//A completar
		
		$sqli_comand = "INSERT INTO `tb_compra`(`cod_comp_usu`,`nome_comp_usu`,`email_comp_usu`,`nome_prod_usu`,`quant_prod_usu`,`dt_comp_usu`,`val_uni_comp_usu`,`val_frete_comp_usu`,`val_comp_usu`,`cpf_comp_usu`,`status_comp_usu`,`tp_fret_comp_usu`) VALUES ('$cod_comp_usu','$nome_comp_usu','$email_comp_usu','$nome_prod_usu','$quant_prod_usu',curdate(),'$val_uni_comp_usu','$valor_frete','$val_comp_usu','$cpf_comp_usu','$status_comp_usu','$tp_fret_comp_usu')";
		$result = mysqli_query($conn, $sqli_comand);

//INCLUSAO TABELA COMPRA FIM

//SETA ID COMPRA

		$sql = "SELECT id_comp_usu FROM `tb_compra` WHERE cod_comp_usu = '$cod_comp_usu' && email_comp_usu = '$email_comp_usu' && nome_prod_usu = '$nome_prod_usu' && 	quant_prod_usu = '$quant_prod_usu' ";
		$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
		if (mysqli_affected_rows($conn) != 0)
		{
		//COMPRA NO MERCADOPAGO
			while($dados = mysqli_fetch_array($resultado))
			{	
				$id_comp_usu = $dados['id_comp_usu'];
			}
		$data['reference'] = $id_comp_usu; //CODIGO DE REF
		$data['itemDescription1'] = $nome_prod_usu." .Pedido ".$id_comp_usu; //NOME DO PRODUTO E CODIGO DE REF
		
		$sql = "SELECT quant_prod, quant_min_prod FROM tb_produto WHERE nome_prod = '$nome_prod' LIMIT 1";
		$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
		if (mysqli_affected_rows($conn) != 0)
		{
		//COMPRA NO MERCADOPAGO
			while($dados = mysqli_fetch_array($resultado))
			{	
				$quant_prod_disp = $dados['quant_prod'];
				$quant_min_prod = $dados['quant_min_prod'];
				
					if($quant_prod_disp < $quant_prod_usu)
					{
						echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/loja/indexlja.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao efetuar a compra do produto $nome_comp_usu.</br>a quantidade disponível é $quant_prod_disp.</br>por favor compre novamente.\");
			</script>";
					}
					else
					{
						$quant_prod_disp = $quant_prod_disp - $quant_prod_usu;
						
						$sqli_comand = "UPDATE tb_produto
						SET quant_prod = '$quant_prod_disp'
						WHERE id_prod = '$id_prod'
						";
						$result = mysqli_query($conn, $sqli_comand);
						if($quant_prod_disp <= $quant_min_prod)
						{
							mail('comercial@chayds.com.br','O produto: '.$nome_prod.' cod: '.$id_prod.' esta  abaixo de '.$quant_min_prod.' unidades', "
							
	esta e um contato enviado para informar que o produto $nome_prod esta atuamente com $quant_prod_disp unidades.
	O estoque critico e $quant_min_prod unidades, que e o estoque minimo recomendado. Solicitamos que o produto seja
	solicitado juntamente ao fornecedor para que as vendas nao sejam prejudicadas
			
	atenciosamente, a gerencia. ");
						}//MAIL
					}//ELSE
				}//WHILE
			}//ELSE
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