<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<table class="table">
<?php
$conexao = mysqli_connect('192.168.15.187:3306','microcamp','123');
$banco = mysqli_select_db($conexao,'bd_cadastro');
mysqli_set_charset($conexao,'utf8');
$sql = mysqli_query($conexao,"select * from tb_pessoas") or die("Erro");
?>
<th>ID </th>
<th>NOME </th>
<th>SOBRENOME </th>
<th>TELEFONE </th>
<th>E-MAIL </th>
<?php
while($dados=mysqli_fetch_assoc($sql))
{
?>

<tr>
	<td><?php echo $dados['ID'] ?></td>
	<td><?php echo $dados['NOME'] ?> </td>
	<td><?php echo $dados['SOBRENOME'] ?> </td>
	<td><?php echo $dados['TELEFONE'] ?> </td>
	<td><?php echo $dados['EMAIL'] ?> </td>
<?php
}
?>
</table>