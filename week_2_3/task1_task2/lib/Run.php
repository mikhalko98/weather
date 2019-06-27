<?php
require_once "Date.php";
class Run{

	public function getListDateUTC($list_time, $time_zone){
		if($time_zone){
			$Date = array();
			$utc_date = array();
			foreach ($list_time as $key => $time) {
				$Date[] = new Date($time_zone, $time);
				$utc_date[] = $Date[$key]->getDateUTC();
			}
			return $utc_date;
		}
		else
			return false;
	}

	public function printWeather($list_temp_city){
		if(!$list_temp_city) 
			echo "City not found\n";
		else{
			foreach ($list_temp_city as $key => $value)
				echo $key,"(UTC)", ": ", $value,"°C", "\n";
		}
	}
}
?>