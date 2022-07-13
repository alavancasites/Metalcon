<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contato cadastrado pelo site</title>
<style type="text/css">body,td,th { font-family: Arial, Helvetica, sans-serif; color: #555; font-size: 12px; }body { margin: 0px; background: #f3f3f3; }td { padding: 15px; border-bottom: 1px dashed #000 }.fundo { background: #f7f7f7; }</style></head>
<body>
<div style="width:100%;">
  <div style="width:750px; margin-left:auto; margin-right:auto;">
    <div>
      <div style="margin-top:30px; text-align:center;"><a href="http://www.alavanca.digital" target="_blank"><img src="http://www.alavanca.digital/divulgacao/email_header.png" alt="Alavanca Sites e Sistemas"/></a></div>
      <div style="margin-top:30px">
        <h1 style="color: #555; font-size:16px; text-align:center; display:block;">Contato realizado pelo site</h1>
        <div style="margin-top:20px; padding:20px;">
          <table width="100%" border="0" cellspacing="0" cellpadding="4">
            <?php /*?>
		  <?
			$array_departamento = array(
			  1 => "Comercial", 
			  2 => "Recursos Humanos", 
			  3 => "Marketing", 
			  4 => "Financeiro", 
			  5 => "Outro"
			);
		  ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="4">
			  <tr>
				<td width="23%"><strong>Departamento:</strong></td>
				<td width="77%"><? echo $array_departamento[$contato->departamento];  ?></td>
			  </tr>
              <tr>
				<td><strong>Estado:</strong></td>
				<td><?=htmlentities($contato->estado->nome);?></td>
			  </tr>
			  <tr>
				<td><strong>Cidade:</strong></td>
				<td><?=htmlentities($contato->cidade->nome);?></td>
			  </tr>
		  <?php */?>
            <tr class="fundo">
              <td width="23%"><strong>Nome:</strong></td>
              <td width="77%"><?=htmlentities($contato->nome);?></td>
            </tr>
            <tr>
              <td><strong>E-mail:</strong></td>
              <td><?=htmlentities($contato->email);?></td>
            </tr>
            <tr class="fundo">
              <td><strong>Telefone:</strong></td>
              <td><?=htmlentities($contato->telefone);?></td>
            </tr>
            <tr>
              <td><strong>Assunto:</strong></td>
              <td><?=htmlentities($contato->assunto);?></td>
            </tr>
            <tr class="fundo">
              <td><strong>Mensagem</strong></td>
              <td><?=htmlentities($contato->mensagem);?></td>
            </tr>
          </table>
        </div>
      </div>
      <br />
    </div>
    <div style="margin-top:20px;font-size: 12px; color: #333; line-height: 20px; text-align:center"> <a href="http://www.alavanca.digital" target="_blank" class="logo_popup"><img src="http://www.alavanca.digital/divulgacao/email_footer.png" alt="Alavanca Sites e Sistemas"/></a>
      <div style="margin-top:10px;font-size: 12px; line-height: 20px;"><strong>D&uacute;vidas ou suporte</strong></div>
      <div style="margin-top:10px;font-size: 12px; line-height: 20px;"><a href="mailto:atendimento@alavanca.digital" style="color: #555;">atendimento@alavanca.digital</a></div>
      <div style="margin-top:10px;font-size: 12px; line-height: 20px;"><a href="http://www.alavanca.digital" target="_blank" style="color: #555;">www.alavanca.digital</a></div>
    </div>
  </div>
</div>
</body>
</html>
