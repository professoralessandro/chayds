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

require_once('../phpfunctions/frete/frete_correios.php');

$ft = new frete_correios;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.jpg" /> 
    <title>Chayd`s</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu2.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/form_subm2.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/footer2.css" type="text/css" media="all">
<script type="text/javascript">
function conf(){ 
   if( !confirm("Verifique todas as informações antes de proseguir.\n Tem certeza que deseja continuar a compra deste produto ?") )
           return false;
}
</script>
</head>
<body marginwidth="110" >
    <figure class="imgcontainer">
    </figure>
    
    <nav id="topnav">
    <figure align="center" class="">
        <img src="../img/layout10.png" alt="logo" width="326" height="160">
    </figure>
    <ul>
        <li><a href="../index.php">INÍCIO</a>
        </li>
        <li><a href='#'>LOJA</a>
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
		echo"<li><a href='../admin/indexadm.php'>ADMINISTRAR</a></li>";
	}
}
?>
<?php
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
echo "
<li id='nome_menu1'><a href='#'>".$primeiroNome."</a>
        <ul><li><a href='../usuario/cadastro/alt_usuario.php'>INFORMAÇÕES</a></li>".
        //MAIS CAMPOS, SO TIRAR OS COMENTARIOS
		//<li><a href='#'>COMPRAS</a></li>
		//<li><a href='#'>COMPRAS</a></li>
		//<li><a href='#'>COMPRAS</a></li>
		//FIM MAIS CAMPOS, SO TIRAR OS COMENTARIOS
        "<li><a href='../bd/valida/sair.php'>SAIR</a></li>
        </ul>
        </li>
";
}
else
{
echo "<li><a href='../login/validausuario.php'>ENTRAR</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
";
}

?>

      </ul>
    </nav>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div>
<table class="form_menu2" bgcolor="#EEEEEE" align="center">
<tr>
   <td align="center"><img src="../img/suplee.png" width="106" height="180" /><br /><h3>R$60,90</h3>
	</td>
	<td align="center">
<h3>Chayds<br />complete</h3>
jovens, adultos com uma vida agitada<br />Completo de A a Z 30Capsulas para uso<br />dia e noite
    </td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="center"><img src="../img/suplee.png" width="106" height="180" /><br /><h3>R$60,90</h3>
	</td>
	<td align="center">	
<h3>Vita Chayds<BR />complet</h3>
jovens, adultos com uma vida agitada<br />Completo de A a Z 30Capsulas para uso<br />dia e noite
    </td>
    <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td align="center"><img src="../img/suplee.png" width="106" height="180" /><br /><h3>R$60,90</h3>
	</td>-->
   <!-- <td align="center">	
<h3>Vita Chayd<BR />youg live</h3>
jovens, adultos com<br />uma vida agitada<br />Completo de A a Z<br />30Capsulas para uso<br />dia e noite
    </td>-->
  </tr>
<tr>
 <td align="right">* Frete<BR /><?php echo 'PAC R$ '.$ft->CalcularFrete('11463190',$_SESSION['usuarioCep'], '0.350',61,'41106',20,20,20); $vlPAC = $ft->valFrete; echo $vlPAC.'<BR/>SEDEX R$ '.$ft->CalcularFrete('11463190',$_SESSION['usuarioCep'],'0.350',61,'40010',20,20,20); $vlSEDEX = $ft->valFrete;  echo $vlSEDEX.'';?><font color="#000000"></font></td><td align="center">
   <form action="ConfCompra/ConfCompra.php" method="post" enctype="multipart/form-data" name="formcomp1" id="form1" >
   Qtd: <input name="quant_prod" type="number" min="1" max="300" size="2" />
<p><input name="valor_frete_pac" id="valor_frete" type="radio" value="<?php echo $vlPAC; ?>">
        PAC 
        <input name="valor_frete_sedex" id="valor_frete" type="radio" value="<?php echo $vlSEDEX; ?>">
        SEDEX</p>
<input hidden="hidden" name="nome_prod" value="Chayds complete" />

<input value="Compra carrinho" type="image" width="209" height="48" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td align="right">* Frete<BR /><?php echo 'PAC R$ '.$ft->CalcularFrete('11463190',$_SESSION['usuarioCep'], '0.350',61,'41106',20,20,20); $vlPAC = $ft->valFrete; echo $vlPAC.'<BR/>SEDEX R$ '.$ft->CalcularFrete('11463190',$_SESSION['usuarioCep'],'0.350',61,'40010',20,20,20); $vlSEDEX = $ft->valFrete;  echo $vlSEDEX.'';?><font color="#000000"></font></td><td align="center">
   <form action="ConfCompra/ConfCompra.php" method="post" enctype="multipart/form-data" name="formcomp2" id="form1">
   Qtd: <input name="quant_prod" type="number" min="1" max="300" size="2" />
<p><input name="valor_frete_pac" id="valor_frete_pac" type="radio" value="<?php echo $vlPAC; ?>">
        PAC 
        <input name="valor_frete_sedex" id="valor_frete_sedex" type="radio" value="<?php echo $vlSEDEX; ?>">
        SEDEX</p>
<input hidden="hidden" name="nome_prod" value="Vita Chayds complet" />


<input value="Compra carrinho" type="image" width="209" height="48" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
    <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td align="right">* Frete<BR /><?php echo 'PAC R$ '.$ft->CalcularFrete('11463190',$_SESSION['usuarioCep'], '0.350',61,'41106',20,20,20); $vlPAC = $ft->valFrete; echo $vlPAC.'<BR/>SEDEX R$ '.$ft->CalcularFrete('11463190',$_SESSION['usuarioCep'],'0.350',61,'40010',20,20,20); $vlSEDEX = $ft->valFrete;  echo $vlSEDEX.'';?><font color="#000000"></font></td><td align="center">
   <form action="ConfCompra/ConfCompra.php" method="post" enctype="multipart/form-data" name="formcomp3" id="form1">
   Qtd: <input name="quant_prod" type="number" min="1" max="300" size="2" />
<p><input name="valor_frete_pac" id="valor_frete_pac" type="radio" value="<?php echo $vlPAC; ?>">
        PAC 
        <input name="valor_frete_sedex" id="valor_frete_sedex" type="radio" value="<?php echo $vlSEDEX; ?>">
        SEDEX</p>
<input hidden="hidden" name="nome_prod" value="Vita Chayd youg live" />

<input value="Compra carrinho" type="image" width="209" height="48" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
 </tr>-->
   
  <!--<tr>
   <td align="center">
	</td>
	<td align="center">	
<h2>Chayds complete</h2>
    </td>
    <td align="center">
    </td>
	<td align="center">	
<h2>Chayds complete</h2>
    </td>
    <td align="center">
    </td>
    <td align="center">	
<h2>Chayds complete</h2>
    </td>
  </tr>
  <tr>
   <td align="center">
   <img src="../img/suplee.png" width="106" height="180" />
	</td>
	<td align="center">
    jovens, adultos com<br />uma vida agitada<br />Completo de A a Z<br />30Capsulas para uso<br />dia e noite
    </td>
    <td align="center">
    <img src="../img/suplee.png" width="106" height="180" />
    </td>
	<td align="center">
   jovens, adultos com<br />uma vida agitada<br />Completo de A a Z<br />30Capsulas para uso<br />dia e noite
	</td>
    <td align="center">
    <img src="../img/suplee.png" width="106" height="180" />
    </td>
    <td align="center">
    jovens, adultos com<br />uma vida agitada<br />Completo de A a Z<br />30Capsulas para uso<br />dia e noite
    </td>
  </tr>
  <tr>
   <td align="center">
   <h3>R$35,00</h3>
	</td>
	<td align="center">
    <form action="../pagseguro/loja/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
    <td align="center">
   <h3>R$35,00</h3>
	</td>
	<td align="center">
    <form action="../pagseguro/loja/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
    <td align="center">
    <h3>R$35,00</h3>
    </td>
    <td align="center">
    <form action="../pagseguro/loja/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
  </tr>
  <tr>
   <td align="center">
	</td>
	<td align="center">	
<h2>Chayds complete</h2>
    </td>
    <td align="center">
    </td>
	<td align="center">	
<h2>Chayds complete</h2>
    </td>
    <td align="center">
    </td>
    <td align="center">	
<h2>Chayds complete</h2>
    </td>
  </tr>
  <tr>
   <td align="center">
   <img src="../img/suplee.png" width="106" height="180" />
	</td>
	<td align="center">
    jovens, adultos com<br />uma vida agitada<br />Completo de A a Z<br />30Capsulas para uso<br />dia e noite
    </td>
    <td align="center">
    <img src="../img/suplee.png" width="106" height="180" />
    </td>
	<td align="center">
   jovens, adultos com<br />uma vida agitada<br />Completo de A a Z<br />30Capsulas para uso<br />dia e noite
	</td>
    <td align="center">
    <img src="../img/suplee.png" width="106" height="180" />
    </td>
    <td align="center">
    jovens, adultos com<br />uma vida agitada<br />Completo de A a Z<br />30Capsulas para uso<br />dia e noite
    </td>
  </tr>
  <tr>
   <td align="center">
   <h3>R$35,00</h3>
	</td>
	<td align="center">
    <form action="../pagseguro/loja/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
    <td align="center">
   <h3>R$35,00</h3>
	</td>
	<td align="center">
    <form action="../pagseguro/loja/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
    <td align="center">
    <h3>R$35,00</h3>
    </td>
    <td align="center">
    <form action="../pagseguro/loja/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
  </tr>
  <tr>
   <td align="center">
	</td>
	<td align="center">	
<h2>Chayds complete</h2>
    </td>
    <td align="center">
    </td>
	<td align="center">	
<h2>Chayds complete</h2>
    </td>
    <td align="center">
    </td>
    <td align="center">	
<h2>Chayds complete</h2>
    </td>
  </tr>
  <tr>
   <td align="center">
   <img src="../img/suplee.png" width="106" height="180" />
	</td>
	<td align="center">
    jovens, adultos com<br />uma vida agitada<br />Completo de A a Z<br />30Capsulas para uso<br />dia e noite
    </td>
    <td align="center">
    <img src="../img/suplee.png" width="106" height="180" />
    </td>
	<td align="center">
   jovens, adultos com<br />uma vida agitada<br />Completo de A a Z<br />30Capsulas para uso<br />dia e noite
	</td>
    <td align="center">
    <img src="../img/suplee.png" width="106" height="180" />
    </td>
    <td align="center">
    jovens, adultos com<br />uma vida agitada<br />Completo de A a Z<br />30Capsulas para uso<br />dia e noite
    </td>
  </tr>
  <tr>
   <td align="center">
   <h3>R$35,00</h3>
	</td>
	<td align="center">
    <form action="../pagseguro/loja/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
    <td align="center">
   <h3>R$35,00</h3>
	</td>
	<td align="center">
    <form action="../pagseguro/loja/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
    <td align="center">
    <h3>R$35,00</h3>
    </td>
    <td align="center">
    <form action="../pagseguro/loja/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />-->

</form>
</div>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
  </tr>
</table>


<!-- BACKUP COM AÇÃO PARA A CAMADA DE PAGAMENTO
<h1>Produto de teste Backup </h1>
<p> 50000,00</p>
<form action="../pagseguro/pagseguro.php" method="post">

<input type="hidden" name="code" />

<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
</div>-->

<!-- INICIO FORMULARIO BOTAO PAGSEGURO
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO
<input type="hidden" name="code" value="C75A53F67474F7E224AFBF96DB7DA684" />
<input type="hidden" name="iot" value="button" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
 FINAL FORMULARIO BOTAO PAGSEGURO -->
<p>&nbsp;</p>
    <footer>
       <table align="center"><td>Copyright &copy; 2018 - All Rights Reserved - Chayd`s<a href="../contato_chayds.php"> - Fale Conosco </a>&nbsp;&nbsp;&nbsp;</td><td><a href="#"><div class="imgDecoration"><img src="../img/redes sociais/1.gif" width="35" height="35" alt="Instagran" /></a><a href="#"><img src="../img/redes sociais/2.gif" width="35" height="35" alt="Facebook" /></a><a href="#"><img src="../img/redes sociais/3.gif" width="35" height="35" alt="Twitter" /></a><a href="#"><img src="../img/redes sociais/4.gif" width="35" height="35" alt="Blogger" /></a><a href="#"><img src="../img/redes sociais/5.gif" width="35" height="35" alt="LinkedIn" /></a><a href="#"><img src="../img/redes sociais/6.gif" width="35" height="35" alt="Google +" /></a><a href="#"><img src="../img/redes sociais/7.gif" width="35" height="35" /></a><a href="#"><img src="../img/redes sociais/8.gif" width="35" height="35" alt="GoogleMaps" /></a><a href="#"><img src="../img/redes sociais/9.gif" width="35" height="35" alt="Skype" /></a></div></td></table>
    </footer>
    </br>&nbsp;
  </body>

</html>