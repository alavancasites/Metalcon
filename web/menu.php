<? $linkMenu = str_replace(explode("/",""),"",current(explode("?",$_SERVER['REQUEST_URI'])));?>
<div class="menuButton">Menu</div>
<div class="menuLinks">
  <a href="inicial" <?=(strpos($linkMenu,"inicial")!==false?"class='ativado'":"")?>>Home</a>
  <a href="novidades" <?=(strpos($linkMenu,"novidade")!==false?"class='ativado'":"")?>>Novidades</a>
<?php /*?>SISTEMA<?php */?>
  <a href="administrativo" <?=(strpos($linkMenu,"administrativo")!==false?"class='ativado'":"")?>>Administrativo</a>
  <a href="comercial" <?=(strpos($linkMenu,"comercial")!==false?"class='ativado'":"")?>>Comercial</a>
  <a href="producao" <?=(strpos($linkMenu,"producao")!==false?"class='ativado'":"")?>>Produção</a>
  <a href="engenharia" <?=(strpos($linkMenu,"engenharia")!==false?"class='ativado'":"")?>>Engenharia</a>
<?php /*?>FIM SISTEMA<?php */?>
  <a href="https://metalcon.ind.br/" target="_blank" rel="noopener">Institucional</a>
  <a href="ouvidoria" <?=(strpos($linkMenu,"ouvidoria")!==false?"class='ativado'":"")?>>Ouvidoria</a>
  <a href="meus-dados" <?=(strpos($linkMenu,"meus-dados")!==false?"class='ativado'":"")?>>Meus dados</a>
  <a href="sair" <?=(strpos($linkMenu,"sair")!==false?"class='ativado'":"")?>>Sair</a>
</div>