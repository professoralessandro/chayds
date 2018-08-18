<?php
session_start();
include_once("../conexao/conexao.php");
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
			$nome_func = trim($_POST['nome_func']);
			$num_registro_func = trim($_POST['num_registro_func']);
			$num_rg_func = trim($_POST['num_rg_func']);
			$num_cpf_func = trim($_POST['num_cpf_func']);
			$cargo_func = trim($_POST['cargo_func']);
			$data_nasc_func = trim($_POST['data_nasc_func']);
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
			$data_contrat = trim($_POST['data_contrat']);
			$coment_func = trim($_POST['coment_func']);
			
			if(isset($_POST['enviar']) && $_POST['enviar'] != null && $_POST['nome_func'] != null && $_POST['num_registro_func'] != null && $_POST['num_rg_func'] != null && $_POST['num_cpf_func'] != null && $_POST['cargo_func'] != null && $_POST['data_nasc_func'] != null && $_POST['escol_func'] != null && $_POST['sexo_func'] != null && $_POST['nome_depart_func'] != null && $_POST['email_func'] != null && $_POST['tel_func_1'] != null && $_POST['senha_func'] != null && $_POST['conf_senha_func'] != null && $_POST['gerente_resp_func'] != null && $_POST['end_func'] != null && $_POST['cidade_func'] != null && $_POST['estado_func'] != null && $_POST['cep_func'] != null && $_POST['data_contrat'] != null)
			{
				if($senha_func == $conf_senha_func)
				{
			
					$sqli_comand = "INSERT INTO `tb_funcionario`(`nome_func`,`num_registro_func`,`num_rg_func`,`num_cpf_func`,`cargo_func`,`data_nasc_func`,`escol_func`,`sexo_func`,`nome_depart_func`,`email_func`,`tel_func_1`,`tel_func_2`,`senha_func`,`gerente_resp_func`,`end_func`,`complemento_func`,`bairro_func`,`cidade_func`,`estado_func`,`cep_func`,`data_contrat`,`coment_func`)VALUES('$nome_func','$num_registro_func','$num_rg_func','$num_cpf_func','$cargo_func','$data_nasc_func','$escol_func','$sexo_func','$nome_depart_func','$email_func','$tel_func_1','$tel_func_2','$senha_func','$gerente_resp_func','$end_func','$complemento_func','$bairro_func','$cidade_func','$estado_func','$cep_func','$data_contrat','$coment_func')";
			
					$result = mysqli_query($conn, $sqli_comand);
			
					if (mysqli_affected_rows($conn) != 0)
					{
						echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_funcionario.php'>
						<script type= \"text/javascript\">
						alert(\"O funcionário $nome_func foi cadastrado com sucesso.\");
						</script>";
					}
					else
					{
						echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_funcionario.php'>
						<script type= \"text/javascript\">
						alert(\"Erro ao cadastrar o funcionário $nome_func. Por favor, tente novamente.\");
						</script>";
					}
				}//if Operação concluida
				else
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_funcionario.php'>
					<script type= \"text/javascript\">
					alert(\"Erro ao cadastrar o funcionário $nome_func .As senhas não conferem .Por favor, tente novamente.\");
					</script>";
				}//Else Operação concluida
			}//if existem campos funcionario
			else
			{
				echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_funcionario.php'>
				<script type= \"text/javascript\">
				alert(\"Erro ao cadastrar o funcionário $nome_func. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
				</script>";
			}//Else existem campos funcionario

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