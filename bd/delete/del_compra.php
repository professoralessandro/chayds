<?php
session_start();
include_once("../conexao/conexao.php");
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
		
		$id_comp_usu = filter_input(INPUT_GET, 'id_comp_usu', FILTER_SANITIZE_NUMBER_INT);
		$sqli = "DELETE FROM tb_compra WHERE id_comp_usu = '$id_comp_usu'";
		$result = mysqli_query($conn, $sqli);
		
		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_compra.php'>
			<script type= \"text/javascript\">
			alert(\"a compra foi deletada com sucesso.\");
			</script>";
		}//if operação concluida
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_compra.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao deletar a compra. Por favor tente novamente.\");
			</script>";
		}//else aoperação concluida
		
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