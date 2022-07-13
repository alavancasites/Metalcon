<div class="chamada">
  <div class="container">
    <div class="colunas col-12">
      <h2>D&uacute;vidas, cr&iacute;ticas, sugest&otilde;s?</h2>
      <h3>Acesse agora o nosso novo canal feito especialmente para ouvir voc&ecirc;.</h3>
    </div>
    <div class="colunas col-8"><div class="botao"><a href="ouvidoria">ENVIE SUA MENSAGEM</a></div></div>
    <div class="clear"></div>
  </div>
</div>
<div class="rodape">
  <div class="container">
    <div><a href="inicial"><img src="img/login.png" width="318" height="59" alt="Metalcon"/></a></div>]
    <div class="rodape_menu">
      <a href="novidades" <?=(strpos($linkMenu,"novidades")!==false?"class='ativado'":"")?>>Novidades</a>
    <?php /*?>SISTEMA<?php */?>
      <a href="administrativo" <?=(strpos($linkMenu,"administrativo")!==false?"class='ativado'":"")?>>Administrativo</a>
      <a href="comercial" <?=(strpos($linkMenu,"comercial")!==false?"class='ativado'":"")?>>Comercial</a>
      <a href="producao" <?=(strpos($linkMenu,"producao")!==false?"class='ativado'":"")?>>Produção</a>
      <a href="engenharia" <?=(strpos($linkMenu,"engenharia")!==false?"class='ativado'":"")?>>Engenharia</a>
    <?php /*?>FIM SISTEMA<?php */?>
      <a href="https://metalcon.ind.br/" target="_blank" rel="noopener">Institucional</a>
      <a href="ouvidoria" <?=(strpos($linkMenu,"ouvidoria")!==false?"class='ativado'":"")?>>Ouvidoria</a>
      <a href="sair" <?=(strpos($linkMenu,"sair")!==false?"class='ativado'":"")?>>Sair</a>
    </div>
    <div class="clear"></div>
    <div class="separador"></div>
    <div class="assinatura">
      <div class="colunas col-10"><?php auto_copyright();?></div>
      <div class="colunas col-10"><a href="https://www.alavanca.digital" target="_blank" rel="noopener">Desenvolvido por Alavanca Sites e Sistemas</a></div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<?php 
function auto_copyright($startYear = null) {
	$thisYear = date('Y');
    if (!is_numeric($startYear)) {
		$year = $thisYear;
	} else {
		$year = intval($startYear);
	}
	if ($year == $thisYear || $year > $thisYear) {
		echo "Copyright &copy; $thisYear - Todos os direitos reservados";
	} else {
		echo "Copyright &copy; $year&ndash;$thisYear - Todos os direitos reservados";
	}   
 } 
 ?>
