<?php
require_once("GeneralBD.php");
$conBD = new GeneralBD();
if (isset($_GET["categoria"])){
	alert($_GET["categoria"]);	
} else {
$limit = 10;
$numrows = $conBD->numRows("SELECT * FROM producte");
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
<?php
}
?>