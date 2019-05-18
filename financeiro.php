<?php
	//Essa parte verifica se usuario está logado se não redireciona para login 
	session_start();
	require "conexao.php";

	if(!$_SESSION['usuario']){
		session_destroy();
		echo '<script>window.location="index.php"</script>';
	}
	//verifica se o usuario pode acessar esse nivel
	if($_SESSION['nivel']=='usuario'){
		echo '<script>alert("Seu usuario não tem acesso a essa área contate o administrador para mais informações!");</script>';
		echo '<script>window.location="dashboard.php"</script>';
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
</head>
<body>
	<p>OPERAÇÂO FINANCEIRA</p>
	<br><br>
	<p><a href="dashboard.php"> Dashboard</a> - <a href="financeiro.php"> Finanças</a> - <a href="sair.php">SAIR</a></p>
</body>
</html>

