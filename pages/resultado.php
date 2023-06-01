<?php
require_once 'cabecalho.php';

if(isset($_POST['botao'])&&isset($_POST['busca'])){
	$busca=$_POST['busca'];
	$tipo=$_POST['tipo'];
	require_once './persistence/UsuarioPA.php';
	$usuarioPA=new UsuarioPA();
	$tipo_usu=$usuarioPA->retornaTipo($_COOKIE['usuario']);
	if ($tipo=="cliente") {
		require_once './model/Cliente.php';
		require_once './persistence/ClientePA.php';
		$cliente=new Cliente();
		$clientePA=new ClientePA();
		$consulta=$clientePA->buscar($busca);
		if(!$consulta){
			echo "<h2>Nenhum Cliente correspondente!</h2>";
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
			if($tipo_usu!=3){
				echo "<th>Alterar?</th>";
				echo "<th>Excluir?</th>";
			}
			echo "</tr>";

			while ($linha=$consulta->fetch_assoc()) {
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
				if ($tipo_usu!=3) {
					echo "<td>";
					$cliente->setId($linha['id']);
					echo "<form action='/petshop/alterar' method='POST' class='minibotao'>";
					echo "<input type='hidden' name='alterar' value='".$cliente->getId()."'>";
					echo "<input type='submit' name='botao' value='alterar'></form></td>";
					echo "<td><form action='/petshop/alterar' method='POST' class='minibotao'>";
					echo "<input type='hidden' name='excluir' value='".$cliente->getId()."'>";
					echo "<input type='submit' name='botao' value='excluir'></form>";
					echo "<td>";
				}
				echo "</tr>";
			}
			echo "</table>";     
		}

	}//pet

}
?>
</body>
</html>