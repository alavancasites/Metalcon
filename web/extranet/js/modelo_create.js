// JavaScript Document

$('.btn-dados_tecnicos-add').live('click',function(){
	var i = $('.item-dados_tecnicos').length;
	var template = '<tr class="item-dados_tecnicos">\
                        <td valign="top"><input type="text" class="span12" name="Modelo[dados_tecnicos]['+i+'][atributo]" /></td>\
                        <td valign="top"><input type="text" class="span12" name="Modelo[dados_tecnicos]['+i+'][valor_imperial]" /></td>\
						<td valign="top"><input type="text" class="span12" name="Modelo[dados_tecnicos]['+i+'][valor_metrico]" /></td>\
                        <td valign="top"><a href="#" class="btn btn-dados_tecnicos-delete"><i class="icon-trash"></i></a></td>\
                     </tr>';
	
	$(this).parents('tr').before(template);
	return false;
});

$('.btn-dados_tecnicos-delete').live('click',function(){
	$(this).parents('tr').remove();
	return false;
});