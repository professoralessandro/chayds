<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="../../../img/favicon.jpg" /> 
    <title>Chayd`s</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/form_subm.css" type="text/css" media="all">
</head>
<body>
    <figure class="imgcontainer">
    </figure>
    
    <nav id="topnav">
    <figure align="center" class="">
        <img src="../img/layout10.png" alt="logo" width="326" height="160">
    </figure>
    <ul>
        <li><a href="../index.php"><img src="../img/home-button_home.png" alt="Home" width="13" height="13"/>&nbsp;&nbsp;INÍCIO</a>
        </li>
        <li><a href="../loja/indexlja.php">LOJA</a>
        </li>
        <?php
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
		echo"<li><a href='../admin/indexadm.php'>ADMINISTRAR</a></li>";
	}
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/'>
	<script type= \"text/javascript\">
	alert(\"Erro ao acessar a página. você precisa estar logado.\");
	</script>";
}

?>
<?php
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
echo "<div class='form_menu' align='right'><a href='../usuario/cadastro/alt_usuario.php'>".$_SESSION['usuarioNome']."</a>&nbsp;&nbsp;<a href='../bd/valida/sair.php'><input type='submit' value='SAIR' name='sair'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>";
	
}
else
{
echo "<div class='form_menu' align='right'><a href='../login/validausuario.php'><input type='submit' value='ENTRAR' name='entrar' ></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>";
}

?>

      </ul>
    </nav>
<table class="read_div_usu" bgcolor="#CCCCCC" align="center">
<tr>
   <td align="center">Contador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	   <td align="center">Nome do produto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td align="center">Quantidade&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	   <td align="center">Valor Unitário&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
       <td align="center">Valor Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
 <?php 
 $nome_comp_usu = $_SESSION['usuarioNome'];
 $email_comp_usu = $_SESSION['usuarioEmail'];
 
 
	 include_once("../bd/conexao/conexao.php");
$sql = "SELECT * FROM tb_compra WHERE email_comp_usu = '$email_comp_usu' && status_int_comp_usu = 0";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
if (mysqli_affected_rows($conn) != 0)
{
$nome_prod_usu = "Compra Carrinho ";
$totComp = 0.00;
$cont = 0;
	 while($dados = mysqli_fetch_array($resultado))
	 { ?>
<div>
   <tr>
   <td align="center"><?php $cont = $cont + 1; echo $cont; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td align="center"><?php echo $dados['nome_prod_usu']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	   <td align="center"><?php echo $dados['nome_prod_usu']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	   <td align="center"><?php echo $dados['quant_prod_usu']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td align="center"><?php
	   
	    $totComp = $totComp +($dados['quant_prod_usu'] * $dados['val_comp_usu']); echo $dados['val_comp_usu']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td align="center"><a href='../alterar/alt_compra.php?id_comp_usu=<?php echo $dados['id_comp_usu'];?>'><input name="alterar" type="submit" value="Alterar" ></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='../../bd/delete/del_compra.php?id_comp_usu=<?php echo $dados['id_comp_usu'];?>'><input type="submit" value="Deletar" name="deletar" ></a></td></br>
    </div>
<?php }}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/'>
	<script type= \"text/javascript\">
	alert(\"Erro ao acessar a página. O carrinho esta vazio, faça compras para poder acessa-lo.\");
	</script>";
}
 ?>
 <tr><td><blockquote></blockquote></td></tr>
</tr>
   <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td align="center"></td><td align="center">Comprar tudo com: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td align="center">
<form action="../pagseguro/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
</div></td>
   </tr>
<?php mysqli_close($conn);?>
</table>
<!-- INICIO FORMULARIO BOTAO PAGSEGURO
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO
<input type="hidden" name="code" value="C75A53F67474F7E224AFBF96DB7DA684" />
<input type="hidden" name="iot" value="button" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
 FINAL FORMULARIO BOTAO PAGSEGURO -->
    <br/>
    <br/>
    <p>&nbsp;</p>
    <footer>
        <p>Copyright &copy; 2018 - All Rights Reserved - Chayd`s<a href="../contato_chayds.php"> - Fale Conosco</a></p>
    </footer>
  </body>

</html>