<?php include_once("../../phpfunctions/dinheiro/pontovirgula.php");?>
<?php include_once("../conexao/conexao.php"); ?>

<?php
session_start();

if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
		
		$id_prod = trim($_POST['id_prod']);
		$nome_prod = trim($_POST['nome_prod']);
		$descri_prod = trim($_POST['descri_prod']);
		$quant_prod = trim($_POST['quant_prod']);
		$quant_min_prod = trim($_POST['quant_min_prod']);
		$vl_alt_prod = trim($_POST['vl_alt_prod']);
		$vl_larg_prod = trim($_POST['vl_larg_prod']);
		$vl_cmpri_prod = trim($_POST['vl_cmpri_prod']);
		$vl_peso_prod = moeda(trim($_POST['vl_peso_prod']));
		$public_alvo = trim($_POST['public_alvo']);
		$nome_forne_prod = trim($_POST['nome_forne_prod']);
		$preco_custo = moeda(trim($_POST['preco_custo']));
		$preco_venda = moeda(trim($_POST['preco_venda']));
		$preco_desc = moeda(trim($_POST['preco_desc']));
		$coment_prod = trim($_POST['coment_prod']);

		if(isset($_POST['alterar']) && $_POST['alterar'] != null && $_POST['id_prod'] != null && $_POST['descri_prod'] != null && $_POST['quant_prod'] != null && $_POST['nome_forne_prod'] != null && $_POST['preco_custo'] != null && $_POST['preco_venda'] != null)
	{
			$sqli_comand = "UPDATE tb_produto
			SET descri_prod = '$descri_prod',
			quant_prod = '$quant_prod',
			quant_min_prod = '$quant_min_prod',
			vl_alt_prod = '$vl_alt_prod',
			vl_larg_prod = '$vl_larg_prod',
			vl_cmpri_prod = '$vl_cmpri_prod',
			vl_peso_prod = '$vl_peso_prod',
			public_alvo = '$public_alvo',
			nome_forne_prod = '$nome_forne_prod',
			preco_custo = '$preco_custo',
			preco_venda = '$preco_venda',
			preco_desc = '$preco_desc',
			coment_prod = '$coment_prod'
			WHERE id_prod = $id_prod
			";
	
			$result = mysqli_query($conn, $sqli_comand);

		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_produto.php'>
			<script type= \"text/javascript\">
			alert(\"O produto $nome_prod foi alterado com sucesso.\");
			</script>";
		}//if operação concluida
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_produto.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao alterar o produto $nome_prod. Por favor, tente novamente.\");
			</script>";
		}//Else operação concluida
}//If existe campos produto
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_produto.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao alterar o produto $nome_prod. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
		</script>";
}//Else Existe Campos produto

	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../login/validausuario.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao acessar a página. Seu nível de acesso nao tem a permissão para esta página.\");
		</script>";
	}
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../login/validausuario.php'>
	<script type= \"text/javascript\">
	alert(\"Erro ao acessar a página. uauário ou senha incorretos.\");
	</script>";
}



/* local
		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL'0;URL=//localhost/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"O usuário $nome_usu foi alterado com sucesso.\");
			</script>";
		}
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//localhost/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao alterar o usuário $nome_usu. Por favor, tente novamente.\");
			</script>";
		}
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//localhost/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"Senhas diferentes. Por favor, tente novamente.\");
			</script>";
	}
	
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//localhost/admin/busca/busca_usuario.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao alterar o usuário $nome_usu. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
		</script>";
}
*/
/*


session_start();
include_once("../conexao/conexao.php");
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{

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

*/
mysqli_close($conn);
?>