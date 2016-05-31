<!doctype html>
    <head>
        <title> The World Cycle Web </title>
        <?php
			include	'llibreries.php';
			include "/pg/sessio/sessio.php";
		?>
    </head>
    <body>
        <div class="cos">
            <div id="qd_titol">
                <img src="img\logo\theworldcycle.png"/>
                <div id="formulari-usuari2"> 
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
            	<p id="titol-usuari-dades"> Dades del teu usuari</p>
                <div id="cos-dades-usuari"></div>
            	</br>
                <p> Gestió d'adreces</p>
                <div id="cos-adreces-del-ususuari"></div>
                <div id="boto_tancar_mapa" style="display:none">
                	<button id="boto_tancar_mapa" class="btn btn-danger" onClick="tancar_mapa()"><span class="glyphicon glyphicon glyphicon-globe" aria-hidden="true"> Tancar</button>
                </div>
               <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgf3I8QQZCCqct0m8OfS-M_KsnxN_ezOU"></script>
 <div id="mostrar_mapa"></div>
        </div>
        <script>
        	$("#cos-dades-usuari").load("dadesusuari.php?id_usuari="+<?php echo $_SESSION['id'] ?>);
			$("#cos-adreces-del-ususuari").load("mostrardadesadreces.php?id_usuari="+<?php echo $_SESSION['id'] ?>);
			function cridafuncioaccioafgadr(accio,id,id_usr){
				PNotify.removeAll(); //Borrar totes les notificacions que esta mostrant aquest moment
				if(id==0){//entrem si pillem id 0 per controlar els fallos de formulari per evitar editar sense control
					var resp = formulariafgadr();
				}
				if(resp || id!=0){ //si es true control entrem o id no es 0 es entrara per eliminar acció
					var query;
					switch(accio) {
						case "afegir":
							var idpr = $("#provinciaregio").val();
							var ciutat = $("#ciutat").val();
							var postal = $("#postal").val();
							var carrer = $("#carrer").val();
							var num = $("#numero").val();
							var porta = $("#porta").val();
							var pis = $("#pis").val();
							query = 'accio='+accio+'&id_usuari='+ id_usr +'&idpr='+ idpr +'&ciutat='+ ciutat +'&postal='+ postal +'&carrer='+ carrer +'&num='+ num +'&porta='+ porta +'&pis='+ pis;
							//alert(query);
						break;
						case "eliminar":
							query = 'accio='+accio+'&id_adr='+id;
							//alert(query);
						break;
					}
				
					//Aqui fem accions que rebem i cridem a BD amb AJAX que permet fer sense carregar la pàgina i tal es com no haguessis passat res la pàgina.
					$.ajax({
						url: "pg/accionsBD/accionsBDadreces.php",
						data:query,
						type: "POST",
						success:function(data){
							switch(accio) { //que ha sortit bé i fem missatge cada acció
								case "afegir":
									mostrar_notificacio_pnotify("Adreça","Acaba d'afegir correctament!","success");
									$('#myModalmod'+id).modal('hide'); //amagar i borrar fondo que no marxava
									$('body').removeClass('modal-open');
									$('.modal-backdrop').remove();
								break;
								break;
								case "eliminar": 
									mostrar_notificacio_pnotify("Adreça","Acaba d'eliminar correctament!","success");
								break;
							}
							$("#cos-adreces-del-ususuari").load("mostrardadesadreces.php?id_usuari="+<?php echo $_SESSION['id'] ?>);
						},
						error:function (){ //Si surt malament hem de fer avis error
							mostrar_notificacio_pnotify("AJAX BD","En general no funciona!","error");
						}
					});
				}
			};
		</script>
    </body>
</html>