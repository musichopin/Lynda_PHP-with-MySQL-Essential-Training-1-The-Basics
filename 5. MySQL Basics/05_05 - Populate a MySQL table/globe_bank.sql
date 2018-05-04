DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,#NOT NULL needless,primary key otomatik not null
  `menu_name` varchar(255) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `subjects` VALUES (1,'About Globe Bank',1,1),(2,'Consumer',2,1),(3,'Small Business',3,0);

# using limit statement 4 security: delete from subjects where id = 5 limit 1;

# changing column, type and options: ALTER TABLE `subjects` CHANGE `visible` `visible` TINYINT(1) DEFAULT NOT NULL;

# adding primary key: ALTER TABLE `globe_bank`.`subjects` DROP PRIMARY KEY, ADD PRIMARY KEY (`id`);

# adding foreign key: ALTER TABLE `globe_bank`.`pages` ADD CONSTRAINT fk_subject_id FOREIGN KEY (subject_id) REFERENCES subjects(id);
