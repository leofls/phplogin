<?php
	session_start();
	require 'conexao.php';

	date_default_timezone_set('America/Sao_Paulo');
	$data_final = date("Y-m-d H:i:s");
	$sessao = $_SESSION['usuario'];
	
	//Faz consulta no banco para verificar qual é a seção ativa 
	$consulta = $pdo->prepare("SELECT * FROM controle_acesso WHERE usuario = '$sessao' ORDER BY id_controle DESC LIMIT 1");
	$consulta->execute();

	//verifica a row e Guarda os valores encontrados em uma variavel 
	foreach($consulta as $mostra){
		$id = addslashes(strip_tags($mostra['id_controle']));		
	}
	

	//Faz um UPDATE para o controle de acesso para saber quando o usuario deslogou
	$altera = $pdo->prepare("UPDATE controle_acesso SET data_final = '$data_final' where id_controle='$id'");
	$altera->execute();
	
	//Faz o redirecionamento da pagina depois que realiza o UPDATE no banco
	if($altera){
		session_destroy();
		echo '<script>window.location="index.php"</script>';
	}else{
		echo '<script>window.location="index.php"</script>';
	}
	
	
?>