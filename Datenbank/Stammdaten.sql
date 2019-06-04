--Einfügen aller Stammdaten

--Komponentenattributte--------------------------------------

INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(1, "Seriennummer");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(2, "Ram Groeße");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(3, "CPU Bezeichnung");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(4, "Festplatte Groeße");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(5, "Festplattentyp");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(6, "Grafikausgang");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(7, "Anzahl Ports");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(8, "Uplinktyp");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(9, "WLAN-Standard");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(10, "Druckertyp");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(11, "DruckerArt");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(12, "Druckformat");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(13, "Beidseitig");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(14, "ANSI-Lumen");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(15, "Eingang");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(16, "Lautsprecher");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(17, "Anschlusstyp");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(18, "Versionsnummer");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(19, "Lizenztyp");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(20, "Lizenzanzahl");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(21, "Lizenzlaufzeit");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(22, "Lizenzinformationen");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(23, "Installationshinweise");
INSERT INTO komponentenattribute (kat_id, kat_bezeichnung) VALUES(24, "IP-Adresse");


--Komponentenarten---------------------------------------------

INSERT INTO komponentenarten (ka_id, ka_komponentenart) VALUES(1, "PC");
INSERT INTO komponentenarten (ka_id, ka_komponentenart) VALUES(2, "Switch");
INSERT INTO komponentenarten (ka_id, ka_komponentenart) VALUES(3, "Router");
INSERT INTO komponentenarten (ka_id, ka_komponentenart) VALUES(4, "Accesspoint");
INSERT INTO komponentenarten (ka_id, ka_komponentenart) VALUES(5, "Drucker");
INSERT INTO komponentenarten (ka_id, ka_komponentenart) VALUES(6, "Beamer");
INSERT INTO komponentenarten (ka_id, ka_komponentenart) VALUES(7, "Visualizer");
INSERT INTO komponentenarten (ka_id, ka_komponentenart) VALUES(8, "Software");

--wird_beschrieben_durch-------------------------------------------
--PC--
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(1, 1);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(1, 2);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(1, 3);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(1, 4);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(1, 5);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(1, 6);
--Switch--
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(2, 1);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(2, 7);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(2, 8);
--Router--
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(3, 1);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(3, 7);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(3, 24);
--Accesspoint--
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(4, 1);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(4, 9);
--Drucker--
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(5, 1);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(5, 10);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(5, 11);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(5, 12);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(5, 13);
--Beamer--
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(6, 1);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(6, 14);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(6, 15);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(6, 16);
--Visualizer--
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(7, 1);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(7, 17);
--Software--
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(8, 18);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(8, 19);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(8, 20);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(8, 21);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(8, 22);
INSERT INTO wird_beschrieben_durch (komponentenarten_ka_id, komponentenattribute_kat_id) VALUES(8, 23);

