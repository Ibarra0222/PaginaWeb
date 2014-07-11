<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Productos</title>
	<link rel="stylesheet" type="text/css" href="CSS/productos.css" />
</head>
<body>
	<section class="posts">
	<?php
		//$busca="ledBar";
		$busca=$_POST['tipo'];
		//Conexion a la base de datos 
		mysql_connect("localhost","root","");
		mysql_select_db("ledfactory");
		if($busca!=""){
  			//Consulta Select que manda llamar los datos correspondientes al la busqueda relizada en el buscador Consuta_E.php
			$busqueda=mysql_query("SELECT * FROM productos WHERE Tipo LIKE '".$busca."'");

			//Se guarda la busqueda en un arreglo llamado $f para su mejor manejo
			while($f=mysql_fetch_array($busqueda)){
				$imagen=$f['Nombre'];
				$directorio=$f['Tipo'];
	?>
		<article class="post">
			<div class="descripcion">
				<figure class="imagen">
					<?php
					echo '<img src="'."productos/".$directorio."/".$imagen. ".jpg". '">';
					?>
				</figure>
				<div class="detalles">
					<a class="titulo" href=""> <?php echo $f['Nombre']; ?> </a> <br> <br>
					<div><?php echo $f['Comentarios']; ?></div> <br>
					<div id="precio"> <?php echo $f['precio']; ?> </div>
				</div> 
			</div>
		</article>
		<?php
			}
		}
		?>
	</section>
	
</body>
</html>