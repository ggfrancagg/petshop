<?php
require_once 'cabecalho.php';

if (isset($_POST['botao'])&&isset($_POST['cpf'])) {
	require_once './model/Cliente.php';
	require_once './persistence/ClientePA.php';
	$cliente=new Cliente();
	$clientePA=new ClientePA();
	$cliente->setId($_POST['id']);
	$cliente->setCpf($_POST['cpf']);
	$cliente->setNome($_POST['nome']);
	$cliente->setTelefone($_POST['telefone']);
	$cliente->setRua($_POST['rua']);
	$cliente->setBairro($_POST['bairro']);
	$cliente->setCidade($_POST['cidade']);
	$cliente->setEstado($_POST['estado']);
	$cliente->setEmail($_POST['email']);
	$resp=$clientePA->alterar($cliente);
	if(!$resp){
		echo "<h2>Não foi possível alterar o Cliente!</h2>";
	}else{
		echo "<h2>Cliente alterado com sucesso!</h2>";
	}
}else if(isset($_POST['botaoexcluir'])){
	require_once './persistence/ClientePA.php';
	$clientePA=new ClientePA();
	$resp=$clientePA->deletar($_POST['id']);
	if(!$resp){
		echo "<h2>Erro na tentativa de excluir!</h2>";
	}else{
		echo "<h2>Cliente excluido com sucesso!</h2>";
	}
}
?>
</body>
</html>




