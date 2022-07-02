-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema mosa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mosa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mosa` DEFAULT CHARACTER SET latin1 ;
USE `mosa` ;

-- -----------------------------------------------------
-- Table `mosa`.`executives`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mosa`.`executives` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL DEFAULT NULL,
  `position` VARCHAR(100) NULL DEFAULT NULL,
  `vote` INT(11) NULL DEFAULT NULL,
  `img` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mosa`.`financial_secretary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mosa`.`financial_secretary` (
  `name` VARCHAR(100) NOT NULL,
  `vote` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mosa`.`organizer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mosa`.`organizer` (
  `name` VARCHAR(100) NOT NULL,
  `vote` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mosa`.`pass`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mosa`.`pass` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `pass` INT(11) NULL DEFAULT NULL,
  `section` INT(11) NULL DEFAULT NULL,
  `done` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mosa`.`president`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mosa`.`president` (
  `name` VARCHAR(100) NOT NULL,
  `vote` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mosa`.`pro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mosa`.`pro` (
  `name` VARCHAR(100) NOT NULL,
  `vote` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mosa`.`secretary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mosa`.`secretary` (
  `name` VARCHAR(100) NOT NULL,
  `vote` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mosa`.`vice_president`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mosa`.`vice_president` (
  `name` VARCHAR(100) NOT NULL,
  `vote` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
