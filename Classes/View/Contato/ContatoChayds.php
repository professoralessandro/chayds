<?php session_start(); ?>
<?php include_once("../../EnviarEmail/Model/EmailContato.php"); ?>
<?php include_once("../../EnviarEmail/Model/EnviarEmail.php"); ?>
<?php include_once("../../Model/Compra.php"); ?>
<?php include_once("../../Model/Pessoa.php"); ?>
<?php include_once("../../Controller/DALCompra.php"); ?>
<?php include_once("../../Controller/DALPessoa.php"); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php
$conexao = new Conexao();
$dalPessoa = new DALPessoa($conexao);
$dalCompra = new DALCompra($conexao);
//POST PHP
if(isset($_POST['enviar']) && $_POST['enviar'] != null)
{
	$emailEnviar = "professor_alessandro@hotmail.com";
	$assunto = trim($_POST['assunto']);
	$nome = trim($_POST['nome']);
	$end = trim($_POST['endereco']);
	$complemento = trim($_POST['complemento']);
	$bairro = trim($_POST['bairro']);
	$cidade = trim($_POST['cidade']);
	$estado = trim($_POST['estado']);
	$cep = trim($_POST['cep']);
	$remetente = trim($_POST['email']);
	$telefone = trim($_POST['telefone']);
	$mensagem = trim($_POST['mensagem']);

	if(isset($_POST['assunto']) && $_POST['assunto'] != null  && isset($_POST['nome']) && $_POST['nome'] != null && isset($_POST['endereco']) && $_POST['endereco'] != null && isset($_POST['cidade']) && $_POST['cidade'] != null && isset($_POST['estado']) && $_POST['estado'] != null && isset($_POST['cep']) && $_POST['cep'] != null && isset($_POST['email']) && $_POST['email'] != null && isset($_POST['telefone']) && $_POST['telefone'] != null && isset($_POST['mensagem']) && $_POST['mensagem'] != null)
	{
		$msg = new EmailContato();

		$mailOk = $msg->enviarEmail($emailEnviar, $assunto, $nome, $end, $complemento, $bairro, $cidade, $estado,$cep, $remetente, $telefone, $mensagem);

		if(!$mailOk)
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
			<script type= \"text/javascript\">
			alert(\"O seu email para $nome email foi enviado com sucesso.\");
			</script>";
		}
		else
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/contato_chayds.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao enviar a mensagem. Tente novamente\");
			</script>";
		}
	}
	else
	{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/contato_chayds.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao enviar a mensagem. Por favor verifique os campos obrigatórios e tente novamente\");
			</script>";
	}
}

//FIM POST PHP
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contato</title>
    <!-- Bootstrap -->
    <link href="../../../css/bootstrap-4.0.0.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="../../../images/favicon.jpg" />
  </head>
  <body>
    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation" >
      <div class="container">
		<img src="../../../images/logo.png" width="115" height="55" title="Logo Chayds" />
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           <!-- BOTOES ADICIONAIS
            <li class="nav-item active"> <a class="nav-link" href="#">Início<span class="sr-only">(current)</span></a> </li>
            FIM BOTOES ADICIONAIS -->
            <li class="nav-item"> <a class="nav-link" href="../../../index.php"><img class="rounded-circle" src="../../../images/336583.png" alt="Loja" width="30" height="30" id="imagem" title="Loja" />&nbsp;Loja</a> </li>
            <li class="nav-item"> <a class="nav-link" href="../Contato/ContatoChayds.php"><img title="Suporte" class="rounded-circle" src="../../../images/support3.png" width="30" height="30" />&nbsp;Contato</a></li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?php
				if(isset($_SESSION['usuarioNome']) && $_SESSION['usuarioNome'] != null)
				{ ?>
					<img class="rounded-circle" src='<?php echo "../../../imagens/".$_SESSION['usuarioImagem'];?>' alt="foto de perfil" width="33" height="33" id="imagem" title="foto de perfil" />
				<?php $usu = $_SESSION['usuarioNome'];
					echo($dalPessoa->primeiroNome($usu));
				 ?>
					</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href='../Alterar/AlterarUsuarioCompra.php?idPessoa=<?php echo $_SESSION['usuarioId'];?>'><img class="rounded-circle" src="../../../images/124654893.png" width="35" height="37" />&nbsp;Alterar informações</a>
                <!--<a class="dropdown-item" href="../../../images/support.png"><img class="rounded-circle" src="../../../images/support.png" width="35" height="37" />&nbsp;&nbsp;&nbsp;Suporte chayds</a>-->
                <div class="dropdown-divider"></div>
			<table>
			<?php
			
			$compra = new Compra(0, $_SESSION['usuarioId'], '', $_SESSION['usuarioNome'], $_SESSION['usuarioEmail'], '', '', '', '', $valorTotal = 0, $_SESSION['usuarioCPF'], 30, '', '', '', '', '');
			
			//print_r($compra);
			
			$resultado = $dalCompra->contadorCompraCarrinho($compra);
			
			//echo("Retorno Test Funcao". $resultado); 
			
			$contadorCarrinho = 0;
				 
			while($dados = mysqli_fetch_array($resultado))
			{
				$contadorCarrinho += $dados['quantidadeProduto'];
				
				if($contadorCarrinho == 9)
				{
					break;
				}
				else if($contadorCarrinho > 10)
				{
					$contadorCarrinho = 10;
					break;
				}
			}//WHILE CONTADOR CARRINHO
			?>
			  <tr>
				<td><a class="dropdown-item" href="../Loja/ConfirmarCompraCarrinho.php"><img class="rounded-circle" src="../../../images/carrioverde<?php echo $contadorCarrinho; ?>.png" alt="foto de perfil" width="43" height="33" id="imagem" title="Carrinho de compras" />&nbsp;Carrinho de compras</a>
				  </td>
			  </tr>
		<?php 
				$contadorMensagem = 0;
				 if(isset($contadorMensagem) & $contadorMensagem > 0)
				{?>
			<tr>
				<td><a class="dropdown-item" href="#">Avisos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <img class="rounded-circle" src="images/email<?php echo $contadorMensagem; ?>.png" width="43" height="33" class="rounded-circle" alt="Email" title="Avisos chayds"></a></td>
			</tr>
		<?php } ?>
			<tr align="center">
				<td align="center">
				<a href="../../../bd/valida/sair.php">
				<input align="right" class="btn btn-danger" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sair&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" name="enviarLogof" /></a>
				</td>
			</tr>
			</table>
              </div>
            </li>
				<?php
				}
				else
				{
					?> <!--  INICIO DO MENU DROP COM USUARIO DESLOGADO -->
					<img class="rounded-circle" src="../../../imagens/profile.png" alt="foto de perfil" width="33" height="33" id="imagem" title="foto de perfil" />
					<?php echo("Usuário"); ?>
					</a>
	<div align="center" class="dropdown-menu" aria-labelledby="navbarDropdown">
		<form name="formLogin" action="../../../bd/valida/validateste.php" target="_self" method="post">
			<table align="center">
              <tr>
				<div class='border-0'><td><img class="rounded-circle" src="../../../images/user-silhouette.png" width="35" height="37" /></td><td>&nbsp;<input class="alert border-0 text-center" name="email" type="email" required="required" id="celular" placeholder="Informe o seu email (Obrigatório)" title="email" size="30" maxlength=50"></div>
			    </td>
			  </tr>
			  <tr>
				<div class='border-0'><td><img class="rounded-circle" src="../../../images/lock2.png" width="35" height="37" /></td><td>&nbsp;<input name="senha" type="password" class="alert border-0 text-center" required="required" id="endereco" placeholder="Informe a senha (Obrigatório)" title="Senha" size="30" maxlength=50"></div>
				</td>
			  </tr>
		</table>
		<table align="center">
			<hr>
		        <td align="center"></td><td align="center">
				<input align="center" class="btn btn-primary" type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Entrar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" name="enviarLogin" />
				</td>
		        <tr>
				<td align="center"></td>
                <td align="center"><br><a class="dropdown-item" href="../Usuario/CadastroSimplesUsuario.php">Cadastrar-se</a>
				</td>
				</tr>
		     
			</table>
			</form>
            </li> <!--  FIM DO MENU DROP COM USUARIO DESLOGADO -->
				<?php /* FIM DO MENU DROP COM USUARIO DESLOGADO */ } ?>
            <!-- SEGUNDO MENU DROP
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuário</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Alterar informações</a>
                <a class="dropdown-item" href="#">Enviar mensagem</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Carrinho de compras</a>
              </div>
            </li>
            FIM SEGUNDO MENU DROP -->
		    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img title="Redes sociais" class="rounded-circle" src="../../../images/1488003.png" width="30" height="30" />&nbsp;&nbsp;Redes Sociais</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../Posts/Instagram.php"><img title="Instagram" class="rounded-circle" src="../../../images/1.gif" width="30" height="30" />&nbsp;Instagram</a>
				<div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../Posts/FacebookPosts.php"><img title="Instagram" class="rounded-circle" src="../../../images/2.gif" width="30" height="30" />&nbsp;Facebook</a>
                <div class="dropdown-divider"></div>
				<a class="dropdown-item" href="../Videos/Videos.php"><img title="Instagram" class="rounded-circle" src="../../../images/quanto-custa-anunciar-no-youtube.png" width="30" height="30" />&nbsp;Youtube</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="../Posts/Twitter.php"><img title="Twitter" class="rounded-circle" src="../../../images/3.gif" width="30" height="30" />&nbsp;Twitter</a>
              </div>
            </li>
		  <!-- IMAGENS
		    <li class="nav-item">
              <a class="nav-link disabled" href="Classes/View/Imagens/Imagens.php">Imagens</a>
            </li>
		  -->
	<?php
		  if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente')
		  { ?>
		    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastrar</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../Cadastro/CadastroUsuario.php">Usuário</a>
				<a class="dropdown-item" href="../Cadastro/CadastroFuncionario.php">Funcionário</a>
				<a class="dropdown-item" href="../Cadastro/CadastroEmpresa.php">Empresa</a>
				<a class="dropdown-item" href="../Cadastro/CadastroDepartamento.php">Departamento</a>
				<a class="dropdown-item" href="../Cadastro/CadastroProduto.php">Produto</a>
				<!--<a class="dropdown-item" href="Classes/View/Cadastro/CadastroCarrinho.php">Carrinho</a>-->
				<!--<a class="dropdown-item" href="#">Email</a>-->
                <!--<a class="dropdown-item" href="#">Enviar mensagem</a>-->
				<!--<a class="dropdown-item" href="#">Imagem</a>-->
				<!--<a class="dropdown-item" href="#">Vídeo</a>-->
              </div>
            </li>
		    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listar</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../Busca/ListaUsuario.php">Usuários</a>
				<a class="dropdown-item" href="../Busca/ListaFuncionario.php">Funcionários</a>
				<a class="dropdown-item" href="../Busca/ListaEmpresa.php">Empresas</a>
				<a class="dropdown-item" href="../Busca/ListaDepartamento.php">Departamentos</a>
				<a class="dropdown-item" href="../Busca/ListaProduto.php">Produtos</a>
				<a class="dropdown-item" href="../Busca/ListaCompra.php">Compras</a>
				<!--<a class="dropdown-item" href="Classes/View/Busca/ListaCarrinho.php">Carrinhos</a>-->
				<!--<a class="dropdown-item" href="#">Log</a>-->
				<!--<a class="dropdown-item" href="#">Email</a>-->
                <!--<a class="dropdown-item" href="#">Mensagem</a>-->
				<!--<a class="dropdown-item" href="#">Imagens</a>-->
				<!--<a class="dropdown-item" href="#">Vídeos</a>-->
              </div>
            </li>
		  <?php } ?>
			  <!-- PROXIMAS LINHAS
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
				-->
		  <!-- SEGUNDO MENU DROP
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuário</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Alterar informações</a>
                <a class="dropdown-item" href="#">Enviar mensagem</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Carrinho de compras</a>
              </div>
            </li>
            -->
          </ul>
          <!-- PROCURAR -->
          <form name="formBuscar" class="form-inline my-2 my-lg-0" action="../Busca/ResultadoBusca.php" target="_self" method="post">
            <div class="btn-secondary border-0"><input name="buscar" class='btn btn-secondary border-0 text-center font-weight-bold' size="19" type="search" aria-label="Search"><!--<input name="procurar" class='align-baseline' type="image" id="procurar" title="Procurar" src="images/musica-searcher.png" alt="procurar" width="25" height="28" />-->
			<button class='btn-secondary border-0 text-center font-weight-bold' >
			<img src="../../../images/musica-searcher.png" width="25" height="28" /></button></div>
          </form>
          <!-- FIM PROCURAR -->
        </div>
      </div>
    </nav>
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleControls" data-slide-to="1"></li>
              <li data-target="#carouselExampleControls" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100 img-fluid" src="../../../images/52b9979b-2d7d-4894-8e6f-86d6e02af264.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><strong>ONE MAN</strong></h5>
                  <p><strong>Complexo Vitaminico completo feito</strong></p>
                  <p><strong>para homens 120 capsulas </strong></p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="../../../images/f86c801f-e597-4692-b819-f7a53d77b270.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><strong>ONE GIRL</strong></h5>
                  <p><strong>Complexo Vitaminico completo feito</strong></p>
                  <p><strong>para mulher 120 Capsulas</strong></p>
                </div>
              </div>
				<div class="carousel-item">
                <img class="d-block w-100 img-fluid" src="../../../images/2.png" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><strong>Maca Black</strong></h5>
                  <p><strong>Suplemento Vitaminico Maca 120 Capsulas&nbsp;</strong></p>
                </div>
              </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
        <div class="col-12">&nbsp;</div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="row">
            <div class="col-2"><img src="../../../images/img2.png" alt="Free Shipping" width="40" height="40" class="rounded-circle"></div>
            <div class="col-lg-6 col-10 ml-1">
              <h4>Frete Grátis</h4>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="row">
            <div class="col-2"><img src="../../../images/img7.jpg" alt="Free Shipping" width="40" height="40" class="rounded-circle"></div>
            <div class="col-lg-6 col-10 ml-1">
              <h4>Devolução Grátis</h4>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="row">
            <div class="col-2"><img src="../../../images/img6.jpg" alt="Free Shipping" width="40" height="40" class="rounded-circle"></div>
            <div class="col-lg-6 col-10 ml-1">
              <h4>Preço Baixo</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <h2 class="text-center">CONTATO CHAYDS</h2>
    <hr>
<!-- TESTE <form name="form_email" action="../../Controller/EnviarEmail.php" target="_self" method="post"> -->
   <form name="form_email" action="#" target="_self" method="post">
    <div class="container" align="center">
      <table class="form_menu2" align="center">
        <tr>
          <td align="center"><h5>* Assunto: </h5>
            <font color="#000000">
            <blockquote>
              <input name="assunto" type="text" required="required" id="assunto" placeholder="Informe o assunto (obrigatório)" title="Assunto" size="40" maxlength=50">
            </blockquote></td>
          <td align="center"><h5>* Nome: </h5>
            <font color="#000000">
            <blockquote>
              <input name="nome" type="text" required="required" id="nome" placeholder="Informe o seu nome completo (obrigatório)" title="Nome" size="40" maxlength=50">
            </blockquote></td>
          <td align="center"><h5>* Email: </h5>
            <font color="#000000">
            <blockquote>
              <input name="email" type="text" required="required" id="email" placeholder="Informe o seu email (obrigatório)" title="Email" size="40" maxlength=50">
            </blockquote></td>
        </tr>
      </table>
      <table>
        <tr>
          <td align="center"><h5>* Telefone: </h5>
            <font color="#000000">
            <blockquote>
              <input name="telefone" type="text" required="required" id="telefone" placeholder="Informe o seu numero para contato (obrigatório)" title="Telefone" size="40" maxlength=50">
            </blockquote></td>
          <td align="center"><h5>Celular: </h5>
            <font color="#000000">
            <blockquote>
              <input name="celular" type="text" id="celular" placeholder="Informe o seu numero de celular para contato" title="Celular" size="40" maxlength=50">
            </blockquote></td>
        </tr>
      </table>
      <table class="form_menu2" align="center">
        <tr>
          <td align="center"><h5>* Endereço: </h5>
            <font color="#000000">
            <blockquote>
              <input name="endereco" type="text" required="required" id="endereco" placeholder="Informe o logradouro (obrigatório)" title="Endereço" size="40" maxlength=50">
            </blockquote></td>
          <td align="center"><h5>Complemento: </h5>
            <font color="#000000">
            <blockquote>
              <input name="complemento" type="text" id="complemento" placeholder="Informe o complemento" title="Complemento" size="40" maxlength=50">
            </blockquote></td>
          <td align="center"><h5>Bairro: </h5>
            <font color="#000000">
            <blockquote>
              <input name="bairro" type="text" id="bairro" placeholder="Informe o bairro" title="Bairro" size="40" maxlength=50">
            </blockquote></td>
        </tr>
        <tr>
          <td align="center"><h5>* Cidade: </h5>
            <font color="#000000">
            <blockquote>
              <input name="cidade" type="text" required="required" id="cidade" placeholder="Informe a cidade (obrigatório)" title="Cidade" size="40" maxlength=50">
            </blockquote></td>
          <td align="center"><h5>* Estado: </h5>
            <font color="#000000">
            <blockquote>
              <input name="estado" type="text" required="required" id="estado" placeholder="Informe o estado (obrigatório)" title="Estado" size="40" maxlength=50">
            </blockquote></td>
          <td align="center"><h5>* CEP: </h5>
            <font color="#000000">
            <blockquote>
              <input name="cep" type="text" required="required" id="cep" placeholder="Informe o cep (obrigatório)" title="CEP" size="40" maxlength=50">
            </blockquote></td>
        </tr>
      </table>
      <tr>
        <td align="center"><h5>* Mensagem:</h5>
          <font color="#000000">
          <blockquote>
            <textarea name="mensagem" cols="100" rows="10" maxlength="3024" required id="mensagem" placeholder="Informe qual é a mensagem que deseja nos enviar(obrigatório)" title="Mensagem"></textarea>
			<br>
            <blockquote>
			<input class="btn btn-primary"  type="submit" value="Enviar" name="enviar" />
            <!-- <p align="right"><a href="#" class="btn btn-primary">Enviar Mengem</a></p> -->
          </blockquote></td>
      </tr>
    </div>
</form>
    
    <hr>
    <div class="container text-white bg-dark p-4">
      <div class="row">
        <div class="col-6 col-md-8 col-lg-7">
          <div class="row text-center">
            <div class="col-sm-6 col-md-4 col-lg-4 col-12">
              <ul class="list-unstyled">
                <li class="btn-link"> <a>Manter a boa forma</a></li>
                <li class="btn-link"> <a>Ganho de força</a></li>
                <li class="btn-link"> <a>Ganho de vitalidade</a></li>
                <li class="btn-link"> <a>Ganho de cognição</a></li>
                <li class="btn-link"> <a>Emagrecimento</a></li>
              </ul>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-12">
              <ul class="list-unstyled">
                <li class="btn-link"> <a>Dietas Chayds</a></li>
                <li class="btn-link"> <a>Dietas</a></li>
                <li class="btn-link"> <a>Receitas light</a></li>
                <li class="btn-link"> <a>Receitas veganas</a></li>
                <li class="btn-link">Receitas balanceadas</li>
              </ul>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-12">
              <ul class="list-unstyled">
                <li class="btn-link"> <a>Exercicios físicos</a></li>
                <li class="btn-link"> <a>Massa muscular</a></li>
                <li class="btn-link"> <a>extresse</a></li>
                <li class="btn-link"> <a>Qualidade de vida</a></li>
                <li class="btn-link">Bem estar</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-5 col-6">
          <address>
          <strong>Chayd`s Vitamins, Supplements and Minerals</strong><br>
Importadora Brasileira<br>
<a href="#" target="_self"><img src="../../../images/icon_phone.png" alt="Telefone" width="25" height="25" class="rounded-circle img-fluid"></a> +55 13 9 9644 2358<br>
<abbr><a href="#" target="_self"><img src="../../../images/icon_whatsapp.png" alt="Whatsapp""" width="25" height="25" class="rounded-circle img-fluid"../../images/icon_phone.png></a></abbr> +55 13 9 9644 2358
          </address>
          <address>
          <strong>Serviço de Atendimento ao Cliente</strong><br>
          <a href="#" target="_self"><img src="../../../images/email.svg" width="25" height="25" class="rounded-circle" alt="Email"></a>&nbsp;</a><a href="#">sac@chayds.com.br</a>
          </address>
          <address>
          <a href="https://www.facebook.com/vita.chayds.3" target="_blank"><img src="../../../images/2.gif" alt="Facebook" width="50" height="50" class="rounded-circle img-fluid"></a>&nbsp;&nbsp;<a href="#" target="_self"><img src='../../../images/3.gif' alt="Twitter" width="50" height="50" class="rounded-circle"></a>&nbsp;&nbsp;<a href="#" target="_self"><img src="../../../images/7.gif" alt="Youtube" width="50" height="50" class="rounded-circle img-fluid"></a>&nbsp;&nbsp;<a href="#" target="_self"><img src="../../../images/1.gif" alt="Instagran" width="50" height="50" class="rounded-circle"></a><!--&nbsp;&nbsp;<a href="https://allgoldenstars.webs.com/" target="_blank"><img src="../../images/ags1.jpg" alt="All Golden Stars" width="50" height="50" class="rounded-circle"></a>-->
			  
          </address>
        </div>
      </div>
    </div>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © Chayd`s. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../../js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../../js/popper.min.js"></script>
    <script src="../../../js/bootstrap-4.0.0.js"></script>
  </body>
</html>