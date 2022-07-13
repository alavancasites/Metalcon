<?php

Yii::import('application.models._base.BaseNovidade');

class Novidade extends BaseNovidade
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    
    public function init(){
		$this->data = date('d/m/Y H:i:s');
  
    }
    
    public function beforeSave(){
		if($this->data != "")
				$this->data= Util::formataDataHoraBanco($this->data);
		//{{beforeSave}}
		return parent::beforeSave();
	}
	
	public function afterFind(){
		if($this->data != "")
				$this->data = Util::formataDataHoraApp($this->data);
		//{{afterFind}}
		return parent::afterFind();
	}
    
    public function behaviors(){
    	return array(
			'galeria' => array(
				'class' => 'GalleryBehavior',
				'idAttribute' => 'gallery_id',
				'versions' => array(
					'small' => array(
						'centeredpreview' => array(200, 200),
					),
					'medium' => array(
						'resize' => array(800, null),
					)
				),
				'name' => false,
				'description' => false,
			 )
        	//{{behaviors}}
        );
    }
    
        
}