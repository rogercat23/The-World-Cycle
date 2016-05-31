<h3 class="passos_cistella_h3"> Pas 2 Adreça </h3></br>
<?php
	include "pg/classes/GeneralBD.php";
	include "pg/sessio/sessio.php";
	//Iniciar classe BD
	$GeneralBD = new GeneralBD();
	
	//Consultes
	$arrayAdr = $GeneralBD->runQuery("SELECT * FROM te_usr_adr tua, ciutat c, adreca a WHERE a.id_ciutat=c.id AND tua.id_adreça=a.id AND tua.id_usuari=". $_SESSION['id']);
	$totalarrayAdr = count($arrayAdr);
	
	if($totalarrayAdr==1){
		$proreg = $GeneralBD->runQuery("SELECT * FROM  provinciaregio WHERE id=". $arrayAdr[0]["id_provinciaregio"]);
		 $pais = $GeneralBD->runQuery("SELECT * FROM  pais WHERE id=". $proreg[0]["id_pais"]);
		echo "Carrer: ". $arrayAdr[0]['carrer']  ." Numero " . $arrayAdr[0]['numero'] ." ". $arrayAdr[0]['pis'] ." ". $arrayAdr[0]['porta'] ." Postal: ". $arrayAdr[0]['postal'] ." Ciutat: ". $arrayAdr[0]['nom'] ." Provincia/Regio: ". $proreg[0]["nom"] ." Pais: ". $pais[0]['nom'];
		?>
		</br></br><button class='btn btn-success' onClick='cridafuncioacciocistella("pas2",<?php echo  $arrayAdr[0]['id']?>)'></span> Envia aquesta adreça</button> Si vols enviar un altre adreça pot clicar el teu nom de perfil i sota pots afegir adreça. Després aqui trobaràs opcions per triar.
		<?php
	} else {
		$total = count($arrayAdr);
		for($o=0;$o<$total;$o++) { 
			$proreg = $GeneralBD->runQuery("SELECT * FROM  provinciaregio WHERE id=". $arrayAdr[$o]["id_provinciaregio"]);
			$pais = $GeneralBD->runQuery("SELECT * FROM  pais WHERE id=". $proreg[0]["id_pais"]);
			if($o==0){
				echo "<label><input id='radio". $arrayAdr[$o]['id'] ."' type='radio' class='opcionsadreça' name='radioadreça' value='". $arrayAdr[$o]['id'] ."' checked='checked'>Carrer: ". $arrayAdr[$o]['carrer']  ." Numero " . $arrayAdr[$o]['numero'] ." ". $arrayAdr[$o]['pis'] ." ". $arrayAdr[$o]['porta'] ." Postal: ". $arrayAdr[$o]['postal'] ." Ciutat: ". $arrayAdr[$o]['nom'] ." Provincia/Regio: ". $proreg[0]["nom"] ." Pais: ". $pais[0]['nom'] ."</label>";
				echo "</div>";
			} else {
				echo "<label><input id='radio". $arrayAdr[$o]['id'] ."' type='radio' class='opcionsadreça' name='radioadreça' value='". $arrayAdr[$o]['id'] ."' required>Carrer: ". $arrayAdr[$o]['carrer']  ." Numero " . $arrayAdr[$o]['numero'] ." ". $arrayAdr[$o]['pis'] ." ". $arrayAdr[$o]['porta'] ." Postal: ". $arrayAdr[$o]['postal'] ." Ciutat: ". $arrayAdr[$o]['nom'] ." Provincia/Regio: ". $proreg[0]["nom"] ." Pais: ". $pais[0]['nom'] ."</label>";
				echo "</div>";
			}
		}
		?>
		</br></br><button class='btn btn-success' onClick='cridafuncioacciocistella("pas2")'></span> Escullir adreça</button>
		<?php
    }
?>

