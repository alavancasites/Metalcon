<?php

class UserController extends GxController {

	
    public function getRepresentingFields(){
		return User::representingColumn();
	}
    
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'User'),
		));
	}

	public function actionCreate() {
		$model = new User;
        
		if (isset($_POST['User'])) {
			$model->setAttributes($_POST['User']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect($this->createUrlRel('view',array('id' => $model->idUser,'success'=>'create')));
			}
		}
        else{
			$model->setAttributes($this->rel_conditions);
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'User');

		if (isset($_POST['User'])) {
			$model->setAttributes($_POST['User']);

			if ($model->save()) {
                $this->redirect($this->createUrlRel('view',array('id' => $model->idUser,'success'=>'update')));
			}
		}
		else{
			$model->password = "";
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		$model = $this->loadModel($id, 'User');
		if($_GET['confirm'] == 1){
			$model->delete();
			if($_GET['ajax'] == 1){
				echo CJSON::encode(array('sucesso' => '1'));
				Yii::app()->end();
			}
			else
				$this->redirect($this->createUrlRel('index'));			
		}
		else{
			$this->renderPartial("//site/delete_console", array(
				'model' => $model,
			));
		}
	}
	
	public function actionMe(){
		
		$model = $this->loadModel(Yii::app()->user->obj->idUser, 'User');
		
		$model->scenario = 'me';
		
		if (isset($_POST['User'])) {
			
			$model->firstName = $_POST['User']['firstName'];
			$model->lastName = $_POST['User']['lastName'];
			$model->email = $_POST['User']['email'];

			if ($model->save()) {
                $this->redirect($this->createUrlRel('me',array('success'=>'update')));
			}
		}
		
		$this->render("me", array(
			'model' => $model,
		));
		
	}
	
	public function actionPassword(){
		$model = new User;
		
		$model->scenario = 'password';
		
		if (isset($_POST['User'])) {
			
			$model->password = $_POST['User']['password'];
			$model->password_confirm = $_POST['User']['password_confirm'];
			$model->password_current = $_POST['User']['password_current'];

			if ($model->validate(array('password','password_confirm','password_current'))) {
                $model->updateByPk(Yii::app()->user->obj->idUser,array(
					'password' => $model->cryptoSenha($model->password),
				));
				$this->redirect($this->createUrlRel('password',array('success'=>'update')));
			}
		}
		
		$this->render("password", array(
			'model' => $model,
		));
	}
	
	public function actionIndex() {
		$criteria = new CDbCriteria;
		
		//Códgio de busca
		if(isset($_GET['q'])){
			$model = new User();
			$atributos = $model->tableSchema->columns;
					
			foreach($atributos as $att){
				if(!$att->isPrimaryKey && !$att->isForeignKey)
					$criteria->addCondition($att->name." like '%".$_GET['q']."%'", "OR");
			}
		}
		
		if(isset($_GET['o']) && isset($_GET['f']) ){
			$criteria->order = $_GET['f']." ".$_GET['o'];
		}
        else{
        	$criteria->order = 'idUser';
        }
		
		if(count($this->rel_conditions) > 0){
			foreach($this->rel_conditions as $field => $value){
				$criteria->addCondition($field." = '".$value."'");
			}
		}
		
		$dataProvider = new CActiveDataProvider('User', array(
            'criteria'=>$criteria,
			'pagination' => array(
				'pageSize'=> Yii::app()->user->pageSize,
				'pageVar'=>'p',
			),
    	));
		
		$this->render('index', array(
			'dataProvider' => $dataProvider,
			'model' => User::model(),
		));
	}
    
    public function afterAction($action){
		Yii::app()->user->returnUrl = Yii::app()->request->requestUri;
		return parent::afterAction($action);
	}
	
	public function beforeAction($action){
		/*
        if(is_numeric($_GET['idlinha'])){
			$linha = Linha::model()->findByPk($_GET['idlinha']);
			$this->rel_conditions['idlinha'] = $_GET['idlinha'];
			$this->rel_link['idlinha'] = $_GET['idlinha'];
			if(Yii::app()->user->obj->group->temPermissaoAction('linha','index')){
				$this->breadcrumbs[$linha->label(2)] = array('linha/index');
				$this->breadcrumbs[$linha->nome] = array('linha/view','id'=>$linha->idlinha);
			}
			else{
				$this->breadcrumbs[] = Linha::label(2);
				$this->breadcrumbs[] = $linha->nome;
			}
		}
        */
        
		return parent::beforeAction($action);
	}

}