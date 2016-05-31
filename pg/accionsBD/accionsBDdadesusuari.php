<?php
//Obrir i conectar BD
require_once("../classes/GeneralBD.php");
include '../sessio/sessio.php';
$GeneralBD = new GeneralBD();

//Comprovem que hi hagi dades
$id_usuari = $_POST["id"];
if(!empty($id_usuari)) {
	$data_f = str_replace('/','-', $_POST['dn']);
	$data_naix = date('Y-m-d', strtotime($data_f));//canviem format de data per poder guardar a BD
	$GeneralBD->InUpDe("UPDATE usuari SET nom='". $_POST['nom'] ."', cognom1='". $_POST['cog1'] ."', cognom2='". $_POST['cog2'] ."', `h/d`='". $_POST['hd'] ."', telefon=". $_POST['telefon'] .", data_naix='". $data_naix ."' WHERE id=". $id_usuari);
	echo "S'ha modificat correctament!";
	$_SESSION['nom'] = $_POST['nom'];
	$_SESSION['cognoms'] = $_POST['cog1'] ." ". $_POST['cog2'];
} else {
	echo "Ha sortit errors la hora de rebre els variables per modificar";
}					
?>