<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to 'column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/main';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

	public $rel=array();
	
	public $rel_conditions = array();
	public $rel_link = array();

    public function beforeAction($action) {
		//Registro do log
		$userLog = new UserLog();
        $userLog->ip = getenv("REMOTE_ADDR");
        if (!Yii::app()->user->isGuest && is_object(Yii::app()->user->obj)) {
            $userLog->idUser = Yii::app()->user->obj->idUser;
            $userLog->userName = Yii::app()->user->obj->firstName.' '.Yii::app()->user->obj->lastName;
            $userLog->userEmail = Yii::app()->user->obj->email;
        }
        $userLog->controller = $this->id;
        $userLog->action = $action->id;
        $userLog->get = CJSON::encode($_GET);
        $userLog->post = CJSON::encode($_POST);
		$userLog->accessStatus = 'error';
		
		if(is_numeric($_GET['pageSize']) && $_GET['pageSize'] != 0){
			Yii::app()->user->pageSize = $_GET['pageSize'];
	    }
		
		$routes_public = array(
		
			'site/login',
			'site/enviar_link_senha',
			'site/logout',
			'site/index',
			'site/getCidades',
			'site/cidade_json',
			'thumbnail/redimensionar',
			'thumbnail/original',
		);
		
		$routes_logged = array(
		);
		
		$current_route = $this->id.'/'.$this->action->id;
		if(in_array($current_route,$routes_public)){
			$userLog->accessStatus = 'success';
			$userLog->save();
			return parent::beforeAction($action);
		}
		
		if(Yii::app()->user->isGuest){
			
			Yii::app()->user->returnUrl =  Yii::app()->request->requestUri;
			
			$userLog->save();
			$this->redirect($this->createUrl("site/login"));
			return false;
		}
		
		if(!Yii::app()->user->obj->group->temPermissaoAction($this->id,$this->action->id)){
			$userLog->save();
			$this->render("//site/error", array(
				'code' => '405',
				'message' => "Você não tem permissão para acessar esta opção.",
			));
			return false;
		}
		
		$userLog->accessStatus = 'success';
		return parent::beforeAction($action);
       
    }
	
	public function hasRel($id = ""){
		if($id != "")
			return count($this->rel[$id]) > 0;
		return count($this->rel) > 0;
	}
	
	public function setRel($rel){
		if(is_array($rel))
			$this->rel = $rel;
	}
	
	public function getRel($id = ""){
		if($id != "")
			return $this->rel[$id];
		return $this->rel;
	}
	
	
	public function createUrlRel($route,$params=array()){
		if(count($this->rel_link) > 0){
			$params = array_merge($params,$this->rel_link);
		}
		return parent::createUrl($route,$params);
	}

}
