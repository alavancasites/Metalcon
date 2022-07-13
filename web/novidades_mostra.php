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
    <div class="caminho"><div class="container"><a href="inicial">Home</a><a href="novidades">Dia a dia</a>What is Lorem Ipsum?</div></div>
  </header>
  <section class="conteudo interna">
    <div class="container">
      <div class="colunas col-20">
      <h2>What is Lorem Ipsum?</h2>
      <div><img src="img/_del/novidades.png" width="280" height="200" class="imgfull" alt=""/></div>
      <div class="txt">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>      
      </div>
      <h3>Galeria de fotos</h3>
      </div>
      <div class="galeria">
        <?
          for ($i=0; $i<10; $i++){
        ?>
          <div class="colunas col-5"><a href="img/_del/novidades.png" data-fancybox="images"><img src="img/_del/novidades.png" width="280" height="200" alt="" class="imgfull rollover"/></a></div>
        <?
          }
        ?>      
      </div>
      <div class="clear"></div>
    </div>
  </section>
  <footer><?php include("rodape.php"); ?></footer>
<?php include("scripts.php"); ?>
<script type="text/javascript" src="gzip/gzip.php?arquivo=../jquery/jquery.fancybox.min.js&amp;cid=<?=$cid?>"></script>
<script type="text/javascript">$(document).ready( function(){  $('[data-fancybox]').fancybox({});});</script>
</body>
</html>