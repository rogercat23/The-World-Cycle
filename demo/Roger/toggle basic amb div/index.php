<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>toggle demo</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>


<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>Nom</th>
<th>Preu</th>  
<th>Unitat</th> 
<th>Nou/segon</th> 
<th></th>
</tr>  
</thead>  
<tbody>   
    <tr>
        <td></td>
        <td></td>  
        <td></td>  
        <td></td>
        <td>
            <button class="btn btn-danger" onClick="cridafuncioaccio('add',)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
            <button class="btn btn-primary" onClick="cridafuncioaccio('add',)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
            <button class="btn btn-default" id="1" onClick="clicarMirarAmagar(this)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Mirar</button>				
        </td>
    </tr>
    <tr>
    	<td colspan="5">
        	<div id="p1" style="display:none">
        		primer producte....
            </div>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>  
        <td></td>  
        <td></td>
        <td>
            <button class="btn btn-danger" onClick="cridafuncioaccio('add',)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
            <button class="btn btn-primary" onClick="cridafuncioaccio('add',)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
            <button class="btn btn-default" id="2" onClick="clicarMirarAmagar(this)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Mirar</button>				
        </td>
    </tr>
    <tr>
    	<td colspan="5">
        	<div id="p2" style="display:none">
        		segon producte....
            </div>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>  
        <td></td>  
        <td></td>
        <td>
            <button class="btn btn-danger" onClick="cridafuncioaccio('add',)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>
            <button class="btn btn-primary" onClick="cridafuncioaccio('add',)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar</button>
            <button class="btn btn-default" id="3" onClick="clicarMirarAmagar(this)"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Mirar</button>				
        </td>
    </tr>
    <tr>
    	<td colspan="5">
        	<div id="p3" style="display:none">
        		tercer producte....
            </div>
        </td>
    </tr>  
</tbody>  
</table>
<script>
    function clicarMirarAmagar(vari) {
        $('#p'+vari.id).slideToggle(500);
        return false;        
    };
</script>
</body>
</html>