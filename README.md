# Hörfunkservice - Konzept

Autor: Dominik Sigmund, WebDaD <dominik.sigmund@webdad.eu>  
Version: 0.1  
Datum: 2018-03-14  


<!-- TOC -->

- [Hörfunkservice - Konzept](#hörfunkservice---konzept)
  - [TL;DR](#tldr)
  - [Vorgaben](#vorgaben)
  - [Details](#details)
    - [Datenbank](#datenbank)
    - [Display-Seiten](#display-seiten)
    - [Einbau in bestehenden System](#einbau-in-bestehenden-system)
    - [Admin-Tool](#admin-tool)
    - [Optionale Features](#optionale-features)
  - [Migration der Daten](#migration-der-daten)
  - [Milestones](#milestones)

<!-- /TOC -->

## TL;DR

Für eine bessere Verwaltung der O-Töne zu Themen in Messen wird eine Datenbank genutzt, die durch eine Webapplikation befüllt wird. Die Daten aus der Datenbank werden in Unterseiten geladen und dargestellt.

## Vorgaben

* Es gibt Messen mit Name, Link, Logo, Text, Themenservice.pdf
* Zu jeder Messe gibt es Themen.
* Es gibt Messen wo kein Themenservice notwendig ist. Hier sollte eine Möglichkeit des Weglassens sein. 
* Ein Thema besteht aus einem Titel, Text und einem PDF
* Zu jedem Thema gibt es O-Töne
* Diese sollen als Akkordeon dargestellt werden.
* Ein O-Ton besteht aus einem Titel, einem Text, einer mp3 und evtl einem Bild
* Die Lösung soll einfach in die vorhandene Struktur eingebunden werden können.
* Die Zugriffe sollen per Google-Analytics logbar sein

## Details

### Datenbank

Es wird eine MySQL-Datenbank mit folgenden Tabellen genutzt

* messen
	* id (PK, Auto Increment)
	* titel
	* slug (URL-Sichere Variante des Titels)
	* text
	* bild
	* link
	* themenservice
	* datum
	* sortierung
* themen
	* id (PK, Auto Increment)
	* titel
	* text
	* pdf
	* messen_id (FK)
* o-toene
	* id (PK, Auto Increment)
	* titel
	* text
	* bild
	* mp3
	* themen_id (FK)
* user
	* id (PK, Auto Increment)
	* login
	* password (salted hash)

### Display-Seiten

Folgende Fragmente werden für die Anzeige der Daten erzeugt und können dann eingebunden werden:

* navbar.php
	* Stellt die Messen mit Links zu den Messeseiten dar.
	* Als Liste: Simple Liste mit und ohne Bild, Titel und Link
	* Als Kacheln: Bilder als Kacheln mit Link
	* Als Streifen: Nur Logos mit Links als Streifen (nächste Veranstaltungen)
	* parameter Sortierung: Händisch oder Datum)
* messe_inhalt.php
	* Als Parameter den slug einer Messe
	* Enthält Messe-Informationen
	* Enthält die Themen als Akkordeon
	* In den Themen liegen die O-Töne mit Audio-Player (html5 -> <audio>)
	* Wenn es ein Bild gibt, liegt dieses als Thumbnail vor (server-gen). Beim rollover wird ein grosses angezeigt.
	* Die mp3 ist hier als sauberer Link hinterlegt um das Loggen in Analytics zu ermöglichen.

### Einbau in bestehenden System

Die vorhandene Index.php wird aufgeteilt in:  

* header.php (Alles vor dem Inhalt)  
* footer.php (Alles nach dem Inhalt)  

Es werden 2 neue Dateien erstellt:  

* index.php
	* include header.php
	* include navbar.php?type=list|grid
	* include footer.php
* messe.php?slug=SLUG_DER_MESSE
	* include header.php
	* include messe_inhalt.php?slug=SLUG_DER_MESSE
	* include footer.php

Empfohlen wird auch die Nutzung eines .htaccess-Mod-rewrites zur schöneren Darstellung (SEO-Friendly) der Links:

Aus *messe.php?slug=SLUG_DER_MESSE* wird dann **messe/SLUG_DER_MESSE**

### Admin-Tool

Das Admin-Tool ist eine kleine Webapplikation, geschrieben unter Verwendung der Frameworks Angular, Bootstrap und Dropzone.
Im hintergrund gibt es eine api.php, die die Daten aus der Datenbank zur Verfügung stellt.
Die Seite ist nur per Login erreichbar (interne Userverwaltung).

Als Drag'Drop-Plugin: https://github.com/marceljuenemann/angular-drag-and-drop-lists

Verwaltet werden hier:
* User (Anlegen, Löschen, Login/Passwort ändern)
* Messen (Anlegen, Löschen, Editieren, Sortieren)

Beim Anlegen und verwalten der Messen können Bilder und PDFs hochgeladen werden.

Die Messen können per Drag'n'Drop neu sortiert werden.
In der Anzeige kann ich auswählen, nach was ich sie hier sortiert haben will.

Beim Klick auf eine Messe kann ich die Messe verwalten und die Themen als Liste sehen.
Hier können Themen angelegt, gelöscht und bearbeitet werden.

Klicke ich hier auf ein Thema, kann ich das Thema verwalten und die O-Töne als Liste sehen.
In dieser Ansicht kann ich O-Töne anlegen, löschen und bearbeiten.
Bild und mp3-Datei lade ich hier per Drag'n'Drop hoch.

#### api.php

* Verb, Type, ID, Data in Variablen
* Jeder Type als Klasse mit Funktionen
* Switch-Case als Sender
* Send JSON

### Optionale Features

Aus der Nutzung einer Datenbank ergeben sich folgende Möglichkeiten:

* Podcast
	* ein dynamischer Podcast der mp3s kann erzeugt werden
* Suche
	* eine Suche über die Datenbank um zB bestimmte O-Töne zu finden.


## Migration der Daten

Die vorhandenen Daten können Skript-gesteuert oder per Hand in die Datenbank eingetragen werden.
Ich empfehle hier die händische Variante, da sie effizienter ist.

## Milestones

1. Datenbank und Zugriffseiten
	* Die Lösung kann nun eingebunden werden, die Daten werden händisch in die Datenbank eingetragen (phpmyadmin, ftp)
2. Admin-Tool
	* Ab hier können die Daten per Web eingetragen werden.

## Deployment

per FTP Sync