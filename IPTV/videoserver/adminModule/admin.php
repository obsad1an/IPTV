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
    <div class="menu">
      <!-- Site navigation menu -->
      <ul class="navbar">
        <div align="center">
          <img src="../images/LogoUnivalle.gif" /> 
        </div><br />
        <li><a href="#" onclick="javascript:showsubmenu(1)">Canales</a>
          <ul class="submenu" id="s1" style="display: none">
            <li>
              <a href="#" onclick="javascript:showcontent(2)">Crear Canal</a>
            </li>
            <li>
               <a href="#" onclick="javascript:showcontent(3)">Modificar Canal</a>
            </li>
            <li>
               <a href="#" onclick="javascript:showcontent(4)">Eliminar Canal</a>
            </li>
          </ul>
        </li>
        <li><a href="#" onclick="javascript:showsubmenu(2)">Programación</a>
          <ul class="submenu" id="s2" style="display: none">
            <li>
               <a href="" onclick="javascript:showcontent(5)">Ingresar Programa</a>
            </li>
            <li>
               <a href="" onclick="javascript:showcontent(6)">Modificar Programa</a>
            </li>
            <li>
               <a href="" onclick="javascript:showcontent(7)">Eliminar Programa</a>
            </li>
          </ul>
        </li>
        <li><a href="#" onclick="javascript:showsubmenu(3)">Usuarios</a>
          <ul class="submenu" id="s3" style="display: none">
            <li>
               <a href="" onclick="javascript:showcontent(8)">Ingresar Usuario</a>
            </li>
            <li>
               <a href="" onclick="javascript:showcontent(9)">Modificar Usuario</a>
            </li>
            <li>
               <a href="" onclick="javascript:showcontent(10)">Eliminar Usuario</a>
            </li>
          </ul>
        </li>
        <li><a href="links.html" onclick="javascript:showcontent(11 )">Cambio de contraseña</a></li>
      </ul>
    </div>
    <!-- Main content -->
    <h1>Módulo administrador: creación de canal.</h1>
    
    <!-- div para la creacion de canal -->
    <div class="content" id="1">
      <p class="titulo">Módulo administrador del servidor de video.</p>
      <p class="text">Bienvenido al módulo administrativo del servidor de video, en el menú izquierdo se mostraran las actividades que son posibles realizar.</p>
      <p class="text">Para contar con más información refierase a la documentación o escriba un correo electrónico al administrador de la aplicación al correo
      <a href="">jraristi@gmail.com</a>, realice el mismo procedimiento si a extraviado su contraseña y necesita la restauración de la misma.
      </p>
    </div>

    <!-- DIV CONTENEDOR DE LA CREACION DEL CANAL -->
    <div class="content" id="2"  style="display: none">
      		<form id="formulario">
        		<div id="transparencia">
              <div id="transparenciaMensaje">aaaaaaaaaaaa</div>
            </div>
      			<div class="col1">
      				<p class="text">Nombre del Canal:</p>
              <p class="text">Sigla:</p>
              <p class="text">Número:</p>
              <p class="text">Región:</p>
              <p class="text">Tipo:</p>
      				<p class="text">Descripción:</p>
      			</div>
      			<div class="col2">
      				<p><input class="text" type="text" id="nameCh" /></p>
      				<p><input class="text" type="text" id="sigla" /></p>
      				<p><input class="text" type="text" id="numero" /></p>
      				<p><input class="text" type="text" id="region" /></p>
      				<p><input class="text" type="text" id="tipo" /></p>
      				<p><textarea id="descriptCh" cols="30" rows="7"> </textarea></p>
      				<p><button type="button" id="botonEnviar" onClick="validaForm()">Crear Canal</button></p>
      			</div>
      		</form>
      <div class="clearfooter"></div>
    </div>
    
    <!-- DIV CONTENEDOR DE LA MODIFICACION DEL CANAL DEL CANAL -->
    <div class="content" id="3"  style="display: none">
          
      <div class="clearfooter"></div>
    </div>
    
    <!-- DIV CONTENEDOR DE LA ELIMINACION DEL CANAL -->
    <div class="content" id="4"  style="display: none">
          <form id="formulario">
            <div id="transparencia">
              <div id="transparenciaMensaje">aaaaaaaaaaaa</div>
            </div>
            <div class="col1">
              <p class="text">Nombre del Canal:</p>
              <p class="text">Sigla:</p>
              <p class="text">Número:</p>
              <p class="text">Región:</p>
              <p class="text">Tipo:</p>
              <p class="text">Descripción:</p>
            </div>
            <div class="col2">
              <p><input class="text" type="text" id="nameCh" /></p>
              <p><input class="text" type="text" id="sigla" /></p>
              <p><input class="text" type="text" id="numero" /></p>
              <p><input class="text" type="text" id="region" /></p>
              <p><input class="text" type="text" id="tipo" /></p>
              <p><textarea id="descriptCh" cols="30" rows="7"> </textarea></p>
              <p><button type="button" id="botonEnviar" onClick="validaForm()">Crear Canal</button></p>
            </div>
          </form>
      <div class="clearfooter"></div>
    </div>
    
    <!-- DIV CONTENEDOR DE LA MODIFICACION DEL CANAL DEL CANAL -->
    <div class="content" id="5"  style="display: none">
          
      <div class="clearfooter"></div>
    </div>
    
    <!-- Capa para mostrar los mensajes de ayuda al presionar los iconos correspondientes -->
    <div id="mensajesAyuda">
      <div id="ayudaTitulo"></div>
      <div id="ayudaTexto"></div>
    </div>

    <div class="footer">
      <p>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
         <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" />
        </a>
      </p>
    </div>
  </body>

</html>