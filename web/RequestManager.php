<?class RequestManager{
	private $_scriptUrl;
	private $_baseUrl;
	private $_hostInfo;
	private $_routes;
	public $default_route = 'inicial';
	public function getRoutes(){
		return $this->_routes;
	}
	public function setRoutes($routes){
		 $this->_routes = $routes;
	}
	public function getScriptUrl(){
		if($this->_scriptUrl===null)
		{
			$scriptName=basename($_SERVER['SCRIPT_FILENAME']);
			if(basename($_SERVER['SCRIPT_NAME'])===$scriptName)
				$this->_scriptUrl=$_SERVER['SCRIPT_NAME'];
			elseif(basename($_SERVER['PHP_SELF'])===$scriptName)
				$this->_scriptUrl=$_SERVER['PHP_SELF'];
			elseif(isset($_SERVER['ORIG_SCRIPT_NAME']) && basename($_SERVER['ORIG_SCRIPT_NAME'])===$scriptName)
				$this->_scriptUrl=$_SERVER['ORIG_SCRIPT_NAME'];
			elseif(($pos=strpos($_SERVER['PHP_SELF'],'/'.$scriptName))!==false)
				$this->_scriptUrl=substr($_SERVER['SCRIPT_NAME'],0,$pos).'/'.$scriptName;
			elseif(isset($_SERVER['DOCUMENT_ROOT']) && strpos($_SERVER['SCRIPT_FILENAME'],$_SERVER['DOCUMENT_ROOT'])===0)
				$this->_scriptUrl=str_replace('\\','/',str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SERVER['SCRIPT_FILENAME']));
			else
				throw new CException(Yii::t('yii','CHttpRequest is unable to determine the entry script URL.'));
		}
		return $this->_scriptUrl;
	}
	public function getBaseUrl($absolute=false){
		if($this->_baseUrl===null)
			$this->_baseUrl=rtrim(dirname($this->getScriptUrl()),'\\/');
		return $absolute ? $this->getHostInfo() . $this->_baseUrl : $this->_baseUrl;
	}
	public function getUri(){
		$dir = explode("/",$_SERVER['PHP_SELF']);
		array_pop($dir);
		return str_replace(implode("/",$dir),"",current(explode("?",$_SERVER['REQUEST_URI'])));
	}
	public function getHostInfo($schema=''){
		if($this->_hostInfo===null)
		{
			if($secure=$this->getIsSecureConnection())
				$http='https';
			else
				$http='http';
			if(isset($_SERVER['HTTP_HOST']))
				$this->_hostInfo=$http.'://'.$_SERVER['HTTP_HOST'];
			else
			{
				$this->_hostInfo=$http.'://'.$_SERVER['SERVER_NAME'];
				$port=$secure ? $this->getSecurePort() : $this->getPort();
				if(($port!==80 && !$secure) || ($port!==443 && $secure))
					$this->_hostInfo.=':'.$port;
			}
		}
		if($schema!=='')
		{
			$secure=$this->getIsSecureConnection();
			if($secure && $schema==='https' || !$secure && $schema==='http')
				return $this->_hostInfo;
	
			$port=$schema==='https' ? $this->getSecurePort() : $this->getPort();
			if($port!==80 && $schema==='http' || $port!==443 && $schema==='https')
				$port=':'.$port;
			else
				$port='';
	
			$pos=strpos($this->_hostInfo,':');
			return $schema.substr($this->_hostInfo,$pos,strcspn($this->_hostInfo,':',$pos+1)+1).$port;
		}
		else
			return $this->_hostInfo;
	}
	public function getIsSecureConnection(){
		return !empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'],'off');
	}
	public function defineRoute(){
		
		
		define('URI',$this->getUri());
		
		$rotas = $this->getRoutes();
		
		foreach($rotas as $pcre=>$app){
			
			if(preg_match("@^{$pcre}$@",URI,$get)){
				
				foreach($get as $ind => $valor){
					if(!isset($_GET[$ind]))
						$_GET[$ind] = $valor;
				} 
				
				if(file_exists($app)){
					return array(
						'status' => true,
						'file' => $app,
					);
				}
				else
					$error = 'arquivo inexistente';
				
			}
			else{
				$error = 'rota inexistente';
			}
		}
		return array(
			'status' => false,
			'error' => $error,
		);
	}
	public function run($routes){
		
		$this->setRoutes($routes);
		$return = $this->defineRoute();
		
		if($return['status']){
			require_once($return['file']);
			exit;
		}
		header('location: '.$this->getBaseUrl().DIRECTORY_SEPARATOR.$this->default_route);
		exit;
	}
}
?>