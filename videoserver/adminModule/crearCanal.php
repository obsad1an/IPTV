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
	if(!isset($_POST['submit'])){
		echo '<form action="crearCanal.php" method="post">
			<div class="col1">
				Nombre del Canal:<br />
				Descripción:<br />
			</div>
			<div class="col2">
				<input type="text" name="nameCh" /><br />
				<textarea name="descriptCh"> </textarea><br />
				<input type="submit" name="submit" value="Crear Canal">
			</div>
		</form>';
	} else {
		//Creaciòn del archivo XML
		echo 'Creando canal.. <br /><br />';
    $nameChannel = $_POST['nameCh'];
    $newChannel = $_POST['nameCh'].".xml";

    $descriptCh = $_POST['descriptCh'];

    //Datos del canal
    $channels = array(); 
    $channels [] = array( 
    'name' => $nameChannel,  
    'description' => $descriptCh
    ); 
     
    //Creacion del documento XML
    $doc = new DOMDocument(); 
    $doc->formatOutput = true; 
    
    //Se crea el elemento raiz
    $r = $doc->createElement( "channels" ); 
    $doc->appendChild( $r ); 
    
    //ELEMENTO QUE INFORMA SOBRE EL CANAL
    foreach( $channels as $channel ) 
    { 
      $b = $doc->createElement( "channel" ); 
     
      $name = $doc->createElement( "name" ); 
      $name->appendChild( 
      $doc->createTextNode( $channel['name'] ) 
      ); 
      $b->appendChild( $name ); 
      
      $description = $doc->createElement( "description" ); 
      $description->appendChild( 
      $doc->createTextNode( $channel['description'] ) 
      ); 
      $b->appendChild( $description ); 
      
      $r->appendChild( $b ); 
    }
    
    //Se almacena el documento XML del nuevo canal.
    echo $doc->saveXML(); 
    $doc->save("/var/www/IPTV/videoserver/channels/".$newChannel); 
  
    echo 'Canal creado exitosamente.';

	}


?>

<br />


  </body>

</html>