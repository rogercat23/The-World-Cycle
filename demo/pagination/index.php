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
<div id="iconcarregar" align="center"><h3><span class="glyphicon glyphicon-refresh"></span> Carregant...</h3></div>
<div id="cos-contingut" >
	
</div>

<?php
require_once("GeneralBD.php");
$conBD = new GeneralBD();
$limit = 3;
$numrows = $conBD->numRows("SELECT * FROM usuari");
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

function cridafuncioaccio(action,variable) {
		$("#iconcarregar").show();
		alert(variable);
		var queryString;
		switch(action) {
			case "add":
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
</script>
</html>