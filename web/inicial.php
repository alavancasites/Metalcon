<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Metalcon sistemas estruturais</title>
<?php include("header.php"); ?>
<style type="text/css"><?php echo file_get_contents ('css/slick.css');?></style>
</head>
<body class="inicial">
  <header>
    <div id="topo"><?php include("topo.php"); ?></div>
    <div class="clear"></div>
    <div id="banner"><?php include("banner_lista.php"); ?></div>
  </header>
  <section id="novidades">
    <div class="container">
      <div class="colunas col-10 titulos"><h2>Dia a Dia</h2></div>
      <div class="colunas col-10 botao"><a href="novidades">VEJA TODAS AS NOVIDADES</a></div>
      <div class="clear"></div>
      <div>
        <?php
        $criteria = new CDbCriteria();
        $criteria->order = 'idnovidade desc';
        $criteria->addCondition("ativo = 1");
        $criteria->addCondition("imagem <> '' ");
        $novidades = Novidade::model()->findAll($criteria);
        foreach($novidades as $novidade) {
        ?>
          <div class="colunas col-5 novidades_lista">
            <div><a href="novidade/<?=$novidade->idnovidade?>/<?=Util::removerAcentos($novidade->titulo)?>"><img src="extranet/uploads/Novidade/<?=$novidade->imagem?>" width="280" height="200" class="imgfull rollover" alt="<?=$novidade->titulo?>"/></a></div>
            <div class="box">
              <div class="categoria"><?=$novidade->categoria?></div>
              <div class="titulos"><h3><a href="novidade/<?=$novidade->idnovidade?>/<?=Util::removerAcentos($novidade->titulo)?>"><?=$novidade->titulo?></a></h3></div>
            </div>
          </div>
        <?
          }
        ?>      
        <div class="clear"></div>
      </div>
    </div>
  </section>
  <footer><?php include("rodape.php"); ?></footer>
<?php include("scripts.php"); ?>
<script type="text/javascript" src="gzip/gzip.php?arquivo=../jquery/jquery.slick.min.js&amp;cid=<?=$cid?>"></script> 
<script type="text/javascript">
$(document).ready( function(){
	$('#banner').slick({
	  dots: true,arrows: false,infinite: true,speed: 300,slidesToShow: 1,slidesToScroll: 1,autoplay:true,fade: false,
	});
});
</script>
</body>
</html>