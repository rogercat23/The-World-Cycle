<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<title>phpflow.com : Source code of simaple ajax pagination</title>
</head>
<body>
<div><h3>Source code : PHP simaple ajax pagination</h1></div>
<div>
<div id="target-content" ><span class="glyphicon glyphicon-refresh"></span> Carregant...</div>

<?php
require_once("GeneralBD.php");
$conBD = new GeneralBD();
$limit = 10;
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
</div>
	<img src="LoaderIcon.gif" id="loaderIcon" style="display:none" />
</div>
</body>
<script>
$(document).ready(function() {
$("#target-content").load("pagination.php?page=1");
    $("#pagination li").live('click',function(e){
    e.preventDefault();
        $("#target-content").html(' <span class="glyphicon glyphicon-refresh"></span> Carregant...');
        $("#pagination li").removeClass('active');
        $(this).addClass('active');
        var pageNum = this.id;
        $("#target-content").load("pagination.php?page=" + pageNum);
    });
});

function cridafuncioaccio(action,variable) {
		$("#loaderIcon").show();
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
		}	/* 
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