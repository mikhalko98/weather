<?php
require_once "lib/CityWeather.php";
require_once "lib/Date.php";
require_once "lib/WriteCSVfile.php";

$list_city=array('Kiev', 'London', 'Berlin', 'New York', 'Los Angeles');

$main_time_zone = 'Europe/Kiev';
$time_main_time_zone = '21';

$Date = new Date($main_time_zone, $time_main_time_zone);
$utc_date = $Date->getDateUTC();

$CityWeather = new CityWeather();
$list_temp_cities=array();
foreach ($list_city as $name_city) {
	//функция принимает имя города и список дат
	$list_temp_cities[] = $CityWeather->getListTempCity($name_city, array($utc_date));
}
/*формирую массив данных для записи в файл
*
*/
$date_and_temp_cities = array($utc_date->format('Y/m/d H:i:s')); 
foreach ($list_temp_cities as  $value) {
		$date_and_temp_cities[] = $value;
}

//формирую заголовок таблицы  для файла
$head =  $list_city;
array_unshift($head, 'Date');

$WriteCSVfile = new WriteCSVfile('forecastHistory.csv');

$WriteCSVfile->createFileWithHead($head);

$WriteCSVfile->writeToFile($date_and_temp_cities);
?>