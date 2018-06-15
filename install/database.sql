SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hfs_messen`
--

CREATE TABLE IF NOT EXISTS `hfs_messen` (
`id` int(11) NOT NULL,
  `titel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `bild` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL,
  `enddatum` datetime NOT NULL,
  `sortierung` int(11) NOT NULL,
  `themenservice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontakt_aktiv` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = anzeigen, 0 = nicht anzeigen',
  `presseteam` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = presseteam messe, 2 = presseteam eigen'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hfs_otoene`
--

CREATE TABLE IF NOT EXISTS `hfs_otoene` (
`id` int(11) NOT NULL,
  `titel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `themen_id` int(11) NOT NULL,
  `bild` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mp3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posttext` text COLLATE utf8_unicode_ci,
  `sortierung` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=377 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hfs_themen`
--

CREATE TABLE IF NOT EXISTS `hfs_themen` (
`id` int(11) NOT NULL,
  `titel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `messen_id` int(11) NOT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` text COLLATE utf8_unicode_ci,
  `sortierung` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hfs_user`
--

CREATE TABLE IF NOT EXISTS `hfs_user` (
`id` int(11) NOT NULL,
  `login` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `hfs_messen`
--
ALTER TABLE `hfs_messen`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `hfs_otoene`
--
ALTER TABLE `hfs_otoene`
 ADD PRIMARY KEY (`id`), ADD KEY `themen_id` (`themen_id`);

--
-- Indizes für die Tabelle `hfs_themen`
--
ALTER TABLE `hfs_themen`
 ADD PRIMARY KEY (`id`), ADD KEY `messen_id` (`messen_id`);

--
-- Indizes für die Tabelle `hfs_user`
--
ALTER TABLE `hfs_user`
 ADD PRIMARY KEY (`id`);


--
-- Constraints der Tabelle `hfs_otoene`
--
ALTER TABLE `hfs_otoene`
ADD CONSTRAINT `hfs_otoene_ibfk_1` FOREIGN KEY (`themen_id`) REFERENCES `hfs_themen` (`id`);

--
-- Constraints der Tabelle `hfs_themen`
--
ALTER TABLE `hfs_themen`
ADD CONSTRAINT `hfs_themen_ibfk_1` FOREIGN KEY (`messen_id`) REFERENCES `hfs_messen` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
