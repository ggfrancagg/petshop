<?php

$request=$_SERVER['REQUEST_URI'];
$request=substr($request,8);

if(!isset($_COOKIE['usuario'])){
	echo "<h2>Você não está logado!</h2>";
	echo "<a href='/petshop/login'>Logar</a>";
}

if($request=='/login'){
	require 'pages/login.php';
}else{
	if(isset($_COOKIE['usuario'])){
		switch ($request) {
			case '/':
				require 'pages/home.php';
				break;
			case '/cadastrar/cliente':
				require 'pages/cadastrarcliente.php';
			break;
			case '/cadastrar/pet':
				require 'pages/cadastrarpet.php';
			break;
			case '/cadastrar/servico':
				require 'pages/cadastrarservico.php';
			break;
			case '/listar/cliente':
				require 'pages/listarcliente.php';
			break;
			case '/listar/pet':
				require 'pages/listarpet.php';
			break;
			case '/listar/servico':
				require 'pages/listarservico.php';
			break;
			case '/buscar':
				require 'pages/buscar.php';
			break;
			case '/buscar/resultado':
				require 'pages/resultado.php';
			break;
			case '/alterar':
				require 'pages/alterar.php';
			break;
			case '/alterar/resultado':
				require 'pages/confirmaalterar.php';
			break;
			case '/usuario':
				require 'pages/listarusuario.php';
			break;
			case '/usuario/cadastrar':
				require 'pages/cadastrarusuario.php';
			break;
			case '/usuario/alterar':
				require 'pages/alterarusuario.php';
			break;
			case '/logoff':
				require 'pages/logoff.php';
			break;
		}
	}
}

?>