<?php
class WriteCSVfile{

	private $name;
	private $nameTmp = 'weatherTmp.csv';

	function __construct($name){
		$this->name = $name;
	}

	public function createFileWithHead($head){
	if(!file_exists($this->name)){
		$fc = fopen($this->name, 'w+');
		fputcsv($fc, $head);	
		fclose($fc);
	}
	return true;
	}
	//проверяю файл на наявность в нём добавляемой даты
	private function checkFile($date_and_temp_cities){
		$fr = fopen($this->name, 'r+');
		$check = false;
		while(($data = fgetcsv($fr))!==false){
			if($data[0] ==($date_and_temp_cities[0])){
				$check = true;
		}
		}
		fclose($fr);
		return $check;
	}
	//записываю данные у файл. Если записываемая дата существует, то обновляю её 
	public function writeToFile($date_and_temp_cities){
		if(!$this->checkFile($date_and_temp_cities)){
			$fw = fopen($this->name, 'a+');
			fputcsv($fw,($date_and_temp_cities));
		}
		else{
			$fr = fopen($this->name, 'r+');
			$fw = fopen($this->nameTmp, 'w+');
			while(($data = fgetcsv($fr))!==false){
				if($data[0] ==($date_and_temp_cities[0]))
					fputcsv($fw, $date_and_temp_cities);
				else fputcsv($fw, $data);
		}
		fclose($fw);
		fclose($fr);
		unlink($this->name);
		rename($this->nameTmp, $this->name);
		}
	}
}
?>