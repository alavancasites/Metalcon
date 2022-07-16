<?php

Yii::import('application.models._base.BaseUsuarioRecuperasenha');

class UsuarioRecuperasenha extends BaseUsuarioRecuperasenha
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    
    public function init(){
		$this->data_valido = date('d/m/Y H:i:s');
  
    }
    
    public function beforeSave(){
		if($this->data_valido != "")
				$this->data_valido= Util::formataDataHoraBanco($this->data_valido);
		//{{beforeSave}}
		return parent::beforeSave();
	}
	
	public function afterFind(){
		if($this->data_valido != "")
				$this->data_valido = Util::formataDataHoraApp($this->data_valido);
		//{{afterFind}}
		return parent::afterFind();
	}
    
    public function behaviors(){
    	return array(
        	//{{behaviors}}
        );
    }
    
        
}