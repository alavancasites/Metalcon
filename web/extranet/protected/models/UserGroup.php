<?php

Yii::import('application.models._base.BaseUserGroup');

class UserGroup extends BaseUserGroup
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function init(){
  
    }
	
    public function beforeSave(){
		$this->permissions = CJSON::encode($this->permissions);
		//{{beforeSave}}
		return parent::beforeSave();
	}
	
	public function trataString($string){
		return preg_replace("/[^a-z\s]/", "", strtolower($string));
	}
	
	public function afterFind(){
		$this->permissions = CJSON::decode($this->permissions,true);
		if(!is_array($this->permissions))
			$this->permissions = array();
		//{{afterFind}}
		return parent::afterFind();
	}
	
	public function temPermissaoController($controller){
		
		$array_permissoes = $this->permissions;
		return is_array($array_permissoes[$this->trataString($controller)]);
	}
	
	public function temPermissaoAction($controller,$action){
		$array_permissoes = $this->permissions;
		if(is_array($array_modulo = $array_permissoes[$this->trataString($controller)])){
			return in_array(strtolower($action),$array_modulo);
		}
		return false;
	}
	
	public function representingLabel(){
		$field = $this->representingColumn();
		return $this->$field;
	}
    
    public function behaviors(){
    	return array(
        	//{{behaviors}}
        );
    }
    
        
}