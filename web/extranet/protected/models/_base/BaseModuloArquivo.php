<?php

/**
 * This is the model base class for the table "modulo_arquivo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ModuloArquivo".
 *
 * Columns in table "modulo_arquivo" available as properties of the model,
 * followed by relations of table "modulo_arquivo" available as properties of the model.
 *
 * @property integer $idmodulo_arquivo
 * @property string $data
 * @property integer $idmodulo_subcategoria
 * @property string $nome
 * @property string $descricao
 * @property string $arquivo
 * @property string $ativo
 *
 * @property ModuloSubcategoria $moduloSubcategoria
 * @property ModuloDownload[] $moduloDownloads
 */
abstract class BaseModuloArquivo extends GxActiveRecord {



	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'modulo_arquivo';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Arquivo|Arquivos', $n);
	}

	public static function representingColumn() {
		return array('nome');
	}

	public function rules() {
		return array(
			array('idmodulo_subcategoria', 'required'),
			array('idmodulo_subcategoria', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>100),
			array('arquivo', 'length', 'max'=>140),
			array('ativo', 'length', 'max'=>1),
			array('data, descricao', 'safe'),
			array('data, nome, descricao, arquivo, ativo', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idmodulo_arquivo, data, idmodulo_subcategoria, nome, descricao, arquivo, ativo', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'moduloSubcategoria' => array(self::BELONGS_TO, 'ModuloSubcategoria', 'idmodulo_subcategoria'),
			'moduloDownloads' => array(self::HAS_MANY, 'ModuloDownload', 'idmodulo_arquivo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idmodulo_arquivo' => Yii::t('app', 'Idmodulo Arquivo'),
			'data' => Yii::t('app', 'Data'),
			'idmodulo_subcategoria' => null,
			'nome' => Yii::t('app', 'Nome'),
			'descricao' => Yii::t('app', 'Descricao'),
			'arquivo' => Yii::t('app', 'Arquivo'),
			'ativo' => Yii::t('app', 'Ativo'),
			'moduloSubcategoria' => null,
			'moduloDownloads' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idmodulo_arquivo', $this->idmodulo_arquivo);
		$criteria->compare('data', $this->data, true);
		$criteria->compare('idmodulo_subcategoria', $this->idmodulo_subcategoria);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('descricao', $this->descricao, true);
		$criteria->compare('arquivo', $this->arquivo, true);
		$criteria->compare('ativo', $this->ativo, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
