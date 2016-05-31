<?php
	include	 'llibreries.php';
<<<<<<< HEAD
	include "/pg/sessio/sessio.php";
	require_once("pg/classes/GeneralBD.php");
	$GeneralBD = new GeneralBD();
	
	$arrayAdr = $GeneralBD->runQuery("SELECT * FROM te_usr_adr tua, ciutat c, adreca a WHERE a.id_ciutat=c.id AND tua.id_adreça=a.id AND tua.id_usuari=". $_GET['id_usuari']); 
	$totalarrayAdr = count($arrayAdr);
=======
	require("session.php");
	require_once("GeneralBD.php");
	$GeneralBD = new GeneralBD();
	
	$arrayAdr = $GeneralBD->runQuery("SELECT * FROM  te_usr_adr tua, adreca a, ciutat c WHERE a.id_ciutat=c.id AND tua.id_adreça=a.id AND tua.id_usuari=". $_GET['id_usuari']); 
>>>>>>> origin/Productes-Ajax
?>

<table class="table  table-striped">  
<thead>  
<<<<<<< HEAD
    <th>Carrer Numero Porta Pis</th>
    <th>Postal</th>
    <th>Ciutat</th>
    <th>Provincia/Regió</th>
    <th>Pais</th>  
     <?php
		if($totalarrayAdr>1){
	?>  
    <th></th>
    <?php
		}
	?>
    <th>
    </th>
=======
<tr>  
<th>Carrer Numero Porta Pis</th>
<th>Postal</th>
<th>Ciutat</th>
<th>Provincia/Regió</th>
<th>Pais</th>   
>>>>>>> origin/Productes-Ajax
</tr>  
</thead>  
<tbody>  
<?php  
foreach($arrayAdr as $k=>$v) {  
?>  
	<tr>
        <td><?php echo $arrayAdr[$k]["carrer"]; ?> <?php echo $arrayAdr[$k]["numero"]; ?> <?php echo $arrayAdr[$k]["pis"]; ?> <?php echo $arrayAdr[$k]["porta"]; ?></td>
        <td><?php echo $arrayAdr[$k]["postal"]; ?></td>
        <td><?php echo $arrayAdr[$k]["nom"]; ?></td>
          
        <td>
        	<?php
				$proreg = $GeneralBD->runQuery("SELECT * FROM  provinciaregio WHERE id=". $arrayAdr[$k]["id_provinciaregio"]);
			 echo $proreg[0]["nom"]; ?>
        </td> 
        <td>
        	<?php
        $pais = $GeneralBD->runQuery("SELECT * FROM  pais WHERE id=". $proreg[0]["id_pais"]);
			 echo $pais[0]["nom"]; ?>
<<<<<<< HEAD
        </td>
        <?php
			if($totalarrayAdr>1){
		?>
        <td>
    		    	<button class="btn btn-danger" onClick="cridafuncioaccioafgadr('eliminar',<?php echo $arrayAdr[$k]['id']; ?>)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
        </td>
        <?php
			}
		?> 
        <td>
        	<button class="btn btn-default" onClick="buscarmapa('<?php echo $arrayAdr[$k]["carrer"]; ?>', '<?php echo $arrayAdr[$k]["numero"]; ?>', '<?php echo $arrayAdr[$k]["nom"]; ?>')"><span class="glyphicon glyphicon glyphicon-globe" aria-hidden="true"></span> Mapa</button>
        </td> 
=======
        </td>  
        
>>>>>>> origin/Productes-Ajax
    </tr>
<?php
}
?> 
</tbody>  
</table>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-1">
        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModalafegiradreca" onClick="" ><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Adreça</button>
        
    </div>
</div>
</div>

<?php
	/*Pillem per informació del formulari pais, provincia o regio i ciutats*/
<<<<<<< HEAD
=======
	require_once("GeneralBD.php");
	
	$GeneralBD = new GeneralBD();
>>>>>>> origin/Productes-Ajax
	$paisos = $GeneralBD->runQuery("SELECT * FROM pais");
	$provinciesregions = $GeneralBD->runQuery("SELECT * FROM provinciaregio");
	$ciutats = $GeneralBD->runQuery("SELECT * FROM ciutat");
	$GeneralBD->tancarBD();
?>
<script type="text/javascript">	
	PNotify.removeAll(); //Borrar totes les notificacions que esta mostrant aquest moment

	var provinciesregions = <?php echo json_encode($provinciesregions);?>; //transformem per poder passar select a provincies un cop escullit del pais
	var ciutats = <?php echo json_encode($ciutats);?>; //transformem tipus json que es array del javascript
</script>
<!-- Modal -->
<div class="modal fade" id="myModalafegiradreca" tabindex="-1" role="dialog" aria-labelledby="myModalLabelafegiradreca" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-title-modal">
        <h4>Afegir una adreça</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="formulariafgadr" class="dialogauto">
              <div class="form-group">
                <label>Adre&ccedil;a:</label>
                <div class="row">
                    <div id="paisdiv" class="col-xs-6 has-feedback">
                        <select class="form-control" id="pais" name="pais" onChange="comprovarCamps(this.id)" title="Es obligatori!" required>
                            <option value="">Pais</option>
                            <?php
                                for($i=0;$i<count($paisos);$i++){
                                    echo "<option value='". $paisos[$i]['id'] ."'>". $paisos[$i]['nom'] ."</option>";
                                }
                            ?>
                        </select>
                        <span id="paisicon" class="form-control-feedback glyphicon"></span>
                    </div>
                    <div class="col-xs-6 has-feedback" id="provinciaregiodiv">
                        <select class="form-control" id="provinciaregio" name="provinciaregio" onChange="comprovarCamps(this.id)" title="Es obligatori!" required>
                            <option value="">Provincia/Regio</option>
                            
                        </select><span id="provinciaregioicon" class="form-control-feedback glyphicon"></span>
                    </div>
               </div></br>
                <div class="row">
                     <div class="col-xs-8 has-feedback" id="ciutatdiv">
                        <input type="text" class="form-control" id="ciutat" name="ciutat" onChange="comprovarCamps(this.id)" placeholder="Ciutat" title="Es obligatori!" disabled="true" required><span id="ciutaticon" class="form-control-feedback glyphicon"></span>
                      </div>
                      <div class="col-xs-4 has-feedback" id="postaldiv">
                        <input type="text" class="form-control" id="postal" name="postal" placeholder="Postal" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="postalicon" class="form-control-feedback glyphicon"></span>
                      </div>
                </div></br>
                <div id="carrerdiv" class="has-feedback">
                    <input type="text" class="form-control" id="carrer" name="carrer" placeholder="Carrer" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="carrericon" class="form-control-feedback glyphicon"></span></br>
                </div>
                 <div class="row">
                     <div class="col-xs-4 has-feedback" id="numerodiv">
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="N&uacute;mero" onChange="comprovarCamps(this.id)" title="Es obligatori!" required><span id="numeroicon" class="form-control-feedback glyphicon"></span>
                      </div>
                      <div class="col-xs-4 has-feedback" id="pisdiv">
                        <input type="text" class="form-control" id="pis" name="pis" placeholder="Pis" onChange="comprovarCamps(this.id)"><span id="pisicon" class="form-control-feedback glyphicon"></span>
                      </div>
                      <div class="col-xs-4 has-feedback" id="portadiv">
                        <input type="text" class="form-control" id="porta" name="porta" placeholder="Porta" onChange="comprovarCamps(this.id)"><span id="portaicon" class="form-control-feedback glyphicon"></span>
                      </div>
                  </div>  
              </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="netejarformafeadreca" data-dismiss="modal">Cancel·la</button>
<<<<<<< HEAD
            <button type="submit" onClick="cridafuncioaccioafgadr('afegir',0, <?php echo $_SESSION['id'] ?>)" class="btn btn-success">Afegir</button>
=======
            <button type="submit" class="btn btn-success">Afegir</button>
>>>>>>> origin/Productes-Ajax
        </form>
      </div>
    </div>
  </div>
</div>





