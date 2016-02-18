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
		echo "<form action='' method='post'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Benvingut ". $_SESSION['nom']." ". $_SESSION['cognoms'] ."\n<button type='submit' class='button btn-danger btn-sm' name='tancarsessio'><span class='glyphicon glyphicon-off' aria-hidden='true'></span> Tancar sessi&oacute;</button></form>";
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
		 <button type="submit" class="button btn-success btn-sm"><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Entrar </button>
		 <button type="button"  class="button btn-primary btn-sm" data-toggle="modal" data-target="#myModalregistrar" ><span class='glyphicon glyphicon-plus' aria-hidden='true'></span><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Registrar</button>
		</div>
	  </form>
   </div>
<?php
	}
?>

