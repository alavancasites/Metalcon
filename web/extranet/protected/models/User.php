<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser
{
	
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    
    public function init(){
		$this->createDate = date('d/m/Y H:i:s');
		$this->updateDate = date('d/m/Y H:i:s');
  		
    }
    
	public function cryptoSenha($senha) {
        return md5('&xh1%2as$(px827%-' . $senha);
    }
	
	public function senhaValida($senha, $senha_encript = false) {
        if (!$senha_encript)
            return $this->cryptoSenha($senha) == $this->password;
        return $senha == $this->password;
    }
	
    public function beforeSave(){
		if ($this->password != "") {
			$this->password = $this->cryptoSenha($this->password);
		}
		
		if($this->createDate != "")
				$this->createDate= Util::formataDataHoraBanco($this->createDate);
		if($this->updateDate != "")
				$this->updateDate= Util::formataDataHoraBanco($this->updateDate);
		//{{beforeSave}}
		return parent::beforeSave();
	}
	
	public function afterFind(){
		
		$this->name = $this->firstName.' '.$this->lastName;
		
		if($this->createDate != "")
				$this->createDate = Util::formataDataHoraApp($this->createDate);
		if($this->updateDate != "")
				$this->updateDate = Util::formataDataHoraApp($this->updateDate);
		//{{afterFind}}
		return parent::afterFind();
	}
    
    public function behaviors(){
    	return array(
        	//{{behaviors}}
        );
    }
	
	public function getIdTenant(){
		return Yii::app()->user->obj->idTenant;
	}
    
        
}