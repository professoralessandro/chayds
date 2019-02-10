<?php session_start(); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php include_once("../../Model/Produto.php"); ?>
<?php include_once("../../Model/Compra.php"); ?>
<?php include_once("../../Model/Pessoa.php"); ?>
<?php include_once("../../Controller/DALCompra.php"); ?>
<?php include_once("../../Controller/DALPessoa.php"); ?>
<?php include_once("../../Controller/DALProduto.php"); ?>
<?php
if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] != null && $_SESSION['usuarioAcessoNiveis'] == 'Gerente')
{
	$conexao = new Conexao();
	$dalPessoa = new DALPessoa($conexao);
	$dalCompra = new DALCompra($conexao);
	$dalProduto = new DALProduto($conexao);

	if(isset($_POST['alterar']) && $_POST['alterar'] != null)
	{
		$idProduto = trim($_POST['idProduto']);
		$nomeProduto = trim($_POST['nomeProduto']);
		$descricaoProduto = trim($_POST['descricaoProduto']);
		$quantidade = trim($_POST['quantidade']);
		$estoqueMinimo = trim($_POST['estoqueMinimo']);
		
		//TRATAMENTO MEDIDAS
		$altura= trim($_POST['altura']);
		//$altura= $dalProduto->moeda($altura);
		
		$largura = trim($_POST['largura']);
		//$largura= $dalProduto->moeda($largura);
		
		$comprimento = trim($_POST['comprimento']);
		//$comprimento = $dalProduto->moeda($largura);
		
		//TRATAMENTO MEDIDAS
		$publicoAlvo = trim($_POST['publicoAlvo']);
		$codigoBarras = trim($_POST['codigoBarras']);
		$fornecedor = trim($_POST['fornecedor']);
		
		//TRATAMENTO PREÇOS
		$precoCusto = trim($_POST['precoCusto']);
		$precoCusto = $dalProduto->moeda($precoCusto);
		
		$precoVenda = trim($_POST['precoVenda']);
		$precoVenda = $dalProduto->moeda($precoVenda);
		
		$precoDesconto = trim($_POST['precoDesconto']);
		$precoDesconto = $dalProduto->moeda($precoDesconto);
		//TRATAMENTO PREÇOS
		
		//TRATAMENTO PESO
		$peso = trim($_POST['peso']);
		$peso = $dalProduto->moeda($peso);
		//TRATAMENTO PESO
		
		$dataCadastro = '';
		
		//TRATAMENTO DOS TITULOS E DESCRIÇÕES
		$titulo1 = trim($_POST['titulo1']);
		$titulo2 = trim($_POST['titulo2']);
		$titulo3 = trim($_POST['titulo3']);
		$titulo4 = trim($_POST['titulo4']);
		
		if(isset($_POST['comentariosProduto']) && $_POST['comentariosProduto'] != null && $_POST['comentariosProduto'] != '')
		{
			$comentariosProduto = trim($_POST['comentariosProduto']);
		}
		else
		{
			$comentariosProduto = trim($_POST['comentariosProdutoAnt']);
		}
		
		//TRATAMENTO DE DESCRIÇÕES OK
		//TRATAMENTO DESCRICAO 1
		if(isset($_POST['descricao1']) && $_POST['descricao1'] != null && $_POST['descricao1'] != '')
		{
			$descricao1 = trim($_POST['descricao1']);
		}
		else
		{
			$descricao1 = trim($_POST['descricaoAnt1']);
		}
		
		//TRATAMENTO DESCRICAO 2
		if(isset($_POST['descricao2']) && $_POST['descricao2'] != null && $_POST['descricao2'] != '')
		{
			$descricao2 = trim($_POST['descricao2']);
		}
		else
		{
			$descricao2 = trim($_POST['descricaoAnt2']);
		}
		
		//TRATAMENTO DESCRICAO 3
		if(isset($_POST['descricao3']) && $_POST['descricao3'] != null && $_POST['descricao3'] != '')
		{
			$descricao3 = trim($_POST['descricao3']);
		}
		else
		{
			$descricao3 = trim($_POST['descricaoAnt3']);
		}
		
		//TRATAMENTO DESCRICAO 4
		if(isset($_POST['descricao4']) && $_POST['descricao4'] != null && $_POST['descricao4'] != '')
		{
			$descricao4 = trim($_POST['descricao4']);
		}
		else
		{
			$descricao4 = trim($_POST['descricaoAnt4']);
		}
		//TRATAMENTO DOS TITULOS E DESCRIÇÕES OK
		//TRATAMENTO DE IMAGENS
		
		$imagemAnt = trim($_POST['imagemAnt']);
		if(isset($_FILES['imagem']) && $_FILES['imagem'] != null && $_FILES['imagem'] != '')
		{
			$imagemNova = trim($_FILES['imagem']['name']);
			$temp = trim($_FILES['imagem']['tmp_name']);
			$size = trim($_FILES['imagem']['size']);
		}
		else
		{
			$_FILES['imagem']['name'] = '';
			$_FILES['imagem']['tmp_name'] = '';
			$_FILES['imagem']['size'] = 10;
		}
		
		$imagemAnt2 = trim($_POST['imagemAnt2']);
		//TRATAMENTO DE IMAGENS
		if(isset($_FILES['imagem2']) && $_FILES['imagem2'] != null && $_FILES['imagem2'] != '')
		{
			$imagemNova2 = trim($_FILES['imagem2']['name']);
			$temp2 = trim($_FILES['imagem2']['tmp_name']);
			$size3 = trim($_FILES['imagem2']['size']);
		}
		else
		{
			$_FILES['imagem2']['name'] = '';
			$_FILES['imagem2']['tmp_name'] = '';
			$_FILES['imagem2']['size'] = 10;
		}
		
		$imagemAnt3 = trim($_POST['imagemAnt3']);
		//TRATAMENTO DE IMAGENS
		if(isset($_FILES['imagem3']) && $_FILES['imagem3'] != null && $_FILES['imagem3'] != '')
		{
			$imagemNova3 = trim($_FILES['imagem3']['name']);
			$temp3 = trim($_FILES['imagem3']['tmp_name']);
			$size3 = trim($_FILES['imagem3']['size']);
		}
		else
		{
			$_FILES['imagem3']['name'] = '';
			$_FILES['imagem3']['tmp_name'] = '';
			$_FILES['imagem3']['size'] = 10;
		}

		if( isset($_POST['descricaoProduto']) && $_POST['descricaoProduto'] != null && isset($_POST['quantidade']) && $_POST['quantidade'] != null && isset($_POST['estoqueMinimo']) && $_POST['estoqueMinimo'] != null && isset($_POST['altura']) && $_POST['altura'] != null && isset($_POST['largura']) && $_POST['largura'] != null && isset($_POST['comprimento']) && $_POST['comprimento'] != null && isset($_POST['peso']) && $_POST['peso'] != null && isset($_POST['fornecedor']) && $_POST['fornecedor'] != null && isset($_POST['precoCusto']) && $_POST['precoCusto'] != null && isset($_POST['precoVenda']) && $_POST['precoVenda'] != null)
		{
			if($size > 1 || $size < 30001)
			{
				//print_r($produto);

				//header("Location: CadastroUsuario.php");
				
				//INICIO IMAGEM NOVA 1
				if(isset($imagemNova) && $imagemNova != null && isset($imagemAnt) && $imagemAnt != null)
				{					
					$img1 = $imagemNova;

					unlink("../../../imagens/".$imagemAnt);

					move_uploaded_file($temp,"../../../imagens/".$imagemNova);
				}
				else if(isset($imagemAnt) && $imagemAnt != null && $imagemNova == null)
				{
					$img1 = $imagemAnt;
				}
				else if($imagemAnt == null && $imagemNova == null)
				{
					$img1 = "400X200.gif";
				}
				else if($imagemAnt == null && isset($imagemNova) && $imagemNova != null)
				{
					$img1 = $imagemNova;

					move_uploaded_file($temp,"../../../imagens/".$imagemNova);
				}
				//FIM IMAGEM NOVA 1
				
				//INICIO IMAGEM NOVA 2
				if(isset($imagemNova2) && $imagemNova2 != null && isset($imagemAnt2) && $imagemAnt2 != null)
				{
					$img2 = $imagemNova2;

					unlink("../../../imagens/".$imagemAnt2);

					move_uploaded_file($temp2,"../../../imagens/".$imagemNova2);
				}
				else if(isset($imagemAnt2) && $imagemAnt2 != null && $imagemNova2 == null)
				{
					$img2 = $imagemAnt2;
				}
				else if($imagemAnt2 == null && $imagemNova2== null)
				{
					$img2 = "400X200.gif";
				}
				else if($imagemAnt2 == null && isset($imagemNova2) && $imagemNova2 != null)
				{
					$img2 = $imagemNova2;

					move_uploaded_file($temp2,"../../../imagens/".$imagemNova2);
				}
				//FIM IMAGEM NOVA 2
				
				//INICIO IMAGEM NOVA 3
				if(isset($imagemNova3) && $imagemNova3 != null && isset($imagemAnt3) && $imagemAnt3 != null)
				{
					$img3 = $imagemNova3;

					unlink("../../../imagens/".$imagemAnt3);

					move_uploaded_file($temp3,"../../../imagens/".$imagemNova3);
				}
				else if(isset($imagemAnt3) && $imagemAnt3 != null && $imagemNova3 == null)
				{
					$img3 = $imagemAnt3;
				}
				else if($imagemAnt3 == null && $imagemNova3 == null)
				{
					$img3 = "bkg07.jpg";
				}
				else if($imagemAnt3 == null && isset($imagemNova3) && 3 != null)
				{
					$img3 = $imagemNova3;

					move_uploaded_file($temp3,"../../../imagens/".$imagemNova3);
				}
				//FIM IMAGEM NOVA 3
				
				$produto = new Produto($idProduto, $nomeProduto, $dataCadastro, $quantidade, $precoVenda, $altura, $largura, $comprimento, $peso, $img1, $videoYoutube, $comentariosProduto, $descricaoProduto, $estoqueMinimo, $codigoBarras, $fornecedor, $precoCusto, $precoDesconto, $publicoAlvo, $titulo1, $titulo2, $titulo3, $titulo4, $descricao1,  $descricao2, $descricao3, $descricao4, $img2, $img3);
				
				//print_r($produto);
				
				$cadastroOK = $dalProduto->alterarProduto($produto);

				if(!$cadastroOK)
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
					<script type= \"text/javascript\">
					alert(\"O produto $nomeProduto foi alterado com sucesso.\");
					</script>";
				}//ALTERAR OK
				else
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/contato_chayds.php'>
					<script type= \"text/javascript\">
					alert(\"Erro ao alterar o produto. Tente novamente\");
					</script>";
				}//ALTERAR OK
			}
			else
			{
				echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/contato_chayds.php'>
				<script type= \"text/javascript\">
				alert(\"Erro ao alterar o produto. O tamanho do arquivo deve ter até 30MB\");
				</script>";
			}//TAMANHO
		}//IF CAMPOS OBRIGATORIOS
		else
		{
				echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/contato_chayds.php'>
				<script type= \"text/javascript\">
				alert(\"Erro ao alterar o produto. Por favor verifique os campos obrigatórios e tente novamente\");
				</script>";
		}//CAMPOS OBRIGATORIOS
	}//CADASTRAR

	//FIM POST PHP
	?>
	<!DOCTYPE html>
	<html lang="en">
	  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Alterar Produto</title>
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
		<h2 class="text-center">ALTERAR PRODUTO</h2>
		<hr>
	<?php
		$id = trim(filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_NUMBER_INT));

		$resultado = $dalProduto->localizarProduto($id);

		$dados = mysqli_fetch_array($resultado);
	?>
	<form name="formCadastroProduto" action="#" target="_self" method="post" enctype="multipart/form-data">
		<div class="container" align="center">
		  <table class="form_menu2" align="center">
			  <input hidden="hidden" name="imagemAnt" type="text" title="imagemAnt" value='<?php echo $dados['imagem'];?>' size="40" maxlength=50">
			  <input hidden="hidden" name="imagemAnt2" type="text" title="imagemAnt2" value='<?php echo $dados['imagem2'];?>' size="40" maxlength=50">
			  <input hidden="hidden" name="imagemAnt3" type="text" title="imagemAnt3" value='<?php echo $dados['imagem3'];?>' size="40" maxlength=50">
			  <input hidden="hidden" name="idProduto" type="text" id="nomeProduto" title="Nome do Produto" value='<?php echo $dados['idProduto'];?>' size="40" maxlength=50">
			<tr>
			  <td align="center">
				  <label for="nomeProduto"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="nome Produto" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="nomeProduto" type="text" required="required" id="nomeProduto" placeholder="Nome do produto" title="nomeProduto" value='<?php echo $dados['nome'];?>' size="25" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="descricaoProduto"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="Descricao produto" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="descricaoProduto" type="text" required="required" id="descricaoProduto" placeholder="Descrição príncipal" title="descricaoProduto" value='<?php echo $dados['descricaoProduto'];?>' size="25" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="quantidade"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="quantidade" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="quantidade" type="number" required="required" id="quantidade" placeholder="Quantidade" title="quantidade" value='<?php echo $dados['quantidade'];?>' size="15" maxlength="50">&nbsp;
		  	  </td>
			</tr>
			<tr>
			<td><p>&nbsp;</p></td>
			</tr>    
			<tr>
			  <td align="center">
				  <label for="estoqueMinimo"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="estoqueMinimo" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="estoqueMinimo" type="number" required="required" id="estoqueMinimo" placeholder="Estoque mínimo" title="estoqueMinimo" value='<?php echo $dados['quantidadeMinima'];?>' size="15" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="altura"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="altura" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="altura" type="number" required="required" id="altura" placeholder="Altura (CM)" title="altura" value='<?php echo $dados['altura'];?>' size="25" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="largura"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="largura" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="largura" type="number" required="required" id="largura" placeholder="Largura (CM)" title="largura" value='<?php echo $dados['largura'];?>' size="25" maxlength="50">&nbsp;
		  	  </td>
			</tr>
			<tr>
			<td><p>&nbsp;</p></td>
			</tr>
			<tr>
			  <td align="center">
				  <label for="comprimento"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="comprimento" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="comprimento" type="number" required="required" id="comprimento" placeholder="Comprimento (CM)" title="comprimento" value='<?php echo $dados['comprimento'];?>' size="25" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="peso"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="peso" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="peso" type="number" required="required" id="peso" placeholder="Peso (KG)" title="peso" value='<?php echo $dalProduto->virgula($dados['peso']);?>' size="25" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="publicoAlvo">
				  <img title="publicoAlvo" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="publicoAlvo" type="text" id="publicoAlvo" placeholder="Público alvo" title="publicoAlvo" value='<?php echo $dados['publicoAlvo'];?>' size="25" maxlength="50">&nbsp;
		  	  </td>
			</tr>
			<tr>
			<td><p>&nbsp;</p></td>
			</tr>
			<tr>
			  <td align="center">
				  <label for="codigoBarras"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="codigoBarras" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="codigoBarras" type="number" required="required" id="codigoBarras" placeholder="Código de barras" title="codigoBarras" value='<?php echo $dados['codigoBarras'];?>' size="25" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="fornecedor"><font class="font-weight-bold" color="#ff0000">*</font>
			 	  <img title="fornecedor" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;
				  <select class='btn btn-group border-0 text-center font-weight-bold' name="fornecedor" id="fornecedor" title="Fornecedor" type="text">
					<option class='btn btn-group border-0 text-center font-weight-bold' value="Chayds">Chayds vitamins and minnerals</option>
					<option class='btn btn-group border-0 text-center font-weight-bold' value="Outros">Outros</option>
					<option class='btn btn-group border-0 text-center font-weight-bold' value="Novo">novo</option>
				  </select>
			  </td>
			  <td align="center">
				  <label for="precoCusto"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="precoCusto" class="rounded-circle" src="../../../images/69881coin.svg" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="precoCusto" type="text" required="required" id="precoCusto" placeholder="Preço de custo" title="precoCusto" value='<?php echo $dalProduto->virgula($dados['precoCusto']);?>' size="15" maxlength="50">&nbsp;
		  	  </td>
			</tr>
			<tr>
			<td><p>&nbsp;</p></td>
			</tr>
			<tr>
			  <td align="center">
				  <label for="precoVenda"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="precoVenda" class="rounded-circle" src="../../../images/69881coin.svg" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="precoVenda" type="text" required="required" id="precoVenda" placeholder="Preço de venda" title="precoVenda" value='<?php echo $dalProduto->virgula($dados['precoVenda']);?>' size="15" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="precoDesconto"><font class="font-weight-bold" color="#ff0000">*</font>
				  <img title="precoDesconto" class="rounded-circle" src="../../../images/69881coin.svg" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="precoDesconto" type="text" required="required" id="precoDesconto" placeholder="Preço com desconto" title="precoDesconto" value='<?php echo $dalProduto->virgula($dados['precoVendaDesconto']);?>' size="15" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="videoYoutube"><font class="font-weight-bold" color="#ff0000"></font>
				  <img title="videoYoutube" class="rounded-circle" src="../../../images/anunciar-no-youtube.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="videoYoutube" type="text" id="videoYoutube" placeholder="Informe um link no youtube" title="videoYoutube" value='<?php echo $dados['video'];?>' size="25" maxlength="50">&nbsp;
		  	  </td>
			  </tr>
			  <tr>
			  <td><p>&nbsp;</p></td>
		      </tr>
			  <tr>
				<td align="center"><h5>Selecionar imagem principal do produto:</br><font color="#ff0000"> Tamanho máximo 15MB</font></h5>
				<blockquote>
				  <input class='btn btn-group border-0 text-center font-weight-bold' name="imagem" type="file" id="imagem" title="imagem" size="30" maxlength=50">
			  </blockquote></td>
			  <td align="center"><h5>Selecionar segunda imagem do produto:</br><font color="#ff0000"> Tamanho máximo 15MB</font></h5>
				<blockquote>
				  <input class='btn btn-group border-0 text-center font-weight-bold' name="imagem2" type="file" id="imagem" title="imagem 2" size="30" maxlength=50">
			  </blockquote></td>
			<td align="center"><h5>Selecionar terceira imagem do produto:</br><font color="#ff0000"> Tamanho máximo 15MB</font></h5>
				<blockquote>
				  <input class='btn btn-group border-0 text-center font-weight-bold' name="imagem3" type="file" id="imagem" title="imagem 3" size="30" maxlength=50">
			  </blockquote></td>
			</tr>
		</table>
		<table align="center">
		  <tr>
			  <td><p>&nbsp;</p></td>
		  </tr>
		  <tr>
			  <td align="center">
				  <label for="titulo1">
				  <img title="titulo1" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="titulo1" type="text" id="titulo1" placeholder="1º Propriedade do produto" title="titulo1" value='<?php echo $dados['titulo1'];?>' size="20" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="titulo2">
				  <img title="titulo2" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="titulo2" type="text" id="titulo2" placeholder="2º Propriedade do produto" title="titulo2" value='<?php echo $dados['titulo2'];?>' size="20" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="titulo3">
				  <img title="titulo3" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="titulo3" type="text" id="titulo3" placeholder="3º Propriedade do produto" title="titulo3" value='<?php echo $dados['titulo3'];?>' size="20" maxlength="50">&nbsp;
		  	  </td>
			  <td align="center">
				  <label for="titulo4">
				  <img title="titulo4" class="rounded-circle" src="../../../images/1246548.png" width="35" height="37" /></label>&nbsp;<input class='btn btn-group border-0 text-center font-weight-bold' name="titulo4" type="text" id="titulo4" placeholder="4º Propriedade do produto" title="titulo4" value='<?php echo $dados['titulo4'];?>' size="20" maxlength="50">&nbsp;
		  	  </td>
		 </tr>
		 <tr>
			  <td><p>&nbsp;</p></td>
		 </tr>
		 <tr>
			  <td align="center">
				  <input hidden="" name="descricaoAnt1" type="text" id="descricaoProduto" placeholder="Informe um título de um propriedade do produro" title="Primeiro título" value='<?php echo $dados['descricao1'];?>' size="35" maxlength=50>
				  <textarea class='btn btn-group border-0 text-center font-weight-bold' name="descricao1" cols="25" rows="5" maxlength="250" id="comentariosProduto" placeholder="Informe a primeira propriedade" title="Comentarios Produto"></textarea>
			  </td>
			  <td align="center">
				  <input hidden="" name="descricaoAnt2" type="text" id="descricaoProduto" placeholder="Informe um título de um propriedade do produro" title="Primeiro título" value='<?php echo $dados['descricao2'];?>' size="35" maxlength=50>
				  <textarea class='btn btn-group border-0 text-center font-weight-bold' name="descricao2" cols="25" rows="5" maxlength="250" id="comentariosProduto" placeholder="Informe a segunda propriedade" title="Segunda Descrição"></textarea>
			  </td>
			  <td align="center">
				  <input hidden="" name="descricaoAnt3" type="text" id="descricaoProduto" placeholder="Informe um título de um propriedade do produro" title="Primeiro título" value='<?php echo $dados['descricao3'];?>' size="35" maxlength=50>
				  <textarea class='btn btn-group border-0 text-center font-weight-bold' name="descricao3" cols="25" rows="5" maxlength="250" id="comentariosProduto" placeholder="Informe a terceira propriedade" title="Terceira Descrição"></textarea>
			  </td>
			  <td align="center">
				  <input hidden="" name="descricaoAnt4" type="text" id="descricaoProduto" placeholder="Informe um título de um propriedade do produro" title="Primeiro título" value='<?php echo $dados['descricao4'];?>' size="35" maxlength=50>
				  <textarea class='btn btn-group border-0 text-center font-weight-bold' name="descricao4" cols="25" rows="5" maxlength="250" id="comentariosProduto" placeholder="Informe a quarta propriedade" title="Quarta Descrição"></textarea>
			  </td>
			</tr>
			</table>
			 <table>
			  <tr>
			  <td><p>&nbsp;</p></td>
		      </tr>
			  <tr>
			  <td align="center">
				  <textarea class='btn btn-group border-0 text-center font-weight-bold' name="comentariosProduto" cols="80" rows="10" maxlength="1500" id="comentariosProduto" placeholder="Comentários sobre os resultados, benefícios etc..." title="Comentarios Produto"></textarea>
			  </td>
			</tr>
		  </table>
		<tr>
			<br>
			<input name="alterar" type="submit" class="btn btn-primary" id="alterar" title="alterar" value="Alterar" />
			<!--<p align="right"><a href="#" class="btn btn-primary">Cadastrar</a></p>-->
			</blockquote>
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
			  <a href="#" target="_self"><img src="../../../images/email.svg" width="25" height="25" class="rounded-circle" alt="Email"></a>&nbsp;</a><a href="../Contato/ContatoChayds.php">sac@chayds.com.br</a>
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
<?php 
}
else
{
	echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/index.php'>
		<script type= \"text/javascript\">
		alert(\"Você não tem autorização.\");
		</script>";
}										