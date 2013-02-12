SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `ug_data` ;
CREATE SCHEMA IF NOT EXISTS `ug_data` DEFAULT CHARACTER SET utf8 ;
USE `ug_data` ;

-- -----------------------------------------------------
-- Table `ug_data`.`datasets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ug_data`.`datasets` ;

CREATE  TABLE IF NOT EXISTS `ug_data`.`datasets` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` TEXT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
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
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `dataset_id` (`dataset_id` ASC) ,
  INDEX `name` (`name` ASC, `dataset_id` ASC) ,
  CONSTRAINT `did`
    FOREIGN KEY (`dataset_id` )
    REFERENCES `ug_data`.`datasets` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `ug_data`.`datasets`
-- -----------------------------------------------------
START TRANSACTION;
USE `ug_data`;
INSERT INTO `ug_data`.`datasets` (`id`, `name`) VALUES (1, 'Adam');
INSERT INTO `ug_data`.`datasets` (`id`, `name`) VALUES (2, 'Tyler');
INSERT INTO `ug_data`.`datasets` (`id`, `name`) VALUES (3, 'Elisabeth');
INSERT INTO `ug_data`.`datasets` (`id`, `name`) VALUES (4, 'Sarah');

COMMIT;

-- -----------------------------------------------------
-- Data for table `ug_data`.`attributes`
-- -----------------------------------------------------
START TRANSACTION;
USE `ug_data`;
INSERT INTO `ug_data`.`attributes` (`id`, `dataset_id`, `name`, `value`) VALUES (1, 1, 'test1', '<h1>HTML Ipsum Presents</h1>	       <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href=\"#\">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p><h2>Header Level 2</h2>	       <ol>   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>   <li>Aliquam tincidunt mauris eu risus.</li></ol><blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote><h3>Header Level 3</h3><ul>   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>   <li>Aliquam tincidunt mauris eu risus.</li></ul><pre><code>#header h1 a {	display: block; 	width: 300px; 	height: 80px; }</code></pre>');
INSERT INTO `ug_data`.`attributes` (`id`, `dataset_id`, `name`, `value`) VALUES (2, 1, 'test2', 'awesomer');

COMMIT;
