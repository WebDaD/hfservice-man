<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="http://www.messe-muenchen.de/favicon.ico">
	<title>Messe München Hörfunkservice | Messe München</title>
	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	    crossorigin="anonymous">
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
						<img src="https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-small.png" srcset="https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-small.png 1x, https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-big.png 2x"
						    class="nav-logo" alt="
Messe München">
					</a>

					<div class="header-meta large-device" style="height:3.4rem;"></div>


					<!-- smaller devices -->
					<a class="brand-mobile small-device" href="https://www.messe-muenchen.de/de/" title="
Messe München">
						<img src="https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-mobile-small.png" srcset="https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-mobile-small.png 1x, https://www.messe-muenchen.de/media/technisches/bilder/logo-messe-muenchen-mobile-big.png 2x"
						    class="nav-logo" alt="
Messe München">
					</a>



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
								<li>
									<a href="https://www.messe-muenchen.de/de/meta/kontakt/index.php/kontakt/">
										<i class="mmi mmi-envelope" aria-hidden="true"></i> Kontakt</a>
								</li>
								<li>
									<a href="https://www.messe-muenchen.de/de/technisches/veranstaltungen/index.php/veranstaltungen/kalender/">
										<i class="mmi mmi-calendar" aria-hidden="true"></i> Veranstaltungen</a>
								</li>
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
		<div class="hiddenforwebpackexport">
			<img src=media/MM18_CW_hoerfunk_Header_1600x600.jpg>
		</div>
		<!-- ignore this end -->


		<div class="flexy">
			<div class="flex-content">
				<h1> Hörfunk-Service</h1>

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
			<script type="application/ld+json">
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
									"name": "Unsere Messen"
								}
			</script>
		</div>
		<h1>
			<?php
				if(!empty($_GET['messe']) && is_string($_GET['messe'])) {       
					if($_GET["messe"] == "search") {
                		echo "Suche";
                	} elseif($_GET["messe"] == "all") {
                    	echo "Alle Veranstaltungen";
                	} else {
                        include("messe-name.php");
                    }
                } else {
                    echo "Hörfunk-Service";
				}
			?>
		</h1>
		<p>

		</p>
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
												<img src="media/Christine_Heufer_section_contacts_150x180.jpg" srcset="media/Christine_Heufer_section_contacts_150x180.jpg"
												    alt="Christine Heufer">

												<!-- ignore this @susi & david - only for webpack export! -->
												<div class="hiddenforwebpackexport">
													<img src="media/Christine_Heufer_section_contacts_150x180.jpg" alt="Christine Heufer">
												</div>
												<!-- ignore this end -->
											</figure>
										</li>
										<li class="person">
											Christine Heufer
											<br> Broadcast Media Manager
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
										<li class="email">
											<a href="mailto:Christine.Heufer@messe-muenchen.de">E-Mail schreiben</a>
										</li>
									</ul>
									<ul class="extra-margin-top">
										<li class="portrait">
											<figure>
												<img src="media/Bettina_Schenk_section_contacts_150x180.jpg" srcset="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Bettina Schenk">

												<!-- ignore this @susi & david - only for webpack export! -->
												<div class="hiddenforwebpackexport">
													<img src="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Bettina Schenk">
												</div>
												<!-- ignore this end -->
											</figure>
										</li>
										<li class="person">
											Bettina Schenk
											<br> Broadcast Media Manager
										</li>

										<div class="sidebar-block">

											<h4>Kontaktieren Sie uns!</h4>
											<h5>Ihr Kontakt zu unserem Presseteam</h5>
											<ul>
												<li class="portrait">
													<figure>
														<img src="media/Christine_Heufer_section_contacts_150x180.jpg" srcset="media/Christine_Heufer_section_contacts_150x180.jpg"
														    alt="Christine Heufer">

														<!-- ignore this @susi & david - only for webpack export! -->
														<div class="hiddenforwebpackexport">
															<img src="media/Christine_Heufer_section_contacts_150x180.jpg" alt="Christine Heufer">
														</div>
														<!-- ignore this end -->
													</figure>
												</li>
												<li class="person">
													Christine Heufer
													<br> Broadcast Media Manager
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
												<li class="email">
													<a href="mailto:Christine.Heufer@messe-muenchen.de">E-Mail schreiben</a>
												</li>
											</ul>
											<ul class="extra-margin-top">
												<li class="portrait">
													<figure>
														<img src="media/Bettina_Schenk_section_contacts_150x180.jpg" srcset="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Bettina Schenk">

														<!-- ignore this @susi & david - only for webpack export! -->
														<div class="hiddenforwebpackexport">
															<img src="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Bettina Schenk">
														</div>
														<!-- ignore this end -->
													</figure>
												</li>
												<li class="person">
													Bettina Schenk
													<br> Broadcast Media Manager
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
												<li class="email">
													<a href="mailto:Bettina.Schenk@messe-muenchen.de">E-Mail schreiben</a>
												</li>
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



								</div>

								<div class="sidebar-block">
									<a href="all" class="btn btn-default btn-lg">
										<i class="mmi mmi-chevron-right" aria-hidden="true"></i>
										Alle Veranstaltungen</a>
								</div>
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
										<img src="media/Christine_Heufer_section_contacts_150x180.jpg" srcset="media/Christine_Heufer_section_contacts_150x180.jpg"
										    alt="Christine Heufer">

										<!-- ignore this @susi & david - only for webpack export! -->
										<div class="hiddenforwebpackexport">
											<img src="media/Christine_Heufer_section_contacts_150x180.jpg" alt="Christine Heufer">
										</div>
										<!-- ignore this end -->
									</figure>
								</li>
								<li class="person">
									Christine Heufer
									<br> Broadcast Media Manager
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
								<li class="email">
									<a href="mailto:Christine.Heufer@messe-muenchen.de">E-Mail schreiben</a>
								</li>
							</ul>
							<ul class="extra-margin-top">
								<li class="portrait">
									<figure>
										<img src="media/Bettina_Schenk_section_contacts_150x180.jpg" srcset="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Bettina Schenk">

										<!-- ignore this @susi & david - only for webpack export! -->
										<div class="hiddenforwebpackexport">
											<img src="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Bettina Schenk">
										</div>
										<!-- ignore this end -->
									</figure>
								</li>
								<li class="person">
									Bettina Schenk
									<br> Broadcast Media Manager
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
								<li class="email">
									<a href="mailto:Bettina.Schenk@messe-muenchen.de">E-Mail schreiben</a>
								</li>
							</ul>
										</div>
									<?php } ?>
									</div></div></div>

							

							<footer>
								<div class="graybar">
									<div class="container">
										<div class="col-md-12">
											<h4>Folgen Sie uns auf:</h4>
											<a id="null_979332655" href="https://www.facebook.com/messemuenchen/?hc_ref=ARQ37uenDNJJmziygITTTjQD1kKPiMpQGqaN2_tKiQ5_bJ7Uff4d9zJPrtd4fZBfEi4"
											    class="footer-icon" rel="external noopener" title="facebook" target="_blank">
												<i class="mmi mmi-facebook" aria-hidden="true"></i>
												<span class="title"> </span>
											</a>
											<a id="null_979332655" href="https://linkedin.com/company/messemuenchen" class="footer-icon" rel="nofollow noopener" title="LinkedIn"
											    target="_blank">
												<i class="mmi mmi-linkedin" aria-hidden="true"></i>
												<span class="title"> </span>
											</a>
											<a id="null_979332655" href="https://www.xing.com/companies/messem%C3%Bcnchengmbh" class="footer-icon" rel="external noopener"
											    title="Xing" target="_blank">
												<i class="mmi mmi-xing" aria-hidden="true"></i>
												<span class="title"> </span>
											</a>
											<a id="null_979332655" href="https://www.youtube.com/user/MesseMuenchen/featured?disable_polymer=1" class="footer-icon" rel="external noopener"
											    title="YouTube" target="_blank">
												<i class="mmi mmi-youtube" aria-hidden="true"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="sitemap-footer">
									<div class="container">
										<div class="row">
											<div class="col-md-3">
												<h4>Über uns</h4>
												<a id="null_-600672158" href="http://www.messe-muenchen.de/de/unternehmen/ueber-uns/unternehmensprofil/" target="_self">Unternehmensprofil</a>
												<a id="null_-679570000" href="http://www.messe-muenchen.de/de/unternehmen/ueber-uns/management-aufsichtsrat/" target="_self">Management & Aufsichtsrat</a>
												<a id="null_-1398769169" href="http://www.messe-muenchen.de/de/unternehmen/ueber-uns/unternehmenswerte/" target="_self">Unternehmenswerte</a>
												<a id="null_80179867" href="http://www.messe-muenchen.de/de/unternehmen/ueber-uns/messeportfolio/" target="_self">Messeportfolio</a>
											</div>
											<div class="col-md-3">
												<h4>Verantwortung</h4>
												<a id="null_1817988225" href="http://www.messe-muenchen.de/de/unternehmen/verantwortung-csr/nachhaltigkeit-management-messegelaende/"
												    target="_self">Nachhaltigkeit: Management & Messegelände</a>
												<a id="null_1888485894" href="http://www.messe-muenchen.de/de/unternehmen/verantwortung-csr/soziale-verantwortung/" target="_self">Soziale und gesellschaftliche Verantwortung</a>
												<a id="null_1680532082" href="http://www.messe-muenchen.de/de/unternehmen/verantwortung-csr/frauen-verbinden/" target="_self">Frauen verbinden</a>
												<a id="null_1646927144" href="http://messe-muenchen.de/de/unternehmen/verantwortung-csr/produkt-und-markenschutz/" target="_self">Produkt- und Markenschutz</a>
												<a id="null_1615748656" href="http://messe-muenchen.de/de/unternehmen/verantwortung-csr/sicherheit/" target="_self">Sicherheit</a>
											</div>
											<div class="col-md-3">
												<h4>Internationales Netzwerk</h4>
												<a id="null_-1807289076" href="http://messe-muenchen.de/de/unternehmen/internationales-netzwerk/tochergesellschaften/" target="_self">Tochterunternehmen</a>
												<a id="null_-944177808" href="http://messe-muenchen.de/de/unternehmen/internationales-netzwerk/auslandsvertretungen/" target="_self">Auslandsvertretungen</a>
											</div>
											<div class="col-md-3">
												<h4>Messe München Locations</h4>
												<a id="null_-31383982" href="http://messe-muenchen.de/de/locations/messe-muenchen-locations/messe-muenchen-messegelaende/"
												    target="_self">Messe München Messegelände</a>
												<a id="null_-1550256340" href="http://messe-muenchen.de/de/locations/messe-muenchen-locations/icm---internationales-congress-center-muenchen/"
												    target="_self">ICM – Internationales Congress Center München</a>
												<a id="null_1195117982" href="http://messe-muenchen.de/de/locations/messe-muenchen-locations/moc-veranstaltungscenter-muenchen/"
												    target="_self">MOC Veranstaltungscenter München</a>
												<a id="null_1036679712" href="http://messe-muenchen.de/de/locations/messe-muenchen-locations/messe-muenchen-conference-center-nord/"
												    target="_self">Messe München Conference Center Nord</a>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<h4>Wir als Arbeitgeber</h4>
												<a id="null_-2049149407" href="http://messe-muenchen.de/de/karriere/wir-als-arbeitgeber/arbeitsbereiche/" target="_self">Arbeitsbereiche</a>
												<a id="null_1126274816" href="http://messe-muenchen.de/de/karriere/wir-als-arbeitgeber/kontakt/" target="_self">Kontakt</a>
												<a id="null_-1487789172" href="http://messe-muenchen.de/de/karriere/wir-als-arbeitgeber/stellenanzeigen/index.php/karriere/"
												    target="_self">Stellenanzeigen</a>
											</div>
											<div class="col-md-3">
												<h4>Presse</h4>
												<a id="null_-342169203" href="http://messe-muenchen.de/de/presse/presseinformationen/pressemitteilungen/index.php/presse/"
												    target="_self">Pressemitteilungen</a>
												<a id="null_2023545785" href="http://messe-muenchen.de/de/presse/presse-service/akkreditierung/" target="_self">Akkreditierungsrichtlinien</a>
												<a id="null_-149599266" href="https://videos.messe-muenchen.de/" rel="follow noopener" target="_blank">Mediathek</a>
											</div>
											<div class="col-md-3">
												<h4>Digital</h4>
												<a id="null_1017047213" href="http://messe-muenchen.de/de/digital/innovation/ueberblick/" target="_self">Digital Innovation</a>
												<a id="null_1429160641" href="http://messe-muenchen.de/de/digital/digital-solutions/ueberblick/" target="_self">Digital Solution</a>
												<a id="null_967393689" href="http://messe-muenchen.de/de/digital/messen-digital/ueberblick/" target="_self">Messen Digital</a>
											</div>
											<div class="col-md-3">
												<h4>Services</h4>
												<a id="null_671180030" href="http://messe-muenchen.de/de/locations/services/messe-services/" target="_self">Messe-Services</a>
												<a id="null_-160364144" href="http://messe-muenchen.de/de/locations/services/media-sales/" target="_self">Media Sales</a>
												<a id="null_1392076539" href="http://messe-muenchen.de/de/locations/services/eventservice/" target="_self">Eventservice</a>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<h4>Allgemein</h4>
												<a id="null_815798587" href="http://messe-muenchen.de/de/meta/anreise/" target="_self">Anreise</a>
												<a id="null_-826134310" href="http://messe-muenchen.de/de/meta/aufenthalt/" target="_self">Aufenthalt</a>
												<a id="null_-978294581" href="http://messe-muenchen.de/de/meta/downloads/" target="_self">Downloads</a>
												<a id="null_69366" href="http://messe-muenchen.de/de/locations/services/faqs/" target="_self">FAQ</a>
											</div>
										</div>
									</div>
								</div>
								<div class="meta-footer">
									<div class="container">
										<div class="row">
											<div class="col-md-8">
												<ul class="meta-footer-nav">
													<li>
														<a href="http://messe-muenchen.de/de/impressum/"> Impressum</a>
													</li>
													<li>
														<a href="https://messe-muenchen.de/de/datenschutzhinweise/"> Datenschutzhinweise</a>
													</li>
													<li>
														<a href="http://messe-muenchen.de/de/agb-der-messe-muenchen-gmbh/"> AGB der Messe München GmbH</a>
													</li>
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
							<div id="back-to-top" title="zum Seitenanfang">
								<div></div>
							</div>
							<!-- back-to-top-button end -->

							<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
							    crossorigin="anonymous"></script>
							<!-- Latest compiled and minified JavaScript -->
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
							    crossorigin="anonymous"></script>
							<!-- Google Tag Manager -->
							<script>
								(function (w, d, s, l, i) {
									w[l] = w[l] || [];
									w[l].push({
										'gtm.start': new Date().getTime(),
										event: 'gtm.js'
									});
									var f = d.getElementsByTagName(s)[0],
										j = d.createElement(s),
										dl = l != 'dataLayer' ? '&l=' + l : '';
									j.async = true;
									j.src =
										'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
									f.parentNode.insertBefore(j, f);
								})(window, document, 'script', 'dataLayer', 'GTM-TWDGKKN');
							</script>
							<!-- End Google Tag Manager -->
							<script type="text/javascript" src="app.bundle.js"></script>

							<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
							    crossorigin="anonymous"></script>
							<!-- Latest compiled and minified JavaScript -->
							<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
							    crossorigin="anonymous"></script>
							<!-- Google Tag Manager -->
							<script>
								(function (w, d, s, l, i) {
									w[l] = w[l] || [];
									w[l].push({
										'gtm.start': new Date().getTime(),
										event: 'gtm.js'
									});
									var f = d.getElementsByTagName(s)[0],
										j = d.createElement(s),
										dl = l != 'dataLayer' ? '&l=' + l : '';
									j.async = true;
									j.src =
										'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
									f.parentNode.insertBefore(j, f);
								})(window, document, 'script', 'dataLayer', 'GTM-TWDGKKN');
							</script>
							<!-- End Google Tag Manager -->
							<script type="text/javascript" src="https://www.messe-muenchen.de/media/technisches/js/applikation-bundel-js.js"></script>

							<script type="text/javascript" src="accordion.js"></script>
							<script type="text/javascript" src="analytics.js"></script>
</body>

</html>