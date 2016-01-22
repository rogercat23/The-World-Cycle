<!DOCTYPE HTML>
<html lang="es-ES">
<head>
	<?php
		include	 'llibreries.php';
	?>
 <meta charset="UTF-8">
 <title>Ejemplo jQuery</title>

 <script>
 $(document).ready(function(){
  $('.desc').click(function(){
   $('#contenido').toggle('fade',1500); 
  });
  $('.explode').click(function(){
   $('#contenido').toggle('explode',1500);
  });
 });
 </script>
 <style>
 body{
  text-align:center;
 }
 #contenido{
  background: red;
  border-radius: 20px;
  height: 260px;
  margin: auto;
  opacity: 0.9;
  width: 360px; 
 } 
 </style>
</head>
<body>
 <header>
  <h2>Ejemplo Simple de Efecto Desvanecer con jQuery
              </h2>
 </header>
 <div><button class="desc">Desvanecer</button><button class="explode">Explotar</button></div>
 <div id="contenido" style="display:none;">hollllaaa</div>
</body>
</html>
