<?php
if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'index')){
	$this->breadcrumbs[$model->label(2)] = array('index');
}
else{
	$this->breadcrumbs[] = $model->label(2);
}
if($this->hasRel()){
	$this->breadcrumbs[$model->label(2)] = array('rel'=>$this->getRel());
}
$this->breadcrumbs[] = Yii::t('app','Visualizar');
?><div class="row-fluid">
  <div class="span12">
      <div class="w-box">
          <div class="w-box-header">
            <h4>Visualizar</h4>
          </div>
          <div class="w-box-content">
          
		  <? 
          $this->renderPartial("//layouts/sucesso",array(
              'success' => $_GET['success'],
          ));
          ?>      
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('ip'));?></dt>
            <dd><?=Util::formataTexto($model->ip)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('data'));?></dt>
            <dd><?=Util::formataTexto($model->data)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('nome'));?></dt>
            <dd><?=Util::formataTexto($model->nome)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('email'));?></dt>
            <dd><?=Util::formataTexto($model->email)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('assunto'));?></dt>
            <dd><?=Util::formataTexto($model->assunto)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('telefone'));?></dt>
            <dd><?=Util::formataTexto($model->telefone)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('mensagem'));?></dt>
            <dd><?=$model->mensagem?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('ativo'));?></dt>
            <dd><?=Util::formataTexto($model->ativo ? 'Sim' : 'Não')?></dd>
          </dl>
        </div>
     
     
     
     
         <div class="formSep">
              <dl class="dl-horizontal">
                  <dt>&nbsp;</dt>
                  <dd>
                  	<?
                    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'update')){
                        ?>
                        <a class="btn" href="<?php echo $this->createUrlRel('update',array('id'=>$model->idcontato));?>"><i class="icon-edit "></i> Editar</a>
                        <?
                    }
                    ?>          
                    <?
                    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'index')){
                        ?>
                        <a class="btn" href="<?php echo $this->createUrlRel('index');?>"><i class="icon-chevron-left"></i> Voltar</a>
                        <?
                    }
                    ?>
                    <?
                    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'delete')){
                        ?>
                        <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idcontato));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
                        <?
                    }
                    ?>           
                  </dd>
               </dl>
           </div>
          
		</div>
      </div>
  </div>
</div>