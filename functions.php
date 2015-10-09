<?php

	require_once("../configglobal.php");
	$database = "if15_koidkan";
	
	// loome uue funktsiooni, et küsida andmeid
	function getCarData(){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"],  $GLOBALS["server_password"],  $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
		$stmt->bind_result($id, $user_id, $number_plate, $color_from_db);
		$stmt->execute();
		
		$row = 0;
		
		// tühi massiiv kus hoiame objekte edaspidi
		$array = array();
		
		
		while($stmt->fetch()){
			
			// loon objekti
			$car = new StdClass();
			$car->id = $id;
			$car->number_plate = $number_plate;
			
			array_push($array, $car);
			// echo "<pre>";
			// var_dump($array);
			// echo "</pre>";
			
		}
		
		$stmt->close();
		$mysqli->close();
		
		return $array;
		
				
		
	}

	

?>