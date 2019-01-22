<?php session_start(); ?>
<?php include_once("../Conexao/Conexao.php"); ?>
<?php include_once("../Model/PagSeguro.php"); ?>
<?php
class DALPagSeguro
{
	private $conexao;
	
	public function DALPagSeguro($conexao)
	{
		$this->conexao = $conexao;
	}
	
	//METODOS PRONTOS
	//generateUrl OK
	private function generateUrl($pagSeguro)
	{
		//Configurações
		$data['email'] = $pagSeguro->getEmailPagSeguro();
		$data['token'] = $pagSeguro->getTokenOficial();
		$data['currency'] = 'BRL';
		
		//Itens
		$data['itemId1'] = '0001';
		$data['itemDescription1'] = $pagSeguro->getDescricaoItem();
		$data['itemAmount1'] = $pagSeguro->getValorItem();
		$data['itemQuantity1'] = '1';
		$data['itemWeight1'] = '0';
		
		//Dados do pedido
		$data['reference'] = $pagSeguro->getReferencia();		
			
		//Dados do comprador
		
		//Tratar telefone
		//$telefone = implode("",explode("-",substr($pagSeguro->getTelefoneUsuario(),5,strlen($pagSeguro->getTelefoneUsuario()))));
		//TRATAMENTO DDD
		//$ddd = substr($pagSeguro->getDddUsuario(),1,2);
		
		//Tratar CEP
		//$cep = implode("",explode("-",$pagSeguro->getCep()));
		//$cep = implode("",explode(".",$pagSeguro->getCep()));
		
		/*
		$data['senderName'] = $pagSeguro->getNomeUsuario();
		$data['senderAreaCode'] = $pagSeguro->getDddUsuario();
		$data['senderPhone'] = $pagSeguro->getTelefoneUsuario();
		$data['senderEmail'] = $pagSeguro->getEmailUsuario();
		$data['shippingType'] = '3';
		$data['shippingAddressStreet'] = $pagSeguro->getRuaUsuario();
		$data['shippingAddressNumber'] = '10';
		$data['shippingAddressComplement'] = '';
		$data['shippingAddressDistrict'] = $pagSeguro->getBairro();
		$data['shippingAddressPostalCode'] = $pagSeguro->getCep();
		$data['shippingAddressCity'] = $pagSeguro->getCidade();
		$data['shippingAddressState'] = $pagSeguro->getEstado();
		//$data['shippingAddressState'] = strtoupper($pagSeguro->getEstado());
		$data['shippingAddressCountry'] = 'BRA';
		*/
		$data['redirectURL'] = $pagSeguro->getRetorno();
			
		return http_build_query($data);
	}//generateUrl OK
	
	//executeCheckout OK
	public function executeCheckout($pagSeguro)
	{
		//REDIRECIONAMENTO PARA TRANSAÇÃO PENDENTE
		/*
		if($pagSeguro->getIdTransacao() != null && $pagSeguro->getIdTransacao() != '')
		{
			header('Location:'.$pagSeguro->getUrl_redirect().$pagSeguro->getIdTransacao());
		}
		*/
		
		$dados = $this->generateUrl($pagSeguro);
		
		$curl = curl_init($pagSeguro->getUrl());
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $dados);
		$xml= curl_exec($curl);
		
		if($xml == 'Unauthorized'){
			//Insira seu código de prevenção a erros
			echo "Erro: Dados invalidos - Unauthorized";
			exit;//Mantenha essa linha
		}
		
		curl_close($curl);
		$xml_obj = simplexml_load_string($xml);
		if(count($xml_obj -> error) > 0){
			//Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
			echo $xml."<br><br>";
			echo "Erro-> ".var_export($xml_obj->errors,true);
			exit;
		}
		
		//header('Location:https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code='.$xml_obj->code);
		//return anterior
		//return $pagSeguro->getUrl_redirect().$xml_obj->code;
		//return $pagSeguro;
		//header('Location:'.$pagSeguro->getUrl_redirect().$xml_obj->code);
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=$xml_obj->code'>";
	}//executeCheckout OK
	
	//RECEBE UMA NOTIFICAÇÃO DO PAGSEGURO
	//RETORNA UM OBJETO CONTENDO OS DADOS DO PAGAMENTO
	//executeNotification
	public function executeNotification($POST, $pagSeguro){
		
		$url = $pagSeguro->getUrl_notificacao().$POST['notificationCode'].$pagSeguro->getEmailPagSeguro();
		
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		
		$transaction = curl_exec($curl);
		
		/*
		if($transaction == 'Unauthorized'){
			//TRANSAÇÃO NÃO AUTORIZADA
		    exit;
		}*/
		
		curl_close($curl);
		
		$transaction_obj = simplexml_load_string($transaction);
		
		$reference = $transaction_obj->reference;
		$status = $transaction_obj->status;
		
		$pagSeguro->setReferencia($reference);
		$pagSeguro->setStatusCode($status);
		
		$this->enviarEmailStatusCompra($pagSeguro);
		
		$this->mudarStatus($reference, $status);
		
		header('Location: '.$resultPagueSeguro);
		//return $transaction_obj;		
	}//executeNotification
	
	//Obtém o status de um pagamento com base no código do PagSeguro
	//Se o pagamento existir, retorna um código de 1 a 7
	//Se o pagamento não exitir, retorna NULL
	
	//getStatusByCode
	public function getStatusByCode($code, $pagSeguro)
	{
		$url = $pagSeguro->getUrl_transactions().$code.$pagSeguro->getEmailPagSeguro();
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	
		$transaction = curl_exec($curl);
		if($transaction == 'Unauthorized') {
			//Insira seu código avisando que o sistema está com problemas
			//sugiro enviar um e-mail avisando para alguém fazer a manutenção
			exit;//Mantenha essa linha para evitar que o código prossiga
		}
		$transaction_obj = simplexml_load_string($transaction);
		
		if(count($transaction_obj -> error) > 0) {
		   //Insira seu código avisando que o sistema está com problemas
		   var_dump($transaction_obj);
		}		

		if(isset($transaction_obj->status))
			return $transaction_obj->status;
		else
			return NULL;
	}//getStatusByCode
	
	private function mudarStatus($referencia, $status)
	{
		$sqlComand = "UPDATE tbCompra
		SET statusCompra = '". $status ."'
		
		WHERE idCompra = '". $referencia ."'
		";
	}
	
	// A COMPLETAR A FUNÇÃO DE ENVIO DE EMAIL
	private function enviarEmailStatusCompra($pagSeguro)
	{
		$pagSeguro = new PagSeguro();
		
		//NOVO
		mail('professor_alessandro@hotmail.com','status da compra N '.$pagSeguro->getReferencia().' foi atualizado no PagueSeguro para: '.$pagSeguro->getStatusCode().' ', "
		
		
		esta e um contato enviado para informar que a compra N $pagSeguro->getReferencia() esta
		com status: $pagSeguro->getStatusCode() .			
			");
		//NOVO
		
	}//enviarEmailStatusCompra
	// A COMPLETAR A FUNÇÃO DE ENVIO DE EMAIL
	//Obtém o status de um pagamento com base na referência
	//Se o pagamento existir, retorna um código de 1 a 7
	//Se o pagamento não exitir, retorna NULL
	//getStatusByReference
	public function getStatusByReference($pagSeguro)
	{
		$url = $pagSeguro->getUrl_transactions().$pagSeguro->getEmailPagSeguro()."&reference=".$pagSeguro->getReferencia();
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	
		$transaction = curl_exec($curl);
		if($transaction == 'Unauthorized') {
			//Insira seu código avisando que o sistema está com problemas
			exit;//Mantenha essa linha para evitar que o código prossiga
		}
		$transaction_obj = simplexml_load_string($transaction);
		if(count($transaction_obj -> error) > 0) {
		   //Insira seu código avisando que o sistema está com problemas
		   var_dump($transaction_obj);
		}
		//print_r($transaction_obj);
		if(isset($transaction_obj->transactions->transaction->status))
			return $transaction_obj->transactions->transaction->status;
		else
			return NULL;
	}//getStatusByReference
	
	//getStatusText
	public function getStatusText($code){
		if($code>=1 && $code<=7)
			return $this->statusCode[$code];
		else
			return $this->statusCode[0];
	}//getStatusText
	//FIM METODOS PRONTOS
}//CLASS
?>