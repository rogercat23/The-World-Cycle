<?php
	require_once("GeneralBD.php");
	$GeneralBD = new GeneralBD();
	
	$limit = 8;  
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
	$start_from = ($page-1) * $limit;  
	  
	$array = $GeneralBD->runQuery("SELECT * FROM usuari LIMIT $start_from, $limit"); 
	$estats = $GeneralBD->runQuery("SELECT * FROM estat");
	$permisos = $GeneralBD->runQuery("SELECT * FROM roles");
	$GeneralBD->tancarBD();
?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>Correu</th>
<th>Nom</th>  
<th>Cognom</th> 
<th>Estat</th>
<th>Rol</th> 
<th></th>
</tr>  
</thead>  
<tbody>  
<?php  
foreach($array as $k=>$v) {  
?>  
            <tr>
			<td><?php echo $array[$k]["correu"]; ?></td>
            <td><?php echo $array[$k]["nom"]; ?></td>  
            <td><?php echo $array[$k]["cognom1"]; ?> <?php echo $array[$k]["cognom2"]; ?></td>  
			<td>
            	<select id='selectestats<?php echo $array[$k]["id"] ?>' class='form-control' onChange="cridafuncioaccio('canviestat',<?php echo $array[$k]["id"] ?>)">
            	<?php
					for($y=0;$y<count($estats);$y++){ 
						if($estats[$y]['id'] == $array[$k]['id_estat']){
							echo "<option value='".$estats[$y]['id']."' selected>".$estats[$y]['descripcio']."</option>";
						} else {
							echo "<option value='".$estats[$y]['id']."'>".$estats[$y]['descripcio']."</option>";
						}
					}
				?>
                </select>
            </td>
			<td>
            	<select id="selectrol<?php echo $array[$k]["id"] ?>" class="form-control" onChange="cridafuncioaccio('canvirol',<?php echo $array[$k]["id"] ?>)">
            	<?php
					for($x=0;$x<count($permisos);$x++){ 
						if($permisos[$x]['id'] == $array[$k]['id_roles']){
							echo "<option value='".$permisos[$x]['id']."' selected>".$permisos[$x]['permisos']."</option>";
						} else {
							echo "<option value='".$permisos[$x]['id']."'>".$permisos[$x]['permisos']."</option>";
						}
					} 
				?>
                </select>
            </td>
			<td>
				<button class="btn btn-danger" onClick="cridafuncioaccio('eliminar',<?php echo $array[$k]["id"] ?>)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
				<button class="btn btn-warning" data-toggle="modal" data-target="#myModalmod<?php echo $array[$k]["id"] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>			
                
                <!-- Modal -->
                <div class="modal fade" id="myModalmod<?php echo $array[$k]["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelmod<?php echo $array[$k]["id"]; ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header header-title-modal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4>Modificar les dades de l'usuari <?php echo $array[$k]["correu"]; ?></h4>
                      </div>
                      <div class="modal-body">
                		<form>
                          <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6 has-feedback" id="chnomdiv">
                                    <label for="chnom">Nom</label>
                                    <input type="text" class="form-control" id="chnom<?php echo $array[$k]["id"]; ?>" value="<?php echo $array[$k]["nom"]; ?>">
                                 </div>
                                 <div class="col-xs-6 has-feedback" id="chcognom1div">
                                    <label for="chcognom1">Primer cognom</label>
                                    <input type="text" class="form-control" id="chcognom1<?php echo $array[$k]["id"]; ?>" value="<?php echo $array[$k]["cognom1"]; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 has-feedback" id="chcognom2div"> 
                                    <label for="chcognom2">Segon cognom</label>
                                    <input type="text" class="form-control" id="chcognom2<?php echo $array[$k]["id"]; ?>" value="<?php echo $array[$k]["cognom2"]; ?>">
                                </div>
                                <div class="col-xs-6 has-feedback" id="chhddiv">
                                	<label for="chhd">Sexe</label></br>
                                	<select id="chhd<?php echo $array[$k]["id"] ?>" class="form-control">
									<?php
										$sexe = array("Home","Dona");
                                        for($x=0;$x<count($sexe);$x++){ 
                                            if($sexe[$x] == $array[$k]['h/d']){
                                                echo "<option value='".$sexe[$x]."' selected>".$sexe[$x]."</option>";
                                            } else {
                                                echo "<option value='".$sexe[$x]."'>".$sexe[$x]."</option>";
                                            }
                                        } 
                                    ?>
                                    </select>
                                </div>
                          </div>
                          <div class="row">
                                <div class="col-xs-6 has-feedback" id="chtelefondiv">
                                	<label for="chtelefon">Telefon</label>
                                    <input type="text" class="form-control" id="chtelefon<?php echo $array[$k]["id"]; ?>" value="<?php echo $array[$k]["telefon"]; ?>">
                                </div>
                                <div class="col-xs-6 has-feedback" id="data_naixdiv">
                                        <input type="text" class="form-control" id="data_naix" name="data_naix" placeholder="Data de naixament" onChange="comprovarCamps(this.id)" value="<?php echo $array[$k]["data_naix"]; ?>" title="Es obligatori!" required><span id="data_naixicon" class="form-control-feedback glyphicon"></span>
                                    </div>
                        	</div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel·la</button>
                        <button type="button" onclick="cridafuncioaccio('modificar','<?php echo $array[$k]["id"]; ?>')" class="btn btn-primary">Guarda els canvis</button>
                      </div>
                    </div>
                  </div>
                </div> 	
			</td>
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>