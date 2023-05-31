<?php
require_once 'cabecalho.php';
require_once './persistence/ClientePA.php';

if(!isset($_POST['inicio'])){
	$inicio=1;
	$fim=5;
}else{
	$inicio=$_POST['inicio'];
	$fim=$inicio+4;
}

$clientePA=new ClientePA(); 
$consulta=$clientePA->listar($inicio,$fim);
if(!$consulta){
	echo "<h2>Não há clientes para mostrar!</h2>";
}else{

	echo "<table>";
	echo "<tr>";
	echo "<th>Id</th>";
	echo "<th>CPF</th>";
	echo "<th>Nome</th>";
	echo "<th>Nascimento</th>";
	echo "<th>Telefone</th>";
	echo "<th>Rua</th>";
	echo "<th>Bairro</th>";
	echo "<th>Cidade</th>"; 
	echo "<th>Estado</th>";
	echo "<th>Email</th>";
	echo "</tr>";

	while($linha=$consulta->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$linha['id']."</td>";
		echo "<td>".$linha['cpf']."</td>";
		echo "<td>".$linha['nome']."</td>";
		echo "<td>".$linha['nascimento']."</td>";
		echo "<td>".$linha['telefone']."</td>";
		echo "<td>".$linha['rua']."</td>";
		echo "<td>".$linha['bairro']."</td>";
		echo "<td>".$linha['cidade']."</td>";
		echo "<td>".$linha['estado']."</td>";
		echo "<td>".$linha['email']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	$ultimo=$clientePA->retornaId();
	if($inicio>5){
		$inicio-=5;
		echo "<form class='minibotao' action='/petshop/listar/cliente' method='POST'>";
		echo "<input type='hidden' name='inicio' value='$inicio'>";
		echo "<input type='submit' value='&larr;'>";
		echo "</form>";
	}
	if($fim<$ultimo){
		if($fim==5){
			$inicio+=5;
		}else{
			$inicio+=10;
		}
		echo "<form class='minibotao' action='/petshop/listar/cliente' method='POST'>";
		echo "<input type='hidden' name='inicio' value='$inicio'>";
		echo "<input type='submit' value='&rarr;'>";
		echo "</form>";
	}

}
?>
</body>
</html>