<?php
function iniciaPagamentoAction() { //gera o código de sessão obrigatório para gerar identificador (hash)

		//$id = (string) $this->params ()->fromRoute( 'confirma', null );

		$data['token'] ='BC4F456821414523B1D3F14D193F909B'; //token teste SANDBOX

				//$_SERVER['REMOTE_ADDR']
		$emailPagseguro = "professor_alessandro@hotmail.com";

		$data = http_build_query($data);
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions';

		$curl = curl_init();

		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'
			);

		curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);
		$idSessao = $xml -> id;
		echo $idSessao;
		exit;
		//return $codigoRedirecionamento;

	}

function efetuaPagamentoCartao($dados) {


		$data['token'] ='SEU TOKEN PAGSEGURO'; //token sandbox ou produção
		$data['paymentMode'] = 'default';
		$data['senderHash'] = $dados['hash']; //gerado via javascript
		$data['creditCardToken'] = $dados['creditCardToken']; //gerado via javascript
		$data['paymentMethod'] = 'creditCard'; //Metodo de pagamento
		$data['receiverEmail'] = 'professor_alessandro@hotmail.com';//Email cadastrado o pagseguro
		$data['senderName'] = $dados['senderName']; //nome do usuário deve conter nome e sobrenome
		$data['senderAreaCode'] = $dados['senderAreaCode'];//Codigo de area do telefone do comprador
		$data['senderPhone'] = $dados['senderPhone'];// telefono do comprador
		$data['senderEmail'] = $dados['senderEmail'];//Email do comprador
		$data['senderCPF'] = $dados['senderCPF'];//CPF do comprador
		$data['installmentQuantity'] = '1';// Quantidade de parcelas
		//$data['noInterestInstallmentQuantity'] = '1';
		$data['installmentValue'] = $dados['installmentValue']; //valor da parcela
		$data['creditCardHolderName'] = $dados['creditCardHolderName']; //tipo da bandeira do cartao do cliente
		$data['creditCardHolderCPF'] = $dados['creditCardHolderCPF'];//CPF do pagamento, nao precisa ser necessariamente o comprador
		$data['creditCardHolderBirthDate'] = $dados['creditCardHolderBirthDate'];//data de bascimento do titular do cartao
		$data['creditCardHolderAreaCode'] = $dados['creditCardHolderAreaCode'];//codigo da area do telefone do titular
		$data['creditCardHolderPhone'] = $dados['creditCardHolderPhone'];//telefone do titular do cartao
		$data['billingAddressStreet'] = $dados['billingAddressStreet'];//Logradouro do comprador
		$data['billingAddressNumber'] = $dados['billingAddressNumber'];//Numero do comprador
		$data['billingAddressDistrict'] = $dados['billingAddressDistrict'];//Bairro do comprador
		$data['billingAddressPostalCode'] = $dados['billingAddressPostalCode'];//Cep do comprador
		$data['billingAddressCity'] = $dados['billingAddressCity'];//Cidade do comprador
		$data['billingAddressState'] = $dados['billingAddressState'];//Estado do comprador
		$data['billingAddressCountry'] = 'Brasil';//País
		$data['currency'] = 'BRL';//Moeda do pagamento
		$data['itemId1'] = '01';//Id do item
		$data['itemQuantity1'] = '1';//Quantidade do mesmo item
		$data['itemDescription1'] = 'Descrição do item';//Descrição do item
		$data['reference'] = $dados['reference']; //referencia qualquer do produto, pode ser o id do usuario ou codigo do usuario ou qualquer coisa
		$data['shippingAddressRequired'] = 'true';//se for produto enviado pelos correios == true, se for serviço prestado == false
		$data['itemAmount1'] = $dados['itemAmount1'];//Valor unitario de cada item

				//$_SERVER['REMOTE_ADDR']
		$emailPagseguro = "professor_alessandro@hotmail.com";

		$data = http_build_query($data);
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions'; //URL de teste


		$curl = curl_init();

		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'
			);

		curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);


		//echo $xml -> paymentLink;
		$code =  $xml -> code;
		$date =  $xml -> date;
		
		//aqui eu ja trato o xml e pego o dado que eu quero, vc pode dar um var_dump no $xml e ver qual dado quer

		$retornoCartao = array(
				'code' => $code,
				'date' => $date
		);

		return $retornoCartao;

	}

function efetuaPagamentoBoleto($dados) {


		$data['token'] ='seu token do pagseguro disponível no login sandbox'; //token sandbox test
		$data['paymentMode'] = 'default';
		$data['hash'] = $dados['hash'];
		$data['paymentMethod'] = 'boleto';
		$data['receiverEmail'] = 'e-mail cadastrado no pagseguro não é o do cliente';
		$data['senderName'] = $dados['senderName'];
		$data['senderAreaCode'] = $dados['senderAreaCode'];
		$data['senderPhone'] = $dados['senderPhone'];
		$data['senderEmail'] = $dados['senderEmail'];
		if($dados['senderCPF'] != null){$data['senderCPF'] = $dados['senderCPF'];}
		if($dados['senderCNPJ'] != null){$data['senderCNPJ'] = $dados['senderCNPJ'];}
		$data['currency'] = 'BRL';
		$data['itemId1'] = $dados['itemId1'];
		$data['itemQuantity1'] =$dados['itemQuantity1'];
		$data['itemDescription1'] = $dados['itemDescription1'];
		$data['reference'] = $dados['reference'];
		$data['shippingAddressRequired'] = 'false';
		$data['itemAmount1'] = $dados['itemAmount1'];

				//$_SERVER['REMOTE_ADDR']
		$emailPagseguro = "e-mail cadastrado no pagseguro não é o do cliente";

		$data = http_build_query($data);
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions'; //URL de teste


		$curl = curl_init();

		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'
			);

		curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);


		//echo $xml -> paymentLink;
		$boletoLink =  $xml -> paymentLink;
		$code =  $xml -> code;
		$date =  $xml -> date;
		
		//aqui eu ja trato o xml e pego o dado que eu quero, vc pode dar um var_dump no $xml e ver qual dado quer

		$retornoBoleto = array(
				'paymentLink' => $boletoLink,
				'date' => $date,
				'code' => $code
		);

		return $retornoBoleto;

	}

?>