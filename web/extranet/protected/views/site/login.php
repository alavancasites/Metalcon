<div id="login-wrapper" class="login_popup clearfix">
  <div class="">
    <div class="panel">
      <div class="logo_cliente"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_cliente.png" alt=""/></div>
      <?php
      $form = $this->beginWidget( 'CActiveForm', array(
        'id' => 'login-form',
        'enableAjaxValidation' => true,
      ) );
      ?>
      <?php echo $form->textField($model, 'email',array('placeholder'=>'E-mail','class'=>'login_email')); ?> <?php echo $form->error($model, 'email'); ?> <?php echo $form->passwordField($model, 'senha',array('placeholder'=>'Senha','class'=>'login_senha')); ?> <?php echo $form->error($model, 'senha'); ?>
      <label for="login_remember" class="checkbox">
        <input type="checkbox" id="login_remember" name="login_remember" />
        Lembrar me</label>
      <div class="submit_sect">
        <button type="submit">LOGIN</button>
        <div class="infos"> D&uacute;vidas ou suporte <a href="mailto:atendimento@alavanca.digital">atendimento@alavanca.digital</a> <a href="http://www.alavanca.digital/" target="_blank">www.alavanca.digital</a> </div>
      </div>
      <?php $this->endWidget(); ?>
    </div>
  </div>
  <div class="login_links"> </div>
</div>
<?php
Yii::app()->clientScript->registerScriptFile( Yii::app()->baseUrl . '/js/login/login.js', CClientScript::POS_END );
Yii::app()->clientScript->registerCssFile( Yii::app()->baseUrl . '/css/login.css' );
?>
