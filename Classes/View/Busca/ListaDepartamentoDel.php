<?php session_start(); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php include_once("../../Model/Departamento.php"); ?>
<?php include_once("../../Controller/DALDepartamento.php"); ?>

<?php
if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] != null && $_SESSION['usuarioAcessoNiveis'] == 'Gerente')
{
	if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null)
	{
		$cx = new Conexao();

		$dalDepartamento = new DALDepartamento($cx);

		$id = trim(filter_input(INPUT_GET, 'idDepartamento', FILTER_SANITIZE_NUMBER_INT));

		$usuariodelOK = $dalDepartamento->excluirDepartamento($id);

		if(!$usuariodelOK)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/Classes/View/Busca/ListaDepartamento.php'>
			<script type= \"text/javascript\">
			alert(\"O departamento foi deletado com sucesso.\");
			</script>";
		}
		else
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao deletar o departamento. Tente novamente\");
			</script>";
		}
	}//ISSET LOGIN
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
			<script type= \"text/javascript\">
			alert(\"Erro. Você não tem permissão para acessar a página\");
			</script>";
	}//SESSION
}//IF VERIFICA GERENTE
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
		<script type= \"text/javascript\">
		alert(\"Você não tem autorização.\");
		</script>";
}//IF VERIFICA GERENTE
?>