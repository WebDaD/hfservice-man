<?php
$query = strtolower($_POST["nav-search"]);
include 'config.php';
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES utf8"); 
if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
} 


$sql_messen = "SELECT titel, slug, LEFT(`text`,100) AS `text`,  DATE_FORMAT (datum,\"%d.%m.%Y\") AS datum FROM ".DB_PREFIX."_messen WHERE LOWER(titel) LIKE '%".$query."%' OR LOWER(`text`) LIKE '%".$query."%'";
$messen = array();
$result_messen = $mysql->query($sql_messen);
if ($result_messen->num_rows > 0) {
  while($row = $result_messen->fetch_assoc()) {
    array_push($messen, $row);
  }
}

$sql_themen = "SELECT t.id, t.titel, LEFT(t.`text`,100) AS `text`, m.slug FROM ".DB_PREFIX."_themen t, ".DB_PREFIX."_messen m  WHERE t.messen_id = m.id AND (LOWER(t.titel) LIKE '%".$query."%' OR LOWER(t.`text`) LIKE '%".$query."%')";
$themen = array();
$result_themen = $mysql->query($sql_themen);
if ($result_themen->num_rows > 0) {
  while($row = $result_themen->fetch_assoc()) {
    array_push($themen, $row);
  }
}

$sql_otone = "SELECT o.id, o.themen_id, o.titel, LEFT(o.`text`,100) AS `text`, m.slug FROM ".DB_PREFIX."_themen t, ".DB_PREFIX."_otoene o, ".DB_PREFIX."_messen m WHERE o.themen_id = t.id AND t.messen_id = m.id AND (LOWER(o.titel LIKE '%".$query."%') OR LOWER(o.`text`) LIKE '%".$query."%')"; 
$otone = array();
$result_otone = $mysql->query($sql_otone);
if ($result_otone->num_rows > 0) {
  while($row = $result_otone->fetch_assoc()) {
    array_push($otone, $row);
  }
}

$mysql->close();
?>
  <div id="unique-image-text-section-oben">
    <div class="text-section">
      <h3>Suchergebnisse für
        <?php echo $query;?>
      </h3>
      <br>
      <h4>Messen</h4>
      <?php if (count($messen) > 0): ?>
      <?php foreach ($messen as &$messe): ?>
      <strong>
        <a href="<?php echo $messe[" slug "]; ?>">
          <?php echo $messe["datum"];?>:
          <?php echo $messe["titel"];?>
        </a>
      </strong>
      <p>
        <?php echo $messe["text"]; ?>...</p>
      <br/>
      <?php endforeach; ?>
      <?php else: ?>
      <p>Keine Ergebnisse.</p>
      <?php endif; ?>
      <hr/>
      <h4>Themen</h4>
      <?php if (count($themen) > 0): ?>
      <?php foreach ($themen as &$thema): ?>
      <strong>
        <a href="<?php echo $thema[" slug "]; ?>#thema-<?php echo $thema["id "]; ?>">
          <?php echo $thema["titel"];?>
        </a>
      </strong>
      <p>
        <?php echo $thema["text"]; ?>...</p>
      <br/>
      <?php endforeach; ?>
      <?php else: ?>
      <p>Keine Ergebnisse.</p>
      <?php endif; ?>
      <hr/>
      <h4>O-Tönen</h4>
      <?php if (count($otone) > 0): ?>
      <?php foreach ($otone as &$oton): ?>
      <strong>
        <a href="<?php echo $oton[" slug "]; ?>#thema-<?php echo $oton["themen_id "]; ?>-oton-<?php echo $oton["id "]; ?>">
          <?php echo $oton["titel"];?>
        </a>
      </strong>
      <p>
        <?php echo $oton["text"]; ?>...</p>
      <br/>
      <?php endforeach; ?>
      <?php else: ?>
      <p>Keine Ergebnisse.</p>
      <?php endif; ?>
    </div>
  </div>