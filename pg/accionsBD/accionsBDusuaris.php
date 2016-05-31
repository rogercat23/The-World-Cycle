<?php
//Obrir i conectar BD
require_once("../classes/GeneralBD.php");
$GeneralBD = new GeneralBD();

//Pillar post de l'accio i entrar amb condició
$accio = $_POST["accio"];
if(!empty($accio)) {
	switch($accio) {
		case "afegir":
		
		break;
		case "eliminar":
			$GeneralBD->InUpDe("DELETE FROM usuari WHERE id=". $_POST['id_usuari']);
		break;
		case "canviestat":
			$GeneralBD->InUpDe("UPDATE usuari SET id_estat=".$_POST['id_estat']." WHERE id=". $_POST['id_usuari']);
		break;
		case "canvirol":
			$GeneralBD->InUpDe("UPDATE usuari SET id_roles=". $_POST['id_rol'] ." WHERE id=". $_POST['id_usuari']);
		break;	
		case "modificar":
			$GeneralBD->InUpDe("UPDATE usuari SET nom='". $_POST['nom'] ."', cognom1='". $_POST['cognom1'] ."', cognom2='". $_POST['cognom2'] ."', telefon='". $_POST['telf'] ."', `h/d`='". $_POST['hd'] ."' WHERE id=". $_POST['id_usuari']);
		break;		
	}
}
?>