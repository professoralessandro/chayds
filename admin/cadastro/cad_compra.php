<?php include_once('../../bd/conexao/conexao.php'); ?>
<?php

session_start();
function primeiroNome($str){
  $pos_espaco = strpos($str, ' ');// perceba que há um espaço aqui
  $primeiro_nome = substr($str, 0, $pos_espaco);
  $resto_nome = substr($str, $pos_espaco, strlen($str));
  
  return $primeiro_nome;
  //return array('primeiro_nome'=> $primeiro_nome, 'resto_nome' => $resto_nome);
}
$nomeCompleto = $_SESSION['usuarioNome'];
$primeiroNome = primeiroNome($nomeCompleto);


if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../login/validausuario.php'>
		<script type= \"text/javascript\">
		alert(\"Erro ao acessar a página. Seu nível de acesso nao tem a permissão para esta página.\");
		</script>";
	}
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../login/validausuario.php'>
	<script type= \"text/javascript\">
	alert(\"Erro ao acessar a página. uauário ou senha incorretos.\");
	</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.jpg" /> 
    <title>Chayd`s</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/menu2.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../css/form_subm2.css" type="text/css" media="all">
    <link rel="stylesheet" href="../../css/footer2.css" type="text/css" media="all">
</head>
<body>
    <figure class="imgcontainer">
    </figure>
    
    <nav id="topnav">
    <figure align="center" class="">
        <a href="../index.php"><img src="../../img/layout10.png" alt="logo" width="326" height="160"></a>
    </figure>
      <ul>
        
        <li><a href="#">INÍCIO</a>
        <ul><li><a href="../../index.php">INÍCIO</a></li>
        <li><a href="../indexadm.php">INÍCIO ADM</a></li>
        </ul>
        </li>
        <!-- CAMPOS RETRATEIS
        <li><a href="#">CADASTRAR</a>
        <ul><li><a href="#">SUBOPÇÃO1</a></li>
        <li><a href="#">SUBOPÇÃO2</a></li>
        <li><a href="#">SUBOPÇÃO3</a></li>
        <li><a href="#">SUBOPÇÃO4</a></li>
        </ul>
        </li>
        <li><a href="#">OPÇÃO4</a>
        <ul><li><a href="#">SUBOPÇÃO1</a></li>
        <li><a href="#">SUBOPÇÃO2</a></li>
        <li><a href="#">SUBOPÇÃO3</a></li>
        <li><a href="#">SUBOPÇÃO4</a></li>
        </ul>
        </li>
        FIM CAMPOS RETRATEIS -->
        <li><a href="#">CADASTRAR</a>
        <ul>
          <li><a href="../../admin/cadastro/cad_depart.php">DEPARTAMENTOS</a></li>
          <li><a href="../../admin/cadastro/cad_usuario.php">USUÁRIO</a></li>
          <li><a href="../../admin/cadastro/cad_funcionario.php">FUNCIONÁRIO</a></li>
        <li><a href="../../admin/cadastro/cad_produto.php">PRODUTO</a></li>
        <li><a href="../../admin/cadastro/cad_compra.php">COMPRA</a></li>
        </ul>
        </li>
        <li><a href="#">LISTAR</a>
        <ul><li><a href="../../admin/busca/busca_depart.php">DEPARTAMENTOS</a></li>
          <li><a href="../../admin/busca/busca_usuario.php">USUÁRIOS</a></li>
          <li><a href="../../admin/busca/busca_funcionario.php">FUNCIONÁRIOS</a></li>
        <li><a href="../../admin/busca/busca_produto.php">PRODUTOS</a></li>
        <li><a href="../../admin/busca/busca_compra.php">COMPRAS</a></li>
        </ul>
        </li>
        
        <?php
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
echo "
<li id='nome_menu1'><a href='#'>".$primeiroNome."</a>
        <ul><li><a href='../../usuario/cadastro/alt_usuario.php'>INFORMAÇÕES</a></li>".
        //MAIS CAMPOS, SO TIRAR OS COMENTARIOS
		//<li><a href='#'>COMPRAS</a></li>
		//<li><a href='#'>COMPRAS</a></li>
		//<li><a href='#'>COMPRAS</a></li>
		//FIM MAIS CAMPOS, SO TIRAR OS COMENTARIOS
        "<li><a href='../../bd/valida/sair.php'>SAIR</a></li>
        </ul>
        </li>
";
}
?>
      </ul>
        </li>    
      </ul>
    </nav>
<p>&nbsp;</p>
<?php
$id_comp_usu = filter_input(INPUT_GET, 'id_comp_usu', FILTER_SANITIZE_NUMBER_INT); 

$sql = "SELECT * FROM tb_compra WHERE id_comp_usu = '1' ";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
while($dados = mysqli_fetch_array($resultado))
	{  ?>
<form name="f1" action="../../bd/create/recebe_compra.php" target="_self" method="post">
 <table class="form_menu2" bgcolor="#EEEEEE" align="center">
<tr><td><h3 align="right">CADASTRAR COMPRA</h3></td><td></td></tr>
 <tr>
    <td align="right" >* Número da compra:<font color="#000000"></font></td><td align="left"> 
    <input name="cod_comp_usu" placeholder="Informe o codigo da compra (obrigatório)" size="40" id="cod_compra" type="text" maxlength="35"></li></td></tr>
    <tr>
    <td align="right" >* Nome cliente:<font color="#000000"></font></td><td align="left">
    <input name="nome_comp_usu" value='<?php echo $_SESSION['usuarioNome'] ?>' placeholder="Informe o nome do cliente (obrigatório)" size="40" id="nome_cliente_compra" type="text" maxlength="50"></li></td></tr><!-- foriagen -->
    <tr>
      <td align="right" >* Email:<font color="#000000"></font></td><td align="left">
    <input name="email_comp_usu" size="40" value='<?php echo $_SESSION['usuarioEmail'] ?>' placeholder="Informe o email do cliênte (Obrigatório)" id="email_compra_usu" type="email" maxlength="60"></li></td></tr><!-- foriagen -->
<?php } ?>

<tr>
 <td align="right" >* Nome do produto:<font color="#000000"></font></td><td align="left">
 <select name="nome_prod_usu" type="text">
 <?php 
	 include_once("../../bd/conexao/conexao.php");
$sql = "SELECT id_prod, nome_prod, preco_venda FROM tb_produto";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
	 while($dados = mysqli_fetch_array($resultado)){ ?>
     
<?php $nome_prod = $dados['nome_prod']; $preco_vend =  $dados['preco_venda'];
   echo "<option value='$nome_prod'>$nome_prod</option>";
?>
     <?php } ?>
</select></td></tr>
    <tr>
    <td align="right" >* Quantidade:<font color="#000000"></font></td><td align="left"> 
    <input name="quant_prod_usu" placeholder="Informe a quantidade (obrigatório)" size="40" id="quantidade" type="number" min="1" max="1500"></li></td></tr>
<tr>
    <td align="right" >* Valor frete R$:<font color="#000000"></font></td><td align="left">
    <input name="val_frete_comp_usu" placeholder="Informe o valor do frete (obrigatório)" id="val_frete_comp_usu" size="40" type="text"></li></td></tr>
    
    <tr>
    <td align="right" >* Valor unitário do produto R$:<font color="#000000"></font></td><td align="left">
    <input name="val_uni_comp_usu" placeholder="O valor unitário (obrigatorio)" size="40" id="val_uni_comp_usu" type="text" maxlength="50"></li></td></tr><!-- foriagen -->
 <tr>
    <td align="right" >* CPF cliente:<font color="#000000"></font></td><td align="left"> 
    <input name="cpf_comp_usu" value='<?php echo $_SESSION['usuarioCPF'] ?>' size="40" id="numero_cpf_usuario" placeholder="Informe o CPF do cliente (obrigatório)" type="text" maxlength="18"></li></td></tr>
    <tr>
      <td align="right" >Comentários adicionais</br>sobre a compra:<font color="#000000"></font></td><td align="left"><textarea disabled="disabled" name="coment_comp_usu" placeholder="Comentários adicionais sobre a compra(Campo cliente)" id="coment_func" cols="42" rows="4" maxlength="220"></textarea></li></td></tr>

<tr>
 <td align="right" >* Status compra:<font color="#000000"></font></td><td align="left">
 <select name='status_comp_usu' type="text">
 	<option value='0'>Pendente</option>
    <option value='1'>Aguardando pagamento</option>
    <option value='2'>Em análise</option>
    <option value='3'>Pago</option>
    <option value='4'>Disponível</option>
    <option value='5'>Em disputa</option>
    <option value='6'>Devolvida</option>
    <option value='7'>Cancelada</option>
    <option value='25'>Pendente interno</option>
</select></td></tr>   
    
<tr>
 <td align="right" >* Tipo de frete:<font color="#000000"></font></td><td align="left">
 <select name="tp_fret_comp_usu" type="text">
 	<option value='SEDEX'>SEDEX</option>
    <option value='PAC'>PAC</option>
    <option value='RET EM MAOS'>RET EM MAOS</option>
</select></td></tr>  
    
<tr>
    <td align="right" >Cod de rastreio:<font color="#000000"></font></td>
    <td align="left"> 
    <input name="cod_rastr_comp_usu" size="40" id="cod_rastr_comp_usu" placeholder="Código de rastreio da compra" type="text" maxlength="18"></li></td></tr>
    <tr>
      <td></td><td><input type="submit" value="Cadastrar" name="enviar" id="enviar" onclick="" /></td></tr>
<tr>
<td align="center"><blockquote></blockquote></td>
</tr>
</table>
 </form>
<p>&nbsp;</p>
<p>&nbsp;</p>
   <footer>
       <table align="center"><td>Copyright &copy; 2018 - All Rights Reserved - Chayd`s<a href="../../contato_chayds.php"> - Fale Conosco </a>&nbsp;&nbsp;&nbsp;</td><td><a href="#"><div class="imgDecoration"><img src="../../img/redes sociais/1.gif" width="35" height="35" alt="Instagran" /></a><a href="#"><img src="../../img/redes sociais/2.gif" width="35" height="35" alt="Facebook" /></a><a href="#"><img src="../../img/redes sociais/3.gif" width="35" height="35" alt="Twitter" /></a><a href="#"><img src="../../img/redes sociais/4.gif" width="35" height="35" alt="Blogger" /></a><a href="#"><img src="../../img/redes sociais/5.gif" width="35" height="35" alt="LinkedIn" /></a><a href="#"><img src="../../img/redes sociais/6.gif" width="35" height="35" alt="Google +" /></a><a href="#"><img src="../../img/redes sociais/7.gif" width="35" height="35" /></a><a href="#"><img src="../../img/redes sociais/8.gif" width="35" height="35" alt="GoogleMaps" /></a><a href="#"><img src="../../img/redes sociais/9.gif" width="35" height="35" alt="Skype" /></a></div></td></table>
    </footer>
    </br>&nbsp;
</body>
</html>