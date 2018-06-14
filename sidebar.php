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
  
    
      <strong>
        <?php echo $data["datum"];?> 
        <br> <?php echo $data["enddatum"];?>
      </strong>
      
   
  

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
    
                                    </div><?php endif;?>

<div class="sidebar-block">
                                       
                                         <h4>Kontaktieren Sie uns!</h4>
                                        <h5>Ihr Kontakt zu unserem Presseteam</h5>

  

<?php if($data["presseteam"] == "1"): ?>
                                                                                 
                                        <ul>
                                            <li class="portrait">
                                                <figure>
                                                    <img src=media/Christine_Heufer_section_contacts_150x180.jpg srcset="media/Christine_Heufer_section_contacts_150x180.jpg" alt="Christine Heufer">
                
                                                    <!-- ignore this @susi & david - only for webpack export! -->
                                                    <div class="hiddenforwebpackexport"><img src=media/Christine_Heufer_section_contacts_150x180.jpg></div>
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
                                                    <img src=media/Bettina_Schenk_section_contacts_150x180.jpg srcset="media/Bettina_Schenk_section_contacts_150x180.jpg" alt="Christine Heufer">
                
                                                    <!-- ignore this @susi & david - only for webpack export! -->
                                                    <div class="hiddenforwebpackexport"><img src=media/Bettina_Schenk_section_contacts_150x180.jpg></div>
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
                                    
                                    
                             
                                           
<?php else:?>
 <ul>
    <li class="portrait">
                                                <figure>
                                                    <img src=media/Willi_Bock_section_contacts_150x180.jpg srcset="media/Willi_Bock_section_contacts_150x180.jpg" alt="Willi Bock">
                
                                                    <!-- ignore this @susi & david - only for webpack export! -->
                                                    <div class="hiddenforwebpackexport"><img src=media/Willi_Bock_section_contacts_150x180.jpg></div>
                                                    <!-- ignore this end -->
                                                </figure>
                                            </li>
                                            <li class="person">
                                                Willi Bock<br>
							Leiter Unternehmens-PR  Pressesprecher
                                               
                                            </li>
    
                                            <li class="address">
                                                <table>
                                                        <tr>
                                                            <td>
                                                                Tel.
                                                            </td>
                                                            <td>
                                                               +49 89 949-20734
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Fax
                                                            </td>
                                                            <td>
                                                               +49 89 949-9720719
                                                            </td>
                                                        </tr>
                                                </table>
                                            </li>
                                            <li class="email"><a href="mailto:willi.bock@messe-muenchen.de">E-Mail schreiben</a></li>
                                        </ul>
                    	</table>                                          
 </div>
 
 
 <?php endif;?>
                                        
                                        
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
                
                    

                                           