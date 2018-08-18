<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "chayds_teste";
$conn = mysqli_connect($host, $usuario, $senha, $bd);

if(!$conn)
{
    die ("Falha na conexão: " .mysqli_connect_error());
}
else
{

}
?>