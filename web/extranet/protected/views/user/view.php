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
            <dt><?=Util::formataTexto($model->getAttributeLabel('idUserGroup'));?></dt>
            <dd><?=($model->group !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->group)), array('userGroup/view', 'id' => GxActiveRecord::extractPkValue($model->group, true)),array('class' => 'relational-link')) : null)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('createDate'));?></dt>
            <dd><?=Util::formataTexto($model->createDate)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('updateDate'));?></dt>
            <dd><?=Util::formataTexto($model->updateDate)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('firstName'));?></dt>
            <dd><?=Util::formataTexto($model->firstName)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('lastName'));?></dt>
            <dd><?=Util::formataTexto($model->lastName)?></dd>
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
            <dt><?=Util::formataTexto($model->getAttributeLabel('password'));?></dt>
            <dd><i>Senha criptografada</i></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('active'));?></dt>
            <dd><?=Util::formataTexto($model->active ? 'Sim' : 'Não')?></dd>
          </dl>
        </div>
     
     


     
     
         <div class="formSep">
              <dl class="dl-horizontal">
                  <dt>&nbsp;</dt>
                  <dd>
                  	<?
                    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'update')){
                        ?>
                        <a class="btn" href="<?php echo $this->createUrlRel('update',array('id'=>$model->idUser));?>"><i class="icon-edit "></i> Editar</a>
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
                        <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idUser));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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