function ativaUploaderArquivos(class_ref,campo,patch){
	if($('#'+campo).size() > 0){   
	
		
		var uploader = new plupload.Uploader({
			runtimes : 'html5,silverlight,flash',
			required_features: 'chunks',
			url : patch+'/upload.php?class='+class_ref,
			browse_button : campo+'_pickfiles',
			max_file_size : '10gb',
			chunk_size : '1mb',
			multi_selection : false,
			multipart: true,
			flash_swf_url : patch+'/js/plupload.flash.swf',
			silverlight_xap_url : patch+'/js/plupload.silverlight.xap',
		});
		
		var label_upload_btn = '<i class="fa fa-upload"></i> Selecionar arquivo';
		
		
		uploader.bind('Init', function(up, params) {
			$('#'+campo).prepend(' \
					<a id="'+campo+'_pickfiles" class="btn btn-upload span6">'+label_upload_btn+'</a><div class="clearfix"></div>\
					<div class="progress span6" style="display:none; margin-top:10px;margin-left: 0px;"><div class="bar"></div></div><div class="clearfix"></div> \
			');
			
			
			if(params.runtime == 'silverlight' || params.runtime == 'flash')
				$('#'+campo).after('<div class="pluplpad_obs">Utlizando: ' + params.runtime + '. Para melhorar a velocidade do upload utilize o navegador <a href="https://www.google.com/chrome" target="_blank" >Chrome</a>.<br/> Com o navegador atual o upload pode demorar atИ 5 vezes mais.</div>');
		});
		
		uploader.bind('FilesAdded', function(up, files) {
			$('#'+campo).children('.btn-upload').html('<i class="icon-refresh icon-spin"></i> <span class="percent">Conectando...</span>');
			setTimeout(function() {
				uploader.start();					
			},400);
		});
		  
		uploader.bind('UploadFile', function(up, file) {
			data = new Date();
			file.name = retiraAcento(file.name);
			file.name = file.name.replace(".","_" + data.getTime() + ".");
			nome_array  = file.name.split('.');
			$('#'+campo).find('input[name="'+class_ref+'['+campo+']"]').val(file.name);
			$('#'+campo).children('.btn-upload').addClass('disabled');
			$('#'+campo).children('.progress').show();
		});
		
		uploader.bind('UploadProgress', function(up, file) {
			$('#'+campo).find('.percent').text(file.percent+"%");
			$('#'+campo).children('.progress').children('.bar').css("width",file.percent+"%");
			$('#'+campo).children('.msg_status').find('.status').html(+file.percent+"%");
			if(file.percent == 100)
				$('#'+campo).children('.btn-upload').html(label_upload_btn);
		});
		
		uploader.bind('FileUploaded', function(up, file) {
			$('#'+campo).children('.btn-upload').removeClass('disabled');
			$('#'+campo).find('.btn-file').attr('href','../uploads/'+class_ref+'/'+file.name);
			$('#'+campo).find('.btn-file').text(file.name);
			$('#'+campo).children('.progress').hide();
			
			//timer = setTimeout("salvar('"+$('#'+campo).parent('div').parent('form').attr('id')+"')",30000);
		
		});
		
		uploader.init();
	}
}

function salvar(elem){
	$('#'+elem).submit();
}

function retiraAcento(text){
	text = text.replace(new RegExp('[аюбц]','gi'), 'A');
	text = text.replace(new RegExp('[ихй]','gi'), 'E');
	text = text.replace(new RegExp('[млн]','gi'), 'I');
	text = text.replace(new RegExp('[срту]','gi'), 'O');
	text = text.replace(new RegExp('[зыш]','gi'), 'U');
	text = text.replace(new RegExp('[г]','gi'), 'C');
	text = text.replace(new RegExp('[ ]','gi'), '_');
	text = text.replace(new RegExp('[^a-zA-Z0-9._]','gi'), '_');	
	text = text.toLowerCase();
	return text;
}

$('.disabled').live('click',function(){return false;});