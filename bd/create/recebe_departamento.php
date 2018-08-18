<?php include_once("../conexao/conexao.php");?>
<?php

session_start();

if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
		    $cod_depart = trim($_POST['cod_depart']);
			$geren_depart = trim($_POST['geren_depart']);
			$nome_depart = trim($_POST['nome_depart']);
			$geren_depart = trim($_POST['geren_depart']);
			$email_depart = trim($_POST['email_depart']);
			$email_comer_depart = trim($_POST['email_comer_depart']);
			$tel_depart = trim($_POST['tel_depart']);
			
			
			if(isset($_POST['enviar']) && $_POST['enviar'] != null  && isset($_POST['nome_depart']) && $_POST['nome_depart'] != null   && isset($_POST['geren_depart']) && $_POST['geren_depart'] != null   && isset($_POST['email_comer_depart']) && $_POST['email_comer_depart'] != null   && isset($_POST['tel_depart']) && $_POST['tel_depart'])
			{
				$sqli_comand = "INSERT INTO `tb_departamento` (`cod_depart`,`nome_depart`,`geren_depart`,`email_depart`,`email_comer_depart`,`tel_depart`,`data_depart`) VALUES ('$cod_depart','$nome_depart','$geren_depart','$email_depart','$email_comer_depart','$tel_depart',curdate())";
			
				$result = mysqli_query($conn, $sqli_comand);
			
				if (mysqli_affected_rows($conn) != 0)
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_depart.php'>
						<script type= \"text/javascript\">
						alert(\"O departamento $nome_depart foi cadastrado com sucesso.\");
						</script>";
				}//If operação concluida departamento
				else
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_depart.php'>
						<script type= \"text/javascript\">
						alert(\"Erro ao cadastrar o departamento $nome_depart. Por favor, tente novamente.\");
						</script>";
				}//else operação concluida departamento
			}//IF Campos existe departamento
			else
			{
				echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_depart.php'>
					<script type= \"text/javascript\">
					alert(\"Erro ao cadastrar o departamento $nome_depart. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
					</script>";
			}//else Campos existe departamento

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