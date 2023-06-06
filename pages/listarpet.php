<?php
require_once 'cabecalho.php';
require_once './persistence/PetPA.php';


if(!isset($_POST['inicio'])){
	$inicio=1;
	$fim=5;
}else{
	$inicio=$_POST['inicio'];
	$fim=$inicio+4;
}

$petPA=new PetPA();
$consulta=$petPA->listar($inicio,$fim);
if (!$consulta) {
	echo "<h2>Não há pets cadastrados!</h2>";
}else{

	echo "<table>";
	echo "<tr>";
	echo "<th>Id</th>";
	echo "<th>Cliente</th>";
	echo "<th>Nome</th>";
	echo "<th>Nascimento</th>";
	echo "<th>Pelagem</th>";
	echo "<th>Imagem</th>";
	echo "</tr>";

	require_once './persistence/ClientePA.php';
	$clientePA=new ClientePA();
	while($linha=$consulta->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$linha['id']."</td>";
		$cliente=$clientePA->converteId($linha['cliente']);
		$cliente=$cliente->fetch_assoc();
		echo "<td>".$cliente['nome']."</td>";
		echo "<td>".$linha['nome']."</td>";
		echo "<td>".$linha['nascimento']."</td>";
		echo "<td><input type='color' value='".$linha['pelagem']."' readonly></td>";
		echo "<td><img src='data:image/jpeg;base64,".base64_encode($linha['imagem'])."' class='foto'></td>";
		echo "</tr>";
	}
	echo "</table>";
	$ultimo=$petPA->retornaId();
	if($inicio>5){
		$inicio-=5;
		echo "<form class='minibotao' action='/petshop/listar/pet' method='POST'>";
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
		echo "<form class='minibotao' action='/petshop/listar/pet' method='POST'>";
		echo "<input type='hidden' name='inicio' value='$inicio'>";
		echo "<input type='submit' value='&rarr;'>";
		echo "</form>";
	}
}


?>