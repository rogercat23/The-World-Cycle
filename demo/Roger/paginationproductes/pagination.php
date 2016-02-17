<?php
require_once("GeneralBD.php");
$conBD = new GeneralBD();

$limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

if(isset($_GET["id_select"])){
	$id_cat = $_GET["id_select"];
	if($id_cat == 0){
		$array = $conBD->runQuery("SELECT * FROM producte LIMIT $start_from, $limit");
	} else {
		$array = $conBD->runQuery("SELECT * FROM producte p, te_prd_ctg t WHERE p.id=t.id_producte AND t.id_categoria='". $id_cat ."' LIMIT $start_from, $limit");
	}
} else {
	$array = $conBD->runQuery("SELECT * FROM producte LIMIT $start_from, $limit");
}

if( empty( $array ) )
{
	echo "<div><center>No hi ha productes aquesta categoria de moment</center></div>"; 
} else {
?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>Nom</th>
<th>Preu</th>  
<th>Unitat</th> 
<th>Nou/segon</th> 
<th></th>
</tr>  
</thead>  
<tbody>  
<?php  
foreach($array as $k=>$v) {  
?>  
	<tr>
        <td><?php echo $array[$k]["nom"]; ?></td>
        <td><?php echo $array[$k]["preu"]; ?> €</td>  
        <td><?php echo $array[$k]["unitat"]; ?></td>  
        <td><?php echo $array[$k]["nou/segon"]; ?></td>
        <td>
            <button class="btn btn-danger" onClick="cridafuncioaccio('add',<?php echo json_encode($array[$k]); ?>)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
            <button class="btn btn-primary" onClick="cridafuncioaccio('add',<?php echo json_encode($array[$k]); ?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
            <button class="btn btn-default" id="<?php echo $array[$k]["id"] ?>" onClick="clickMostrarAmagar(this)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Mirar</button>	
        </td>
	</tr> 
    <tr id="tr<?php echo $array[$k]["id"] ?>" class="hide-div">
    	<td colspan="5">
            	<?php echo $array[$k]["nom"]; ?>
                
            </div>
        </td>
    </tr> 
<?php  
};  
}
?>  
</tbody>  
</table>
