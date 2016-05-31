<?php
	//Incluir sessions i BD per poder afegir les dades
<<<<<<< HEAD
	include "pg/sessio/sessio.php";
	require_once("pg/classes/GeneralBD.php");
=======
	include "session.php";
	require_once("GeneralBD.php");
>>>>>>> origin/Productes-Ajax
	
	//echo "pagina afegir producte";
	//Variables per afegir camps introduits del producte per afegir
	$nomp = $_POST['pnom'];
<<<<<<< HEAD
	$preup = str_replace(',','.',$_POST['ppreu']);
=======
	$preup = $_POST['ppreu'];
>>>>>>> origin/Productes-Ajax
	$unitp = $_POST['puni'];
	$ns = $_POST['sn'];
	$ctg = $_POST['categoria'];
	$desc = $_POST['desc'];
	//$fotop = $_POST['fotosp'];
	$data_actual = date("Y-n-j");//Pilla data actual
	echo "Nom: ". $nomp ." Preu: ". $preup ." Unitat: ". $unitp ." Nou/Segon ma: ". $ns ." Categoria: ". $ctg ." Descripció: ". $desc ." Data_actualment: ". $data_actual;
<<<<<<< HEAD
=======
	/*for($i=0;$i<count($fotop);$i++){ //mostrar nom de cada foto d'Array
		echo $fotop[$i]." ";
	
	}*/
	
	$total = count($_FILES['fotosp']['name']);
	echo "Total array files ". $total;
		

	
>>>>>>> origin/Productes-Ajax
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
	
<<<<<<< HEAD
	//INPUT FILE sobre fotos afegits
	//Funció per guardar com array totes les fotos rebut file que es multiple
	function reArrayFiles(&$file_post) {
		$file_ary = array();
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);
	
		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
			}
		}
	
		return $file_ary;
	}

	//Funció per fer imatges mes petites (thumb) amb format jpg per poder visualitzar be les fotos per galeria
	function crearThumbJPEG($camiimatge,$camiguardar,$ampladaThumb, $alturaThumb,$qualitat){
		$original = imagecreatefromJPEG($camiimatge);
		
		if ($original !== false){
		   $thumb = imageCreatetrueColor($ampladaThumb,$alturaThumb);
		   if ($thumb !== false){
			  $amplada = imagesx($original);
			  $altura = imagesy($original);
		
			  imagecopyresampled($thumb,$original,0,0,0,0,$ampladaThumb,$alturaThumb,$amplada,$altura);
			  $resultat = imagejpeg($thumb,$camiguardar,$qualitat);
			  return $resultat;
		   }
		}
		return false;	
	} 

//Entrem si trobem file fotosp
if ($_FILES['fotosp']) {
	//fiquem array file afegits
    $file_ary = reArrayFiles($_FILES['fotosp']);

    foreach ($file_ary as $file) {
		//copiem un o mes imatges per un input i enviem per fer thum per galeria i guardar tambe tamany real. Després guardem nom a BD
		//convertir imatge petit per poder mostrar galeria anomenat thum i fem 60x60 que es pot triar i ultim parametre que qualitat i he ficat 50
		$prova = crearThumbJPEG($file['tmp_name'],"img/productethumjpg/t_". $id_producte ."".$file['name'],60,60,50);
		//Guardar imatge real amb carpeta imatge
		$url = "img/productetamrealjpg/". $id_producte ."". $file['name'];
		copy($file['tmp_name'],$url);
		//Insertem a BD com nom arxiu només
		$GeneralBD->InUpDe("INSERT INTO `imatge` (`nom_arxiu`, `id_producte`) VALUES ('". $file['name'] ."','". $id_producte ."');");
		
		echo "funciona";
		
        //print 'File Name: ' . $file['name'];
        //print 'File Type: ' . $file['type'];
        //print 'File Size: ' . $file['size'];
    }


}
	
=======
	//Afegint els noms de les fotos 
>>>>>>> origin/Productes-Ajax
	
	
	
	$GeneralBD->tancarBD();
	$_SESSION['missatgecrears']="Info sobre pujar producte";	
	$_SESSION['missatgecrear']="Ha creat correctament!". $nom;	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>