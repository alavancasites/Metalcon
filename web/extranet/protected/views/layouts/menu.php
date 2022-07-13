<header>
  <div class="row-fluid">
    <nav class="nav-icons">
      <div class="logo_cliente"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_menu.png" alt=""/></a></div>
      <div class="menu_pop">
        <?
          if ( Yii::app()->user->obj->group->temPermissaoAction( 'banner', 'index' ) ) {
        ?>
          <a href="<?=$this->createUrl('banner/index');?>"><i class="fa fa-lg fa-caret-right"></i><span>Banner</span></a>
        <?
          }
        ?>
        <div class="submenu accordion-group">
          <div class="accordion-heading"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1"><i class="fa"></i><span>Dia a dia</span></a> </div>
          <div id="collapseOne1" class="accordion-body collapse" style="height: 0px;">
            <?
              if ( Yii::app()->user->obj->group->temPermissaoAction( 'categoria', 'index' ) ) {
            ?>
              <a class="fa fa-lg fa-caret-right" href="<?=$this->createUrl('categoria/index');?>"><span>Categoria</span></a>
            <?
              }if ( Yii::app()->user->obj->group->temPermissaoAction( 'novidade', 'index' ) ) {
            ?>
              <a class="fa fa-lg fa-caret-right" href="<?=$this->createUrl('novidade/index');?>"><span>Novidade</span></a>
            <?
              }
            ?>
          </div>
        </div>
        <?
          if ( Yii::app()->user->obj->group->temPermissaoAction( 'ouvidoria', 'index' ) ) {
        ?>
          <a href="<?=$this->createUrl('ouvidoria/index');?>"><i class="fa fa-lg fa-caret-right"></i><span>Ouvidoria</span></a>
        <?
          }
        ?>
      </div>
      <div class="menu_suporte"> D&uacute;vidas ou suporte <a href="mailto:atendimento@alavanca.digital">atendimento@alavanca.digital</a> <a href="http://www.alavanca.digital" target="_blank">www.alavanca.digital</a> </div>
    </nav>
  </div>
</header>
