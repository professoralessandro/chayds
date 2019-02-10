<?php session_start(); ?>
<?php include_once("../../Controller/DALPessoa.php"); ?>
<?php include_once("../../Controller/DALProduto.php"); ?>
<?php include_once("../../Controller/DALCompra.php"); ?>
<?php include_once("../../Controller/DALComentario.php"); ?>
<?php include_once("../../Model/Comentario.php"); ?>
<?php include_once("../../Model/Compra.php"); ?>
<?php include_once("../../Model/Pessoa.php"); ?>
<?php include_once("../../Model/Produto.php"); ?>
<?php include_once("../../Conexao/Conexao.php"); ?>
<?php
$conexao = new Conexao();
$dalProduto = new DALProduto($conexao);
$dalPessoa = new DALPessoa($conexao);
$dalCompra = new DALCompra($conexao);
$dalComentario = new DALComentario($conexao);

if(isset($_POST['comprarAgora']) && $_POST['comprarAgora'] != null)
{
	if($_SESSION['usuarioEmail'] == null || is_null($_SESSION['usuarioEmail']))
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
				<script type= \"text/javascript\">
				alert(\"Você deve estar logado para concluir esta operação. Faça o log-in no site ou cadastra-se.\");
				</script>";
	}
	else
	{
		if(is_null($_SESSION['usuarioEnd']) || $_SESSION['usuarioEnd'] == null || $_SESSION['usuarioEnd'] == '' || is_null($_SESSION['usuarioCep']) || $_SESSION['usuarioCep'] == null || $_SESSION['usuarioCep'] == '' )
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
					<script type= \"text/javascript\">
					alert(\"Você deve cadastrar os dados do seu endereço para continuar esta compra.\");
					</script>";
		}
		else
		{
			$idProduto = trim($_POST['idProduto']);
			$resultadoProd = $dalProduto->localizarProduto($idProduto);
			$dados2 = mysqli_fetch_array($resultadoProd);
			$quantidadeProduto = trim($_POST['quantidadeProduto']);
			if($dados2['quantidade'] < $quantidadeProduto)
			{
				echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
				<script type= \"text/javascript\">
				alert(\"erro ao comprar o produto ".$nomeProduto." .A quantidade solicitada é mario que a quantidade em estoque\");
				</script>";
			}
			else
			{
				$idCompra = '1';
				$idComprador = $_SESSION['usuarioId'];
				$nomeComprador = trim($_POST['nomeComprador']);
				$nomeProduto = trim($_POST['nomeProduto']);
				$emailComprador = trim($_POST['emailComprador']);
				$dataCompra = date('Y-m-d');
				$imagemProduto = trim($_POST['imagemProduto']);

				$valorFrete = $dalProduto->moeda('0.00'); // trim($_POST['valorFrete']);
				//TRATAMENTO PREÇO VENDA

				$precoVenda = trim($_POST['precoVenda']);
				$precoVenda = $dalProduto->moeda($precoVenda);
				$precoVenda = number_format($precoVenda,2,".","");

				$valorTotal = ($precoVenda * $quantidadeProduto) + $valorFrete;
				$valorTotal = number_format($valorTotal,2,".","");

				$cpfComprador = trim($_POST['cpfComprador']);
				$statusCompra = '25'; //25 STATUS COMPRA(FORA DO CARRINHO) PENDENTE CHAYDS
										//30 STATUS COMPRA CARRINHO PENDENTE CHAYDS

				//CAMPOS PARA CALCULO DO FRETE
				$alturaProduto = trim($_POST['alturaProduto']);
				$larguraProduto = trim($_POST['larguraProduto']);
				$comprimentoProduto = trim($_POST['comprimentoProduto']);
				$pesoProduto = trim($_POST['pesoProduto']);

				$alturaProduto = ($alturaProduto * $quantidadeProduto);
				$larguraProduto = ($larguraProduto * $quantidadeProduto);
				$comprimentoProduto = ($comprimentoProduto * $quantidadeProduto);
				$pesoProduto = ($pesoProduto * $quantidadeProduto);

				//CAMPOS VAZIOS
				$comentarioCompra = '';
				$idCarrinhoCompra = '';
				$codigoRastreio = '';
				$tipoFrete = '';

				$compraAgora = new Compra($idCompra, $idComprador, $idProduto, $nomeComprador, $emailComprador, $quantidadeProduto, $dataCompra, $valorFrete, $precoVenda, $valorTotal, $cpfComprador, $statusCompra, $tipoFrete, $nomeProduto, $codigoRastreio, $idCarrinhoCompra, $imagemProduto, $alturaProduto, $larguraProduto, $comprimentoProduto, $pesoProduto);

				$resultCompra = $dalCompra->comprarAgora($compraAgora);

				if(!$resultCompra)
				{
					//header('Location:Classes/View/Loja/ConfirmarCompra.php');
					echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=ConfirmarCompra.php'>";
				}
				else
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
					<script type= \"text/javascript\">
					alert(\"erro ao comprar o produto ".$nomeProduto.".\");
					</script>";
				}//ELSE COMPRA CONCLUIDA
			//print_r($compraAgora);
			}//ELSE VERIFICA A QUANTIDADE EM ESTOQUE
		}//ELSE VERIFICA SE EXISTE LOGIN E ENDEREÇO
	}//ELSE LOGADO NULL
}//IF BOTAO COMPRAR AGORA
else if(isset($_POST['adicionarCarrinho']) && $_POST['adicionarCarrinho'] != null)
{
	if($_SESSION['usuarioEmail'] == null || is_null($_SESSION['usuarioEmail']))
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
				<script type= \"text/javascript\">
				alert(\"Você deve estar logado para concluir esta operação. Faça o log-in no site ou cadastra-se.\");
				</script>";
	}
	else
	{
		if(is_null($_SESSION['usuarioEnd']) || $_SESSION['usuarioEnd'] == null || $_SESSION['usuarioEnd'] == '' || is_null($_SESSION['usuarioCep']) || $_SESSION['usuarioCep'] == null || $_SESSION['usuarioCep'] == '' )
		{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
					<script type= \"text/javascript\">
					alert(\"Você deve cadastrar os dados do seu endereço para continuar esta compra.\");
					</script>";
		}
		else
		{
			$idProduto = trim($_POST['idProduto']);
			$resultadoProd = $dalProduto->localizarProduto($idProduto);
			$dados2 = mysqli_fetch_array($resultadoProd);
			$quantidadeProduto = trim($_POST['quantidadeProduto']);
			
			//IF VERIFICA QUANTIDADE DO CARRINHO
			if($dados2['quantidade'] < $quantidadeProduto)
			{
				echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
				<script type= \"text/javascript\">
				alert(\"erro ao comprar o produto ".$nomeProduto." .A quantidade solicitada é mario que a quantidade em estoque\");
				</script>";
			}
			else
			{
				$idCompra = '1';
				$idComprador = $_SESSION['usuarioId'];
				$nomeComprador = trim($_POST['nomeComprador']);
				$nomeProduto = trim($_POST['nomeProduto']);
				$emailComprador = trim($_POST['emailComprador']);
				$dataCompra = date('Y-m-d');
				$imagemProduto = trim($_POST['imagemProduto']);

				$valorFrete = $dalProduto->moeda('0.00'); // trim($_POST['valorFrete']);
				//TRATAMENTO PREÇO VENDA

				$precoVenda = trim($_POST['precoVenda']);
				$precoVenda = $dalProduto->moeda($precoVenda);
				$precoVenda = number_format($precoVenda,2,".","");

				$valorTotal = ($precoVenda * $quantidadeProduto) + $valorFrete;
				$valorTotal = number_format($valorTotal,2,".","");

				$cpfComprador = trim($_POST['cpfComprador']);
				$statusCompra = '30'; //25 STATUS COMPRA(FORA DO CARRINHO) PENDENTE CHAYDS
										//30 STATUS COMPRA CARRINHO PENDENTE CHAYDS

				//CAMPOS PARA CALCULO DO FRETE
				$alturaProduto = trim($_POST['alturaProduto']);
				$larguraProduto = trim($_POST['larguraProduto']);
				$comprimentoProduto = trim($_POST['comprimentoProduto']);
				$pesoProduto = trim($_POST['pesoProduto']);

				$alturaProduto = ($alturaProduto * $quantidadeProduto);
				$larguraProduto = ($larguraProduto * $quantidadeProduto);
				$comprimentoProduto = ($comprimentoProduto * $quantidadeProduto);
				$pesoProduto = ($pesoProduto * $quantidadeProduto);

				//CAMPOS VAZIOS
				$comentarioCompra = '';
				$idCarrinhoCompra = '';
				$codigoRastreio = '';
				$tipoFrete = '';

				$compraAgora = new Compra($idCompra, $idComprador, $idProduto, $nomeComprador, $emailComprador, $quantidadeProduto, $dataCompra, $valorFrete, $precoVenda, $valorTotal, $cpfComprador, $statusCompra, $tipoFrete, $nomeProduto, $codigoRastreio, $idCarrinhoCompra, $imagemProduto, $alturaProduto, $larguraProduto, $comprimentoProduto, $pesoProduto);

				//print_r($compraAgora);

				$resultCompra = $dalCompra->comprarAgora($compraAgora);

				if(!$resultCompra)
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
					<script type= \"text/javascript\">
					alert(\"O produto $nomeProduto foi adicionado ao carrinho com sucesso.\");
					</script>";
				}
				else
				{
					echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
					<script type= \"text/javascript\">
					alert(\"erro ao comprar o produto ".$nomeProduto.".\");
					</script>";
				}//IF OPERAÇÃO CONCLUIDA
			}//ELSE VERIFICA QUANTIDADE EM ESTOQUE
			
		}//VERIFICA SE EXISTE ENDEREÇO
		//print_r($compraAgora);
	}//IF USUARIO LOGADO
}//IF EXISTE BOTAO ADICIONAR CARRINHO
//COMENTAR
else if(isset($_POST['comentar']) && $_POST['comentar'] != null)
{
	$idProduto = trim($_POST['idProduto']);
	$nome = $_SESSION['usuarioNome'];
	$idPessoa = trim($_POST['idPessoa']);
	$data = date('Y-m-d');
	$coment = trim($_POST['comentario']);
	$isCliente = trim($_POST['isCliente']);
	
	$comentario = new Comentario(1, $idPessoa, $idProduto,$isCliente, $nome, $data, $coment);
	
	//print_r($comentario);
	
	$result = $dalComentario->inserirComentario($comentario);
	
	if(!$result)
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
		<script type= \"text/javascript\">
		alert(\"O comentário foi postado com sucesso.\");
		</script>";
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
		<script type= \"text/javascript\">
		alert(\"erro ao inserir o comentário.\");
		</script>";
	}//IF OPERAÇÃO CONCLUIDA
}//ELSE IF COMENTARIO
else if(isset($_POST['deletarComentario']) && $_POST['deletarComentario'] != null)
{
	$idComentario = trim($_POST['idComentario']);
	//echo($idComentario);
	
	$result = $dalComentario->excluirComentario($idComentario);
	
	if(!$result)
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
		<script type= \"text/javascript\">
		alert(\"O comentário foi deletado com sucesso.\");
		</script>";
	}
	else
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=#'>
		<script type= \"text/javascript\">
		alert(\"erro ao deletar o comentário.\");
		</script>";
	}//IF OPERAÇÃO CONCLUIDA
}
$contadorMensagem = 0;
if(isset($_POST["idTransacao"]) && $_POST["idTransacao"] != null)
{
	$idTransacao = preg_replace('/[^[:alnum:]-]/','',$_POST["idTransacao"]);
	$contadorMensagem = 1;
}
//POST PHP
if(isset($_POST['enviarLogin']) && $_POST['enviarLogin'] != null)
{
	$email = trim($_POST['email']);
	$senha = trim($_POST['senha']);
	
	$pessoa = new Pessoa("","","","","",$email,"","","","","","","","","","","","",$senha);
	
	
	if(isset($_POST['email']) && $_POST['email'] != null  && isset($_POST['senha']) && $_POST['senha'] != null)
	{
		$dalPessoa->logar($pessoa);
	}
	else
	{
			echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://www.chayds.com.br/contato_chayds.php'>
			<script type= \"text/javascript\">
			alert(\"Erro ao logar. Por favor verifique os campos obrigatórios e tente novamente\");
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
    <title>Produto</title>
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
<?php
	$id = trim(filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_NUMBER_INT));
		
	$resultado = $dalProduto->localizarProduto($id);
	
	$dados = mysqli_fetch_array($resultado);
?>
<form name="formCompraCarrinho" action="#" target="_self" method="post" enctype="multipart/form-data">
<input hidden="" name="idProduto" type="text" value='<?php echo $dados['idProduto'];?>' title="nomeComprador" size="40" maxlength=50"><input hidden="" name="nomeComprador" type="text" value='<?php echo $_SESSION['usuarioNome'];?>' title="Nome" size="40" maxlength=50"><input hidden="" name="emailComprador" type="text" value='<?php echo $_SESSION['usuarioEmail'];?>' title="Nome" size="40" maxlength=50">
<input hidden="" name="precoVenda" type="text" value='<?php echo $dalProduto->virgula($dados['precoVenda']);?>' title="Nome" size="40" maxlength=50">
<input hidden="" name="cpfComprador" type="text" value='<?php echo $_SESSION['usuarioCPF'];?>' title="Nome" size="40" maxlength=50"><input name="idComprador" hidden="" type="text" value='<?php echo $_SESSION['usuarioId'];?>' size="40" maxlength=50">
<input name="nomeProduto" hidden="" type="text" value='<?php echo $dados['nome'];?>' size="40" maxlength=50"><input hidden="" name="imagemProduto" type="text" value='<?php echo $dados['imagem'];?>' title="Nome" size="40" maxlength=50">
<input hidden="" name="alturaProduto" type="text" value='<?php echo $dados['altura'];?>' title="altura" size="40" maxlength=50">
<input hidden="" name="larguraProduto" type="text" value='<?php echo $dados['largura'];?>' title="largura" size="40" maxlength=50">
<input hidden="" name="comprimentoProduto" type="text" value='<?php echo $dados['comprimento'];?>' title="comprimento" size="40" maxlength=50">
<input hidden="" name="pesoProduto" type="text" value='<?php echo $dados['peso'];?>' title="Peso" size="40" maxlength=50">
    <div class="container mt-2">
      <div class="row">
        <div class="col-12">
          <div class="jumbotron">
            <h1 class="text-center"><?php echo $dados['nome'];?></h1>
			<!-- IMAGEM
			<img src="../../../images/2.png" height="500" width="1920" alt="<?php echo $dados['nome'];?>" title="<?php echo $dados['nome'];?>" class="img-fluid">-->
			  
			<!-- IMAGEM BANCO -->
<?php
//IF VERIFICA QUANTIDADE DE FOTOS 3
if(isset($dados['imagem']) && $dados['imagem'] != null && isset($dados['imagem2']) && $dados['imagem2'] != null && isset($dados['imagem3']) && $dados['imagem3'] != null)
{ ?>
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
                <img class="d-block w-100 img-fluid" src='<?php echo "../../../imagens/".$dados['imagem'];?>' alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><strong><?php echo $dados['nome'];?></strong></h5>
                  <p><strong><?php echo $dados['publicoAlvo'];?></strong></p>
                  <p><strong>para homens 120 capsulas </strong></p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100 img-fluid" src='<?php echo "../../../imagens/".$dados['imagem2'];?>' alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><strong><?php echo $dados['nome'];?></strong></h5>
                  <p><strong><?php echo $dados['publicoAlvo'];?></strong></p>
                  <p><strong>para homens 120 capsulas </strong></p>
                </div>
              </div>
				<div class="carousel-item">
                <img class="d-block w-100 img-fluid" src='<?php echo "../../../imagens/".$dados['imagem3'];?>' alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><strong><?php echo $dados['nome'];?></strong></h5>
                  <p><strong><?php echo $dados['publicoAlvo'];?></strong></p>
                  <p><strong>para homens 120 capsulas </strong></p>
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
      <hr>
    </div>
<?php 
}//IF VERIFICA QUANTIDADE DE FOTOS 3
else
{ //IF DUAS IMAGENS ?>
	<img src="../../../images/<?php echo $dados['imagem'];?>" height="500" width="1920" alt="<?php echo $dados['nome'];?>" title="<?php echo $dados['nome'];?>" class="img-fluid"> <!-- FIM -->
<?php
}
?>
<!-- FIM IMAGEM -->
			  
			<p class="text-center"><?php echo $dados['descricaoProduto'];?></p>
			<hr>
			<p class="text-center"><?php echo $dados['comentarioProduto'];?></p>
			<hr>
			<div class="row justify-content-center">
              <div class="col-auto">
			<p align="center"><h1 align="center">R$ <?php echo $dalProduto->virgula($dados['precoVenda']); ?></h1></p>
			<td align="center">
				<input name="adicionarCarrinho" type="submit" class="btn btn-block btn-lg btn-success" id="Adicionar ao Carrinho" value="Adicionar ao Carrinho" />
			</td><br>
			
			<td align="center">
				<input name="comprarAgora" type="submit" class="btn btn-outline-primary btn-lg btn-success" id="comprarAgora" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comprar Agora&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" />
			</td>
			<td align="center">
				<p align="center"><h4 align="center">Quantidade:</h4></p>
			</td>
		<table align="center">
			<tr>
			<td align="center">
			<input class='btn btn-group border-0 text-center font-weight-bold' align="center" name="quantidadeProduto" type="number" required="required" max="50" min="1"  title="Quantidade" value="1" size="1" maxlength=10">
			</td>
			</tr>
		</table>
			</div>
			</form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- BOTOES ADICIONAIS
	<div class="container">
      <div class="row">
        <div class="text-center col-md-6 col-12">
          <h3>Lorem ipsum</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, magnam?</p>
          <a class="btn btn-danger btn-lg" href="#" role="button">Tutorials</a>
        </div>
        <div class="text-center col-md-6 col-12">
          <h3>Lorem ipsum</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, magnam?</p>
          <a class="btn btn-info btn-lg" href="#" role="button">Documentation</a>
        </div>
      </div>
    </div>
-->
<?php
	if(isset($dados['titulo1']) && $dados['descricao1'] != null && $dados['descricao1'] != '' || isset($dados['titulo2']) && $dados['titulo2'] != null && $dados['titulo2'] != '' || isset($dados['titulo3']) && $dados['titulo3'] != null && $dados['titulo3'] != '' || isset($dados['titulo4']) && $dados['titulo4'] != null && $dados['titulo4'] != '' || isset($dados['descricao1']) && $dados['descricao1'] != null && $dados['descricao1'] != '' || isset($dados['descricao2']) && $dados['descricao2'] != null && $dados['descricao2'] != ''|| isset($dados['descricao3']) && $dados['descricao3'] != null && $dados['descricao3'] != ''|| isset($dados['descricao4']) && $dados['descricao4'] != null && $dados['descricao4'] != '')
	{ ?>
		<hr>
		<div class="container">
		  <div class="row">
			<div class="col-lg-3 col-md-6 col-12">
			  <h2><?php echo $dados['titulo1'];?></h2>
			  <p><?php echo $dados['descricao1'];?></p>
			</div>
			<div class="col-lg-3 col-md-6 col-12">
			  <h2><?php echo $dados['titulo2'];?></h2>
			  <p><?php echo $dados['descricao2'];?></p>
			</div>
			<div class="col-lg-3 col-md-6 col-12">
			  <h2><?php echo $dados['titulo3'];?></h2>
			  <p><?php echo $dados['descricao3'];?></p>
			</div>
			<div class="col-lg-3 col-md-6 col-12">
			  <h2><?php echo $dados['titulo4'];?></h2>
			  <p><?php echo $dados['descricao4'];?></p>
			</div>
		  </div>
		</div>
<?php }
	if(isset($dados['video']) && $dados['video'] != null && $dados['video'] != '')
	{ ?>
	<hr>
    <section>
      <h2 class="text-center">Video Tutorial</h2>
      <div class="container">
        <div class="row">
          <div class="col-12">
			<div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="<?php echo $dados['video'];?>"></iframe>
            </div>
			  <!--
            <div class="embed-responsive embed-responsive-16by9">
              <?php echo $dados['video'];?>
            </div> -->
          </div>
        </div>
      </div>
    </section>
<?php } 
if(isset($_SESSION['usuarioId']) && $_SESSION['usuarioId'] != null)
{
?>
<hr>
<div class="jumbotron">
	<h2 class="text-center">COMENTÁR</h2>
<hr>
<form name="formComentarUsuario" action="#" target="_self" method="post">
<table align="center">
<tr>
<input hidden="" class='btn btn-group border-0 text-center font-weight-bold' name="idPessoa" type="text" id="idPessoa" placeholder="Informe o seu nome completo (Obrigatório)" title="idPessoa" value='<?php echo $_SESSION['usuarioId'];?>' size="30" maxlength=50">
<input hidden="" class='btn btn-group border-0 text-center font-weight-bold' name="isCliente" type="text" id="idPessoa" placeholder="Informe o seu nome completo (Obrigatório)" title="idPessoa" value='<?php echo $_SESSION['usuarioId'];?>' size="30" maxlength=50">
<input hidden="" class='btn btn-group border-0 text-center font-weight-bold' name="idProduto" type="text" id="idProduto" placeholder="Informe o seu nome completo (Obrigatório)" title="idProduto" value='<?php echo $id;?>' size="30" maxlength=50">
</tr>
<tr>
<td>&nbsp;<td>
</tr>
<tr>
	<td align="right">
        <img title="nome de usuário" class="rounded-circle" src="../../../images/25355555.svg" width="35" height="37" />
	</td>
	<td align="center">	
		<textarea class='btn btn-group border-0 text-center font-weight-bold' name="comentario" cols="60" rows="7" maxlength="350" id="comentario" placeholder="Insira um comentário (Máximo 350 caracteres)" title="Comente"'></textarea>
	</td>
<tr>
	<td align="center">&nbsp;
	
	</td>
	<td align="center"><p>&nbsp;</p>
		<input name="comentar" type="submit" class="btn btn-primary btn-lg" id="comprarAgora" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comentar Agora&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" />
	</td>
</tr>
</table>
</div>
<hr>
	<h2 class="text-center">COMENTÁRIOS</h2>
<hr>
<?php 
}
$resultado = $dalComentario->localizarComentarioProduto($id);

while($dados = mysqli_fetch_array($resultado))
{
?>
	<h4 class='font-weight-bold' align="center"><?php echo $dados['nome'];?></h4><br>
	<hr>
	<h5 align="center"><?php echo $dados['comentario'];?></h5>
	<hr>
	<input hidden="" name="idComentario" type="text" id="idProduto" placeholder="Informe o seu nome completo (Obrigatório)" title="idProduto" value='<?php echo $dados['idComentario'];?>' size="30" maxlength=50">
	<?php
	if(isset($_SESSION['usuarioAcessoNiveis']) && $_SESSION['usuarioAcessoNiveis'] == 'Gerente')
	{ ?>
	<div align="center">
		<input class="btn btn-danger" name='deletarComentario' type='submit' value='Deletar Comentario' >
	</div>
	<hr>
<?php }
}
?>
</form>
<!-- IMAGENS DE PRODUTOS RELACIONADOS
    <div class="container mt-4">
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <embed class="card-img-top" src="../../../images/600X300.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Feature</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, at.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <img class="card-img-top" src="../../../images/600X300.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Feature</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, at.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- IMAGENS DE PRODUTOS RELACIONADOS -->
<!--  CLASSE NAO USADA, PACOTES E RODAPÉ
    <div class="container">
      <div class="row">
        <div class="container py-sm-4">
          <div class="row">
            <div class="col-md-10 my-4 mx-auto">
              <h2 class="text-center">Preço pacotes oficiais</h2>
              <hr>
              <div class="row no-gutters my-3">
                <div class="col-md-4 pr-2">
                  <div class="list-group text-center my-3">
                    <div class="list-group-item text-white bg-dark">
                      <h4 class="text-center my-1">Basic</h4>
                    </div>
                    <div class="list-group-item text-uppercase font-weight-bold">
                      Free
                    </div>
                    <a href="#" class="list-group-item">
                    100 GB HDD Storage
                    </a>
                    <a href="#" class="list-group-item">
                    Web Server
                    </a>
                    <a href="#" class="list-group-item">
                    DNS Hosting
                    </a>
                    <a href="#" class="list-group-item">
                    Mail Server
                    </a>
                    <div class="list-group-item">
                      <button class="btn btn-success btn-lg btn-block text-truncate">Sign-up</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="list-group text-center">
                    <div class="list-group-item text-white bg-dark">
                      <h4 class="text-center my-1">Standard<br></h4>
                    </div>
                    <div class="list-group-item text-uppercase font-weight-bold">
                      $99/mo.
                    </div>
                    <a href="#" class="list-group-item">
                    1 TB HDD Storage
                    </a>
                    <a href="#" class="list-group-item">
                  Database Option
                    </a>
                    <a href="#" class="list-group-item">
                    Web Server
                    </a>
                    <a href="#" class="list-group-item">
                    DNS Hosting
                    </a>
                    <a href="#" class="list-group-item">
                    Mail Server
                    </a>
                    <a href="#" class="list-group-item">
                    24/7 Monitoring
                    </a>
                    <div class="list-group-item">
                      <button class="btn btn-success btn-lg btn-block text-truncate">Buy Now</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 pl-2">
                  <div class="list-group text-center my-3">
                    <div class="list-group-item text-white bg-dark">
                      <h4 class="text-center my-1">Managed</h4>
                    </div>
                    <div class="list-group-item text-uppercase font-weight-bold">
                      Contact Us
                    </div>
                    <a href="#" class="list-group-item">
                    Upto 10 TB HDD Storage
                    </a>
                    <a href="#" class="list-group-item">
                    Consultation
                    </a>
                    <a href="#" class="list-group-item">
                    Custom Servers
                    </a>
                    <a href="#" class="list-group-item">
                    24/7 Support
                    </a>
                    <div class="list-group-item">
                      <button class="btn btn-success btn-lg btn-block text-truncate">Contact Us</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
-->
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
<abbr><a href="#" target="_self"><img src="../../../images/icon_whatsapp.png" alt="Whatsapp""" width="25" height="25" class="rounded-circle img-fluid"../../../images/icon_phone.png></a></abbr> +55 13 9 9644 2358
          </address>
          <address>
          <strong>Serviço de Atendimento ao Cliente</strong><br>
          <a href="#" target="_self"><img src="../../../images/email.svg" width="25" height="25" class="rounded-circle" alt="Email"></a>&nbsp;</a><a href="Classes/View/Contato/ContatoChayds.php">sac@chayds.com.br</a>
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