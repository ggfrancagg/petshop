<?php
require_once 'cabecalho.php';

require_once './persistence/UsuarioPA.php';
$usuarioPA=new UsuarioPA();
$tipo=$usuarioPA->retornaTipo($_COOKIE['usuario']);
if (!$tipo) {
	echo "<h2>Tente logar novamente!</h2>";
	echo "<a href='/login'>Login</a>";
}else{
	if ($tipo==1) {//admin
?>
	<div id="topo">
		<div id="logo">
			<img src="/petshop/img/pets.png">
		</div>
		<div id="menu">
			<ul class="nav">
				<li>Cadastrar
					<ol>
						<li><a href="/petshop/cadastrar/cliente" target="janela">Cliente</a></li>
						<li><a href="/petshop/cadastrar/pet" target="janela">Pet</a></li>
						<li><a href="/petshop/usuario/cadastrar" target="janela">Usuário</a></li>
						<li><a href="/petshop/cadastrar/servico" target="janela">Serviço</a></li>
					</ol>
				</li>
				<li>Listar
					<ol>
						<li><a href="/petshop/listar/cliente" target="janela">Cliente</a></li>
						<li><a href="/petshop/listar/pet" target="janela">Pet</a></li>
						<li><a href="/petshop/listar/servico" target="janela">Serviço</a></li>
						<li><a href="/petshop/usuario" target="janela">Usuário</a></li>
					</ol>
				</li>
				<li>Buscar
					<ol>
						<li><a href="/petshop/buscar" target="janela">Dados</a></li>
					</ol>
				</li>
				<li>Sair
					<ol>
						<li><a href="/petshop/logoff" target="janela">Logoff</a></li>
					</ol>
				</li>
			</ul>
		</div>
	</div>
	<div id="principal">
		<iframe name="janela" id="janela"></iframe>
	</div>
<?php
	}else if($tipo==2){//funcionário
?>
<div id="topo">
		<div id="logo">
			<img src="/petshop/img/pets.png">
		</div>
		<div id="menu">
			<ul class="nav">
				<li>Cadastrar
					<ol>
						<li><a href="/petshop/cadastrar/cliente" target="janela">Cliente</a></li>
						<li><a href="/petshop/cadastrar/pet" target="janela">Pet</a></li>
						<li><a href="/petshop/cadastrar/servico" target="janela">Serviço</a></li>
					</ol>
				</li>
				<li>Listar
					<ol>
						<li><a href="/petshop/listar/cliente" target="janela">Cliente</a></li>
						<li><a href="/petshop/listar/pet" target="janela">Pet</a></li>
						<li><a href="/petshop/listar/servico" target="janela">Serviço</a></li>
					</ol>
				</li>
				<li>Buscar
					<ol>
						<li><a href="/petshop/buscar" target="janela">Dados</a></li>
					</ol>
				</li>
				<li>Sair
					<ol>
						<li><a href="/petshop/logoff" target="janela">Logoff</a></li>
					</ol>
				</li>
			</ul>
		</div>
	</div>
	<div id="principal">
		<iframe name="janela" id="janela"></iframe>
	</div>
<?php
	}else{//cliente
?>
<div id="topo">
		<div id="logo">
			<img src="/petshop/img/pets.png">
		</div>
		<div id="menu">
			<ul class="nav">
				<li>Listar
					<ol>
						<li><a href="/petshop/listar/cliente" target="janela">Cliente</a></li>
						<li><a href="/petshop/listar/pet" target="janela">Pet</a></li>
						<li><a href="/petshop/listar/servico" target="janela">Serviço</a></li>
					</ol>
				</li>
				<li>Buscar
					<ol>
						<li><a href="/petshop/buscar" target="janela">Dados</a></li>
					</ol>
				</li>
				<li>Sair
					<ol>
						<li><a href="/petshop/logoff" target="janela">Logoff</a></li>
					</ol>
				</li>
			</ul>
		</div>
	</div>
	<div id="principal">
		<iframe name="janela" id="janela"></iframe>
	</div>
<?php 
	}
}
?>

</body>
</html>