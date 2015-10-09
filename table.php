<?php

	require_once("functions.php");
	
	// kas kasutaja tahab kustutada
	// kas aadressi real on ?delete=?????
	if(isset($_GET["delete"])){
		
		deleteCar($_GET["delete"]);
		
	}

	
	
	$car_list = getCarData();
	// var_dump($car_list);

?>
<table border=1>
	<tr> 
		<th>id</th>
		<th>auto nr märk</th>
		<th>kasutaja id</th>
		<th>värv</th>
		<th>X</th>
	</tr>
	
	<?php
		for($i = 0; $i < count($car_list); $i++){
			echo "<tr>";
			
			echo "<td>".$car_list[$i]->id."</td>";
			echo "<td>".$car_list[$i]->number_plate."</td>";
			echo "<td>".$car_list[$i]->user_id."</td>";
			echo "<td>".$car_list[$i]->color."</td>";
			echo "<td><a href='?delete=".$car_list[$i]->id."'>X</a></td>";
		
			echo" </tr>";
		
		}	
	?>
	
	
	
</table>