<?php include_once("../conexao/conexao.php"); ?>

<?php
session_start();
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
		
		$id_depart = trim($_POST['id_depart']);
$email_comer_depart = trim($_POST['email_comer_depart']);
$tel_depart = trim($_POST['tel_depart']);

if(isset($_POST['alterar']) && $_POST['alterar'] != null && $_POST['email_comer_depart'] != null && $_POST['tel_depart'] != null)
{
		$sqli_comand = "UPDATE tb_departamento
		SET email_comer_depart = '$email_comer_depart',
		tel_depart = '$tel_depart'
		WHERE id_depart = $id_depart
		";

		$result = mysqli_query($conn, $sqli_comand);

		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../admin/busca/busca_depart.php'>
			<script type= \"text/javascript\">
			alert(\"O adepartamento foi alterado com sucesso .\");
			</script>";
		}//if alteração realizada
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../admin/busca/busca_depart.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao alterar o departamento .\");
			</script>";
		}//else alteração realizada
}//if existe campos departamento
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../admin/busca/busca_depart.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao alterar o departamento. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
		</script>";
}//else existe campos departamento

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


/* local
		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//www.chayds.com.br/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"O usuário $nome_usu foi alterado com sucesso.\");
			</script>";
		}
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//www.chayds.com.br/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao alterar o usuário $nome_usu. Por favor, tente novamente.\");
			</script>";
		}
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//www.chayds.com.br/admin/busca/busca_usuario.php'>
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