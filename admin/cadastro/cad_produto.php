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
 <form name="form_cad_prod" action="../../bd/create/recebe_produto.php" target=
	   '_self' method="post">
 <table class="form_menu2" bgcolor="#EEEEEE" align="center">
<tr><td><h3 align="right">CADASTRO DE PRODUTO</h3></td><td></td></tr>
 <tr>
    <td align="right" >* Nome do produto:<font color="#000000"></font></td><td align="left"> 
    <input name="nome_prod" placeholder="Digite o nome do produto (Obrigatório)" size="40" id="nome_produto" type="text" maxlength="50"></li></td></tr>
    <tr>
    <td align="right" >* Código interno do produto:<font color="#000000"></font></td><td align="left"> 
    <input name="cod_inter_prod" placeholder="Digite o código do produto (Obrigatório)" size="40" id="codigo_interno_produto" type="text" maxlength="35"></li></td></tr>
    <tr>
      <td align="right" >* Descrição do produto:<font color="#000000"></font></td><td align="left">
    <input name="descri_prod" size="40" placeholder="Descrição do produto (Obrigatório)" id="descri_prod" type="text" maxlength="50"></li></td></tr>
    <tr>
      <td align="right" >* Quantidade:<font color="#000000"></font></td><td align="left">
    <input name="quant_prod" size="40" placeholder="Digite a quantidade atual do produto (Obrigatório)" id="Quantidade" type="number" maxlength="50"></li></td></tr>
<tr>
      <td align="right" >* Estoque  mínimo:<font color="#000000"></font></td><td align="left">
    <input name="quant_min_prod" size="40" placeholder="Digite o valor mínimo do produto (Obrigatório)" id="Estoque mínimo do produto" type="number" maxlength="50"></li></td></tr>
<tr>
      <td align="right" >* Altura:<font color="#000000"></font></td><td align="left">
    <input name="vl_alt_prod" size="40" placeholder="Digite a altura do produto em CM EX: 125 (Obrigatório)" id="valor altura produto" type="number" maxlength="50"></li></td></tr>
<tr>
      <td align="right" >* Largura:<font color="#000000"></font></td><td align="left">
    <input name="vl_larg_prod" size="40" placeholder="Digite a largura do produto em CM EX: 125 (Obrigatório)" id="valor largura produto" type="number" maxlength="50"></li></td></tr>
<tr>
      <td align="right" >* Cumprimento:<font color="#000000"></font></td><td align="left">
    <input name="vl_cmpri_prod" size="40" placeholder="Digite o cumprimento do produto em CM EX: 125 (Obrigatório)" id="valor cumprimento produto" type="number" maxlength="50"></li></td></tr>
<tr>
      <td align="right" >* Peso:<font color="#000000"></font></td><td align="left">
    <input name="vl_peso_prod" size="40" placeholder="Digite o peso do produto EX:0,30 (Obrigatório)" id="Quantidade_produto" type="text" maxlength="50"></li></td></tr>
    <tr>
      <td align="right" >Publico alvo:<font color="#000000"></font></td><td align="left">
    <input name="public_alvo" placeholder="Objetivo do produto" size="40" id="public_alvo" type="text" maxlength="50"></li></td></tr>
    <tr>
 <tr>
    <td align="right" >* Código de barras:<font color="#000000"></font></td><td align="left"> 
    <input name="cod_barras_prod" placeholder="Código de barras (obrigatório)" size="40" id="nome_forne_prod" type="text" maxlength="25"></li></td>
 </tr>
    <td align="right" >* Fornecedor:<font color="#000000"></font></td><td align="left">
    <select name="nome_forne_prod" type="text">
 <?php 
	 include_once("../../bd/conexao/conexao.php");
$sql = "SELECT id_forn, nome_forn FROM `tb_fornecedor`";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
	 while($dados = mysqli_fetch_array($resultado)){ ?>
<?php $nome_forn = $dados['nome_forn'];
   echo "<option value='$nome_forn'>$nome_forn</option>";
?>
     <?php } ?>
<?php mysqli_close($conn); ?>
</select></td></tr>
 </tr>
 <tr>
    <td align="right" >* Preço de custo R$:<font color="#000000"></font></td><td align="left"> 
    <input name="preco_custo" placeholder="Digite o nome preço de custo EX. R$15,99 (obrigatório)" size="40" id="preco_custo" type="text" maxlength="50"></li></td></tr>
    <tr>
    <td align="right" >* Preço de venda R$:<font color="#000000"></font></td><td align="left"> 
    <input name="preco_venda" placeholder="Digite o nome preço de venda EX. R$20,99 (obrigatório)" size="40" id="preco_venda" type="text" maxlength="50"></li></td>
 </tr>
<tr>
 <td align="right" >Preço de venda revendedor R$:<font color="#000000"></font></td><td align="left"> 
    <input name="preco_desc" placeholder="Digite o nome preço de venda EX. R$20,99 (revendedores)" size="40" id="preco_desc" type="text" maxlength="50"></li></td>
 </tr>
    <tr>
      <td align="right" >Comentários sobre os</br>resultados, benefícios etc...:<font color="#000000"></font></td><td align="left">
      <textarea name="coment_prod" placeholder="Comentários adicionais sobre o produto" id="coment_prod" cols="42" rows="4" maxlength="220"></textarea></li></td></tr>
    <tr>
      <td></td><td><input type="submit" value="Cadastrar" name="enviar" id="enviar" onclick="" ></td>
</tr>
<tr>
<td align="center"><blockquote></blockquote></td>
</tr>
</table>
 </form>
<p align="center">&nbsp;</p>
<p>&nbsp;</p>
   <footer>
       <table align="center"><td>Copyright &copy; 2018 - All Rights Reserved - Chayd`s<a href="../../contato_chayds.php"> - Fale Conosco </a>&nbsp;&nbsp;&nbsp;</td><td><a href="#"><div class="imgDecoration"><img src="../../img/redes sociais/1.gif" width="35" height="35" alt="Instagran" /></a><a href="#"><img src="../../img/redes sociais/2.gif" width="35" height="35" alt="Facebook" /></a><a href="#"><img src="../../img/redes sociais/3.gif" width="35" height="35" alt="Twitter" /></a><a href="#"><img src="../../img/redes sociais/4.gif" width="35" height="35" alt="Blogger" /></a><a href="#"><img src="../../img/redes sociais/5.gif" width="35" height="35" alt="LinkedIn" /></a><a href="#"><img src="../../img/redes sociais/6.gif" width="35" height="35" alt="Google +" /></a><a href="#"><img src="../../img/redes sociais/7.gif" width="35" height="35" /></a><a href="#"><img src="../../img/redes sociais/8.gif" width="35" height="35" alt="GoogleMaps" /></a><a href="#"><img src="../../img/redes sociais/9.gif" width="35" height="35" alt="Skype" /></a></div></td></table>
    </footer>
    </br>&nbsp;
</body>
</html>