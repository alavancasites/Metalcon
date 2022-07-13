<!DOCTYPE HTML>
<html lang="pt-BR">
<?php
$this->renderPartial( "//layouts/header", array() );
?>
<body class="bg_c" style="padding-top: 0px;">
<div class="main-wrapper">
  <?php
  if ( !Yii::app()->user->isGuest ) {
    $this->renderPartial( "//layouts/topo", array() );
  }
  if ( !Yii::app()->user->isGuest && count( $this->breadcrumbs ) > 0 ) {
    $this->renderPartial( "//layouts/caminho", array() );
  }
  ?>
  <div class="container conteudo">
    <div class="span3 menu_lateral">
      <?
      if ( !Yii::app()->user->isGuest ) {
        $this->renderPartial( "//layouts/menu", array() );
      }
      ?>
    </div>
    <div class="span9"><?php echo $content; ?></div>
  </div>
  <div class="clear"></div>
  <div class="footer_space"></div>
</div>
<?php
if ( !Yii::app()->user->isGuest ) {
  $this->renderPartial( "//layouts/footer", array() );
}
$this->renderPartial( "//layouts/scripts", array() )
?>
<div class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Carregando</h3>
  </div>
  <div class="modal-body">
    <p>…</p>
  </div>
  <div class="modal-footer"> <a href="#" data-dismiss="modal" class="btn">Cancelar</a> </div>
</div>
</body>
</html>