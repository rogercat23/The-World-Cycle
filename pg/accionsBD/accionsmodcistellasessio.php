<?php
//Obrir i conectar BD
require_once("../classes/GeneralBD.php");
include "../classes/CistellaClass.php";

$GeneralBD = new GeneralBD();
$cistella = new CistellaClass();

//Pillar post de l'accio i entrar amb condició
$accio = $_POST["accio"];
if(!empty($accio)) {
	$data = json_decode(stripslashes($_POST['data']));
	$prodbuscat = $GeneralBD->runQuery("SELECT * FROM producte WHERE id=". $data[0] ." AND nom='". $data[1] ."' AND preu=". $data[2]);
	switch($accio) {
		case "sumant":
			/*
			  echo " id: " . $data[0];
			  echo " nom: " . $data[1];
			  echo " preu: " . $data[2];
			  echo " unitat actual: " .$data[3];
			  echo "producte buscat". $prodbuscat[0]["unitat"];
			  */
			  if($data[3]<$prodbuscat[0]["unitat"]){
				  $producte = array(
						"id"			=>		$data[0],
						"nom"		=>		$data[1],
						"quantitat"		=>		+1,
						"preu"		=>		$data[2]
					);
					$cistella->add($producte);
					echo "Acaba de ficar una unitat més del producte " . $data[1];
			  } else {
			  		echo "No hi ha mes unitats d'aquest producte!";
			  }
		break;
		case "restant":
			if($data[3]>1){
				  $producte = array(
						"id"			=>		$data[0],
						"nom"		=>		$data[1],
						"quantitat"		=>		-1,
						"preu"		=>		$data[2]
					);
					$cistella->add($producte);
					echo "Acaba de treure una unitat del producte " . $data[1];
			  } else if($data[3]==1){
			  		$cistella->borrar_producte($data[4]);
					echo "Acaba d'esborrar el producte que només tenia una.";
			  }
		break;
	}
}
?>