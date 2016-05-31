<?php
	include "pg/classes/CistellaClass.php";
	$cistella = new CistellaClass();
	if(isset($_SESSION['error'])){
?>
	<script>
		$(function(){mostrar_notificacio_pnotify("Alerta","<?php echo $_SESSION['error']; ?>","error");});
	</script>
<?php
		unset($_SESSION['error']);
	}
	if(isset($_SESSION['correu'])){
		echo "<form id='formgeneral' action='tancarsessio.php' method='post'><button type='submit' class='button btn-default btn-sm' formaction='gestusuari.php'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Benvingut ". $_SESSION['nom']." ". $_SESSION['cognoms'] ."</button>\n 
	<button type='submit' class='button btn-primary btn-sm' formaction='cistella.php'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'> Cistella <span class='badge'>". $cistella->productes_total() ."</span></button>
	<button type='submit' class='button btn-danger btn-sm' name='tancarsessio'><span class='glyphicon glyphicon-off' aria-hidden='true'></span> Tancar sessi&oacute;</button>
	</form>";
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
		 <button type="submit" class="button btn-success btn-sm"><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Entrar</button>
		 <button type="button"  class="button btn-primary btn-sm" data-toggle="modal" data-target="#myModalregistrar" ><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Registrar</button>
		</div>
	  </form>
   </div>
<?php
	}
?>
