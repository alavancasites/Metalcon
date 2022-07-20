<?php
if(is_numeric($_SESSION['colaborador_logado']['id'])){
    Util::redirect('inicial');
}
if($_POST['Login']){
    $erro = 'CPF ou senha inválidos';
    $criteria = new CDbCriteria();
    $criteria->addCondition("t.ativo = '1'");
    $criteria->addCondition("perfil.ativo = '1'");
    $criteria->addCondition("t.cpf = '".Util::soNumero($_POST['Login']['cpf'])."'");
    $criteria->with = array("perfil");
    $criteria->together = true;
    $usuario = Usuario::model()->find($criteria);
    if(is_object($usuario)){
        if($usuario->senhaValida($_POST['Login']['senha'])){
            $_SESSION['colaborador_logado'] = array(
                'id'=>$usuario->idusuario,
                'idperfil'=>$usuario->idperfil,
                'nome'=>$usuario->nome,
                'cpf'=>$usuario->cpf,
                'email'=>$usuario->email,
            );
            Util::redirect('inicial');
        }
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Metalcon</title>
    <?php include("header.php"); ?>
</head>
<body>
    <section id="login">
        <div><img src="img/login.png" width="318" height="59" alt="Metalcon"/></div>
        <div class="form_login">
            <?php
            if($erro){
                ?>
                <div class="error margin20">
                    <div class="errorSummary">
                        <p style="color:#666"><?=$erro?></p>
                    </div>
                </div>
                <?php
            }
            ?>
            <form id="form1" name="form1" method="post" action="login">
                <input name="Login[cpf]" type="text" id="cpf" placeholder="CPF" value="<?=$_POST['Login']['cpf']?>" />
                <input name="Login[senha]" type="password" id="senha" placeholder="Senha" value="<?=$_POST['Login']['senha']?>" />
                <button name="enviar" type="submit" value="">ACESSAR</button>
            </form>
        </div>
        <div class="separador"></div>
        <div class="form_esqueci">
            <form id="form1" name="form1" method="post" action="esqueci-minha-senha">
                <button name="enviar" type="submit" value="">SOLICITAR NOVA SENHA</button>
            </form>
        </div>
    </section>
    <?php include("scripts.php"); ?>
</body>
</html>
