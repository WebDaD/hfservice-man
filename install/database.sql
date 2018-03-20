-- phpMyAdmin SQL Dump
-- version 2.11.11.1
-- http://www.phpmyadmin.net
--
-- Host: 134.119.45.64:3304
-- Erstellungszeit: 20. März 2018 um 12:51
-- Server Version: 5.6.19
-- PHP-Version: 5.3.4
--
-- v1.0.0
--

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Datenbank: `hfs`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hfs_messen`
--
-- Erzeugt am: 20. März 2018 um 12:49
--

CREATE TABLE IF NOT EXISTS `hfs_messen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `bild` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL,
  `sortierung` int(11) NOT NULL,
  `themenservice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hfs_otoene`
--
-- Erzeugt am: 20. März 2018 um 12:50
--

CREATE TABLE IF NOT EXISTS `hfs_otoene` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `themen_id` int(11) NOT NULL,
  `bild` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mp3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `themen_id` (`themen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hfs_themen`
--
-- Erzeugt am: 20. März 2018 um 12:50
--

CREATE TABLE IF NOT EXISTS `hfs_themen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `messen_id` int(11) NOT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messen_id` (`messen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hfs_user`
--
-- Erzeugt am: 20. März 2018 um 12:44
--

CREATE TABLE IF NOT EXISTS `hfs_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints der exportierten Tabellen
--

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
