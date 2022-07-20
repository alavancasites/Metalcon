<?php

Yii::import('application.models._base.BaseUsuario');

class Usuario extends BaseUsuario
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}


	public function init(){

	}

	public function cryptoSenha($senha){
		return md5('&xhup4x0x0t4%-'.$senha);
	}

	public function senhaValida($senha,$senha_encript = false){
		if(!$senha_encript)
		return $this->cryptoSenha($senha) == $this->senha;
		return $senha == $this->senha;
	}

	public function beforeValidate(){
		$this->cpf = Util::soNumero($this->cpf);
		return parent::beforeValidate();
	}
	public function beforeSave(){
		$this->cpf = Util::soNumero($this->cpf);
		if ($this->senha != "") {
			$this->senha = $this->cryptoSenha($this->senha);
		}
		elseif(!$this->isNewRecord){
			unset($this->senha);
		}
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
	public function gerarSenha(){
		$nova_senha = substr(md5('nova senha para o user '.$this->cpf.time()), 4, 6);

		$message = new YiiMailMessage;
		$message->view = 'nova_senha';
		$message->setBody(array('model' => $this, 'senha' => $nova_senha),'text/html','latin1');
		$message->subject = 'Nova senha'.' - '.date('d/m/Y H:i:s');
		$message->addTo($this->email);
		// $message->setReplyTo($this->email);
		$message->setFrom(array('noreply@popupdigital.com.br'  => Yii::app()->name));
		if(Yii::app()->mail->send($message)){
			$this->senha = $nova_senha;
			$this->update(array('senha'));
			return true;
		}
		return false;
	}


}
