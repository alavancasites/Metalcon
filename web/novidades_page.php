<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Metalcon sistemas estruturais</title>
<?php include("header.php"); ?>
</head>
<body>
  <header>
    <div id="topo"><?php include("topo.php"); ?></div>
    <div class="clear"></div>
    <div class="caminho"><div class="container"><a href="inicial">Home</a>Dia a dia</div></div>
  </header>
  <section class="conteudo novidades">
    <div class="container">
      <div class="titulos"><h2>Dia a Dia</h2></div>
      <div>
        <?
          for ($i=0; $i<12; $i++){
        ?>
          <div class="colunas col-5 novidades_lista">
            <div><a href="novidades_mostra.php"><img src="img/_del/novidades.png" width="280" height="200" class="imgfull rollover" alt=""/></a></div>
            <div class="box">
              <div class="categoria">Informações gerais</div>
              <div class="titulos"><h3><a href="novidades_mostra.php">Recadastramento de CPF em andamento no RH</a></h3></div>
            </div>
          </div>
        <?
          }
        ?>      
        <div class="clear"></div>
      </div>
      <div class="paginacao"><a href="#" class="ativado">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a></div>
    </div>
  </section>
  <footer><?php include("rodape.php"); ?></footer>
<?php include("scripts.php"); ?>
</body>
</html>