<?php

/**
 * This is the model base class for the table "modulo_download".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ModuloDownload".
 *
 * Columns in table "modulo_download" available as properties of the model,
 * followed by relations of table "modulo_download" available as properties of the model.
 *
 * @property integer $idmodulo_download
 * @property integer $idmodulo_arquivo
 * @property integer $idusuario
 * @property string $data
 * @property string $ativo
 *
 * @property ModuloArquivo $moduloArquivo
 * @property Usuario $usuario
 */
abstract class BaseModuloDownload extends GxActiveRecord {
	
    
        
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'modulo_download';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ModuloDownload|ModuloDownloads', $n);
	}

	public static function representingColumn() {
		return array('data');
	}

	public function rules() {
		return array(
			array('idmodulo_arquivo, idusuario', 'required'),
			array('idmodulo_arquivo, idusuario', 'numerical', 'integerOnly'=>true),
			array('ativo', 'length', 'max'=>1),
			array('data', 'safe'),
			array('data, ativo', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idmodulo_download, idmodulo_arquivo, idusuario, data, ativo', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'moduloArquivo' => array(self::BELONGS_TO, 'ModuloArquivo', 'idmodulo_arquivo'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'idusuario'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idmodulo_download' => Yii::t('app', 'Idmodulo Download'),
			'idmodulo_arquivo' => null,
			'idusuario' => null,
			'data' => Yii::t('app', 'Data'),
			'ativo' => Yii::t('app', 'Ativo'),
			'moduloArquivo' => null,
			'usuario' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idmodulo_download', $this->idmodulo_download);
		$criteria->compare('idmodulo_arquivo', $this->idmodulo_arquivo);
		$criteria->compare('idusuario', $this->idusuario);
		$criteria->compare('data', $this->data, true);
		$criteria->compare('ativo', $this->ativo, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}