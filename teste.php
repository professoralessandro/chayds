<?php

session_start();

include_once("phpfunctions/frete/frete_correios.php");

//$ft = new frete_correios;

//$ft->CalcularFrete('11463190',$_SESSION['usuarioCep'],'1.75',350,'40010',20,20,100);



//$ft->Calcular();

//print_r($ft->Calcular_Frete('11463190','27410200', '1', 1000,'40010',6,20,20));

/*
$ft->CalcularFrete('11463190','27410200', '1', 1000,'40010',6,20,20); echo"<br/>";
echo "Valor SEDEX: ".$ft->valFrete."<br/>";
echo "Tempo de entrega: ".$ft->temEntr."<br/>";
echo "Valor sem seguro: ".$ft->valSSeuro."<br/>";
/*
$ft->CalcularFrete('11463190','27410200', '1', 1000,'41106',6,20,20);
//print_r($ft);

echo "Valor PAC: ".$ft->valFrete."<br/>";
echo "Tempo de entrega: ".$ft->temEntr."<br/>";
echo "Valor sem seguro: ".$ft->valSSeuro;

//print_r($ft);*/
?>