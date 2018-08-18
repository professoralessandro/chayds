<?php
session_start();

//FUNÇÃO VALOR MOEDA PONTOS
function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}
function virgula($get_valor) {
$source = array(',', '.');
$replace = array('', ',');
$valor = str_replace($source, $replace, $get_valor); //remove as virgulas e substitui por virgula
return $valor; //retorna o valor formatado para gexibir para o usuario
}
//FIM DA FUNÇÃO

include_once("../conexao/conexao.php");
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
	$nome_prod = trim($_POST['nome_prod']);
	$cod_inter_prod = trim($_POST['cod_inter_prod']);
	$descri_prod = trim($_POST['descri_prod']);
	$quant_prod = trim($_POST['quant_prod']);
	$quant_min_prod = trim($_POST['quant_min_prod']);
	$vl_alt_prod = trim($_POST['vl_alt_prod']);
	$vl_larg_prod = trim($_POST['vl_larg_prod']);
	$vl_cmpri_prod = trim($_POST['vl_cmpri_prod']);
	$vl_peso_prod = moeda(trim($_POST['vl_peso_prod']));
	$public_alvo = trim($_POST['public_alvo']);
	$cod_barras_prod = trim($_POST['cod_barras_prod']);
	$nome_forne_prod = trim($_POST['nome_forne_prod']);
	$preco_custo = moeda(trim($_POST['preco_custo']));
	$preco_venda = moeda(trim($_POST['preco_venda']));
	$preco_desc = moeda(trim($_POST['preco_desc']));
	$coment_prod = trim($_POST['coment_prod']);
	
	/* TESTE DAS NOVAS VARIAVEIS
	echo "Altura: ".$vl_alt_prod."</br>";
	echo "Largura: ".$vl_larg_prod."</br>";
	echo "Cumprimento: ".$vl_cmpri_prod."</br>";
	echo "Peso: ".$vl_peso_prod."</br>";
	echo "Preço custo: ".$preco_custo."</br>";
	echo "Preço venda: ".$preco_venda."</br>";
	echo "Preço desc: ".$preco_desc;*/
	
	if(isset($_POST['enviar']) && $_POST['enviar'] != null  && isset($_POST['nome_prod']) &&  $_POST['nome_prod'] != null && isset($_POST['cod_inter_prod']) && $_POST['cod_inter_prod'] != null && isset($_POST['descri_prod']) && $_POST['descri_prod'] != null  && isset($_POST['quant_prod']) && $_POST['quant_prod'] != null && isset($_POST['cod_barras_prod']) && $_POST['cod_barras_prod'] != null  && isset($_POST['nome_forne_prod']) && $_POST['nome_forne_prod'] != null  && isset($_POST['preco_custo']) && $_POST['preco_custo'] != null  && isset($_POST['preco_venda']) && $_POST['preco_venda'] != null && isset($_POST['vl_alt_prod']) && $_POST['vl_alt_prod'] != null && isset($_POST['vl_larg_prod']) && $_POST['vl_larg_prod'] != null && isset($_POST['vl_cmpri_prod']) && $_POST['vl_cmpri_prod'] != null && isset($_POST['vl_peso_prod']) && $_POST['vl_peso_prod'] != null && isset($_POST['quant_min_prod']) && $_POST['quant_min_prod'] != null)
	{
		$sqli_comand = "INSERT INTO `tb_produto` (`nome_prod`,`cod_inter_prod`,`dt_cad_prod`, `descri_prod`, `quant_prod`, `public_alvo`, `cod_barras_prod`, `nome_forne_prod`,`preco_custo`,`preco_venda`, `coment_prod`,`vl_alt_prod`,`vl_larg_prod`,`vl_cmpri_prod`,`vl_peso_prod`,`preco_desc`,`quant_min_prod`) VALUES ('$nome_prod','$cod_inter_prod',curdate(),'$descri_prod','$quant_prod','$public_alvo','$cod_barras_prod', '$nome_forne_prod','$preco_custo','$preco_venda','$coment_prod','$vl_alt_prod','$vl_larg_prod','$vl_cmpri_prod','$vl_peso_prod','$preco_desc', $quant_min_prod)";

	$result = mysqli_query($conn, $sqli_comand);

	if (mysqli_affected_rows($conn) != 0)
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_produto.php'>
			<script type= \"text/javascript\">
			alert(\"O produto $nome_prod foi cadastrado com sucesso.\");
			</script>";
	}//If operaçãoi concluida
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_produto.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao cadastrar o proaduto $nome_prod. Por favor, tente novamente.\");
			</script>";
	}//Else operaçãoi concluida
}//if existem campos produto
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_produto.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao cadastrar o proaduto $nome_prod. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
		</script>";
}//Else existem campos produto
	}// if Niavel acesso
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../login/validausuario.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao acessar a página. Seu nível de acesso nao tem a permissão para esta página.\");
		</script>";
	}//Else Nivel Acesso
}//if Existe campo
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../login/validausuario.php'>
	<script type= \"text/javascript\">
	alert(\"Erro ao acessar a página. uauário ou senha incorretos.\");
	</script>";
}//Else existe campos
	

mysqli_close($conn);
?>