<?php
//Obrir i conectar BD
require_once("../classes/GeneralBD.php");
$GeneralBD = new GeneralBD();

//Pillar post de l'accio i entrar amb condició
$accio = $_POST["accio"];
if(!empty($accio)) {
	switch($accio) {
		case "afegir":
			$id_usuari = $_POST['id_usuari'];
			$id_provinciaregio = $_POST['idpr'];
			$ciutat = $_POST['ciutat'];
			$pos = $_POST['postal'];
			$carrer = $_POST['carrer'];
			$num = $_POST['num'];
			$por = $_POST['porta'];
			$pis = $_POST['pis'];
			
			$ciutats = $GeneralBD->runQuery1("SELECT * FROM ciutat");
			for($i=0;$i<count($ciutats);$i++){
				if($ciutats[$i][1]==$ciutat){
					$id_ciutat = $ciutats[$i][0];
				}
			}
			
			if(!isset($id_ciutat)){//Després de haver buscat en BD, tenint compte si ha creat ip_ciutat significa ha trobat i si es contrari vol dir no ha trobat i haurem de crear.
				$id_ciutat = $GeneralBD->InReturnId("INSERT INTO `ciutat` (`nom`, `id_provinciaregio`) VALUES ('".$ciutat."', ".$id_provinciaregio.");");
			}
			
			//Recordatori: Controlar si ha introduït o no porta i pis per poder comparar si no fos també però sense comparar aquests dos.
			$adreces = $GeneralBD->runQuery1("SELECT * FROM adreca");
			for($i=0;$i<count($adreces);$i++){
				if($adreces[$i][1]==$carrer && $adreces[$i][2]==$num && $adreces[$i][3]==$pis && $adreces[$i][4]==$por && $adreces[$i][5]==$pos && $adreces[$i][6]==$id_ciutat){//comparar per si tenen les mateixes dades
					$id_adreca = $adreces[$i][0];
				}
			}
		
			if(!isset($id_adreca)){
				if($pis =="" && $por==""){//si pis i porta no estan introduides insertem sense aquestes dades si es contrari si fem
					$id_adreca = $GeneralBD->InReturnId("INSERT INTO `adreca` (`carrer`, `numero`, `postal`, `id_ciutat`) VALUES ('". $carrer ."', '". $num ."', '". $pos ."', '". $id_ciutat ."');");
				} else {
					$id_adreca = $GeneralBD->InReturnId("INSERT INTO `adreca` (`carrer`, `numero`, `pis`, `porta`, `postal`, `id_ciutat`) VALUES ('". $carrer ."', '". $num ."', '". $pis ."', '". $por ."', '". $pos ."', '". $id_ciutat ."');");  		
				}
			}
			
			//Creem relacio entre adreça i usuari
	$GeneralBD->InUpDe("INSERT INTO `te_usr_adr` (`id_usuari`, `id_adreça`) VALUES ('". $id_usuari ."', '". $id_adreca ."');");		
			echo "S'ha afegit correctament la andreça";			
		break;
		case "eliminar":
			$GeneralBD->InUpDe("DELETE FROM te_usr_adr WHERE id_adreça=". $_POST['id_adr']);
			$GeneralBD->InUpDe("DELETE FROM adreca WHERE id=". $_POST['id_adr']);
			echo "S'ha eliminat correctament la adreça";
		break;			
	}
} else {
	echo "No ha rebut correctament els variables";	
}
$GeneralBD->tancarBD();
?>