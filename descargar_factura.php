<h3 class="passos_cistella_h3"> Pas 4 Realitzat la cistella i aqui tens boto per baixar la factura de la compra </h3></br>
<a href="pdf_factura.php"><button class="btn btn-warning" ><span class="glyphicon glyphicon-download" aria-hidden="true"></span> Descargar la factura </button></a></br></br>
<?php
	include "pg/classes/GeneralBD.php";
	include "pg/classes/CistellaClass.php";
	$GeneralBD = new GeneralBD();
	$cistella = new CistellaClass();
	
	//Data de la compra (actual)
	$data_compra = date("Y-n-j");
	
	//Info cistella dels productes
	$prototal = $cistella->productes_total();
	$pretotal = $cistella->preu_total();
	$productes_cistella = $cistella->get_content();
	
	$id_factura = $GeneralBD->InReturnId("INSERT INTO `factura` (`preutotal`) VALUES ('".$pretotal."');");
	foreach($productes_cistella as $producte)
	{
	
		$GeneralBD->InUpDe("INSERT INTO `compra` (`id_producte`, `id_usuari`, `data`, `quantitat`, `id_factura`) VALUES ('". $producte["id"] ."', '". $_SESSION['id'] ."', '". $data_compra ."', '". $producte["quantitat"] ."', '". $id_factura ."');");
	
		$GeneralBD->InUpDe("UPDATE `producte` SET unitat = unitat - ". $producte["quantitat"] ."  WHERE id=". $producte["id"] .";");
	}

?>