<?php

class ModuloArquivoController extends GxController {


    public function getRepresentingFields(){
		return ModuloArquivo::representingColumn();
	}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'ModuloArquivo'),
		));
	}

	public function actionCreate() {
		$model = new ModuloArquivo;

		if (isset($_POST['ModuloArquivo'])) {
			$model->setAttributes($_POST['ModuloArquivo']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect($this->createUrlRel('view',array('id' => $model->idmodulo_arquivo,'success'=>'create')));
			}
		}
        else{
			$model->setAttributes($this->rel_conditions);
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'ModuloArquivo');

		if (isset($_POST['ModuloArquivo'])) {
			$model->setAttributes($_POST['ModuloArquivo']);

			if ($model->save()) {
                $this->redirect($this->createUrlRel('view',array('id' => $model->idmodulo_arquivo,'success'=>'update')));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		$model = $this->loadModel($id, 'ModuloArquivo');
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
		$model=ModuloArquivo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionIndex() {
		$criteria = new CDbCriteria;

		//Códgio de busca
		if(isset($_GET['q'])){
			$model = new ModuloArquivo();
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
        	$criteria->order = 'idmodulo_arquivo desc';
        }

		if(count($this->rel_conditions) > 0){
			foreach($this->rel_conditions as $field => $value){
				$criteria->addCondition($field." = '".$value."'");
			}
		}

		$dataProvider = new CActiveDataProvider('ModuloArquivo', array(
            'criteria'=>$criteria,
			'pagination' => array(
				'pageSize'=> Yii::app()->user->pageSize,
				'pageVar'=>'p',
			),
    	));

		$this->render('index', array(
			'dataProvider' => $dataProvider,
			'model' => ModuloArquivo::model(),
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
		if(is_numeric($_GET['idcategoria'])){
			$modulosubcat = ModuloSubcategoria::model()->findByPk($_GET['idsubcategoria']);
			$this->rel_conditions['idmodulo_subcategoria'] = $_GET['idsubcategoria'];
			$this->rel_link['idsubcategoria'] = $_GET['idsubcategoria'];
			if(Yii::app()->user->obj->group->temPermissaoAction('moduloSubcategoria','index')){
				$this->breadcrumbs[$modulosubcat->label(2)] = array('moduloSubcategoria/index');
				$this->breadcrumbs[$modulosubcat->nome] = array('moduloSubcategoria/view','id'=>$modulosubcat->idmodulo_subcategoria);
			}
			else{
				$this->breadcrumbs[] = ModuloSubcategoria::label(2);
				$this->breadcrumbs[] = $modulosubcat->nome;
			}
		}

		return parent::beforeAction($action);
	}

}
