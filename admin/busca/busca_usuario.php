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
<script type="text/javascript">
function conf(){ 
   if( !confirm("Esta oaperação é irreversível.\n Tem certeza que deseja deletar o usuário ?") )
           return false;
}
</script>
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
<table class="form_menu2" bgcolor="#EEEEEE" align="center">
<div>
<tr>
   <td align="center"><h3>&nbsp;&nbsp;Contador&nbsp;&nbsp;</h3></td>
	   <td align="center"><h3>&nbsp;&nbsp;Nome do usuário&nbsp;&nbsp;</h3></td>
   </tr>
 <?php 
 include_once("../../bd/conexao/conexao.php");
$sql = "SELECT * FROM `tb_usuario`";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados ");
$cont = 0;
	 while($dados = mysqli_fetch_array($resultado))
	 { ?>
<div class="form_menu" style>
   <tr>
   <td align="center"><?php $cont = $cont + 1; echo $cont; ?></td>
	   <td align="center"><?php echo $dados['nome_usu']; ?></td><td align="center">
       <a href='../alterar/alt_usuario.php?id_usu=<?php echo $dados['id_usu'];?>'>
       <input name="alterar" type="submit" id="Alterar" value="Alterar" ></a></td>&nbsp;&nbsp;<td align='center'><a onclick="return conf();" href='../../bd/delete/del_usuario.php?id_usu=<?php echo $dados['id_usu'];?> '><input name='deletar' type='submit' value='Deletar' ></a></td>
 </br>
 
 <?php } mysqli_close($conn); ?>
   </tr>
<tr>
<td align="center"><blockquote></blockquote></td>
</tr>
    </div>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
    <footer>
       <table align="center"><td>Copyright &copy; 2018 - All Rights Reserved - Chayd`s<a href="../../contato_chayds.php"> - Fale Conosco </a>&nbsp;&nbsp;&nbsp;</td><td><a href="#"><div class="imgDecoration"><img src="../../img/redes sociais/1.gif" width="35" height="35" alt="Instagran" /></a><a href="#"><img src="../../img/redes sociais/2.gif" width="35" height="35" alt="Facebook" /></a><a href="#"><img src="../../img/redes sociais/3.gif" width="35" height="35" alt="Twitter" /></a><a href="#"><img src="../../img/redes sociais/4.gif" width="35" height="35" alt="Blogger" /></a><a href="#"><img src="../../img/redes sociais/5.gif" width="35" height="35" alt="LinkedIn" /></a><a href="#"><img src="../../img/redes sociais/6.gif" width="35" height="35" alt="Google +" /></a><a href="#"><img src="../../img/redes sociais/7.gif" width="35" height="35" /></a><a href="#"><img src="../../img/redes sociais/8.gif" width="35" height="35" alt="GoogleMaps" /></a><a href="#"><img src="../../img/redes sociais/9.gif" width="35" height="35" alt="Skype" /></a></div></td></table>
    </footer>
    </br>&nbsp;
</body>
</html>