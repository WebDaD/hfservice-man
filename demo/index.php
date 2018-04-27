
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="http://frontend.mmicode.de/css/app.css?8c997a1f42b7b0e6a8b5" rel="stylesheet"></head>

<body>
<!-- BEGIN ################################################################################################# -->

    <header>
        <nav class="navbar navbar-blue-dark no-border-radius no-shadow xs-height75 navbar-static-top " id="main_navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
    
                    <!-- large devices -->
                    <a class="navbar-brand large-device" href="#">
                        <img src=http://frontend.mmicode.de/img/logo-messe-muenchen.png srcset="http://frontend.mmicode.de/img/logo-messe-muenchen.png 1x, http://frontend.mmicode.de/img/logo-messe-muenchen@2x.png 2x" class="nav-logo" alt="The alternative Image Text">
                        <!-- @david do not include this -->
                        <div class="hiddenforwebpackexport">
                            <img src=http://frontend.mmicode.de/img/logo-messe-muenchen@2x.png>
                        </div>
                        <!-- do not include end -->
                    </a>
    
                    <div class="header-meta large-device">
                        <ul class="meta-navigation">
                            <li><a href="#"><i class="mmi mmi-globe" aria-hidden="true"></i> English</a></li>
                            <li><a href="#"><i class="mmi mmi-envelope" aria-hidden="true"></i> Kontakt</a></li>
                            <!-- search item -->
                            <li class="large-device">
                                <div class="nav-search-box large-device">
                                  <form action="index.php?messe=search" method="POST">
                                    <input type="text" id="nav-search" class="search-autocomplete searchInput" placeholder="Suche"  name="nav-search">
                                    <button id="search-submit" class="quick-search-submit" type="submit" name="quick-search"><i class="mmi mmi-magnifier" aria-hidden="true"></i></button>
                                  </form>
                                </div>
                            </li>
                        </ul>
                    </div>
    
    
                    <!-- smaller devices -->
                    <a class="brand-mobile small-device" href="#">
                        <img src=http://frontend.mmicode.de/img/logo-messe-muenchen-mobile.png srcset="http://frontend.mmicode.de/img/logo-messe-muenchen-mobile.png 1x, http://frontend.mmicode.de/img/logo-messe-muenchen-mobile@2x.png 2x" class="nav-logo" alt="The alternative Image Text">
                        <!-- @david do not include this -->
                        <div class="hiddenforwebpackexport">
                            <img src=http://frontend.mmicode.de/img/logo-messe-muenchen-mobile@2x.png>
                        </div>
                        <!-- do not include end -->
                    </a>
                    <ul class="meta-mobile small-device pull-right">
                        <li><a href="#"><i class="mmi mmi-globe" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="mmi mmi-magnifier" aria-hidden="true"></i></a></li>
                    </ul>
    
    
    
                    <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#navbar-brand_size_lg">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        Menü
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbar-brand_size_lg">
                        <ul class="nav navbar-nav navbar-left">
                            <!-- menu item #1 -->
                            <li class="dropdown-full ">
                                <a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">Unternehmen</a>
                                <div class="dropdown-menu">
    
    
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">
    
                                                <h4>Messe München Locations</h4>
                                                <ul>
                                                    <li><a href="#">Messe München</a></li>
                                                    <li><a href="#">ICM - Internationales Congress Center München</a></li>
                                                    <li><a href="#">MOC Veranstaltungscenter München</a></li>
                                                </ul>
    
                                                <h4>Weitere Standorte</h4>
                                                <ul>
                                                    <li><a href="#">Bauzentrum Poing</a></li>
                                                    <li><a href="#">MOC Ordercenter</a></li>
                                                    <li><a href="#">International</a></li>
                                                </ul>
    
                                            </div>
                                            <div class="col-md-3">
                                                <h4>Leistungen für Veranstalter</h4>
                                                <ul>
                                                    <li><a href="#">Leistungsportfolio</a></li>
                                                    <li><a href="#">Lorem Ipsum</a></li>
                                                    <li><a href="#">Dolor</a></li>
                                                    <li><a href="#">Sit Amet</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h4>Referenzen</h4>
                                                <ul>
                                                    <li><a href="#">...</a></li>
                                                </ul>
    
                                                <h4>Unser Sales Team</h4>
                                                <ul>
                                                    <li><a href="#">...</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <figure>
                                                    <img src=http://frontend.mmicode.de/img/285x180.png class="img-responsive" alt="The alternative Image Text">
                                                    <figcaption><strong>Ab Herbst 2018</strong><br>Neue Hallen C5/C6 mit Konferenzbereich</figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
    
    
                                    <div class="btn-flyout-close text-center">
                                        <div class="triangle"></div>
                                    </div>
    
                                </div>
                            </li>
    
                            <!-- menu item #2 -->
                            <li class="dropdown-full ">
                                <a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">Locations</a>
                                <div class="dropdown-menu">
    
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">Locations col 1</div>
                                            <div class="col-md-3">col 2</div>
                                            <div class="col-md-3">col 3</div>
                                            <div class="col-md-3">
                                                <figure>
                                                    <img src=http://frontend.mmicode.de/img/285x180.png class="img-responsive" alt="The alternative Image Text">
                                                    <figcaption><strong>Ab Herbst 2018</strong><br>noch mehr Neues</figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
    
    
                                    <div class="btn-flyout-close text-center">
                                        <div class="triangle"></div>
                                    </div>
    
    
                                </div>
                            </li>
    
                            <!-- menu item #3 -->
                            <li class="dropdown-full ">
                                <a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">Karriere</a>
                                <div class="dropdown-menu">
    
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">Karriere col 1</div>
                                            <div class="col-md-3">col 2</div>
                                            <div class="col-md-3">col 3</div>
                                            <div class="col-md-3">
                                                <figure>
                                                    <img src=http://frontend.mmicode.de/img/285x180.png class="img-responsive" alt="The alternative Image Text">
                                                    <figcaption><strong>Ab Herbst 2018</strong><br>TBD</figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="btn-flyout-close text-center">
                                        <div class="triangle"></div>
                                    </div>
    
                                </div>
                            </li>
    
                            <!-- menu item #4 -->
                            <li class="dropdown-full ">
                                <a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">Presse</a>
                                <div class="dropdown-menu">
    
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">Presse col 1</div>
                                            <div class="col-md-3">col 2</div>
                                            <div class="col-md-3">col 3</div>
                                            <div class="col-md-3">
                                                <figure>
                                                    <img src=http://frontend.mmicode.de/img/285x180.png class="img-responsive" alt="The alternative Image Text">
                                                    <figcaption><strong>Ab Herbst 2018</strong><br>TBD</figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="btn-flyout-close text-center">
                                        <div class="triangle"></div>
                                    </div>
    
                                </div>
                            </li>
    
    
                            <!-- menu item #5 -->
                            <li class="dropdown-full ">
                                <a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">Magazin</a>
                                <div class="dropdown-menu">
    
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">Presse col 1</div>
                                            <div class="col-md-3">col 2</div>
                                            <div class="col-md-3">col 3</div>
                                            <div class="col-md-3">
                                                <figure>
                                                    <img src=http://frontend.mmicode.de/img/285x180.png class="img-responsive" alt="The alternative Image Text">
                                                    <figcaption><strong>Ab Herbst 2018</strong><br>TBD</figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="btn-flyout-close text-center">
                                        <div class="triangle"></div>
                                    </div>
    
                                </div>
                            </li>
    
    
    
                        </ul>
    
                        <div class="mobile-contact-nav">
                            <ul>
                                <li><a href="#"><i class="mmi mmi-envelope" aria-hidden="true"></i> Kontakt</a></li>
                                <li><a href="#"><i class="mmi mmi-calendar" aria-hidden="true"></i> Messekalender</a></li>
                            </ul>
                        </div>
    
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="mood-header broadcasting-header" style="background-image:url(http://frontend.mmicode.de/img/1170x578-drohnea_section_slider_image_1600.jpg);">
    <!-- use class mood-header-large for 600px high header -->
        <!-- ignore this @susi & david - only for webpack export! -->
        <div class="hiddenforwebpackexport"><img src=http://frontend.mmicode.de/img/1170x578-drohnea_section_slider_image_1600.jpg></div>
        <!-- ignore this end -->
        <div class="flexy">
            <div class="flex-content">
                <h1>Hörfunk- und TV-Service</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                </p>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="breadcrumb-navigation">
            <ul class="breadcrumb">
                <li><a href="CW-1002_hoerfunkservice_start.html">Hörfunk- und TV-Service</a></li>
            </ul>
        </div>

        <div id="fs-unique-content-section">
            <h1>Vom O-Ton-Paket bis zum fertigen Beitrag</h1>
            <div class="row no-padding-outside">
                <div class="broadcasting">
                    <div class="row">
                        <div class="col-md-8 broadcasting-start">
                        <?php
                          if(!empty($_GET['messe']) && is_string($_GET['messe'])) {
                            if($_GET["messe"] == "search") {
                              include("../search.php");
                            } elseif($_GET["messe"] == "all") {
                                $_GET['type'] = "grid";
                                $_GET['max'] = "-1";
                                include("../navbar.php");
                            } else {
                              include("../messe.php");
                            }
                          } else {
                            include 'main.php';
                          }
                        ?>

                        </div>
                        <div class="col-md-4">

                            <div class="sidebar-section">
                                <?php 
                                    if(!empty($_GET['messe']) && is_string($_GET['messe'])) {
                                        if($_GET["messe"] != "search" && $_GET["messe"] != "all") {
                                            include("../sidebar.php");
                                        }
                                    }
                                ?>
                                    <div class="sidebar-block">
                                        <h4>Kontaktieren Sie uns!</h4>
                                        <h5>Ihr Kontakt zu unserem Presseteam</h5>
                                        <ul>
    
                                            <li class="person">
                                                Christine Heufer<br>
                                                Broadcast Media Manager
                                            </li>
    
                                            <li class="address">
                                                <table>
                                                        <tr>
                                                            <td>
                                                                Tel.
                                                            </td>
                                                            <td>
                                                                +49 89 949-20762
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Fax
                                                            </td>
                                                            <td>
                                                                +49 89 949-9720762
                                                            </td>
                                                        </tr>
                                                </table>
                                            </li>
                                            <li class="email"><a href="Christine.Heufer@messe-muenchen.de">E-Mail schreiben</a></li>
                                        </ul>
                                        <ul class="extra-margin-top">
    
                                            <li class="person">
                                                Bettina Schenk<br>
                                                Broadcast Media Manager
                                            </li>
    
                                            <li class="address">
                                                <table>
                                                        <tr>
                                                            <td>
                                                                Tel.
                                                            </td>
                                                            <td>
                                                                +49 89 949-21475
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Fax
                                                            </td>
                                                            <td>
                                                                +49 89 949-9721475
                                                            </td>
                                                        </tr>
                                                </table>
                                            </li>
                                            <li class="email"><a href="Bettina.Schenk@messe-muenchen.de">E-Mail schreiben</a></li>
                                        </ul>
    
                                    </div>

                                    <div class="sidebar-block">
                                        <h4>Kontakt Hörfunkstudio</h4>
                                        <h5>Während der Öffnungszeiten des Pressezentrums West</h5>
                                        <ul>
    
                                            <li class="person">
                                                Gabriel und Susanne Wirth
                                            </li>
    
                                            <li class="address">
                                                <table>
                                                        <tr>
                                                            <td>
                                                                Tel.
                                                            </td>
                                                            <td>
                                                                +49 89 949-27000
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Technik
                                                            </td>
                                                            <td>
                                                                <a href="#">NewWayMedia</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Fax
                                                            </td>
                                                            <td>
                                                                +49 89 949-27002
                                                            </td>
                                                        </tr>
                                                </table>
                                            </li>
                                        </ul>
    
                                    </div>

                                <div class="sidebar-block">
                                        <h4>Downloadbereich</h4>
                                        <div class="broadcasting-sidebar-downloads">
                                            <a href="CW-1002_hoerfunkservice_messen.html"><img src=http://frontend.mmicode.de/img/82x40.png alt="The alternative Image Text"></a>
                                            <a href="CW-1002_hoerfunkservice_messen.html"><img src=http://frontend.mmicode.de/img/82x40.png alt="The alternative Image Text"></a>
                                            <a href="CW-1002_hoerfunkservice_messen.html"><img src=http://frontend.mmicode.de/img/82x40.png alt="The alternative Image Text"></a>
                                            <a href="CW-1002_hoerfunkservice_messen.html"><img src=http://frontend.mmicode.de/img/82x40.png alt="The alternative Image Text"></a>
                                            <a href="CW-1002_hoerfunkservice_messen.html"><img src=http://frontend.mmicode.de/img/82x40.png alt="The alternative Image Text"></a>
                                            <div class="clb"></div>
                                        </div>
                                    </div>

                                <div class="sidebar-block">
                                    <a href="all" class="btn btn-default btn-lg"><i class="mmi mmi-chevron-right" aria-hidden="true"></i>  
                                    Alle Messen anzeigen</a>
                                </div>

                            </div>
                
                        </div>
                    </div>
                </div>

                <div class="social-sharing">
                    <div class="shariff" data-lang="de" data-theme="white" data-services="[&quot;facebook&quot;,&quot;linkedin&quot;,&quot;xing&quot;,&quot;twitter&quot;]"></div>
                </div>






                <div class="teaser-locations">

                    <h2>Kommende Veranstaltungen</h2>
                    <?php
                      $_GET['type'] = "stripe";
                      $_GET['max'] = "3";
                      include("../navbar.php");
                    ?>
                </div>


            </div>
        </div>

    </div>

    <footer>
        <div class="graybar">
            <div class="container">
                <div class="col-md-12">
                    <h4>Folgen Sie uns auf:</h4>
                    <a href="#" target="_blank" class="footer-icon">
                        <i class="mmi mmi-facebook" aria-hidden="true"></i>
                        <span class="title">Facebook</span>
                    </a>
                    <a href="#" target="_blank" class="footer-icon">
                        <i class="mmi mmi-youtube" aria-hidden="true"></i>
                        <span class="title">Twitter</span>
                    </a>
                    <a href="#" target="_blank" class="footer-icon">
                        <i class="mmi mmi-instagram" aria-hidden="true"></i>
                        <span class="title">Instagram</span>
                    </a>

                </div>

            </div>
        </div>
        <div class="sitemap-footer">
            <div class="container">

                <div class="row">
                    <div class="col-md-3">
                        <h4>Veranstaltungen</h4>
                        <a href="#">Subnavigation 1</a>
                        <a href="#">Subnavigation 2 mit total langem Anchortext... eigentlich viel zu lang aber evlt. nötig.</a>
                        <a href="#">Subnavigation 3</a>
                        <a href="#">Subnavigation n</a>
                    </div>
                    <div class="col-md-3">
                        <h4>Locations</h4>
                        <a href="#">Subnavigation 1</a>
                        <a href="#">Subnavigation 2</a>
                        <a href="#">Subnavigation 3</a>
                        <a href="#">Subnavigation n</a>
                    </div>
                    <div class="col-md-3">
                        <h4>Unternehmen</h4>
                        <a href="#">Subnavigation 1</a>
                        <a href="#">Subnavigation 2</a>
                        <a href="#">Subnavigation 3</a>
                        <a href="#">Subnavigation n</a>
                    </div>
                    <div class="col-md-3">
                        <h4>Karriere</h4>
                        <a href="#">Subnavigation 1</a>
                        <a href="#">Subnavigation 2</a>
                        <a href="#">Subnavigation 3</a>
                        <a href="#">Subnavigation n</a>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-3">
                        <h4>Presse</h4>
                        <a href="#">Subnavigation 1</a>
                        <a href="#">Subnavigation 2</a>
                        <a href="#">Subnavigation 3</a>
                        <a href="#">Subnavigation 4</a>
                    </div>
                    <div class="col-md-3">
                        <h4>Anreise</h4>
                        <a href="#">Subnavigation 1</a>
                        <a href="#">Subnavigation 2</a>
                    </div>
                    <div class="col-md-3">
                        <h4>Aufenthalte</h4>
                        <a href="#">Subnavigation 1</a>
                        <a href="#">Subnavigation 2</a>
                        <a href="#">Subnavigation 3</a>
                    </div>
                    <div class="col-md-3">
                        <h4>International</h4>
                        <a href="#">Subnavigation 1</a>
                        <a href="#">Subnavigation 2</a>
                    </div>
                </div>



            </div>
        </div>
        <div class="meta-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="meta-footer-nav">
                            <li><a href="#">Impressum</a></li>
                            <li><a href="#">Datenschutz</a></li>
                            <li><a href="#">AGB der Messe München GmbH</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 text-right">
                        &copy; Messe München 2017
                    </div>
                </div>
            </div>
        </div>
    </footer>

<!-- back-to-top-button kurz vor /body positionieren -->
    <div id="back-to-top" title="zum Seitenanfang"><div></div></div>
<!-- back-to-top-button end -->

<!-- END ################################################################################################### -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="http://frontend.mmicode.de/app.bundle.js?8c997a1f42b7b0e6a8b5"></script></body>

</html>
