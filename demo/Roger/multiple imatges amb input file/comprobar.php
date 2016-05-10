<?php
	$arrayFotos = $_POST['fotosp'];
	for($i=0;$i<count($arrayFotos);$i++){
		echo $arrayFotos[$i];	
	}
?>