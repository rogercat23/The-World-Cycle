<?php
//Obrir i conectar BD
require_once("../classes/GeneralBD.php");
include '../sessio/sessio.php';
$GeneralBD = new GeneralBD();

//Comprovem que hi hagi dades
//var_dump($_REQUEST);
echo "hola";

//$fitxers = $_POST["dades"];
//$fitxers=json_decode($fitxers);
//var_dump($fitxers->fitxers);

/*foreach ($fitxers->fitxers as $valor){
	var_dump($valor->nom);
	var_dump($valor->fitxer->name);
}*/


?>