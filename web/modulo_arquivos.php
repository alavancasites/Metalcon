<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Treinamentos - Metalcon sistemas estruturais</title>
<?php include("header.php"); ?>
</head>
<body class="modulos">
  <header>
    <div id="topo"><?php include("topo.php"); ?></div>
    <div class="clear"></div>
    <div class="caminho"><div class="container"><a href="inicial">Home</a><a href="administrativo">Administrativo</a><a href="administrativo">Treinamentos</a>Treinamento 01</div></div>
  </header>
  <section class="conteudo">
    <div class="container">
      <div class="titulos"><h2>Treinamento 01</h2></div>
      <div class="mt80">
        <?
          for ($i=0; $i<10; $i++){
        ?>
          <div class="arquivos">
            <div class="infos">
              <div class="tit"><a href="#" target="_blank" rel="noopener">Lorem Ipsum is simply lorem Ipsum is simply</a></div>
              <div class="desc"><a href="#" target="_blank" rel="noopener">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem. Lorem Ipsum is simply dummy text of the.</a></div>
            </div>
            <div class="download"><a href="#" target="_blank" rel="noopener"><img src="img/download.png" width="31" height="31" alt=""/><span>Download</span></a></div>
            <div class="clear"></div>
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
</body>
</html>