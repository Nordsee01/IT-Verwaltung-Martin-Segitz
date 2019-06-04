INSERT INTO lieferant VALUES (
1,
"Lieferungen GmbH",
"Klostergasse",
"87681",
"Nuernberg",
"76967",
"0173693229",
"7864760",
"Lieferungen@email.com"
);

INSERT INTO lieferant VALUES (
2,
"Lieferfirma",
"Weidenweg",
"92371",
"Fuerth",
"83484",
"0157839032",
"73629072",
"Lieferfirma@email.de"
);

INSERT INTO raeume (r_nr, r_bezeichnung, r_notiz) VALUES (
017,
"Computerraum",
"IF11C Projektraum"
);

INSERT INTO raeume (r_nr, r_bezeichnung, r_notiz) VALUES (
316,
"Klassenzimmer",
"IF11C Klassenzimmer"
);

INSERT INTO raeume (r_nr, r_bezeichnung, r_notiz) VALUES (
009,
"Mehrzweckraum",
"Aquarium"
);

INSERT INTO komponenten (
    k_id,
    k_bezeichnung,
    raeume_r_id,
    lieferant_l_id,
    k_einkaufsdatum,
    k_gewaehrleistungsdauer,
    k_notiz,
    k_hersteller,
    komponentenarten_ka_id
    ) VALUES (
        1,
        "PC01",
        1,
        1,
        sysdate(),
        3,
        "PC01 im Raum 017",
        "Lenovo",
        1
    );

INSERT INTO komponenten (
    k_id,
    k_bezeichnung,
    raeume_r_id,
    lieferant_l_id,
    k_einkaufsdatum,
    k_gewaehrleistungsdauer,
    k_notiz,
    k_hersteller,
    komponentenarten_ka_id
    ) VALUES (
        2,
        "PC02",
        1,
        2,
        sysdate(),
        5,
        "PC02 im Raum 017",
        "Lenovo",
        1
    );

INSERT INTO komponenten (
    k_id,
    k_bezeichnung,
    raeume_r_id,
    lieferant_l_id,
    k_einkaufsdatum,
    k_gewaehrleistungsdauer,
    k_notiz,
    k_hersteller,
    komponentenarten_ka_id
    ) VALUES (
        2,
        "PC02",
        1,
        2,
        sysdate(),
        5,
        "PC02 im Raum 017",
        "Lenovo",
        1
    );

INSERT INTO komponenten (
    k_id,
    k_bezeichnung,
    raeume_r_id,
    lieferant_l_id,
    k_einkaufsdatum,
    k_gewaehrleistungsdauer,
    k_notiz,
    k_hersteller,
    komponentenarten_ka_id
    ) VALUES (
        3,
        "Beamer01",
        2,
        2,
        sysdate(),
        0,
        "Beamer im Raum 316",
        "NEC",
        6
    );

INSERT INTO komponenten (
    k_id,
    k_bezeichnung,
    raeume_r_id,
    lieferant_l_id,
    k_einkaufsdatum,
    k_gewaehrleistungsdauer,
    k_notiz,
    k_hersteller,
    komponentenarten_ka_id
    ) VALUES (
        4,
        "Switch01",
        1,
        2,
        sysdate(),
        7,
        "Switch inm Raum 017",
        "Cisco",
        2
    );

INSERT INTO komponente_hat_attribute (
    komponenten_k_id,
    komponentenattribute_kat_id,
    khkat_wert
) VALUES (
1,
1,
"UTZFUUI123IZGF2987JK"
);

INSERT INTO komponente_hat_attribute (
    komponenten_k_id,
    komponentenattribute_kat_id,
    khkat_wert
) VALUES (
    1,
    2,
    "8 GB"
);

INSERT INTO komponente_hat_attribute (
    komponenten_k_id,
    komponentenattribute_kat_id,
    khkat_wert
) VALUES (
    1,
    3,
    "Intel Core i7 7900K"
);

INSERT INTO komponente_hat_attribute (
    komponenten_k_id,
    komponentenattribute_kat_id,
    khkat_wert
) VALUES (
    1,
    4,
    "500 GB"
);
INSERT INTO komponente_hat_attribute (
    komponenten_k_id,
    komponentenattribute_kat_id,
    khkat_wert
) VALUES (
    1,
    5,
    "SSD"
);

INSERT INTO komponente_hat_attribute (
    komponenten_k_id,
    komponentenattribute_kat_id,
    khkat_wert
) VALUES (
    1,
    6,
    "2x HDMI, 1x VGA"
);

