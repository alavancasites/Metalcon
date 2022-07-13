<?php

/**
 * This is the model base class for the table "userLog".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserLog".
 *
 * Columns in table "userLog" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $idUserLog
 * @property string $ip
 * @property string $date
 * @property integer $idUser
 * @property string $userName
 * @property string $userEmail
 * @property string $controller
 * @property string $action
 * @property string $get
 * @property string $post
 * @property string $accessStatus
 *
 */
abstract class BaseUserLog extends GxActiveRecord {
	
    
        
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'userlog';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserLog|UserLogs', $n);
	}

	public static function representingColumn() {
		return array('ip');
	}

	public function rules() {
		return array(
			array('idUser', 'numerical', 'integerOnly'=>true),
			array('ip, userName, userEmail, controller, action, accessStatus', 'length', 'max'=>100),
			array('date, get, post', 'safe'),
			array('ip, date, idUser, userName, userEmail, controller, action, get, post, accessStatus', 'default', 'setOnEmpty' => true, 'value' => null),
			array('idUserLog, ip, date, idUser, userName, userEmail, controller, action, get, post, accessStatus', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'idUserLog' => Yii::t('app', 'Id User Log'),
			'ip' => Yii::t('app', 'Ip'),
			'date' => Yii::t('app', 'Date'),
			'idUser' => Yii::t('app', 'Id User'),
			'userName' => Yii::t('app', 'User Name'),
			'userEmail' => Yii::t('app', 'User Email'),
			'controller' => Yii::t('app', 'Controller'),
			'action' => Yii::t('app', 'Action'),
			'get' => Yii::t('app', 'Get'),
			'post' => Yii::t('app', 'Post'),
			'accessStatus' => Yii::t('app', 'Access Status'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('idUserLog', $this->idUserLog);
		$criteria->compare('ip', $this->ip, true);
		$criteria->compare('date', $this->date, true);
		$criteria->compare('idUser', $this->idUser);
		$criteria->compare('userName', $this->userName, true);
		$criteria->compare('userEmail', $this->userEmail, true);
		$criteria->compare('controller', $this->controller, true);
		$criteria->compare('action', $this->action, true);
		$criteria->compare('get', $this->get, true);
		$criteria->compare('post', $this->post, true);
		$criteria->compare('accessStatus', $this->accessStatus, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}