<?php session_start(); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php include_once("../../Model/Empresa.php"); ?>
<?php include_once("../../Controller/DALEmpresa.php"); ?>
<?php
if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] != null && $_SESSION['usuarioAcessoNiveis'] == 'Gerente')
{
	if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null)
	{
		$cx = new Conexao();

		$dalEmpresa = new DALEmpresa($cx);

		$id = trim(filter_input(INPUT_GET, 'idEmpresa', FILTER_SANITIZE_NUMBER_INT));

		$usuariodelOK = $dalEmpresa->excluirEmpresa($id);

		if(!$usuariodelOK)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/Classes/View/Busca/ListaEmpresa.php'>
			<script type= \"text/javascript\">
			alert(\"A empresa foi deletada com sucesso.\");
			</script>";
		}
		else
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/Classes/View/Busca/ListaEmpresa.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao deletar a empresa. Tente novamente.\");
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
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
		<script type= \"text/javascript\">
		alert(\"Você não tem autorização.\");
		</script>";
}
?>