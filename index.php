﻿<?php
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
    <figure align="center">
        <img src="img/layout10.png" width="326" height="160">
    </figure>
    <ul>
        <li><a href="#">INÍCIO</a>
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

if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
	//BOTAO ADMINISTRAR
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
    <figure align="center" class="">
        
        <img class="imgDecoration" src="img/contrucao2.png" width="658" height="395"  alt="Em Manutenção">
    </figure>

    <br/>
    <p>&nbsp;</p>
    <footer class="FootDecor">
       <table align="center" class="imgDecoration"><td>Copyright &copy; 2018 - All Rights Reserved - Chayd`s<a href="../contato_chayds.php"> - Fale Conosco </a>&nbsp;&nbsp;&nbsp;<td><a href="#"><div class="imgDecoration"><img src="img/redes sociais/1.gif" width="35" height="35" alt="Instagran" /></a><a href="#"><img src="img/redes sociais/2.gif" width="35" height="35" alt="Facebook" /></a><a href="#"><img src="img/redes sociais/3.gif" width="35" height="35" alt="Twitter" /></a><a href="#"><img src="img/redes sociais/4.gif" width="35" height="35" alt="Blogger" /></a><a href="#"><img src="img/redes sociais/5.gif" width="35" height="35" alt="LinkedIn" /></a><a href="#"><img src="img/redes sociais/6.gif" width="35" height="35" alt="Google +" /></a><a href="#"><img src="img/redes sociais/7.gif" width="35" height="35" /></a><a href="#"><img src="img/redes sociais/8.gif" width="35" height="35" alt="GoogleMaps" /></a><a href="#"><img src="img/redes sociais/9.gif" width="35" height="35" alt="Skype" /></a></div></td></table>
    </footer>
    </br>&nbsp;
  </body>

</html>