<?php
$url = explode( '#', $_GET["messe"] );
$messe = $url[0];

if (strpos($_SERVER['SERVER_NAME'],'demo.') !== false) {
  include 'config.demo.php';
} else {
  include 'config.php';
}
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
$sql_themen = "SELECT t.id, t.titel, t.text, t.pdf, t.youtube FROM ".DB_PREFIX."_themen t, ".DB_PREFIX."_messen m  WHERE t.messen_id = m.id AND m.id=".$data["id"];
$result_themen = $mysql->query($sql_themen);
if ($result_themen->num_rows > 0) {
  while($row = $result_themen->fetch_assoc()) {
    array_push($themen, $row);
  }
}
$count_ton = 0;
foreach ($themen as &$thema) {
  $oton = array();
  $sql_oton = "SELECT o.id, o.themen_id, o.titel, o.text, o.posttext, o.bild, o.mp3, o.upload FROM ".DB_PREFIX."_themen t, ".DB_PREFIX."_otoene o  WHERE o.themen_id = t.id AND t.id=".$thema["id"];
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
<div id="unique-image-text-section-oben">
  <div class="text-section">
      <h2>
              Unser Hörfunk-Service zur <?php echo $data["titel"];?>
      </h2>
      <h3>
              Sie möchten über die <?php echo $data["titel"];?> im Radio berichten? Hier finden Sie alles, was Sie dazu brauchen!
      </h3>
      <p> </p>
      <p>
              Das Team vom Messeradio ist auch diesmal wieder auf der <?php echo $data["titel"];?> für Sie unterwegs, um die unterschiedlichsten Themen redaktionell zu bearbeiten. Wir bieten Ihnen alle Audiomaterialien, die Sie zur Produktion Ihres Beitrags brauchen. Hier im Downloadbereich stellen wir Ihnen kostenfrei unser Tonmaterial in Sendequalität (MP3) zur Verfügung. Wir freuen uns, wenn Sie uns über den Einsatz informieren. <p> </p>
              Wenn Sie persönlich und direkt auf der Messe produzieren möchten, können Sie unser <a href="https://messe-muenchen.de/media/medien-des-projektes/pdf/locations/mm/horfunkstudio.pdf" title="Lageplan des H&ouml;rfunkstudios" target="_blank">Hörfunkstudio</a> im Pressezentrum West nutzen.
     
          In diesem, mit modernster Digitaltechnik ausgestatteten Studio, können Sie Ihre Beiträge bearbeiten, überspielen oder gleich live aus dem Studio senden. Unser <a href="http://www.newwaymedia.de" title="www.NewWayMedia.de" target="_blank">Technik-Team</a> unterstützt Sie gerne direkt vor Ort.
      </p>
      <?php if($data["themenservice"] !== ""):?>
        <a href="/uploads/<?php echo $data["themenservice"]; ?>" target="_blank" type="application/pdf" title="unser Themenservice als PDF-Dokument" class="btn btn-default btn-lg"><i class="mmi mmi-pdf-document" aria-hidden="true"></i>  
            Unser Themen-Service als Download</a>
      <?php endif; ?>
          <br><br>
      <h5>Nachfolgend finden Sie Manuskripte und <?php echo $count_ton; ?> O-Töne zum Download</h5>
  </div>
</div>
<?php if (count($themen) > 0): ?>
  <div class="accordion" id="unique-section">
    <dl>
    <?php foreach ($themen as &$thema): ?>
      <dt class="accordion-title <?php if($thema["oton"] != "" || $thema["youtube"] != ""){echo "green";}else {echo "red";} ?>" id="accordion-<?php echo $thema["id"]; ?>">
            <span><?php echo $thema["titel"]; ?></span>
            <a href="#accordion-<?php echo $thema["id"]; ?>" class="plusminus closed"><i class="mmi mmi-accordion-plus" aria-hidden="true"></i></a>
      </dt>
      <dd class="accordion-content">
        <?php if ($thema["youtube"] != ""): ?>
             
              <iframe style="width: 100%;height: 360px;" width="580" height="360" src="<?php echo $thema["youtube"];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <?php endif; ?>
        <?php if ($thema["pdf"] != ""): ?>
          <a href="/uploads/<?php echo $thema["pdf"]; ?>" target="_blank" type="application/pdf" class="btn btn-default btn-lg">
            <i class="mmi mmi-pdf-document" aria-hidden="true"></i>  
              PDF zum Thema als Download
          </a>
        <?php endif; ?>
        <?php if ($thema["text"] != ""): ?>
          <p><?php echo $thema["text"]; ?></p>
        <?php endif; ?>
        <?php if($thema["oton"] != ""): ?>
          <?php foreach ($thema["oton"] as $oton): ?>
          <h5 id="accordion-<?php echo $oton["themen_id"]; ?>-oton-<?php echo $oton["id"]; ?>"><?php echo $oton["titel"]; ?></h5>
            <?php if ($oton["bild"] != ""): ?>
              <img src="/uploads/<?php echo $oton["bild"]; ?>" style="float:left;margin-right:5px;"/>
            <?php endif; ?>
            <p><?php echo $oton["text"]; ?></p>
            <h5 style="clear: left;padding-top: 10px;">Tonspur abspielen</h5>
            <audio src="/uploads/<?php echo $oton["mp3"]; ?>" controls data-title="<?php echo $oton["titel"]; ?>" preload="none"></audio>
            <div>
                <a href="/uploads/<?php echo $oton["mp3"]; ?>"  type="audio/mp3" class="btn btn-default btn-lg" download="<?php echo $oton["mp3"]; ?>" target="_blank"><i class="mmi mmi-cloud-download" aria-hidden="true"></i>  
                    MP3-Download</a>
            </div>
            <?php if ($oton["posttext"] != ""): ?>
              <p><?php echo $oton["posttext"]; ?></p>
            <?php endif; ?>
            <hr/>
          <?php endforeach; ?>
        <?php else: ?>
          <?php if ($thema["youtube"] == ""): ?>
            <p>Noch keine O-T&ouml;ne vorhanden</p>
          <?php endif; ?>
        <?php endif; ?>
      </dd>
    <?php endforeach; ?>
    </dl>
  </div>
<?php else: ?>
  <p>Noch keine Themen vorhanden.</p>
<?php endif; ?>