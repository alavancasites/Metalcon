$(function() {
	$(window).scroll(function()
	{
	var topo = $('#topo').height(); // altura do topo
	var rodape = $('#rodape').height(); // altura do rodape
	var scrollTop = $(window).scrollTop(); // qto foi rolado a barra
	var tamPagina = $(document).height(); // altura da página
	 
	if(scrollTop > topo){
	  $('#menu').css({'position' : 'absolute', 'margin-top' : scrollTop-215});
	}else{
	  $('#menu').css({'position' : 'relative', 'margin-top' : 0});
	}               
	});
});
$('.produto-destination').live('click',function(e){
	console.log(e.target.nodeName);
	if(e.target.nodeName != 'INPUT'){
		$(this).find('.produto-destination-checkbox').attr('checked',!$(this).find('.produto-destination-checkbox').attr('checked'));
	}
	calcularSelecionados();
});

$('.produto-source').live('click',function(){
	var value = $('.produto-destination[data-source-sku="'+$(this).attr('data-source-sku')+'"]').find('.produto-destination-checkbox').attr('checked');
	$('.produto-destination[data-source-sku="'+$(this).attr('data-source-sku')+'"]').find('.produto-destination-checkbox').each(function(x,elem){
		$(this).attr('checked',!value);	
	});
	calcularSelecionados();
});

$('.btn-selecionar-todos').live('click',function(){
	
	$('.produto-destination-checkbox').attr('checked','checked');
	calcularSelecionados();
	return false;
	
});

$('.btn-limpar-todos').live('click',function(){
	
	$('.produto-destination-checkbox').removeAttr('checked');
	calcularSelecionados();
	return false;
	
});

$('.produto-destination-checkbox').live('change',function(){
	calcularSelecionados();
});

function calcularSelecionados(){
	$('.qtd-selecionados').html($('.produto-destination-checkbox:checked').length);
}