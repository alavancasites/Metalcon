<?
$hash = Garbage::getHash();
?>
<style>
	.excluido{text-decoration:line-through;}
</style>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h3>Excluir <?=$model->label();?></h3>
</div>

<div class="modal-body">
	<?
    
    $array_relacionados = $model->getRelationData();
	$name = $model->representingName();
	
	function imprimirRelacionados($relacionados){
		foreach($relacionados as $modulo => $registros){	
			?>
			<ul style="margin-left:20px;list-style:none;">
				<li><strong><?=Util::formataTexto($modulo)?></strong></li>
				<?
				foreach($registros as $registro){
					$controller = get_class($registro);
					$controller[0] = strtolower($controller[0]);
					
					$array_relacionados_registro = $registro->getRelationData();
					$relacionados = count($array_relacionados_registro) > 0 ? 'com-relacionados' : 'sem-relacionados';
					?>
					<li class="item-excluir pendente <?=$relacionados?> item-<?=$registro->tableName()?>-<?=$registro->primaryKey?>" data-id="<?=$registro->primaryKey?>" data-table="<?=$registro->tableName()?>" data-ref="<?php echo Yii::app()->createUrl($controller.'/delete',array('id'=>$registro->primaryKey));?>">
						
                        <a href="<?php echo Yii::app()->createUrl($controller.'/view',array('id'=>$registro->primaryKey));?>" target="_blank" class="btn-link"><i class="icon-zoom-in"></i>&nbsp;<?=Util::formataTexto($registro->representingName());?></a>
                    	
						<?
						if($relacionados == 'com-relacionados'){
							imprimirRelacionados($array_relacionados_registro);
						}
						?>
                        
                    </li>
					<?
				}
				?>
			</ul>
			<?
		}
	}
	
	if(count($array_relacionados) > 0){
		?>
		<p>O registro "<strong><?=Util::formataTexto($name);?></strong>" possui itens relacionados:</p>
		<?
		imprimirRelacionados($array_relacionados);
		?>
		<p>Para efetivar a exclus&atilde;o ser&aacute; necess&aacute;rio excluir os itens relacionados ou remover a rela&ccedil;&atilde;o.</p>
        <?
	}
	else{
		?>
  <p>Voc&ecirc; tem certeza que deseja excluir "<strong><?=Util::formataTexto($name)?></strong>"?</p>
		<?
	
	}
    ?>
	
</div>
<div class="modal-footer">
  <?
  if(count($array_relacionados) == 0){
	  ?>
	  <a href="<?php echo $this->createUrlRel('delete',array('id'=>$_GET['id'],'confirm'=>'1'));?>" class="btn btn-danger"><i class="icon-trash icon-white icon-white"></i> Sim</a>
	  <?
  }
  else{
	  ?>
	  <a href="#" onclick="$('.confirmacao').show();$(this).hide();" class="btn btn-danger"><i class="icon-trash icon-white"></i> Excluir este registro e todos registros relacionados</a> 
  	  <p class="confirmacao" style="display:none;">Voc&ecirc; tem certeza que deseja excluir "<strong><?=Util::formataTexto($name)?></strong>" e seus itens relacionados?</p>
      <a href="#" class="btn btn-danger confirmacao btn-confirmacao" style="display:none;"><i class="icon-trash icon-white"></i> Sim</a> 
      <?
  }
  ?>
  <a href="#" data-dismiss="modal" class="btn btn-close">Cancelar</a>
</div>
<script language="javascript">

	function ajaxExclusaoRecursiva(){
		var pendentes = $('.sem-relacionados.pendente');
		
		var qtd = pendentes.length;
		
		if(qtd > 0){
			
			var $pendente_atual = $(pendentes[0]);
			var time = new Date().getTime()
			$.ajax({
				url: $pendente_atual.attr('data-ref')+'&ajax=1&confirm=1&hash=<?=$hash?>&time='+time,
				type: 'get',
           		dataType: 'json',
				success  : function(data){
					console.log(data);
					if(data == null || data.sucesso != 1){
						$('.modal-footer').html('<a href="#" data-dismiss="modal" class="btn btn-close">OK</a>');
						$('.modal-body').html("<div class='alert alert-error'><i class='icon-warning-sign'></i> Exclusão não realizada, contate o suporte</div>");
						return;
					}
					var id = $pendente_atual.attr('data-id');
					var table = $pendente_atual.attr('data-table');
					var classe = "item-"+table+"-"+id;
					
					$('.'+classe).addClass('excluido').removeClass('pendente');
					
					var $pai = $('.'+classe).parents('.com-relacionados');
					
					$pai.each(function(x,elem){
						if($(elem).find('.pendente').length == 0)
							$(elem).removeClass('com-relacionados').addClass('sem-relacionados');
					});
					ajaxExclusaoRecursiva();
				},
				error : function(){
					$('.modal-footer').html('<a href="#" data-dismiss="modal" class="btn btn-close">OK</a>');
					$('.modal-body').html("<div class='alert alert-error'><i class='icon-warning-sign'></i> Exclusão não realizada, contate o suporte</div>");
					return;
				}
			});
			
			
		}
		else{
			$('.modal-footer').html('');
			$('.modal-body').html('<div class="alert alert-info"><h5>Exclusão finalizada com sucesso!</h5></div>');
			location.href = "<?php echo $this->createUrl('delete',array('id'=>$model->primaryKey,'confirm'=>'1','hash'=>$hash));?>";
		}
		
	}
	
	$('.btn-confirmacao').click(function(){
		$(this).addClass('disabled');
		$(this).removeClass('btn-confirmacao');
		$(this).html('<i class="icon-refresh icon-spin">');
		ajaxExclusaoRecursiva();
	});
	
	$('.close, .btn-close').click(function(){
		$(this).parents('.model').html("");
	});
	
	$('.disabled').live('click',function(){
		return false;
	});
</script>