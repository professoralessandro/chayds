<?php include_once("../../phpfunctions/dinheiro/pontovirgula.php");?>
<?php include_once("../conexao/conexao.php"); ?>
<?php
session_start();

if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
			$cod_comp_usu = trim($_POST['cod_comp_usu']);
			$nome_comp_usu = trim($_POST['nome_comp_usu']);
			$email_comp_usu = trim($_POST['email_comp_usu']);
			$nome_prod_usu = trim($_POST['nome_prod_usu']);
			$quant_prod_usu = trim($_POST['quant_prod_usu']);
			$val_frete_comp_usu = moeda(trim($_POST['val_frete_comp_usu']));
			$val_uni_comp_usu = moeda(trim($_POST['val_uni_comp_usu']));
			$val_comp_usu = ($val_uni_comp_usu * $quant_prod_usu) + $val_frete_comp_usu;
			$cpf_comp_usu = trim($_POST['cpf_comp_usu']);
			$coment_comp_usu = trim($_POST['coment_comp_usu']);
			$status_comp_usu = trim($_POST['status_comp_usu']);
			$cod_rastr_comp_usu = trim($_POST['cod_rastr_comp_usu']);
			$tp_fret_comp_usu = trim($_POST['tp_fret_comp_usu']);
			
			
			if(isset($_POST['enviar']) && $_POST['enviar'] != null && isset($_POST['nome_comp_usu']) && $_POST['nome_comp_usu'] != null  && isset($_POST['email_comp_usu']) && $_POST['email_comp_usu'] != null && isset($_POST['nome_prod_usu']) && $_POST['nome_prod_usu'] != null  && isset($_POST['quant_prod_usu']) && $_POST['quant_prod_usu'] != null  && isset($_POST['val_uni_comp_usu']) && $_POST['val_uni_comp_usu'] != null && isset($_POST['val_frete_comp_usu']) && $_POST['val_frete_comp_usu'] != null && isset($_POST['status_comp_usu']) && $_POST['status_comp_usu'] != null && isset($_POST['tp_fret_comp_usu']) && $_POST['tp_fret_comp_usu'] != null)
			{
				$sqli_comand = "INSERT INTO `tb_compra` (`cod_comp_usu`,`nome_comp_usu`,`email_comp_usu`,`nome_prod_usu`,`quant_prod_usu`,`dt_comp_usu`,`val_comp_usu`,`cpf_comp_usu`,`coment_comp_usu`,`val_frete_comp_usu`,`cod_rastr_comp_usu`,`status_comp_usu`,`val_uni_comp_usu`, `tp_fret_comp_usu`) VALUES ('$cod_comp_usu','$nome_comp_usu','$email_comp_usu','$nome_prod_usu',$quant_prod_usu,curdate(),'$val_comp_usu','$cpf_comp_usu','$coment_comp_usu','$val_frete_comp_usu','$cod_rastr_comp_usu','$status_comp_usu','$val_uni_comp_usu','$tp_fret_comp_usu')";
			
				$result = mysqli_query($conn, $sqli_comand);
			
				if (mysqli_affected_rows($conn) != 0)
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_compra.php'>
						<script type= \"text/javascript\">
						alert(\"A compra do produto $nome_prod_usu foi comprado com sucesso.\");
						</script>";
				}//if operação concluida
				else
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_compra.php'>
						<script type= \"text/javascript\">
						alert(\"Erro ao efetuar a compra do produto $nome_prod_usu. Por favor, tente novamente.\");
						</script>";
				}//Else operação concluida
			}//IF existe campos compra
			else
			{
				echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_compra.php'>
					<script type= \"text/javascript\">
					alert(\"Erro ao efetuar a compra do produto $nome_prod_usu. Por favor, preencha todos os campos obrigatórios e tente novamente.\");
					</script>";
			}//Else existe campos compra

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