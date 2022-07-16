<?php

class ModuloSubcategoriaController extends GxController {


    public function getRepresentingFields(){
		return ModuloSubcategoria::representingColumn();
	}

	public function actionOrdenacao() {
        if (is_array($_GET['listItem'])) {

            $pagina = $_GET['num_pagina'];
            $page_size = $_GET['page_size'];
            $pagination = $page_size * ($pagina-1);

            $itens = $_GET['listItem'];
            foreach ($itens as $posicao => $id) {
                $new_posicao = $pagination+($posicao+1);
                ModuloSubcategoria::model()->updateByPk($id, array('posicao' => $new_posicao));
            }
        }
        exit;
    }

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'ModuloSubcategoria'),
		));
	}

	public function actionCreate() {
		$model = new ModuloSubcategoria;

		if (isset($_POST['ModuloSubcategoria'])) {
			$model->setAttributes($_POST['ModuloSubcategoria']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect($this->createUrlRel('view',array('id' => $model->idmodulo_subcategoria,'success'=>'create')));
			}
		}
        else{
			$model->setAttributes($this->rel_conditions);
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'ModuloSubcategoria');

		if (isset($_POST['ModuloSubcategoria'])) {
			$model->setAttributes($_POST['ModuloSubcategoria']);

			if ($model->save()) {
                $this->redirect($this->createUrlRel('view',array('id' => $model->idmodulo_subcategoria,'success'=>'update')));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		$model = $this->loadModel($id, 'ModuloSubcategoria');
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
		$model=ModuloSubcategoria::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionIndex() {
		$criteria = new CDbCriteria;

		//Códgio de busca
		if(isset($_GET['q'])){
			$model = new ModuloSubcategoria();
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
        	$criteria->order = 'posicao asc';
        }

		if(count($this->rel_conditions) > 0){
			foreach($this->rel_conditions as $field => $value){
				$criteria->addCondition($field." = '".$value."'");
			}
		}

		$dataProvider = new CActiveDataProvider('ModuloSubcategoria', array(
            'criteria'=>$criteria,
			'pagination' => array(
				'pageSize'=> Yii::app()->user->pageSize,
				'pageVar'=>'p',
			),
    	));

		$this->render('index', array(
			'dataProvider' => $dataProvider,
			'model' => ModuloSubcategoria::model(),
		));
	}

    public function afterAction($action){
		Yii::app()->user->returnUrl = Yii::app()->request->requestUri;
		return parent::afterAction($action);
	}

	public function beforeAction($action){

		if(is_numeric($_GET['idmodulo'])){
			$modulo = Modulo::model()->findByPk($_GET['idmodulo']);
			$this->rel_link['idmodulo'] = $_GET['idmodulo'];
			if(Yii::app()->user->obj->group->temPermissaoAction('modulo','index')){
				$this->breadcrumbs[$modulo->label(2)] = array('modulo/index');
				$this->breadcrumbs[$modulo->nome] = array('modulo/view','id'=>$modulo->idmodulo);
			}
			else{
				$this->breadcrumbs[] = Modulo::label(2);
				$this->breadcrumbs[] = $modulo->nome;
			}
		}

		if(is_numeric($_GET['idcategoria'])){
			$modulocat = ModuloCategoria::model()->findByPk($_GET['idcategoria']);
			$this->rel_conditions['idcategoria'] = $_GET['idcategoria'];
			$this->rel_link['idcategoria'] = $_GET['idcategoria'];
			if(Yii::app()->user->obj->group->temPermissaoAction('moduloCategoria','index')){
				$this->breadcrumbs[$modulocat->label(2)] = array('moduloCategoria/index');
				$this->breadcrumbs[$modulocat->nome] = array('moduloCategoria/view','id'=>$modulocat->idcategoria);
			}
			else{
				$this->breadcrumbs[] = ModuloCategoria::label(2);
				$this->breadcrumbs[] = $modulocat->nome;
			}
		}


		return parent::beforeAction($action);
	}

}
