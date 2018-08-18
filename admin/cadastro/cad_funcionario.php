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
 <form name="f1" action="../../bd/create/recebe_funcionario.php" method="post">
 <table class="form_menu2" bgcolor="#EEEEEE" align="center">
<tr><td><h3 align="right">CADASTRAR FUNCIONÁRIO</h3></td><td></td></tr>
<tr>
    <td align="right" >* Nome:<font color="#000000"></font></td><td align="left"><!--Campo Unique, not nul -->
    <input name="nome_func" placeholder="Nome do funcionário (obrigatório)" size="40" id="nome_cliente" type="text" maxlength="50"> </li></td></tr>
 </tr>
 <tr>
    <td align="right" >* Numero do registro "NRA":<font color="#000000"></font></td><td align="left"> 
    <input name="num_registro_func" placeholder="Número do registro da empresa (obrigatório)" size="40" id="numero_registro_funcionario" type="number" maxlength="16"></li></td></tr>
    <tr>
    <td align="right" >*RG:<font color="#000000"></font></td><td align="left"> 
    <input name="num_rg_func" placeholder="Número RG:12.345-0(obrigatório)" size="40" id="numero_cpf_funcionario" type="text" maxlength="18"></li></td></tr>
    <tr>
    <td align="right" >*CPF:<font color="#000000"></font></td><td align="left"> 
    <input name="num_cpf_func" placeholder="Número CPF:123.456-0(obrigatório)" size="40" id="numero_cpf_funcionario" type="text" maxlength="18"></li></td></tr>
 <tr>
 <td align="right" >* Cargo:<font color="#000000"></font></td><td align="left">
 <select name="cargo_func" type="text">
 <?php 
	 include_once("../../bd/conexao/conexao.php");
$sql = "SELECT id_cargo, nome_cargo FROM tb_cargo";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
	 while($dados = mysqli_fetch_array($resultado)){ ?>
<?php $nome_cargo = $dados['nome_cargo'];
   echo "<option value='$nome_cargo'>$nome_cargo</option>";
?>
     <?php } ?>
</select></td></tr>
<!--
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
</select></td></tr> Adicionar data de cadastro -->
    <td align="right" >* Data de nascimento:<font color="#000000"></font></td><td align="left">
    <input name="data_nasc_func" id="data_nasc_funcionario" type="date"></li></td></tr>
    <tr>
    <td align="right" >*Escolaridade:<font color="#000000"></font></td><td align="left"> 
    <input name="escol_func" placeholder="Escolaridade do funcionário (obrigatório)" size="40" id="cargo do funcionario" type="text" maxlength="35"></li></td></tr>
    <tr>
 <td align="right" >* Sexo:<font color="#000000"></font></td><td align="left">
        <input name="sexo_func" id="sexo_funcionario_feninino" type="radio" value="F">Feminino <input name="sexo_func" id="sexo_funcionario_masc" type="radio" value="M">Masculino
    </li></td></tr>
 </tr>
 <tr>
 <td align="right" >* Departamento<font color="#000000"></font></td><td align="left">
 <select name="nome_depart_func" type="text">
 <?php 
	 include_once("../../bd/conexao/conexao.php");
$sql = "SELECT id_depart, nome_depart FROM tb_departamento";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
	 while($dados = mysqli_fetch_array($resultado)){ ?>
<?php $nome_depart = $dados['nome_depart'];
   echo "<option value='$nome_depart'>$nome_depart</option>";
?>
     <?php } ?>

</select></td></tr>
 <tr>
      <td align="right" >* Email:<font color="#000000"></font></td><td align="left">
    <input name="email_func" size="40" placeholder="Email do funcionário(obrigatório)" id="email_func" type="email" maxlength="60"></li></td></tr>
    <tr>
      <td align="right" >* Telefone 1:<font color="#000000"></font></td><td align="left">
    <input name="tel_func_1" placeholder="Telefone 1 do funcionário: (13)996xx-xxxx (obrigatório)" size="40" id="Funcionario 1" type="number" maxlength="15"></li></td></tr>
    <tr>
      <td align="right" >Telefone 2:<font color="#000000"></font></td>
      <td align="left">
    <input name="tel_func_2" placeholder="Telefone 2 do funcionário: (13)996xx-xxxx" size="40" id="tel_funcionario 2" type="number" maxlength="15"></li></td></tr>
    <tr>
      <td align="right" >* Senha:<font color="#000000"></font></td><td align="left">
    <input name="senha_func" placeholder="Sua senha (obrigatório)" size="40" id="senha_cliente" type="password" maxlength="16"></li></td></tr>
    <tr>
      <td align="right" >* Confirmar Senha:<font color="#000000"></font></td><td align="left">
    <input name="conf_senha_func" placeholder="Confirmar sua senha (obrigatório)" size="40" id="senha_cliente" type="password" maxlength="16"></li></td></tr>
 <tr>
 <td align="right" >* Gerente responsável:<font color="#000000"></font></td><td align="left">
 <select name="gerente_resp_func" type="text">
 <?php 
	 include_once("../../bd/conexao/conexao.php");
$sql = "SELECT id_func, nome_func FROM `tb_funcionario`
WHERE cargo_func LIKE '%Gerente%'";
$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
	 while($dados = mysqli_fetch_array($resultado)){ ?>
<?php $nome_geren = $dados['nome_func'];
   echo "<option value='$nome_geren'>$nome_geren</option>";
?>
     <?php } ?>
</select></td></tr>
 <tr>
 <td align="right" >* Endereço</br>"Logradouro e numero":<font color="#000000"></font></td><td align="left">
        <input name="end_func" placeholder="Logradouro do funcionário (obrigatório)" size="40" id="endereço_departamento" type="text" maxlength="40"> 
    </li></td></tr>
    <tr>
 <td align="right" >Complemento:<font color="#000000"></font></td><td align="left">
        <input name="complemento_func" placeholder="Complemento" size="40" id="bairro_departamento" type="text" maxlength="35"> 
    </li></td></tr>
 <tr>
 <td align="right" > Bairro:<font color="#000000"></font></td><td align="left">
        <input name="bairro_func" placeholder="Bairro" size="40" id="complemento_func" type="text" maxlength="35"> 
    </li></td></tr>
 <tr>
 <td align="right" >* Cidade:<font color="#000000"></font></td><td align="left">
        <input name="cidade_func" placeholder="Cidade (obrigatório)" size="40" id="cidade_funcionario" type="text" maxlength="35">
    </li></td></tr>
 </tr>
 <tr>
 <td align="right" >* Estado:<font color="#000000"></font></td><td align="left">
         <select name="estado_func" type="text">
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
        <input name="cep_func" placeholder="CEP" size="40" id="cep_cepartamento" type="text" maxlength="9"> 
    </li></td></tr>
 </tr>
 <tr>
      <td align="right" >* Data de contratação:<font color="#000000"></font></td><td align="left">
    <input name="data_contrat" id="data_contratação" type="date" maxlength="10"></li></td></tr><!-- Adicionar uma função para demitir o funcionário, add campo demissao na tabeça nao obrigatório -->
    <tr>
      <td align="right" >Comentários adicionais:<font color="#000000"></font></td><td align="left"><textarea name="coment_func" placeholder="Comentários adicionais sobre o funcionário" id="coment_func" cols="42" rows="4" maxlength="220"></textarea></li></td></tr>
    <tr>
      <td></td><td><input type="submit" value="Cadastrar" name="enviar" id="enviar" onclick="" ></td>
</tr>
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
<?php  mysqli_close($conn); ?>
</body>
</html>