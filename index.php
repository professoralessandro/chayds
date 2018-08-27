<?php include_once("Classes/Conexao/Conexao.php") ?>
<?php include_once("Classes/Usuario/Model/Usuario.php") ?>
<?php include_once("Classes/Usuario/Model/DALUsuario.php") ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.jpg" /> 
    <title>Teste</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu2.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/form_subm2.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/footer2.css" type="text/css" media="all">
</script>
</head>
<body>
<?php
	$usuario = new Usuario(1,"Ale", "alessandro@chayds.com.br","1234567");
	$cx = new Conexao();
	$dalusuario = new DALUsuario($cx);
	
	//print_r($usuario);
	
	//$dalusuario->inserirUsuario($usuario);
	//$usuario->setId(21);
	//$dalusuario->alterarUsuario($usuario);
	//$dalusuario->excluirUsuario(22);
	
	$resultado = $dalusuario->localizarUsuario(24);
	
	while($registro = $resultado->fetch_array())
	{
		print_r($registro);
		echo "<br>";
	}

	$resultado = $dalusuario->listarUsuario();
	
	while($registro = $resultado->fetch_array())
	{
		print_r($registro);
		echo "<br>";
	}

?>
</body>
</html>