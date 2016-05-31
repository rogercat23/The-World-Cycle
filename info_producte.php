<?php
require_once("pg/classes/GeneralBD.php");
include "/pg/sessio/sessio.php";
$GeneralBD = new GeneralBD();

$producte = $GeneralBD->runQuery("SELECT * FROM producte p, vendre v, usuari u WHERE p.id=v.id_producte AND v.id_usuari=u.id AND p.id=". $_GET['id_producte']);//per poder pillar descripcio i unitat
$fotosproducte = $GeneralBD->runQuery("SELECT * FROM imatge WHERE id_producte=". $_GET['id_producte']);
$infop = $GeneralBD->runQuery("SELECT * FROM producte WHERE id=". $_GET['id_producte']);//per poder ficar a la cistella per nom i preu
$fotosproducte = $GeneralBD->runQuery("SELECT * FROM imatge WHERE id_producte=". $_GET['id_producte']);
?>
<div class="row">
	<div class="col-md-3 div-producte-1">
    	<h3>Galeria</h3>
        <ul class="gallery<?php echo $_GET["id_producte"]; ?> gallery clearfix" id="p<?php echo $_GET["id_producte"]; ?>">
        	<?php
				if(count($fotosproducte)!=0){
					//Pilla array on tenim les fotos del producte i mostrant que hi hagi array amb thum i real que tenim carpeta de local
					foreach($fotosproducte as $k=>$v) {  
					$imatgen = $_GET['id_producte']."".$fotosproducte[$k]["nom_arxiu"];
					$imatgethum = "t_".$_GET['id_producte']."".$fotosproducte[$k]["nom_arxiu"];
				?>
					
					<li><a href="img/productetamrealjpg/<?php echo $imatgen?>" rel="prettyPhoto[gallery1]"><img src="img/productethumjpg/<?php echo $imatgethum ?>" width="60" height="60"/></a></li>
				<?php
					}
					} else {
				?>
                	<h1> No hi ha fotos aquest producte ! </h1>
                <?php		
					}
			?>
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
    		<h3>Ha pujat des de: <?php echo date("d/m/Y", strtotime($producte[0]['data'])); ?></h3>
    		<h3>Descripció del producte:</h3>
            <?php
				echo $producte[0]['descripció'];
			?>
             <?php
				if(isset($_SESSION['correu'])){
			?>
            	<div class="row">
            		<div class="col-md-11 comentaris_productes">
                		<?php 
							$comentaris = $GeneralBD->runQuery("SELECT * FROM usuari us, comentar c WHERE c.id_producte=".$_GET['id_producte']." AND c.id_usuari=us.id");
							if(count($comentaris)==0){
								echo "<div id='cap_comentari".$_GET['id_producte']."'>No hi ha comentaris</div>";
							} else {
								foreach($comentaris as $a=>$b) {
						?>
                        		<div class="comentari_producte" id="comentari<?php echo $comentaris[$a]['id'] ?>">
                                	<?php
                                    if($comentaris[$a]['id_usuari']==$_SESSION['id']){
                                	?>
									<button class="btn btn-danger btn-sm eli_comentari" onClick="cridafuncioacciocomentari('eliminar',<?php echo $comentaris[$a]['id']; ?>)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                    Usuari: Tu </br>
									<?php
                                    } else {
									?>
                            		Usuari: <?php echo $comentaris[$a]["nom"]." (".$comentaris[$a]["correu"].")";?></br>
                                    <?php
									}
									?>	
                                    
                                    Data del comentari: <?php echo date("d/m/Y H:i:s", strtotime($comentaris[$a]["data"])) ?></br>
									Comentari: <?php echo $comentaris[$a]["descripcio"] ?>
                                </div>
                        <?php
								}
							}
						?>
                
                    	
                    </div>
            	</div>
            <?php
				}
			?>
    </div> 
    <?php
		if(isset($_SESSION['correu'])){
	?>
    <div class="col-md-4">
    	<?php
        if($producte[0]['correu']!=$_SESSION['correu']){
		?>   
                	<input disabled="true" type='text' id='unitat<?php echo $_GET["id_producte"]; ?>' name='unitat<?php echo $_GET["id_producte"]; ?>' value='0' class='qty' />
                	<button class='qtyminus gtyminus<?php echo $_GET["id_producte"]; ?> btn btn-default' field='unitat<?php echo $_GET["id_producte"]; ?>'><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></button>
                	<button class='qtyplus qtyplus<?php echo $_GET["id_producte"]; ?> btn btn-default' field='unitat<?php echo $_GET["id_producte"]; ?>'><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
        <button class="btn btn-default" onclick="cridafuncioacciocistella('afegir',<?php echo $infop[0]['id']; ?>, <?php echo $infop[0]['preu']; ?>,'<?php echo $infop[0]['nom']; ?>' )"> <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
           
        </br>
        Contacte del venedor: <?php echo $producte[0]['correu']?>
        <?php
        }
		?>
        <div class="row">
        	<div class="col-md-11">
                <form id="form_comentari_producte">
                    <label for="Comentari">Fer comentari sobre aquest producte:</label>
                  <textarea class="form-control" rows="5" id="comentari_producte_<?php echo $_GET["id_producte"] ?>" title="Es obligatori! Màxim 500 caracters..." maxlength="500" required></textarea>
                    <button type="button" onClick="cridafuncioacciocomentari('afegir', <?php echo $_GET["id_producte"] ?>, <?php echo $_SESSION['id']?>)" class="btn btn-default">Enviar comentari</button>
                </form>
                <div hidden="true" id="iconcarregarcomentari" align="center"><h3><span class="glyphicon glyphicon-refresh glyphicon-spin"></span> Afegint el comentari...</h3></div>
			</div>
        </div>
        
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