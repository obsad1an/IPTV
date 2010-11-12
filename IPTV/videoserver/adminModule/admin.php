<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Video Server</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../styles/adminStyles.css" />
    <link rel="stylesheet" href="../styles/fileuploader.css" />
    <script type="text/javascript" src="../js/funciones.js">
    </script>
    <script type="text/javascript" src="../js/fileuploader.js">
    </script>
  </head>
  <body>
    <div class="menu">
      <!-- Site navigation menu -->
      <ul class="navbar">
        <div>
          <img src="../images/LogoUnivalle.gif" / alt=""> 
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
               <a href="#" onclick="javascript:showcontent(5)">Ingresar Programa</a>
            </li>
            <li>
               <a href="#" onclick="javascript:showcontent(6)">Modificar Programa</a>
            </li>
            <li>
               <a href="#" onclick="javascript:showcontent(7)">Eliminar Programa</a>
            </li>
          </ul>
        </li>
        <li><a href="#" onclick="javascript:showsubmenu(3)">Usuarios</a>
          <ul class="submenu" id="s3" style="display: none">
            <li>
               <a href="#" onclick="javascript:showcontent(8)">Ingresar Usuario</a>
            </li>
            <li>
               <a href="#" onclick="javascript:showcontent(9)">Modificar Usuario</a>
            </li>
            <li>
               <a href="#" onclick="javascript:showcontent(10)">Eliminar Usuario</a>
            </li>
          </ul>
        </li>
        <li><a href="links.html" onclick="javascript:showcontent(11)">Cambio de contraseña</a></li>
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
          
      <div class="clearfooter"></div>
    </div>
    
    <!-- DIV CONTENEDOR DE LA MODIFICACION DEL CANAL DEL CANAL -->
    <div class="content" id="5"  style="display: none">
        <form id="formulario">
          <div id="transparencia">
            <div id="transparenciaMensaje">aaaaaaaaaaaa</div>
          </div>
          <div class="col1">
            <p class="text">Canal:</p>
            <p class="text">Nombre Programa:</p>
            <p class="text">Tipo Programa:</p>
            <p class="text">Tipo Contenido:</p>
            <p class="text">Género:</p>
            <p class="text">Descripción:</p>
            <p class="text">Características:</p>
            <p class="text">País Origen:</p>
            <p class="text">Idiomas:</p>
            <p class="text">Archivo:</p>
            <p class="text">Imagen:</p>
          </div>
          <div class="col2">
            <p>
              <select>
                <?php
                  //creacion del objeto XML
                  $xdoc = new DOMDocument('1.0', 'UTF-8');
                  //carga de la estructura XML
                  $xdoc->load('/var/www/IPTV/iptvStructure.xml');
                  //obtener canales recorriendo el documento
                  $canales = $xdoc->getElementsByTagName('canal'); 
                  
                  $numeroNodos = $canales->length;

                  for($i = 0; $i < $numeroNodos; $i++)
                  {
                    $canales = $xdoc->getElementsByTagName('canal')->item($i);
                    $nombres = $canales->getAttributeNode('nombre'); 
                    echo '<option>'.$nombres->value.'</option>'; 
                  }
                ?>
              </select>
            </p>
            <p><input class="text" type="text" id="nombre" /></p>
            <p><input class="text" type="text" id="tipo_programa" /></p>
            <p><input class="text" type="text" id="tipo_contenido" /></p>
            <p><input class="text" type="text" id="genero" /></p>
            <p><input class="text" type="text" id="descripcion" /></p>
            <p><input class="text" type="text" id="caracteristicas" /></p>
            <p>
              <select name="pais"> 
                <option value="" selected="selected">Seleccionar País</option> 
                <option value="United States">United States</option> 
                <option value="United Kingdom">United Kingdom</option> 
                <option value="Afghanistan">Afghanistan</option> 
                <option value="Albania">Albania</option> 
                <option value="Algeria">Algeria</option> 
                <option value="American Samoa">American Samoa</option> 
                <option value="Andorra">Andorra</option> 
                <option value="Angola">Angola</option> 
                <option value="Anguilla">Anguilla</option> 
                <option value="Antarctica">Antarctica</option> 
                <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                <option value="Argentina">Argentina</option> 
                <option value="Armenia">Armenia</option> 
                <option value="Aruba">Aruba</option> 
                <option value="Australia">Australia</option> 
                <option value="Austria">Austria</option> 
                <option value="Azerbaijan">Azerbaijan</option> 
                <option value="Bahamas">Bahamas</option> 
                <option value="Bahrain">Bahrain</option> 
                <option value="Bangladesh">Bangladesh</option> 
                <option value="Barbados">Barbados</option> 
                <option value="Belarus">Belarus</option> 
                <option value="Belgium">Belgium</option> 
                <option value="Belize">Belize</option> 
                <option value="Benin">Benin</option> 
                <option value="Bermuda">Bermuda</option> 
                <option value="Bhutan">Bhutan</option> 
                <option value="Bolivia">Bolivia</option> 
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                <option value="Botswana">Botswana</option> 
                <option value="Bouvet Island">Bouvet Island</option> 
                <option value="Brazil">Brazil</option> 
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                <option value="Brunei Darussalam">Brunei Darussalam</option> 
                <option value="Bulgaria">Bulgaria</option> 
                <option value="Burkina Faso">Burkina Faso</option> 
                <option value="Burundi">Burundi</option> 
                <option value="Cambodia">Cambodia</option> 
                <option value="Cameroon">Cameroon</option> 
                <option value="Canada">Canada</option> 
                <option value="Cape Verde">Cape Verde</option> 
                <option value="Cayman Islands">Cayman Islands</option> 
                <option value="Central African Republic">Central African Republic</option> 
                <option value="Chad">Chad</option> 
                <option value="Chile">Chile</option> 
                <option value="China">China</option> 
                <option value="Christmas Island">Christmas Island</option> 
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                <option value="Colombia">Colombia</option> 
                <option value="Comoros">Comoros</option> 
                <option value="Congo">Congo</option> 
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                <option value="Cook Islands">Cook Islands</option> 
                <option value="Costa Rica">Costa Rica</option> 
                <option value="Cote D'ivoire">Cote D'ivoire</option> 
                <option value="Croatia">Croatia</option> 
                <option value="Cuba">Cuba</option> 
                <option value="Cyprus">Cyprus</option> 
                <option value="Czech Republic">Czech Republic</option> 
                <option value="Denmark">Denmark</option> 
                <option value="Djibouti">Djibouti</option> 
                <option value="Dominica">Dominica</option> 
                <option value="Dominican Republic">Dominican Republic</option> 
                <option value="Ecuador">Ecuador</option> 
                <option value="Egypt">Egypt</option> 
                <option value="El Salvador">El Salvador</option> 
                <option value="Equatorial Guinea">Equatorial Guinea</option> 
                <option value="Eritrea">Eritrea</option> 
                <option value="Estonia">Estonia</option> 
                <option value="Ethiopia">Ethiopia</option> 
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                <option value="Faroe Islands">Faroe Islands</option> 
                <option value="Fiji">Fiji</option> 
                <option value="Finland">Finland</option> 
                <option value="France">France</option> 
                <option value="French Guiana">French Guiana</option> 
                <option value="French Polynesia">French Polynesia</option> 
                <option value="French Southern Territories">French Southern Territories</option> 
                <option value="Gabon">Gabon</option> 
                <option value="Gambia">Gambia</option> 
                <option value="Georgia">Georgia</option> 
                <option value="Germany">Germany</option> 
                <option value="Ghana">Ghana</option> 
                <option value="Gibraltar">Gibraltar</option> 
                <option value="Greece">Greece</option> 
                <option value="Greenland">Greenland</option> 
                <option value="Grenada">Grenada</option> 
                <option value="Guadeloupe">Guadeloupe</option> 
                <option value="Guam">Guam</option> 
                <option value="Guatemala">Guatemala</option> 
                <option value="Guinea">Guinea</option> 
                <option value="Guinea-bissau">Guinea-bissau</option> 
                <option value="Guyana">Guyana</option> 
                <option value="Haiti">Haiti</option> 
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                <option value="Honduras">Honduras</option> 
                <option value="Hong Kong">Hong Kong</option> 
                <option value="Hungary">Hungary</option> 
                <option value="Iceland">Iceland</option> 
                <option value="India">India</option> 
                <option value="Indonesia">Indonesia</option> 
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                <option value="Iraq">Iraq</option> 
                <option value="Ireland">Ireland</option> 
                <option value="Israel">Israel</option> 
                <option value="Italy">Italy</option> 
                <option value="Jamaica">Jamaica</option> 
                <option value="Japan">Japan</option> 
                <option value="Jordan">Jordan</option> 
                <option value="Kazakhstan">Kazakhstan</option> 
                <option value="Kenya">Kenya</option> 
                <option value="Kiribati">Kiribati</option> 
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                <option value="Korea, Republic of">Korea, Republic of</option> 
                <option value="Kuwait">Kuwait</option> 
                <option value="Kyrgyzstan">Kyrgyzstan</option> 
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                <option value="Latvia">Latvia</option> 
                <option value="Lebanon">Lebanon</option> 
                <option value="Lesotho">Lesotho</option> 
                <option value="Liberia">Liberia</option> 
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                <option value="Liechtenstein">Liechtenstein</option> 
                <option value="Lithuania">Lithuania</option> 
                <option value="Luxembourg">Luxembourg</option> 
                <option value="Macao">Macao</option> 
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
                <option value="Madagascar">Madagascar</option> 
                <option value="Malawi">Malawi</option> 
                <option value="Malaysia">Malaysia</option> 
                <option value="Maldives">Maldives</option> 
                <option value="Mali">Mali</option> 
                <option value="Malta">Malta</option> 
                <option value="Marshall Islands">Marshall Islands</option> 
                <option value="Martinique">Martinique</option> 
                <option value="Mauritania">Mauritania</option> 
                <option value="Mauritius">Mauritius</option> 
                <option value="Mayotte">Mayotte</option> 
                <option value="Mexico">Mexico</option> 
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                <option value="Moldova, Republic of">Moldova, Republic of</option> 
                <option value="Monaco">Monaco</option> 
                <option value="Mongolia">Mongolia</option> 
                <option value="Montserrat">Montserrat</option> 
                <option value="Morocco">Morocco</option> 
                <option value="Mozambique">Mozambique</option> 
                <option value="Myanmar">Myanmar</option> 
                <option value="Namibia">Namibia</option> 
                <option value="Nauru">Nauru</option> 
                <option value="Nepal">Nepal</option> 
                <option value="Netherlands">Netherlands</option> 
                <option value="Netherlands Antilles">Netherlands Antilles</option> 
                <option value="New Caledonia">New Caledonia</option> 
                <option value="New Zealand">New Zealand</option> 
                <option value="Nicaragua">Nicaragua</option> 
                <option value="Niger">Niger</option> 
                <option value="Nigeria">Nigeria</option> 
                <option value="Niue">Niue</option> 
                <option value="Norfolk Island">Norfolk Island</option> 
                <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                <option value="Norway">Norway</option> 
                <option value="Oman">Oman</option> 
                <option value="Pakistan">Pakistan</option> 
                <option value="Palau">Palau</option> 
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                <option value="Panama">Panama</option> 
                <option value="Papua New Guinea">Papua New Guinea</option> 
                <option value="Paraguay">Paraguay</option> 
                <option value="Peru">Peru</option> 
                <option value="Philippines">Philippines</option> 
                <option value="Pitcairn">Pitcairn</option> 
                <option value="Poland">Poland</option> 
                <option value="Portugal">Portugal</option> 
                <option value="Puerto Rico">Puerto Rico</option> 
                <option value="Qatar">Qatar</option> 
                <option value="Reunion">Reunion</option> 
                <option value="Romania">Romania</option> 
                <option value="Russian Federation">Russian Federation</option> 
                <option value="Rwanda">Rwanda</option> 
                <option value="Saint Helena">Saint Helena</option> 
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                <option value="Saint Lucia">Saint Lucia</option> 
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                <option value="Samoa">Samoa</option> 
                <option value="San Marino">San Marino</option> 
                <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                <option value="Saudi Arabia">Saudi Arabia</option> 
                <option value="Senegal">Senegal</option> 
                <option value="Serbia and Montenegro">Serbia and Montenegro</option> 
                <option value="Seychelles">Seychelles</option> 
                <option value="Sierra Leone">Sierra Leone</option> 
                <option value="Singapore">Singapore</option> 
                <option value="Slovakia">Slovakia</option> 
                <option value="Slovenia">Slovenia</option> 
                <option value="Solomon Islands">Solomon Islands</option> 
                <option value="Somalia">Somalia</option> 
                <option value="South Africa">South Africa</option> 
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
                <option value="Spain">Spain</option> 
                <option value="Sri Lanka">Sri Lanka</option> 
                <option value="Sudan">Sudan</option> 
                <option value="Suriname">Suriname</option> 
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                <option value="Swaziland">Swaziland</option> 
                <option value="Sweden">Sweden</option> 
                <option value="Switzerland">Switzerland</option> 
                <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                <option value="Taiwan, Province of China">Taiwan, Province of China</option> 
                <option value="Tajikistan">Tajikistan</option> 
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                <option value="Thailand">Thailand</option> 
                <option value="Timor-leste">Timor-leste</option> 
                <option value="Togo">Togo</option> 
                <option value="Tokelau">Tokelau</option> 
                <option value="Tonga">Tonga</option> 
                <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                <option value="Tunisia">Tunisia</option> 
                <option value="Turkey">Turkey</option> 
                <option value="Turkmenistan">Turkmenistan</option> 
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                <option value="Tuvalu">Tuvalu</option> 
                <option value="Uganda">Uganda</option> 
                <option value="Ukraine">Ukraine</option> 
                <option value="United Arab Emirates">United Arab Emirates</option> 
                <option value="United Kingdom">United Kingdom</option> 
                <option value="United States">United States</option> 
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                <option value="Uruguay">Uruguay</option> 
                <option value="Uzbekistan">Uzbekistan</option> 
                <option value="Vanuatu">Vanuatu</option> 
                <option value="Venezuela">Venezuela</option> 
                <option value="Viet Nam">Viet Nam</option> 
                <option value="Virgin Islands, British">Virgin Islands, British</option> 
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                <option value="Wallis and Futuna">Wallis and Futuna</option> 
                <option value="Western Sahara">Western Sahara</option> 
                <option value="Yemen">Yemen</option> 
                <option value="Zambia">Zambia</option> 
                <option value="Zimbabwe">Zimbabwe</option>
              </select>
            </p>
            <p>
              <select id="idioma">
                <option value="" selected="selected">Seleccionar Idioma</option> 
                <option value="español">Español</option> 
                <option value="ingles">Inglés</option>
                <option value="portugues">Portugués</option>
                <option value="aleman">Alemán</option> 
                <option value="frances">Frances</option> 
                <option value="italiano">Italiano</option> 
                <option value="danes">Danés</option> 
                <option value="holandes">Holandés</option> 
                <option value="polaco">Polaco</option> 
                <option value="sueco">Sueco</option> 
                <option value="japones">Japones</option>
                <option value="chino">Chino</option>
              </select>
            </p>
            <p><input type="file" id="archivo" /></p>
            <p><input type="file" id="imagen" /></p>
            <p><button type="button" id="botonEnviarPrograma" onClick="validaFormSubirPrograma()">Subir</button></p>
          </div>
        </form>
      <div class="clearfooter"></div>
    </div>
    
    <div class="content" id="6"  style="display: none">
          
      <div class="clearfooter"></div>
    </div>
    
    <div class="content" id="6"  style="display: none">
          cddajkdakpsdkṕasd
      <div class="clearfooter"></div>
    </div>
    
    <div class="content" id="7"  style="display: none">
          cddajkdakpsdkṕasd
      <div class="clearfooter"></div>
    </div>
    
    <div class="content" id="8"  style="display: none">
          cddajkdakpsdkṕasd
      <div class="clearfooter"></div>
    </div>
    
    <div class="content" id="9"  style="display: none">
          cddajkdakpsdkṕasd
      <div class="clearfooter"></div>
    </div>
    
    <div class="content" id="10"  style="display: none">
          cddajkdakpsdkṕasd
      <div class="clearfooter"></div>
    </div>
    
    <div class="content" id="11"  style="display: none">
          cddajkdakpsdkṕasd
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