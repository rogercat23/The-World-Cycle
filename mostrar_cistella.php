<h3 class="passos_cistella_h3"> Pas 1 Confirmar cistella </h3></br>
<?php
	include "pg/classes/CistellaClass.php";
	//include "pg/classes/GeneralBD.php";
	$cistella = new CistellaClass();
	//$GeneralBD = new GeneralBD();
	
	//Pillem tots els productes que tenim guardat la cistella
	$productes_cistella = $cistella->get_content();
	if($productes_cistella)
	{
?>
<table class="table  table-striped taula_cistella" >  
<thead>  
    <tr>
    <th></th>  
    <th>Nom</th>
    <th>Preu</th>  
    <th>Unitat/s</th> 
    <th></th>
</thead>  
<tbody>
<?php
	foreach($productes_cistella as $producte)
	{
?>            
    <tr id="productes_cistella_llista">
    	<td></td>
        <td><?php echo $producte["nom"] ?></td>
        <td><?php echo $producte["preu"] ?>€</td>  
        <td><input disabled="true" type='text' id='unitat<?php echo $producte["id"]; ?>' name='unitat<?php echo $producte["id"]; ?>' value='<?php echo $producte["quantitat"] ?>' class='qty' /></td>
        <td>
        	<button onClick="cridafuncioacciomodcistella('restant',<?php echo $producte["id"] ?>, '<?php echo $producte["nom"] ?>', <?php echo $producte["preu"] ?>, <?php echo $producte["quantitat"] ?>, '<?php echo $producte["unique_id"] ?>')" class='qtyminus gtyminus<?php echo $producte["id"]; ?> btn btn-default' field='unitat<?php echo $producte["id"]; ?>'><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span></button>
             <button onClick="cridafuncioacciomodcistella('sumant',<?php echo $producte["id"] ?>, '<?php echo $producte["nom"] ?>', <?php echo $producte["preu"] ?>, <?php echo $producte["quantitat"] ?>)" class='qtyplus qtyplus<?php echo $producte["id"]; ?> btn btn-default' field='unitat<?php echo $producte["id"]; ?>'><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
            <button class="btn btn-danger boto_eliminar_cistella" onClick="cridafuncioacciocistella('eliminar','<?php echo $producte["unique_id"] ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>   
            <?php //$prodbuscat = $GeneralBD->runQuery("SELECT * FROM producte WHERE id=". $producte["id"]);?>
            <script>
			jQuery(document).ready(function(){
			// aquest boto per sumar + unitat
			$('.qtyplus<?php echo $producte["id"]; ?>').click(function(e){
				e.preventDefault();//Pausa
				fieldName = $(this).attr('field');//pillem valor de field per poder ficar suma unitat del camp
				var currentVal = parseInt($('input[name='+fieldName+']').val());//pillem valor d'actual per poder sumar
				if (!isNaN(currentVal) && currentVal =< 5) { //si esta indefinit o valor actual que no superi max unitat del producte de BD
					//Sumar
					$('input[name='+fieldName+']').val(currentVal + 1);
				} 
			});
			// aquest boto per restar - unitat
			$(".gtyminus<?php echo $producte["id"]; ?>").click(function(e) {
				e.preventDefault();//Pausa
				fieldName = $(this).attr('field');//igual suma pero amb resta
				var currentVal = parseInt($('input[name='+fieldName+']').val());
				if (!isNaN(currentVal) && currentVal > 1) { //si esta indefint o valor actual que no pot estar numero negativa per tant ha de ser 0 o més
					// Restar
					$('input[name='+fieldName+']').val(currentVal - 1);
				}
			});
		});
		</script>
            
        </td>
	</tr>   
    <?php
		}
	?> 
    <tr class="preu_total_unitats">
    	<td></td>
    	<td>Total: </td>
        <td><?php echo $cistella->preu_total() ?>€</td>
        <td><?php echo $cistella->productes_total() ?></td>
        <td>
        <button class="btn btn-success" onClick="cridafuncioacciocistella('pas1')"></span> Realitzar la compra!</button></td>
    </tr>
</tbody>  
</table>          
<?php        
	} else {
		echo "<div class='avis_div'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'> Ara mateix la cistella no hi ha productes, per tenir productes la cistela es anar productes del menú.</div>";	
	}
?>
