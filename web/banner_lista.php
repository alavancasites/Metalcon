<?php
$criteria = new CDbCriteria();
$criteria->order = 'idbanner desc';
$criteria->addCondition("ativo = 1");
$banners = Banner::model()->findAll($criteria);
foreach($banners as $banner) {
  if ($banner->link != NULL){
?>
  <div><a href="<?=$banner->link?>"><img src="extranet/uploads/Banner/<?=$banner->imagem?>" width="1920" height="569" class="imgfull" alt="<?=$banner->titulo?>"/></a></div>
<?
  }else{
?>
  <div><img src="extranet/uploads/Banner/<?=$banner->imagem?>" width="1920" height="569" class="imgfull" alt="<?=$banner->titulo?>"/></div>
<?    
    }
  }
?>
