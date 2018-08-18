<?php include_once("../../phpfunctions/dinheiro/pontovirgula.php");?>
<?php include_once("../conexao/conexao.php"); ?>

<?php
/*
$nome_usu = trim(filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING));
$sexo_usu = trim(filter_input(INPUT_GET, 'sexo_usu', FILTER_SANITIZE_STRING));
$tel_usu = trim(filter_input(INPUT_GET, 'tel_usu', FILTER_SANITIZE_STRING));
$senha_usu = trim(filter_input(INPUT_GET, 'senha_usu', FILTER_SANITIZE_STRING));
$conf_senha_usu = trim(filter_input(INPUT_GET, 'conf_senha_usu', FILTER_SANITIZE_STRING));*/

session_start();
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
		
		$id_func = trim($_POST['id_func']);
$nome_func = trim($_POST['nome_func']);
$cargo_func = trim($_POST['cargo_func']);
$escol_func = trim($_POST['escol_func']);
$sexo_func = trim($_POST['sexo_func']);
$nome_depart_func = trim($_POST['nome_depart_func']);
$email_func = trim($_POST['email_func']);
$tel_func_1 = trim($_POST['tel_func_1']);
$tel_func_2 = trim($_POST['tel_func_2']);
$senha_func = trim($_POST['senha_func']);
$conf_senha_func = trim($_POST['conf_senha_func']);
$gerente_resp_func = trim($_POST['gerente_resp_func']);
$end_func = trim($_POST['end_func']);
$complemento_func = trim($_POST['complemento_func']);
$bairro_func = trim($_POST['bairro_func']);
$cidade_func = trim($_POST['cidade_func']);
$estado_func = trim($_POST['estado_func']);
$cep_func = trim($_POST['cep_func']);
$data_demis = trim($_POST['data_demis']);
$coment_func = trim($_POST['coment_func']);
$coment_func_demis = trim($_POST['coment_func_demis']);

if(isset($_POST['alterar']) && $_POST['alterar'] != null && $_POST['cargo_func'] != null && $_POST['escol_func'] != null && $_POST['sexo_func'] != null && $_POST['nome_depart_func'] != null && $_POST['email_func'] != null && $_POST['tel_func_1'] != null && $_POST['senha_func'] != null && $_POST['conf_senha_func'] != null && $_POST['gerente_resp_func'] != null && $_POST['end_func'] != null && $_POST['cidade_func'] != null && $_POST['estado_func'] != null && $_POST['cep_func'] != null)
{
	if($senha_func == $conf_senha_func)
	{

		$sqli_comand = "UPDATE tb_funcionario
		SET cargo_func  = '$cargo_func',
		escol_func = '$escol_func',
		sexo_func = '$sexo_func',
		nome_depart_func = '$nome_depart_func',
		email_func = '$email_func',
		tel_func_1 = '$tel_func_1',
		tel_func_2 = '$tel_func_2',
		senha_func = '$senha_func',
		gerente_resp_func = '$gerente_resp_func',
		end_func = '$end_func',
		complemento_func = '$complemento_func',
		bairro_func = '$bairro_func',
		cidade_func = '$cidade_func',
		estado_func = '$estado_func',
		cep_func = '$cep_func',
		data_demis = '$data_demis',
		coment_func = '$coment_func',
		coment_func_demis = '$coment_func_demis'
		WHERE id_func = '$id_func'";

		$result = mysqli_query($conn, $sqli_comand);
		
/*Local
		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//localhost/admin/busca/busca_funcionario.php'>
			<script type= \"text/javascript\">
			alert(\"O usuário $nome_usu foi alterado com sucesso.\");
			</script>";
		}
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//localhost/admin/busca/busca_funcionario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao alterar o usuário. Por favor, tente novamente.\");
			</script>";
		}
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//localhost/admin/busca/busca_funcionario.php'>
			<script type= \"text/javascript\">
			alert(\"Senhas diferentes. Por favor, tente novamente.\");
			</script>";
	}
	
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//localhost/admin/busca/busca_funcionario.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao alterar o usuário. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
		</script>";
}*/
//Web
		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_funcionario.php'>
			<script type= \"text/javascript\">
			alert(\"O funcionário $nome_func foi alterado com sucesso.\");
			</script>";
		}
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_funcionario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao alterar o funcionário $nome_func. Por favor, tente novamente.\");
			</script>";
		}
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_funcionario.php'>
			<script type= \"text/javascript\">
			alert(\"Senhas diferentes. Por favor, tente novamente.\");
			</script>";
	}
	
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_funcionario.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao alterar o funcionário $nome_func. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
		</script>";
}

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



mysqli_close($conn);
?>