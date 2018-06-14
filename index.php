
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="http://www.messe-muenchen.de/favicon.ico">
    <title>Messe München Hörfunkservice | Messe München</title>
    <!-- Latest compiled and minified CSS -->
  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="app_hoerfunk.css" rel="stylesheet">
</head>

<body>
<!-- BEGIN ################################################################################################# -->






    <header>
        <nav class="navbar navbar-blue-dark no-border-radius no-shadow xs-height75 navbar-static-top " id="main_navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">

                        <!-- large devices -->
                            <a class="navbar-brand large-device" href="https://www.messe-muenchen.de/de/" title="
Messe München">
					<img src="https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-small.png" srcset="https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-small.png 1x, https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-big.png 2x" class="nav-logo" alt="
Messe München">
				</a>
        
                        <div class="header-meta large-device" style="height:3.4rem;"></div>
        
        
                        <!-- smaller devices -->
                      <a class="brand-mobile small-device" href="https://www.messe-muenchen.de/de/" title="
Messe München">
	                <img src="https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-mobile-small.png" srcset="https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-mobile-small.png 1x, https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-mobile-big.png 2x" class="nav-logo" alt="
Messe München"></a>
        
        
        
                        <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#navbar-brand_size_lg">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            Menü
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbar-brand_size_lg">
                            <ul class="nav navbar-nav navbar-left navbar-broadcasting">
                                <!-- menu item #1 -->
                                <li class="dropdown-full ">
                                    <a href="index.php" class="dropdown-toggle navlink-broadcasting">Hörfunk-Service</a>
                                </li>
        
                                <!-- menu item #2 -->
                                <li class="dropdown-full ">
                                    <a href="all" class="dropdown-toggle navlink-broadcasting">Veranstaltungen</a>
                                </li>
        
                                <!-- menu item #3 -->
                                <li class="dropdown-full ">
                                    <a href="https://videos.messe-muenchen.de" class="dropdown-toggle link-external" target="_blank">Mediathek</a>
                                </li>
        
                                <!-- menu item #3 -->
                                <li class="dropdown-full ">
                                    <a href="https://messe-muenchen.de" class="dropdown-toggle link-external" target="_blank">Messe München</a>
                                </li>
    
                            </ul>
                        <div class="mobile-contact-nav">
                            <ul>
                                <li><a href="https://www.messe-muenchen.de/de/meta/kontakt/index.php/kontakt/"><i class="mmi mmi-envelope" aria-hidden="true"></i> Kontakt</a></li>
                                <li><a href="https://www.messe-muenchen.de/de/technisches/veranstaltungen/index.php/veranstaltungen/kalender/"><i class="mmi mmi-calendar" aria-hidden="true"></i> Veranstaltungen</a></li>
                            </ul>
                        </div>
    
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
      <div class="mood-header broadcasting-header" style="background-image:url(media/MM18_CW_hoerfunk_Header_1600x600.jpg);">
    <!-- use class mood-header-large for 600px high header -->
        <!-- ignore this @susi & david - only for webpack export! -->
        <div class="hiddenforwebpackexport"><img src=media/MM18_CW_hoerfunk_Header_1600x600.jpg></div>
        <!-- ignore this end -->
     
    
        <div class="flexy">
            <div class="flex-content">
               <h1>
			<?php
				if(!empty($_GET['messe']) && is_string($_GET['messe'])) {       
					if($_GET["messe"] == "search") {
                		echo "Suche";
                	} elseif($_GET["messe"] == "all") {
                    	echo "Unsere Veranstaltungen";
                	} else {
                        include("messe-name.php");
                    }
                } else {
                    echo "Hörfunk-Service";
				}
			?>
		</h1>
                
            </div>
        </div>
    </div>

  
   
	
	<div class="container">
		<div class="breadcrumb-navigation">
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Hörfunk-Service</a>
				</li>
				<?php
				if(!empty($_GET['messe']) && is_string($_GET['messe'])) {       
					if($_GET["messe"] == "search") {
						echo "<li><a href=\"search\">Suche</a></li>";
                	} elseif($_GET["messe"] == "all") {
                    	echo "<li><a href=\"all\">Unsere Veranstaltungen</a></li>";
                	} else {
						echo "<li><a href=\"".$_GET["messe"]."\">";
						include("messe-name.php");
						echo "</a></li>";
                    }
                } else {
                    echo "";
				}
			?>


			</ul>
		<!--	<script type="application/ld+json">
				{
					"@context": "http://schema.org",
					"@type": "BreadcrumbList",
					"itemListElement": [{
								"@type": "ListItem",
								"position": 1,
								"item": {
									"@id": "http://messeradio-muenchen.de/index.php",
									"name": "Hörfunk-Service"
								}
							},
							{
								"@type": "ListItem",
								"position": 2,
								"item": {
									"@id": "http://messeradio-muenchen.de/all",
									"name": "Unsere Veranstaltungen"
								}
			</script> -->
	
	</div>
		
            </div>
        
  

    <div class="container">

        

        <div id="fs-unique-content-section">
            <h1>O-Ton-Pakete für Ihre Berichterstattung</h1>
            <div class="row no-padding-outside">
                <div class="broadcasting">
                    <div class="row">
                        <div class="col-md-8 broadcasting-start">
                        <?php
                          if(!empty($_GET['messe']) && is_string($_GET['messe'])) {
                          
                          
                  if($_GET["messe"] == "search") {
                              include("search.php");
                            } elseif($_GET["messe"] == "all") {
                                include("alle.php");
                            } else {
                              include("messe.php");
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
                                            include("sidebar.php");
                                        } else {
											?>

<!-- ********************Alle Messen******************** -->
                              <div class="sidebar-block">
                                       
                                        <h4>Kontaktieren Sie uns!</h4>
                                        <h5>Ihr Kontakt zu unserem Presseteam</h5>
                                        <ul>
                                            <li class="portrait">
                                                <figure>
                                                    <img src="media/Christine_Heufer_section_contacts_150x180.jpg" srcset="media/Christine_Heufer_section_contacts_150x180.jpg" alt="Christine Heufer">
                
                                                    <!-- ignore this @susi & david - only for webpack export! -->
                                                    <div class="hiddenforwebpackexport"><img src="media/Christine_Heufer_section_contacts_150x180.jpg" alt="Christine Heufer"></div>
                                                    <!-- ignore this end -->
                                                </figure>
                                            </li>
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
                                            <li class="email"><a href="mailto:Christine.Heufer@messe-muenchen.de">E-Mail schreiben</a></li>
                                        </ul>
                                        <ul class="extra-margin-top">
                                            <li class="portrait">
                                                <figure>
                                                    <img src="media/Bettina_Schenk_section_contacts_150x180.jpg" srcset="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Bettina Schenk">
                
                                                    <!-- ignore this @susi & david - only for webpack export! -->
                                                    <div class="hiddenforwebpackexport"><img src="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Bettina Schenk"></div>
                                                    <!-- ignore this end -->
                                                </figure>
                                            </li>
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
                                            <li class="email"><a href="mailto:Bettina.Schenk@messe-muenchen.de">E-Mail schreiben</a></li>
                                        </ul>

                                </div>

                             
                

                    </div>
                </div>
                           
                
                  
                                    
                                    
											<?php
										}
                                    } else {
										?>
 

<!-- ********************Startseite******************** -->

<div class="sidebar-block">
                                       
                                        <h4>Kontaktieren Sie uns!</h4>
                                        <h5>Ihr Kontakt zu unserem Presseteam</h5>
                                        <ul>
                                            <li class="portrait">
                                                <figure>
                                                    <img src="media/Christine_Heufer_section_contacts_150x180.jpg" srcset="media/Christine_Heufer_section_contacts_150x180.jpg" alt="Christine Heufer">
                
                                                    <!-- ignore this @susi & david - only for webpack export! -->
                                                    <div class="hiddenforwebpackexport"><img src="media/Christine_Heufer_section_contacts_150x180.jpg" alt="Christine Heufer"></div>
                                                    <!-- ignore this end -->
                                                </figure>
                                            </li>
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
                                            <li class="email"><a href="mailto:Christine.Heufer@messe-muenchen.de">E-Mail schreiben</a></li>
                                        </ul>
                                        <ul class="extra-margin-top">
                                            <li class="portrait">
                                                <figure>
                                                    <img src="media/Bettina_Schenk_section_contacts_150x180.jpg" srcset="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Bettina Schenk">
                
                                                    <!-- ignore this @susi & david - only for webpack export! -->
                                                    <div class="hiddenforwebpackexport"><img src="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Bettina Schenk"></div>
                                                    <!-- ignore this end -->
                                                </figure>
                                            </li>
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
                                            <li class="email"><a href="mailto:Bettina.Schenk@messe-muenchen.de">E-Mail schreiben</a></li>
                                        </ul>
    
                                    </div>
                                     <div class="sidebar-block">
                                        <h4>Kontakt Hörfunkstudio</h4>
                                        <h5>Während der Öffnungszeiten des Hörfunkstudios</h5>
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
                                                                <a title="www.NewWayMedia.de" href="http://www.newwaymedia.de" target="_blank">NewWayMedia</a>
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
                             
                                     <?php
                      $_GET['type'] = "stripe";
                      $_GET['max'] = "5";
                      include("sidelogo.php");   
                    ?>   
                    
                        <div class="clb"></div>
                                    </div>     
                            
                                        


                                <div class="sidebar-block">
                                    <a href="all" class="btn btn-default btn-lg"><i class="mmi mmi-chevron-right" aria-hidden="true"></i> 
                                    Alle Veranstaltungen</a>
                                </div>                             </div>
                
                    



										<?php
									}
                                ?>
                                    

                                    </div>
                    </div>
                </div>     </div>   

                               
                <div class="social-sharing">
                    <div class="shariff" data-lang="de" data-theme="white" data-services="[&quot;facebook&quot;,&quot;linkedin&quot;,&quot;xing&quot;,&quot;twitter&quot;]"></div>
                </div>

<div id="cookiebarContent" data-text="Diese Webseite verwendet Cookies. Mit der Nutzung unserer Dienste erklären Sie sich damit einverstanden, dass wir Cookies verwenden." data-accept="Cookies akzeptieren" data-poltext="Datenschutzhinweise" data-polurl="				
				https://messe-muenchen.de/de/datenschutzhinweise/
			"></div>
<div id="side-strap">
    <ul class="buttons">
<li>
	<div class="inner-strap">
		<div class="side-icon">
			<i class="mmi mmi-calendar"></i>
		</div>
<a id="null_500725286" href="https://www.messe-muenchen.de/de/technisches/veranstaltungen/index.php/veranstaltungen/kalender/" 
		class="strap-button"

	title="zum Veranstaltunskalender"
		target="_self"
>
				<span>
					<strong>Veranstaltungskalender</strong><br>
					Alle Events auf einen Blick.
				</span>
			</a>
	</div>            
</li>
<li>
	<div class="inner-strap">
		<div class="side-icon">
			<i class="mmi mmi-car"></i>
		</div>
<a id="null_500725286" href="https://www.messe-muenchen.de/de/meta/anreise/" 
		class="strap-button"

	title="Anreise"
		target="_self"
>
				<span>
					<strong>Anreise</strong><br>
					Ihr Weg zu uns.
				</span>
			</a>
	</div>            
</li>
<li>
	<div class="inner-strap">
		<div class="side-icon">
			<i class="mmi mmi-share"></i>
		</div>
			<span>
<a id="null_500726867" href="https://www.facebook.com/messemuenchen/" 
rel="noopener noopener"
	
		target="_blank"
>
						<i class="mmi mmi-facebook"></i>
					</a>
<a id="null_500726867" href="https://www.linkedin.com/company/messemuenchen" 
rel="noopener noopener"
	title="linkedin"
		target="_blank"
>
						<i class="mmi mmi-linkedin"></i>
					</a>
<a id="null_500726867" href="https://www.xing.com/companies/messem%C3%BCnchengmbh" 
rel="noopener noopener"
	
		target="_blank"
>
						<i class="mmi mmi-xing"></i>
					</a>
<a id="null_500726867" href="https://twitter.com/messemuenchen" 
rel="noopener noopener"
	
		target="_blank"
>
						<i class="mmi mmi-twitter"></i>
					</a>
	        </span>
	</div>            
</li>
    </ul>
</div>




                <div class="teaser-locations">

                   <h2>Kommende Veranstaltungen</h2>
                    <?php
                      $_GET['type'] = "stripe";
                      $_GET['max'] = "4";
                      include("navbar.php");   
                    ?>   
                </div>
 </div>

           
       

 
	  	


 <footer>
	<div class="graybar">
		<div class="container">
			<div class="col-md-12">
	<h4>Folgen Sie uns auf:</h4>
<a id="null_979332655" href="https://www.facebook.com/messemuenchen/?hc_ref=ARQ37uenDNJJmziygITTTjQD1kKPiMpQGqaN2_tKiQ5_bJ7Uff4d9zJPrtd4fZBfEi4" 
		class="footer-icon"
rel="external noopener"
	title="facebook"
		target="_blank"
>
	<i class="mmi mmi-facebook" aria-hidden="true"></i>
		<span class="title"> </span>
</a>
<a id="null_979332655" href="https://linkedin.com/company/messemuenchen" 
		class="footer-icon"
rel="nofollow noopener"
	title="LinkedIn"
		target="_blank"
>
	<i class="mmi mmi-linkedin" aria-hidden="true"></i>
		<span class="title"> </span>
</a>
<a id="null_979332655" href="https://www.xing.com/companies/messem%C3%Bcnchengmbh" 
		class="footer-icon"
rel="external noopener"
	title="Xing"
		target="_blank"
>
	<i class="mmi mmi-xing" aria-hidden="true"></i>
		<span class="title"> </span>
</a>
<a id="null_979332655" href="https://www.youtube.com/user/MesseMuenchen/featured?disable_polymer=1" 
		class="footer-icon"
rel="external noopener"
	title="YouTube"
		target="_blank"
>
	<i class="mmi mmi-youtube" aria-hidden="true"></i>
</a>
			</div>
		</div> 
	</div> 
	
    	
<div class="meta-footer">
	<div class="container">
    	<div class="row">
        	<div class="col-md-8">
				<ul class="meta-footer-nav">
						<li>
<a href="http://messe-muenchen.de/de/impressum/" 
	
> Impressum</a></li>
						<li>
<a href="https://messe-muenchen.de/de/datenschutzhinweise/" 
	
> Datenschutzhinweise</a></li>
						<li>
<a href="http://messe-muenchen.de/de/agb-der-messe-muenchen-gmbh/" 
	
> AGB der Messe München GmbH</a></li>
				</ul>
			</div> 			
			<div class="col-md-4 text-right">
            		&copy; Messe München GmbH 2018
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
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TWDGKKN');</script>
<!-- End Google Tag Manager -->
<script type="text/javascript" src="app.bundle.js"></script>

<script type="text/javascript" src="accordion.js"></script>
<script type="text/javascript" src="analytics.js"></script>
</body>

</html>
