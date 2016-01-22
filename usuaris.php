<html>
    <head>
        <title> The World Cycle Web </title>
        <?php
			include 'llibreries.php';
		?>
    </head>
    <body>
        <div class="cos">
            <div id="qd_titol">
                <img src="img\logo\theworldcycle.png"/>
                <div id="formulari-usuari"> 
                	<?php
						include 'session.php';
						if(isset($_SESSION['correu'])){
                    		echo "<form action='' method='post'>Benvingut ". $_SESSION['nom']."\n<input type='submit' class='btn btn-danger btn-sm' value='Tancar sessi&oacute;' name='tancarsessio'></form>";
						} else {
							header('Location: index.php'); //Farem tornar index.php si hem sortit de sessió
						}
					?>
                </div>
                <ul id="botons_menu_hor">
                    <li><a href="index.php">Benvingut The World Cycle!</a></li>
                    <li><a href="productes.php">Productes</a></li>
                    <?php
						if(isset($_SESSION['correu'])){
                    		echo "<li><a href='usuaris.php'>Usuaris</a></li>";
						}
					?>
                    <li><a href="contacte.php">Contacte</a></li>
                </ul>
            </div>
            <div id="qd_cos">
				<div>
                    <p> Usuaris </p>
                    
                    <table class="table table-striped">
                        <thead><tr><th>Correu</th><th>Nom</th><th>Cognoms</th><th>Estat</th><th>Permisos</th><th></th></tr></thead>
                        <?php
							require_once("GeneralBD.php");
						
							$GeneralBD = new GeneralBD();
							$usuaris = $GeneralBD->runQuery("SELECT * FROM usuari");
							$estats = $GeneralBD->runQuery("SELECT * FROM estat");
							$permisos = $GeneralBD->runQuery("SELECT * FROM roles");
							$GeneralBD->tancarBD();
                            for($i=0;$i<count($usuaris);$i++){
                                echo "<tr><td>". $usuaris[$i]['correu'] ."</td><td> ". $usuaris[$i]['nom'] ."</td><td> ". $usuaris[$i]['cognom1']." ". $usuaris[$i]['cognom2'] ."</td><td><select name='selectestats' class='form-control'>";
								for($y=0;$y<count($estats);$y++){ 
									if($estats[$y]['id'] == $usuaris[$i]['id_estat']){
										echo "<option value='".$estats[$y]['id']."' selected>".$estats[$y]['descripcio']."</option>";
									} else {
								  		echo "<option value='".$estats[$y]['id']."'>".$estats[$y]['descripcio']."</option>";
									}
								  }
								echo "</select></td><td><select name='selectpermis' class='form-control'>";
								for($x=0;$x<count($permisos);$x++){ 
									if($permisos[$x]['id'] == $usuaris[$i]['id_roles']){
										echo "<option value='".$permisos[$x]['id']."' selected>".$permisos[$x]['permisos']."</option>";
									} else {
								  		echo "<option value='".$permisos[$x]['id']."'>".$permisos[$x]['permisos']."</option>";
									}
								} 
								echo "</select></td><td><button class='form-control btn-danger'>". Eliminar/*$usuaris[$i][0]*/ ."</button></td></tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>