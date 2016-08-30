CREATE TABLE IF NOT EXISTS `guestbook` 
( 
`id` INT(11) NOT NULL AUTO_INCREMENT ,  
`crdate` DATETIME NOT NULL ,  
`name` VARCHAR(255) NOT NULL ,  
`message` TEXT NOT NULL ,    
PRIMARY KEY  (`id`)
) 
ENGINE = InnoDB