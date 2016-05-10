<?php
//Obrir i conectar BD
require_once("GeneralBD.php");
$GeneralBD = new GeneralBD();

//Comprovem que hi hagi dades
$id_usuari = $_POST["id"];
if(!empty($id_usuari)) {
	$data_naix = date('Y-m-d', strtotime($_POST['dn']));//canviem format de data per poder guardar a BD
	$GeneralBD->InUpDe("UPDATE usuari SET nom='". $_POST['nom'] ."', cognom1='". $_POST['cog1'] ."', cognom2='". $_POST['cog2'] ."', `h/d`='". $_POST['hd'] ."', telefon=". $_POST['telefon'] .", data_naix='". $data_naix ."' WHERE id=". $id_usuari);
	echo "S'ha modificat correctament el producte";
} else {
	echo "Ha sortit errors la hora de rebre els variables per modificar";
}					
?>