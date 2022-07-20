<?php

Yii::import('application.models._base.BasePerfil');

class Perfil extends BasePerfil
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}


    public function init(){

		$this->categorias = array();
    }

    public function beforeSave(){
		//{{beforeSave}}
		return parent::beforeSave();
	}

	public function afterFind(){

		$this->categorias = array();
		if(count($this->perfilAcessos)){
			foreach ($this->perfilAcessos as $key => $item) {
				$this->categorias[] = $item->idcategoria;
			}
		}
		//{{afterFind}}
		return parent::afterFind();
	}

    public function behaviors(){
    	return array(
        	//{{behaviors}}
        );
    }

	public function saveItens(){
		$criteria = new CDbCriteria;
		$criteria->addCondition("idperfil = '".$this->idperfil."'");
		PerfilAcesso::model()->deleteAll($criteria);
		if(count($this->categorias)){
			foreach($this->categorias as $id){
				$related = new PerfilAcesso();
				$related->idperfil = $this->idperfil;
				$related->idcategoria = $id;
				$related->insert();
			}
		}
		return true;
	}


}
