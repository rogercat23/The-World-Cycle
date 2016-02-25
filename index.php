<!doctype html>
    <head>
        <title> The World Cycle Web </title>
        <?php
			include	 'llibreries.php';
		?>
    </head>
    <body>
        <div class="cos">
            <div id="qd_titol">
                <img src="img\logo\theworldcycle.png"/>
                <div id="formulari-usuari"> 
                	<?php
						include 'sessiogeneral.php';
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
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicadors -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<!-- Wrapper for sliders for items -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="img\Carousel\Prova1.jpg" alt="Prova">
							<div class="carousel-caption">
								<h1>Prova</h1>
								<p>
									Aqui hi ha oferta bona ....
								</p>
							</div>
						</div>
						<div class="item">
							<img src="img\Carousel\Prova2.jpg" alt="Prova2">
							<div class="carousel-caption">
								<h1>Prova2</h1>
								<p>
									Aqui hi ha oferta bona ....
								</p>
							</div>
						</div>
						<div class="item">
							<img src="img\Carousel\Prova3.jpg" alt="Prova3">
							<div class="carousel-caption">
								<h1>Prova3</h1>
								<p>
									Aqui hi ha oferta bona ....
								</p>
							</div>
						</div>
					</div>
					<!-- Carousel nav (controls left and right)-->
					<a class="carousel-control left" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left color-default" aria-hidden="true"></span>
					</a>
					<a class="carousel-control right" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right color-default" aria-hidden="true"></span>
					</a>
				</div>     
            </div>
        </div>
        <?php
			include 'dialogregistrar.php';
		?>
    </body>
</html>