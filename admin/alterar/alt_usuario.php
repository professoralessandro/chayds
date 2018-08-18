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
<p>&nbsp;</p>
 <?php
$id_usu = filter_input(INPUT_GET, 'id_usu', FILTER_SANITIZE_NUMBER_INT); 

include_once("../../bd/conexao/conexao.php");


$sql = "SELECT * FROM tb_usuario WHERE id_usu = $id_usu LIMIT 1";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
while($dados = mysqli_fetch_array($resultado))
if($id_usu == $dados['id_usu'])
{
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

 <form name="f1" action="../../bd/alter/update_usuario.php" target="_self" method="post">
 <table class="form_menu2" bgcolor="#EEEEEE" align="center">
<tr><td border="1"><h3 align="right">ALTERAR USUÁRIO</h3></td><td></td></tr>
<tr><input hidden='hidden' name='conf_id_usu' value='<?php echo $dados['id_usu']?>' size='35' id='nome_usuario' type='number' maxlength='50'>
   </tr>
    <td align="right" >* Nome:<font color="#000000"></font></td>
<td align='left'><input name='nome_usu' value='<?php echo $dados['nome_usu'];?>' placeholder="seu nome (Obrigatório)" size='40' id='nome_usuario' type='text' maxlength='50'></td>
 </tr>
<tr>
<td align="right" >* CPF:<font color="#000000"></font></td><td align="left"> 
    <input disabled="disabled" name="cpf_usu" value='<?php echo $dados['cpf_usu'];?>' size="40" min="1" max="100000000000" id="cpf usuario" type="number" maxlength="11"></li></td></tr>
 </tr>
 <tr>
<td align="right" >* Data de nascimento:<font color="#000000"></font></td>
<td align='left'><input disabled name='dt_nasc_usu' value='<?php echo $dados['dt_nasc_usu'];?>' id='dt_nasc_usu' type='date'></td>
</tr>
<tr>
<td align="right" >* Data de cadastro:<font color="#000000"></font></td>
<td align='left'><input disabled name='dt_nasc_usu' value='<?php echo $dados['dt_cad_usu'];?>' id='dt_nasc_usu' type='date'></td>
</tr>
 <tr>
 <td align="right" >* Sexo:<font color="#000000"></font></td><td align="left">
        <input name="sexo_usu" id="sexo_usuariote" type="radio" value="F">Feminino <input name="sexo_usu" id="sexo_usuario" type="radio" value="M">Masculino
    </li></td></tr>
 </tr>
    <tr>
      <td align="right" >* Email:<font color="#000000"></font></td>

<td align='left'><input disabled size='35' name='email_usu' value='<?php echo $dados['email_usu'];?>' id='email_usuario' type='email' maxlength='60'></td>
<?php }
} ?>
   </tr>
<tr>
 <td align="right" >* Nível de acesso:<font color="#000000"></font></td><td align="left">
 <select name="nome_nivel_acesso" type="text">
 <?php 
	 include_once("../../bd/conexao/conexao.php");
$sql = "SELECT * FROM `tb_nivel_acesso`";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
	 while($dados = mysqli_fetch_array($resultado)){ ?>
<?php $nome_nivel_acesso = $dados['nome_nivel_acesso'];
   echo "<option value='$nome_nivel_acesso'>$nome_nivel_acesso</option>";
?>
     <?php } ?>
</select></td></tr>
<?php
$sql = "SELECT * FROM tb_usuario WHERE id_usu = $id_usu LIMIT 1";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
while($dados = mysqli_fetch_array($resultado))
	{  ?>
    <tr>
      <td align="right" >* Código de área(DDD):<font color="#000000"></font></td><td align="left">
    <input name="ddd_usu"  size='40' id="telefone_usuario" value='<?php echo $dados['ddd_usu'];?>' placeholder="seu ddd: 013 (obrigatório)" type="number" maxlength="3"></li></td></tr>
   </tr>
    <tr>
      <td align="right" >* Telefone:<font color="#000000"></font></td>

  <td align='left'><input size='40' name='tel_usu' value='<?php echo $dados['tel_usu'];?>' placeholder="seu telefone: 996xx-xxxx (obrigatório)" id='telefone_usuario' type='number' maxlength='9'></td>
   </tr>
   <tr>
 <td align="right" >* Endereço</br>"Logradouro e numero":<font color="#000000"></font></td><td align="left">
        <input name="end_usu" value='<?php echo $dados['end_usu'];?>' placeholder="Logradouro do funcionário (obrigatório)" size="40" id="endereço_departamento" type="text" maxlength="40"> 
    </li></td></tr>
    <tr>
 <td align="right" >Complemento:<font color="#000000"></font></td><td align="left">
        <input name="complemento_usu" value='<?php echo $dados['complemento_usu'];?>' placeholder="Complemento" size="40" id="bairro_departamento" type="text" maxlength="35"> 
    </li></td></tr>
 <tr>
 <td align="right" >* Bairro:<font color="#000000"></font></td><td align="left">
        <input name="bairro_usu" value='<?php echo $dados['bairro_usu'];?>' placeholder="Bairro (obrigatório)" size="40" id="complemento_func" type="text" maxlength="35"> 
    </li></td></tr>
 <tr>
 <td align="right" >* Cidade:<font color="#000000"></font></td><td align="left">
        <input name="cidade_usu" value='<?php echo $dados['cidade_usu'];?>' placeholder="Cidade (obrigatório)" size="40" id="cidade_funcionario" type="text" maxlength="35">
    </li></td></tr>
 </tr>
 <tr>
 <td align="right" >* Estado:<font color="#000000"></font></td><td align="left">
         <select name="estado_usu" type="text">
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espírito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MT">Mato Grosso</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
    </li></td></tr>
 </tr>
 <tr>
 <td align="right" >* CEP:<font color="#000000"></font></td><td align="left">
        <input name="cep_usu" value='<?php echo $dados['cep_usu'];?>' placeholder="CEP (obrigatório)" size="40" id="cep_cepartamento" type="text" maxlength="9"> 
    </li></td></tr>
    <tr>
      <td align="right" >* Senha:<font color="#000000"></font></td>

<td align='left'><input size='40' name='senha_usu' value='<?php echo $dados['senha_usu'];?>' placeholder="sua senha (Obrigatório)" id='senha_usuario' type='password' maxlength='16'></td>
   </tr>
    <tr>
      <td align="right" >* Confirmar senha:<font color="#000000"></font></td>

<td align='left'><input size='40' name='conf_senha_usu' value='<?php echo $dados['senha_usu'];?>' placeholder="confirme a senha (Obrigatório)" id='conf_senha_usuario' type='password' maxlength='16'></td>
   </tr>
    <tr>
      <td></td>
      <td><a href='../../bd/alter/update_usuario.php?id_usu=<?php echo $dados['id_usu'];?>'><input name='alterar' type='submit' id='Alterar' value='Alterar' ></a></td>
</tr>
<?php } mysqli_close($conn); ?>
<tr>
<td align="center"><blockquote></blockquote></td>
</tr>
</table>
 </form>
<p>&nbsp;</p>
   <footer>
       <table align="center"><td>Copyright &copy; 2018 - All Rights Reserved - Chayd`s<a href="../../contato_chayds.php"> - Fale Conosco </a>&nbsp;&nbsp;&nbsp;</td><td><a href="#"><div class="imgDecoration"><img src="../../img/redes sociais/1.gif" width="35" height="35" alt="Instagran" /></a><a href="#"><img src="../../img/redes sociais/2.gif" width="35" height="35" alt="Facebook" /></a><a href="#"><img src="../../img/redes sociais/3.gif" width="35" height="35" alt="Twitter" /></a><a href="#"><img src="../../img/redes sociais/4.gif" width="35" height="35" alt="Blogger" /></a><a href="#"><img src="../../img/redes sociais/5.gif" width="35" height="35" alt="LinkedIn" /></a><a href="#"><img src="../../img/redes sociais/6.gif" width="35" height="35" alt="Google +" /></a><a href="#"><img src="../../img/redes sociais/7.gif" width="35" height="35" /></a><a href="#"><img src="../../img/redes sociais/8.gif" width="35" height="35" alt="GoogleMaps" /></a><a href="#"><img src="../../img/redes sociais/9.gif" width="35" height="35" alt="Skype" /></a></div></td></table>
    </footer>
    </br>&nbsp;
</body>
</html>