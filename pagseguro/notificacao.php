<?php
include_once "../bd/conexao/conexao.php";

$notificationCode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]);

$data['token'] ='BC4F456821414523B1D3F14D193F909B';
$data['email'] ='professor_alessandro@hotmail.com';

$data = http_build_query($data);
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);

$reference = $xml->reference;
$status = $xml->status;

if($reference && $status)
{
$sql = "SELECT * FROM `tb_compra` WHERE id_comp_usu = '$reference' LIMIT 1";
		$resultado = mysqli_query($conn, $sql) or die ("Erro ao consultar os dados na base.");
		if (mysqli_affected_rows($conn) != 0)
		{
			while($dados = mysqli_fetch_array($resultado))
			{	
				$id_comp_usu = $dados['id_comp_usu'];
				$nome_comp_usu = $dados['nome_comp_usu'];
				$email_comp_usu = $dados['email_comp_usu'];
				$nome_prod_usu = $dados['nome_prod_usu'];
				$quant_prod_usu = $dados['quant_prod_usu'];
				$dt_comp_usu = $dados['dt_comp_usu'];
				$val_uni_comp_usu = $dados['val_uni_comp_usu'];
				$val_frete_comp_usu = $dados['val_frete_comp_usu'];
				$val_comp_usu = $dados['val_comp_usu'];
				$status_int_comp_usu = $dados['status_int_comp_usu'];
				$tp_fret_comp_usu = $dados['tp_fret_comp_usu'];
				$cod_rastr_comp_usu = $dados['cod_rastr_comp_usu'];
			}
					
			$sqli = "SELECT * FROM `tb_usuario` WHERE email_usu = '$email_comp_usu' LIMIT 1";
			$result = mysqli_query($conn, $sqli);
			$resultado = mysqli_fetch_assoc($result);
					
			
			$id_usu = $resultado['id_usu'];
			$nome_usu = $resultado['nome_usu'];
			$tel_usu = $resultado['tel_usu'];
			$ddd_usu = $resultado['ddd_usu'];
			$nome_nivel_acesso = $resultado['nome_nivel_acesso'];
			$email_usu = $resultado['email_usu'];
			$end_usu = $resultado['end_usu'];
			$complemento_usu = $resultado['complemento_usu'];
			$bairro_usu = $resultado['bairro_usu'];
			$cidade_usu = $resultado['cidade_usu'];
			$estado_usu = $resultado['estado_usu'];
			$cep_usu = $resultado['cep_usu'];
			
			if($status == '0' || $status == '25')
			{
				$status_comp_usu = 'Pendente';
			}
			else if($status == '1')
			{
				$status_comp_usu = 'Aguardando pagamento';
			}
			else if($status == '2')
			{
				$status_comp_usu = 'Em análise';
			}
			else if($status == '3')
			{
				$status_comp_usu = 'Pago';
			}
			else if($status == '4')
			{
				$status_comp_usu = 'Disponível';
			}
			else if($status == '5')
			{
				$status_comp_usu = 'Em disputa';
			}
			else if($status == '6')
			{
				$status_comp_usu = 'Devolvida';
			}
			else if($status == '7')
			{
				$status_comp_usu = 'Cancelada';
			}
			else if($status == '25')
			{
				$status_comp_usu = 'Pendente interno';
			}
			
			mail('comercial@chayds.com.br','status da compra N '.$reference.' foi atualizado no PagueSeguro para: '.$status_comp_usu.' ', "
		
		
		esta e um contato enviado para informar que a compra N $id_comp_usu esta
		com status: $status_comp_usu . Segue
		neste email todas informacoes sobre a compra:
		
		Nome do cliente: $nome_comp_usu
		Email do cliente: $email_comp_usu
		Telefone: ($ddd_usu)$tel_usu
		Nivel de  acesso: $nome_nivel_acesso
		
		Nome do produto: $nome_prod_usu
		Quantidade: $quant_prod_usu
		Valor unitario: $val_uni_comp_usu
		Valor do frete: $val_frete_comp_usu
		Valor total: $val_comp_usu
		Data da compra: $dt_comp_usu
		Status no MercadoPago: $status_comp_usu
		Status interno: $status_int_comp_usu
		Tipo de frete: $tp_fret_comp_usu
		Codigo de Rastreio: $cod_rastr_comp_usu 
		
		Endereco: $end_usu
		Bairro: $bairro_usu
		Complemento: $complemento_usu
		Cidade: $cidade_usu
		Estado: $estado_usu
		CEP: $cep_usu
			
			");
			
			$sqli_comand = "UPDATE tb_compra
				SET status_comp_usu = '$status'
				
				 WHERE id_comp_usu = $reference
				";
				$result = mysqli_query($conn, $sqli_comand);
		}//FIM  IF SELECT TBCOMPRA
}//FIM IF COMPRA DISPONÍVEL OU PAGA



mysqli_close($conn);
?>