<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrativo - Metalcon sistemas estruturais</title>
<?php include("header.php"); ?>
</head>
<body class="modulos">
  <header>
    <div id="topo"><?php include("topo.php"); ?></div>
    <div class="clear"></div>
    <div class="caminho"><div class="container"><a href="inicial">Home</a>Administrativo</div></div>
  </header>
  <section class="conteudo">
    <div class="container">
      <div class="titulos"><h2>Administrativo</h2></div>
      <div class="areas">
        <?
          for ($i=0; $i<6; $i++){
        ?>
          <div class="colunas um-terco"><a href="treinamento" style="background-image: url(img/_del/icone.png)">Informativo</a></div>
        <?
          }
        ?>      
        <div class="clear"></div>
      </div>

    </div>
  </section>
  <footer><?php include("rodape.php"); ?></footer>
<?php include("scripts.php"); ?>

</body>
</html>