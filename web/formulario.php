<form id="form1" name="form1" method="post" action="">
  <input name="email" type="text" id="email" placeholder="Nome" class="colunas col-10" />
  
  <div class="colunas col-10">
    <label for="email">E-mail:</label>
    <input type="text" name="email" id="email" class="email"/>
  </div>
  
  <select id="selecione_estado" name="selecione_estado" class="colunas col-10">
    <option value="selecione">Estado</option>
  </select>
  <select id="selecione_cidade" name="selecione_cidade" class="colunas col-10">
    <option value="selecione">Cidade</option>
  </select>
  
  <textarea rows="6" cols="40" name="mensagem" id="mensagem" placeholder="Mensagem" class="colunas col-15"></textarea>
  <button name="enviar" type="submit" value="">ENVIAR</button>
</form>
<?/*-----------------------------*/?>
<?
include_once("extranet/autoload.php");
$model = new Contato();
if(is_array($_POST['Contato'])){
	$model->attributes = $_POST['Contato'];
	$model->data = date('d/m/Y H:i:s');
	$model->ip = $_SERVER['REMOTE_ADDR'];
	
	if($model->save()){
		$model = new Contato();
		$sucesso = 1;
		header("Location: contato?sucesso=1");
	}
	
}
$erro = CHtml::errorSummary($model);
$form = new CActiveForm();
?>

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
<form id="form1" name="form1" method="post" action="contato">
  <input type="hidden"  name="grava" value="1" />
  <?php echo $form->textField($model,'nome',array('class'=>'colunas col-7 alpha','maxlength'=>100,'placeholder'=>$model->getAttributeLabel('nome'))); ?>
  <?php echo CActiveForm::dropDownList($model, 'idestado',CHtml::listData(Estado::model()->findAll(array('order' => 'nome')),'idestado','nome'),array('empty' => 'Estado','class' => 'estado colunas col-7 alpha'));  ?> 
  <?php echo CActiveForm::dropDownList($model, 'idcidade',CHtml::listData(Cidade::model()->findAll(array('order' => 'nome','condition' => "idestado = '".$model->idestado."'")),'idcidade','nome'),array('empty' => 'Cidade','class' => 'cidade colunas col-8 omega'));  ?> 
  <?php echo $form->textArea($model,'mensagem',array('rows'=>'6','cols'=>'40','placeholder'=>'Mensagem','class'=>'')); ?>
</form>
<?/*-----------------------------*/?>
  
  <?
include_once("extranet/autoload.php");
$model = new Contato();
$captcha = new Captcha();
$form = new CActiveForm();

if(isset($_POST["g-recaptcha-response"])){
	$captcha->response = $_POST["g-recaptcha-response"];
}
if(is_array($_POST['Contato'])){
	if($captcha->validate()){

		$model->attributes = $_POST['Contato'];
		$model->data = date('d/m/Y H:i:s');
		$model->ip = $_SERVER['REMOTE_ADDR'];

		if($model->save()){
			$model = new Contato();
			$sucesso = 1;
			header("Location: contato?sucesso=1");
		}

		$erro = CHtml::errorSummary($model);

	}else{
		$erro = '<div class="errorSummary">Falha na verificação de segurança, por favor, marque a opção "Não sou um robô"</div>';
	}
}
?>

<? /*Colocar antes do button*/?>
<? $captcha->create(); ?>