<!doctype html>
    <head>
        <title> The World Cycle Web </title>
        <?php
<<<<<<< HEAD
			include	 "llibreries.php";
			include "/pg/sessio/sessio.php";
=======
			include	 'llibreries.php';
>>>>>>> origin/Productes-Ajax
		?>
    </head>
    <body>
        <div class="cos">
            <div id="qd_titol">
                <img src="img\logo\theworldcycle.png"/>
<<<<<<< HEAD
                <div id="formulari-usuari2"> 
=======
                <div id="formulari-usuari"> 
                	<?php
						include 'sessiogeneral2.php';	
					?>
>>>>>>> origin/Productes-Ajax
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
            </div>
            <div id="qd_cos">
<<<<<<< HEAD
				<p>Cistella</p></br>
    			<div id="taula_productes2"></div></br>
                <div id="pas1_adreces_triar"></div></br>
                <div id="pas2_pagament"></div></br>
                <div id="pas3_factura_pdf"></div>
=======
				<p>Cistella</p> 
>>>>>>> origin/Productes-Ajax
            </div>
        </div>
    </body>
</html>