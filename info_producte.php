<?php
require_once("GeneralBD.php");
require("session.php");
$conBD = new GeneralBD();

$producte = $conBD->runQuery("SELECT * FROM producte p, vendre v, usuari u WHERE p.id=v.id_producte AND v.id_usuari=u.id AND p.id=". $_GET['id_producte']);//per poder pillar descripcio i unitat
?>
<div class="row">
	<div class="col-md-3 div-producte-1">
    	<h3>Galeria</h3>
        <ul class="gallery<?php echo $_GET["id_producte"]; ?> gallery clearfix" id="p<?php echo $_GET["id_producte"]; ?>">
                            <li><a href="img/fullscreen/1.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_1.jpg" width="60" height="60"/></a></li>
                            <li><a href="img/fullscreen/2.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_2.jpg" width="60" height="60"/></a></li>
                            <li><a href="img/fullscreen/3.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_3.jpg" width="60" height="60"/></a></li>
                            <li><a href="img/fullscreen/4.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_4.jpg" width="60" height="60"/></a></li>
                            <li><a href="img/fullscreen/5.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_5.jpg" width="60" height="60"/></a></li>
                            <li><a href="img/fullscreen/6.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_2.jpg" width="60" height="60"/></a></<li>
        </ul>
        <script>
        $(document).ready(function(){
                $("area[rel^='prettyPhoto']").prettyPhoto();
                
                $(".gallery<?php echo $_GET["id_producte"]; ?>:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
        
                $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
                    custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
                    changepicturecallback: function(){ initialize(); }
                });
        
                $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
                    custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
                    changepicturecallback: function(){ _bsap.exec(); }
                });
            });
        </script>
	</div>
	<div class="col-md-5">
    		<h3>Descripció del producte:</h3>
            <?php
				echo $producte[0]['descripció'];
			?>
    </div> 
    <?php
		if(isset($_SESSION['correu'])){
	?>
    <div class="col-md-4">
        <form id='myform'>   
                	<input disabled="true" type='text' name='unitat<?php echo $_GET["id_producte"]; ?>' value='0' class='qty' />
                	<button class='qtyminus gtyminus<?php echo $_GET["id_producte"]; ?> btn btn-default' field='unitat<?php echo $_GET["id_producte"]; ?>'><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></button>
                	<button class='qtyplus qtyplus<?php echo $_GET["id_producte"]; ?> btn btn-default' field='unitat<?php echo $_GET["id_producte"]; ?>'><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
               
                	<button class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
               
        </form>
        </br>
        Contacte del venedor: <?php echo $producte[0]['correu']?>
        <script>
			jQuery(document).ready(function(){
			// aquest boto per sumar + unitat
			$('.qtyplus<?php echo $_GET["id_producte"]; ?>').click(function(e){
				e.preventDefault();//Pausa
				fieldName = $(this).attr('field');//pillem valor de field per poder ficar suma unitat del camp
				var currentVal = parseInt($('input[name='+fieldName+']').val());//pillem valor d'actual per poder sumar
				if (!isNaN(currentVal) && currentVal < <?php echo $producte[0]['unitat']?>) { //si esta indefinit o valor actual que no superi max unitat del producte de BD
					//Sumar
					$('input[name='+fieldName+']').val(currentVal + 1);
				} 
			});
			// aquest boto per restar - unitat
			$(".gtyminus<?php echo $_GET["id_producte"]; ?>").click(function(e) {
				e.preventDefault();//Pausa
				fieldName = $(this).attr('field');//igual suma pero amb resta
				var currentVal = parseInt($('input[name='+fieldName+']').val());
				if (!isNaN(currentVal) && currentVal > 0) { //si esta indefint o valor actual que no pot estar numero negativa per tant ha de ser 0 o més
					// Restar
					$('input[name='+fieldName+']').val(currentVal - 1);
				}
			});
		});
		</script>
    </div>
    <?php
		}
    ?>
</div>