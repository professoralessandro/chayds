<?php
include_once("../../bd/conexao/conexao.php");

$nome_usu = trim($_POST['nome_usu']);
$dt_nasc_usu = trim($_POST['dt_nasc_usu']);
$sexo_usu = trim($_POST['sexo_usu']);
$email_usu = trim($_POST['email_usu']);
$ddd_usu = trim($_POST['ddd_usu']);
$tel_usu = trim($_POST['tel_usu']);
$senha_usu = trim($_POST['senha_usu']);
//$senha_usu = md5($senha_usu);
$conf_senha_usu = trim($_POST['conf_senha_usu']);
//$conf_senha_usu = md5($conf_senha_usu);
if(isset($_POST['enviar']) && $_POST['enviar'] != null && $_POST['nome_usu'] != null && $_POST['dt_nasc_usu'] != null && $_POST['sexo_usu'] != null && $_POST['email_usu'] != null && $_POST['ddd_usu'] != null && $_POST['tel_usu'] != null && $_POST['senha_usu'] != null && $_POST['conf_senha_usu'] != null)
{
	if($senha_usu == $conf_senha_usu)
	{
		$sqli_comand = "INSERT INTO `tb_usuario`(`nome_usu`,`dt_nasc_usu`,`dt_cad_usu`,`sexo_usu`,`email_usu`,`ddd_usu`,`tel_usu`, `senha_usu`) VALUES ('$nome_usu','$dt_nasc_usu',curdate(),'$sexo_usu','$email_usu','$ddd_usu','$tel_usu','$senha_usu')";

		$result = mysqli_query($conn, $sqli_comand);

		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/login/validausuario.php'>
			<script type= \"text/javascript\">
			alert(\"O usuário $nome_usu foi cadastrado com sucesso.\");
			</script>";
		}//Else Operação concluida
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/login/validausuario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao cadastrar o usuário $nome_usu. Por favor, tente novamente.\");
			</script>";
		}//Else Operação concluida
	}//if Senhas
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/login/validausuario.php'>
			<script type= \"text/javascript\">
			alert(\"Senhas diferentes. Por favor, tente novamente.\");
			</script>";
	}//else Senhas
}//if campos usuario
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/login/validausuario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao cadastrar o usuário $nome_usu. Verifique os campos obrigatórios e tente novamente.\");
			</script>";
}

mysqli_close($conn);
?>