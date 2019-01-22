<?php error_reporting(E_ALL); ?>
<?php ini_set('display_erros', 'on'); ?>
<?php include_once('bootstrap.php'); ?>
<?php use NFePHP\NFe\MakeNFe; ?>
<?php

$nfe = new MakeNFe();

//DADOS DA NFE
$cUF = '35'; //CODIGO DO ESTADO
$cNF = '0000009'; //CODIGO ALEATORIO DA NF
$natOp = 'VENDA DE PRODUTO'; //NATUREZA DA OPERAÇÃO
$indPag = '1'; //0 PAGAMENTO A VISTA; 1=PAGAMENTO A PRAZO; 2 OUTROS
$mod = '55'; //MODELO NFE 55 OU 65 MODELO NFCE
$serie = '1'; //SERIE DA NFE
$nFE = '9'; //NUMERO DA NFE
$dhEmi = str_place(" ", "T", date("Y-m-d H:i:sP")); //PARA A VERSAO 3.10 '2014-02-03T13:22:42-3.00' não informar para a NFCe
$dhSaiEnt = str_place(" ", "T", date("Y-m-d H:i:sP")); //PARA A VERSAO 2.00, 3.00 E 3.10
$tpNF ='1';
$nNF = '9'; //1=OPERAÇÃO INTERNA; 2=OPERAÇÃO INTERESTADUAL; 3=COM EXTERIOR
$cMunFG = '3550308';
$stImp = '1'; //0= SEM GERAÇÃO DE DANFE; DANFE NORMAL, RETRATO; 2=DANFE NORMAL, PAISAGEM; 3=DANFE SIMPLIFICADA; 4= DANFE NFC-e; 5= NFC-e EM MENSAGEM ELETRONICA
			  //(O envio da mensagem eletronica pode ser feito de forma simuntanea com a impressao. Usar p tpImp=5 quando for a unica forma de disponibilização de DANFE
$tpEmis = '1'; //1= EMISSAO NORMAL (NÃO EM CONTINGENCIA)
			   //2=CONTINGENCIA FS-IA, COM IMPRESSAO DA DANFE EM FORMULARIO DE SEGURANÇA
			   //3=CONTINGENCIA SCAN (SISTEMA DE CONTINGENCIA DO AMBIENTE FISCAL)
			   //4=CONTINGENCIA DPEC (DECLARAÇÃO PREVIA DA EMISAO EM CONTINGENCIA)
			   //5=CONTINGENCIA FS-DA (IMPRESSÃO DA DANFE EM FORMULARIO DE SEGURANÇA)
			   //6=CONTINGENCIA SVC-AN (SEFAZ VIRTUAL COM CONTINGENCIA DO AN)
			   //7=CONTINGENCIA SVC-RS (SEFAZ VIRTUAL COM CONTINGENCIA DO RS)
			   //9=CONTINGENCIA SVC-AN (SEFAZ VIRTUAL COM CONTINGENCIA DO AN)
			   //NOTA: PARA A NFC-E SOMENTE ESTAO DISPONIVEIS E SÃO VALIDOS AS OPÇÕES DE CONTINGENCIA 5 E 9
$cDV = '4'; //DIGITO VERIFICADOR
$tpAmb = '2'; //1= PRODUÇÃO; 2= HOMOLOGAÇÃO
$finNFe = '1'; //1= NFE NORMAL; 2=NFE COMPLEMENTAR; 3=NFE DE AJUSTE; 4= DEVOLUÇÃO DE RETORNO
$indFinal = '0'; //0= NÃO; 1=CONSUMIDOR FINAL
$indPres = '9'; //0=NÃO SE APLICA (POR EXEMPLO, NOTA FISCAL COMPLEMENTAR OU DE AJUSTE); 1= OPERAÇÃO PRESENCIAL
				//2=OPERAÇÃO NÃO PRESENCIAL PELA INTERNET; 3=OPERAÇÃO NÃO PRESENCIAL TELEATENDIMENTO;
				//4=NFC-E EM OPERAÇÃO DE ENTREGA A DOMICILIO; OPERAÇÃO NAO PRESENCIAL, OUTROS
$procEmi = '0'; //0= EMISSAO DE NF-E COM APLICATIVO DO CONTRIBUENTE;
				//1= EMISSAO DE NF-E AVULSA PELO FISCO;
				//2= EMISSAO DE NF-E AVULSA, PELO CONTRIBUENTE COM SEU CERTIFICADO DIGITAL, ATRAVÉS DE SITE DO FISCO.
				//3= EMISSAO DE NF-E PELO CONTRIBUENTE COM APLICATIVO FORNECIDO PELO FISCO.
$verProc ='3.22.8'; //VERSÃO DO APLICATIVO EMISSOR
$dhCont =''; //ENTRADA EM CONTINGENCIA AAAA-MM-DD hh:mm:ssTZD.
$xJust =''; //JUSTIFICATIVA DA ENTRADA EM CONTINGENCIA

//NUMERO E VERSÃO DA NFE (INFNFE)
//CHAVE = '131402587165230001195500000000280051760377394';
$tempData = explode("-", $dhEmi);
$ano = $tempData[0] - 2000;
$mes = $tempData[1];
$cnpj = '58716523000119';
$chave = $nfe->montaChave($cUF, $ano, $mes, $cnpj, $mod, $serie, $nNF, $tpEmis, $cNF);
$versao = '3.10';
$resp = $nfe->taginfNFe($chave, $versao);

$cDV = substr($chave, -1); //IGITO VERIFICADOR

//TAG IDE
$resp= $nfe->tagide($cUF, $cNF, $natOp, $indPag, $mod, $serie, $nNF, $dhEmi, $dhSaiEnt, $tpNF, $idDest, $cMunFG, $tpImp, $tpEmis, $cDV, $tpAmb, $finNFe, $indFinal, $indPres, $procEmi, $verProc, $dhCont, $xJust);

//DADOS DO EMITENTE
$CNPJ = '58716523000119';
$CPF = '';
$xNome = 'FIMATEC TEXTIL LTDA';
$xfant = 'FIMATEC';
$IE = '112006603110';
$IEST = '';
$IM = '95095870';
$CNAE = '0131380';
$CRT = '3';
$resp = $nfe->tagemit($CNPJ, $CPF, $xNome, $xfant, $IE, $IEST, $IM, $CRT);

//ENDEREÇO DO EMITENTE
$xLgr = 'RUA DOS PATRIOTAS';
$nro = '897';
$xCpl = 'ARMAZEM 42';
$xBairro = 'IPIRANGA';
$cMun = '3550303';
$xMun = 'São Paulo';
$UF = 'SP';
$CEP = '04207040';
$cPais = '1058';
$xPais = 'BRASIL';
$fone = '1120677300';
$resp = $nfe->tagenderEmit($xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF, $CEP, $cPais, $xPais, $fone);

//DESTINATÁRIO
$CNPJ = '58716523000119';
$CPF = '';
$idEstrangeiro = '';
$xNome = 'M R SANTOS DE PAULA TECIDOS ME';
$indIEDest = '1';
$IE = '244827055110';
$ISUF = '';
$IM = '95095870';
$email = 'linux.rln@gmail.com';
$resp = $nfe->tagdest($CNPJ, $CPF, $idEstrangeiro, $xNome, $indIEDest, $IE, $ISUF, $IM, $email);

//ENDEREÇO DO DESTINATÁRIO
$xLgr = 'AV GASPAR RICARDO';
$nro = '897';
$xCpl = 'ARMAZEM 42';
$xBairro = 'IPIRANGA';
$cMun = '3550303';
$xMun = 'São Paulo';
$UF = 'SP';
$CEP = '04207040';
$cPais = '1058';
$xPais = 'BRASIL';
$fone = '1120677300';
$resp = $nfe->tagenderDest($xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF, $CEP, $cPais, $xPais, $fone);

//PRODUTOS
$aP[] = array(
	'nItem' => 1,
	'cProd' => '2517BCB01',
	'cEAN' => '97899072659522',
	'xProd' => 'DELFOS  80 MESCLA TINTO C/ AMAC. S.T 1,78M',
	'NCM' => '60063300',
	'EXTPIP' => '',
	'CFOP' => '6101',
	'uCom' => 'KG',
	'qCom' => '389.9500',
	'vUncon' => '49,9200000000',
	'vProd' => '19466.30',
	'cEANTrib' => '',
	'uTrib' => 'KG',
	'qTrib' => '389.9500',
	'vUnTrib' => '49,9200000000',
	'vFrete' => '',
	'vSeg' => '',
	'vDesc' => '',
	'vOutro' => '',
	'indTot' => '1',
	'xPed' => '14972',
	'nItemPed' => '1',
	'nFCI' => ''
);

foreach($aP as $prod)
{
	$nItem = $prod['nItem'];
	$cProd = $prod['cProd'];
	$cEAN = $prod['cEAN'];
	$xProd = $prod['xProd'];
	$NCM = $prod['NCM'];
	$EXTPIP = $prod['EXTPIP'];
	$CFOP = $prod['CFOP'];
	$uCom = $prod['uCom'];
	$qCom = $prod['qCom'];
	$vUncon = $prod['vUncon'];
	$vProd = $prod['vProd'];
	$cEANTrib = $prod['cEANTrib'];
	$uTrib = $prod['uTrib'];
	$qTrib = $prod['qTrib'];
	$vUnTrib = $prod['vUnTrib'];
	$vFrete = $prod['vFrete'];
	$vSeg = $prod['vSeg'];
	$vDesc = $prod['vDesc'];
	$vOutro = $prod['vOutro'];
	$indTot = $prod['indTot'];
	$xPed = $prod['xPed'];
	$nItemPed = $prod['nItemPed'];
	$nFCI = $prod['nFCI'];
	$resp = $nfe->tagprod($nItem, $cProd, $cEAN, $xProd, $NCM, $EXTPIP, $CFOP, $uCom, $qCom, $vUncon, $vProd, $cEANTrib, $uTrib, $qTrib, $vUnTrib, $vFrete, $vSeg, $vDesc, $vOutro, $indTot, $xPed, $nItemPed, $nFCI);
}

$nItem = '1';
$vDesc = 'BANCO_FIT F01516 ped. 14972 lote: 7755214/C, 7772214/B, 7772214/C';
$resp = $nfe->taginfAdProd($nItem, $vDesc);

//RETORNA A NFE NA TELA
$resp = $nfe->montaNFe();
if($resp)
{
	header('Content-type: text/xml; charset=UTF-8');
	$xml = $nfe->getXML();
	$filename = "/var/www/nfe/homologacao/$chave-nfe.xml";
	file_put_contents($filename, $xml);
	chmod($filename, 0777);
	echo($xml);
}
else
{
	header('Content-type: text/xml; charset=UTF-8');
	foreach($nfe->erros as $err)
	{
		echo('tag: &lt'.$err['tag'].'&gt: ----'.$err['desc'].'<br>');
	}
}

?>