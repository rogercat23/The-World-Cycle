<?php
	include 'llibreries.php';
	include "/pg/sessio/sessio.php";
?>
<img src="img\logo\theworldcycle.png"/>
<div id="formulari-usuari1"> 
</div>
<ul id="botons_menu_hor">
    <li><a href="index.php">Benvingut The World Cycle!</a></li>
    <li><a href="productes.php">Productes</a></li>
    <?php
        if(isset($_SESSION['correu'])){
            if($_SESSION['rol']==1){ //Només deixem fer els administradors com rol que hi ha tres admin, treballador, client
                echo "<li><a href='usuaris.php'>Usuaris</a></li>";
            }
        }
    ?>
    <li><a href="contacte.php">Contacte</a></li>
</ul>
