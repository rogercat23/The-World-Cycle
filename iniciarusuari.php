<?php
	require_once("pg/classes/GeneralBD.php");
	session_start();
	if(isset($_POST['correui']) && isset($_POST['passwordi'])){
		if($_POST['correui']=='' && $_POST['passwordi']==''){ //per evitar si estan buides per evitar buscar a BD
			$_SESSION['error']="No has introduit correu ni la contrassenya";
		} else if($_POST['correui']==''){
			$_SESSION['error']="El camp del correu estava buit";
		} else if($_POST['passwordi']==''){
			$_SESSION['error']="El camp del password estava buit";
		} else {
			$correu = $_POST['correui'];
			$password = md5($_POST['passwordi']); //guardem password introduit però transformat per md5 per poder comparar que tenim BD
			$GeneralBD = new GeneralBD();
			$usuaris = $GeneralBD->runQuery("SELECT * FROM usuari u, contrassenya c WHERE u.id_contrassenya=c.id");
			$usuaris1 = $GeneralBD->runQuery("SELECT * FROM usuari");
			$GeneralBD->tancarBD();
		
			for($i=0;$i<count($usuaris);$i++){
				echo $usuaris[$i]['correu']."\n"; //camp correu
				echo $usuaris[$i]['password']."\n"; //camp contrassenya
				if($usuaris[$i]['correu']==$correu && $usuaris[$i]['password']==$password){		
					if($usuaris[$i]['id_estat']==2){			
						$_SESSION['error']="Aquest usuari esta de baixa i hauras de contactar administrador o enviar des de contacte!";			
					} else {
						$_SESSION['id'] = $usuaris1[$i]['id'];
						$_SESSION['correu'] = $usuaris[$i]['correu'];
						$_SESSION['nom'] = $usuaris[$i]['nom'];
						$_SESSION['cognoms'] = $usuaris[$i]['cognom1'] ." ". $usuaris[$i]['cognom2'];
						$_SESSION['rol'] = $usuaris[$i]['id_roles'];
						$_SESSION['estat'] = $usuaris[$i]['id_estat'];
					}
				}
			}
			if(!isset($_SESSION['correu']) && !isset($_SESSION['error'])){
				$_SESSION['error']="No has introduit b&eacute; correu o password!";		
			}
		}
	} else {
		$_SESSION['error']="Els variables correui o passwordi no existeixen per tant no s'han rebut bé i contacta per la pagina contacte!";
	}
	//echo $_SESSION['error'];
	header('Location: ' . $_SERVER['HTTP_REFERER']); //tornar la pàgina anterior on hem clicat per anar aquesta (BACK)
?>