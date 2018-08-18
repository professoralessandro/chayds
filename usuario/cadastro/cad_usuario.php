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
 <form name="f1" action="recebe_usuario.php" target="_self" method="post">
 <table width="800" class="form_menu2" bgcolor="#EEEEEE" align="center">
<tr><td align="right" border="1"><h3>CADASTRO DE USUÁRIO</h3></td><td></td></tr>
 <tr>
    <td align="right">* Nome:<font color="#000000"></font></td><td align="left"> 
    <input name="nome_usu" placeholder="seu nome (Obrigatório)" size="35" id="nome_usuariote" type="text" maxlength="50"></li></td></tr>
 </tr>
 <tr>
      <td align="right">* Data de nascimento:<font color="#000000"></font></td><td align="left">
    <input name="dt_nasc_usu" id="data_nasc_usuario" type="date"></li></td></tr>
 <tr>
 <td align="right">* Sexo:<font color="#000000"></font></td><td align="left">
        <input name="sexo_usu" id="sexo_usuariote" type="radio" value="F">Feminino <input name="sexo_usu" id="sexo_usuario" type="radio" value="M">Masculino
    </li></td></tr>
 </tr>
    <tr>
      <td align="right">* Email:<font color="#000000"></font></td><td align="left">
    <input name="email_usu" size="35" placeholder="seu email (Obrigatório)" id="email_usuariote" type="email" maxlength="60"></li></td></tr>
   <tr>
      <td align="right">* Código de área(DDD):<font color="#000000"></font></td><td align="left">
    <input name="ddd_usu" placeholder="seu ddd: 013" size="35" id="ddd_usuario" type="number" maxlength="3"></li></td></tr>
    <tr>
      <td align="right">* Telefone:<font color="#000000"></font></td><td align="left">
    <input name="tel_usu" placeholder="seu telefone: (13)996xx-xxxx" size="35" id="telefone_usuario" type="number" maxlength="9"></li></td></tr>
    <tr>
      <td align="right">* Senha:<font color="#000000"></font></td><td align="left">
    <input name="senha_usu" placeholder="sua senha (Obrigatório)" size="35" id="senha_usuariote" type="password" maxlength="16"></li></td></tr>
    <tr>
      <td align="right">*Confirmar senha:<font color="#000000"></font></td><td align="left">
    <input name="conf_senha_usu" placeholder="sua senha (Obrigatório)" size="35" id="senha_usuariote" type="password" maxlength="16"></li></td></tr>
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