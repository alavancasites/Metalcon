<?php
$model = Usuario::model()->findByPk($_SESSION['colaborador_logado']['id']);
if(is_array($_POST['Usuario'])){
	$model->setAttributes($_POST['Usuario']);
	if($model->save()){
		Util::redirect("meus-dados?sucesso=1");
	}
    $erro = CHtml::errorSummary($model);
}

 ?>
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
        <?
          if(!empty($erro)){
        ?>
          <div class="error margin20"><?=$erro;?></div>
        <?
          }if($_GET['sucesso'] == 1){
        ?>
          <div class="sucesso_msg">Dados atualizados com sucesso. Obrigado!</div>
        <?
          }
        ?>
        <form id="form1" name="form1" method="post" action="meus-dados">
            <input name="Usuario[senha]" type="hidden" value=""/>
          <input name="nome" type="text" id="nome" readonly value="<?=$model->nome?>" class="colunas col-6 alpha margin20" />
          <input name="cpf" type="text" id="cpf" readonly value="<?=$model->cpf?>" class="colunas col-6 omega margin20" />
          <input name="Usuario[email]" type="text" id="email" value="<?=$model->email?>" placeholder="E-mail" class="colunas col-12 alpha omega margin20" />
          <input name="Usuario[telefone]" type="text" id="telefone" value="<?=$model->telefone?>" placeholder="Telefone" class="colunas col-12 alpha omega margin20" />
          <button name="enviar" type="submit" value="">ALTERAR</button>
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
