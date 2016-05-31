<?php
<<<<<<< HEAD
	include "pg/classes/CistellaClass.php";
	$cistella = new CistellaClass();
	if(isset($_SESSION['correu'])){
		echo "<form id='formgeneral' action='tancarsessio2.php' method='post'><button type='submit' class='button  btn-default btn-sm' formaction='gestusuari.php'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Benvingut ". $_SESSION['nom']." ". $_SESSION['cognoms'] ."</button>\n 
	<button type='submit' class='button btn-primary btn-sm' formaction='cistella.php'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'> Cistella <span class='badge'>". $cistella->productes_total() ."</span></button>
=======
	include 'session.php';
	if(isset($_SESSION['correu'])){
		echo "<form action='' method='post'><button type='submit' class='button  btn-default btn-sm' formaction='gestusuari.php'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Benvingut ". $_SESSION['nom']." ". $_SESSION['cognoms'] ."</button>\n 
	<button type='submit' class='button btn-primary btn-sm' formaction='cistella.php'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></button>
>>>>>>> origin/Productes-Ajax
	<button type='submit' class='button btn-danger btn-sm' name='tancarsessio'><span class='glyphicon glyphicon-off' aria-hidden='true'></span> Tancar sessi&oacute;</button>
	</form>";
	} else {
		header('Location: index.php'); //Farem tornar index.php si hem sortit de sessió
	}
?>