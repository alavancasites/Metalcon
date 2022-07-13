<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ouvidoria - Metalcon sistemas estruturais</title>
<?php include("header.php"); ?>
</head>
<body class="ouvidoria">
  <header>
    <div id="topo"><?php include("topo.php"); ?></div>
    <div class="clear"></div>
    <div class="caminho"><div class="container"><a href="inicial">Home</a>Ouvidoria</div></div>
  </header>
  <section class="conteudo">
    <div class="container">
      <div class="colunas col-12 off-4">
        <div class="titulos"><h2>D&uacute;vidas, cr&iacute;ticas ou sugest&otilde;es?</h2></div>      
        <form id="form1" name="form1" method="post" action="">
          <select id="setor" name="setor" class="colunas col-6 alpha">
            <option value="selecione">Setor</option>
          </select>
          <?php /*?><?
            $array_assunto = array(
              'Dúvida' => 'Dúvida', 
              'Crítica' => 'Crítica', 
              'Sugestão' => 'Sugestão', 
            );
          ?>
          <?php echo CActiveForm::dropDownList($contato, 'assunto',$array_assunto,array('empty' => 'Assunto','class' => 'assunto'));  ?><?php */?>
          <select id="assunto" name="assunto" class="colunas col-6 omega">
            <option value="selecione">Assunto</option>
          </select>
          <textarea rows="6" cols="40" name="mensagem" id="mensagem" placeholder="Mensagem" class="colunas col-12 alpha omega"></textarea>
          <button name="enviar" type="submit" value="">ENVIAR MENSAGEM</button>
          <div class="clear"></div>
        </form>      
      </div>
      <div class="clear"></div>
    </div>
  </section>
  <footer><?php include("rodape.php"); ?></footer>
<?php include("scripts.php"); ?>

</body>
</html>