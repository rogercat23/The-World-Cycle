<?php
//Obrir i conectar BD
require_once("../classes/GeneralBD.php");
$GeneralBD = new GeneralBD();

//Pillar post de l'accio i entrar amb condició
$id = $_POST["id"];
if(!empty($id)) {
	$GeneralBD->InUpDe("DELETE FROM imatge WHERE id=". $id);
	$imgreal = $_POST['imgr'];
	$imgthum = $_POST['imgt'];
	unlink("../../img/productetamrealjpg/".$imgreal);
	unlink("../../img/productethumjpg/".$imgthum);
	echo true;
} else {
	echo false;	
}
?>