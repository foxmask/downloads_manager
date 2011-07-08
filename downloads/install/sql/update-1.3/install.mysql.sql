ALTER TABLE `downloads` DROP `dl_on_block` ;
ALTER TABLE `downloads_user` ADD COLUMN `project` varchar(45) null;