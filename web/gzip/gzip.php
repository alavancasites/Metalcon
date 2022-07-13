<?
/*********************************************************
*Controle de versão: 1.0
*********************************************************/
$file = $_GET["arquivo"];
$last_modified_time = filemtime($file);
$ext = substr($file,strrpos($file, ".")+1,strlen($file));

$expira_em = 24*8;

ob_start ("ob_gzhandler");
if($ext=="js" || $ext=="css") {
	if($ext=="js") $ext="javascript";
	header( "Content-type: text/".$ext."; charset:iso-8859-1");
	header( "Content-Encoding: gzip,deflate");
	header( "Expires: ".gmdate("D, d M Y H:i:s", time() + ($expira_em*3600)) . " GMT");
	header("Last-Modified: ".gmdate("D, d M Y H:i:s", $last_modified_time)." GMT 0300");
	header( "ETag: ".md5_file($file));
	header( "Cache-Control: must-revalidate, proxy-revalidate");
	include($file);
}
ob_flush();

?>