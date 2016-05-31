<?php
	include	 'llibreries.php';
	include "pg/sessio/sessio.php";	
	if(isset($_POST["correu1"])){ //per comprovar que hagi rebut post correu1 i fiquem tres camps de post a mes a mes, tema i comentari. Si es el contrari, entrem amb sessió per poder enviar dades amb usuari iniciat que la pàgina del contacte no mostra els tres camps (correu, nom i cognoms)
		$email = $_POST["correu1"];
		$nom = $_POST["nomc"];
		$cognoms = $_POST["cognoms"];
	} else {
		$email = $_SESSION["correu"];
		$nom = $_SESSION["nom"];
		$cognoms = $_SESSION["cognoms"];
	}
		
	$tema = $_POST["tema"];
	$missatge = $_POST["comentari"];

	$mail = new PHPMailer;

	//Indicant el tipus de classe que es SMTP
	$mail->IsSMTP();

	//Hem d'autentica sobre SMTP
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";

	//Indicar el servidor que es de GMAIL
	$mail->Host = "smtp.gmail.com";

	//Indicant el port de gmail sobre SMTP
	$mail->Port = 465;

	//Indicant usuari i password del correu GMAIL per poder enviar els correus i etc.
	$mail->Username = "theworldcycle2015@gmail.com";
	$mail->Password = "empresacycle"; // como encriptarlo

	$mail->From = "theworldcycle2015@gmail.com";
	//ens enviem el mateix correu que es d'empresa i volem rebre els missatges dels clients

	//Dir nom del contacte que vegin els altres i sota es veure com titol del correu que es veura com principal
	$mail->FromName = "The World Cycle";
	$mail->Subject = "Comentari de la pagina web";

	//$mail->addAddress($email, $nom . "/" . $cognoms);
	$mail->addAddress("theworldcycle2015@gmail.com", "The World Cycle");
	/*Enviem el mateix correu*/

	//Cos del correu del missatge que es fica com html (permet tenir format com pagrafs, fotos, etc.)	
	$mail->MsgHTML("<h4> Tema: ". $tema ."</h4><br>". $missatge ."<br><br> Escrit: ". $nom ." ". $cognoms ." Correu: ". $email ."<br><img src='img/logo/theworldcycle.png'>");

	$error = $mail->Send();//indico un usuario / clave de un usuario de gmail
	if($error == 1){
		//echo "entrat error 1";
		$_SESSION['correuinfo']="Info enviar missatge";
		$_SESSION['correuinfo1']="S'ha enviat correctament el missatge!";
	} else {
		$_SESSION['correuinfo']="Info enviar missatge";
		$_SESSION['correuinfo1']="No s'ha enviat correctament el missatge!";
		$_SESSION['correuinfo2']="Error";
	}
	header('Location: ' . $_SERVER['HTTP_REFERER']); //tornar la pàgina anterior on hem clicat per anar aquesta (BACK)
?>