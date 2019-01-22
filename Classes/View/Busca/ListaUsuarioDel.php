<?php session_start(); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php include_once("../../Model/Pessoa.php"); ?>
<?php include_once("../../Model/Usuario.php"); ?>
<?php include_once("../../Controller/DALPessoa.php"); ?>

<?php
if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] != null && $_SESSION['usuarioAcessoNiveis'] == 'Gerente')
{
	$cx = new Conexao();

	$dalPessoa = new DALPessoa($cx);

	$id = trim(filter_input(INPUT_GET, 'idPessoa', FILTER_SANITIZE_NUMBER_INT));
	
	$usuariodelOK = $dalPessoa->excluirPessoa($id);
	
	if(!$usuariodelOK)
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/Classes/View/Busca/ListaUsuario.php'>
		<script type= \"text/javascript\">
		alert(\"O usuário foi deletado com sucesso.\");
		</script>";
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao deletar o usuário. Tente novamente\");
		</script>";
	}
}//ISSET LOGIN
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/Classes/View/Busca/ListaUsuario.php'>
		<script type= \"text/javascript\">
		alert(\"Erro. Você não tem permissão para acessar a página\");
		</script>";
}//SESSION
?>