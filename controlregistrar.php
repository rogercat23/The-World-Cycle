<?php 
	include "pg/sessio/sessio.php";
	require_once("pg/classes/GeneralBD.php");
	
	$correu = $_POST["correu"]; 
	$pass = md5($_POST["password"]); 
	$nom = $_POST["nom"]; 
	$cognom1 = $_POST["cognom1"]; 
	$cognom2 = $_POST["cognom2"]; 
	$hd = $_POST["hd"];
	$telefon = $_POST['telefon']; 
	$carrer = $_POST["carrer"]; 
	$data = $_POST["data_naix"];//pillem
	$data_naix = str_replace('/','-',$data);//tranformem / per -
	$data_naix = date('Y-m-d', strtotime($data_naix));//canviem format de data per poder guardar a BD
	//echo $data_naix;
	$num = $_POST["numero"]; 
	$pis = $_POST['pis']; 
	$por = $_POST['porta']; 
	$pos = $_POST['postal'];
	$id_pais = $_POST['pais'];
	$id_provinciaregio = $_POST['provinciaregio'];
	$ciutat = $_POST['ciutat'];  
	$data_inici = date("Y-n-j");//Pilla data actual per guardar data_inici
	echo "correu: ". $correu ." password: ". $pass ." nom: ". $nom ." cognom1: ". $cognom1 ." cognom2: ". $cognom2 ." Home/Dona". $hd ."telefon: ". $telefon ." carrer: ". $carrer ." data de naixament: ". $data_naix ." data d'inici ". $data_inici ." numero: ". $num  ." pis: ". $pis ." porta: ". $por  ." postal: ". $pos ." ciutat: ". $ciutat ." provincia/regio: ". $id_provinciaregio ." Pais: ". $id_pais;
	//echo $data_inici;
	
	//inicia BD amb classe GeneralBD on tenim tots els funcions necessaris per fer amb BD
	$GeneralBD = new GeneralBD();
	
	$ciutats = $GeneralBD->runQuery1("SELECT * FROM ciutat");
	for($i=0;$i<count($ciutats);$i++){
		if($ciutats[$i][1]==$ciutat){
			echo "Ip de la ciutat es:". $ciutats[$i][0];
			$id_ciutat = $ciutats[$i][0];
		}
	}
	
	if(!isset($id_ciutat)){//Després de haver buscat en BD, tenint compte si ha creat ip_ciutat significa ha trobat i si es contrari vol dir no ha trobat i haurem de crear.
		echo "No tenim aquesta ciutat en BD"; 
		$id_ciutat = $GeneralBD->InReturnId("INSERT INTO `ciutat` (`nom`, `id_provinciaregio`) VALUES ('".$ciutat."', ".$id_provinciaregio.");");
		echo "Ip de la ciutat es ". $id_ciutat;
	}
	
	//Comprovar si tenim BD sino creem i pillem IP (Contrassenya)
	$conts = $GeneralBD->runQuery1("SELECT * FROM contrassenya");
	for($i=0;$i<count($conts);$i++){
		if($conts[$i][1]==$pass){
			echo "Ip de la contrassenya es:". $conts[$i][0];
			$id_pass = $conts[$i][0];
		}
	}
	
	if(!isset($id_pass)){
		echo "No tenim aquesta contrassenya en BD"; 
		$id_pass = $GeneralBD->InReturnId("INSERT INTO `contrassenya` (`password`) VALUES ('".$pass."');");
		echo "Ip de la contrassenya es ". $id_pass;
	}
	
	//Després de haver afegit o pillar IP de la contrassenya i ciutat, s'ha de fer igual amb adreça
	//Recordatori: Controlar si ha introduït o no porta i pis per poder comparar si no fos també però sense comparar aquests dos.
	$adreces = $GeneralBD->runQuery1("SELECT * FROM adreca");
	for($i=0;$i<count($adreces);$i++){
		if($adreces[$i][1]==$carrer && $adreces[$i][2]==$num && $adreces[$i][3]==$pis && $adreces[$i][4]==$por && $adreces[$i][5]==$pos && $adreces[$i][6]==$id_ciutat){//comparar per si tenen les mateixes dades
			echo "IP d' adreça es: ". $adreces[$i][0] ."Carrer : ". $adreces[$i][1] ." numero: ". $adreces[$i][2] ." postal: ". $adreces[$i][5];
			$id_adreca = $adreces[$i][0];
		}
	}

	if(!isset($id_adreca)){
		echo "No tenim aquesta andre&ccedil;a en BD";
		if($pis =="" && $por==""){//si pis i porta no estan introduides insertem sense aquestes dades si es contrari si fem
			$id_adreca = $GeneralBD->InReturnId("INSERT INTO `adreca` (`carrer`, `numero`, `postal`, `id_ciutat`) VALUES ('". $carrer ."', '". $num ."', '". $pos ."', '". $id_ciutat ."');");
		} else {
			$id_adreca = $GeneralBD->InReturnId("INSERT INTO `adreca` (`carrer`, `numero`, `pis`, `porta`, `postal`, `id_ciutat`) VALUES ('". $carrer ."', '". $num ."', '". $pis ."', '". $por ."', '". $pos ."', '". $id_ciutat ."');");  		
		}
		echo "Ip de la andre&ccedil;a es ". $id_adreca; 
	}
	
	$id_usuari = $GeneralBD->InReturnId("INSERT INTO `usuari` (`correu`, `nom`, `cognom1`, `cognom2`, `h/d`, `telefon`, `data_naix`, `data_inici`, `id_roles`, `id_contrassenya`, `id_estat`) VALUES ('".$correu."', '".$nom."', '".$cognom1."', '".$cognom2."', '".$hd."', '".$telefon."', '".$data_naix."', '".$data_inici."', '2', '".$id_pass."', '1');");
	//INSERT INTO `usuari` (`correu`, `nom`, `cognom1`, `cognom2`, `h/d`, `telefon`, `data_naix`, `data_inici`, `id_roles`, `id_adreca`, `id_contrassenya`, `id_estat`) VALUES ('martineta@gmail.com', 'Martina', 'Niubó', 'Torrelles', 'Dona', '123123123', '1996-01-31', '2016-01-28', '2', '22', '37', '1');

	//Creem relacio entre adreça i usuari
	$GeneralBD->InUpDe("INSERT INTO `te_usr_adr` (`id_usuari`, `id_adreça`) VALUES ('". $id_usuari ."', '". $id_adreca ."');");
	
	$GeneralBD->tancarBD();
	$_SESSION['missatgecrears']="Info sobre usuari";	
	$_SESSION['missatgecrear']="Ha creat correctament usuari ". $correu;	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>