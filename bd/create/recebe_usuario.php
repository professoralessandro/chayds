<?php
session_start();
include_once("../conexao/conexao.php");
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
$nome_usu = trim($_POST['nome_usu']);
$cpf_usu = trim($_POST['cpf_usu']);
$dt_nasc_usu = trim($_POST['dt_nasc_usu']);
$sexo_usu = trim($_POST['sexo_usu']);
$email_usu = trim($_POST['email_usu']);
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
if(isset($_POST['enviar']) && $_POST['enviar'] != null && $_POST['nome_usu'] != null && $_POST['dt_nasc_usu'] != null && $_POST['sexo_usu'] != null && $_POST['email_usu'] != null && $_POST['nome_nivel_acesso'] != null && $_POST['senha_usu'] != null && $_POST['conf_senha_usu'] != null && $_POST['ddd_usu'] != null && $_POST['tel_usu'] != null && $_POST['end_usu'] != null && $_POST['bairro_usu'] != null && $_POST['cidade_usu'] != null && $_POST['estado_usu'] != null && $_POST['cep_usu'] != null && $_POST['cpf_usu'] != null)
{
	if($senha_usu == $conf_senha_usu)
	{
		$sqli_comand = "INSERT INTO `tb_usuario`(`nome_usu`,`dt_nasc_usu`,`dt_cad_usu`,`sexo_usu`,`email_usu`,`nome_nivel_acesso`,`ddd_usu`,`tel_usu`, `senha_usu`,`end_usu`,`complemento_usu`,`bairro_usu`,`cidade_usu`,`estado_usu`,`cep_usu`,`cpf_usu`) VALUES ('$nome_usu','$dt_nasc_usu',curdate(),'$sexo_usu','$email_usu','$nome_nivel_acesso','$ddd_usu','$tel_usu','$senha_usu','$end_usu','$complemento_usu','$bairro_usu','$cidade_usu','$estado_usu','$cep_usu','$cpf_usu')";

		$result = mysqli_query($conn, $sqli_comand);

		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"O usuário $nome_usu foi cadastrado com sucesso.\");
			</script>";
		}//Else Operação concluida
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao cadastrar o usuário $nome_usu. Por favor, tente novamente.\");
			</script>";
		}//Else Operação concluida
	}//if Senhas
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"Senhas diferentes. Por favor, tente novamente.\");
			</script>";
	}//else Senhas
}//if campos usuario
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_usuario.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao cadastrar o usuário $nome_usu. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
		</script>";
}//Else campos usuario

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