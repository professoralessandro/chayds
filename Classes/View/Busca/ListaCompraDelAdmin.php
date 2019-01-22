<?php session_start(); ?>
<?php include_once("../../Controller/DALPessoa.php"); ?>
<?php include_once("../../Controller/DALProduto.php"); ?>
<?php include_once("../../Controller/DALCompra.php"); ?>
<?php include_once("../../Model/Pessoa.php"); ?>
<?php include_once("../../Model/Produto.php"); ?>
<?php include_once("../../Model/Compra.php"); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php
if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] != null && $_SESSION['usuarioAcessoNiveis'] == 'Gerente')
{

	$conexao = new Conexao();
	$dalProduto = new DALProduto($conexao);
	$dalPessoa = new DALPessoa($conexao);
	$dalCompra = new DALCompra($conexao);

	$id = trim(filter_input(INPUT_GET, 'idCompra', FILTER_SANITIZE_NUMBER_INT));
	
	$usuariodelOK = $dalCompra->excluirCompra($id);

	if(!$usuariodelOK)
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/Classes/View/Loja/ConfirmarCompra.php'>
		<script type= \"text/javascript\">
		alert(\"O produto foi deletado com sucesso.\");
		</script>";
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao deletar o produto. Tente novamente\");
		</script>";
	}
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
		<script type= \"text/javascript\">
		alert(\"Você não tem autorização.\");
		</script>";
}
?>