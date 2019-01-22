<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/Produto.php"); ?>
<?php
class DALProduto
{
	//ATRIBUTOS
	private $conexao;
	
	//CONSTRUTOR
	public function __construct($conexao)
	{
        $this->conexao = $conexao;
    }
	
    //METODOS
	
	//CADASTRAR PRODUTOS
	public function cadastrarProduto($produto)
	{
		$sqlComand = "insert into tbProduto(nome, altura, largura, comprimento, peso, dataCadastro, descricaoProduto, quantidade, quantidadeMinima, publicoAlvo, codigoBarras, fornecedor, precoCusto, precoVenda,precoVendaDesconto, comentarioProduto, video, imagem, imagem2, imagem3, titulo1, titulo2, titulo3, titulo4, descricao1, descricao2, descricao3, descricao4) values('";
		
		$sqlComand = $sqlComand . $produto->getNome() . "','";
		$sqlComand = $sqlComand . $produto->getAltura() . "','";
		$sqlComand = $sqlComand . $produto->getLargura() . "','";
		$sqlComand = $sqlComand . $produto->getComprimento() . "','";
		$sqlComand = $sqlComand . $produto->getPeso() . "','";
		$sqlComand = $sqlComand . $produto->getData() . "','";
		$sqlComand = $sqlComand . $produto->getDescricao() . "','";
		$sqlComand = $sqlComand . $produto->getQuantidade() . "','";
		$sqlComand = $sqlComand . $produto->getQuantidadeMinima() . "','";
		$sqlComand = $sqlComand . $produto->getPublicoAlvo() . "','";
		$sqlComand = $sqlComand . $produto->getCodigoBarras() . "','";
		$sqlComand = $sqlComand . $produto->getFornecedor() . "','";
		$sqlComand = $sqlComand . $produto->getPrecoCusto() . "','";
		$sqlComand = $sqlComand . $produto->getPreco() . "','";
		$sqlComand = $sqlComand . $produto->getPrecoDesconto() . "','";
		$sqlComand = $sqlComand . $produto->getComentario() . "','";
		$sqlComand = $sqlComand . $produto->getVideo() . "','";
		$sqlComand = $sqlComand . $produto->getImagem() . "','";
		$sqlComand = $sqlComand . $produto->getImagem2() . "','";
		$sqlComand = $sqlComand . $produto->getImagem3() . "','";
		$sqlComand = $sqlComand . $produto->getTitulo1() . "','";
		$sqlComand = $sqlComand . $produto->getTitulo2() . "','";
		$sqlComand = $sqlComand . $produto->getTitulo3() . "','";
		$sqlComand = $sqlComand . $produto->getTitulo4() . "','";
		$sqlComand = $sqlComand . $produto->getDescricao1() . "','";
		$sqlComand = $sqlComand . $produto->getDescricao2() . "','";
		$sqlComand = $sqlComand . $produto->getDescricao3() . "','";
		$sqlComand = $sqlComand . $produto->getDescricao4() . "')";
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//CADASTRAR PRODUTOS
	
	//ALTERAR PRODUTOS
	public function alterarProduto($produto)
	{
		$sqlComand = "UPDATE tbProduto
		SET nome = '". $produto->getNome() ."',
		altura = '". $produto->getAltura() ."',
		largura = '". $produto->getLargura() ."',
		comprimento = '". $produto->getComprimento() ."',
		peso = '". $produto->getPeso() ."',
		descricaoProduto = '". $produto->getDescricao() ."',
		quantidade = '". $produto->getQuantidade() ."',
		quantidadeMinima = '". $produto->getQuantidadeMinima() ."',
		publicoAlvo = '". $produto->getPublicoAlvo() ."',
		codigoBarras = '". $produto->getCodigoBarras() ."',
		fornecedor = '". $produto->getFornecedor() ."',
		precoCusto = '". $produto->getPrecoCusto() ."',
		precoVendaDesconto = '". $produto->getPrecoDesconto() ."',
		precoVenda = '". $produto->getPreco() ."',
		comentarioProduto = '". $produto->getComentario() ."',
		imagem = '". $produto->getImagem() . "',
		imagem2 = '". $produto->getImagem2() . "',
		imagem3 = '". $produto->getImagem3() . "',
		video = '". $produto->getVideo() . "',
		titulo1 = '". $produto->getTitulo1() . "',
		titulo2 = '". $produto->getTitulo2() . "',
		titulo3 = '". $produto->getTitulo3() . "',
		titulo4 = '". $produto->getTitulo1() . "',
		descricao1 = '". $produto->getDescricao1() . "',
		descricao2 = '". $produto->getDescricao2() . "',
		descricao3 = '". $produto->getDescricao3() . "',
		descricao4 = '". $produto->getDescricao4() ."'
		
		WHERE idProduto = '". $produto->getIdProduto() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//ALTERAR PRODUTOS
	
	//ALTERAR PRODUTOS
	public function alterarProdutoCompleto($produto)
	{
		$sqlComand = "UPDATE tbProduto
		SET nome = '". $produto->getNome() ."',
		altura = '". $produto->getAltura() ."',
		largura = '". $produto->getLargura() ."',
		comprimento = '". $produto->getComprimento() ."',
		peso = '". $produto->getPeso() ."',
		dataCadastro = '". $produto->getData() ."',
		descricaoProduto = '". $produto->getDescricao() ."',
		quantidade = '". $produto->getQuantidade() ."',
		quantidadeMinima = '". $produto->getQuantidadeMinima() ."',
		publicoAlvo = '". $produto->getPublicoAlvo() ."',
		codigoBarras = '". $produto->getCodigoBarras() ."',
		fornecedor = '". $produto->getFornecedor() ."',
		precoCusto = '". $produto->getPrecoCusto() ."',
		precoVendaDesconto = '". $produto->getPrecoDesconto() ."',
		precoVenda = '". $produto->getPreco() ."',
		comentarioProduto = '". $produto->getComentario() ."',
		imagem = '". $produto->getImagem() . "'
		
		WHERE idProduto = '". $produto->getIdProduto() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//ALTERAR PRODUTOS
	
	//ALTERAR PRODUTO QUANTIDADE SUBTRAIR
	public function alterarProdutoQuantidadeSubtrair($produto, $quantProd)
	{		//$produto = new Produto();
		$quantidadeNova = $quantProd - $produto->getQuantidade();
		
		/* ADICIONAR METODO PARA ENVIAR EMAIL
		if($quantidadeNova <= getQuantidadeMinima() )
		{
			FUNÇÃO PARA ENVIAR EMAIL
		}
		
		ADICIONAR METODO PARA ENVIAR EMAIL
		*/
		
		$sqlComand = "UPDATE tbProduto
		SET quantidade = '". $quantidadeNova ."'
		
		WHERE idProduto = '". $produto->getIdProduto() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
		
	}//ALTERAR PRODUTO QUANTIDADE SUBTRAIR
	
	//ALTERAR PRODUTO QUANTIDADE ADICIONAR
	public function alterarProdutoQuantidadeAdicionar($produto, $quantProd)
	{
		$quantidadeNova = $quantProd + $produto->getQuantidade();
		
		/* ADICIONAR METODO PARA ENVIAR EMAIL
		if($quantidadeNova <= getQuantidadeMinima() )
		{
			FUNÇÃO PARA ENVIAR EMAIL
		}
		
		ADICIONAR METODO PARA ENVIAR EMAIL
		*/
		
		$sqlComand = "UPDATE tbProduto
		SET quantidade = '". $quantidadeNova ."'
		
		WHERE idProduto = '". $produto->getIdProduto() ."'
		";
		
		$banco = $this->conexao->GetBanco();
		$result = $banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//ALTERAR PRODUTO QUANTIDADE ADICIONAR
        
	//LOCALIZAR PRODUTO
	public function localizarProduto($id)
	{
		$sqlComand = "select * from tbProduto where idProduto = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR PRODUTO
	
	//LOCALIZAR PRODUTO NOME
	public function localizarProdutoNome($nomeProduto)
	{
		$sqlComand = "select * from tbProduto where nome = '".$nomeProduto."'";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR PRODUTO NAOME
	
	//LOCALIZAR PRODUTO NOME
	public function localizarProdutoPalavra($palavra)
	{
		//select * from tbProduto where nome like '%Maca%' or descricaoProduto like '%Maka%' 
		$sqlComand = "select * from tbProduto where nome like '%".$palavra."%' or descricaoProduto like '%".$palavra."%' or comentarioProduto like '%".$palavra."%' or descricao1 like '%".$palavra."%' or descricao2 like '%".$palavra."%' or descricao3 like '%".$palavra."%' or descricao4 like '%".$palavra."%'";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR PRODUTO NAOME
	
	//LOCALIZAR PRODUTO AVANÇADO
	public function localizarProdutoAvancado($data1, $data2, $nome, $preco, $vendas)
	{
		if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($preco) && $preco != null && isset($vendas) && $vendas != null)
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%' and precoVenda = '". $preco ."' and vendas = '". $vendas ."' ";
		}
		else if(isset($nome) && $nome != null)
		{
			$sqlComand = "select * from tbProduto where nome like '%".$nome."%'";
		}
		else if(isset($preco) && $preco != null)
		{
			$sqlComand = "select * from tbProduto where precoVenda = '". $preco ."'";
		}
		else if(isset($vendas) && $vendas != null)
		{
			$sqlComand = "select * from tbProduto where vendas = '". $vendas ."'";
		}
		else if(isset($data1) && $data1 != null)
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."')";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2)
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."')";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'";
		}
		else if(isset($data1) && $data1 != null && isset($preco) && $preco != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and precoVenda = '".$preco."'";
		}
		else if(isset($data1) && $data1 != null && isset($vendas) && $vendas != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and vendas = '".$vendas."'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($preco) && $preco != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and precoVenda = '".$preco."'";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($vendas) && $vendas != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and vendas = '".$vendas."'";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null && isset($preco) && $preco != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome = '".$nome."'  and nome like '%".$nome."%' ";
		}
		else if(isset($data1) && $data1 != null && isset($nome) && $nome != null && isset($vendas) && $vendas != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and nome like '%".$nome."%'  and vendas = '".$vendas."' ";
		}
		else if(isset($data1) && $data1 != null && isset($preco) && $preco != null && isset($vendas) && $vendas != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". date('Y-m-d') ."') and precoVenda = '".$preco."'  and vendas = '".$vendas."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($preco) && $preco != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'  and precoVenda = '".$preco."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($nome) && $nome != null && isset($vendas) && $vendas != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and nome like '%".$nome."%'  and vendas = '".$vendas."' ";
		}
		else if(isset($data1) && $data1 != null && isset($data2) && $data2 != null && isset($preco) && $preco != null && isset($vendas) && $vendas != null )
		{
			$sqlComand = "select * from tbProduto where dataCadastro BETWEEN('". $data1 ."') and ('". $data2 ."') and precoVenda = '".$preco."'  and vendas = '".$vendas."' ";
		}
		else if(isset($preco) && $preco != null && isset($vendas) && $vendas != null )
		{
			$sqlComand = "select * from tbProduto where precoVenda = '".$preco."'  and vendas = '".$vendas."' ";
		}
		else if(isset($nome) && $nome != null && isset($vendas) && $vendas != null )
		{
			$sqlComand = "select * from tbProduto where nome like '%".$nome."%'  and vendas = '".$vendas."' ";
		}
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LOCALIZAR PRODUTO AVANÇADO
	
	//EXCLUIR PRODUTO
	public function excluirProduto($id)
	{
		$sqlComand = "delete from tbProduto where idProduto = ". $id ;
		
		$banco = $this->conexao->GetBanco();
		$banco->query($sqlComand);
		$this->conexao->Desconectar();
	}//EXCLUIR PRODUTO
	
	//LISTAR  PRODUTO
	public function listarProduto()
	{
		$sqlComand = " select * from tbProduto ";
		
		$banco = $this->conexao->GetBanco();
		$retorno = $banco->query($sqlComand);
		return $retorno;
		$this->conexao->Desconectar();
	}//LISTAR  PRODUTO
	//FUNÇÃO VALOR MOEDA PONTOS
	function moeda($get_valor)
	{
		$source = array('.', ',');
		$replace = array('', '.');
		$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
		return $valor; //retorna o valor formatado para gravar no banco
	}
	function virgula($get_valor)
	{
		$source = array(',', '.');
		$replace = array('', ',');
		$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a o ponto pela virgula
		return $valor; //retorna o valor formatado para gravar no banco
	}
	//FIM DA FUNÇÃO
}//CLASS
?>