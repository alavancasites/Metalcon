<?php

/**
 * This is the model base class for the table "perfil".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Perfil".
 *
 * Columns in table "perfil" available as properties of the model,
 * followed by relations of table "perfil" available as properties of the model.
 *
 * @property integer $idperfil
 * @property string $nome
 * @property string $ativo
 *
 * @property PerfilAcesso[] $perfilAcessos
 * @property Usuario[] $usuarios
 */
abstract class BasePerfil extends GxActiveRecord {
	
    
        
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'perfil';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Perfil|Perfils', $n);
	}

	public static function representingColumn() {
		return array('nome');
	}

	public function rules() {
		return array(
			array('nome', 'length', 'max'=>100),
			array('ativo', 'length', 'max'=>1),
			array('nome, ativo', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idperfil, nome, ativo', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'perfilAcessos' => array(self::HAS_MANY, 'PerfilAcesso', 'idperfil'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'idperfil'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idperfil' => Yii::t('app', 'Idperfil'),
			'nome' => Yii::t('app', 'Nome'),
			'ativo' => Yii::t('app', 'Ativo'),
			'perfilAcessos' => null,
			'usuarios' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idperfil', $this->idperfil);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('ativo', $this->ativo, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}