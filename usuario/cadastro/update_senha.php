<?php
session_start();

include_once("../../bd/conexao/conexao.php");

if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
		/*
	$nome_usu = trim(filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING));
	$sexo_usu = trim(filter_input(INPUT_GET, 'sexo_usu', FILTER_SANITIZE_STRING));
	$tel_usu = trim(filter_input(INPUT_GET, 'tel_usu', FILTER_SANITIZE_STRING));
	$senha_usu = trim(filter_input(INPUT_GET, 'senha_usu', FILTER_SANITIZE_STRING));
	$conf_senha_usu = trim(filter_input(INPUT_GET, 'conf_senha_usu', FILTER_SANITIZE_STRING));*/
		
		
	$id_usu = $_SESSION['usuarioId'];
	$senha_ant_usu = trim($_POST['senha_ant_usu']);
	//$senha_ant_usu = md5($senha_usu);
	$senha_usu = trim($_POST['senha_usu']);
	//$senha_usu = md5($senha_usu);
	$conf_senha_usu = trim($_POST['conf_senha_usu']);
	//$conf_senha_usu = md5($conf_senha_usu);
		
	if(isset($_POST['alterar']) && $_POST['alterar'] != null && $_POST['senha_ant_usu'] != null && $_POST['senha_usu'] != null && $_POST['conf_senha_usu'] != null)
			{
				if($senha_ant_usu == $_SESSION['usuarioSenha'])
				{
					if($senha_usu == $conf_senha_usu)
					{
						$sqli_comand = "UPDATE tb_usuario
						SET senha_usu = '$senha_usu'
						WHERE id_usu = '$id_usu'";
				
						$result = mysqli_query($conn, $sqli_comand);
				
						if (mysqli_affected_rows($conn) != 0)
						{
							echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../bd/valida/sair.php'>
							<script type= \"text/javascript\">
							alert(\"A senha foi alterada com sucesso.\");
							</script>";
						}
						else
						{
						echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/usuario/cadastro/alt_senha.php'>
							<script type= \"text/javascript\">
							alert(\"Erro ao alterar a senha. Por favor, tente novamente.\");
							</script>";
						}
					}
					else
					{
						echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/usuario/cadastro/alt_senha.php'>
							<script type= \"text/javascript\">
							alert(\"Erro ao alterar a senha, as senhas são diferentes. Por favor, tente novamente.\");
							</script>";
					}
					
				}
				else
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/usuario/cadastro/alt_senha.php'>
							<script type= \"text/javascript\">
							alert(\"Erro ao alterar a senha, a senha antiga não corresponde. Por favor, tente novamente.\");
							</script>";
				}
	}
	else
	{
		
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/usuario/cadastro/alt_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao alterar a senha. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
			</script>";
	}
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/'>
	<script type= \"text/javascript\">
	alert(\"Erro ao acessar a página. uauário ou senha incorretos.\");
	</script>";
}//IF SESSAO
mysqli_close($conn);
?>