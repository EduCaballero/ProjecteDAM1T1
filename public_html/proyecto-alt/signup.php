<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConcertPush - Registro</title>
	<link rel="stylesheet" href="css/signin-signup.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
</head>
<body>
	<header>
		<div id="topbar">
			<div class="logo">
				<a href="index.php" title="ConcertPush" class="logo-link">ConcertPush</a>
			</div>
		</div>
	</header>
	<div id="signin-signup-container">
		<form action="" method="post">
			<div id="signup-form-two-steps">
				<div id="signup-step-one">
					<div class="signin-signup-form">
						<h1>Únete hoy a ConcertPush.</h1>
						<input type="email" name="email" placeholder="Email" maxlength="80" required>
						<input type="password" name="password" placeholder="Contraseña" maxlength="32" required>
						<input type="password" name="confirm-password" placeholder="Reescribe la contraseña" maxlength="32" required>
						<select name="user-type" id="user-type" required>
							<option value="">Tipo de usuario</option>
							<option value="L">Local</option>
							<option value="M">Músico</option>
							<option value="F">Fan</option>
						</select>
					</div>
					<input type="submit" class="btn btn-submit" name="next" value="Siguiente">
					<div id="subtext-box">
						<small>¿Tienes cuenta? <a href="signin.php">Iniciar sesión</a>
						</small>
					</div>
				</div>
				<div id="signup-step-two">
					<div id="user-local" class="signin-signup-form">
						<h1>Registro local</h1>
						<input type="text" name="nombre-local" placeholder="Nombre del local" maxlength="60" required>
						<input type="text" name="ciudad-local" placeholder="Ciudad" maxlength="60" required>
						<input type="text" name="dir-local" placeholder="Dirección" maxlength="60" required>
						<input type="text" name="aforo" placeholder="Aforo" pattern="\d*" maxlength="7" required>
						<input type="text" name="telefono-local" placeholder="Teléfono" maxlength="9" pattern="\d*">
						<input type="url" name="web-local" placeholder="Página web" maxlength="80">
					</div>
					<div id="user-musico" class="signin-signup-form">
						<h1>Registro músico</h1>
						<input type="text" name="nombre-musico" placeholder="Nombre artistico" maxlength="60" required>
						<input type="text" name="num-miembros" placeholder="Numero de miembros" pattern="\d*" maxlength="4">
						<select name="genero" required>
							<option value="">Género</option>
							<option value="Pop">Pop</option>
							<option value="Rock">Rock</option>
							<option value="Disco">Disco</option>
							<option value="Clasica">Clásica</option>
							<option value="Heavy Metal">Heavy Metal</option>
							<option value="Jazz">Jazz</option>
							<option value="Blues">Blues</option>
							<option value="Country">Country</option>
							<option value="Electronica">Electronica</option>
							<option value="Hip-hop">Hip-hop</option>
							<option value="Dance">Dance</option>
							<option value="House">House</option>
							<option value="Trance">Trance</option>
							<option value="Folk">Folk</option>
							<option value="Punk">Punk</option>
							<option value="Raggae">Raggae</option>
							<option value="Alternative">Alternative</option>
							<option value="Proressive">Progressive</option>
							<option value="R&B and soul">Soul</option>
						</select>
						<input type="text" name="telefono-musico" maxlength="9" placeholder="Teléfono" pattern="\d*">
						<input type="url" name="web-musico" placeholder="Página web" maxlength="80" >
					</div>	
					<div id="user-fan" class="signin-signup-form">
						<h1>Registro fan</h1>
						<ul>
							<li><input type="text" id="nombre-fan" name="nombre-fan" placeholder="Nombre" maxlength="60" required></li><li><input type="text" id="apellidos-fan" name="apellidos-fan" placeholder="Apellidos" maxlength="60" ></li>
						</ul>
						<input type="text" name="ciudad-fan" placeholder="Ciudad" maxlength="60" required>
						<input type="text" name="telefono-fan" placeholder="Teléfono" maxlength="9" pattern="\d*">
						<div id="user-sex">
							<span>Sexo:</span>
							<label for="fan-hombre">Hombre</label>
							<input id="fan-homnre" type="radio" name="fan-sex" value="H">
							<label for="fan-mujer">Mujer</label>
							<input id="fan-mujer" type="radio" name="fan-sex" value="M">
						</div>
						<span id="fecha-nac">Fecha de nacimiento</span>
						<ul>
							<li class="birthdate">
								<select name="day" required>
									<option value="">Dia</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
							</li><li class="birthdate">
							<select name="month" required>
								<option value="">Mes</option>
								<option value="1">Enero</option>
								<option value="2">Febrero</option>
								<option value="3">Marzo</option>
								<option value="4">Abril</option>	
								<option value="5">Mayo</option>
								<option value="6">Junio</option>
								<option value="7">Julio</option>
								<option value="8">Agosto</option>
								<option value="9">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
						</li><li class="birthdate">
						<select name="year" required>
							<option value="">Año</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
							<option value="2004">2004</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
							<option value="1999">1999</option>
							<option value="1998">1998</option>
							<option value="1997">1997</option>
							<option value="1996">1996</option>
							<option value="1995">1995</option>
							<option value="1994">1994</option>
							<option value="1993">1993</option>
							<option value="1992">1992</option>
							<option value="1991">1991</option>
							<option value="1990">1990</option>
							<option value="1989">1989</option>
							<option value="1988">1988</option>
							<option value="1987">1987</option>
							<option value="1986">1986</option>
							<option value="1985">1985</option>
							<option value="1984">1984</option>
							<option value="1983">1983</option>
							<option value="1982">1982</option>
							<option value="1981">1981</option>
							<option value="1980">1980</option>
							<option value="1979">1979</option>
							<option value="1978">1978</option>
							<option value="1977">1977</option>
							<option value="1976">1976</option>
							<option value="1975">1975</option>
							<option value="1974">1974</option>
							<option value="1973">1973</option>
							<option value="1972">1972</option>
							<option value="1971">1971</option>
							<option value="1970">1970</option>
							<option value="1969">1969</option>
							<option value="1968">1968</option>
							<option value="1967">1967</option>
							<option value="1966">1966</option>
							<option value="1965">1965</option>
							<option value="1964">1964</option>
							<option value="1963">1963</option>
							<option value="1962">1962</option>
							<option value="1961">1961</option>
							<option value="1960">1960</option>
							<option value="1959">1959</option>
							<option value="1958">1958</option>
							<option value="1957">1957</option>
							<option value="1956">1956</option>
							<option value="1955">1955</option>
							<option value="1954">1954</option>
							<option value="1953">1953</option>
							<option value="1952">1952</option>
							<option value="1951">1951</option>
							<option value="1950">1950</option>
							<option value="1949">1949</option>
							<option value="1948">1948</option>
							<option value="1947">1947</option>
							<option value="1946">1946</option>
							<option value="1945">1945</option>
							<option value="1944">1944</option>
							<option value="1943">1943</option>
							<option value="1942">1942</option>
							<option value="1941">1941</option>
							<option value="1940">1940</option>
							<option value="1939">1939</option>
							<option value="1938">1938</option>
							<option value="1937">1937</option>
							<option value="1936">1936</option>
							<option value="1935">1935</option>
							<option value="1934">1934</option>
							<option value="1933">1933</option>
							<option value="1932">1932</option>
							<option value="1931">1931</option>
							<option value="1930">1930</option>
							<option value="1929">1929</option>
							<option value="1928">1928</option>
							<option value="1927">1927</option>
							<option value="1926">1926</option>
							<option value="1925">1925</option>
							<option value="1924">1924</option>
							<option value="1923">1923</option>
							<option value="1922">1922</option>
							<option value="1921">1921</option>
							<option value="1920">1920</option>
							<option value="1919">1919</option>
							<option value="1918">1918</option>
							<option value="1917">1917</option>
							<option value="1916">1916</option>
							<option value="1915">1915</option>
							<option value="1914">1914</option>
							<option value="1913">1913</option>
							<option value="1912">1912</option>
							<option value="1911">1911</option>
							<option value="1910">1910</option>
							<option value="1909">1909</option>
							<option value="1908">1908</option>
							<option value="1907">1907</option>
							<option value="1906">1906</option>
							<option value="1905">1905</option>
							<option value="1904">1904</option>
							<option value="1903">1903</option>
							<option value="1902">1902</option>
							<option value="1901">1901</option>
						</select>
					</li>
				</ul>
			</div>
			<input type="submit" class="btn btn-submit" name="registrar" value="Registrarte">
		</div>
	</div>
</form>
</div>
</body>
</html>