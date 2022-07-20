<?php
function readfile_chunked($filename,$retbytes=true) {
	$chunksize = 1*(1024*1024); // how many bytes per chunk
	$buffer = '';
	$cnt =0;
	$handle = fopen($filename, 'rb');
	if ($handle === false) {
		return false;
	}
	while (!feof($handle)) {
		$buffer = fread($handle, $chunksize);
		echo $buffer;
		ob_flush();
		flush();
		if ($retbytes) {
			$cnt += strlen($buffer);
		}
	}
	$status = fclose($handle);
	if ($retbytes && $status) {
		return $cnt; // return num. bytes delivered like readfile() does.
	}
	return $status;
}
ob_clean();
ob_start();
$erro_ret = '<h2><i class="fa fa-paperclip"></i>  Não foi possivel baixar o arquivo!</h2><h4>Link de download inválido</h4>';
$erro = true;
$diretorio = '';
$arquivo = 'vazio';

$dir = 'extranet/uploads/ModuloArquivo';
$model_obj = ModuloArquivo::model()->findByPk($_GET['id']);
if(is_object($model_obj)){
	$arquivo = $model_obj->arquivo;
	$diretorio = $dir.'/';
}

if(is_file($diretorio.$arquivo)){

	$file_extension = end(explode('.',$arquivo));

	switch( $file_extension ){
		case "pdf":  $ctype="application/pdf"; break;
		case "exe	": $ctype="application/octet-stream"; break;
		case "zip":  $ctype="application/zip"; break;
		case "rar":  $ctype="application/rar"; break;
		case "doc":  $ctype="application/msword"; break;
		case "docx": $ctype="application/msword"; break;
		case "xls":  $ctype="application/vnd.ms-excel"; break;
		case "xlsx": $ctype="application/vnd.ms-excel"; break;
		case "ppt":  $ctype="application/vnd.ms-powerpoint"; break;
		case "pptx": $ctype="application/vnd.ms-powerpoint"; break;
		case "gif":  $ctype="image/gif"; break;
		case "png":  $ctype="image/png"; break;
		case "jpg":  $ctype="image/jpg"; break;
		default:     $ctype="application/force-download";
	}

	header("Pragma: public"); // required
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false); // required for certain browsers
	header("Content-Type: $ctype");
	// change, added quotes to allow spaces in filenames, by Rajkumar Singh
	header("Content-Disposition: attachment; filename=\"".$arquivo."\";" );
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".filesize($diretorio.$arquivo));
	readfile_chunked($diretorio.$arquivo);
}else{

	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
	<head profile="http://gmpg.org/xfn/11">
	    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	    <title>Download - Metalcon sistemas estruturais</title>
	    <?php include("header.php"); ?>
	</head>
	<body class="modulos">
	    <header>
	        <div id="topo"><?php include("topo.php"); ?></div>
	        <div class="clear"></div>
	        <div class="caminho"><div class="container"><a href="inicial">Home</a> Download</div></div>
	    </header>
	    <section class="conteudo">
	        <div class="container">
	            <?php echo $erro_ret ?>
	        </div>
	    </section>
	    <footer><?php include("rodape.php"); ?></footer>
	    <?php include("scripts.php"); ?>

	</body>
	</html>



	<?
}
ob_end_flush();
?>
