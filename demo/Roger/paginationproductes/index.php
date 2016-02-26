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
	<ul class="gallery clearfix" id="p103">
        <li><a href="img/fullscreen/1.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_1.jpg" width="60" height="60"/></a></li>
        <li><a href="img/fullscreen/2.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_2.jpg" width="60" height="60"/></a></li>
        <li><a href="img/fullscreen/3.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_3.jpg" width="60" height="60"/></a></li>
        <li><a href="img/fullscreen/4.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_4.jpg" width="60" height="60"/></a></li>
        <li><a href="img/fullscreen/5.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_5.jpg" width="60" height="60"/></a></li>
        <li><a href="img/fullscreen/6.jpg" rel="prettyPhoto[gallery1]"><img src="img/thumbnails/t_2.jpg" width="60" height="60"/></a></li>
    </ul>
    <script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $("area[rel^='prettyPhoto']").prettyPhoto();
        
        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});

        $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
            custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
            changepicturecallback: function(){ initialize(); }
        });

        $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
            custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
            changepicturecallback: function(){ _bsap.exec(); }
        });
    });
    </script>
    <style type="text/css" media="screen">
		li{
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
		<div class="col-md-1">
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
		<div class="col-md-4">
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