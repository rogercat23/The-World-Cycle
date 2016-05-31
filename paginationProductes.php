<?php
<<<<<<< HEAD
include "/pg/sessio/sessio.php";
require_once("pg/classes/GeneralBD.php");
$GeneralBD = new GeneralBD();

$categories = $GeneralBD->runQuery("SELECT * FROM categoria");
$id_producte_categoria = $GeneralBD->runQuery("SELECT * FROM te_prd_ctg");
=======
include 'session.php';
require_once("GeneralBD.php");
$conBD = new GeneralBD();

$categories = $conBD->runQuery("SELECT * FROM categoria");
$id_producte_categoria = $conBD->runQuery("SELECT * FROM te_prd_ctg");
>>>>>>> origin/Productes-Ajax

$limit = 8;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

if(isset($_GET["id_select"])){
	$id_cat = $_GET["id_select"];
	if($id_cat == 0){
<<<<<<< HEAD
		if(isset($_SESSION['correu'])){
			$array = $GeneralBD->runQuery("SELECT * FROM vendre v, usuari us, producte p WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND p.unitat != 0 AND us.id!=". $_SESSION['id'] ." LIMIT $start_from, $limit");
		} else {
			$array = $GeneralBD->runQuery("SELECT * FROM vendre v, usuari us, producte p WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND p.unitat != 0 LIMIT $start_from, $limit");
		}
		//SELECT * FROM producte p, vendre v, usuari us WHERE p.id=v.id_producte AND v.id_usuari=us.id;
	} else {
		if(isset($_SESSION['correu'])){
			$array = $GeneralBD->runQuery("SELECT * FROM vendre v, usuari us, producte p, te_prd_ctg t WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND p.unitat !=0 AND p.id=t.id_producte AND t.id_categoria='". $id_cat ."' AND us.id!=". $_SESSION['id'] ." LIMIT $start_from, $limit");
		} else {
			$array = $GeneralBD->runQuery("SELECT * FROM vendre v, usuari us, producte p, te_prd_ctg t WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND p.unitat !=0 AND p.id=t.id_producte AND t.id_categoria='". $id_cat ."' LIMIT $start_from, $limit");
		}
	}
} else if(isset($_GET["id_usr"])){
	$array = $GeneralBD->runQuery("SELECT * FROM producte p, vendre v WHERE p.id=v.id_producte AND v.id_usuari='". $_GET["id_usr"] ."' LIMIT $start_from, $limit");
} else {
	if(isset($_SESSION['correu'])){
		$array = $GeneralBD->runQuery("SELECT * FROM vendre v, usuari us, producte p WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND p.unitat != 0 AND us.id!=". $_SESSION['id'] ." LIMIT $start_from, $limit");
	} else {
		$array = $GeneralBD->runQuery("SELECT * FROM vendre v, usuari us, producte p WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND p.unitat != 0 LIMIT $start_from, $limit");
	}
=======
		$array = $conBD->runQuery("SELECT * FROM producte WHERE unitat != 0 LIMIT $start_from, $limit");
	} else {
		$array = $conBD->runQuery("SELECT * FROM producte p, te_prd_ctg t WHERE unitat !=0 AND p.id=t.id_producte AND t.id_categoria='". $id_cat ."' LIMIT $start_from, $limit");
	}
} else {
	$array = $conBD->runQuery("SELECT * FROM producte WHERE unitat != 0 LIMIT $start_from, $limit");
>>>>>>> origin/Productes-Ajax
}

if( empty( $array ) )
{
<<<<<<< HEAD
	echo "<div><center>No hi ha productes de moment</center></div>"; 
=======
	echo "<div><center>No hi ha productes aquesta categoria de moment</center></div>"; 
>>>>>>> origin/Productes-Ajax
} else {
?>
<table class="table  table-striped">  
<thead>  
<tr>  
<th>Nom</th>
<th>Preu</th>  
<th>Unitat/s</th> 
<<<<<<< HEAD
<th>Nou/Segona ma</th> 
=======
<th>Nou/segon</th> 
>>>>>>> origin/Productes-Ajax
<?php
	if(isset($_SESSION['correu'])){
?>
<th id="column-btn"></th>
<th id="column-btn"></th>
<?php
	}
?>
<th id="column-btn"></th>
</tr>  
</thead>  
<tbody>  
<?php  
foreach($array as $k=>$v) {  
?>  
	<tr>
        <td><?php echo $array[$k]["nom"]; ?></td>
<<<<<<< HEAD
        <td><?php echo str_replace('.',',',$array[$k]["preu"]); ?> €</td>  
        <td><?php echo $array[$k]["unitat"]; ?></td>  
        <td><?php 
			if($array[$k]["nou/segon"]=="Nou"){
				echo "Nou";
			} else {
				echo "Segona ma";
			}
		?></td>
        <?php
			$venedor = $GeneralBD->runQuery("SELECT * FROM vendre WHERE id_producte =". $array[$k]['id']);
			if(isset($_SESSION['id']) && $_SESSION['id']==$venedor[0]['id_usuari']){
		?>
        <td>
            <button class="btn btn-danger" onClick="cridafuncioaccioproducte('eliminar',<?php echo $array[$k]['id']; ?>, <?php echo $_GET["page"] ?>)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
=======
        <td><?php echo $array[$k]["preu"]; ?> €</td>  
        <td><?php echo $array[$k]["unitat"]; ?></td>  
        <td><?php echo $array[$k]["nou/segon"]; ?></td>
        <?php
			$venedor = $conBD->runQuery("SELECT * FROM vendre WHERE id_producte =". $array[$k]['id']);
			if(isset($_SESSION['id']) && $_SESSION['id']==$venedor[0]['id_usuari']){
		?>
        <td>
            <button class="btn btn-danger" onClick="cridafuncioaccioproducte('eliminar',<?php echo $array[$k]['id']; ?>)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
>>>>>>> origin/Productes-Ajax
        </td>
        <td>
            <button class="btn btn-warning" data-toggle="modal" data-target="#myModalproducte<?php echo $array[$k]['id']; ?>" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
            <!-- Modal -->
            <div class="modal fade" id="myModalproducte<?php echo $array[$k]['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelproducte<?php echo $array[$k]['id']; ?>" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header header-title-modal">
                    <h4>Modificar producte <?php echo $array[$k]['nom']; ?></h4>
                  </div>
                  <div class="modal-body">
                    <form method="post" id="formulariproducte">
                        <div class="form-group">
                            <label>Dades:</label>
                            <div id="pnom<?php echo $array[$k]['id']; ?>div" class="has-feedback">
                                <input type="text" class="form-control" id="pnom<?php echo $array[$k]['id']; ?>" name="pnom" placeholder="Nom" onChange="comprovarCamps(this.id)" value="<?php echo $array[$k]['nom']; ?>" title="Es obligatori!" required><span id="pnom<?php echo $array[$k]['id']; ?>icon" class="form-control-feedback glyphicon"></span></br>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 has-feedback" id="ppreu<?php echo $array[$k]['id']; ?>div">
                                    <div class="input-group">
<<<<<<< HEAD
                                        <input type="text" class="form-control" id="ppreu<?php echo $array[$k]['id']; ?>" name="ppreu" placeholder="Preu" onChange="comprovarCamps(this.id)" value="<?php echo str_replace('.',',',$array[$k]['preu']); ?>"  title="Es obligatori!" required><div class="input-group-addon">€</div><span id="ppreu<?php echo $array[$k]['id']; ?>icon" class="ambicondret form-control-feedback glyphicon"></span>
=======
                                        <input type="text" class="form-control" id="ppreu<?php echo $array[$k]['id']; ?>" name="ppreu" placeholder="Preu" onChange="comprovarCamps(this.id)" value="<?php echo $array[$k]['preu']; ?>"  title="Es obligatori!" required><div class="input-group-addon">€</div><span id="ppreu<?php echo $array[$k]['id']; ?>icon" class="ambicondret form-control-feedback glyphicon"></span>
>>>>>>> origin/Productes-Ajax
                                    </div>
                                </div>
                                <div class="col-xs-6 has-feedback" id="puni<?php echo $array[$k]['id']; ?>div">
                                    <input type="text" class="form-control" id="puni<?php echo $array[$k]['id']; ?>"  name="puni" placeholder="Unitat" onChange="comprovarCamps(this.id)" value="<?php echo $array[$k]['unitat']; ?>" title="Es obligatori!" required><span id="puni<?php echo $array[$k]['id']; ?>icon" class="form-control-feedback glyphicon"></span>
                                </div>
                            </div></br>
                            <div class="row">
                                <div id="categoria<?php echo $array[$k]['id']; ?>div" class="col-xs-6 has-feedback">
                                    <select class="form-control" id="categoria<?php echo $array[$k]['id']; ?>" name="categoria" onChange="comprovarCamps(this.id)" title="Es obligatori!" required>
                                        <?php
											for($x=0;$x<count($id_producte_categoria);$x++){
												if($id_producte_categoria["$x"]['id_producte']==$array[$k]['id']){
													for($i=0;$i<count($categories);$i++){
														if($id_producte_categoria["$x"]['id_categoria']==$categories[$i]['id']){
															echo "<option value='". $categories[$i]['id'] ."' selected>". $categories[$i]['nom'] ."</option>";
														} else {
															echo "<option value='". $categories[$i]['id'] ."'>". $categories[$i]['nom'] ."</option>";
														}
													}
												}
											}
                                        ?>
                                    </select>
                                    <span id="categoria<?php echo $array[$k]['id']; ?>icon" class="form-control-feedback glyphicon"></span>
                                </div>
                            </div></br>
                            <div id="desc<?php echo $array[$k]['id']; ?>div" class="has-feedback">
                                <label for="desc">Descripció:</label>
                                <textarea class="form-control" rows="5" id="desc<?php echo $array[$k]['id']; ?>" name="desc" onChange="comprovarCamps(this.id)" title="Es obligatori! Màxim 300 caracters..." maxlength="300" required><?php echo $array[$k]['descripció']; ?></textarea>
                                <span id="desc<?php echo $array[$k]['id']; ?>icon" class="form-control-feedback glyphicon"></span>
                            </div></br>
<<<<<<< HEAD
                            <div class="row">
                            	<div class="col-md-9">
                            	<?php
									$fotosproducte = $GeneralBD->runQuery("SELECT * FROM imatge WHERE id_producte=". $array[$k]['id']);
									foreach($fotosproducte as $z=>$x) {  
										$imatgen = $array[$k]['id']."".$fotosproducte[$z]["nom_arxiu"];
										$imatgethum = "t_".$array[$k]['id']."".$fotosproducte[$z]["nom_arxiu"];
										$id_imatge = $fotosproducte[$z]["id"];
									?>
										<div class="mostrar_imatge_poseli" id="imatge<?php echo $id_imatge?>" onClick="borrarimatge(<?php echo $id_imatge ?>,'<?php echo $imatgen ?>', '<?php echo $imatgethum ?>')"><img  class="imatge_eli" src="img/productethumjpg/<?php echo $imatgethum ?>" width="60" height="60"/>
                                            <span class="icon_producte glyphicon glyphicon-trash"></span>
                                        </div>
									<?php
										} 
									?>
                                </div>
                            </div></br>
                                <div id="fotospdiv" class="has-feedback">
                        <input id="fotosp" class="fotosp" name="fotosp[]" type="file" multiple class="file-loading" accept="image/jpeg" title="Es obligatori pujar una o mes fotos!" required>
                  
                    		</div>
                        </div>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onClick=" netejarformproducte2(<?php echo $_SESSION['id'] ?>, <?php echo $page ?>)">Cancel·la</button>
                        <button type="button" class="btn btn-success" onClick="cridafuncioaccioproducte('modificar',<?php echo $array[$k]['id']; ?>, <?php echo $_GET["page"]?>)">Modificar els canvis!</button>
=======
                        </div>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="netejarformproducte" data-dismiss="modal">Cancel·la</button>
                        <button type="button" class="btn btn-success" onClick="cridafuncioaccioproducte('modificar',<?php echo $array[$k]['id']; ?>)">Modificar els canvis!</button>
>>>>>>> origin/Productes-Ajax
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </td>
		<td>
            <button class="btn btn-default" id="<?php echo $array[$k]["id"] ?>" onClick="clickMostrarAmagar(this)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Mirar/ <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Amagar</button>	
        </td>
		<?php
			} else {
        ?>
        <td colspan="3">
        	<center>
            <button class="btn btn-default" id="<?php echo $array[$k]["id"] ?>" onClick="clickMostrarAmagar(this)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Mirar/ <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Amagar</button>
            </center>	
        </td>
        <?php
			}
        ?>
	</tr> 
    <tr id="tr<?php echo $array[$k]["id"] ?>" class="hide-div">
    	<td colspan="
        <?php
			if(isset($_SESSION['correu'])){
		?>
        7
        <?php
			} else {
		?>
        5
        <?php
			}
		?>
        ">
            	<?php //echo $array[$k]["nom"]; ?>
                
                <div id="info_producte<?php echo $array[$k]["id"] ?>">
                </div>
                <script>
					var id_producte =<?php echo $array[$k]["id"]?>;
					$("#info_producte"+id_producte).load("info_producte.php?id_producte="+id_producte);
					
				</script>
            </div>
        </td>
    </tr> 
<?php  
};  
}
?>  
</tbody>  
</table>
