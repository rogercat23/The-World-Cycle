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
    <style type="text/css" media="screen">
		.gallery li{
			float:left;
			padding:2px;
		}
    </style>
	<?php
		require_once("GeneralBD.php");
		$conBD = new GeneralBD();
		$categories = $conBD->runQuery("SELECT * FROM categoria");

	?>    
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-2">
			<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModalproducte" ><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Producte</button>
		</div>
		<div class="col-md-2">
			<select class="form-control" id="categoria" onChange="seleccionarcategoria(this.id)">
				<option value="0">Totes les categories...</option>
				<?php
					for($i=0;$i<count($categories);$i++){
						echo "<option value='". $categories[$i]['id'] ."'>". $categories[$i]['nom'] ."</option>";
					}
				?>
			</select>
		</div>
		<div class="col-md-3">
		</div>
	</div>
    <div id="iconcarregar" align="center"><h3><span class="glyphicon glyphicon-refresh .glyphicon-spin"></span> Carregant...</h3></div>
    <div id="cos-contingut"></div>
    <div id="cos-pagines-nav"></div>
</div>
	<?php
	        include 'dialogproducte.php';
	?> 
</body>
<script>
$(document).ready(function() {
	$("#cos-contingut").load("paginationProductes.php?page=1");
	$("#cos-pagines-nav").load("barra-pagines-productes.php");
	$("#iconcarregar").hide();
    $("#pagination li").live('click',function(e){
    e.preventDefault();
		$("#cos-contingut").hide();
    	$("#iconcarregar").show();    
        $("#pagination li").removeClass('active');
        $(this).addClass('active');
        var pageNum = this.id;
        $("#cos-contingut").load("paginationProductes.php?page=" + pageNum);
		$("#iconcarregar").hide();
		$("#cos-contingut").show();
    });
});

function cridafuncioaccioproducte(accio,id) {
		$("#iconcarregar").show();
		var query;
		switch(accio) {
			case "eliminar":
				query = 'accio='+accio+'&id='+id;
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
		//alert(id_select);
		$("#cos-contingut").load("paginationProductes.php?page=1&id_select="+id_select);
		$("#cos-pagines-nav").load("barra-pagines-productes.php?categoria="+id_select);
	}
	
	function clickMostrarAmagar(vari){
		$('#tr'+vari.id).slideToggle(500);
		if($('#tr'+vari.id).find(":hidden")){
			$('#'+vari.id).html('<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Amagar');
		} else {
			$('#'+vari.id).html('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Mirar');
		}
		//alert($('#p'+vari.id).is('hide'));
	}
</script>
</html>