<?php
session_start();
require 'conexao.php';
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sistema Login</title>
  
  </head>
	<body>
		
		<form action="" method="post">
			<input type="text" name="usuario" placeholder="Digite seu usuario" required style=" witdth:320px; padding: 8px;" ><br> 
			<input type="password" name="senha" placeholder="Digite sua senha" required style=" witdth:320px; padding: 8px;" ><br>		
			<input type="submit" name="enviar" value=" Acessar" required style="padding: 8px;" >
		</form>
		
		<?php		
			if(isset($_POST['enviar'])){
				//echo $_POST['usuario']." and ".$_POST['senha'];

				$user = addslashes(trim(strip_tags($_POST['usuario'])));
				$pass = addslashes(trim(strip_tags($_POST['senha'])));
				$consulta = $pdo-> prepare("SELECT * FROM cadastro_usuario WHERE usuario = '$user'AND senha='$pass'");
				$consulta ->execute();
				$linhas = $consulta -> rowCount();

				foreach ($consulta as $mostra) {
					$nome = addslashes(strip_tags($mostra['nome_completo']));
					$nivel = addslashes(strip_tags($mostra['nivel']));				
				}
				if($linhas){
					echo "Logou!";
					$_SESSION['usuario'] = $nome;
					$_SESSION['nivel'] = $nivel;
					echo '<script>window.location="autenticar.php?nome_completo='.$nome.'&nivel='.$_SESSION['nivel'].'&usuario='.$_SESSION['usuario'].'"</script>';

				}else{
					echo "Não logou!";
					//session_destroy();
				}

			}

		 ?>
	</body>
</html>