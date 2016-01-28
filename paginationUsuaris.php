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
				<button class="btn btn-primary" onClick="cridafuncioaccio('modificar',<?php echo $array[$k]["id"] ?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
				<button class="btn btn-default" onClick="cridafuncioaccio('veure',<?php echo $array[$k]["id"] ?>)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Mirar</button>				
			</td>
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>