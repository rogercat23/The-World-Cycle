<!doctype html>
    <head>
        <title> The World Cycle Web </title>
        <?php
			include 'llibreries.php';
		</script>
    </head>
    <body>
        <div class="cos">
            <div id="qd_titol">
                <img src="img\logo\theworldcycle.png"/>
                <div id="formulari-usuari"> 
                	<?php
						include 'session.php';
						if(isset($_SESSION['correu'])){
                    		echo "<form action='' method='post'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Benvingut ". $_SESSION['nom']." ". $_SESSION['cognoms'] ."\n<button type='submit' class='button btn-danger btn-sm' name='tancarsessio'><span class='glyphicon glyphicon-off' aria-hidden='true'></span> Tancar sessi&oacute;</button></form>";
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
            <p>Usuaris</p>
            <div id="plus_up">
            	<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModalregistrar" ><span class='glyphicon glyphicon-plus' aria-hidden='true'></span><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Usuari</button>
            </div>
            <div id="iconcarregarusuaris" align="center"><h1><span class="glyphicon glyphicon-refresh glyphicon-spin"></span> Carregant...</h1></div>
            <div id="cos-contingut-usuaris" >
            </div>
				<?php
					require_once("GeneralBD.php");
					$conBD = new GeneralBD();
					$limit = 8;
					$numrows = $conBD->numRows("SELECT * FROM usuari");
					$total_records = $numrows;  
					$total_pages = ceil($total_records / $limit); 
					?>
					<div align="center">
					<ul class='pagination text-center' id="paginationusuaris">
					<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
								if($i == 1):?>
								<li class='active'  id="<?php echo $i;?>"><a href='paginationUsuaris.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
								<?php else:?>
								<li id="<?php echo $i;?>"><a href='paginationUsuaris.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
							<?php endif;?>          
					<?php endfor;endif;?> 
                	</div> 
            </div>
            
		<?php
	        include 'dialogregistrar.php';
		?>    
    </body>
</html>