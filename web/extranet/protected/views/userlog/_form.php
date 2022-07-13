<div class="form">
	
	<?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'user-log-form',
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
          <dt><?php echo $form->labelEx($model,'date',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php $this->widget('CJuiDateTimePicker',array(
					'model'=>$model, //Model object
					'attribute'=>'date', //attribute name
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
          <dt><?php echo $form->labelEx($model,'idUser',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'idUser', array('class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'userName',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'userName', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'userEmail',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'userEmail', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'controller',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'controller', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'action',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'action', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'get',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textArea($model, 'get',array('rows'=>'10','class'=>'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'post',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textArea($model, 'post',array('rows'=>'10','class'=>'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'accessStatus',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'accessStatus', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
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
                <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idUserLog));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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