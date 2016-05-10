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
            	<p> Dades del teu usuari</p>
                <div id="cos-dades-usuari"></div>
            	</br>
                <p> Gestió d'adreces</p>
                <div id="cos-adreces-del-ususuari"></div>
				
                
				     
            </div>
        </div>
        <script>
        	$("#cos-dades-usuari").load("dadesusuari.php?id_usuari="+<?php echo $_SESSION['id'] ?>);
			$("#cos-adreces-del-ususuari").load("mostrardadesadreces.php?id_usuari="+<?php echo $_SESSION['id'] ?>);
		
		
	function cridafuncioadadesusuarimod() {
		PNotify.removeAll(); 
		var query;
		var id = $("#id").val();
		var nom = $("#nom").val();
		var cog1 = $("#cognom1").val();
		var cog2 = $("#cognom2").val();
		var hd = $("#chhd").val();
		var telefon = $("#telefon").val();
		var dn = $("#data_naix").val();
		
		query = 'id='+id+'&nom='+nom+'&cog1='+cog1+'&cog2='+cog2+'&hd='+hd+'&telefon='+telefon+'&dn='+dn;
		//alert(query);
	 
		$.ajax({
			url: "accionsBDdadesusuari.php",
			data:query,
			type: "POST",
			success:function(data){
				mostrar_notificacio_pnotify("Producte",data,"success");
				$("#cos-dades-usuari").load("dadesusuari.php?id_usuari="+id); //tornem carregar la pagina aixi no mostra canvis acabats de fer
				$('#myModalmoddadesusuari').modal('hide'); //amagar i borrar fondo que no marxava
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
			},
			error:function (){
				mostrar_notificacio_pnotify("AJAX BD","En general no funciona!","error");
				$("#iconcarregarproductes").hide();
			}
		});
	};

</script>

    </body>
</html>