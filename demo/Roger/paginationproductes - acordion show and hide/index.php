<!DOCTYPE html>
<html>
<head>
<?php
	include	 'llibreries.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<div>
	<?php
		require_once("GeneralBD.php");
		$conBD = new GeneralBD();
		$categories = $conBD->runQuery("SELECT * FROM categoria");

	?>    
    <select class="form-control" id="categoria" onChange="seleccionarcategoria(this.id)">
            <option value="0">Totes les categories...</option>
            <?php
                for($i=0;$i<count($categories);$i++){
                    echo "<option value='". $categories[$i]['id'] ."'>". $categories[$i]['nom'] ."</option>";
                }
            ?>
        </select>
<div id="iconcarregar" align="center"><h3><span class="glyphicon glyphicon-refresh .glyphicon-spin"></span> Carregant...</h3></div>
<div id="cos-contingut">
	
</div>

<?php
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
	</div> 
</div>
</body>
<script>
$(document).ready(function() {
	$("#cos-contingut").load("pagination.php?page=1");
	$("#iconcarregar").hide();
    $("#pagination li").live('click',function(e){
    e.preventDefault();
		$("#cos-contingut").hide();
    	$("#iconcarregar").show();    
        $("#pagination li").removeClass('active');
        $(this).addClass('active');
        var pageNum = this.id;
        $("#cos-contingut").load("pagination.php?page=" + pageNum);
		$("#iconcarregar").hide();
		$("#cos-contingut").show();
    });
});

function cridafuncioaccio(action,id) {
		$("#iconcarregar").show();
		var queryString;
		switch(action) {
			case "mostrar":
					var id=$(this).attr("id");
					$("#p"+id).toggle();
					$("#p"+id).addClass( "removoted" );
					$("#p"+id).removeClass("selected");
					
					
						
				var id=$(this).attr("id");
				//console.log(id)
				if($("#p"+id).hasClass("selected"))
				{
					$("#p"+id).toggle();
					$("#p"+id).addClass( "removoted" );
					$("#p"+id).removeClass("selected");
				}else 
				{
					$("#p"+id).show();
					$("#p"+id).addClass( "selected" );
					$("#p"+id).removeClass("removoted");
				}
			
				queryString = 'action='+action+'&txtmessage='+ $("#txtmessage").val();
			break;
			case "edit":
				queryString = 'action='+action+'&message_id='+ id + '&txtmessage='+ $("#txtmessage_"+id).val();
			break;
			case "delete":
				queryString = 'action='+action+'&message_id='+ id;
			break;
		}
		$("#iconcarregar").hide();
			/* 
		$.ajax({
		url: "crud_action.php",
		data:queryString,
		type: "POST",
		success:function(data){
			switch(action) {
				case "add":
					$("#comment-list-box").append(data);
				break;
				case "edit":
					$("#message_" + id + " .message-content").html(data);
					$('#frmAdd').show();
					$("#message_"+id+" .btnEditAction").prop('disabled','');	
				break;
				case "delete":
					$('#message_'+id).fadeOut();
				break;
			}
			$("#txtmessage").val('');
			$("#loaderIcon").hide();
		},
		error:function (){
			$("#loaderIcon").hide();
			alert("ERROR: No existeix");
		}*/
	};
	
	function seleccionarcategoria(id){
		var id_select = $("#"+id).select().val();//Pillem id escullit d'una d'aquestes categories i enviem cap pagination que mostri nomes aquesta categoria amb GET
		$("#cos-contingut").load("pagination.php?page=1&id_select="+id_select);
	}
</script>
</html>