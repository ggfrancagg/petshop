<?php
require_once 'cabecalho.php';
?>
<form action="/cadastrar/pet" method="POST" enctype="multipart/form-data">
	<h1>Cadastro de PET</h1>
	<p>Nome:<input type="text" name="nome" size="20" maxlength="20" pattern="[a-zA-Z0-9]{1,20}" required></p>
<?php
require_once './persistence/ClientePA.php';
$clientePA=new ClientePA();
$consulta=$clientePA->listarNomes();
if(!$consulta){
	echo "<h2>Cadastre Clientes primeiro!</h2>";
}else{
	echo "<select name='cliente' required>";
	while ($linha=$consulta->fetch_assoc()) {
		echo "<option value='".$clientePA->converteNome($linha['nome'])."'>".$linha['nome']."</option>";
	}
	echo "</select>";
?>
	<p>Nascimento:<input type="date" name="nascimento" min="1998-01-01" max="<?= date("Y-m-d") ?>" required></p>
	<p>Pelagem:<input type="color" name="pelagem" required></p>
	<p>Imagem:<input type="file" name="imagem" required></p>
	<p><input type="submit" name="botao" value="Cadastrar"></p>
<?php
}
?>
</form>
<?php


?>
</body>
</html>