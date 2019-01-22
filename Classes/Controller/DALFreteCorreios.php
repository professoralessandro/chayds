<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/FreteCorreios.php"); ?>
<?php
class DALFreteCorreios
{
	//ATRIBUTOS
	private $conexao;
	//ATRIBUTOS
	
	//CONSTRUTOR
	public function __construct($conexao)
	{
        $this->conexao = $conexao;
    }
	//CONSTRUTOR
	
    //METODOS
	
	//CALCULAR FRETE
	function calcularFrete($freteCorreios)
	{
		$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
		$url .= "nCdEmpresa=". $freteCorreios->getNumeroCodigoEmpresa(); //Numero de cadastro da empresa nos correios
		$url .= "&nDsSenha=". $freteCorreios->getSenhaCodigoEmpresa(); //Senha da empresa
		$url .= "&sCepOrigem=". $freteCorreios->getCepOrigem(); //Cep de origem do produto (SOMENTE VALORES NUMERICOS SEM TRAÇOS)
		$url .= "&sCepDestino=". $freteCorreios->getCepDestino(); //Cep de destino (SOMENTE VALORES NUMERICOS SEM TRAÇOS)
		$url .= "&nVlPeso=". $freteCorreios->getPeso(); //Peso do produto (VALOR EM FLOAT, VALOR EM KG)
		$url .= "&nVlLargura=". $freteCorreios->getLargura(); //Largura do produto (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&nVlAltura=" . $freteCorreios->getAltura(); //Altura do produto (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&nCdFormato=1"; //Formato da Emcomenda, 1 = Caixa
		$url .= "&nVlComprimento=". $freteCorreios->getComprimento(); //Comprimento da encomenda
		$url .= "&sCdMaoPropria=" . $freteCorreios->getPeso(); //Serviço de entrega nas maos do destinatario, N = NAO
		$url .= "&nVlValorDeclarado=". $freteCorreios->getValorDeclarado();//Valor declarado da encomenda (VALOR EM FLOAT)
		$url .= "&sCdAvisoRecebimento=". $freteCorreios->getAvisoRecebimento();//Serviço de aviso de recebimento. N = NAO
		$url .= "&nCdServico=". $freteCorreios->getTipoFrete(); //Tipo do Frete (SEDEX = 40010, PAC 41106)
		$url .= "&nVlDiametro=". $freteCorreios->getDiametro();//Caixa nao possui diametro. VL = 0 (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&StrRetorno=xml"; //Retorno dos correios em XML

		$xml = simplexml_load_file($url);

		return $xml->cServico;
	}//CALCULAR FRETE
	
	//CALCULAR FRETE PAC
	function calcularFretePac($freteCorreios)
	{
		$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
		$url .= "nCdEmpresa=". $freteCorreios->getNumeroCodigoEmpresa(); //Numero de cadastro da empresa nos correios
		$url .= "&nDsSenha=". $freteCorreios->getSenhaCodigoEmpresa(); //Senha da empresa
		$url .= "&sCepOrigem=". $freteCorreios->getCepOrigem(); //Cep de origem do produto (SOMENTE VALORES NUMERICOS SEM TRAÇOS)
		$url .= "&sCepDestino=". $freteCorreios->getCepDestino(); //Cep de destino (SOMENTE VALORES NUMERICOS SEM TRAÇOS)
		$url .= "&nVlPeso=". $freteCorreios->getPeso(); //Peso do produto (VALOR EM FLOAT, VALOR EM KG)
		$url .= "&nVlLargura=". $freteCorreios->getLargura(); //Largura do produto (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&nVlAltura=" . $freteCorreios->getAltura(); //Altura do produto (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&nCdFormato=1"; //Formato da Emcomenda, 1 = Caixa
		$url .= "&nVlComprimento=". $freteCorreios->getComprimento(); //Comprimento da encomenda
		$url .= "&sCdMaoPropria=" . $freteCorreios->getPeso(); //Serviço de entrega nas maos do destinatario, N = NAO
		$url .= "&nVlValorDeclarado=". $freteCorreios->getValorDeclarado();//Valor declarado da encomenda (VALOR EM FLOAT)
		$url .= "&sCdAvisoRecebimento=". $freteCorreios->getAvisoRecebimento();//Serviço de aviso de recebimento. N = NAO
		$url .= "&nCdServico=41106"; //Tipo do Frete (SEDEX = 40010, PAC 41106)
		$url .= "&nVlDiametro=0";//Caixa nao possui diametro. VL = 0 (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&StrRetorno=xml"; //Retorno dos correios em XML

		$xml = simplexml_load_file($url);

		return $xml->cServico;
	}//CALCULAR FRETE PAC
	
	//CALCULAR FRETE SEDEX
	function calcularFreteSedex($freteCorreios)
	{
		//$largura = $freteCorreios->getLargura();
		
		
		$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
		$url .= "nCdEmpresa="; //Numero de cadastro da empresa nos correios
		$url .= "&nDsSenha="; //Senha da empresa
		$url .= "&sCepOrigem=" . $freteCorreios->getCepOrigem(); //Cep de origem do produto (SOMENTE VALORES NUMERICOS SEM TRAÇOS)
		$url .= "&sCepDestino=". $freteCorreios->getCepDestino(); //Cep de destino (SOMENTE VALORES NUMERICOS SEM TRAÇOS)
		$url .= "&nVlPeso=". $freteCorreios->getPeso(); //Peso do produto (VALOR EM FLOAT, VALOR EM KG)
		$url .= "&nVlLargura=". $freteCorreios->getLargura(); //Largura do produto (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&nVlAltura=" . $freteCorreios->getAltura(); //Altura do produto (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&nCdFormato=1"; //Formato da Emcomenda, 1 = Caixa
		$url .= "&nVlComprimento=" . $freteCorreios->getComprimento(); //Comprimento da encomenda
		$url .= "&sCdMaoPropria=" .$freteCorreios->getEntregaMaos(); //Serviço de entrega nas maos do destinatario, N = NAO
		$url .= "&nVlValorDeclarado=" . $freteCorreios->getValorDeclarado();//Valor declarado da encomenda (VALOR EM FLOAT)
		$url .= "&sCdAvisoRecebimento=" . $freteCorreios->getAvisoRecebimento();//Serviço de aviso de recebimento. N = NAO
		$url .= "&nCdServico=40010"; //Tipo do Frete (SEDEX = 40010, PAC 41106)
		$url .= "&nVlDiametro=0";//Caixa nao possui diametro. VL = 0 (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&StrRetorno=xml"; //Retorno dos correios em XML

		$xml = simplexml_load_file($url);

		return $xml -> cServico;
	}//CALCULAR FRETE SEDEX
	
	function Calcular_Frete($cep_Origem, $cep_Destino, $peso, $valor, $tipo_Frete, $altura = 6, $largura = 20, $comprimento = 20)
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
		$url .= "&sCdMaoPropria=n"; //Serviço de entrega nas maos do destinatario, N = NAO
		$url .= "&nVlValorDeclarado=" . $valor;//Valor declarado da encomenda (VALOR EM FLOAT)
		$url .= "&sCdAvisoRecebimento=n";//Serviço de aviso de recebimento. N = NAO
		$url .= "&nCdServico=" . $tipo_Frete; //Tipo do Frete (SEDEX = 40010, PAC 41106)
		$url .= "&nVlDiametro=0";//Caixa nao possui diametro. VL = 0 (VALOR EM INTEIRO, VALOR EM CM)
		$url .= "&StrRetorno=xml"; //Retorno dos correios em XML

		$xml = simplexml_load_file($url);

		return $xml -> cServico;
	}
	
	//METODOS FIM
	
}//CLASS
?>