<?php
session_start();
include_once("../conexao/conexao.php");
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
		$id_func = filter_input(INPUT_GET, 'id_func', FILTER_SANITIZE_NUMBER_INT);
		$sqli = "DELETE FROM tb_funcionario WHERE id_func = '$id_func'";
		$result = mysqli_query($conn, $sqli);
		
		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"o usuário foi deletado com sucesso.\");
			</script>";
		}
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao deletar  o usuário. Por favor tente novamente.\");
			</script>";
		}
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