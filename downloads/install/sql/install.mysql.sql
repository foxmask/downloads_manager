CREATE TABLE %%PREFIX%%dl_downloads (
    id int(10) unsigned NOT NULL AUTO_INCREMENT,
    dl_name varchar(200) NOT NULL DEFAULT 'Nouveau fichier',
    login varchar(50) NOT NULL,
    dl_url varchar(200) NOT NULL DEFAULT 'nouveau-fichier',
    dl_filename varchar(200) DEFAULT NULL,
    dl_path varchar(255) NOT NULL,
    dl_desc text,
    dl_count int(10) unsigned NOT NULL DEFAULT '0',
    dl_date date NOT NULL,
    dl_disp_position int(10) NOT NULL DEFAULT '0',
    dl_enable tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (id),
    UNIQUE KEY dl_url (dl_url,dl_path),
    KEY dl_path (dl_path),
    KEY login (login)
) DEFAULT CHARSET=utf8 ENGINE=innodb;


CREATE TABLE %%PREFIX%%dl_downloads_users (
    login varchar(50) NOT NULL,
    path varchar(255) NOT NULL,
    project varchar(45) null,
    PRIMARY KEY (login,path)
) DEFAULT CHARSET=utf8 ENGINE=innodb;
