<?php
	session_start();
	if(isset($_POST['tancarsessio'])){
			//session_unset();
			session_destroy();
			header("Refresh:0"); //Actualitzar la pàgina per fer efecte desaparició de sessió guardats
	}
	if(isset($_SESSION['missatgecrear'])){
?>
	<script>
		$(function(){mostrar_notificacio_pnotify("<?php echo $_SESSION['missatgecrears'] ?>","<?php echo $_SESSION['missatgecrear']; ?>","success");});
	</script>
<?php
		unset($_SESSION['missatgecrear']);
		unset($_SESSION['missatgecrears']);
	}
	if(isset($_SESSION['correuinfo'])){
		if(isset($_SESSION['correuinfo2'])){
?>
			<script>
                $(function(){mostrar_notificacio_pnotify("<?php echo $_SESSION['correuinfo']; ?>","<?php echo $_SESSION['correuinfo1']; ?>","error");});
            </script>	
<?php	
			unset($_SESSION['correuinfo2']);
		} else {
?>
			<script>
                $(function(){mostrar_notificacio_pnotify("<?php echo $_SESSION['correuinfo']; ?>","<?php echo $_SESSION['correuinfo1']; ?>","success");});
            </script>
<?php
		}
		unset($_SESSION['correuinfo']);
		unset($_SESSION['correuinfo1']);
	}
?>