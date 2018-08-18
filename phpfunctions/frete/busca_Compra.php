<?php
// ALTURA LARGURA E COMPRIMENTO É EM CENTIMETROS
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
$url .= "&sCdMaoPropria=n" . $peso; //Serviço de entrega nas maos do destinatario, N = NAO
$url .= "&nVlValorDeclarado=" . $valor;//Valor declarado da encomenda (VALOR EM FLOAT)
$url .= "&sCdAvisoRecebimento=n";//Serviço de aviso de recebimento. N = NAO
$url .= "&nCdServico=" . $tipo_Frete; //Tipo do Frete (SEDEX = 40010, PAC 41106)
$url .= "&nVlDiametro=0";//Caixa nao possui diametro. VL = 0 (VALOR EM INTEIRO, VALOR EM CM)
$url .= "&StrRetorno=xml"; //Retorno dos correios em XML

$xml = simplexml_load_file($url);

return $xml -> cServico;
}

//Testa a função e transforma em um varchar
//var_dump(Calcular_Frete('27410200','37500410',2,1000,'41106')); 

//Retorno da função para a variavel Val
$valPAC = (Calcular_Frete('27410200','37500410',2,1000,'41106')); 
//$valSEDEX = (Calcular_Frete('27410200','37500410',2,1000,'40010'));

echo $valPAC;

?>