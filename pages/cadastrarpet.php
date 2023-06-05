<?php
require_once 'cabecalho.php';
?>
<form action="/petshop/cadastrar/pet" method="POST" enctype="multipart/form-data">
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
	if(isset($_POST['botao'])){
		require_once './model/Pet.php';
		require_once './persistence/PetPA.php';
		$pet=new Pet();
		$petPA=new PetPA();
		$id=$petPA->retornaId();
		if(!$id){
			$id=0;
		}
		$id++;
		$pet->setId($id);
		$pet->setNome($_POST['nome']);
		$pet->setNascimento($_POST['nascimento']);
		$pet->setPelagem($_POST['pelagem']);
		require_once './model/Cliente.php';
		$cliente=new Cliente();
		$cliente->setId($_POST['cliente']);
		$imagem=addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
		$pet->setImagem($imagem);
		$pet->setCliente($cliente->getId());
		$resp=$petPA->cadastrar($pet);
		if (!$resp) {
			echo "<h2>Erro na tentativa de cadastrar PET!</h2>";
		}else{
			echo "<h2>PET cadastrado com sucesso!</h2>";
		}
	}
?>
</body>
</html>