<?
class Captcha{

	protected $siteKey = '6LfYWHYUAAAAAKE7un8GIXimrYXkdFRaeVMa539O';
	protected $secret  = '6LfYWHYUAAAAAMiyV9kO7iRlkKXX9tZ7ISzYXKwI';
	public $response;

	public function validate(){
		 //return true;
		// Register API keys at https://www.google.com/recaptcha/admin

		$lang = 'pt-BR';

		$captcha_passou = false;

		$data = array(
			'secret' => $this->secret,
			'response' => $this->response
		);

		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($verify);

		//var_dump($response);
		$check = json_decode($response);
		return $check->success;
	}

	public function create(){
		$this->response = NULL;
		echo '<script type="text/javascript" src="https://www.google.com/recaptcha/api.js"></script>';
		echo '<div class="g-recaptcha" data-sitekey="'.$this->siteKey.'"></div>';
	}


}
?>
