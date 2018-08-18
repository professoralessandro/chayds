<?php
//FUNÇÃO VALOR MOEDA PONTOS
function moeda($get_valor) {
$source = array('.', ',');
$replace = array('', '.');
$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
return $valor; //retorna o valor formatado para gravar no banco
}
function virgula($get_valor) {
$source = array(',', '.');
$replace = array('', ',');
$valor = str_replace($source, $replace, $get_valor); //remove as virgulas e substitui por virgula
return $valor; //retorna o valor formatado para gexibir para o usuario
}
//FIM DA FUNÇÃO
?>