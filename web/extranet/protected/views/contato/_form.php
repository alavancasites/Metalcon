<div class="form">
	
	<?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'contato-form',
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
          <dt><?php echo $form->labelEx($model,'ip',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'ip', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'data',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php $this->widget('CJuiDateTimePicker',array(
					'model'=>$model, //Model object
					'attribute'=>'data', //attribute name
					'language' => 'pt',
					'mode'=>'datetime', //use 'time','date' or 'datetime' (default)
					'options'=>array(
						'readonly' => 'readonly',
						'changeYear' => true,
						'changeMonth' => true,
					)
				)
			); ?>                 
		 	 
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
          <dt><?php echo $form->labelEx($model,'assunto',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'assunto', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'telefone',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'telefone', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'mensagem',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->editorBox($model,'mensagem','100%',500); ; ?>                 
		 	 
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
                <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idcontato));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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