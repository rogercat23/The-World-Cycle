<!DOCTYPE html>
<html lang="en">
    <head>
	<?php
		include	 '../llibreries.php';
	?>
        <meta charset="UTF-8"/>
        <title>Krajee JQuery Plugins - &copy; Kartik</title>
        <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="../js/fileinput.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <h1>Bootstrap File Input Example</h1>
            <form enctype="multipart/form-data">
                <div class="form-group">
                    <input id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
                </div>
                <div class="form-group">
                    <input id="file-2" type="file" class="file" readonly=true>
                </div> 
                <div class="form-group">
                    <input id="file-3" type="file" multiple=true>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                    <button class="btn btn-default" type="reset">Reset</button>
                </div>
				<div class="form-group">
					<label class="control-label">Select File</label>
					<input id="fotos" name="fotos" multiple type="file" class="file file-loading" data-allowed-file-extensions='["jpg","txt"]'>
				</div>
            </form>
        </div>
    </body>
	<script>
	$("#file-3").fileinput({
		showCaption: false,
		browseClass: "btn btn-primary btn-lg",
		fileType: "any"
	});
	</script>
</html>