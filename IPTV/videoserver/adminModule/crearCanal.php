<html>

  <head>
    <link rel="stylesheet" href="../styles/adminStyles.css">
    <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
  </head>

  <body>

<!-- Site navigation menu -->
    <ul class="navbar">
      <li><a href="crearCanal.php">Canales</a>
      <li><a href="musings.html">Programación</a>
      <li><a href="town.html">Usuarios</a>
      <li><a href="links.html">Cambio de contraseña</a>
    </ul>

<!-- Main content -->
<h1>Módulo administrador: creación de canal.</h1>

<?php
	if(!isset($_POST[submit])){
		echo '<form action="crearCanal.php" method="post">
			<div class="col1">
				Nombre del Canal:
				Descripción:
			</div>
			<div class="col2">
				<input type="text" name="nameCh" />
				<textarea name="descriptCh"> </textarea><br />
				<input type="submit" name="submit" value="Crear Canal">
			</div>
		</form>';
	} else {
		//Creaciòn del archivo XML
		echo 'Creando canal.. <br /><br />';
		
		$newChannel = $_POST[nameCh].".xml";
		//$newChannel = fopen("../channels/".$newChannel, 'w+') or die("Error, no se puede crear el archivo.");
		
		//chmod($newChannel, 777);
		
		//fclose($newChannel);
		//que pasaaa!
		exec("touch /var/www/IPTV/videoserver/channels/".$newChannel);
		exec("chmod 777 /var/www/IPTV/videoserver/channels/".$newChannel);
		
		$channel = simplexml_load_file("/var/www/IPTV/videoserver/channels/".$newChannel);

		$channel->addAtribute('canal', $newChannel);
		echo 'Atributos XML creados.';
		
  
		echo 'Canal creado exitosamente.';
	}


?>

<br />


  </body>

</html>