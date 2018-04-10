<?php
$messe = $_GET["messe"];
include 'config.php';
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES utf8"); 
if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
} 


$sql = "SELECT id, titel, bild, link, themenservice,  DATE_FORMAT (datum,\"%d.%m.%Y\") AS datum, DATE_FORMAT (enddatum,\"%d.%m.%Y\") AS enddatum FROM ".DB_PREFIX."_messen WHERE slug='".$messe."'";
$result = $mysql->query($sql);
if ($result->num_rows == 1) {
  $data = $result->fetch_assoc();
} else {
  die("404 - Messe nicht gefunden");
}

$themen = array();
$sql_themen = "SELECT t.id, t.titel, t.text, t.pdf FROM ".DB_PREFIX."_themen t, ".DB_PREFIX."_messen m  WHERE t.messen_id = m.id AND m.id=".$data["id"];
$result_themen = $mysql->query($sql_themen);
if ($result_themen->num_rows > 0) {
  while($row = $result_themen->fetch_assoc()) {
    array_push($themen, $row);
  }
}
$count_ton = 0;
foreach ($themen as &$thema) {
  $oton = array();
  $sql_oton = "SELECT o.id, o.titel, o.text, o.bild, o.mp3, o.upload FROM ".DB_PREFIX."_themen t, ".DB_PREFIX."_otoene o  WHERE o.themen_id = t.id AND t.id=".$thema["id"];
  $result_oton  = $mysql->query($sql_oton);
  if ($result_oton->num_rows > 0) {
    while($row = $result_oton->fetch_assoc()) {
      array_push($oton, $row);
      $count_ton++;
    }
    $thema["oton"] = $oton;
  } else {
    $thema["oton"] = "";
  }
}
$mysql->close();
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
    <img alt="unser Themenservice als PDF-Dokument" title="unser Themenservice als PDF-Dokument" src="/pdf.png" style="float:left;margin-right:10px"/>
    <strong>Unser Themenservice als Download</strong>
  </a>
  <br/>
  <br/>
  <?php endif; ?>
  <h4>Nachfolgend finden Sie Manuskripte und <?php echo $count_ton; ?> O-T&ouml;ne zum Download:</h4>
  <?php if (count($themen) > 0): ?>
      <?php foreach ($themen as &$thema): ?>
      <button id="thema-<?php echo $thema["id"]; ?>" class="accordion">
        <?php if($thema["oton"] != ""): ?>
          <img alt="onAir" title="O-Töne vorhanden" src="/onair.png" style="float:left;"/>
        <?php else: ?>
          <img alt="offAir" title="Noch keine O-Töne vorhanden" src="/offair.png" style="float:left;"/>
        <?php endif; ?>
        <?php echo $thema["titel"]; ?>
        <a href="/uploads/<?ph<?php echo $thema["text"]; ?>p echo $data["themenservice"]; ?>" type="application/pdf" title="unser Themenservice als PDF-Dokument" target="_blank">
          <img alt="PDF" title="Thema als PDF-Dokument" src="/pdf.png" style="float:right;"/>
        </a>
      </button>
      <div class="panel">
        <p></p>
        <?php if($thema["oton"] != ""): ?>
          <ul>
            <?php foreach ($thema["oton"] as $oton): ?>
              <li>
                <h6 id="oton-<?php echo $oton["id"]; ?>"><?php echo $oton["titel"]; ?></h6>
                <?php if ($oton["bild"] != ""): ?>
                  <img src="/uploads/<?php echo $oton["bild"]; ?>" style="float:left;margin-right:5px;"/>
                <?php endif; ?>
                <p><?php echo $oton["text"]; ?></p>
                <audio src="/uploads/<?php echo $oton["mp3"]; ?>" controls/>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p>Noch keine O-T&ouml;ne vorhanden</p>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
  <?php else: ?>
    <p>Noch keine Themen vorhanden.</p>
  <?php endif; ?>
  </div>