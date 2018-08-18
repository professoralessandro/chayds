<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Produto de teste</title>
<script type="text/javascript" src="jquery.js"></script>
<script>

function enviaPagseguro(){
$.post("pagseguro.php",'',function(data){

	alert(data);

})
}

</script>

</head>

<body>
<div>
<h1>Produto de teste</h1>
<p> 299,00</p>

<button onClick="enviaPagseguro()">Comprar</button>
</div>


<!--
<form id="comprar" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">

<input type="hidden" name="code" id="code" value="" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
</body>
-->


<form id="comprar" action="https://pagseguro.uol.com.br/v2/checkout/payment.html" method="post" onSubmit="PagSeguroLightbox(this); return false;">

<!--
<form id="comprar" action="pagseguro.php" method="post" onsubmit="PagSeguroLightbox(this); return false;">
-->

<input type="hidden" name="code" id="code" value="" />

<!--
<input type="submit" />
-->



</form>

<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>

</body>
</html>