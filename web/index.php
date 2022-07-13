<?php 
ini_set ("default_charset","");
include("gzip/gzipHTML.php");
include_once("extranet/autoload.php");
include_once("RequestManager.php");
$rotas = array(
	'/login'=> 'login.php',
	'/esqueci-minha-senha'=> 'esqueci_senha.php',
  /*PARA TESTES*/
  '/administrativo'=> 'modulo.php',
  '/treinamento'=> 'modulo_lista.php',
  '/download'=> 'modulo_arquivos.php',
  /*FIM  TESTES*/
  '/ouvidoria'=> 'ouvidoria_page.php',
  '/meus-dados'=> 'meus_dados.php',
  '/novidades'=> 'novidades_page.php',
	'/novidade/(?P<novidade>\S+)/(?P<titulo>\S+)'=>'novidades_mostra.php',
  '/'=>'inicial.php',
	'/inicial'=>'inicial.php',
	'/inicial/(?P<acesso>\w+)'=>'inicial.php',
	'/index'=>'inicial.php',
	'/inicial'=>'inicial.php',
	'/(?P<url>\S+)'=>'inicial.php',
);
$request_manager = new RequestManager();
$request_manager->run($rotas);
exit;