<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Metalcon</title>
<?php include("header.php"); ?>
</head>
<body>
  <section id="login">
    <div><img src="img/login.png" width="318" height="59" alt="Metalcon"/></div>
    <div class="form_login">
      <form id="form1" name="form1" method="post" action="">
        <input name="cpf" type="text" id="cpf" placeholder="CPF" />
        <input name="senha" type="text" id="senha" placeholder="Senha" />
        <button name="enviar" type="submit" value="">ACESSAR</button>
      </form>    
    </div>
    <div class="separador"></div>
    <div class="form_esqueci">
      <form id="form1" name="form1" method="post" action="esqueci-minha-senha">
        <button name="enviar" type="submit" value="">SOLICITAR NOVA SENHA</button>
      </form>    
    </div>
  </section>
  <?php include("scripts.php"); ?>
</body>
</html>