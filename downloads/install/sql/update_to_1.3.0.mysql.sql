ALTER TABLE %%PREFIX%%downloads DROP dl_on_block ;
ALTER TABLE %%PREFIX%%downloads_user ADD COLUMN project varchar(45) null;
