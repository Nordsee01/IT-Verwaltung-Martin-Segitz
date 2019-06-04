-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Jul 2015 um 23:13
-- Server-Version: 5.6.24
-- PHP-Version: 5.6.8


--V04
-- rol: Hinzufügen einer Komponentenbezeichnung (z.B. Galaxy S10)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `itv_v04`
--

DROP DATABASE IF EXISTS `itv_v04`;
CREATE DATABASE IF NOT EXISTS `itv_v04` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `itv_v04`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponenten`
--

CREATE TABLE IF NOT EXISTS `komponenten` (
  `k_id` int(11) NOT NULL,
  `k_bezeichnung` varchar(100) NOT NULL,
  `raeume_r_id` int(11) NOT NULL,
  `lieferant_l_id` int(11) NOT NULL,
  `k_einkaufsdatum` date DEFAULT NULL,
  `k_gewaehrleistungsdauer` int(11) DEFAULT NULL,
  `k_notiz` varchar(1024) DEFAULT NULL,
  `k_hersteller` varchar(45) DEFAULT NULL,
  `komponentenarten_ka_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentenarten`
--

CREATE TABLE IF NOT EXISTS `komponentenarten` (
  `ka_id` int(11) NOT NULL,
  `ka_komponentenart` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponentenattribute`
--

CREATE TABLE IF NOT EXISTS `komponentenattribute` (
  `kat_id` int(11) NOT NULL,
  `kat_bezeichnung` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komponente_hat_attribute`
--

CREATE TABLE IF NOT EXISTS `komponente_hat_attribute` (
  `komponenten_k_id` int(11) NOT NULL,
  `komponentenattribute_kat_id` int(11) NOT NULL,
  `khkat_wert` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lieferant`
--

CREATE TABLE IF NOT EXISTS `lieferant` (
  `l_id` int(11) NOT NULL,
  `l_firmenname` varchar(45) DEFAULT NULL,
  `l_strasse` varchar(45) DEFAULT NULL,
  `l_plz` varchar(5) DEFAULT NULL,
  `l_ort` varchar(45) DEFAULT NULL,
  `l_tel` varchar(20) DEFAULT NULL,
  `l_mobil` varchar(20) DEFAULT NULL,
  `l_fax` varchar(20) DEFAULT NULL,
  `l_email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `raeume`
--

CREATE TABLE IF NOT EXISTS `raeume` (
  `r_id` int(11) NOT NULL,
  `r_nr` varchar(20) DEFAULT NULL COMMENT 'z.B. r014, W304, etc.',
  `r_bezeichnung` varchar(45) DEFAULT NULL COMMENT 'z.B. Werkstatt, Lager,...',
  `r_notiz` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `software_in_raum`
--

CREATE TABLE IF NOT EXISTS `software_in_raum` (
  `sir_k_id` int(11) NOT NULL,
  `sir_r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wird_beschrieben_durch`
--

CREATE TABLE IF NOT EXISTS `wird_beschrieben_durch` (
  `komponentenarten_ka_id` int(11) NOT NULL,
  `komponentenattribute_kat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `komponenten`
--
ALTER TABLE `komponenten`
  ADD PRIMARY KEY (`k_id`), ADD KEY `fk_komponenten_haendler` (`lieferant_l_id`), ADD KEY `fk_komponenten_raeume1` (`raeume_r_id`), ADD KEY `fk_komponenten_komponentenarten1` (`komponentenarten_ka_id`);

--
-- Indizes für die Tabelle `komponentenarten`
--
ALTER TABLE `komponentenarten`
  ADD PRIMARY KEY (`ka_id`);

--
-- Indizes für die Tabelle `komponentenattribute`
--
ALTER TABLE `komponentenattribute`
  ADD PRIMARY KEY (`kat_id`);

--
-- Indizes für die Tabelle `komponente_hat_attribute`
--
ALTER TABLE `komponente_hat_attribute`
  ADD PRIMARY KEY (`komponenten_k_id`,`komponentenattribute_kat_id`), ADD KEY `fk_komponenten_has_komponentenattribute_komponentenattribute1` (`komponentenattribute_kat_id`), ADD KEY `fk_komponenten_has_komponentenattribute_komponenten1` (`komponenten_k_id`);

--
-- Indizes für die Tabelle `lieferant`
--
ALTER TABLE `lieferant`
  ADD PRIMARY KEY (`l_id`);

--
-- Indizes für die Tabelle `raeume`
--
ALTER TABLE `raeume`
  ADD PRIMARY KEY (`r_id`);

--
-- Indizes für die Tabelle `software_in_raum`
--
ALTER TABLE `software_in_raum`
  ADD PRIMARY KEY (`sir_k_id`,`sir_r_id`), ADD KEY `sir_r_id` (`sir_r_id`);

--
-- Indizes für die Tabelle `wird_beschrieben_durch`
--
ALTER TABLE `wird_beschrieben_durch`
  ADD PRIMARY KEY (`komponentenarten_ka_id`,`komponentenattribute_kat_id`), ADD KEY `fk_komponentenarten_has_komponentenattribute_komponentenattri1` (`komponentenattribute_kat_id`), ADD KEY `fk_komponentenarten_has_komponentenattribute_komponentenarten1` (`komponentenarten_ka_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `lieferant`
--
ALTER TABLE `lieferant`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `raeume`
--
ALTER TABLE `raeume`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `komponenten`
--
ALTER TABLE `komponenten`
ADD CONSTRAINT `fk_komponenten_haendler` FOREIGN KEY (`lieferant_l_id`) REFERENCES `lieferant` (`l_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_komponenten_komponentenarten1` FOREIGN KEY (`komponentenarten_ka_id`) REFERENCES `komponentenarten` (`ka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `komponenten_ibfk_1` FOREIGN KEY (`raeume_r_id`) REFERENCES `raeume` (`r_id`);

--
-- Constraints der Tabelle `komponente_hat_attribute`
--
ALTER TABLE `komponente_hat_attribute`
ADD CONSTRAINT `fk_komponenten_has_komponentenattribute_komponenten1` FOREIGN KEY (`komponenten_k_id`) REFERENCES `komponenten` (`k_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_komponenten_has_komponentenattribute_komponentenattribute1` FOREIGN KEY (`komponentenattribute_kat_id`) REFERENCES `komponentenattribute` (`kat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `software_in_raum`
--
ALTER TABLE `software_in_raum`
ADD CONSTRAINT `software_in_raum_ibfk_1` FOREIGN KEY (`sir_r_id`) REFERENCES `raeume` (`r_id`),
ADD CONSTRAINT `software_in_raum_ibfk_2` FOREIGN KEY (`sir_k_id`) REFERENCES `komponenten` (`k_id`);

--
-- Constraints der Tabelle `wird_beschrieben_durch`
--
ALTER TABLE `wird_beschrieben_durch`
ADD CONSTRAINT `fk_komponentenarten_has_komponentenattribute_komponentenarten1` FOREIGN KEY (`komponentenarten_ka_id`) REFERENCES `komponentenarten` (`ka_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_komponentenarten_has_komponentenattribute_komponentenattri1` FOREIGN KEY (`komponentenattribute_kat_id`) REFERENCES `komponentenattribute` (`kat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
