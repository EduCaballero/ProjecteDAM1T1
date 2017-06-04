<!DOCTYPE html>
<?php
require_once 'bbdd.php';
session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ConcertPush - Index</title>
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Open+Sans|Roboto" rel="stylesheet"> 
        <script src="js/src/jquery-3.1.1.min.js"></script>
        <script src="js/src/mobile.js"></script>
        <script src="js/src/modal.js"></script>
        <script src="js/src/index.js"></script>
    </head>
    <body>
        <?php
        if (isset($_SESSION["id"])) {
            ?>
            <header>
                <nav id="mobile-menu" class="mobile-menu">
                    <div class="mobile-menu-top">ConcertPush</div>
                    <ul>
                        <li class="mobile-menu-item"><a class="mobile-menu-link" href="signin.php"><span class="fa fa-user"></span>Iniciar sesión</a></li>
                        <li class="mobile-menu-item"><a class="mobile-menu-link" href="signup.php"><span class="fa fa-pencil-square"></span>Regístrate</a></li>
                    </ul>
                    <ul>
                        <li class="mobile-menu-item"><a class="mobile-menu-link" href="#"><span class="fa fa-language"></span>Castellano</a></li>
                        <li class="mobile-menu-item"><a class="mobile-menu-link" href="#"><span class="fa fa-language"></span>Catalan</a></li>
                        <li class="mobile-menu-item"><a class="mobile-menu-link" href="#"><span class="fa fa-language"></span>Euskera</a></li>
                        <li class="mobile-menu-item"><a class="mobile-menu-link" href="#"><span class="fa fa-language"></span>Gallego</a></li>
                    </ul>
                </nav>
                <div id="overlay"></div>
                <div id="topbar">
                    <div class="logo">
                        <a href="index.php" title="ConcertPush" class="logo-link">ConcertPush</a>
                    </div><div id="mobile-button-container">
                        <div class="mobile-menu-button" title="Abrir menú">
                            <span class="fa fa-bars"></span>
                        </div>
                    </div><div class="mobile-title"><h1>ConcertPush</h1></div>
                    <nav id="user-menu">
                        <div class="dropdown">
                            <a class="dropdown-top" href="#">IDIOMA<span class="fa fa-caret-down"></span></a>
                            <ul class="dropdown-sub">
                                <li class="dropdown-sub-item"><a href="#">CASTELLANO</a></li>
                                <li class="dropdown-sub-item"><a href="#">CATALAN</a></li>
                                <li class="dropdown-sub-item"><a href="#">EUSKERA</a></li>
                                <li class="dropdown-sub-item"><a href="#">GALLEGO</a></li>
                            </ul>
                        </div><div class="signin-signup">
                            <ul>
                                <li class="user-menu-item"><div id="signin" class="user-menu-link">INICIAR SESIÓN</div></li><li class="user-menu-item"><a href="signup.php" class="user-menu-link">REGÍSTRATE</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <?php } else{require_once 'includes/header-intranet.php';
            }
            require_once 'includes/modal-login.php';
            ?>
            <div id="slider">
                <div id="slider-content">
                    <h1>ConcertPush</h1>
                    <h6>Aviso legal</h6>
                </div>
            </div>
            <div class="main-container">
                <div><h3>Términos y condiciones</h3>
                    <p>Como usuario de ElOtroLado.net debes proceder a la lectura del siguiente aviso legal. El acceso y navegación por ElOtroLado.net y/o el uso de los servicios ofrecidos en este sitio supone la aceptación expresa de lo recogido en este texto, en caso de no aceptarlo por favor abandona ElOtroLado.net inmediatamente.</p>
                    <h4>Información legal</h4>
                    <p>ElOtroLado.net es un servicio de alojamiento o almacenamiento de datos que facilita enlaces a contenidos o instrumentos de búsqueda propiedad de New EOL, S.L., cuya única función es prestar un servicio de intermediación según lo dispuesto en la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico y 56/2007. En conformidad con el Art.10 de dicha ley se informa de los siguientes datos para establecer una comunicación directa y efectiva: </p>
                    <p>Correo electrónico: info[arroba]elotrolado[punto]net
                        Dirección de contacto: New EOL, S.L. C/ Buenavista 116A, 3-10. 46520 Sagunto (España)
                        Inscrita en el Registro Mercantil de Valencia. Tomo 9571, libro 6853, folio 190, inscripción 1 con hoja V-151951.
                        CIF: B98499908</p>
                    <p>Dado el caracter de ElOtroLado.net de mero servicio de intermediación sus gestores no garantizan la licitud, fiabilidad, exactitud, exhaustividad, actualidad y utilidad de los contenidos o enlaces ni, según lo establecido en los Art.16 y Art.17 de la mencionada Ley, aceptan responsabilidad alguna por dichos contenidos o enlaces, siendo los únicos responsables los usuarios o terceros de quienes procedan. Asímismo, el establecimiento de un enlace o la existencia de un contenido no implica la existencia de relaciones entre los gestores de ElOtroLado.net y el propietario del lugar web con el que se establezca o el autor de dicho contenido, ni su conocimiento, aceptación o aprobación. Tampoco nos hacemos responsables de aquellos otros sitios web u archivos a los que sea posible acceder a través de enlaces de hipertexto (links) disponibles entre los contenidos, dado que dichas páginas enlazadas serán en todo caso suministradas por los propios usuarios de la web, y son responsabilidad de sus respectivos titulares. Esta página, por tanto, ni aprueba, ni hace suyos los productos, servicios, contenidos, información, datos, archivos y cualquier clase de material existente en tales páginas web, y no controla ni se hace responsable de la calidad, licitud, fiabilidad y utilidad de la información, contenidos y servicios existentes en los sitios enlazados y que son ajenos a esta página. </p>
                    <p>En el caso de que se estime oportuno o de que un órgano competente declare la ilicitud de los datos, ordenando su retirada o que se imposibilite el acceso a los mismos, o se hubiera declarado la existencia de la lesión, y se nos haya notificado expresamente la correspondiente resolución, los enlaces que se indiquen serán inmediatamente retirados. </p>
                    <p>Dicho lo anterior, debemos aclarar que los gestores de ElOtroLado.net se muestran en una postura del todo contraria a cualquier acto antijurídico y no aceptan ni toleran que el servicio sea empleado para la comisión de actos ilícitos de ningún tipo. Si, a pesar de los esfuerzos de la administración y los usuarios que colaboran activamente para el correcto funcionamiento del servicio, detectas algún contenido o enlace ilícito o que lesiona bienes o derechos de un tercero por favor ponte en contacto con los gestores de ElOtroLado.net para su evaluación y retirada en caso de que proceda. Rogamos que en dicho caso se indique toda la información necesaria, incluyendo los datos indentificativos del remitente y/o tercero lesionado, así como la legislación vulnerada y la dirección exacta del contenido o enlace en cuestión. Avisamos sin embargo que ante reportes erróneos malintencionados o intentos de coacción los gestores se reservan el derecho de hacer pública toda o parte de la comunicación y tomar cualquier otra acción que consideren oportuna. </p>
                    <p>Finalmente se recuerda que, tanto este aviso legal como los servicios de ElOtroLado.net, se encuentran sometidos a la legislación española vigente, informando que ante cualquier tipo de controversia las partes se someterán a los Tribunales y Juzgados competentes de la ciudad de Valencia, siempre que la Ley lo permita.</p>
                    <h4>Condiciones de uso</h4>
                    <p>Queda prohibido el acceso y uso de ElOtroLado.net a los menores de edad que no cuenten con el permiso de sus padres o tutores, recordando a éstos que será de su exclusiva responsabilidad determinar qué servicios y/o contenidos son apropiados o no para la edad de los menores a su cargo. </p>
                    <p>El usuario acepta usar los servicios de ElOtroLado.net de forma consciente y libre, con intenciones lícitas y de buena fe. Siendo el único responsable de tus actos, exonerando de toda responsabilidad por los mismos a los gestores o colaboradores de ElOtroLado.net del incorrecto uso de los contenidos o del daño que pudiera sufrir tu equipo, componentes, etc. Además prometes no emplear los contenidos aquí alojados con fines contrarios a la ley y respetar la integridad de los servicios ofrecidos. Se recuerda al usuario que la ley se aplica igual dentro y fuera de la red, siendo totalmente responsable de tus actos. </p>
                    <p>ElOtroLado.net no facilita ningún medio para la realización u obtención de copias ilegales, cualquier uso contrario a los previstos en los Art.31.2 (copia privada) o 100.2 (copia de seguridad) del RD 1/1996, de 12 de abril, por el que se aprueba el Texto Refundido de la Ley de Propiedad Intelectual, no está contemplado. Si lo que buscas es soporte para el uso de copias ilegales este no es tu sitio. </p>
                    <p>El usuario se abstendrá de escribir o enlazar cualquier contenido difamatorio, injurioso, obsceno, pornográfico, de violencia explícita, amenazador, xenófobo, que incite a la violencia o la discriminación por razón de raza, sexo, ideología, religión o que de cualquier forma atente contra la moral, el orden público, los derechos fundamentales, las libertades públicas, el honor, la intimidad o la imagen de terceros y, en general, la normativa vigente; o que pueda dañar, inutilizar, sobrecargar, deteriorar o impedir la normal utilización de los servicios, los equipos informáticos o los documentos, archivos y cualquier contenido almacenado en ElOtroLado.net o servidores externos enlazados desde ElOtroLado.net. Asímismo debes abstenerte de acosar, amenazar y obtener sin consentimiento o divulgar información privada de otros usuarios. </p>
                    <p>El usuario se abstendrá de crear múltiples cuentas con el fin de promocionar contenidos, simular discusiones, suplantar la identidad de otras personas, saltarse sanciones o intentar alterar de cualquier forma el buen funcionamiento de ElOtroLado.net. Igualmente debes abstenerte de utilizar los servicios con el objetivo de promocionar sitios web, empresas, servicios externos, campañas comerciales, políticas, ideolgías, etc. </p>
                    <p>El usuario se compromete a utilizar títulos que reflejen el contenido, a categorizarlo correctamente y a buscar previamente la existencia de contenido similar para evitar la duplicidad de contenidos. </p>
                    <p>El usuario acepta que, de no indicar lo contrario, los contenidos que publique se acogen a la licencia de contenidos utilizada y recomendada por ElOtroLado.net. </p>
                    <p>El usuario promete respetar tanto este aviso legal como cualquier otro aviso que en el interior de esta web exista, así como las normas impuestas por los administradores o moderadores de ElOtroLado.net y las decisiones que estos tomen. El incumplimiento de las condiciones de uso podrá significar el borrado y/o edición del contenido, el bloqueo de la cuenta de usuario y/o dominio o dirección IP, la limitación de acceso a parte o todos los servicios ofrecidos y las medidas o denuncias adecuadas según la legislación española e internacional. </p>
                    <p>Con el objetivo de mejorar el servicio, los gestores de ElOtroLado.net se reservan el derecho a modificar y actualizar estas condiciones de uso sin previo aviso.</p>
                    <h4>Política de protección de datos y privacidad</h4>
                    <p>Para la utilización de los servicios de ElOtroLado.net no se requiere la facilitación de datos identificativos, sin embargo para el correcto funcionamiento de algunos de ellos es necesaria una dirección de correo electrónico válida y el almacenamiento de la dirección IP del usuario, cuyo proveedor de acceso podría utilizar para identificarlo. Asimismo, dada la naturaleza de los servicios el usuario de forma opcional y voluntaria puede publicar todo tipo de datos propios de carácter personal a los que otros usuarios tendrán acceso. </p>
                    <p>El usuario será el único responsable de los datos de acceso e identificación facilitados, así como de las acciones, mensajes, comunicaciones, declaraciones o enlaces realizados o enviados desde su cuenta. </p>
                    <p>ElOtrolado.net no será responsable de los contenidos ni datos proporcionados por los usuarios eximiéndose de toda responsabilidad por acciones, demandas y/o reclamaciones que pudieran ejercitarse contra ElOtrolado.net con relación a dichos contenidos y datos, al no disponer de medios para asegurar la identidad de los usuarios registrados ni la veracidad de los datos e informaciones facilitadas. </p>
                    <p>De conformidad con lo establecido en la Ley Orgánica 15/1999 de 13 de diciembre, de Protección de Datos de Carácter Personal, se informa a los usuarios de la existencia de un fichero automátizado titularidad de New EOL, S.L. en el cual se incluyen los datos de carácter privado necesarios para el funcionamiento del servicio. Mediante la aceptación del presente aviso legal y/o los diferentes formularios, el usuario manifiesta su consentimiento para el tratamiento y cesión de sus datos de carácter personal y el envío de comunicaciones comerciales. Este fichero se encuentra debidamente inscrito en el Registro General de Protección de Datos de la Agencia Española de Protección de Datos. </p>
                    <p>Se informa además que el titular de los datos podrá ejercitar los derechos reconocidos en la LOPD sobre este fichero y, en particular, los de acceso, rectificación o cancelación de datos y oposición, si resultara pertinente, así como el de revocación del consentimiento para la cesión de sus datos en los términos previstos en la LOPD. El servicio permite a los usuarios registrados activos que ellos mismos editen sus propios datos, pero también puede solicitarse por escrito acompañando una fotocopia del D.N.I. o documento equivalente. </p>
                    <p>Advertimos sin embargo que los contenidos aportados voluntariamente por los usuarios que no incluyan datos personales o de carácter privado podrán ser conservados con el objeto de mantener la coherencia con el resto de contenidos y del funcionamiento del servicio. </p>
                    <h4>Política de cookies</h4>
                    <p>Las cookies son pequeños ficheros que se descargan en tu equipo a través del navegador para almacenar información y recuperarla en posteriores visitas. En ElOtroLado.net utilizamos cookies propias para recordar tus preferencias y mostrarte contenidos personalizados y cookies analíticas para obtener estadísticas sobre el comportamiento conjunto de los usuarios. Adicionalmente, las empresas que gestionan nuestra publicidad utilizan cookies para generar su propia analítica y optimizar los anuncios que te mostramos. </p>
                    <p>Si no deseas permitir el uso de cookies debes desactivarlas y borrarlas desde tu navegador. Este ajuste se encuentra habitualmente en el menú de "opciones" o "preferencias", por ejemplo: Chrome, Explorer, Firefox y Safari.</p>
                </div>
            </div>
            <footer class="footer">
    <?php require_once 'includes/footer.php'; ?>
        </footer>
    </div>
</body>
</html>