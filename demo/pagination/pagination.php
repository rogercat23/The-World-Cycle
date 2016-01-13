<?php
require_once("GeneralBD.php");
$conBD = new GeneralBD();

$limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$array = $conBD->runQuery("SELECT * FROM usuari LIMIT $start_from, $limit"); 
?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>Correu</th>
<th>Nom</th>  
<th>Cognom</th> 
<th>Estat</th>
<th>Permisos</th> 
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
			<td></td>
			<td></td>
			<td>
				<button class="btn btn-danger" onClick="cridafuncioaccio('add',<?php echo json_encode($array[$k]); ?>)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
				<button class="btn btn-primary" onClick="cridafuncioaccio('add',<?php echo json_encode($array[$k]); ?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
				<button class="btn btn-default" onClick="cridafuncioaccio('add',<?php echo $array[$k]["id"] ?>)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Mirar</button>				
			</td>
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>