<!doctype html>
    <head>
        <title> The World Cycle Web </title>
        <?php
			include 'llibreries.php';
			require_once("GeneralBD.php");
			
			$GeneralBD = new GeneralBD();
			$paisos = $GeneralBD->runQuery("SELECT * FROM pais");
			$provinciesregions = $GeneralBD->runQuery("SELECT * FROM provinciaregio");
			$ciutats = $GeneralBD->runQuery("SELECT * FROM ciutat");
			$correus = $GeneralBD->runQuery1("SELECT correu FROM usuari");
			$GeneralBD->tancarBD();
		?>
        <script type="text/javascript">
			var provinciesregions = <?php echo json_encode($provinciesregions);?>; //transformem per poder passar select a provincies un cop escullit del pais
			var ciutats = <?php echo json_encode($ciutats);?>; //transformem tipus json que es array del javascript
			var correus = <?php echo json_encode($correus);?> //igual ciutats (anterior) amb correus
		</script>
    </head>
    <body>
        <div class="cos">
            <div id="qd_titol">
                <img src="img\logo\theworldcycle.png"/>
                <div id="formulari-usuari"> 
                	<?php
						include 'session.php';
						if(isset($_SESSION['error'])){
					?>
                    	<script>
							$(function(){mostrar_notificacio_pnotify("Alerta","<?php echo $_SESSION['error']; ?>","error");});
						</script>
                    <?php
							unset($_SESSION['error']);
						}
						if(isset($_SESSION['correu'])){
                    		header('Location: index.php');
						} else {
					?>
                	<div class="row">
                    	<form action="iniciarusuari.php" method="post">
                         	<div class="col-xs-4">
                        		<input type="text" class="form-control input-sm" id="correui" name="correui" placeholder="Correu">
                         	</div>
                         	<div class="col-xs-4">
                     			<input type="password" class="form-control input-sm" id="passwordi" name="passwordi" placeholder="Password">   		 
                        	</div>
                            <div class="col-xs-4">
                             <button type="submit" class="button btn-success btn-sm"> Entrar </button>
                        	</div>
                       	  </form>
                       </div>
                       <?php
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
            	<div id="centre-form">
                    <p>Registrar</p>
                    	<div id="">
                            <form  action="controlregistrar.php" method="post" id="formulariregistrar">
                              <div class="form-group">
                                <label>Usuari:</label>
                                <div id="correudiv" class="has-feedback">
                                    <input type="email" class="form-control" id="correu" name="correu" placeholder="Correu" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="correuicon" class="form-control-feedback glyphicon"></span></br>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 has-feedback" id="passworddiv">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" onChange="comprovarCamps(this.id)"  title="Es obligatori!" required><span id="passwordicon" class="form-control-feedback glyphicon"></span>
                                    </div>
                                    <div class="col-xs-6 has-feedback" id="password2div">
                                        <input type="password" class="form-control" id="password2"  name="password2" placeholder="Repetir password" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="password2icon" class="form-control-feedback glyphicon"></span>
                                    </div>
                               </div>
                              </div>
                              <div class="form-group">
                                <label>Dades personals:</label>
                                <div class="row">
                                    <div id="nomdiv" class="col-xs-6 has-feedback">
                                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="nomicon" class="form-control-feedback glyphicon"></span></br>
                                    </div>
                                    <div id="cognom1div" class="col-xs-6 has-feedback">
                                        <input type="text" class="form-control" id="cognom1" name="cognom1" placeholder="Primer cognom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="cognom1icon" class="form-control-feedback glyphicon"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 has-feedback" id="cognom2div">
                                        <input type="text" class="form-control" id="cognom2" name="cognom2" placeholder="Segon cognom" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="cognom2icon" class="form-control-feedback glyphicon"></span>
                                    </div>
                                    <div class="col-xs-6 has-feedback c-inputs-stacked" id="hddiv">
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default">
                                                <input type="radio" id="hd" name="hd" value="Home" onChange="comprovarCamps(this.id)" title="Es obligatori!" required/> Home
                                            </label> 
                                            <label class="btn btn-default">
                                                <input type="radio" id="hd" name="hd" value="Dona" onChange="comprovarCamps(this.id)"/> Dona
                                            </label>
                                            <label class="btn" id="radioicon">
                                                <span id="hdicon" class="form-control-feedback glyphicon"></span>
                                            </label>
                                        </div>
                                    </div>
                               </div></br>
                               <div class="row">
                                    <div class="col-xs-6 has-feedback" id="telefondiv">
                                        <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Tel&eacute;fon" onChange="comprovarCamps(this.id)"  title="Es obligatori!" required><span id="telefonicon" class="form-control-feedback glyphicon"></span>
                                    </div>
                                    <div class="col-xs-6 has-feedback" id="data_naixdiv">
                                        <input type="text" class="form-control datepicker" id="data_naix" name="data_naix" placeholder="Data de naixament" onChange="comprovarCamps(this.id)"  title="Es obligatori!" required><span id="data_naixicon" class="form-control-feedback glyphicon"></span>
                                    </div>
                               </div>
                              </div>
                              <div class="form-group">
                                <label>Adre&ccedil;a:</label>
                                <div class="row">
                                    <div id="paisdiv" class="col-xs-6 has-feedback">
                                        <select class="form-control" id="pais" name="pais" onChange="comprovarCamps(this.id)" title="Es obligatori!" required>
                                            <option value="">Pais</option>
                                            <?php
                                                for($i=0;$i<count($paisos);$i++){
                                                    echo "<option value='". $paisos[$i]['id'] ."'>". $paisos[$i]['nom'] ."</option>";
                                                }
                                            ?>
                                        </select>
                                        <span id="paisicon" class="form-control-feedback glyphicon"></span>
                                    </div>
                                    <div class="col-xs-6 has-feedback" id="provinciaregiodiv">
                                        <select class="form-control" id="provinciaregio" name="provinciaregio" onChange="comprovarCamps(this.id)" title="Es obligatori!" required>
                                            <option value="">Provincia/Regio</option>
                                            
                                        </select><span id="provinciaregioicon" class="form-control-feedback glyphicon"></span>
                                    </div>
                               </div></br>
                                <div class="row">
                                     <div class="col-xs-8 has-feedback" id="ciutatdiv">
                                        <input type="text" class="form-control" id="ciutat" name="ciutat" placeholder="Ciutat" title="Es obligatori!" disabled="true" required><span id="ciutaticon" class="form-control-feedback glyphicon"></span>
                                      </div>
                                      <div class="col-xs-4 has-feedback" id="postaldiv">
                                        <input type="text" class="form-control" id="postal" name="postal" placeholder="Postal" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="postalicon" class="form-control-feedback glyphicon"></span>
                                      </div>
                                </div></br>
                                <div id="carrerdiv" class="has-feedback">
                                    <input type="text" class="form-control" id="carrer" name="carrer" placeholder="Carrer" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="carrericon" class="form-control-feedback glyphicon"></span></br>
                                </div>
                                 <div class="row">
                                     <div class="col-xs-4 has-feedback" id="numerodiv">
                                        <input type="text" class="form-control" id="numero" name="numero" placeholder="N&uacute;mero" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="numeroicon" class="form-control-feedback glyphicon"></span>
                                      </div>
                                      <div class="col-xs-4 has-feedback" id="pisdiv">
                                        <input type="text" class="form-control" id="pis" name="pis" placeholder="Pis" onChange="comprovarCamps(this.id)"><span id="pisicon" class="form-control-feedback glyphicon"></span>
                                      </div>
                                      <div class="col-xs-4 has-feedback" id="portadiv">
                                        <input type="text" class="form-control" id="porta" name="porta" placeholder="Porta" onChange="comprovarCamps(this.id)"><span id="portaicon" class="form-control-feedback glyphicon"></span>
                                      </div>
                                  </div>  
                              </div>
                              <center>
                                  <button type="submit" class="btn btn-success">Registrar</button>
                                  <button type="reset" class="btn btn-danger" id="netejarformregistrar">Netejar</button>
                              </center>
                            </form>
                	  </div>
   				</div>
            </div>
        </div>
    </body>
</html>