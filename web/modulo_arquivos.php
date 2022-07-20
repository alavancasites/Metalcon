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
$criteria->addCondition('t.url  = :url');
$criteria->addCondition('t.idcategoria  = :id');
$criteria->params = array(
    ":url"=>$_GET['subcategoria'],
    ":id"=>$categoria->idcategoria,
);
$subcat = ModuloSubcategoria::model()->find($criteria);
if(!is_object($subcat)){
    Util::redirect($_modulo->url.'/'.$categoria->url);
}

$criteria = new CDbCriteria();
$criteria->addCondition('t.ativo  = 1');
$criteria->addCondition('t.idmodulo_subcategoria  = :id');
$criteria->params = array(
    ':id'=>$subcat->idmodulo_subcategoria,
);
$arquivos = ModuloArquivo::model()->findAll($criteria);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title><?php echo Util::formataTexto($_modulo->nome)?> - <?php echo Util::formataTexto($categoria->nome)?> - <?php echo Util::formataTexto($subcat->nome)?> - Metalcon sistemas estruturais</title>
    <?php include("header.php"); ?>
</head>
<body class="modulos">
    <header>
        <div id="topo"><?php include("topo.php"); ?></div>
        <div class="clear"></div>
        <div class="caminho"><div class="container"><a href="inicial">Home</a><a href="<?=$_modulo->url?>"><?php echo Util::formataTexto($_modulo->nome)?></a><a href="<?=$_modulo->url?>/<?=$categoria->url?>"><?php echo Util::formataTexto($categoria->nome)?></a><?php echo Util::formataTexto($subcat->nome)?></div></div>
    </header>
    <section class="conteudo">
        <div class="container">
            <div class="titulos"><h2><?php echo Util::formataTexto($subcat->nome)?></h2></div>
            <div class="texto"><p><?php echo ($subcat->descricao)?></p></div>
            <div class="mt80">
                <?
                if($arquivos){

                foreach ($arquivos as $arquivo) {
                    $link_dwn = 'download/'.$arquivo->idmodulo_arquivo;
                    ?>
                    <div class="arquivos">
                        <div class="infos">
                            <div class="tit"><a href="<?=$link_dwn?>" target="_blank" rel="noopener"><?php echo Util::formataTexto($arquivo->nome)?></a></div>
                            <div class="desc"><a href="<?=$link_dwn?>" target="_blank" rel="noopener"><?php echo ($arquivo->descricao)?></a></div>
                        </div>
                        <div class="download"><a href="<?=$link_dwn?>" target="_blank" rel="noopener"><img src="img/download.png" width="31" height="31" alt=""/><span>Download</span></a></div>
                        <div class="clear"></div>
                    </div>
                    <?
                }
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
