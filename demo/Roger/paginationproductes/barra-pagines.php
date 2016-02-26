<?php
require_once("GeneralBD.php");
$conBD = new GeneralBD();
$limit = 10;
if (isset($_GET["categoria"])){
	//echo($_GET["categoria"]);
	$id_cat = $_GET["categoria"];
	if($id_cat==0){ //Es per evitar entrar categoria id 0 es tot i hem de selecionar tots
		$numrows = $conBD->numRows("SELECT * FROM producte");	
	} else { //busquem per id categoria escullit a MySql
		$numrows = $conBD->numRows("SELECT * FROM producte p, te_prd_ctg t WHERE p.id=t.id_producte AND t.id_categoria='". $id_cat ."'");
	}
} else {
	$numrows = $conBD->numRows("SELECT * FROM producte");
}
$total_records = $numrows;  
$total_pages = ceil($total_records / $limit); 
?>
<div align="center">
<ul class='pagination text-center' id="pagination">
<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
            if($i == 1):?>
            <li class='active'  id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
            <?php else:?>
            <li id="<?php echo $i;?>"><a href='pagination.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
        <?php endif;?>          
<?php endfor;endif;?>