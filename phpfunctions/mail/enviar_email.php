<?php
session_start();

$emailEnviar = "professor_alessandro@hotmail.com";
$assunto = trim($_POST['assunto_mail']);
$nome = trim($_POST['nome_mail']);
$end = trim($_POST['end_mail']);
$compl = trim($_POST['compl_mail']);
$bairro = trim($_POST['bairro_mail']);
$cidade = trim($_POST['cidade_mail']);
$estado = trim($_POST['estado_mail']);
$cep = trim($_POST['cep_mail']);
$remetente = trim($_POST['remetente_mail']);
$telefone = trim($_POST['fone_mail']);
$mensagem = trim($_POST['mensagem_mail']);

//TESTE
/*
echo "Enviar para: ".$emailEnviar."</br>";
echo "Assunto: ".$assunto."</br>";
echo "Nome: ".$nome."</br>";
echo "End: ".$end."</br>";
echo "Complemento: ".$compl."</br>";
echo "Bairro: ".$bairro."</br>";
echo "Cidade: ".$cidade."</br>";
echo "Estado: ".$estado."</br>";
echo "Cep: ".$cep."</br>";
echo "Remetente: ".$remetente."</br>";
echo "Telefone: ".$telefone."</br>";
echo "Mensagem: ".$mensagem;
*/
//TESTE
if(isset($_POST['assunto_mail']) && $_POST['assunto_mail'] != null  && isset($_POST['nome_mail']) && $_POST['nome_mail'] != null && isset($_POST['end_mail']) && $_POST['end_mail'] != null && isset($_POST['cidade_mail']) && $_POST['cidade_mail'] != null && isset($_POST['estado_mail']) && $_POST['estado_mail'] != null && isset($_POST['cep_mail']) && $_POST['cep_mail'] != null && isset($_POST['remetente_mail']) && $_POST['remetente_mail'] != null && isset($_POST['fone_mail']) && $_POST['fone_mail'] != null && isset($_POST['mensagem_mail']) && $_POST['mensagem_mail'] != null)
{
	if(mail($emailEnviar, $assunto, "
		
	esta é um contato enviado por $nome com as seguntes informações:
		
	Assunto: $assunto
	Nome: $nome
	Endereço: $end
	Complemento: $compl
	Bairro: $bairro
	Cidade: $cidade
	Estado: $estado
	CEP: $cep
	Remetente: $remetente
	Telefone: $telefone
		
	--
	mensagem:
	$mensagem
		
		"))
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