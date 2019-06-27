<?php
class cURL{
	private $url;

	function __construct($url){
		$this->url = $url;
	}

	public function session_cURL(){
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_HEADER, 0);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($handle, CURLOPT_URL, $this->url);
		curl_setopt($handle, CURLOPT_VERBOSE, 0);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

		$response = curl_exec($handle);
		curl_close($handle);
		return $response;
	}
}
?>