<!--<img src="../../bd/conexao/Conecta.php" />-->
<!--<?php include_once('../../bd/conexao/ConectaBanco.php');?>-->
<?php
class frete_correios
{
	// ALTURA LARGURA E COMPRIMENTO É EM CENTIMETROS
	//PROPRIEDADES FUNCAO BUSCA
	var $valAlt;
	var $valLarg;
	var $valCumpr;
	var $valPeso;

	//VARIAVEIS  FUNCAO CALCULAR
	var $temEntr;
	var $valSSeuro;
	var $valFrete;
	
	/*
	private $conexao;
	
	public function __construct($conexao)
	{		
		$this->conexao = $conexao;
		$this->conexao = new ConectaBanco($conexao);
	}*/
	
	//FUNCAO BUSCA PARAMETROS
	/*
	function buscAtribFrete()
	{
		$con = new ConectaBanco();
		$sql = "SELECT * FROM `tb_produto` WHERE nome_prod = 'Chayds complete' ";
		$banco = $con->GetBanco();
		$result = $banco->query($sql);
		$dados = mysqli_fetch_assoc($result);
		
		$this->valAlt = $dados['vl_alt_prod'];
		$this->valLarg = $dados['vl_larg_prod'];
		$this->valCumpr = $dados['vl_cmpri_prod'];
		$this->valPeso = $dados['vl_peso_prod'];
		
		if (mysqli_affected_rows($conn) != 0)
		{
			return "Consulta feita com sucesso";
		}
		else
		{
			return "Erro na consulta da base de dados";
		}
		$this->conexao->Desconectar();
	}*/
	
	//FUNCAO CALCULAR FRETE
	function CalcularFrete($cep_Origem, $cep_Destino, $peso, $valor, $tipo_Frete, $altura, $largura, $comprimento)
	{
		
		$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
		$url .= "nCdEmpresa="; //Numero de cadastro da empresa nos correios
		$url .= "&nDsSenha="; //Senha da empresa
		$url .= "&sCepOrigem=" . $cep_Origem; //Cep de origem do produto (SOMENTE VALORES NUMERICOS SEM TRAÇOS)
		$url .= "&sCepDestino=" . $cep_Destino; //Cep de destino (SOMENTE VALORES NUMERICOS SEM TRAÇOS)
		$url .= "&nVlPeso=" . $peso; //Peso do produto (VALOR EM FLOAT, VALOR EM KG)
		$url .= "&nVlLargura=" . $largura; //Largura do produto (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&nVlAltura=" . $altura; //Altura do produto (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&nCdFormato=1"; //Formato da Emcomenda, 1 = Caixa
		$url .= "&nVlComprimento=" . $comprimento; //Comprimento da encomenda
		$url .= "&sCdMaoPropria=n" . $peso; //Serviço de entrega nas maos do destinatario, N = NAO
		$url .= "&nVlValorDeclarado=" . $valor;//Valor declarado da encomenda (VALOR EM FLOAT)
		$url .= "&sCdAvisoRecebimento=n";//Serviço de aviso de recebimento. N = NAO
		$url .= "&nCdServico=" . $tipo_Frete; //Tipo do Frete (SEDEX = 40010, PAC 41106)
		$url .= "&nVlDiametro=0";//Caixa nao possui diametro. VL = 0 (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&StrRetorno=xml"; //Retorno dos correios em XML
		
		$xml = simplexml_load_file($url);
		
		$this->valFrete = $xml -> cServico -> Valor;
		$this->temEntr = $xml -> cServico -> PrazoEntrega;
		$this->valSSeuro = $xml -> cServico -> ValorSemAdicionais;
	}
	//Propriedades
	function moeda($get_valor) {
	$source = array('.', ',');
	$replace = array('', '.');
	$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
	return $valor; //retorna o valor formatado para gravar no banco
	}
}
?>