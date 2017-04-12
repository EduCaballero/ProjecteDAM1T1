<?php 
$imgsrc ="http://localhost/ProjecteDAM1T1/public_html/img/";
echo '
<div class="content-container">
	<div id="profileImg"><a href=""><img src="'.$imgsrc.$userData["imagen"].'" alt=""></a></div>
	<div id="profile-data">
		<h2>'.$userData["nombre"].'</h2>
		<ul id=profile-data-sub>
			<li>
				<span class="fa fa-lg fa-map-marker icon-profile"></span><span>'.getMunicipioById($userData["ciudad"]).'</span>
			</li>';
			if (isset($userData["telefono"])) {
				echo '
				<li>
					<span class="fa fa-lg fa-phone icon-profile"></span><span>'.$userData["telefono"].'</span>
				</li>';
			}
			echo '
			<li>
				<span class="fa fa-envelope icon-profile"></span><span>'.$userData["mail"].'</span>
			</li>';
			if (isset($userData["web"])) {
				$url = explode("://",$userData["web"],2);
				echo '
				<li>
					<span class="fa fa-link icon-profile"></span><a href="'.$userData["web"].'"><span>'.$url[1].'</span></a>
				</li>';
			}
		echo '
		</ul>
	</div>
</div>';
?>