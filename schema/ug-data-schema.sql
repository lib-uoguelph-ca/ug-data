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
  `value` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `dataset_id` (`dataset_id` ASC) ,
  CONSTRAINT `did`
    FOREIGN KEY (`dataset_id` )
    REFERENCES `ug_data`.`datasets` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
