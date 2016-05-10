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
						include 'sessiogeneral.php';
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
            <div id="qd_cos"><br>
	<?php
		require_once("GeneralBD.php");
		$conBD = new GeneralBD();
		$categories = $conBD->runQuery("SELECT * FROM categoria");

	?>    
	<div class="row">
		<div class="col-md-1">
		</div>
        <?php
			if(isset($_SESSION['correu'])){
		?>
		<div class="col-md-2">
			<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModalproducte" ><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Producte</button>
		</div>
        <?php 
			}
		?>
		<div class="col-md-2">
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
</body>
<script>
function cridafuncioaccioproducte(accio,id) {
		PNotify.removeAll(); //Borrar totes les notificacions que esta mostrant aquest moment
		$("#iconcarregar").show();
		var query;
		switch(accio) {
			case "modificar":
				var pnom = $("#pnom"+id).val();
				var ppreu= $("#ppreu"+id).val();
				var puni= $("#puni"+id).val();
				var cat = $("#categoria"+id).val();
				var desc = $("#desc"+id).val();
				query = 'accio='+accio+'&id_producte='+id+'&pnom='+pnom+'&ppreu='+ppreu+'&puni='+puni+'&cat='+cat+'&desc='+desc;
				//alert(query);
			break;
			case "eliminar":
				query = 'accio='+accio+'&id_producte='+id;
				//alert(query);
			break;
		}
	 
		$.ajax({
		url: "accionsBDproductes.php",
		data:query,
		type: "POST",
		success:function(data){
			switch(accio) {
				case "eliminar":
					if(data == "S'ha eliminat correctament el producte"){
						mostrar_notificacio_pnotify("Producte",data,"success");
						$("#cos-contingut-productes").load("paginationProductes.php?page=1"); //tornem carregar la pagina aixi no mostra el producte que acabem d'eliminar
					} else {
						mostrar_notificacio_pnotify("Producte",data,"info");
					}
				break;
				case "modificar":
					mostrar_notificacio_pnotify("Producte",data,"success");
					$("#cos-contingut-productes").load("paginationProductes.php?page=1"); //tornem carregar la pagina aixi no mostra el producte que acabem d'eliminar
					$('#myModalproducte'+id).modal('hide'); //amagar i borrar fondo que no marxava
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
				break;
			}
			$("#iconcarregarproductes").hide();
		},
		error:function (){
			mostrar_notificacio_pnotify("AJAX BD","En general no funciona!","error");
			$("#iconcarregarproductes").hide();
		}
	});
};

</script>
        </div>
        
        <?php
			include 'dialogregistrar.php';
		?>
    </body>
</html>