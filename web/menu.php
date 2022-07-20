<? $linkMenu = str_replace(explode("/",""),"",current(explode("?",$_SERVER['REQUEST_URI'])));?>
<div class="menuButton">Menu</div>
<div class="menuLinks">
  <a href="inicial" <?=(strpos($linkMenu,"inicial")!==false?"class='ativado'":"")?>>Home</a>
  <a href="novidades" <?=(strpos($linkMenu,"novidade")!==false?"class='ativado'":"")?>>Novidades</a>
<?php
$criteria = new CDbCriteria();
$criteria->addCondition('t.ativo  = 1');
$criteria->addCondition('moduloCategorias.ativo  = 1');
$criteria->addCondition('perfilAcessos.idperfil  = :idperfil');
$criteria->with = array(
    'moduloCategorias',
    'moduloCategorias.perfilAcessos',
);
$criteria->params = array(
    ':idperfil'=>$_SESSION['colaborador_logado']['idperfil'],
);
$modulos = Modulo::model()->findAll($criteria);
if($modulos){
    foreach ($modulos as $modulo) {
        ?>
        <a href="<?=($modulo->url)?>" <?=$modulo->url==$_GET['modulo']?"class='ativado'":""?>><?=Util::formataTexto($modulo->nome)?></a>
        <?php
    }
}
 ?>



  <a href="https://metalcon.ind.br/" target="_blank" rel="noopener">Institucional</a>
  <a href="ouvidoria" <?=(strpos($linkMenu,"ouvidoria")!==false?"class='ativado'":"")?>>Ouvidoria</a>
  <a href="meus-dados" <?=(strpos($linkMenu,"meus-dados")!==false?"class='ativado'":"")?>>Meus dados</a>
  <a href="sair" <?=(strpos($linkMenu,"sair")!==false?"class='ativado'":"")?>>Sair</a>
</div>
