CREATE TABLE tt_content (
    tx_gurado_shop varchar(255) DEFAULT '' NOT NULL,
    tx_gurado_mode varchar(16) DEFAULT 'embedded' NOT NULL,
    tx_gurado_page varchar(16) DEFAULT '' NOT NULL,
    tx_gurado_product int(11) DEFAULT '0' NOT NULL,
    tx_gurado_align varchar(8) DEFAULT 'left' NOT NULL,
    tx_gurado_offset_x varchar(24) DEFAULT '' NOT NULL,
    tx_gurado_offset_y varchar(24) DEFAULT '' NOT NULL
);
