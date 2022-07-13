<?php 
/*********************************************************
*Controle de versão: 1.0
*********************************************************/
ob_start ("ob_gzhandler");
date_default_timezone_set('America/Sao_Paulo');
header( "Content-type: text/html; charset:iso-8859-1");
header( "Content-Encoding: gzip,deflate");
ob_flush();
?>