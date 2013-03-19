SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `ug_data` ;
CREATE SCHEMA IF NOT EXISTS `ug_data` DEFAULT CHARACTER SET utf8 ;
USE `ug_data` ;

-- -----------------------------------------------------
-- Table `ug_data`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ug_data`.`users` ;

CREATE  TABLE IF NOT EXISTS `ug_data`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(128) NOT NULL ,
  `email` VARCHAR(150) NOT NULL ,
  `password` VARCHAR(64) NOT NULL ,
  `created_at` TIMESTAMP NOT NULL ,
  `updated_at` TIMESTAMP NULL ,
  `admin` TINYINT(1) NULL DEFAULT false ,
  PRIMARY KEY (`id`) ,
  INDEX `username` (`username` ASC) ,
  INDEX `email` (`email` ASC) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ug_data`.`datasets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ug_data`.`datasets` ;

CREATE  TABLE IF NOT EXISTS `ug_data`.`datasets` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` TEXT NOT NULL ,
  `url` VARCHAR(500) NOT NULL ,
  `user_id` INT NOT NULL ,
  `description` TEXT NULL ,
  `created_at` TIMESTAMP NOT NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `dataset_owner` (`user_id` ASC) ,
  CONSTRAINT `dataset_owner`
    FOREIGN KEY (`user_id` )
    REFERENCES `ug_data`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ug_data`.`attributes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ug_data`.`attributes` ;

CREATE  TABLE IF NOT EXISTS `ug_data`.`attributes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dataset_id` INT NOT NULL ,
  `name` VARCHAR(100) NOT NULL ,
  `value` TEXT NOT NULL ,
  `created_at` TIMESTAMP NOT NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `dataset_id` (`dataset_id` ASC) ,
  INDEX `name` (`name` ASC, `dataset_id` ASC) ,
  CONSTRAINT `did`
    FOREIGN KEY (`dataset_id` )
    REFERENCES `ug_data`.`datasets` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `ug_data`;

DELIMITER $$

USE `ug_data`$$
DROP TRIGGER IF EXISTS `ug_data`.`datasets_on_insert` $$
USE `ug_data`$$


CREATE TRIGGER datasets_on_insert BEFORE INSERT
ON datasets
FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END

$$


DELIMITER ;

DELIMITER $$

USE `ug_data`$$
DROP TRIGGER IF EXISTS `ug_data`.`attributes_on_insert` $$
USE `ug_data`$$


CREATE TRIGGER attributes_on_insert BEFORE INSERT
ON attributes
FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END

$$


DELIMITER ;

DELIMITER $$

USE `ug_data`$$
DROP TRIGGER IF EXISTS `ug_data`.`users_on_insert` $$
USE `ug_data`$$


CREATE TRIGGER users_on_insert BEFORE INSERT
ON users
FOR EACH ROW BEGIN
    SET NEW.updated_at = NOW();
END
$$


DELIMITER ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `ug_data`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `ug_data`;
INSERT INTO `ug_data`.`users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `admin`) VALUES (1, 'doana', 'doana@uoguelph.ca', '$2a$08$5bzx6PM0gksnqGXMiTB8pep47gonPRhJrHVBSUjH3qqgeW/Ig4sUe', '', '', 1);
INSERT INTO `ug_data`.`users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `admin`) VALUES (2, 'cbreton', 'cbreton@uoguelph.ca', '$2a$08$ELfk39TVkZxsvKJkpo4Z4..5reTvm6Dn85GOnAQRCtPeqyOo4Jo5S', '', '', 1);
INSERT INTO `ug_data`.`users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `admin`) VALUES (3, 'carolp', 'carolp@uoguelph.ca', '$2a$08$Fnv.sF77PPuaHt4mwhOrTO/ZvEtjbCNUlZJsgwXO8tURRFUVu9S3G', '', '', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `ug_data`.`datasets`
-- -----------------------------------------------------
START TRANSACTION;
USE `ug_data`;
INSERT INTO `ug_data`.`datasets` (`id`, `name`, `url`, `user_id`, `description`, `created_at`, `updated_at`) VALUES (1, 'Adam', 'http://www.google.ca', 1, '<p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\"><img src=\"http://lorempixel.com/200/300/food/Adam\" style=\"font-size:13px;font-family:\'Lucida Grande\', \'Lucida Sans Unicode\', Tahoma, Helvetica, Verdana, sans-serif;line-height:1.5;\" alt=\"Awesome\" align=\"left\" /><span style=\"font-size:12px;line-height:1.5;\">Deep v labore cosby sweater organic four loko occupy. Tousled cillum synth dreamcatcher. VHS pariatur helvetica flexitarian. Typewriter fashion axe gastropub, 90\'s readymade put a bird on it direct trade terry richardson retro sriracha plaid shoreditch 8-bit ugh banh mi. Disrupt kogi nihil, mollit street art actually polaroid pinterest williamsburg VHS. Irure chambray retro brooklyn delectus, hella readymade terry richardson veniam. Umami carles lomo mlkshk duis, chambray salvia irure actually.</span></p><p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\">Delectus ethical photo booth craft beer high life, ut mixtape organic selfies wolf echo park pour-over narwhal godard cliche. Mumblecore officia leggings sunt narwhal, plaid put a bird on it tempor intelligentsia excepteur seitan art party freegan ex kogi. Actually labore before they sold out cardigan bushwick leggings. Cillum cupidatat DIY, wolf Austin mixtape literally excepteur. Bespoke eu seitan, ad master cleanse twee jean shorts magna 8-bit mlkshk flexitarian mixtape anim church-key. Literally cosby sweater ullamco church-key assumenda, letterpress locavore est 90\'s laborum intelligentsia bicycle rights nisi meggings stumptown. Chillwave bespoke occupy nesciunt, direct trade accusamus wolf beard food truck lomo gastropub jean shorts placeat vero.</p><p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\">Actually umami food truck incididunt shoreditch. Polaroid cliche ut VHS wes anderson, quinoa seitan ennui odio direct trade pinterest vinyl culpa truffaut sustainable. Deserunt in blue bottle cardigan salvia disrupt. Raw denim excepteur fap pork belly. Polaroid meh vice, portland neutra fingerstache VHS tattooed next level scenester pop-up quinoa skateboard wes anderson sartorial. Pickled keytar pariatur deep v. Messenger bag swag craft beer brooklyn labore, bushwick polaroid direct trade jean shorts officia ex pug eiusmod.</p>', '', NULL);
INSERT INTO `ug_data`.`datasets` (`id`, `name`, `url`, `user_id`, `description`, `created_at`, `updated_at`) VALUES (2, 'Tyler', 'http://www.google.ca', 1, '<p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\"><img src=\"http://lorempixel.com/200/300/technics/Tyler\" style=\"font-size:13px;font-family:\'Lucida Grande\', \'Lucida Sans Unicode\', Tahoma, Helvetica, Verdana, sans-serif;line-height:1.5;\" alt=\"Awesome\" align=\"left\" /><span style=\"font-size:12px;line-height:1.5;\">Deep v labore cosby sweater organic four loko occupy. Tousled cillum synth dreamcatcher. VHS pariatur helvetica flexitarian. Typewriter fashion axe gastropub, 90\'s readymade put a bird on it direct trade terry richardson retro sriracha plaid shoreditch 8-bit ugh banh mi. Disrupt kogi nihil, mollit street art actually polaroid pinterest williamsburg VHS. Irure chambray retro brooklyn delectus, hella readymade terry richardson veniam. Umami carles lomo mlkshk duis, chambray salvia irure actually.</span></p><p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\">Delectus ethical photo booth craft beer high life, ut mixtape organic selfies wolf echo park pour-over narwhal godard cliche. Mumblecore officia leggings sunt narwhal, plaid put a bird on it tempor intelligentsia excepteur seitan art party freegan ex kogi. Actually labore before they sold out cardigan bushwick leggings. Cillum cupidatat DIY, wolf Austin mixtape literally excepteur. Bespoke eu seitan, ad master cleanse twee jean shorts magna 8-bit mlkshk flexitarian mixtape anim church-key. Literally cosby sweater ullamco church-key assumenda, letterpress locavore est 90\'s laborum intelligentsia bicycle rights nisi meggings stumptown. Chillwave bespoke occupy nesciunt, direct trade accusamus wolf beard food truck lomo gastropub jean shorts placeat vero.</p><p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\">Actually umami food truck incididunt shoreditch. Polaroid cliche ut VHS wes anderson, quinoa seitan ennui odio direct trade pinterest vinyl culpa truffaut sustainable. Deserunt in blue bottle cardigan salvia disrupt. Raw denim excepteur fap pork belly. Polaroid meh vice, portland neutra fingerstache VHS tattooed next level scenester pop-up quinoa skateboard wes anderson sartorial. Pickled keytar pariatur deep v. Messenger bag swag craft beer brooklyn labore, bushwick polaroid direct trade jean shorts officia ex pug eiusmod.</p>', '', NULL);
INSERT INTO `ug_data`.`datasets` (`id`, `name`, `url`, `user_id`, `description`, `created_at`, `updated_at`) VALUES (3, 'Elisabeth', 'http://www.google.ca', 1, '<p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\"><img src=\"http://lorempixel.com/200/300/animals/Elisabeth\" style=\"font-size:13px;font-family:\'Lucida Grande\', \'Lucida Sans Unicode\', Tahoma, Helvetica, Verdana, sans-serif;line-height:1.5;\" alt=\"Awesome\" align=\"left\" /><span style=\"font-size:12px;line-height:1.5;\">Deep v labore cosby sweater organic four loko occupy. Tousled cillum synth dreamcatcher. VHS pariatur helvetica flexitarian. Typewriter fashion axe gastropub, 90\'s readymade put a bird on it direct trade terry richardson retro sriracha plaid shoreditch 8-bit ugh banh mi. Disrupt kogi nihil, mollit street art actually polaroid pinterest williamsburg VHS. Irure chambray retro brooklyn delectus, hella readymade terry richardson veniam. Umami carles lomo mlkshk duis, chambray salvia irure actually.</span></p><p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\">Delectus ethical photo booth craft beer high life, ut mixtape organic selfies wolf echo park pour-over narwhal godard cliche. Mumblecore officia leggings sunt narwhal, plaid put a bird on it tempor intelligentsia excepteur seitan art party freegan ex kogi. Actually labore before they sold out cardigan bushwick leggings. Cillum cupidatat DIY, wolf Austin mixtape literally excepteur. Bespoke eu seitan, ad master cleanse twee jean shorts magna 8-bit mlkshk flexitarian mixtape anim church-key. Literally cosby sweater ullamco church-key assumenda, letterpress locavore est 90\'s laborum intelligentsia bicycle rights nisi meggings stumptown. Chillwave bespoke occupy nesciunt, direct trade accusamus wolf beard food truck lomo gastropub jean shorts placeat vero.</p><p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\">Actually umami food truck incididunt shoreditch. Polaroid cliche ut VHS wes anderson, quinoa seitan ennui odio direct trade pinterest vinyl culpa truffaut sustainable. Deserunt in blue bottle cardigan salvia disrupt. Raw denim excepteur fap pork belly. Polaroid meh vice, portland neutra fingerstache VHS tattooed next level scenester pop-up quinoa skateboard wes anderson sartorial. Pickled keytar pariatur deep v. Messenger bag swag craft beer brooklyn labore, bushwick polaroid direct trade jean shorts officia ex pug eiusmod.</p>', '', NULL);
INSERT INTO `ug_data`.`datasets` (`id`, `name`, `url`, `user_id`, `description`, `created_at`, `updated_at`) VALUES (4, 'Sarah', 'http://www.google.ca', 1, '<p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\"><img src=\"http://lorempixel.com/200/300/nature/Sarah\" style=\"font-size:13px;font-family:\'Lucida Grande\', \'Lucida Sans Unicode\', Tahoma, Helvetica, Verdana, sans-serif;line-height:1.5;\" alt=\"Awesome\" align=\"left\" /><span style=\"font-size:12px;line-height:1.5;\">Deep v labore cosby sweater organic four loko occupy. Tousled cillum synth dreamcatcher. VHS pariatur helvetica flexitarian. Typewriter fashion axe gastropub, 90\'s readymade put a bird on it direct trade terry richardson retro sriracha plaid shoreditch 8-bit ugh banh mi. Disrupt kogi nihil, mollit street art actually polaroid pinterest williamsburg VHS. Irure chambray retro brooklyn delectus, hella readymade terry richardson veniam. Umami carles lomo mlkshk duis, chambray salvia irure actually.</span></p><p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\">Delectus ethical photo booth craft beer high life, ut mixtape organic selfies wolf echo park pour-over narwhal godard cliche. Mumblecore officia leggings sunt narwhal, plaid put a bird on it tempor intelligentsia excepteur seitan art party freegan ex kogi. Actually labore before they sold out cardigan bushwick leggings. Cillum cupidatat DIY, wolf Austin mixtape literally excepteur. Bespoke eu seitan, ad master cleanse twee jean shorts magna 8-bit mlkshk flexitarian mixtape anim church-key. Literally cosby sweater ullamco church-key assumenda, letterpress locavore est 90\'s laborum intelligentsia bicycle rights nisi meggings stumptown. Chillwave bespoke occupy nesciunt, direct trade accusamus wolf beard food truck lomo gastropub jean shorts placeat vero.</p><p style=\"font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:12px;margin-bottom:1.625em;color:rgb(55,55,55);\">Actually umami food truck incididunt shoreditch. Polaroid cliche ut VHS wes anderson, quinoa seitan ennui odio direct trade pinterest vinyl culpa truffaut sustainable. Deserunt in blue bottle cardigan salvia disrupt. Raw denim excepteur fap pork belly. Polaroid meh vice, portland neutra fingerstache VHS tattooed next level scenester pop-up quinoa skateboard wes anderson sartorial. Pickled keytar pariatur deep v. Messenger bag swag craft beer brooklyn labore, bushwick polaroid direct trade jean shorts officia ex pug eiusmod.</p>', '', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `ug_data`.`attributes`
-- -----------------------------------------------------
START TRANSACTION;
USE `ug_data`;
INSERT INTO `ug_data`.`attributes` (`id`, `dataset_id`, `name`, `value`, `created_at`, `updated_at`) VALUES (1, 1, 'test1', '<h1>HTML Ipsum Presents</h1>	       <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href=\"#\">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p><h2>Header Level 2</h2>	       <ol>   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>   <li>Aliquam tincidunt mauris eu risus.</li></ol><blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote><h3>Header Level 3</h3><ul>   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>   <li>Aliquam tincidunt mauris eu risus.</li></ul><pre><code>#header h1 a {	display: block; 	width: 300px; 	height: 80px; }</code></pre>', '', '');
INSERT INTO `ug_data`.`attributes` (`id`, `dataset_id`, `name`, `value`, `created_at`, `updated_at`) VALUES (2, 1, 'test2', 'awesomer', '', '');

COMMIT;
