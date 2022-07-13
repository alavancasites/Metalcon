<?
$_GET['pagina'] = is_numeric($_GET['pagina']) ? $_GET['pagina']+1 : 0;
$criteria = new CDbCriteria();
$criteria->order = 'idnovidade desc';
$criteria->addCondition("ativo = 1");
$data_provider = new CActiveDataProvider('Novidade', array(
  'criteria'=> $criteria,
    'pagination'=>array(
        'route'=> 'novidades?',
        'pageSize'=> 12,
      'pageVar' => 'page',
    ),
));
$novidades = $data_provider->getData();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Metalcon sistemas estruturais</title>
<?php include("header.php"); ?>
</head>
<body>
  <header>
    <div id="topo"><?php include("topo.php"); ?></div>
    <div class="clear"></div>
    <div class="caminho"><div class="container"><a href="inicial">Home</a>Dia a dia</div></div>
  </header>
  <section class="conteudo novidades">
    <div class="container">
      <div class="titulos"><h2>Dia a Dia</h2></div>
      <div>
        <?
          foreach ($novidades as $key => $novidade) {
        ?>
          <div class="colunas col-5 novidades_lista">
            <div><a href="novidade/<?=$novidade->idnovidade?>/<?=Util::removerAcentos($novidade->titulo)?>"><img src="extranet/uploads/Novidade/<?=$novidade->imagem?>" width="280" height="200" class="imgfull rollover" alt="<?=$novidade->titulo?>"/></a></div>
            <div class="box">
              <div class="categoria"><?=$novidade->categoria?></div>
              <div class="titulos"><h3><a href="novidade/<?=$novidade->idnovidade?>/<?=Util::removerAcentos($novidade->titulo)?>"><?=$novidade->titulo?></a></h3></div>
            </div>
          </div>
        <?
          }
        ?>      
        <div class="clear"></div>
      </div>
      <div class="paginacao"> 
        <?php
        $pagination = $data_provider->pagination;
        $pagina = $pagination->currentPage + 1;
        if ( $pagination->pageCount > 1 ) {
          ?>
        <div>
          <?php
          $get_params = http_build_query( array_merge( $_GET, array( 'page' => 1 ) ) );
          ?>
          <a href="<?=$pagination->route?><?=$get_params?>" class="<?=$pagina==1?'ativado':''?>">1</a>
          <?
          if ( $pagina > 2 ) {
            ?>
          <a onclick="return false;">...</a>
          <?
          }
          for ( $i = $pagina - 1; $i < ( $pagina + 2 ); $i++ ) {
            if ( $i > 1 && $i < $pagination->pageCount ) {
              $get_params = http_build_query( array_merge( $_GET, array( 'page' => $i ) ) );
              ?>
          <a href="<?=$pagination->route?><?=$get_params?>" class="<?=$pagina==$i?'ativado':''?>"><?=$i;?></a>
          <?
            }
          }
          if ( $pagina < $pagination->pageCount - 1 ) {
            ?>
          <a onclick="return false;">...</a>
          <?
          }
          ?>
          <?php
          $get_params = http_build_query( array_merge( $_GET, array( 'page' => $pagination->pageCount ) ) );
          ?>
          <a href="<?=$pagination->route?><?=$get_params?>" class="<?=$pagina==$pagination->pageCount?'ativado':''?>">
          <?=$pagination->pageCount;?>
          </a> </div>
        <?php
          }
        ?>
      </div>
    </div>
  </section>
  <footer><?php include("rodape.php"); ?></footer>
<?php include("scripts.php"); ?>
</body>
</html>