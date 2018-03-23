<?php
$messe = $_GET["messe"];
include 'config.php';
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES utf8"); 
if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
} 


$sql = "SELECT titel, bild, link, themenservice,  DATE_FORMAT (datum,\"%d.%m.%Y\") AS datum, DATE_FORMAT (enddatum,\"%d.%m.%Y\") AS enddatum FROM ".DB_PREFIX."_messen WHERE slug='".$messe."'";
$result = $mysql->query($sql);
if ($result->num_rows == 1) {
  $data = $result->fetch_assoc();
} else {
  die("404 - Messe nicht gefunden");
}

?>
  <span style="float:right;text-align:right">
    <a href="<?php echo $data["link"];?>" target="_blank" title='zum Pressebereich der <?php echo $data["titel"];?>'>
      <img src="/uploads/<?php echo $data["bild"];?>" />zum Pressebereich der
      <?php echo $data["titel"];?> </a>
  </span>
  <h3>Unser H&ouml;rfunkservice zur
    <a href="<?php echo $data["link"];?>" target=_blank title='zur Homepage der <?php echo $data["titel"];?>'>
      <?php echo $data["titel"];?>
    </a>
  </h3>
  <br>
  <strong>Sie möchten über die
    <?php echo $data["titel"];?> im Radio berichten? Hier finden Sie alles, was Sie dazu brauchen! </strong>
  <br>
  <br> Das Team vom Messeradio ist auch diesmal wieder auf der
  <?php echo $data["titel"];?> für Sie unterwegs, um die unterschiedlichsten Themen redaktionell zu bearbeiten. Wir bieten Ihnen alle Audiomaterialien,
  die Sie zur Produktion Ihres Beitrags brauchen. Hier im Downloadbereich stellen wir Ihnen kostenfrei unser Tonmaterial
  in Sendequalität (MP3) zur Verfügung. Wir freuen uns, wenn Sie uns über den Einsatz informieren.
  <br> Wenn Sie persönlich und direkt auf der Messe produzieren möchten, nutzen Sie unser
  <a href=http://www.messe-muenchen.de/media/de/local_documents/raeume_und_flaechen_1/rf_hoerfunkstudio_west.pdf target=_blank>
    Hörfunkstudio im Pressezentrum West
    <br> </a> In diesem mit modernster Digitaltechnik ausgestatteten Studio können Sie Ihre Beiträge bearbeiten, überspielen
  oder gleich live aus dem Studio senden. Unser Technik-Team unterstützt Sie gerne direkt vor Ort.
  <br>
  <br>

  <strong>Öffnungszeiten</strong>
  <br> Hörfunkstudio West (2. OG. Pressezentrum West)
  <br> Für die
  <?php echo $data["titel"];?> öffnet das Hörfunkstudio vom
  <strong><?php echo $data["datum"];?> bis <?php echo $data["enddatum"];?> von 9 bis 18 Uhr </strong>
  <br>
  <br>

  <strong>Kontakt Hörfunkstudio im Pressezentrum West</strong>
  <br> (während der Öffnungszeiten)
  <br> Gabriel und Susanne Wirth
  <br> Tel.: +49 89 949-27000
  <br> E-Mail:
  <a href="mailto:studio@messeradio-muenchen.de">studio@messeradio-muenchen.de </a>
  <br>
  <br>

  <?php if($data["themenservice"] !== ""):?>
  <a href="/uploads/<?php echo $data["themenservice"]; ?>" type="application/pdf" title="unser Themenservice als PDF-Dokument"
    target="_blank">
    <img alt="unser Themenservice als PDF-Dokument" title="unser Themenservice als PDF-Dokument" src="/pdf.png" style="float:left;"/>
    <strong>Unser Themenservice als Download</strong>
  </a>
  <br/>
  <br/>
  <?php endif; ?>
  <h4>Nachfolgend finden Sie Manuskripte und ## O-T&ouml;ne zum Download:</h4>

  <!-- TODO: Hier das Accordeon mit den Themen mit O-Tönen -->

  </div>