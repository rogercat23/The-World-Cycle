<!doctype html>
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
                    		echo "<form action='' method='post'>Benvingut ". $_SESSION['nom']."\n<input type='submit' class='button btn-danger btn-sm' value='Tancar sessi&oacute;' name='tancarsessio'></form>";
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
            <div id="iconcarregar" align="center"><h1><span class="glyphicon glyphicon-refresh glyphicon-spin"></span> Carregant...</h1></div>
            <div id="cos-contingut" >
                
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
					<ul class='pagination text-center' id="pagination">
					<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
								if($i == 1):?>
								<li class='active'  id="<?php echo $i;?>"><a href='paginationUsuaris.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
								<?php else:?>
								<li id="<?php echo $i;?>"><a href='paginationUsuaris.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
							<?php endif;?>          
					<?php endfor;endif;?> 
						</div> 
					</div>
					</body>
					<script>
					$(document).ready(function() {
					$("#cos-contingut").load("paginationUsuaris.php?page=1");
						$("#iconcarregar").hide();
						$("#pagination li").live('click',function(e){
						e.preventDefault();
							$("#cos-contingut").hide();
							$("#iconcarregar").show();    
							$("#pagination li").removeClass('active');
							$(this).addClass('active');
							var pageNum = this.id;
							$("#cos-contingut").load("paginationUsuaris.php?page=" + pageNum);
							$("#iconcarregar").hide();
							$("#cos-contingut").show();
						});
					});
					
					function cridafuncioaccio(accio,id) {
							$("#iconcarregar").show();
							var query;
							switch(accio) {
								case "afegir":
									alert("Afegir");
									query = 'accio='+accio+'&txtmessage='+ $("#txtmessage").val();
								break;
								case "modificar":
									alert("Modificar");
									query = 'accio='+accio+'&message_id='+ id + '&txtmessage='+ $("#txtmessage_"+id).val();
								break;
								case "eliminar":
									query = 'accio='+accio+'&id_usuari='+id;
									//alert("Eliminar");
								break;
								case 'canviestat':
									var id_estat = $("#selectestats"+id).select().val();//pillem que hem selecionat el permis que acaba de recullir 
									query = 'accio='+accio+'&id_usuari='+id+'&id_estat='+id_estat;
									//alert(id_estat);
								break;
								case 'canvirol':
									var id_rol = $("#selectrol"+id).select().val();//pillem que hem selecionat el permis que acaba de recullir
									query = 'accio='+accio+'&id_usuari='+id+'&id_rol='+id_rol;
									//alert(id_rol);
								break;
							}
					
							//Aqui fem accions que rebem i cridem a BD amb AJAX que permet fer sense carregar la pàgina i tal es com no haguessis passat res la pàgina.
							$.ajax({
								url: "accionsBDusuaris.php",
								data:query,
								type: "POST",
								success:function(data){
									switch(accio) { //que ha sortit bé i fem missatge cada acció
										case 'eliminar':
											mostrar_notificacio_pnotify("Usuari","Acaba d'eliminar correctament!","success");
											$("#cos-contingut").load("paginationUsuaris.php?page=1"); //tornem carregar la pagina aixi no mostra usuari que acabem d'eliminar
										break;
										case 'canviestat':
											mostrar_notificacio_pnotify("Estat","Acaba de fer canvi correctament!","success");
										break;
										case "canvirol":
											mostrar_notificacio_pnotify("Rol","Acaba de fer canvi correctament!","success");
										break;
									}
									$("#iconcarregar").hide();
								},
								error:function (){ //Si surt malament hem de fer avis error
									mostrar_notificacio_pnotify("AJAX BD","En general no funciona!","error");
									$("#iconcarregar").hide();
								}
							});
						};
					</script>
            
            	
            </div>
        </div>
    </body>
</html>