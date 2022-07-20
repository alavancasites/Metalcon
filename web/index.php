<?php
session_start();
ini_set ("default_charset","");
include("gzip/gzipHTML.php");
include_once("extranet/autoload.php");
include_once("RequestManager.php");
$rotas = array(
	'/'=>'login.php',
	'/login'=> 'login.php',
	'/esqueci-minha-senha'=> 'esqueci_senha.php',
	'/ouvidoria'=> 'ouvidoria_page.php',
	'/meus-dados'=> 'meus_dados.php',
	'/novidades'=> 'novidades_page.php',
	'/novidade/(?P<novidade>\d+)/(?P<titulo>\S+)'=>'novidades_mostra.php',
	'/inicial'=>'inicial.php',
	'/download/(?P<id>\d+)'=>'file_download.php',
	'/(?P<modulo>\S+)/(?P<categoria>\S+)/(?P<subcategoria>\S+)'=>'modulo_arquivos.php',
	'/(?P<modulo>\S+)/(?P<categoria>\S+)'=>'modulo_lista.php',
	'/(?P<modulo>\S+)'=>'modulo_page.php',
);
$request_manager = new RequestManager();


$rotas_publica = array(
	'login',
	'esqueci-minha-senha',
	'sair',
);

$rota_active = $request_manager->getCurrentRoute();

if($rota_active=='sair'){
	session_destroy();
	if($_GET['erro']=='login'){
		$erro = '?erro=login';
	}
	Util::redirect('login'.$erro);
}

if(is_numeric($_SESSION['colaborador_logado']['id']) || in_array($rota_active, $rotas_publica)){
	$request_manager->run($rotas);
}
Util::redirect('login');
