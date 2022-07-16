<?php

Yii::import('application.models._base.BaseModulo');

class Modulo extends BaseModulo
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}


    public function init(){

    }

	public function getLast()
	{
		$pos = 1;
		$obj = $this->find(array('order' => 'posicao desc'));
		if (is_object($obj)) {
			$pos = $obj->posicao + 1;
		}
		return $pos;
	}
	
    public function beforeValidate(){
		$this->url = Util::removerAcentos($this->nome);
		//{{beforeValidate}}
		return parent::beforeValidate();
	}
    public function beforeSave(){
		//{{beforeSave}}
		return parent::beforeSave();
	}

	public function afterFind(){
		//{{afterFind}}
		return parent::afterFind();
	}

    public function behaviors(){
    	return array(
        	//{{behaviors}}
        );
    }


}
