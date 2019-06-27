<?php
require_once "cURL.php";
class CityWeather{
	private $apiKey = "d67d0184c88c156446a46deabf0bd38e";
	private $url = 'http://api.openweathermap.org/data/2.5/forecast?q=%s%s&units=metric&appid=%s';

	private function getCityWeather($cURL){
		if($content = $cURL->session_cURL()){
			$data = json_decode($content); 
			if($data->message==="city not found")
				return false;
			else
				return $data;
		}
		else
			return false;	
	}


	public function getTempByDate($city_weather, $list_date){
	    //echo var_dump($city_weather);
		foreach ($city_weather->list as $list) {
			foreach ($list_date as $key => $date) {
				$date = $date->format('Y-m-d H:i:s');
				if($list->dt_txt===$date){
					if(count($list_date)==1)
						return $list->main->temp;
					else
						$list_temp[$date] = $list->main->temp;
				}
			}
		}
		return $list_temp;
	}

	public function getListTempCity($name_city, $list_date, $code_country=NULL){
		if($code_country!=NULL){
			$code_country=",$code_country";
		}
		$cURL = new cURL(sprintf($this->url,$name_city,$code_country,$this->apiKey));
		$city_weather = $this->getCityWeather($cURL);
		if(!$city_weather)
			 return false;
		else	
			return $this->getTempByDate($city_weather,$list_date);
	}
}
?>