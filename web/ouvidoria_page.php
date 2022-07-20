<?
$model = new Ouvidoria();
if(is_array($_POST['Ouvidoria'])){
	$model->attributes = $_POST['Ouvidoria'];
	$model->data = date('d/m/Y H:i:s');
	$model->ip = $_SERVER['REMOTE_ADDR'];
	$model->nome = $_SESSION['colaborador_logado']['nome'];
	$model->cpf = $_SESSION['colaborador_logado']['cpf'];

	if($model->save()){
		Util::redirect("ouvidoria?sucesso=1");
	}

}
$erro = CHtml::errorSummary($model);
$form = new CActiveForm();
?>
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
        <?
          if(!empty($erro)){
        ?>
          <div class="error margin20"><?=$erro;?></div>
        <?
          }if($_GET['sucesso'] == 1){
        ?>
          <div class="sucesso_msg">Contato enviado com sucesso. Obrigado!</div>
        <?
          }
        ?>
        <form id="form1" name="form1" method="post" action="ouvidoria">
          <input type="hidden"  name="grava" value="1" />
          <?
		  $modulos = Modulo::model()->findAll(array('condition'=>'ativo = 1'));
            $array_setor = CHtml::listData($modulos, 'idmodulo', 'nome');
			
          ?>
          <?php echo CActiveForm::dropDownList($model, 'setor',$array_setor,array('empty' => 'Setor...','class' => 'colunas col-6 alpha'));  ?>
          <?
            $array_assunto = array(
              'Dúvida' => 'Dúvida',
              'Crítica' => 'Crítica',
              'Sugestão' => 'Sugestão',
            );
          ?>
          <?php echo CActiveForm::dropDownList($model, 'assunto',$array_assunto,array('empty' => 'Assunto...','class' => 'colunas col-6 omega'));  ?>
          <?php echo $form->textArea($model,'mensagem',array('rows'=>'6','cols'=>'40','placeholder'=>'Mensagem','class'=>'colunas col-12 alpha omega')); ?>
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
