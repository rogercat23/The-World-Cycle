<?php
	//Incluir sessions i BD per poder afegir les dades
	include "session.php";
	require_once("GeneralBD.php");
	
	//echo "pagina afegir producte";
	//Variables per afegir camps introduits del producte per afegir
	$nomp = $_POST['pnom'];
	$preup = $_POST['ppreu'];
	$unitp = $_POST['puni'];
	$ns = $_POST['sn'];
	$ctg = $_POST['categoria'];
	$desc = $_POST['desc'];
	//$fotop = $_POST['fotosp'];
	$data_actual = date("Y-n-j");//Pilla data actual
	echo "Nom: ". $nomp ." Preu: ". $preup ." Unitat: ". $unitp ." Nou/Segon ma: ". $ns ." Categoria: ". $ctg ." Descripció: ". $desc ." Data_actualment: ". $data_actual;
	/*for($i=0;$i<count($fotop);$i++){ //mostrar nom de cada foto d'Array
		echo $fotop[$i]." ";
	
	}*/
	
	$total = count($_FILES['fotosp']['name']);
	echo "Total array files ". $total;
		

	
	//inicia BD amb classe GeneralBD on tenim tots els funcions necessaris per fer amb BD
	$GeneralBD = new GeneralBD();
	
	//Insertem totes les dades del producte i retorna amb id aquest producte
	$id_producte = $GeneralBD->InReturnId("INSERT INTO `producte` (`nom`, `preu`, `unitat`, `nou/segon`, `descripció`) VALUES ('". $nomp ."', '". $preup ."', '". $unitp ."', '". $ns ."', '". $desc ."');");
	
	//Ara ja tenim producte afegit però falta afegir la categoria que pertany i després fotos fiquem els noms a BD i copiem les fotos a la carpeta del servidor per guardar arxius
	//Afegint la categoria amb id_producte
	$GeneralBD->InUpDe("INSERT INTO `te_prd_ctg` (`id_producte`, `id_categoria`) VALUES ('". $id_producte ."', '". $ctg ."');");
	
	//Afegir vendre BD
	$id_usuari = $_SESSION['id'];
	$GeneralBD->InUpDe("INSERT INTO `vendre` (`id_producte`, `id_usuari`, `data`, `quantitat`) VALUES ('". $id_producte ."', '". $id_usuari ."', '". $data_actual ."', '". $unitp ."');");
	
	//Afegint els noms de les fotos 
	
	
	
	$GeneralBD->tancarBD();
	$_SESSION['missatgecrears']="Info sobre pujar producte";	
	$_SESSION['missatgecrear']="Ha creat correctament!". $nom;	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>