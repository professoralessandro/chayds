<?php
session_start();

//FUNCAO PRIMEIRO NOME
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
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.jpg" /> 
    <title>Chayd`s</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu2.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/form_subm2.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/footer2.css" type="text/css" media="all">
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
        <img src="img/layout10.png" alt="logo" width="326" height="160">
    </figure>
    <ul>
        <li><a href='index.php'>INÍCIO</a>
        </li>
        <li><a href='loja/indexlja.php'>LOJA</a>
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
		echo"<li><a href='admin/indexadm.php'>ADMINISTRAR</a></li>";
	}
}
?>
<?php
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
echo "
<li id='nome_menu1'><a href='#'>".$primeiroNome."</a>
        <ul><li><a href='usuario/cadastro/alt_usuario.php'>INFORMAÇÕES</a></li>".
        //MAIS CAMPOS, SO TIRAR OS COMENTARIOS
		//<li><a href='#'>COMPRAS</a></li>
		//<li><a href='#'>COMPRAS</a></li>
		//<li><a href='#'>COMPRAS</a></li>
		//FIM MAIS CAMPOS, SO TIRAR OS COMENTARIOS
        "<li><a href='bd/valida/sair.php'>SAIR</a></li>
        </ul>
        </li>
";
}
else
{
echo "<li><a href='login/validausuario.php'>ENTRAR</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
";
}

?>

      </ul>
    </nav>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="form_email" action="phpfunctions/mail/enviar_email.php" target="_self" method="post">
<table class="form_menu2" bgcolor="#EEEEEE" align="center">
   <tr>
     <h1><td align="center"><h3>Entre em contato</h3></td></h1></tr><tr align="center">
   <tr>
      <td align="center">* Assunto: <font color="#000000"><blockquote> 
    <input name="assunto_mail" id="assunto_mail" placeholder="Informe o assunto(obrigatório)" type="text" size="50" maxlength=50"></blockquote></td></tr>
    <tr>
      <td align="center">* Nome:<font color="#000000"><blockquote> 
<?php
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null)
{ ?>
    <input name="nome_mail" id='nome_mail' value="<?php echo $_SESSION['usuarioNome'];?>" type='text' size='50' maxlength='60'></blockquote></td></tr>
<?php }
else
{ ?>
	<input name='nome_mail' id='nome_mail' placeholder='Informe o seu nome(obrigatório)' type='text' size='50' maxlength='60'></blockquote> </li></td></tr>
<?php } ?>
<tr>
      <td align="center">* Endereço:<font color="#000000"><blockquote> 
<?php
if(isset($_SESSION['usuarioEnd']) && $_SESSION['usuarioEnd'] != null)
{ ?>
    <input name='end_mail' id='end_mail' value='<?php echo $_SESSION['usuarioEnd'];?>' type='text' size='50' maxlength='60'></blockquote> </li></td></tr>
<?php }
else
{ ?>
	<input name="end_mail" id="end_mail" placeholder="Informe o seu logradouro e o numero(obrigatório)" type="text" size="50" maxlength="50"></blockquote> 
    </li></td></tr>
<?php } ?>
<tr>
      <td align="center">Complemento:<font color="#000000"><blockquote> 
<?php
if(isset($_SESSION['usuarioCompl']) && $_SESSION['usuarioCompl'] != null)
{ ?>
    <input name='compl_mail' id="compl_mail" value='<?php echo $_SESSION['usuarioCompl'];?>' type='text' size='50' maxlength='60'></blockquote> </li></td></tr>
<?php }
else
{ ?>
	<input name="compl_mail" id="compl_mail" placeholder="Informe o complemento" type="text" size="50" maxlength="50"></blockquote> 
    </li></td></tr>
<?php } ?>
<tr>
      <td align="center">Bairro:<font color="#000000"><blockquote> 
<?php
if(isset($_SESSION['usuarioBairro']) && $_SESSION['usuarioBairro'] != null)
{ ?>
    <input name='bairro_mail' id='bairro_mail' value='<?php echo $_SESSION['usuarioBairro'];?>' type='text' size='50' maxlength='60'></blockquote> </li></td></tr>
<?php }
else
{ ?>
	<input name="bairro_mail" id="bairro_mail" placeholder="Informe o complemento" type="text" size="50" maxlength="50"></blockquote> 
    </li></td></tr>
<?php } ?>
<tr>
      <td align="center">* Cidade:<font color="#000000">
        <blockquote> 
<?php
if(isset($_SESSION['usuarioCid']) && $_SESSION['usuarioCid'] != null)
{ ?>
    <input name='cidade_mail' id="cidade_mail" value='<?php echo $_SESSION['usuarioCid'];?>' type='text' size='50' maxlength='60'></blockquote> </li></td></tr>
<?php }
else
{ ?>
	<input name="cidade_mail" id="cidade_mail" placeholder="Informe a cidade(obrigatório)" type="text" size="50" maxlength="50"></blockquote> 
    </li></td></tr>
<?php } ?>
<tr>
      <td align="center">Estado:<font color="#000000">
        <blockquote> 
<?php
if(isset($_SESSION['usuarioEstado']) && $_SESSION['usuarioEstado'] != null)
{ ?>
    <input name='estado_mail' id='estado_mail' value='<?php echo $_SESSION['usuarioEstado'];?>' type='text' size='50' maxlength='60'></blockquote> </li></td></tr>
<?php }
else
{ ?>
	<input name="estado_mail" id="estado_mail" placeholder="Informe o estado (obrigatório)" type="text" size="50" maxlength="50"></blockquote> 
    </li></td></tr>
<?php } ?>
<tr>
      <td align="center">* CEP:<font color="#000000">
        <blockquote> 
<?php
if(isset($_SESSION['usuarioCep']) && $_SESSION['usuarioCep'] != null)
{ ?>
    <input name='cep_mail' id='cep_mail' value='<?php echo $_SESSION['usuarioCep'];?>' type='text' size='50' maxlength='60'></blockquote> </li></td></tr>
<?php }
else
{ ?>
	<input name="cep_mail" id="cep_mail" placeholder="Informe o estado (obrigatório)" type="text" size="50" maxlength="50"></blockquote> 
    </li></td></tr>
<?php } ?>
<tr>
      <td align="center">* Endereço de Email:<font color="#000000">
        <blockquote> 
<?php
if(isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null)
{ ?>
    <input name='remetente_mail'  id='remetente_mail' value=<?php echo $_SESSION['usuarioEmail'];?> type='text' size='50' maxlength='60'></blockquote> </li></td></tr>
<?php } 
else
{ ?>
	<input name="remetente_mail" id="remetente_mail" placeholder="Informe o seu email (obrigatório)" type="text" size="50" maxlength="50"></blockquote> 
    </li></td></tr>
<?php } ?>
<tr>
      <td align="center">* Fone/Fax:<font color="#000000">
        <blockquote> 
<?php
if(isset($_SESSION['usuarioTel']) && $_SESSION['usuarioTel'] != null)
{ ?>
<input name='fone_mail' id='fone_mail' value='<?php echo "(".$_SESSION['usuarioTelDDD'].")".$_SESSION['usuarioTel'];?>' type='text' size='50' maxlength='60'></blockquote> </li></td></tr>
<?php }
else
{ ?>
	<input name="fone_mail" id="fone_mail" placeholder="Informe o seu telefone ou fax (obrigatório)" type="text" size="50" maxlength="50"></blockquote> 
    </li></td></tr>
<?php } ?>
   <tr>
     <td align="center">Mensagem:<font color="#000000"><blockquote>
       <textarea name="mensagem_mail" id="mensagem_mail" placeholder="Informe qual é a mensagem que deseja nos enviar(obrigatório)" cols="68" rows="8" maxlength="3024"></textarea>
       <p align="right"><input  type="submit" value="Enviar" name="enviar" /></p>
     </blockquote></tr>
 </table>
 </tr>
 </form>
  <p>&nbsp;</p>
    <footer>
       <table align="center"><td>Copyright &copy; 2018 - All Rights Reserved - Chayd`s<a href="#"> - Fale Conosco </a>&nbsp;&nbsp;&nbsp;</td><td><a href="#"><div class="imgDecoration"><img src="img/redes sociais/1.gif" width="35" height="35" alt="Instagran" /></a><a href="#"><img src="img/redes sociais/2.gif" width="35" height="35" alt="Facebook" /></a><a href="#"><img src="img/redes sociais/3.gif" width="35" height="35" alt="Twitter" /></a><a href="#"><img src="img/redes sociais/4.gif" width="35" height="35" alt="Blogger" /></a><a href="#"><img src="img/redes sociais/5.gif" width="35" height="35" alt="LinkedIn" /></a><a href="#"><img src="img/redes sociais/6.gif" width="35" height="35" alt="Google +" /></a><a href="#"><img src="img/redes sociais/7.gif" width="35" height="35" /></a><a href="#"><img src="img/redes sociais/8.gif" width="35" height="35" alt="GoogleMaps" /></a><a href="#"><img src="img/redes sociais/9.gif" width="35" height="35" alt="Skype" /></a></div></td></table>
    </footer>
    </br>&nbsp;
</body>
</html>

