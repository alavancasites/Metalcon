<?php

class SiteController extends Controller {

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
            'uploadStreaming' => array(
                'class' => 'xupload.actions.XUploadAction',
                'path' => Yii::app()->getBasePath() . "/../uploads",
                'publicPath' => Yii::app()->getBaseUrl() . "/uploads",
            ),
        );
    }
	public function actionGetCidades(){
		$cidades = Cidade::model()->findAll(array(
			'condition' => "idestado = '".$_GET['idestado']."'",
			'order' => 'nome',
		));
		$cidades_list = CHtml::listData($cidades,'idcidade','nome');
		echo CJSON::encode($cidades_list);
		Yii::app()->end();
		
	}

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        if (Yii::app()->user->isGuest) {
            $this->redirect("login");
        }
		else{
        	$this->render('index');
		}
	}
    
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }


    /**
     * Displays the login page
     */
    public function actionLogin() {
        if (!Yii::app()->user->isGuest)
            $this->redirect("site");
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
				if(!empty(Yii::app()->user->returnUrl))
					$this->redirect(Yii::app()->user->returnUrl);
				else
                	$this->redirect("site/index");
            }
        } elseif (isset($_GET['email']) && isset($_GET['senha'])) {
            $model->email = $_GET['email'];
            $model->senha = $_GET['senha'];
            if ($model->login($senha_encript = true))
                $this->redirect('usuario/update?id=' . Yii::app()->user->obj->idUser);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /*public function actionEnviar_link_senha() {
        $model = new RecuperarSenhaForm;

        $sucesso = NULL;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'recuperar-senha-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['RecuperarSenhaForm'])) {
            $model->attributes = $_POST['RecuperarSenhaForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->enviarEmail())
                $sucesso = 1;
        }
        // display the login form
        $this->render('enviar_link_senha', array('model' => $model, 'sucesso' => $sucesso));
    }*/

	public function actionUpload(){
	
	$dir = 'uploads/'.$_GET['model'].'/';
	
	if(!is_dir($dir) && strpos($_GET['model'],'..') == false && strpos($_GET['model'],'/') == false)
		mkdir($dir, 0777, true);
	
	$_FILES['file']['type'] = strtolower($_FILES['file']['type']);
	
	$array_type = array(
		'image/png',
		'image/jpg',
		'image/gif',
		'image/jpeg',
		'image/pjpeg',
	);
	
	if (in_array($_FILES['file']['type'],$array_type) && $_GET['type'] == 'image'){
		$file = $dir.md5(date('YmdHis')).'.jpg';
	}
	else{
		$file = $dir.Util::file_encode($_FILES['file']['name']);
	}
	
	move_uploaded_file($_FILES['file']['tmp_name'], $file);
	
	$array = array(
		'filelink' => Yii::app()->createAbsoluteUrl($file),
		'filename' => ($_FILES['file']['name'])
	);
	
	echo CJSON::encode($array);
	return true;
}
	
	public function actionPlupload(){
		ob_clean();
		ob_start();
		
		// HTTP headers for no cache etc
		header('Content-type: text/plain; charset=UTF-8');
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
	
		// Settings
		$targetDir = "uploads/".$_GET['class']."/";
		if(!is_dir($targetDir) && strpos($_GET['class'],'..') == false && strpos($_GET['class'],'/') == false){
			mkdir($targetDir,777);
		}
		
		$cleanupTargetDir = false; // Remove old files
		$maxFileAge = 60 * 60; // Temp file age in seconds
	
		// 5 minutes execution time
		@set_time_limit(5 * 60);
	
		// Uncomment this one to fake upload time
		// usleep(5000);
	
		// Get parameters
		$chunk = isset($_REQUEST["chunk"]) ? $_REQUEST["chunk"] : 0;
		$chunks = isset($_REQUEST["chunks"]) ? $_REQUEST["chunks"] : 0;
		$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';
	
		// Clean the fileName for security reasons
		$fileName = preg_replace('/[^\w\._]+/', '', $fileName);
	
		// Make sure the fileName is unique but only if chunking is disabled
		if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
			$ext = strrpos($fileName, '.');
			$fileName_a = substr($fileName, 0, $ext);
			$fileName_b = substr($fileName, $ext);
	
			$count = 1;
			while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
				$count++;
	
			$fileName = $fileName_a . '_' . $count . $fileName_b;
		}
	
	
		// Remove old temp files
		if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
			while (($file = readdir($dir)) !== false) {
				$filePath = $targetDir . DIRECTORY_SEPARATOR . $file;
	
				// Remove temp files if they are older than the max age
				if (preg_match('/\\.tmp$/', $file) && (filemtime($filePath) < time() - $maxFileAge))
					@unlink($filePath);
			}
	
			closedir($dir);
		} else
			die(utf8_encode('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Diretório inexistente ou sem permissão de escrita."}, "id" : "id"}'));
	
		// Look for the content type header
		if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
			$contentType = $_SERVER["HTTP_CONTENT_TYPE"];
	
		if (isset($_SERVER["CONTENT_TYPE"]))
			$contentType = $_SERVER["CONTENT_TYPE"];
	
		// Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
		if (strpos($contentType, "multipart") !== false) {
			if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
				// Open temp file
				$out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
				if ($out) {
					// Read binary input stream and append it to temp file
					$in = fopen($_FILES['file']['tmp_name'], "rb");
	
					if ($in) {
						while ($buff = fread($in, 4096))
							fwrite($out, $buff);
					} else
						die(utf8_encode('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Falha no upload."}, "id" : "id"}'));
					fclose($in);
					fclose($out);
					@unlink($_FILES['file']['tmp_name']);
				} else
					die(utf8_encode('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Falha no upload."}, "id" : "id"}'));
			} else
				die(utf8_encode('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Diretório inexistente ou sem permissão de escrita."}, "id" : "id"}'));
		} else {
			// Open temp file
			$out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
			if ($out) {
				// Read binary input stream and append it to temp file
				$in = fopen("php://input", "rb");
	
				if ($in) {
					while ($buff = fread($in, 4096))
						fwrite($out, $buff);
				} else
					die(utf8_encode('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}'));
	
				fclose($in);
				fclose($out);
			} else
				die(utf8_encode('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}'));
		}
	
		// Return JSON-RPC response
		die(utf8_encode('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}'));
		ob_end_flush();
	}

}
