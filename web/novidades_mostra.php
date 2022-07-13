<?
$novidade = Novidade::model()->findByPk($_GET['novidade'],array('condition' => "ativo = '1'")); 
if(!is_object($novidade)){
	echo "Página inexistente!"; exit; 
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Metalcon sistemas estruturais</title>
<?php include("header.php"); ?>
<style type="text/css"><?php echo file_get_contents ('css/fancybox.css');?></style>
</head>
<body>
  <header>
    <div id="topo"><?php include("topo.php"); ?></div>
    <div class="clear"></div>
    <div class="caminho"><div class="container"><a href="inicial">Home</a><a href="novidades">Dia a dia</a><?=($novidade->titulo)?></div></div>
  </header>
  <section class="conteudo interna">
    <div class="container">
      <div class="colunas col-20">
        <h2><?=($novidade->titulo)?></h2>
        <div><img src="extranet/uploads/Novidade/<?=($novidade->imagem)?>" width="280" height="200" class="imgfull" alt=<?=($novidade->titulo)?>""/></div>
        <div class="txt"><?=($novidade->texto)?></div>
        <h3>Galeria de fotos</h3>
      </div>
      <?
        $fotos = $novidade->galeria->getGallery()->galleryPhotos; 
        if(is_array($fotos)){
          $total = count($fotos);
          if ($total>0){
      ?>      
        <div class="galeria">
          <?
            foreach($fotos as $i => $foto){
          ?>
            <div class="colunas col-5"><a href="extranet/gallery/<?=$foto->id?>.jpg" data-fancybox="images"><img src="extranet/gallery/<?=$foto->id?>.jpg" width="280" height="200" alt="<?=($novidade->titulo)?>" class="imgfull rollover"/></a></div>
          <?
            }
          ?>
        </div>
      <?
          }
        }
      ?>      
      <div class="clear"></div>
    </div>
  </section>
  <footer><?php include("rodape.php"); ?></footer>
<?php include("scripts.php"); ?>
<script type="text/javascript" src="gzip/gzip.php?arquivo=../jquery/jquery.fancybox.min.js&amp;cid=<?=$cid?>"></script>
<script type="text/javascript">$(document).ready( function(){  $('[data-fancybox]').fancybox({});});</script>
</body>
</html>