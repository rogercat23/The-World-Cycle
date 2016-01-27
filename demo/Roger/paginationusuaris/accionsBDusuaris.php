<?php
require_once("GeneralBD.php");
$GeneralBD = new GeneralBD();

$accio = $_POST["accio"];
if(!empty($accio)) {
	switch($accio) {
		case "eliminar":
			$GeneralBD->InUpDe("DELETE FROM usuari WHERE id=". $_POST['id_usuari']);
		break;
		case "canviestat":
			$GeneralBD->InUpDe("UPDATE usuari SET id_estat=".$_POST['id_estat']." WHERE id=". $_POST['id_usuari']);
		break;
		case "canvirol":
			$GeneralBD->InUpDe("UPDATE usuari SET id_roles=". $_POST['id_rol'] ." WHERE id=". $_POST['id_usuari']);
		break;			
	}
}
?>