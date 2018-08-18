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
<script type="text/javascript">
function conf(){ 
   if( !confirm("Verifique todas as informações antes de proseguir.\n Tem certeza que deseja continuar a compra deste produto ?") )
           return false;
}
</script>
</head>
<body>
    <figure class="imgcontainer">
    </figure>
    
    <nav id="topnav">
    <figure align="center" class="">
        <img src="../../img/layout10.png" alt="logo" width="326" height="160">
    </figure>
    <ul>
        <li><a href="../../index.php">INÍCIO</a>
        </li>
        <li><a href="../../loja/indexlja.php">LOJA</a>
        </li>
        <!-- CAMPOS RETRATEIS
        <li><a href="#">OPÇÃO4</a>
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
        <li><a href="#">OPÇÃO4</a>
        <ul><li><a href="#">SUBOPÇÃO1</a></li>
        <li><a href="#">SUBOPÇÃO2</a></li>
        <li><a href="#">SUBOPÇÃO3</a></li>
        <li><a href="#">SUBOPÇÃO4</a></li>
        </ul>
        </li>
        FIM CAMPOS RETRATEIS -->
      <?php
//include_once("../phpfunctions/frete/frete_correios.php");

if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente administrador' )
	{
		echo"<li><a href='../../admin/indexadm.php'>ADMINISTRAR</a></li>";
	}
}
?>
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
else
{
echo "<li><a href='../../login/validausuario.php'>ENTRAR</a></li></div>
";
}

?>

      </ul>
    </nav>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <?php

include_once("../../bd/conexao/conexao.php");

$id_usu = $_SESSION['usuarioId'];

$sql = "SELECT * FROM tb_usuario WHERE id_usu = $id_usu LIMIT 1";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
while($dados = mysqli_fetch_array($resultado))
	{  ?>
<!--
{
	if($dados['id_usu'] == $id_usu)
	{
		$id_usu = $dados['id_usu'];
		$nome_usu = $dados['nome_usu'];
		$dt_nasc_usu = $dados['dt_nasc_usu'];
		$email_usu = $dados['email_usu'];
		$tel_usu = $dados['tel_usu'];
		$senha_usu = $dados['senha_usu'];
	}
} ?>*/-->

 <form name="f1" action="update_senha.php" target="_self" method="post">
 <table width="600" class="form_menu2" bgcolor="#EEEEEE" align="center">
<tr><td border="1"><h3 align="right">ALTERAR SENHA</h3></td><td></td></tr>
<tr><input hidden='hidden' name='conf_id_usu' value='<?php echo $dados['id_usu']?>' size='35' id='nome_usuario' type='number' maxlength='50'>
    <tr>
      <td align="right">* Senha antiga:<font color="#000000"></font></td>

<td align='left'><input size='35' name='senha_ant_usu' placeholder="Sua senha antiga" id='senha_antiga_usu' type='password' maxlength='16'></td>
   </tr>
    <tr>
      <td align="right">* Senha:<font color="#000000"></font></td>

<td align='left'><input size='35' name='senha_usu' placeholder="Sua senha nova" id='senha_usuario' type='password' maxlength='16'></td>
   </tr>
    <tr>
      <td align="right">* Confirmar senha:<font color="#000000"></font></td>

<td align='left'><input size='35' name='conf_senha_usu' placeholder="Confirme a senha nova" id='conf_senha_usuario' type='password' maxlength='16'></td>
   </tr>
    <tr>
      <td></td>
      <td><a href='../../bd/alter/update_usuario.php?id_usu=<?php echo $dados['id_usu'];?>'><input name='alterar' type='submit' id='Alterar' value='Alterar' ></a></td>
</tr>
<?php } mysqli_close($conn); ?>
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