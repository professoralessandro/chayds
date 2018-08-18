<?php
session_start();

if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/'>
	<script type= \"text/javascript\">
	alert(\"Erro ao efetivar a compra, você precisa estar logado.\");
	</script>";
}
else if($quant_prod <= 1)
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/loja/indexlja.php'>
	<script type= \"text/javascript\">
	alert(\"Erro ao efetivar a compra, a quantidade tem que ser maior que 0 produtos.\");
	</script>";
}
//Inserir compra no banco de dados
function gravarCompra()
{
$cod_comp_usu = '7';//date("d/m/Y")+$_SESSION['usuarioId']+$_POST['quant_prod'];
$nome_comp_usu = 'Alessandro';//$_SESSION['usuarioNome'];
$email_comp_usu = 'teste@teste'.//$_SESSION['usuarioEmail'];
$nome_prod_usu = 'Teste';//trim($dados['nome_prod']);
$quant_prod_usu = '1';//$_POST['quant_prod'];
//A completar
$val_uni_comp_usu = '25.00';//$data['itemAmount1'];
$val_comp_usu = '25.00';//$_POST['quant_prod'] * $data['itemAmount1'];
$cpf_comp_usu = '25.00';//$_SESSION['usuarioCPF'];
$status_comp_usu = '25';
	
$sqli_comand = "INSERT INTO `tb_compra`(`cod_comp_usu`,`nome_comp_usu`,`email_comp_usu`,`nome_prod_usu`,`quant_prod_usu`,`dt_comp_usu`,`val_uni_comp_usu`,`val_comp_usu`,`cpf_comp_usu`,`status_comp_usu`) VALUES ('$cod_comp_usu','$nome_comp_usu','$email_comp_usu','$nome_prod_usu',$quant_prod_usu,curdate(),'$val_comp_usu','$cpf_comp_usu','$status_comp_usu')";
$result = mysqli_query($conn, $sqli_comand);
			
if (mysqli_affected_rows($conn) != 0)
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_compra.php'>
	<script type= \"text/javascript\">
	alert(\"A compra do produto foi comprado com sucesso.\");
	</script>";
}//if operação concluida
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_compra.php'>
    <script type= \"text/javascript\">
	alert(\"Erro ao efetuar a compra do produto $nome_comp_usu. Por favor, tente novamente.\");
	</script>";
}//Else operação concluida
}

?>