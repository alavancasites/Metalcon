<?
if ( $success != "" ) {
  ?>
<div class="formSep">
  <div class="alert alert-success" style="max-width:500px;margin-left:180px;margin-top:10px;" >
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?
    if ( $success == 'create' ) {
      ?>
    Cadastro realizado com sucesso, confirma:<br/>
    <a href="<?=$this->createUrl('create');?>" class="btn"><i class="icon-plus"></i> Novo cadastro</a>
    <?
    } else {
      ?>
    Cadastro atualizado com sucesso, confirma:
    <?
    }
    ?>
  </div>
</div>
<?
}
?>
