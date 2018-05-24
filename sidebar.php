<?php
$url = explode( '#', $_GET["messe"] );
$messe = $url[0];

include 'config.php';
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES utf8"); 
if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
} 


$sql = "SELECT id, titel, bild, link, themenservice, kontakt_aktiv, presseteam,  DATE_FORMAT (datum,\"%d.%m.%Y, %H:00 Uhr bis\") AS datum, DATE_FORMAT (enddatum,\"%d.%m.%Y, %H:00 Uhr\") AS enddatum FROM ".DB_PREFIX."_messen WHERE slug='".$messe."'";
$result = $mysql->query($sql);
if ($result->num_rows == 1) {
  $data = $result->fetch_assoc();
} else {
  die("404 - Messe nicht gefunden");
}
$mysql->close();
?>

<div class="sidebar-block">

  <figure>
    <img src="/uploads/<?php echo $data["bild"]; ?>"/>
  </figure>
  <br>
  <a href="<?php echo $data["link"]; ?>"target="_blank" class="btn btn-default btn-lg">
    <i class="mmi mmi-chevron-right" aria-hidden="true"></i>
    Pressebereich aufrufen</a>
</div>
<?php if($data["kontakt_aktiv"] == "1"): ?>
  <h4>Öffnungszeiten zur <?php echo $data["titel"];?></h4>
<div class="sidebar-block">
	
 
  <h5>Das <a href="https://messe-muenchen.de/media/medien-des-projektes/pdf/locations/mm/horfunkstudio.pdf" title="Lageplan des H&ouml;rfunkstudios " target="_blank ">Hörfunkstudio</a> im 2. OG des Pressezentrums West öffnet zu folgenden Zeiten:
  </h5>
  <ul>
    <li>
      <strong>
        <?php echo $data["datum"];?> 
        <br> <?php echo $data["enddatum"];?>
      </strong>
      
    </li>
  </ul>

</div> 
   <div class="sidebar-block"> 

<h4>Kontakt Hörfunkstudio</h4>
<div class="contact-element size-large">

			   
				 
					  <figcaption>

  <h5>Während der Öffnungszeiten des <a href="https://messe-muenchen.de/media/medien-des-projektes/pdf/locations/mm/horfunkstudio.pdf" title="Lageplan des H&ouml;rfunkstudios " target="_blank">Hörfunkstudios</a></h5>
  <h4>Gabriel und Susanne Wirth<h4>
</figcaption>
<div class="detail-content">
<table>
	  <tr class="phone">
		  <td class="icon"><i class="mmi mmi-phone blue"></i></td>
		  <td class="content"><a title="
Anrufen" href="tel:+49 89 949-27000">+49 89 949-27000</a></td>
	  </tr>
	  <tr class="fax">
		  <td class="icon"><i class="mmi mmi-fax blue"></i></td>
		  <td class="content"><a title="
Fax senden" href="tel:+49 89 949-27002">+49 89 949-27002</a></td>
	  </tr>
	  <tr class="email">
		   <td class="icon"><i class="mmi mmi-email blue"></i></td>
		  <td class="content"><a title="
Email senden" href="mailto:studio@messeradio-muenchen.de">
E-Mail</a></td>
	  </tr> <tr>
<td>

</td>
<td>
<a title="www.NewWayMedia.de" href="http://www.newwaymedia.de" target="_blank">NewWayMedia</a>
</td>
</tr>
</table>
				 
				 
			  
		  
</div>     </div> </div><?php endif;?>

<div class="sidebar-block">
                                       
                                        <h4>Ihr Kontakt zu unserem Presseteam</h4>

  
<div class="contact-element size-large">
<?php if($data["presseteam"] == "1"): ?>
                                            <figure>
<img alt="Christine Heufer"src="https://files.messe-muenchen.de/corporate/media/global_media/kontaktbilder/kontakte_g_l/Christine_Heufer_section_contacts_370.jpg" >
</figure>
                                                <figcaption>
                                                <h4>Christine Heufer</h4>
                    </figcaption>
                    <div class="detail-content">
                    	<table>
                        <tr class="phone">
                          <td class="icon"><i class="mmi mmi-phone blue"></i></td>
                                <td class="content"><a title="Anrufen" href="tel:+498994920762">+49 89 949-20762</a></td>
	                            </tr>
	                        	<tr class="fax">
	                            	<td class="icon"><i class="mmi mmi-fax blue"></i></td>
	                                <td class="content"><a title="Fax senden" href="tel:+498994920715">+49 89 949-20715</a></td>
	                            </tr>
	                            <tr class="email">
	                             	<td class="icon"><i class="mmi mmi-email blue"></i></td>
	                                <td class="content"><a title="Email senden"href="mailto:christine.heufer@messe-muenchen.de">E-Mail</a></td>
	                        	</tr>
                    	</table>
                                           </div>  </div>  
                                           
                                       
                                           
                                      
                                        
                                        <div class="contact-element size-large">
			 			<figure>
	<img alt="Bettina Schenk" title="Bettina Schenk"  src="https://files.messe-muenchen.de/corporate/media/global_media/kontaktbilder/kontakte_s_z/Bettina_Schenk_section_contacts_370.jpg" >
						</figure>
                    <figcaption>
							<h4>Bettina Schenk</h4>
                    </figcaption>
                    <div class="detail-content">
                    	<table>
	                        	<tr class="phone">
	                            	<td class="icon"><i class="mmi mmi-phone blue"></i></td>
	                                <td class="content"><a title="
Anrufen" href="tel:+498994921475">+49 89 949-21475</a></td>
	                            </tr>
	                        	<tr class="fax">
	                            	<td class="icon"><i class="mmi mmi-fax blue"></i></td>
	                                <td class="content"><a title="
Fax senden" href="tel:+49899499721475">+49 89 949-9721475</a></td>
	                            </tr>
	                            <tr class="email">
	                             	<td class="icon"><i class="mmi mmi-email blue"></i></td>
	                                <td class="content"><a title="Email senden"href="mailto:bettina.schenk@messe-muenchen.de">E-Mail</a></td>
	                        	</tr>
                    	</table>
                                             </div>  </div>    </div>  
                                           
<?php else:?>

<div class="contact-element size-large">
<figure>
	<img alt="Willi Bock"   src="https://files.messe-muenchen.de/corporate/media/global_media/kontaktbilder/kontakte_a_f/Willi_Bock_section_contacts_370.jpg" >
						</figure>
                    <figcaption>
							<h4>Willi Bock</h4>
							<p>Leiter Unternehmens-PR  Pressesprecher</p>
                    </figcaption>
                    <div class="detail-content">
                    	<table>
	                        	<tr class="phone">
	                            	<td class="icon"><i class="mmi mmi-phone blue"></i></td>
	                                <td class="content"><a title="
Anrufen" href="tel:+498994920734">+49 89 949-20734</a></td>
	                            </tr>
	                        	<tr class="mobile">
	                            	<td class="icon"><i class="mmi mmi-mobile blue"></i></td>
	                                <td class="content"><a title="
Anrufen" href="tel:+491723936929">+49 172 3936929</a></td>
	                            </tr>
	                        	<tr class="fax">
	                            	<td class="icon"><i class="mmi mmi-fax blue"></i></td>
	                                <td class="content"><a title="
Fax senden" href="tel:+49899499720719">+49 89 949-9720719</a></td>
	                            </tr>
	                            <tr class="email">
	                             	<td class="icon"><i class="mmi mmi-email blue"></i></td>
	                                <td class="content"><a title="
Email senden" href="mailto:willi.bock@messe-muenchen.de">
E-Mail</a></td>
	                        	</tr>
                    	</table>  
                                            
                                        </div>  </div>  </div>
                                           
                                       </div>      	<?php endif;?>