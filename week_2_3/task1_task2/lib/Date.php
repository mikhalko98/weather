<?php
class Date{
	public $time_zone;
	public $time;

	function __construct($time_zone, $time){
		$this->time_zone = $time_zone;
		$this->time = $time;
	}

	private function getDateNextDay(){
		$date = new DateTime(null, new DateTimeZone($this->time_zone));
		//прибавляю к времени 24 часа для получения завтрашней даты
		$time=$this->time+24;
		$date->setTime($time, 00, 00);
		return $date;
	}

	public function getDateUTC(){
		$utc_date_time_zone = $this->getDateNextDay();
		$utc_date_time_zone->setTimezone(new DateTimeZone('UTC'));
		return $utc_date_time_zone/*->format('Y-m-d H:i:s')*/;
	}
}
?>