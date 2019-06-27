<?php
require_once "cURL.php";
class TimeZone{
	private $url = "https://raw.githubusercontent.com/mikhalko98/All-Cities/master/GeoLite2-City-Locations-en.csv";

	private function getData(){
		$cURL = new cURL($this->url);
		$content = $cURL->session_cURL();
		return $content;
	}

	public function getTimeZone($name_city, $code_country){
		if(stristr($name_city,' ')){
			$name_city = '"'.$name_city.'"';
		}
		$time_zone = false; 
		$content = $this->getData();
		$content = explode("\n", $content);
		//delete header line
		array_shift($content);
		//delete empty line
		array_pop($content);
		foreach ($content as $data) {
			$line = explode(',', $data);
			if($line[4]===$code_country){
				foreach ($line as $key => $value) {
					if($value === $name_city){
					$time_zone = $line[count($line)-2];
					break;
					}
				}
			}
		}
		return $time_zone;
	}
}
?>