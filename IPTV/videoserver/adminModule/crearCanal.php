<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Video Server</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../styles/adminStyles.css" />
    <script type="text/javascript" src="../js/funciones.js">
    </script>
  </head>
  <body>
  php
  <?php
  
    if($_POST) {
      
      $strNewChannel = $_POST['strNewChannel'];
      $strSigla = $_POST['$strSigla'];
      $strNumero = $_POST['$strNumero'];
      $strTipo = $_POST['$strTipo'];
      $strRegion = $_POST['$strRegion'];
      $strDescripcion = $_POST['$strDescripcion'];
      
      echo 'channel'.$_POST['strNewChannel'].'<br />';
      echo 'sigla'.$strSigla.'<br />';

      //Creaciòn del archivo XML
      echo '<p class="mensajeInfoPasos">Creando canal... </p>';
      
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
  
      //Conexion a la nubestyle="display: none";
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
            echo "perl s3-curl/s3curl.pl --id \$EC2_ACCESS_KEY --key \$EC2_SECRET_KEY --put /dev/null -- -s -v \$S3_URL/".$strNewChannel."\n";
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
  </body>
</html>