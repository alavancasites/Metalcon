<div class="form">

	<?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'modulo-categoria-form',
        'enableAjaxValidation' => false,
        'htmlOptions'=> array (
            'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data',
			'action' => $this->createUrlRel($this->action->id),
        )
    ));
    ?>

	<?
    $this->renderPartial("//layouts/erros",array(
        'model' => $model,
    ));
    ?>

	<?php
	if (!is_numeric($model->posicao)) {
		echo $form->hiddenField($model, 'posicao', array('value' => $model->getLast()));
	} else {
		echo $form->hiddenField($model, 'posicao', array('value' => $model->posicao));
	}
	?>

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'idmodulo',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->dropDownList($model, 'idmodulo', GxHtml::listDataEx(Modulo::model()->findAllAttributes(null, true)), array('class' => 'input-xxlarge','empty'=>'Selecione...')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'nome',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'nome', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->



    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'icone',array('class'=>'control-label')); ?>
</dt>
          <dd>
			  <?php $this->widget('application.extensions.Plupload.PluploadWidget', array(
				'model' => $model,
				'attribute' => 'icone',
				//'return_size' => 250 //default = 200;
			  )); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'descricao',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->editorBox($model,'descricao','100%',500); ; ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->



    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'ativo',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->checkBox($model, 'ativo'); ?>

      	</dd>
       </dl>
    </div>
    <!-- row -->



   <div class="formSep">
      <dl class="dl-horizontal">
          <dt>&nbsp;</dt>
          <dd>

          <button type="submit" class="btn">
            <?
            if($this->action->id == 'create'){
                ?>
                <i class="icon-plus"></i>&nbsp;Cadastrar
                <?
            }
            else{
                ?>
                <i class="icon-pencil"></i>&nbsp;Atualizar
                <?
            }
            ?>
          </button>
			<?
            if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'index')){
                ?>
                <a class="btn" href="<?php echo $this->createUrlRel('index');?>"><i class="icon-chevron-left"></i> Voltar</a>
                <?
            }
            ?>
            <?
            if($this->action->id == 'update' && Yii::app()->user->obj->group->temPermissaoAction($this->id,'delete')){
                ?>
                <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idcategoria));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
                <?
            }
            ?>
        </dd>
       </dl>
   </div>


    <?
	$this->endWidget();
	?>

</div>
<!-- form -->
