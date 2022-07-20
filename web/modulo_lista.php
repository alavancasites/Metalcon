<?php
$criteria = new CDbCriteria();
$criteria->addCondition('t.ativo  = 1');
$criteria->addCondition('moduloCategorias.ativo  = 1');
$criteria->addCondition('perfilAcessos.idperfil  = :idperfil');
$criteria->addCondition('t.url  = :url');
$criteria->with = array(
    'moduloCategorias',
    'moduloCategorias.perfilAcessos',
);
$criteria->params = array(
    ':idperfil'=>$_SESSION['colaborador_logado']['idperfil'],
    ":url"=>$_GET['modulo'],
);
$_modulo = Modulo::model()->find($criteria);
if(!is_object($_modulo)){
    Util::redirect('inicial');
}


$criteria = new CDbCriteria();
$criteria->addCondition('t.ativo  = 1');
$criteria->addCondition('perfilAcessos.idperfil  = :idperfil');
$criteria->addCondition('t.url  = :url');
$criteria->with = array(
    'perfilAcessos',
);
$criteria->params = array(
    ':idperfil'=>$_SESSION['colaborador_logado']['idperfil'],
    ":url"=>$_GET['categoria'],
);
$categoria = ModuloCategoria::model()->find($criteria);
if(!is_object($categoria)){
    Util::redirect($_modulo->url);
}

$criteria = new CDbCriteria();
$criteria->addCondition('t.ativo  = 1');
$criteria->addCondition('t.idcategoria  = :id');
$criteria->params = array(
    ':id'=>$categoria->idcategoria,
);
$subcategorias = ModuloSubcategoria::model()->findAll($criteria);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title><?php echo Util::formataTexto($_modulo->nome)?> - <?php echo Util::formataTexto($categoria->nome)?> - Metalcon sistemas estruturais</title>
    <?php include("header.php"); ?>
</head>
<body class="modulos">
    <header>
        <div id="topo"><?php include("topo.php"); ?></div>
        <div class="clear"></div>
        <div class="caminho"><div class="container"><a href="inicial">Home</a><a href="<?php echo Util::formataTexto($_modulo->url)?>"><?php echo Util::formataTexto($_modulo->nome)?></a><?php echo Util::formataTexto($categoria->nome)?></div></div>
    </header>
    <section class="conteudo">
        <div class="container">
            <div class="titulos"><h2><?php echo Util::formataTexto($categoria->nome)?></h2></div>
            <div class="texto"><p><?php echo ($categoria->descricao)?></p></div>
            <div class="acessos">
                <?
                if($subcategorias){
                    foreach ($subcategorias as $subcat) {
                        ?>
                        <div class="colunas um-terco">
                            <a href="<?=$_modulo->url?>/<?=$categoria->url?>/<?=$subcat->url?>">
                                <span class="tit"><?php echo Util::formataTexto($subcat->nome)?></span>
                                <span class="desc"><?php echo Util::formataResumo($subcat->descricao, 100)?></span>
                            </a>
                        </div>
                        <?php
                    }
                }else{
                    ?>
                    <em>Nenhum item na categoria</em>
                    <?
                }
                ?>
                <div class="clear"></div>
            </div>

        </div>
    </section>
    <footer><?php include("rodape.php"); ?></footer>
    <?php include("scripts.php"); ?>

</body>
</html>
