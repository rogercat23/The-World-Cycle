<html>
    <head>
        <title> The World Cycle Web </title>
        <?php
			include 'llibreries.php';
			include "/pg/sessio/sessio.php";
		?>
    </head>
    <body>
        <div class="cos">
            <div id="qd_titol">
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
            </div>
            <div id="qd_cos">
                <div id="centre-form">
                    <p>Contacte</p>
                    <form  action="enviarmissatge.php" method="post" id="formularicontacte">
                     <?php
						if(!isset($_SESSION['correu'])){
					  ?>
                  
                      <div class="form-group">
                        <label>Usuari:</label>
                        <div id="correu1div" class="has-feedback">
                        	<input type="email" class="form-control" id="correu1" name="correu1" placeholder="Correu" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="correu1icon" class="form-control-feedback glyphicon"></span></br>
                        </div>
                        <div class="row">
                        	<div id="nomcdiv" class="col-xs-6 has-feedback">
                        		<input type="text" class="form-control" id="nomc" name="nomc" placeholder="Nom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="nomcicon" class="form-control-feedback glyphicon"></span></br>
                        	</div>
                            <div id="cognomsdiv" class="col-xs-6 has-feedback">
                        		<input type="text" class="form-control" id="cognoms" name="cognoms" placeholder="Cognoms" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="cognomsicon" class="form-control-feedback glyphicon"></span></br>
                        	</div>
                       	</div>
                        <?php
						} else {
							//echo $_SESSION['correu'];
							//echo $_SESSION['nom'];
							//echo $_SESSION['cognoms'];
						}
						?>
                        <div class="form-group">
                        <label>Tema:</label>
                        <div id="temadiv" class="has-feedback">
                        	<input type="text" class="form-control" id="tema" name="tema" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="temaicon" class="form-control-feedback glyphicon"></span>
                        </div>
                      </div>
                      <div class="form-group">
                      	<div id="comentaridiv" class="has-feedback">
                          <label for="Comentari">Comentari:</label>
                          <textarea class="form-control" rows="5" id="comentari" name="comentari" onChange="comprovarCamps(this.id)" title="Es obligatori! Màxim 500 caracters..." maxlength="500" required></textarea><span id="comentariicon" class="form-control-feedback glyphicon"></span>
                      	</div>
                      </div>
                      <center>
                          <button type="reset" class="btn btn-danger" id="netejarformcontacte">Netejar</button>
                          <button type="submit" class="btn btn-success">Enviar missatge</button>
                      </center>
                    </form>
   				</div>
            </div>
        </div>
        
        <?php
			include 'dialogregistrar.php';
		?>
    </body>
</html>