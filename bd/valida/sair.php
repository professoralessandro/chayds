<?php
session_start();

		unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioCPF'],
		$_SESSION['usuarioTel'],
		$_SESSION['usuarioTelDDD'],
		$_SESSION['usuarioAcessoNiveis'],
		$_SESSION['usuarioNasci'],
		$_SESSION['usuarioEmail'],
		$_SESSION['usuarioSenha'],
		$_SESSION['usuarioEnd'],
		$_SESSION['usuarioCompl'],
		$_SESSION['usuarioBairro'],
		$_SESSION['usuarioCid'],
		$_SESSION['usuarioEstado'],
		$_SESSION['usuarioCep']
		
		);
		
		echo "<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=../../index.php'>
			<script type= \"text/javascript\">
			alert(\"A sessão foi encerrada com sucesso.\");
			</script>";	
			
			
mysqli_close($conn);
?>