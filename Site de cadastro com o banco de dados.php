<?php
require_once("strap.php")
?>
<!DOCTYPE html>
<html>
<head>
	<title>Site de Cadastro</title>
</head>
<style type="text/css">
	body {
			background: black;
		  	color: red;
			}
</style>
<body><center>
	<b><h1>Cadastro</h1></b>
	<h2>Insira os seus dados abaixo para a criação da sua conta</h2>
	<form action="" method="post">
		<table>
			<tr>
				<b><td>Digite seu nome</td></b>
				<td><input type="text" name="Nome" required></td><br>
			</tr>
			<tr>
				<b><td>Digite seu E-mail</td></b>
				<td><input type="email" name="E-mail" required></td><br>
			</tr>
			<tr>
				<b><td>Digite sua senha</td></b>
				<td><input type="password" name="Senha" required></td><br>
			</tr>
			<tr>
				<b><td>Confirme a senha</td></b>
				<td><input type="password" name="Senha2" required></td><br>
			</tr>
		</table>
				<print></print><br>
				<center><td><button type="submit">Enviar dados</button></td></center>
	</form>
</center></body>
</html>

<?php
if($_POST){

$nome = $_POST['Nome'];
htmlspecialchars($nome, ENT_QUOTES);
$email = $_POST['E-mail'];
htmlspecialchars($email, ENT_QUOTES);
$senha = $_POST['Senha'];
htmlspecialchars($senha, ENT_QUOTES);
$senha2 = $_POST['Senha2'];
htmlspecialchars($senha2, ENT_QUOTES);

$senhacrip = hash('sha256', $senha2);

date_default_timezone_set('Brazil/East');

$data = date("Y-m-d H:i:s");

$verificaçao = mysqli_query($conect, "SELECT * FROM usuários WHERE Nome='$nome'");
$verificaçao = mysqli_num_rows($verificaçao);

	if($verificaçao == true){
		echo "<script>window.alert('O nome de usuário inserido já tem dono');</script>";
		return false;
	}

$verificaçao2 = mysqli_query($conect, "SELECT * FROM usuários WHERE `E-mail`='$email'");
$verificaçao2 = mysqli_num_rows($verificaçao2);

	if($verificaçao2 == true){

		echo "<script>window.alert('O E-mail inserido já tem dono');</script>";
		return false;
	}

	if($senha != $senha2){

		echo "<script>window.alert('As senhas não coincidem');</script>";
		return false;
	}

	if(empty($nome)){

		echo "<script>window.alert('O nome de usuário é obrigatório');</script>";
		return false;
	}

	if(empty($email)){

		echo "<script>window.alert('O E-mail é obrigatório');</script>";
		return false;
	}

	if(empty($senha) and empty($senha2)){

		echo "<script>window.alert('É necessário ter uma senha');</script>";
		return false;
	}

	if(strlen($senha) < 6 and strlen($senha2) < 6){

		echo "<script>window.alert('As senhas devem ter no mínimo 6 caracteres');</script>";
		return false;
	}

$sql = mysqli_query($conect, "INSERT INTO `usuários`(`Nome`, `E-mail`, `Senha`, `Data`) VALUES('$nome', '$email', '$senhacrip', '$data')");

	if($sql == true){

		echo "<center>Cadastro concluido!</center>";
	}
}
?>
