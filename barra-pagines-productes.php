<?php
include "/pg/sessio/sessio.php";
require_once("pg/classes/GeneralBD.php");
$conBD = new GeneralBD();
$limit = 8;
if (isset($_GET["categoria"])){
	//echo($_GET["categoria"]);
	$id_cat = $_GET["categoria"];
	if($id_cat==0){ //Es per evitar entrar categoria id 0 es tot i hem de selecionar tots
		if(isset($_SESSION['correu'])){
			$numrows = $conBD->numRows("SELECT * FROM vendre v, usuari us, producte p  WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND unitat != 0 AND us.id !=". $_SESSION['id']);
		} else {
			$numrows = $conBD->numRows("SELECT * FROM vendre v, usuari us, producte p  WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND unitat != 0");
		}
		$total_records = $numrows;  
		$total_pages = ceil($total_records / $limit);
		?>
        <div align="center">
            <ul class='pagination text-center' id="paginationproductes">
            <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
                        if($i == 1):?>
                        <li class='active'  id="<?php echo $i;?>"><a href='paginationProductes.php?page=<?php echo $i;?>&categoria=<?php $_GET["categoria"] ?>'><?php echo $i;?></a></li> 
                        <?php else:?>
                        <li id="<?php echo $i;?>"><a href='paginationProductes.php?page=<?php echo $i;?>&categoria=<?php $_GET["categoria"] ?>'><?php echo $i;?></a></li>
                    <?php endif;?>          
            <?php endfor;endif;?>
            </ul>
         </div>	
		<?php			
	} else { //busquem per id categoria escullit a MySql
		if(isset($_SESSION['correu'])){
			$numrows = $conBD->numRows("SELECT * FROM vendre v, usuari us, producte p, te_prd_ctg t WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND p.unitat !=0 AND p.id=t.id_producte AND t.id_categoria='". $id_cat ."' AND us.id!=". $_SESSION['id']);
		} else {
			$numrows = $conBD->numRows("SELECT * FROM vendre v, usuari us, producte p, te_prd_ctg t WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND p.unitat !=0 AND p.id=t.id_producte AND t.id_categoria='". $id_cat ."'");
		}
		$total_records = $numrows;  
		$total_pages = ceil($total_records / $limit);
		?>
        <div align="center">
            <ul class='pagination text-center' id="paginationproductescat">
            <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
                        if($i == 1):?>
                        <li class='active'  id="<?php echo $i;?>" title="<?php echo $_GET["categoria"] ?>"><a href='paginationProductes.php?page=<?php echo $i;?>&id_select=<?php $_GET["categoria"] ?>'><?php echo $i;?></a></li> 
                        <?php else:?>
                        <li id="<?php echo $i;?>" title="<?php echo $_GET["categoria"] ?>"><a href='paginationProductes.php?page=<?php echo $i;?>&id_select=<?php $_GET["categoria"] ?>'><?php echo $i;?></a></li>
                    <?php endif;?>          
            <?php endfor;endif;?>
            </ul>
         </div>	
		<?php	
	}
} else if(isset($_GET["id_usr"])){
	$numrows = $conBD->numRows("SELECT * FROM producte p, vendre v WHERE p.id=v.id_producte AND v.id_usuari='". $_GET["id_usr"]."'");
	
	$total_records = $numrows;  
	$total_pages = ceil($total_records / $limit);
	?>
	<div align="center">
        <ul class='pagination text-center' id="paginationproductesusr">
        <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
                    if($i == 1):?>
                    <li class='active' id="<?php echo $i;?>" title="<?php echo $_GET["id_usr"] ?>"><a href='paginationProductes.php?page=<?php echo $i;?>&id_usr=<?php $_GET["id_usr"] ?>'><?php echo $i;?></a></li> 
                    <?php else:?>
                    <li id="<?php echo $i;?>" title="<?php echo $_GET["id_usr"] ?>"><a href='paginationProductes.php?page=<?php echo $i;?>&id_usr=<?php $_GET["id_usr"] ?>'><?php echo $i;?></a></li>
                <?php endif;?>          
        <?php endfor;endif;?>
        </ul>
     </div>
<?php	
} else {
	if(isset($_SESSION['correu'])){
		$numrows = $conBD->numRows("SELECT * FROM vendre v, usuari us, producte p WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND p.unitat != 0 AND us.id!=". $_SESSION['id']);
	} else {
		$numrows = $conBD->numRows("SELECT * FROM vendre v, usuari us, producte p WHERE p.id=v.id_producte AND v.id_usuari=us.id AND us.id_estat=1 AND p.unitat != 0");
	}
	$total_records = $numrows;  
	$total_pages = ceil($total_records / $limit);
	?>
	<div align="center">
        <ul class='pagination text-center' id="paginationproductes">
        <?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
                    if($i == 1):?>
                    <li class='active'  id="<?php echo $i;?>"><a href='paginationProductes.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
                    <?php else:?>
                    <li id="<?php echo $i;?>"><a href='paginationProductes.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                <?php endif;?>          
        <?php endfor;endif;?>
        </ul>
        </div>
<?php
}
?>
