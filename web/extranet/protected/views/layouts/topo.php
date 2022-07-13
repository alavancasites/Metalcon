<div class="navbar-inner">
  <div class="container">
    <div class="span5 alpha logo_popup"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/topo_sistema.png" alt="Alavanca Sites e Sistemas"/></a></div>
    <div class="span7 omega">
      <div id="fade-menu" class="pull-right">
      <ul class="clearfix" id="mobile-nav">
		<?
          if(Yii::app()->user->obj->group->temPermissaoAction('userGroup','index')){
        ?>
          <li><a href="<?=$this->createUrl('userGroup/index');?>"><?=UserGroup::model()->label(2)?></a></li>
        <?
          } if(Yii::app()->user->obj->group->temPermissaoAction('user','index')){
        ?>
          <li><a href="<?=$this->createUrl('user/index');?>"><?=User::model()->label(2)?></a></li>
        <?
          }if(Yii::app()->user->obj->group->temPermissaoAction('user','me')){
        ?>
          <li><a href="<?=$this->createUrl('user/me');?>">Meus Dados</a></li>
        <?
          }
        ?>
          <li><a href="<?= Yii::app()->baseUrl . '/logout'; ?>"><span>Sair</span></a></li>
      </ul>
      </div>    
    </div>
  </div>
</div>
