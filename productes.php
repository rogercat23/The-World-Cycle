<!doctype html>
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
            <div id="qd_cos"><br>
	<?php
		require_once("pg/classes/GeneralBD.php");
		$conBD = new GeneralBD();
		$categories = $conBD->runQuery("SELECT * FROM categoria");

	?>    
	<div class="row">
		<div class="col-md-1">
		</div>
        <?php
			if(isset($_SESSION['correu'])){
		?>
		<div class="col-md-4">
			<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModalproducte" ><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Producte</button>
			<button type="button"  class="btn btn-primary" onClick="mostrarmeuproductes(<?php echo $_SESSION['id'] ?>)"><span class='glyphicon glyphicon-inbox' aria-hidden='true'></span> Els meus productes</button>
		</div>
        <?php 
			}
		?>
		<div class="col-md-3">
			<select class="form-control" id="categoria" onChange="seleccionarcategoria(this.id)">
				<option value="0">Totes les categories...</option>
				<?php
					for($i=0;$i<count($categories);$i++){
						echo "<option value='". $categories[$i]['id'] ."'>". $categories[$i]['nom'] ."</option>";
					}
				?>
			</select>
		</div>
		<div class="col-md-3">
		</div>
	</div></br>
    <div id="iconcarregarproductes" align="center"><h3><span class="glyphicon glyphicon-refresh .glyphicon-spin"></span> Carregant...</h3></div>
    <div id="cos-contingut-productes"></div>
    <div id="cos-pagines-nav-productes"></div>
</div>
	<?php
	        include 'dialogproducte.php';
	?> 
        </div>        
        <?php
			include 'dialogregistrar.php';
		?>
    </body>
</html>