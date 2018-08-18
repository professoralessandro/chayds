<?php include_once("../../phpfunctions/dinheiro/pontovirgula.php");?>
<?php include_once("../conexao/conexao.php"); ?>

<?php
/*
$nome_usu = trim(filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING));
$sexo_usu = trim(filter_input(INPUT_GET, 'sexo_usu', FILTER_SANITIZE_STRING));
$tel_usu = trim(filter_input(INPUT_GET, 'tel_usu', FILTER_SANITIZE_STRING));
$senha_usu = trim(filter_input(INPUT_GET, 'senha_usu', FILTER_SANITIZE_STRING));
$conf_senha_usu = trim(filter_input(INPUT_GET, 'conf_senha_usu', FILTER_SANITIZE_STRING));*/

session_start();

if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
		$id_comp_usu = trim($_POST['id_comp_usu']);
		$nome_comp_usu = trim($_POST['nome_comp_usu']);
		$nome_prod_usu = trim($_POST['nome_prod_usu']);
		$quant_prod_usu = trim($_POST['quant_prod_usu']);
		$dt_comp_usu = trim($_POST['dt_comp_usu']);
		$cpf_comp_usu = trim($_POST['cpf_comp_usu']);
		$status_comp_usu = trim($_POST['status_comp_usu']);
		$email_comp_usu = trim($_POST['email_comp_usu']);
		$coment_comp_usu = trim($_POST['coment_comp_usu']);
		$val_frete_comp_usu = moeda(trim($_POST['val_frete_comp_usu']));
		$val_comp_usu = moeda(trim($_POST['val_comp_usu']));
		$tp_fret_comp_usu = trim($_POST['tp_fret_comp_usu']);
		$cod_rastr_comp_usu = trim($_POST['cod_rastr_comp_usu']);
		

if(isset($_POST['alterar']) && $_POST['alterar'] != null && isset($_POST['val_frete_comp_usu']) && $_POST['val_frete_comp_usu'] != null && isset($_POST['val_comp_usu']) && $_POST['val_comp_usu'] != null && isset($_POST['tp_fret_comp_usu']) && $_POST['tp_fret_comp_usu'] != null && isset($_POST['cod_rastr_comp_usu']) && $_POST['cod_rastr_comp_usu'] != null)
{
		$sql = "SELECT cod_rastr_comp_usu FROM tb_compra WHERE id_comp_usu = $id_comp_usu LIMIT 1";
$result = mysqli_query($conn, $sqli);

$resultado = mysqli_fetch_assoc($result);

		if(empty($resultado) || $cod_rastr_ant != $cod_rastr_comp_usu)
		{
			
		mail('comercial@chayds.com.br','Boas noticias. O seu pedido n'.$id_comp_usu.' foi enviado, Cod de rastreio: '.$cod_rastr_comp_usu.'', "
		
Parabens pela aquisisição do seu ótimo produto $nome_prod_usu. Queremos informar que
o seu produto foi postado já nos correios e segue neste email todas as informações da
compra e o código de rastreio do produto.
			
	Codigo da compra: ".$id_comp_usu."
	Nome do cliente: ".$nome_comp_usu."
	Nome do produto: ".$nome_prod_usu."
	Email cadastrado: ".$email_comp_usu."
	Data da compra: ".$dt_comp_usu."
	Tipo de frete: ".$tp_fret_comp_usu."
	Quantidade: ".$quant_prod_usu."
	Valor do frete: ".$val_frete_comp_usu."
	Valor da compra: ".$val_comp_usu."
	Status da compra: ".$status_comp_usu."
	Cod de rastreio: ".$cod_rastr_comp_usu."

Caso tenha alguma dúvida você pode entrar em contato conosco no link

	http://www.chayds.com.br/contato_chayds.php

Atensiosamente Chayd`s Vitamins, Supplements and Minerals
			");
		}
	
		$sqli_comand = "UPDATE tb_compra
		SET val_frete_comp_usu = '$val_frete_comp_usu',
		val_comp_usu = '$val_comp_usu',
		tp_fret_comp_usu = '$tp_fret_comp_usu',
		cod_rastr_comp_usu = '$cod_rastr_comp_usu',
		coment_comp_usu = '$coment_comp_usu'
		
		 WHERE id_comp_usu = $id_comp_usu
		";

		$result = mysqli_query($conn, $sqli_comand);

		if (mysqli_affected_rows($conn) != 0)
		{	
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_compra.php'>
			<script type= \"text/javascript\">
			alert(\"A  compra do cliente $nome_comp_usu foi alterado com sucesso.\");
			</script>";

		}//if Operação concluida
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_compra.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao a compra. Por favor, tente novamente.\");
			</script>";
		}//else Operação concluida
}//IF Existe Campos Compra
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/admin/busca/busca_compra.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao alterar a compra. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
		</script>";
}//Else Existe Campos Compra
/* local
		if (mysqli_affected_rows($conn) != 0)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL'0;URL=//localhost/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"O usuário $nome_usu foi alterado com sucesso.\");
			</script>";
		}
		else
		{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//localhost/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao alterar o usuário $nome_usu. Por favor, tente novamente.\");
			</script>";
		}
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//localhost/admin/busca/busca_usuario.php'>
			<script type= \"text/javascript\">
			alert(\"Senhas diferentes. Por favor, tente novamente.\");
			</script>";
	}
	
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=//localhost/admin/busca/busca_usuario.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao alterar o usuário $nome_usu. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
		</script>";
}
*/
		

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