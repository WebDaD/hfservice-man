<?php
header('Content-Type: application/xml; charset=utf-8');
include 'config.php';
$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES utf8"); 
if ($mysql->connect_error) {
  die("Connection failed: " . $mysql->connect_error);
}
$sql = "SELECT o.titel AS oton, o.`text`, o.bild, o.mp3, UNIX_TIMESTAMP(o.upload as upload, t.titel as thema, m.titel as messe  FROM `".DB_PREFIX."_otoene` o, ".DB_PREFIX."_themen t, ".DB_PREFIX."_messen m WHERE o.themen_id=t.id AND m.id=t.messen_id ORDER by o.upload DESC";
$result = $mysql->query($sql);

$otone = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    array_push($otone, $row);
  }
}
$mysql->close();
?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0">
  <channel>
    <link>http://hfservice.webdad.eu</link>
    <language>de-DE</language>
    <copyright>&#xA9;2018</copyright>
    <webMaster>info@newwaymedia.de (Marko Kamnisky)</webMaster>
    <managingEditor>info@newwaymedia.de (Marko Kamnisky)</managingEditor>
    <image>
      <url>http://hfservice.webdad.eu/header.jpg</url>
      <title>Hörfunkservice der Messe München</title>
      <link>http://hfservice.webdad.eu</link>
    </image>
    <itunes:owner>
      <itunes:name>Marko Kamnisky</itunes:name>
      <itunes:email>info@newwaymedia.de</itunes:email>
    </itunes:owner>
    <itunes:category text="Education">
      <itunes:category text="Higher Education" />
    </itunes:category>
    <itunes:keywords>separate, by, comma, and, space</itunes:keywords>
    <itunes:explicit>no</itunes:explicit>
    <itunes:image href="http://hfservice.webdad.eu/header.jpg" />
    <atom:link href="http://hfservice.webdad.eu/podcast.php" rel="self" type="application/rss+xml" />
    <pubDate>Mon, 26 Mar 2018 08:00:00 +0100</pubDate>
    <title>Messeradio München</title>
    <itunes:author>newwaymedia</itunes:author>
    <description>Vom O-Ton-Paket bis zum fertig geschnittenen Beitrag: Unsere Hoerfunk-Redaktion bietet Ihnen alle Audiomaterialien, die Sie für die Produktion Ihres Beitrags brauchen. Wir stellen Ihnen unser Tonmaterial im MP3-Format zusammen mit Textinformationen kostenfrei zur Verfügung. Klicken Sie bitte auf die entsprechende Veranstaltung im Downloadbereich.</description>
    <itunes:summary>Vom O-Ton-Paket bis zum fertig geschnittenen Beitrag: Unsere Hoerfunk-Redaktion bietet Ihnen alle Audiomaterialien, die Sie für die Produktion Ihres Beitrags brauchen. Wir stellen Ihnen unser Tonmaterial im MP3-Format zusammen mit Textinformationen kostenfrei zur Verfügung. Klicken Sie bitte auf die entsprechende Veranstaltung im Downloadbereich.</itunes:summary>
    <itunes:subtitle>Unsere Hlrfunk-Redaktion bietet Ihnen alle Audiomaterialien, die Sie für die Produktion Ihres Beitrags brauchen.</itunes:subtitle>
    <lastBuildDate><?php echo date("D, d M Y H:i:s O");?></lastBuildDate>
    <?php foreach ($otone as $oton): ?>
      <item>
        <title><?php echo $oton["messe"]." - ".$oton["thema"]." - ".$oton["oton"];?></title>
        <description><?php echo $oton["text"];?></description>
        <itunes:summary><?php echo $oton["text"];?></itunes:summary>
        <itunes:subtitle><?php echo substr($oton["text"],0,255);?></itunes:subtitle>
        <enclosure url="http://hfservice.webdad.eu/uploads/<?php echo $oton["mp3"];?>" type="audio/mpeg" length="1" />
        <guid>http://hfservice.webdad.eu/uploads/<?php echo $oton["mp3"];?></guid>
        <itunes:duration>0:00:01</itunes:duration>
        <pubDate><?php echo date("D, d M Y H:i:s O",$oton["upload"]);?></pubDate>
      </item>
    <?php endforeach; ?>
  </channel>
</rss>