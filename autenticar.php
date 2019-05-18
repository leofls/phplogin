<?php
	session_start();
	require 'conexao.php';

	//Recebe os dados da pagina anterior usando o GET
	$nome = addslashes(trim(strip_tags($_GET['nome_completo'])));
	$usuario = addslashes(trim(strip_tags($_GET['usuario'])));
	$nivel = addslashes(trim(strip_tags($_GET['nivel'])));

	//muda or formato da datapara usar o Timestamps
	date_default_timezone_set('America/Sao_Paulo');
	$data_inicial = date("Y-m-d H:i:s");

	//caso queira ver os valores passados 
	//echo "Valores passados: ".$nome.", ".$usuario.", ". $nivel.", ".$data_inicial;


	//Inserindo dados para ter um controle de acesso	
	$sql = "INSERT INTO controle_acesso (usuario, data_inicial ) VALUES ('$usuario', '$data_inicial')";
	$insere = $pdo->prepare($sql);
	$insere->execute();

	//Se insseriu redirecionar a pagina 
	if($insere){
		echo '<script>window.location="dashboard.php"</script>';
	} else{
			session_destroy();
			echo '<script>window.location="index.php"</script>';	
		}
	
?>