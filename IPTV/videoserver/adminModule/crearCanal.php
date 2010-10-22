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
    				Nombre del Canal:<br /><br />
            Sigla:<br /><br />
            Número:<br /><br />
            Región:<br /><br />
            Tipo:<br /><br />
    				Descripción:<br /><br />
    			</div>
    			<div class="col2">
    				<input type="text" name="nameCh" /><br /><br />
    				<input type="text" name="sigla" /><br /><br />
    				<input type="text" name="numero" /><br /><br />
    				<input type="text" name="region" /><br /><br />
    				<input type="text" name="tipo" /><br /><br />
    				<textarea name="descriptCh"> </textarea><br />
    				<input type="submit" name="submit" value="Crear Canal">
    			</div>
    		</form>';
    	} else {
    		//Creaciòn del archivo XML
    		echo '<p>Creando canal... </p>';
    		
        //obteniendo las variables string
    		$strNewChannel = $_POST[nameCh];
        $strSigla = $_POST[sigla];
        $strNumeroCh = $_POST[numero];
        $strRegion = $_POST[region];
        $strTipo = $_POST[tipo];
        $strDescripcion = $_POST[descriptCh];
    		
        //creacion del objeto XML
        $xdoc = new DOMDocument('1.0', 'UTF-8');
        //carga de la estructura XML
        $xdoc->load('/var/www/IPTV/iptvStructure.xml');
        
        if (!$xdoc) {
          echo '<p class="mensajeError">[Fallo]: Error al cargar el archivo XML. </p>';
        } else {
          echo '<p class="mensajeExito">[Éxito]: Estructura cargado con éxito. </p>';
        }
         
        //Generación del canal en la estructura
        echo '<p class="mensajeInfoPasos">Creando estructura... </p>';
        $channel = $xdoc->getElementsByTagName('iptv')->item(0);

        $newChannel = $xdoc ->createElement('canal');
        $channel->appendChild($newChannel);
        echo '<p class="mensajeInfoPasos">Añadiendo atributos... </p>';
        //Atributo nombre
        $chNameAttrib = $xdoc->createAttribute('nombre');
        $newChannel->appendChild($chNameAttrib);
        
        $txtNode = $xdoc->createTextNode($strNewChannel);
        $chNameAttrib->appendchild($txtNode);
        
        //Atributo sigla
        $chSiglaAttrib = $xdoc->createAttribute('sigla');
        $newChannel->appendChild($chSiglaAttrib);
        
        $txtNode = $xdoc->createTextNode($strSigla);
        $chSiglaAttrib->appendchild($txtNode);
        
        //Atributo numero
        $chNumeroAttrib = $xdoc->createAttribute('numero');
        $newChannel->appendChild($chNumeroAttrib);
        
        $txtNode = $xdoc->createTextNode($strNumeroCh);
        $chNumeroAttrib->appendchild($txtNode);
        
        //Atributo region
        $chRegionAttrib = $xdoc->createAttribute('region');
        $newChannel->appendChild($chRegionAttrib);
        
        $txtNode = $xdoc->createTextNode($strRegion);
        $chRegionAttrib->appendchild($txtNode);
        
        //Atributo tipo
        $chTipoAttrib = $xdoc->createAttribute('tipo');
        $newChannel->appendChild($chTipoAttrib);
        
        $txtNode = $xdoc->createTextNode($strTipo);
        $chTipoAttrib->appendchild($txtNode);
        
        //Atributo descripcion
        $chDescripcionAttrib = $xdoc->createAttribute('descripcion');
        $newChannel->appendChild($chDescripcionAttrib);
        
        $txtNode = $xdoc->createTextNode($strDescripcion);
        $chDescripcionAttrib->appendchild($txtNode);
      
        $xdoc->save("/var/www/IPTV/iptvStructure.xml");
        echo '<p class="mensajeExito">[Éxito]: El canal '.$strNewChannel.' ha sido creado. </p>';

        //Conexion a la nube
        if(!($con = ssh2_connect("172.17.8.229", 22))){
            echo '<p class="mensajeError">[Error]: al establecer conexión con la nube. </p>';
        } else {
            
          // autenticación con username root, password secretpassword
          if(!ssh2_auth_password($con, "clouduser", "iptv2010")) {
              echo '<p class="mensajeError">[Error]: No es posible autenticarse en el servidor </p>';
          } else {
            // allright, we're in!
            echo '<p class="mensajeExito">[Exito]: Autenticado en el servidor...</p>';
            
           
               
            // create a shell
            if (!($shell = ssh2_shell($con, 'vt102', null, 80, 40, SSH2_TERM_UNIT_CHARS))) {
                echo '<p class="mensajeError">[Error]: No ha sido posible creal el shell. </p>';
            } else {

              stream_set_blocking($shell, true);
              // send a command
              fwrite($shell, "perl s3-curl/s3curl.pl --id \$EC2_ACCESS_KEY --key \$EC2_SECRET_KEY --put /dev/null -- -s -v \$S3_URL/".$strNewChannel."\n");
              sleep(1);
  
              $time_start = time();
              $data       = "";
              while (true){
                $data .= fread($stream, 4096);
                if (strpos($data,"__COMMAND_FINISHED__") !== false) {
                  echo '<p class="mensajeExito">[Éxito]: El canal ha sido creado en la nube.</p>';
                  break;
                }
                if ((time()-$time_start) > 10 ) {
                  echo '<p class="mensajeExito">[Éxito]: El canal ha sido creado en la nube.</p>';
                  break;
                }
              }
            }
          }
        }

    	}
    
    
    ?>
    
    <br />


  </body>

</html>