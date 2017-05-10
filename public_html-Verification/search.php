<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ConcertPush - Buscar</title>
    </head>
    <body>
        <header>
            <div id="topbar">
                <div id="top-menu">
                    <div class="logo">
                        <a href="<?php echo $user_url; ?>" title="ConcertPush" class="logo-link">ConcertPush</a>
                    </div><div id="mobile-button-container">
                        <div class="mobile-menu-button" title="Abrir menú">
                            <span class="fa fa-bars"></span></div>
                    </div><form class="search-box" action="" method="GET">
                        <div id="inner-search-wrap">
                            <i class="fa fa-search search-icon"></i>
                            <input id="search-field" type="search" placeholder="Busca locales, músicos, géneros..." name="buscar"><button id="search-submit" type="button" name="buscar" value=""><span class="fa fa-search"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </header>
    </body>
</html>
