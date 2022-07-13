<div id="breadcrumbs">
  <div class="container">
	<a href="<?= Yii::app()->baseUrl . '/site' ?>">Home</a>
    <?
	  if(isset($this->breadcrumbs)){
		foreach($this->breadcrumbs as $label=>$url){
		  if(is_string($label) || is_array($url)){
	?>
	  <a href="<?=$this->createUrlRel($url[0],array_splice($url,1)); ?>"><?=Util::formataTexto($label); ?></a>
	<?	
	  }else{
  	?>
	  <a class="ativado"><?=Util::formataTexto($url); ?></a>
	<?	
	      }
  	    } 
  	  }
	?>
  </div>
</div>

