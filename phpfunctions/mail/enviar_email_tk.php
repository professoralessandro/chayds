<?php
$emailEnviar_tk = "professor_alessandro@hotmail.com";
$assunto_tk = "novo pedido";
$nome_mail_tk = $_POST['nome_mail_tk'];
$end_mail_tk = $_POST['end_mail_tk'];
$bairro_mail_tk = $_POST['bairro_mail_tk'];
$cidade_mail_tk = $_POST['cidade_mail_tk'];
$remetente_mail_tk = $_POST['remetente_mail_tk'];
$telefone_mail_tk = $_POST['telefone_mail_tk'];
$telefone2_mail_tk = $_POST['telefone2_mail_tk'];
$pg_tp_tk = $_POST['pg_tp_tk'];
$band_ct_tk = $_POST['band_ct_tk'];
$tr_dn_tk = $_POST['tr_dn_tk'];
$mensagem_mail_tk = $_POST['mensagem_mail_tk'];
$data = date("d/m/Y");
$hora = date("H");
$hora = $hora - 3;
$minseg = date(": i : s"); 

if(isset($_POST['enviar']) && $_POST['enviar'] != null && $_POST['nome_mail_tk'] != null   && $_POST['end_mail_tk'] != null && $_POST['bairro_mail_tk'] != null && $_POST['cidade_mail_tk'] != null && $_POST['telefone_mail_tk'] != null && $_POST['pg_tp_tk'] != null && $_POST['mensagem_mail_tk'] != null)
{

if (mail($emailEnviar_tk, $assunto_tk, "
    
esta é um contato enviado por $nome_mail_tk com as seguntes informações:
    
Assunto: $assunto_tk
Nome: $nome_mail_tk
data: $data;
hora: $hora $minseg
Endereço: $end_mail_tk
Bairro: $bairro_mail_tk
Cidade: $cidade_mail_tk
Remetente : $remetente_mail_tk
Telefone: $telefone_mail_tk
Telefone2: $telefone2_mail_tk
Tipo de pagamento: $pg_tp_tk
Bandeira do cartão: $band_ct_tk
Valor do troco: $tr_dn_tk
	
--
mensagem:
$mensagem_mail_tk
    
    "))
{
	echo "Pedido feito com sucesso!";
}
else
{
	echo "Erro ao enviar pedido, tente novamente";
}
}
else
{
	echo "Verifique os campos obrigatórios e faça o pedido novamente";
}
?>