<?php

class OuvidoriaController extends GxController {

	
    public function getRepresentingFields(){
		return Ouvidoria::representingColumn();
	}
    
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Ouvidoria'),
		));
	}

	public function actionCreate() {
		$model = new Ouvidoria;
        
		if (isset($_POST['Ouvidoria'])) {
			$model->setAttributes($_POST['Ouvidoria']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect($this->createUrlRel('view',array('id' => $model->idcontato,'success'=>'create')));
			}
		}
        else{
			$model->setAttributes($this->rel_conditions);
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Ouvidoria');

		if (isset($_POST['Ouvidoria'])) {
			$model->setAttributes($_POST['Ouvidoria']);

			if ($model->save()) {
                $this->redirect($this->createUrlRel('view',array('id' => $model->idcontato,'success'=>'update')));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		$model = $this->loadModel($id, 'Ouvidoria');
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
	public function actionAtivar($id){
		$model=$this->loadModel($id);
		$model->ativo= 1;
		$model->update();
		Yii::app()->request->redirect(Yii::app()->user->returnUrl);
	}
	
	public function actionDesativar($id){
		$model=$this->loadModel($id);
		$model->ativo= 0;
		$model->update();
		Yii::app()->request->redirect(Yii::app()->user->returnUrl);
	}

	public function loadModel($id)
	{
		$model=Ouvidoria::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionIndex() {
		$criteria = new CDbCriteria;
		
		//C�dgio de busca
		if(isset($_GET['q'])){
			$model = new Ouvidoria();
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
        	$criteria->order = 'idcontato desc';
        }
		
		if(count($this->rel_conditions) > 0){
			foreach($this->rel_conditions as $field => $value){
				$criteria->addCondition($field." = '".$value."'");
			}
		}
		
		$dataProvider = new CActiveDataProvider('Ouvidoria', array(
            'criteria'=>$criteria,
			'pagination' => array(
				'pageSize'=> Yii::app()->user->pageSize,
				'pageVar'=>'p',
			),
    	));
		
		$this->render('index', array(
			'dataProvider' => $dataProvider,
			'model' => Ouvidoria::model(),
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