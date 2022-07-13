<div class="form">
	
	<?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'user-group-form',
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
          <dt> <?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?></dt>
          <dd><?php echo $form->textField($model, 'name', array('maxlength' => 100,'class' => 'span6')); ?> </dd>
        </dl>
    </div>
   
   <div class="formSep">
        <dl class="dl-horizontal">
          <dt><?php echo $form->labelEx($model,'permissions',array('class'=>'control-label')); ?></dt>
          <dd>
          	<table class="table table-permissao" style="width:500px;">
				  <?
                  $controllers = Yii::app()->metadata->getControllers(); #You can specify module name as parameter
                  foreach($controllers as $controller_class){
                      $class = str_replace("Controller","",$controller_class);
                      $route = strtolower($class);
                      //$model = new $class();
                      //echo Yii::app()->basePath.'\models\\'.$class.".php";
                      if (is_file(Yii::app()->basePath.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.$class.".php")) {
                         $model_permissao = new $class();
                         $label = $model_permissao->label(2);
                         //echo("Unable to load class: $class");
                      }
                      else{
                         $label = $class;
                      }
                      ?>
                      <tr>
                          <td align="left">
                          	<label class="checkbox"><input class="permissoes-modulo" name="modulo[]" type="checkbox" id="modulo-area" value="area" <? if ($model->temPermissaoController($route)) echo 'checked="checked"'; ?> ><?=$label?></label> 
                          </td>
                          <td>
						  <?
                          $controller = $controller_class;
                          $actions = Yii::app()->metadata->getActions($controller_class);
                          foreach($actions as $action){
                              $action_salvar = strtolower($action);
                              ?>
                              <div <?=($model->temPermissaoController($route) ? '' : ' style="display:none;"' );?>  class="permissoes-modulo-operacoes">
                                <div style="clear:both;">
                                    <label class="checkbox" style="text-align:left;" for="opercacao-<?=$controller?>-<?=$action;?>"><input class="permissoes-modulo-operacao" name="UserGroup[permissions][<?=$route?>][]" type="checkbox" id="opercacao-<?=$controller?>-<?=$action;?>" value="<?=$action_salvar;?>" <? if ($model->temPermissaoAction($route,$action_salvar)) echo 'checked="checked"'; ?> ><?=$action;?></label>
                                </div>	
                              </div>
                              <?
                          }
                          ?>
                        </td>
                      </tr>
                      <?
                  } 
                  ?>
                  </table>
          </dd>
        </dl>
    </div>           
   
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
                <a class="btn btn-delete" href="<?php echo $this->createUrlRel('delete',array('id'=>$model->idUserGroup));?>" style="margin-left:30px;"><i class="icon-trash"></i> Excluir</a>
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