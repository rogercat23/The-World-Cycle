<?php
require_once("GeneralBD.php");
$GeneralBD = new GeneralBD();

$accio = $_POST["accio"];
if(!empty($accio)) {
	switch($accio) {
		case "eliminar":
			$GeneralBD->InUpDe("DELETE FROM usuari WHERE id=". $_POST['id_usuari']);
		break;			
	}
}
?>