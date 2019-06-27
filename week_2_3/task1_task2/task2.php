<?php
require_once "lib/CityWeather.php";
require_once "lib/Date.php";
require_once "lib/TimeZone.php";
require_once "lib/Run.php";

$list_time = ['09', '12', '15', '18', '21'];

if($argc != 3) 
	echo "***Parameters must be three***\n";
else{
/*
* Entering parameters:
* 	 If the city name contains a space, 
*    then it must be entered in brackets ("name"). 
*	 For example:"New York".
*    Otherwise without brackets. 
*    For example: Mykolayiv
*
*    Example entering: php task2.php Kyiv UA
*/
	$name_city = $argv[1];
	$code_country = $argv[2];

	$TimeZone = new TimeZone();
	$time_zone = $TimeZone->getTimeZone($name_city, $code_country);
	$Run = new Run();
	if($utc_date = $Run->getListDateUTC($list_time, $time_zone)){
		$CityWeather = new CityWeather();
		$list_temp_city = $CityWeather->getListTempCity($name_city,$utc_date,$code_country);
		$Run->printWeather($list_temp_city);
	}
	else echo "City not found\n";
}
?>