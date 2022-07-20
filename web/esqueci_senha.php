<?php
if($_POST['Login']){
    $erro = 'CPF inválidos';
    $criteria = new CDbCriteria();
    $criteria->addCondition("t.ativo = '1'");
    $criteria->addCondition("perfil.ativo = '1'");
    $criteria->addCondition("t.cpf = '".Util::soNumero($_POST['Login']['cpf'])."'");
    $criteria->with = array("perfil");
    $criteria->together = true;
    $usuario = Usuario::model()->find($criteria);
    if(is_object($usuario)){

        $erro = 'O usuário não possui e-mail cadastrado';
        if($usuario->email!=''){
            $erro = 'Não foi possivel gerar uma nova senha';
            if($usuario->gerarSenha()){
                session_destroy();
                Util::redirect('esqueci-minha-senha?sucesso=1');
            }
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
    <section id="esqueci">
        <div><img src="img/login.png" width="318" height="59" alt="Metalcon"/></div>
        <div class="form_login">
            <?php
            if($_GET['sucesso'] == 1){
                ?>
                <h2 style="text-align:center; margin-top:25px;">Nova senha enviada para o e-mail cadastrado</h2>
                <?
            }else{
                if(!empty($erro)){
                    ?>
                    <div class="error margin20">
                        <div class="errorSummary">
                            <p style="color:#666"><?=$erro?></p>
                        </div>
                    </div>
                    <?
                }
                ?>
                <form id="form1" name="form1" method="post" action="esqueci-minha-senha">
                    <input name="Login[cpf]" type="text" id="cpf" placeholder="CPF" />
                    <button name="enviar" type="submit" value="">SOLICITAR SENHA</button>
                </form>
                <?php
            }
            ?>
            <div style="color:#fff; margin-top:50px;">

                <a href="login"   style="color:#fff; "> << Voltar para o login</a>
            </div>
            </form>
        </div>
    </section>
    <?php include("scripts.php"); ?>
</body>
</html>
