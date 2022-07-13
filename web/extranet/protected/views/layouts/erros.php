<?
if(count($erros = $model->getErrors()) > 0){
	?>
    <div class="formSep control-group">
        <div class="alert alert-error" style="max-width:500px;margin-left:180px;margin-top:10px;" >
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?
            foreach($erros as $erro){
                if(is_array($erro)){
                    foreach($erro as $err){
                        echo Util::formataTexto($err)."<br/>";
                    }
                }
                else
                    echo Util::formataTexto($erro)."<br/>";
            }
            ?>
        </div>
    </div>
	<?
}