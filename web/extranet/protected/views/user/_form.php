<div class="form">
	
	<?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'user-form',
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

        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'idUserGroup',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->dropDownList($model, 'idUserGroup', GxHtml::listDataEx(UserGroup::model()->findAllAttributes(null, true)), array('class' => 'input-xxlarge','empty'=>'Selecione...')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->

    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'firstName',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'firstName', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'lastName',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'lastName', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'email', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'password',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->passwordField($model, 'password', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
    
        <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'password_confirm',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->passwordField($model, 'password_confirm', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
    
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'active',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->checkBox($model, 'active'); ?>                 
		 	 
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
                <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idUser));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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