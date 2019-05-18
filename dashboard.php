<?php
//essa parte verifica se usuario está logado se não redireciona para login 
	session_start();
	require "conexao.php";

	if(!$_SESSION['usuario']){
		session_destroy();
		echo '<script>window.location="index.php"</script>';
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
</head>
<body>
	<p>Seja bem vindo ao Painel <strong><?php echo $_SESSION['usuario']; ?></strong></p>
	<br><br>
	<p><a href="dashboard.php"> Dashboard</a> - <a href="financeiro.php"> Finanças</a> - <a href="sair.php">SAIR</a></p>
</body>
</html>