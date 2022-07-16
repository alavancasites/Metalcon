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
            <dt><?=Util::formataTexto($model->getAttributeLabel('data'));?></dt>
            <dd><?=Util::formataTexto($model->data)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('idmodulo_subcategoria'));?></dt>
            <dd><?=($model->moduloSubcategoria !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->moduloSubcategoria)), array('moduloSubcategoria/view', 'id' => GxActiveRecord::extractPkValue($model->moduloSubcategoria, true)),array('class' => 'relational-link')) : null)?></dd>
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
            <dt><?=Util::formataTexto($model->getAttributeLabel('descricao'));?></dt>
            <dd><?=$model->descricao?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('arquivo'));?></dt>
            <dd><a style="margin-top:10px;" target="_blank" class="btn-link" href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/ModuloArquivo/<?=$model->arquivo;?>" ><?=$model->arquivo;?></a></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('ativo'));?></dt>
            <dd><?=Util::formataTexto($model->ativo ? 'Sim' : 'Não')?></dd>
          </dl>
        </div>
     
     


	<?
	if(Yii::app()->user->obj->group->temPermissaoAction('modulodownload','index')){
        ?>
        <div class="formSep">
            <dl class="dl-horizontal">
                <dt><?php echo GxHtml::encode($model->getRelationLabel('moduloDownloads')); ?></dt>
                <dd>
                <?php
                if(count($model->moduloDownloads) > 0){
                            echo GxHtml::openTag('ul');
                    foreach($model->moduloDownloads as $relatedModel) {
                        echo GxHtml::openTag('li');
                        echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('moduloDownload/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
                        echo GxHtml::closeTag('li');
                    }
                    echo GxHtml::closeTag('ul');
                }
                else{
                    echo '<i>Nenhum registro encontrado</i>';
                }
                ?>
                </dd>
            </dl>
        </div>
		<?
    }
	?>
     
     
         <div class="formSep">
              <dl class="dl-horizontal">
                  <dt>&nbsp;</dt>
                  <dd>
                  	<?
                    if(Yii::app()->user->obj->group->temPermissaoAction($this->id,'update')){
                        ?>
                        <a class="btn" href="<?php echo $this->createUrlRel('update',array('id'=>$model->idmodulo_arquivo));?>"><i class="icon-edit "></i> Editar</a>
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
                        <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idmodulo_arquivo));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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