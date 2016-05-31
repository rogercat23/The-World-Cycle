<?php
//Obrir i conectar BD
require_once("../classes/GeneralBD.php");
include "../classes/CistellaClass.php";

$GeneralBD = new GeneralBD();
$cistella = new CistellaClass();

//Pillar post de l'accio i entrar amb condició
$accio = $_POST["accio"];
if(!empty($accio)) {
	switch($accio) {
		case "afegir":
			  $data = json_decode(stripslashes($_POST['data']));
			  /*var_dump($data);
			  foreach($data as $d){
				 echo $d;
			  }*/
			  /*echo " id: " . $data[0];
			  echo " nom: " . $data[1];
			  echo " quantitat: " . $data[2];
			  echo " preu: " . $data[3];*/
			  $existeix = $cistella->get_producte_cistella($data[0],$data[1],$data[2],$data[3]);
			  //echo $existeix;
			  $prodbuscat = $GeneralBD->runQuery("SELECT * FROM producte WHERE id=". $data[0]);
					
			  
			//echo "Unitat : ".$prodbuscat[0]['unitat'];	
			//echo "Unitat acabat de ficar : ".$data[2];
			//echo "Unitat te posat sessio : ". $existeix;
			$totalpos = $existeix+$data[2];
			if($totalpos <= $prodbuscat[0]['unitat']){
				$producte = array(
					"id"			=>		$data[0],
					"nom"		=>		$data[1],
					"quantitat"		=>		$data[2],
					"preu"		=>		$data[3]
				);
				$cistella->add($producte);
				echo "Acabem de ficar de ficar la cistella!";
			} else {
				echo "No es possible perquè ja tenim ficat ". $existeix ." i acabem d'afegir ". $data[2] ." i total seria ". $totalpos.". Només tenim ". $prodbuscat[0]['unitat'] ;
			}
		break;
		case "eliminar":
			//echo $_POST['id_unique_producte'];
			$cistella->borrar_producte($_POST['id_unique_producte']);
			echo "S'ha eliminat correcte!";
		break;	
		case "pas1":
			echo "Primer pas fet";
		break;
		case "pas2":
			//echo "adreça es: ". $_POST['adr'];
			$infoadr =$GeneralBD->runQuery("SELECT * FROM adreca a, ciutat ciu WHERE a.id_ciutat=ciu.id AND a.id=". $_POST['adr'] .";");	
			$proreg = $GeneralBD->runQuery("SELECT * FROM  provinciaregio WHERE id=". $infoadr[0]["id_provinciaregio"]);
		 	$pais = $GeneralBD->runQuery("SELECT * FROM  pais WHERE id=". $proreg[0]["id_pais"]);
			echo "Segon pas fet i ha escullit per enviar aquesta adreça: Carrer: ". $infoadr[0]['carrer']  ." Numero " . $infoadr[0]['numero'] ." ". $infoadr[0]['pis'] ." ". $infoadr[0]['porta'] ." Postal: ". $infoadr[0]['postal'] ." Ciutat: ". $infoadr[0]['nom'] ." Provincia/Regio: ". $proreg[0]["nom"] ." Pais: ". $pais[0]['nom']; 
			
			$_SESSION['adrenviar1'] = "Carrer: ". $infoadr[0]['carrer']  ." Numero " . $infoadr[0]['numero'] ." ". $infoadr[0]['pis'] ." ". $infoadr[0]['porta'] ;
			$_SESSION['adrenviar2'] = " Postal: ". $infoadr[0]['postal'] ." Ciutat: ". $infoadr[0]['nom'] ." Provincia/Regio: ". $proreg[0]["nom"] ." Pais: ". $pais[0]['nom'];
		break;		
	}
}
?>