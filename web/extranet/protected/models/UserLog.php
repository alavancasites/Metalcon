<?php

Yii::import('application.models._base.BaseUserLog');

class UserLog extends BaseUserLog
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    
    public function init(){
		$this->date = date('d/m/Y H:i:s');
  
    }
    
    public function beforeSave(){
		if($this->date != "")
				$this->date= Util::formataDataHoraBanco($this->date);
		//{{beforeSave}}
		return parent::beforeSave();
	}
	
	public function afterFind(){
		if($this->date != "")
				$this->date = Util::formataDataHoraApp($this->date);
		//{{afterFind}}
		return parent::afterFind();
	}
    
    public function behaviors(){
    	return array(
        	//{{behaviors}}
        );
    }
    
        
}