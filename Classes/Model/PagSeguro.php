<?php
class PagSeguro
{
	//ATRIBUTOS
	private $itemId; // $data['itemId1']
	private $tokenOficial; //$data['token']
	private $tokenSandBox; //$data['token']
	private $descricaoItem; //$data['itemDescription1']
	private $quantidadeItem; //'1';
	private $tipoMoeda; // $data['currency'] ='BRL' 
	private $emailPagSeguro; //$data['email'] "SEU EMAIL USADO NO CADASTRO DO PAGSEGURO";
	private $valorItem; //$data['itemAmount1'] = number_format($dados['valor'],2,".","");
	private $pesoItem; //$data['itemWeight1'] = '0';
	private $referencia; //$data['reference'] ID DA COMPRA DO USUУ?RIO
	private $statusCode; //STATUS DA COMPRA
	
	private $nomeUsuario; //$data['senderName']
	private $dddUsuario; //$data['senderAreaCode']
	private $telefoneUsuario; //$data['senderPhone']
	private $emailUsuario; //$data['senderEmail']
	private $shipping; //$data['shippingType'] = '3';
	private $ruaUsuario; //$data['shippingAddressStreet']
	private $numeroUsuario; //$data['shippingAddressNumber']
	private $complementoUsuario; //$data['shippingAddressComplement']
	private $bairro; //$data['shippingAddressDistrict']
	private $cidade; //$data['shippingAddressCity']
	private $estado; //$data['shippingAddressState']
	private $cep; //$data['shippingAddressPostalCode']
	private $moedaUsuario; //$data['shippingAddressCountry'] = 'BRA';
	private $retorno; //$data['redirectURL'] = $retorno;
	private $urlRetorno; // ="http://SEUSITE/pagseguro/notificacao.php";
	//private $idTransacao; // Transaчуo nуo concluida no ML
	
	//URL OFICIAL
	//COMENTE AS 4 LINHAS ABAIXO E DESCOMENTE AS URLS DA SANDBOX PARA REALIZAR TESTES
	private $url ;
	private $url_redirect ;
	private $url_notificacao ;
	private $url_transactions ;
	//ATRIBUTOS
	
	//CONSTRUTOR
	public function __construct($itemId='',$descricaoItem='', $valorItem='', $pesoItem='', $referencia='',$nomeUsuario='', $dddUsuario='', $telefoneUsuario='', $emailUsuario='', $ruaUsuario='', $complementoUsuario='', $bairro='', $cidade='', $estado='', $cep='')
	{
		$this->itemId = $itemId;
		$this->tokenOficial = 'BC4F456821414523B1D3F14D193F909B';
		$this->tokenSandBox = 'BC4F456821414523B1D3F14D193F909B';
		$this->descricaoItem = $descricaoItem;
		$this->quantidadeItem = '1';
		$this->tipoMoeda = 'BRL';
		$this->emailPagSeguro = 'professor_alessandro@hotmail.com';
		$this->valorItem = $valorItem;
		$this->pesoItem = '0';
		$this->referencia = $referencia;
		$this->nomeUsuario = $nomeUsuario;
		$this->dddUsuario = $dddUsuario;
		$this->telefoneUsuario = $telefoneUsuario;
		$this->emailUsuario = $emailUsuario;
		$this->shipping ='3'; //Se vocъ selecionar a opчуo Frete por peso em suas preferъncias, ao passar uma das formas de envio na criaчуo do fluxo de pagamento (shippingType = 1 ou 2) seu cliente poderс utilizar somente a forma de envio passada no shippingType durante a criaчуo do fluxo de pagamento. Caso vocъ nуo informe o shippingType (shippingType=3), seu cliente poderс optar entre as opчѕes PAC e SEDEX.
		$this->ruaUsuario = $ruaUsuario;
		$this->numeroUsuario = '0';
		$this->complementoUsuario = $complementoUsuario;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->estado = $estado;
		$this->cep = $cep;
		$this->moedaUsuario = 'BRL';
		$this->retorno = ''; //'http://chayds.com.br/' //URL DO SEU SITE PARA RETORNAR APOS A COMPRA
		/*
		if(isset($idTransacao) && $idTransacao != null)
		{
			$this->idTransacao = $idTransacao;
		}
		else
		{
			$this->idTransacao = 'VAZIO';
		}
		*/
		$this->statusCode = array(0=>"Pendente",
								1=>"Aguardando pagamento",
								2=>"Em anсlise",
								3=>"Pago",
								4=>"Disponэvel",
								5=>"Em disputa",
								6=>"Devolvida",
								7=>"Cancelada");
		
		$this->urlRetorno =''; //URL DE NOTIFICAO
		
		/*
		//AMBIENTE DE COMPRA
		$this->url = "https://ws.pagseguro.uol.com.br/v2/checkout/";
		$this->url_redirect = "https://pagseguro.uol.com.br/v2/checkout/payment.html?code=";
		$this->url_notificacao = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/';
		$this->url_transactions = 'https://ws.pagseguro.uol.com.br/v2/transactions/';
		//AMBIENTE DE COMPRA
		*/
		
		//AMBIENTE DE TESTE
		$this->url = "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/"; //AMBIENTE DE TESTE
		$this->url_redirect= "https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code="; // AMBIENTE DE TESTE
		$this->url_notificacao = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/'; //AMBIENTE DE TESTE
		$this->url_transactions = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/'; //AMBIENTE DE TESTE
	}//CONSTRUTOR
	
	//PROPRIEDADES
	public function getItemId() {
        return $this->itemId;
    }

    public function getTokenOficial() {
        return $this->tokenOficial;
    }

    public function getTokenSandBox() {
        return $this->tokenSandBox;
    }

    public function getDescricaoItem() {
        return $this->descricaoItem;
    }

    public function getQuantidadeItem() {
        return $this->quantidadeItem;
    }

    public function getTipoMoeda() {
        return $this->tipoMoeda;
    }

    public function getEmailPagSeguro() {
        return $this->emailPagSeguro;
    }

    public function getValorItem() {
        return $this->valorItem;
    }

    public function getPesoItem() {
        return $this->pesoItem;
    }

    public function getReferencia() {
        return $this->referencia;
    }

    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function getDddUsuario() {
        return $this->dddUsuario;
    }

    public function getTelefoneUsuario() {
        return $this->telefoneUsuario;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function getShipping() {
        return $this->shipping;
    }

    public function getRuaUsuario() {
        return $this->ruaUsuario;
    }

    public function getNumeroUsuario() {
        return $this->numeroUsuario;
    }

    public function getComplementoUsuario() {
        return $this->complementoUsuario;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getMoedaUsuario() {
        return $this->moedaUsuario;
    }

    public function getRetorno() {
        return $this->retorno;
    }

    public function getUrlRetorno() {
        return $this->urlRetorno;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getUrl_redirect() {
        return $this->url_redirect;
    }

    public function getUrl_notificacao() {
        return $this->url_notificacao;
    }

    public function getUrl_transactions() {
        return $this->url_transactions;
    }
	
	public function getStatusCode() {
        return $this->statusCode;
    }
	
	/* PROPRIEDADES ID TRANSACAO INATIVA
	public function getIdTransacao() {
        return $this->idTransacao;
    }
	
    public function setIdTransacao($idTransacao) {
        $this->idTransacao = $idTransacao;
    }
	PROPRIEDADES ID TRANSACAO INATIVA
	*/
	
	
    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }
	
    public function setItemId($itemId) {
        $this->itemId = $itemId;
    }

    public function setTokenOficial($tokenOficial) {
        $this->tokenOficial = $tokenOficial;
    }

    public function setTokenSandBox($tokenSandBox) {
        $this->tokenSandBox = $tokenSandBox;
    }

    public function setDescricaoItem($descricaoItem) {
        $this->descricaoItem = $descricaoItem;
    }

    public function setQuantidadeItem($quantidadeItem) {
        $this->quantidadeItem = $quantidadeItem;
    }

    public function setTipoMoeda($tipoMoeda) {
        $this->tipoMoeda = $tipoMoeda;
    }

    public function setEmailPagSeguro($emailPagSeguro) {
        $this->emailPagSeguro = $emailPagSeguro;
    }

    public function setValorItem($valorItem) {
        $this->valorItem = $valorItem;
    }

    public function setPesoItem($pesoItem) {
        $this->pesoItem = $pesoItem;
    }

    public function setReferencia($referencia) {
        $this->referencia = $referencia;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function setDddUsuario($dddUsuario) {
        $this->dddUsuario = $dddUsuario;
    }

    public function setTelefoneUsuario($telefoneUsuario) {
        $this->telefoneUsuario = $telefoneUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    public function setShipping($shipping) {
        $this->shipping = $shipping;
    }

    public function setRuaUsuario($ruaUsuario) {
        $this->ruaUsuario = $ruaUsuario;
    }

    public function setNumeroUsuario($numeroUsuario) {
        $this->numeroUsuario = $numeroUsuario;
    }

    public function setComplementoUsuario($complementoUsuario) {
        $this->complementoUsuario = $complementoUsuario;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setMoedaUsuario($moedaUsuario) {
        $this->moedaUsuario = $moedaUsuario;
    }

    public function setRetorno($retorno) {
        $this->retorno = $retorno;
    }

    public function setUrlRetorno($urlRetorno) {
        $this->urlRetorno = $urlRetorno;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setUrl_redirect($url_redirect) {
        $this->url_redirect = $url_redirect;
    }

    public function setUrl_notificacao($url_notificacao) {
        $this->url_notificacao = $url_notificacao;
    }

    public function setUrl_transactions($url_transactions) {
        $this->url_transactions = $url_transactions;
    }
	//PROPRIEDADES
}//CLASS
?>