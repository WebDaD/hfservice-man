<?php
$url = explode( '#', $_GET["messe"] );
$messe = $url[0];

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
$mysql->close();
?>

<div class="sidebar-block">

  <figure>
    <img src="/uploads/<?php echo $data["bild"]; ?>"/>
  </figure>
  <br>
  <a href="<?php echo $data["link"]; ?>" class="btn btn-default btn-lg">
    <i class="mmi mmi-chevron-right" aria-hidden="true"></i>
    Pressebereich aufrufen</a>
</div>

<div class="sidebar-block">
  <h4>Öffnungszeiten zur <?php echo $data["titel"];?></h4>
  <h5>Das Hörfunkstudio West im 2. OG des Pressezentrums West öffnet zu folgenden Zeiten:
  </h5>
  <ul>
    <li>
      <strong>
        <?php echo $data["datum"];?> - 09:00 bis 18:00 Uhr
        <br> <?php echo $data["enddatum"];?> - 09:00 bis 18:00 Uhr
      </strong>
    </li>
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