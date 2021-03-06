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
            <dt><?=Util::formataTexto($model->getAttributeLabel('idmodulo'));?></dt>
            <dd><?=($model->modulo !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->modulo)), array('modulo/view', 'id' => GxActiveRecord::extractPkValue($model->modulo, true)),array('class' => 'relational-link')) : null)?></dd>
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
				<dt><?=Util::formataTexto($model->getAttributeLabel('url'));?></dt>
				<dd><?=Util::formataTexto($model->url)?></dd>
			</dl>
		</div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('icone'));?></dt>
            <dd>
				<img src="<?php echo Yii::app()->createAbsoluteUrl('thumbnail/fill/250/ModuloCategoria/'.$model->icone);?>"/>
			</dd>
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
            <dt><?=Util::formataTexto($model->getAttributeLabel('ativo'));?></dt>
            <dd><?=Util::formataTexto($model->ativo ? 'Sim' : 'N?o')?></dd>
          </dl>
        </div>




	<?
	if(Yii::app()->user->obj->group->temPermissaoAction('modulosubcategoria','index')){
        ?>
        <div class="formSep">
            <dl class="dl-horizontal">
                <dt><?php echo GxHtml::encode($model->getRelationLabel('moduloSubcategorias')); ?></dt>
                <dd>
                <?php
                if(count($model->moduloSubcategorias) > 0){
                            echo GxHtml::openTag('ul');
                    foreach($model->moduloSubcategorias as $relatedModel) {
                        echo GxHtml::openTag('li');
                        echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('moduloSubcategoria/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
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

	<?
	if(Yii::app()->user->obj->group->temPermissaoAction('perfilacesso','index')){
        ?>
        <div class="formSep">
            <dl class="dl-horizontal">
                <dt><?php echo GxHtml::encode($model->getRelationLabel('perfilAcessos')); ?></dt>
                <dd>
                <?php
                if(count($model->perfilAcessos) > 0){
                            echo GxHtml::openTag('ul');
                    foreach($model->perfilAcessos as $relatedModel) {
                        echo GxHtml::openTag('li');
                        echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('perfilAcesso/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
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
                        <a class="btn" href="<?php echo $this->createUrlRel('update',array('id'=>$model->idcategoria));?>"><i class="icon-edit "></i> Editar</a>
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
                        <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idcategoria));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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
