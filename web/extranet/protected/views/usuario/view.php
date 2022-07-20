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
            <dt><?=Util::formataTexto($model->getAttributeLabel('idperfil'));?></dt>
            <dd><?=($model->perfil !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->perfil)), array('perfil/view', 'id' => GxActiveRecord::extractPkValue($model->perfil, true)),array('class' => 'relational-link')) : null)?></dd>
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
            <dt><?=Util::formataTexto($model->getAttributeLabel('cpf'));?></dt>
            <dd><?=Util::formataTexto($model->cpf)?></dd>
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
            <dt><?=Util::formataTexto($model->getAttributeLabel('telefone'));?></dt>
            <dd><?=Util::formataTexto($model->telefone)?></dd>
          </dl>
        </div>
        <div class="formSep">
          <dl class="dl-horizontal">
            <dt><?=Util::formataTexto($model->getAttributeLabel('senha'));?></dt>
            <dd> <em>Senha criptografada</em> </dd>
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


	<?
	if(Yii::app()->user->obj->group->temPermissaoAction('usuariorecuperasenha','index')){
        ?>
        <div class="formSep">
            <dl class="dl-horizontal">
                <dt><?php echo GxHtml::encode($model->getRelationLabel('usuarioRecuperasenhas')); ?></dt>
                <dd>
                <?php
                if(count($model->usuarioRecuperasenhas) > 0){
                            echo GxHtml::openTag('ul');
                    foreach($model->usuarioRecuperasenhas as $relatedModel) {
                        echo GxHtml::openTag('li');
                        echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('usuarioRecuperasenha/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
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
                        <a class="btn" href="<?php echo $this->createUrlRel('update',array('id'=>$model->idusuario));?>"><i class="icon-edit "></i> Editar</a>
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
                        <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idusuario));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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
