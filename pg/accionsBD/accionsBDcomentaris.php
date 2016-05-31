<?php
//Obrir i conectar BD
require_once("../classes/GeneralBD.php");
$GeneralBD = new GeneralBD();

//Pillar post de l'accio i entrar amb condició
$accio = $_POST["accio"];
if(!empty($accio)) {
	switch($accio) {
		case "afegir":
			$desc_com = $_POST['comentari'];
			$id_prod = $_POST['id_prod'];
			$id_usr = $_POST['id_usr'];
			$data_comentari = date("Y-n-j H:i:s");
			
			$id_comentari = $GeneralBD->InReturnId("INSERT INTO `comentar` (`id_producte`, `id_usuari`, `data`,  `descripcio`) VALUES ('". $id_prod ."', '". $id_usr ."','". $data_comentari ."','".$desc_com."');");		
			echo $id_comentari;			
		break;
		case "eliminar":
			$GeneralBD->InUpDe("DELETE FROM comentar WHERE id=". $_POST['id_com']);
		break;			
	}
} else {
	echo "No ha rebut correctament els variables";	
}
$GeneralBD->tancarBD();
?>