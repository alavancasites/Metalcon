<div class="form">
	
	<?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'novidade-form',
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
          <dt><?php echo $form->labelEx($model,'categoria_idcategoria',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->dropDownList($model, 'categoria_idcategoria', GxHtml::listDataEx(Categoria::model()->findAllAttributes(null, true)), array('class' => 'input-xxlarge','empty'=>'Selecione...')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'titulo',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->textField($model, 'titulo', array('maxlength' => 100,'class' => 'input-xxlarge')); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'texto',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php echo $form->editorBox($model,'texto','100%',500); ; ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'imagem',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php $this->widget('application.extensions.Plupload.PluploadWidget', array(
			'model' => $model,
			'attribute' => 'imagem',
		  )); ?>                 
		 	 
      	</dd>
       </dl>
    </div>
    <!-- row -->
        	    
    <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'gallery_id',array('class'=>'control-label')); ?>
</dt>
          <dd>
		  	<?php $this->widget('GalleryManager', array(
				  'gallery' => $model->galeria->getGallery(),
				  'controllerRoute' => 'gallery',
				));
				echo $form->hiddenField($model, 'gallery_id'); ?>                 
		 	 
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
                <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idnovidade));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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