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
						<li><a href="/petshop/cadastrar/cliente" target="janela" onclick="exibir()">Cliente</a></li>
						<li><a href="/petshop/cadastrar/pet" target="janela" onclick="exibir()">Pet</a></li>
						<li><a href="/petshop/usuario/cadastrar" target="janela" onclick="exibir()">Usuário</a></li>
						<li><a href="/petshop/cadastrar/servico" target="janela" onclick="exibir()">Serviço</a></li>
					</ol>
				</li>
				<li>Listar
					<ol>
						<li><a href="/petshop/listar/cliente" target="janela" onclick="exibir()">Cliente</a></li>
						<li><a href="/petshop/listar/pet" target="janela" onclick="exibir()">Pet</a></li>
						<li><a href="/petshop/listar/servico" target="janela" onclick="exibir()">Serviço</a></li>
						<li><a href="/petshop/usuario" target="janela" onclick="exibir()">Usuário</a></li>
					</ol>
				</li>
				<li>Buscar
					<ol>
						<li><a href="/petshop/buscar" target="janela" onclick="exibir()">Dados</a></li>
					</ol>
				</li>
				<li>Sair
					<ol>
						<li><a href="/petshop/logoff" target="janela" onclick="exibir()">Logoff</a></li>
					</ol>
				</li>
			</ul>
		</div>
	</div>
	<span class="exibe"></span>
	<div id="principal">
		<iframe name="janela" id="janela" onload="desaparecer()"></iframe>
	</div>
	<script src="/petshop/js/load.js" defer></script>
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
						<li><a href="/petshop/cadastrar/cliente" target="janela" onclick="exibir()">Cliente</a></li>
						<li><a href="/petshop/cadastrar/pet" target="janela" onclick="exibir()">Pet</a></li>
						<li><a href="/petshop/cadastrar/servico" target="janela" onclick="exibir()">Serviço</a></li>
					</ol>
				</li>
				<li>Listar
					<ol>
						<li><a href="/petshop/listar/cliente" target="janela" onclick="exibir()">Cliente</a></li>
						<li><a href="/petshop/listar/pet" target="janela" onclick="exibir()">Pet</a></li>
						<li><a href="/petshop/listar/servico" target="janela" onclick="exibir()">Serviço</a></li>
					</ol>
				</li>
				<li>Buscar
					<ol>
						<li><a href="/petshop/buscar" target="janela" onclick="exibir()">Dados</a></li>
					</ol>
				</li>
				<li>Sair
					<ol>
						<li><a href="/petshop/logoff" target="janela" onclick="exibir()">Logoff</a></li>
					</ol>
				</li>
			</ul>
		</div>
	</div>
	<span class="exibe" style="display:none">Carregando... Aguarde</span>
	<div id="principal">
		<iframe name="janela" id="janela" onload="desaparecer()"></iframe>
	</div>
	<script src="/petshop/js/load.js" defer></script>
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
						<li><a href="/petshop/listar/cliente" target="janela" onclick="exibir()">Cliente</a></li>
						<li><a href="/petshop/listar/pet" target="janela" onclick="exibir()">Pet</a></li>
						<li><a href="/petshop/listar/servico" target="janela" onclick="exibir()">Serviço</a></li>
					</ol>
				</li>
				<li>Buscar
					<ol>
						<li><a href="/petshop/buscar" target="janela" onclick="exibir()">Dados</a></li>
					</ol>
				</li>
				<li>Sair
					<ol>
						<li><a href="/petshop/logoff" target="janela" onclick="exibir()">Logoff</a></li>
					</ol>
				</li>
			</ul>
		</div>
	</div>
	<span class="exibe"></span>
	<div id="principal">
		<iframe name="janela" id="janela" onload="desaparecer()"></iframe>
	</div>
	<script src="/petshop/js/load.js" defer></script>
<?php 
	}
}
?>

</body>
</html>