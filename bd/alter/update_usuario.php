<?php include_once("../../phpfunctions/dinheiro/pontovirgula.php");?>
<?php include_once("../conexao/conexao.php"); ?>
<?php
session_start();

if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
		$conf_id_usu = trim(filter_input(INPUT_GET, 'conf_id_usu', FILTER_SANITIZE_NUMBER_INT));
		/*
		$nome_usu = trim(filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING));
		$sexo_usu = trim(filter_input(INPUT_GET, 'sexo_usu', FILTER_SANITIZE_STRING));
		$tel_usu = trim(filter_input(INPUT_GET, 'tel_usu', FILTER_SANITIZE_STRING));
		$senha_usu = trim(filter_input(INPUT_GET, 'senha_usu', FILTER_SANITIZE_STRING));
		$conf_senha_usu = trim(filter_input(INPUT_GET, 'conf_senha_usu', FILTER_SANITIZE_STRING));*/
		
		
		$id_usu = trim($_POST['conf_id_usu']);
		$nome_usu = trim($_POST['nome_usu']);
		$sexo_usu = trim($_POST['sexo_usu']);
		$nome_nivel_acesso = trim($_POST['nome_nivel_acesso']);
		$ddd_usu = trim($_POST['ddd_usu']);
		$tel_usu = trim($_POST['tel_usu']);
		$end_usu = trim($_POST['end_usu']);
		$complemento_usu = trim($_POST['complemento_usu']);
		$bairro_usu = trim($_POST['bairro_usu']);
		$cidade_usu = trim($_POST['cidade_usu']);
		$estado_usu = trim($_POST['estado_usu']);
		$cep_usu = trim($_POST['cep_usu']);
		$senha_usu = trim($_POST['senha_usu']);
		//$senha_usu = md5($senha_usu);
		$conf_senha_usu = trim($_POST['conf_senha_usu']);
		//$conf_senha_usu = md5($conf_senha_usu);
		
			if(isset($_POST['alterar']) && $_POST['alterar'] != null && $_POST['nome_usu'] != null && $_POST['sexo_usu'] != null && $_POST['senha_usu'] != null && $_POST['conf_senha_usu'] != null && $_POST['nome_nivel_acesso'] != null && $_POST['ddd_usu'] != null && $_POST['tel_usu'] != null && $_POST['end_usu'] != null && $_POST['bairro_usu'] != null && $_POST['cidade_usu'] != null && $_POST['estado_usu'] != null && $_POST['cep_usu'] != null)
			{
			if($senha_usu == $conf_senha_usu)
			{

				$sqli_comand = "UPDATE tb_usuario
				SET nome_usu = '$nome_usu',
				sexo_usu = '$sexo_usu',
				nome_nivel_acesso = '$nome_nivel_acesso',
				ddd_usu = '$ddd_usu',
				tel_usu = '$tel_usu',
				end_usu = '$end_usu',
				complemento_usu = '$complemento_usu',
				bairro_usu = '$bairro_usu',
				cidade_usu = '$cidade_usu',
				estado_usu = '$estado_usu',
				cep_usu = '$cep_usu',
				senha_usu = '$senha_usu'
				WHERE id_usu = '$id_usu'
				";
		
				$result = mysqli_query($conn, $sqli_comand);
		
				if (mysqli_affected_rows($conn) != 0)
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/busca/busca_usuario.php'>
					<script type= \"text/javascript\">
					alert(\"O usuário $nome_usu foi alterado com sucesso.\");
					</script>";
				}
				else
				{
				echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/busca/busca_usuario.php'>
					<script type= \"text/javascript\">
					alert(\"Erro ao alterar o usuário. Por favor, tente novamente.\");
					</script>";
				}
			}
			else
			{
				echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/busca/busca_usuario.php'>
				<script type= \"text/javascript\">
				alert(\"Senhas diferentes. Por favor, tente novamente.\");
				</script>";
			}
	
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao alterar o usuário. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
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
mysqli_close($conn);
?>