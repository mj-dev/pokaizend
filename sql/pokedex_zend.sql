-- MySQL Script generated by MySQL Workbench
-- 07/15/17 15:44:04
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema pokedex_zend
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pokedex_zend
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pokedex_zend` DEFAULT CHARACTER SET utf8 ;
USE `pokedex_zend` ;

-- -----------------------------------------------------
-- Table `pokedex_zend`.`pokemon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pokedex_zend`.`pokemon` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `national_id` VARCHAR(3) NULL,
  `name` VARCHAR(255) NULL,
  `description` VARCHAR(255) NULL,
  `type1` INT NULL,
  `type2` INT NULL,
  `previous_pokemon` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pokedex_zend`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pokedex_zend`.`type` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `color1` VARCHAR(45) NULL,
  `color2` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
