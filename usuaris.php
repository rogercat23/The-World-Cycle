<!doctype html><head>
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
						include 'sessiogeneral2.php';
					?>
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
            <p>Usuaris</p>
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-1">
					<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModalregistrar" onClick="modelusuari()" ><span class='glyphicon glyphicon-plus' aria-hidden='true'></span><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Usuari</button>
				</div>
				<div class="col-md-6">
				</div>
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