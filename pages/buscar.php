<?php
require_once 'cabecalho.php';
?>
<form action="/petshop/buscar/resultado" method="POST">
	<h1>Buscar</h1>
	<p><input type="search" name="busca" size="50" required></p>
	<p><fieldset>
		<legend>É um</legend>
		<p><input type="radio" name="tipo" value="cliente" required>Cliente</p>
		<p><input type="radio" name="tipo" value="pet" required>Pet</p>
		<p><input type="radio" name="tipo" value="servico" required>Serviço</p>
	</fieldset></p>
	<p><input type="submit" name="botao" value="Buscar"></p>
</form>
</body>
</html>