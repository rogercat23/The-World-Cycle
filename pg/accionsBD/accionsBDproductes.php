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
		
			$GeneralBD->InUpDe("DELETE FROM vendre WHERE id_producte=". $_POST['id_producte']);
			$GeneralBD->InUpDe("DELETE FROM te_prd_ctg WHERE id_producte=". $_POST['id_producte']);
			$GeneralBD->InUpDe("DELETE FROM imatge WHERE id_producte=". $_POST['id_producte']);
			$GeneralBD->InUpDe("DELETE FROM producte WHERE id=". $_POST['id_producte']);
			echo "S'ha eliminat correctament el producte";
		break;	
		case "modificar":
			$GeneralBD->InUpDe("UPDATE producte SET nom='". $_POST['pnom'] ."', preu='". $preup = str_replace(',','.',$_POST['ppreu']) ."', unitat='". $_POST['puni'] ."', descripció='". $_POST['desc'] ."' WHERE id=". $_POST['id_producte']);
			$GeneralBD->InUpDe("UPDATE te_prd_ctg SET id_categoria='". $_POST['cat'] ."' WHERE id_producte=". $_POST['id_producte']);
			echo "S'ha modificat correctament el producte";
		break;		
	}
}
?>