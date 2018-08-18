<?php
session_start();
include_once("../conexao/conexao.php");

if(isset($_POST['logar']) && isset($_POST['email_usu']) && isset($_POST['senha_usu']))
{
$email_usu = mysqli_real_escape_string($conn, $_POST['email_usu']); //Escapar de injeção sql

$senha_usu = mysqli_real_escape_string($conn, $_POST['senha_usu']);
//$senha_usu = md5($senha_usu);

$sqli = "SELECT * FROM `tb_usuario` WHERE email_usu = '$email_usu' && senha_usu = '$senha_usu' LIMIT 1";
$result = mysqli_query($conn, $sqli);

$resultado = mysqli_fetch_assoc($result);

	if(empty($resultado))
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../index.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao logar. Por favor verifique login e senha, tente novamente.\");
		</script>";
	}
	elseif(isset($resultado))
	{
		$_SESSION['usuarioId'] = $resultado['id_usu'];
		$_SESSION['usuarioNome'] = $resultado['nome_usu'];
		
		$_SESSION['usuarioCPF'] = $resultado['cpf_usu'];
		$_SESSION['usuarioTel'] = $resultado['tel_usu'];
		$_SESSION['usuarioTelDDD'] = $resultado['ddd_usu'];
		$_SESSION['usuarioAcessoNiveis'] = $resultado['nome_nivel_acesso'];
		$_SESSION['usuarioNasci'] = $resultado['dt_nasc_usu'];
		$_SESSION['usuarioEmail'] = $resultado['email_usu'];
		$_SESSION['usuarioSenha'] = $resultado['senha_usu'];
		$_SESSION['usuarioEnd'] = $resultado['end_usu'];
		$_SESSION['usuarioCompl'] = $resultado['complemento_usu'];
		$_SESSION['usuarioBairro'] = $resultado['bairro_usu'];
		$_SESSION['usuarioCid'] = $resultado['cidade_usu'];
		$_SESSION['usuarioEstado'] = $resultado['estado_usu'];
		$_SESSION['usuarioCep'] = $resultado['cep_usu'];
		
		
		header("Location: ../../index.php");
	}
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../index.php'>
			<script type= \"text/javascript\">
			alert(\"Usuário ou senha inválido. verifique os campos obrigatórios.\");
			</script>";
}
mysqli_close($conn);
?>