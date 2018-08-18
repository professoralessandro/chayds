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

//FUNÇÃO VALOR MOEDA PONTOS
function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}
function virgula($get_valor) {
$source = array(',', '.');
$replace = array('', ',');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a o ponto pela virgula
return $valor; //retorna o valor formatado para gravar no banco
}
//FIM DA FUNÇÃO

require_once('../../phpfunctions/frete/frete_correios.php');

$ft = new frete_correios;
?>
<?php
//INICIO PAG PAGSEURO

//INICIO ELSE IF AUTENTICACAO COMPRA
if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null && isset($_SESSION['usuarioEmail']) && $_SESSION['usuarioEmail'] != null && isset($_SESSION['usuarioSenha']) != null && $_SESSION['usuarioSenha'] != null)
{
}
else if(isset($_SESSION['usuarioCep']) && $_SESSION['usuarioCep'] != null && isset($_SESSION['usuarioCPF']) && $_SESSION['usuarioCPF'] != null && isset($_SESSION['usuarioTel']) && $_SESSION['usuarioTel'] != null && isset($_SESSION['usuarioTelDDD']) && $_SESSION['usuarioTelDDD'] != null && isset($_SESSION['usuarioNasci']) && $_SESSION['usuarioNasci'] != null  && isset($_SESSION['usuarioEnd']) && $_SESSION['usuarioEnd'] != null && isset($_SESSION['usuarioBairro']) && $_SESSION['usuarioBairro'] != null && isset($_SESSION['usuarioCid']) && $_SESSION['usuarioCid'] != null && isset($_SESSION['usuarioEstado']) && $_SESSION['usuarioEstado'] != null)
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/login/validausuario.php'>
	<script type= \"text/javascript\">
	alert(\"Erro ao efetivar a compra, você deve completar o seu cadastro com todas as informaçaões obrigatórias solicitadas.\");
	</script>";
}
else if($quant_prod <= 1)
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/loja/indexlja.php'>
	<script type= \"text/javascript\">
	alert(\"Erro ao efetivar a compra, a quantidade tem que ser maior que 0 produtos.\");
	</script>";
}
	//INICIO AUTENTICACAO DADOS UDUARIO
	if(isset($_SESSION['usuarioEnd']) && $_SESSION['usuarioEnd'] != null && isset($_SESSION['usuarioTel']) && $_SESSION['usuarioEnd'] != null)
	{
		include_once("../../bd/conexao/conexao.php");
		
		//  INFORMAÇÕES DO USUARIO
		$nome_usu = $_SESSION['usuarioNome'];
		$ddd_usu = $_SESSION['usuarioTelDDD'];
		$tel_usu = $_SESSION['usuarioTel'];
		$email_usu = $_SESSION['usuarioEmail'];
		
		// INFORMAÇÕES DO ENDEREÇO
		$end_usu = $_SESSION['usuarioEnd'];
		$complemento_usu = $_SESSION['usuarioCompl'];
		$bairro_usu = $_SESSION['usuarioBairro'];
		$cidade_usu = $_SESSION['usuarioCid'];
		$estado_usu = $_SESSION['usuarioEstado'];
		$cep_usu = $_SESSION['usuarioCep'];
		
		// INFORMAÇÕES DO PRODUTO
		$nome_prod = trim($_POST['nome_prod']);
		
		if(isset($_POST['valor_frete_pac']) && $_POST['valor_frete_pac'] != null)
		{
			$ft->CalcularFrete('11463190',$_SESSION['usuarioCep'],'0.350' * $_POST['quant_prod'],61 * $_POST['quant_prod'],'41106',20,20,20 * $_POST['quant_prod']);
			$tp_fret_comp_usu = 'PAC';
		}
		else if(isset($_POST['valor_frete_sedex']) && $_POST['valor_frete_sedex'] != null)
		{
			$ft->CalcularFrete('11463190',$_SESSION['usuarioCep'],'0.350' * $_POST['quant_prod'],61,'40010',20 * $_POST['quant_prod'],20,20);
			$tp_fret_comp_usu = 'SEDEX';
		}
		else
		{
			$valor_frete = $ft->valFrete;
			$tp_fret_comp_usu = 'RET EM MAOS';
		}
		$quant_prod_usu = trim($_POST['quant_prod']);
		//$tp_fret_comp_usu = trim($_POST['tp_fret_comp_usu']);
		
		$sql = "SELECT * FROM tb_produto WHERE nome_prod = '$nome_prod' LIMIT 1";
		$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
		if (mysqli_affected_rows($conn) != 0)
		{
		//COMPRA NO MERCADOPAGO
			while($dados = mysqli_fetch_array($resultado))
			{	
				$nome_prod = $dados['nome_prod'];
				$id_prod = $dados['id_prod'];
				$val_uni_comp_usu = $dados['preco_venda'];
				$quant_prod_disp = $dados['quant_prod'];
				$quant_min_prod = $dados['quant_min_prod'];
				if($quant_prod_disp < $quant_prod_usu)
				{
				echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/loja/indexlja.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao efetuar a compra do produto $nome_comp_usu.</br>a quantidade disponível é $quant_prod_disp.</br>por favor compre novamente.\");
			</script>";
				}
				else if($quant_prod_disp <= $quant_min_prod)
				{
					mail('professor_alessandro@hotmail.com','O produto: '.$nome_prod.' cod: '.$id_prod.' esta  abaixo de '.$quant_min_prod.' unidades', "
							
			esta e um contato enviado para informar que o produto $nome_prod esta atuamente com $quant_prod_disp unidades.</br>
			O estoque critico e 25 unidades que e o estoque minimo recomendado. Solicitamos que o produto seja</br>
			solicitado juntamente ao fornecedor para que as vendas nao sejam prejudicadas </br>
			
			atenciosamente, a gerencia. ");
				}//MAIL
			}
		//INCLUSAO TABELA COMPRA
		$nome_prod_usu = trim($_POST['nome_prod']);
		$valor_frete_tot = moeda($ft->valFrete);
		
		//A completar
		$val_comp_usu = ($quant_prod_usu * $val_uni_comp_usu ) + $valor_frete_tot;
		}//if operação concluida
		else
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.chayds.com.br/admin/cadastro/cad_compra.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao efetuar a compra do produto $nome_comp_usu. Por favor, tente novamente.\");
			</script>";
		}//Else operação concluida

}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/usuario/cadastro/alt_usuario.php'>
	<script type= \"text/javascript\">
	alert(\"Antes de conclir a sua compra cadastre todas as informações adicionais de usuário.\");
	</script>";
}

//FIM PAG PAGSEGURO
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
        <li><a href='../indexlja.php'>LOJA</a>
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
<div>
<table bgcolor="#EEEEEE" class="form_menu2" align="center">
<tr>
<td align="right"><h1 style="color:#024631">INFORMAÇÕES</h1></td><td align="right"><h1 style="color:#024631">&nbsp;COMPRA CHAYD`S</h1></td>
</tr>
<tr>
<td align="center"><blockquote></blockquote></td>
</tr>
<tr>
	<!--<h2 style="color:#024231">-->
	<td align="right"><h2 style="color:#024631">DETALHES DO CLIENTE</h2></td><td></td>
</tr>
<form action="../../pagseguro/loja/pagseguro.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return conf();">
<tr>
	<td align="right"><h3>Nome: </h3></td><td align="center""><h4><?php echo $nome_usu; ?></h4></td><input hidden="" name="nome_usu" value="<?php echo $nome_usu; ?>"  />
</tr>
<tr>
	<td align="right"><h3>Email: </h3></td><td align="center"><h4><?php echo $email_usu; ?></h4></td><input hidden="" name="email_usu" value="<?php echo $email_usu; ?>"  />
</tr>
<tr>
	<td align="right"><h3>DDD: </h3></td><td align="center"><h4><?php echo $ddd_usu; ?></h4></td><input hidden="" name="ddd_usu" value="<?php echo $ddd_usu; ?>"  />
</tr>
<tr>
	<td align="right"><h3>Telefone: </h3></td><td align="center"><h4><?php echo $tel_usu; ?></h4></td><input hidden="" name="tel_usu" value="<?php echo $tel_usu; ?>"  />
</tr>
<tr>
<td align="center"></td><td align="center"><h4 style="color:#024231"><a href="../../usuario/cadastro/alt_usuario.php"  style="color:#024631">Alterar ?</a></h4></td>
</tr>
<tr>
	<td align="right"><h2 style="color:#024631">DETALHES DA ENTREGA</h2></td><td></td>
</tr>
<tr>
	<td align="right"><h3>Tipo do frete: </h3></td><td align="center"><h4><?php echo $tp_fret_comp_usu; ?></h4></td><input hidden="" name="tp_fret_comp_usu" value="<?php echo $tp_fret_comp_usu; ?>"  />
</tr>
<tr>
	<td align="right"><h3>Tempo em dias úteis: </h3></td><td align="center"><h4><?php echo $ft->temEntr; ?></h4></td><input hidden="" name="temEntr" value="<?php echo $ft->temEntr; ?>"  />
</tr>
<tr>
	<td align="right"><h3>Logradouro: </h3></td><td align="center"><h4><?php echo $end_usu; ?></h4></td>
</tr>
<tr>
	<td align="right"><h3>Complemento: </h3></td><td align="center"><h4><?php echo $complemento_usu; ?></h4></td>
</tr>
<tr>
	<td align="right"><h3>Bairro: </h3></td><td align="center"><h4><?php echo $bairro_usu; ?></h4></td>
</tr>
<tr>
	<td align="right"><h3>Cidade: </h3></td><td align="center"><h4><?php echo $cidade_usu; ?></h4></td>
</tr>
<tr>
	<td align="right"><h3>Estado: </h3></td><td align="center"><h4><?php echo $estado_usu; ?></h4></td>
</tr>
	<td align="right"><h3>CEP: </h3></td><td align="center"><h4><?php echo $cep_usu; ?></h4></td>
</tr>
<tr>
<td align="center"></td><td align="center"><h4><a href="../../usuario/cadastro/alt_usuario.php"  style="color:#024631">Alterar ?</a></h4>
<tr>
	<td align="right"><h2 style="color:#024631">DETALHES DO PRODUTO</h2></td><td></td>
</tr>
<tr>
	<td align="right"><h3>Código do produto: </h3></td><td align="center"><h4><?php echo $id_prod; ?></h4></td><input hidden="" name="id_prod" value="<?php echo $id_prod; ?>"  />
</tr>
<tr>
	<td align="right"><h3>Nome do produto: </h3></td><td align="center"><h4><?php echo $nome_prod; ?></h4></td><input hidden="" name="nome_prod" value="<?php echo $nome_prod; ?>"  />
</tr>
<tr>
	<td align="right"><h3>Quantidade: </h3></td><td align="center"><h4><?php echo $quant_prod_usu; ?></h4></td><input hidden="" name="quant_prod_usu" value="<?php echo $quant_prod_usu; ?>"  />
</tr>
<tr>
	<td align="right"><h3>Preço do produto: </h3></td><td align="center"><h4><?php echo virgula($val_uni_comp_usu); ?></h4></td><input hidden="" name="val_uni_comp_usu" value="<?php echo $val_uni_comp_usu; ?>"  />
</tr>
<tr>
	<td align="right"><h3>Valor do frete: </h3></td><td align="center"><h4><?php echo $ft->valFrete; ?></h4></td><input hidden="" name="valFrete" value="<?php echo moeda($ft->valFrete); ?>"  />
</tr>
<tr>
	<td align="right"><h3>Valor tot do frete s/seguro: </h3></td><td align="center"><h4><?php echo $ft->valSSeuro; ?></h4></td>
</tr>
<tr>
	<td align="right"><h3>Valor total: </h3></td><td align="center"><h4><?php echo virgula($val_comp_usu); ?></h4></td><input hidden="" name="val_comp_usu" value="<?php echo $val_comp_usu; ?>"  />
</tr>
<tr>
<td></td><td align="center">
<input value="Compra carrinho" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </td>
</tr>
<tr>
<td align="center"><blockquote></blockquote></td>
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
       <table align="center"><td>Copyright &copy; 2018 - All Rights Reserved - Chayd`s<a href="../../contato_chayds.php"> - Fale Conosco </a>&nbsp;&nbsp;&nbsp;</td><td><a href="#"><div class="imgDecoration"><img src="../../img/redes sociais/1.gif" width="35" height="35" alt="Instagran" /></a><a href="#"><img src="../../img/redes sociais/2.gif" width="35" height="35" alt="Facebook" /></a><a href="#"><img src="../../img/redes sociais/3.gif" width="35" height="35" alt="Twitter" /></a><a href="#"><img src="../../img/redes sociais/4.gif" width="35" height="35" alt="Blogger" /></a><a href="#"><img src="../../img/redes sociais/5.gif" width="35" height="35" alt="LinkedIn" /></a><a href="#"><img src="../../img/redes sociais/6.gif" width="35" height="35" alt="Google +" /></a><a href="#"><img src="../../img/redes sociais/7.gif" width="35" height="35" /></a><a href="#"><img src="../../img/redes sociais/8.gif" width="35" height="35" alt="GoogleMaps" /></a><a href="#"><img src="../../img/redes sociais/9.gif" width="35" height="35" alt="Skype" /></a></div></td></table>
    </footer>
    </br>&nbsp;
<?php mysqli_close($conn);?>
  </body>
</html>