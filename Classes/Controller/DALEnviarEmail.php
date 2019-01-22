<?php include_once("../Model/EmailContato.php"); ?>
<?php include_once("../Model/EnviarEmail.php"); ?>
<?php

$emailEnviar = "professor_alessandro@hotmail.com";
$assunto = trim($_POST['assunto']);
$nome = trim($_POST['nome']);
$end = trim($_POST['endereco']);
$complemento = trim($_POST['complemento']);
$bairro = trim($_POST['bairro']);
$cidade = trim($_POST['cidade']);
$estado = trim($_POST['estado']);
$cep = trim($_POST['cep']);
$remetente = trim($_POST['email']);
$telefone = trim($_POST['telefone']);
$mensagem = trim($_POST['mensagem']);

if(isset($_POST['assunto']) && $_POST['assunto'] != null  && isset($_POST['nome']) && $_POST['nome'] != null && isset($_POST['endereco']) && $_POST['endereco'] != null && isset($_POST['cidade']) && $_POST['cidade'] != null && isset($_POST['estado']) && $_POST['estado'] != null && isset($_POST['cep']) && $_POST['cep'] != null && isset($_POST['email']) && $_POST['email'] != null && isset($_POST['telefone']) && $_POST['telefone'] != null && isset($_POST['mensagem']) && $_POST['mensagem'] != null)
{
	$msg = new EmailContato();
	
	$mailOk = $msg->enviarEmail($emailEnviar, $assunto, $nome, $end, $complemento, $bairro, $cidade, $estado,$cep, $remetente, $telefone, $mensagem);
	
	if(!$mailOk)
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
		<script type= \"text/javascript\">
		alert(\"O seu $nome email foi enviado com sucesso.\");
		</script>";
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/contato_chayds.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao enviar a mensagem. Tente novamente\");
		</script>";
	}
}
else
{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/contato_chayds.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao enviar a mensagem. Por favor verifique os campos obrigatórios e tente novamente\");
		</script>";
}
?>