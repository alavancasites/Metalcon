<?php

/*
thumbnail/fill/500x500/Empresa/brsis_teste_2_teste_novo_1456166364459.jpg
thumbnail/resize/500x500/Empresa/brsis_teste_2_teste_novo_1456166364459.jpg
thumbnail/crop/500x500/Empresa/brsis_teste_2_teste_novo_1456166364459.jpg
*/


class ThumbnailController extends GxController {
	
	
	public function renderizar($extensao,$arquivo_destino){
		ob_clean();
		ob_start();
		switch($extensao)
		{
			case 'jpg':
			case 'jpeg':
			case 'bmp':
				header( "Content-type: image/jpeg" );
				break;
			case 'png':
				header( "Content-type: image/png" );
				break;
			case 'gif':
				header( "Content-type: image/gif" );
				break;
			default:
				return false;
				break;
		}
		echo file_get_contents($arquivo_destino);
		exit;
	}
	
	public function actionOriginal($model,$img) {
		$arquivo_destino = 'uploads/'.$model.'/'.$img;
		if($model == 'gallery'){
			$arquivo_destino = 'gallery/'.$img;
		}
		
		if(!is_file($arquivo_destino)){
			$arquivo_destino = 'img/imagem_nao_cadastrada.png';	
		}
		$extensao = strtolower(end(explode(".",$arquivo_destino)));
		$this->renderizar($extensao,$arquivo_destino);
	}
	
	public function actionRedimensionar($tipo,$dimensoes,$model,$img) {
		
		$dimensoes_array = explode('x',$dimensoes);
		$l = is_numeric($dimensoes_array[0]) ? $dimensoes_array[0] : 0;
		$a = is_numeric($dimensoes_array[1]) ? $dimensoes_array[1] : 0;
		
		$arquivo_destino = 'uploads/'.$model.'/'.$img;
		if($model == 'gallery'){
			$arquivo_destino = 'gallery/'.$img;
		}
		
		if(!is_file($arquivo_destino)){
			$arquivo_destino = 'img/imagem_nao_cadastrada.png';	
		}
		$extensao = strtolower(end(explode(".",$arquivo_destino)));
		
		/*echo "model=$model<br/>";
		echo "img=$img<br/>";
		echo "extensao=$extensao<br/>";
		echo "l=$l<br/>";
		echo "a=$a<br/>";
		echo "arquivo_destino=$arquivo_destino<br/>";
		exit;*/
		
		$arquivo = str_replace(".","_".$tipo."_".$l."x".$a.".",$arquivo_destino);
		
		if(!is_file($arquivo)){
			$oImg = new m2brimagem($arquivo_destino);
			$valida = $oImg->valida();
			if ($valida == 'OK') {
				$oImg->redimensiona($l,$a,$tipo);
				$oImg->grava($arquivo);
			} 
			else {
				die($valida);
			}	
		}
		$arquivo_destino = $arquivo;
		
		$this->renderizar($extensao,$arquivo_destino);
		
	}
    
    public function afterAction($action){
		return parent::afterAction($action);
	}
	
	public function beforeAction($action){
		return parent::beforeAction($action);
	}

}