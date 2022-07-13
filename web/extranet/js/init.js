// JavaScript Document
$(document).on('change', '.Paginacao', function (e) {
	var url = window.location.href.toString();
	
	if(url.indexOf("?") == -1)
	   url += "?";
	else
	   url += "&";
	   
	url += 'qtd_pagina=' + $(this).val(); 
	
	window.location.href = url;
});

window.onbeforeunload = function(e) {
  $('body').plainOverlay('show');
};

$(document).on('click', '#table_produtos > tbody > tr:not(.expandido)', function (e) {
    
	console.log(e.target.nodeName);

	if(e.target.nodeName != 'INPUT'){
		e.preventDefault();
		checkbox = $(this).children('td:first').children(':checkbox');
		if (checkbox[0].checked) {
			checkbox[0].checked = false;
			$(this).children('td:first').children('.splashy-check').hide();
	
		} else {
			checkbox[0].checked = true;
			$(this).children('td:first').children('.splashy-check').show();
		}
		e.stopPropagation();
	}
});

$(document).on('click', '#selecionar_todos', function (e) {
    e.preventDefault();
	
    checkbox = $('.checkbox-all');
    if (!checkbox[0].checked) {
        $('#table_produtos tbody input[type=checkbox]').each(function () {
            this.checked = true;
            icon = $(this).siblings('.splashy-check');
            $(icon[0]).show();
            checkbox[0].checked = true;
        })
    } else {
        $('#table_produtos tbody input[type=checkbox]').each(function () {
            this.checked = false;
            icon = $(this).siblings('.splashy-check');
            $(icon[0]).hide();
            checkbox[0].checked = false;
        });
    }
    e.stopPropagation();
});

$(".permissoes-modulo").live("change",function(){
	$tr_parent = $(this).parents('tr');
	if($(this).attr('checked') == 'checked'){
		$tr_parent.find('.permissoes-modulo-operacoes').show();
		$tr_parent.find('.permissoes-modulo-operacao').attr('checked','checked');
		$tr_parent.find('span').addClass('checked');
	}
	else{
		$tr_parent.find('.permissoes-modulo-operacoes').hide();
		$tr_parent.find('.permissoes-modulo-operacao').removeAttr('checked');
		$tr_parent.find('span').removeClass('checked');
	}
});

$(".btn-delete").live("click",function(){
	var time = new Date().getTime();
	$.ajax({
		url: $(this).attr('href')+'&time='+time,
		beforeSend: function ( xhr ) {
			$(".modal").find('.modal-header > h3').text('Carregando...');
			$(".modal").find('.modal-body').html('<img src="'+baseUrl+'/img/loading.gif" />');
			$(".modal").modal('show');
		},
		success:function ( data) {
			$(".modal").html(data);
		},
	});
	return false;

});