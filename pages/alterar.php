<?php
require_once 'cabecalho.php';

if (isset($_POST['botao'])) {
	if (isset($_POST['alterar'])) {//alterar
		require_once './model/Cliente.php';
		require_once './persistence/ClientePA.php';
		$cliente=new Cliente();
		$clientePA=new ClientePA();
		$cliente->setId($_POST['alterar']);
		$consulta=$clientePA->retornaCliente($cliente->getId());
		if(!$consulta){
			echo "<h2>Esse cliente não existe!</h2>";
		}else{
			$linha=$consulta->fetch_assoc();
?>
<form action="/petshop/alterar/resultado" method="POST">
	<h1>Alterar Cliente</h1>
	<p>Cpf:<input type="text" name="cpf" size="11" maxlength="11" value="<?= $linha['cpf'] ?>"></p>
	<p>Nome:<input type="text" name="nome" size="35" maxlength="35" value="<?= $linha['nome'] ?>"></p>
	<p>Nascimento:<input type="date" name="nascimento" min="1960-01-01" max="<?= date("Y-m-d") ?>" value="<?= $linha['nascimento'] ?>"></p>
	<p>Telefone:<input type="text" name="telefone" size="14" maxlength="14" placeholder="(42)99988-9999" value="<?= $linha['telefone'] ?>"></p>
	<p>Rua:<input type="text" name="rua" size="40" maxlength="40" value="<?= $linha['rua'] ?>"></p>
	<p>Bairro:<input type="text" name="bairro" size="20" maxlength="20" value="<?= $linha['bairro'] ?>"></p>
	<p>Cidade:<input type="text" name="cidade" size="25" maxlength="25" value="<?= $linha['cidade'] ?>"></p>
	<p>Estado:<input type="text" name="estado" size="2" maxlength="2" value="<?= $linha['estado'] ?>"></p>
	<p>Email:<input type="email" name="email" value="<?= $linha['email'] ?>"></p>
	<input type="hidden" name="id" value="<?= $cliente->getId() ?>">
	<p><input type="submit" name="botao" value="Alterar"></p>
</form>
<?php

		}
	}
}
?>
</body>
</html>