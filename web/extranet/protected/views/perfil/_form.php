<div class="form">

	<?php $form = $this->beginWidget('GxActiveForm', array(
		'id' => 'perfil-form',
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
			<dt>Permissões</dt>
			<dd>

				<?php
				$modulos = Modulo::model()->findAll(array('condition'=>'ativo=1'));
				if($modulos){

					foreach ($modulos as $key => $modulo) {
						$categorias = $modulo->moduloCategorias(array('condition'=>'ativo=1'));
						if($categorias){
							?>
							<div class="">

								<strong><?=$modulo->nome?></strong>
								<ul class="unstyled">
									<?php
									foreach($categorias as $cat){
										?>
										<li class="m-l">
											<label for="ck<?=$cat->idcategoria?>">
												<input id="ck<?=$cat->idcategoria?>" type="checkbox" name="Perfil[categorias][]" value="<?=$cat->idcategoria?>" <?=in_array($cat->idcategoria, $model->categorias)?'checked':''?>>
												<?=$cat->nome?>
											</label>
										</li>
										<?php
									}
									?>
								</ul>
							</div>
							<?php
						}
					}
				}
				?>

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
					<a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idperfil));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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
