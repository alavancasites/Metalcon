<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Meus dados - Metalcon sistemas estruturais</title>
<?php include("header.php"); ?>
</head>
<body class="dados">
  <header>
    <div id="topo"><?php include("topo.php"); ?></div>
    <div class="clear"></div>
    <div class="caminho"><div class="container"><a href="inicial">Home</a>Meus dados</div></div>
  </header>
  <section class="conteudo">
    <div class="container">
      <div class="colunas col-12 off-4">
        <div class="titulos"><h2>Meus dados</h2></div>      
        <form id="form1" name="form1" method="post" action="">
          <input name="email" type="text" id="email" placeholder="E-mail" class="colunas col-12 alpha omega" />
          <button name="enviar" type="submit" value="">ALTERAR MEU EM-MAIL</button>
          <div class="clear"></div>
        </form> 
        <div class="separador"></div>
        <div class="botao"><a href="esqueci-minha-senha">SOLICITAR NOVA SENHA</a></div>
      </div>
      <div class="clear"></div>
    </div>
  </section>
  <footer><?php include("rodape.php"); ?></footer>
<?php include("scripts.php"); ?>
</body>
</html>