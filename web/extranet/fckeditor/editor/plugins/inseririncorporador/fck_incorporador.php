<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<html>
<head>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.Hand { cursor: pointer; cursor: hand;}

.Sample { font-size: 24px; }
</style>
<script src="../inserirproduto/common/fck_dialog_common.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-1.2.6.js"></script>
<script type="text/javascript">
var oEditor = window.parent.InnerDialogLoaded();
var oSample;
function insertChar(){
	//oEditor.FCKUndo.SaveUndoStep() ;
	oEditor.FCK.InsertHtml($('#incorporador').val()) ;
	window.parent.Cancel() ;
}
</script>
</head>
<body style="overflow: hidden">
<table width="100%" border="0" cellpadding="4" cellspacing="0">
  <tr>
    <td width="50%"><textarea name="incorporador" id="incorporador" cols="80" rows="10" > </textarea></td>  
  </tr>
  <tr>
    <td width="50%"><input type="button" value="Inserir" onClick="insertChar();"/>      Largura necessária: 460px.</td>  
  </tr>
</table>
</body>
</html>
