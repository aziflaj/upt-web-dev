-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema work_portal
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema work_portal
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `work_portal` DEFAULT CHARACTER SET utf8 ;
USE `work_portal` ;

-- -----------------------------------------------------
-- Table `work_portal`.`types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_portal`.`types` ;

CREATE TABLE IF NOT EXISTS `work_portal`.`types` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `type_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `work_portal`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_portal`.`users` ;

CREATE TABLE IF NOT EXISTS `work_portal`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NULL,
  `type_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `type_id_idx` (`type_id` ASC),
  CONSTRAINT `type_id`
    FOREIGN KEY (`type_id`)
    REFERENCES `work_portal`.`types` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `work_portal`.`students`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_portal`.`students` ;

CREATE TABLE IF NOT EXISTS `work_portal`.`students` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `cv_url` VARCHAR(255) NULL,
  `dob` DATE NOT NULL,
  `degree` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_idx` (`user_id` ASC),
  CONSTRAINT `student_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `work_portal`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `work_portal`.`admins`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_portal`.`admins` ;

CREATE TABLE IF NOT EXISTS `work_portal`.`admins` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id_idx` (`user_id` ASC),
  CONSTRAINT `admin_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `work_portal`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `work_portal`.`companies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_portal`.`companies` ;

CREATE TABLE IF NOT EXISTS `work_portal`.`companies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `company_name` VARCHAR(45) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id_idx` (`user_id` ASC),
  CONSTRAINT `company_user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `work_portal`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `work_portal`.`job_entries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_portal`.`job_entries` ;

CREATE TABLE IF NOT EXISTS `work_portal`.`job_entries` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `company_id` INT(11) NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `company_id_idx` (`company_id` ASC),
  CONSTRAINT `company_id`
    FOREIGN KEY (`company_id`)
    REFERENCES `work_portal`.`companies` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `work_portal`.`students_interested`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_portal`.`students_interested` ;

CREATE TABLE IF NOT EXISTS `work_portal`.`students_interested` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `position_id` INT(11) NOT NULL,
  `student_id` INT(11) NOT NULL,
  `company_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `company_id_idx` (`company_id` ASC),
  INDEX `student_id_idx` (`student_id` ASC),
  INDEX `position_id_idx` (`position_id` ASC),
  CONSTRAINT `interest_student_id`
    FOREIGN KEY (`student_id`)
    REFERENCES `work_portal`.`students` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `interest_company_id`
    FOREIGN KEY (`company_id`)
    REFERENCES `work_portal`.`companies` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `interest_position_id`
    FOREIGN KEY (`position_id`)
    REFERENCES `work_portal`.`job_entries` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `work_portal`.`admin_notifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `work_portal`.`admin_notifications` ;

CREATE TABLE IF NOT EXISTS `work_portal`.`admin_notifications` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  `admin_id` INT(11) NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `admin_id_idx` (`admin_id` ASC),
  CONSTRAINT `admin_id`
    FOREIGN KEY (`admin_id`)
    REFERENCES `work_portal`.`admins` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `work_portal`.`types`
-- -----------------------------------------------------
START TRANSACTION;
USE `work_portal`;
INSERT INTO `work_portal`.`types` (`id`, `type_name`) VALUES (1, 'admin');
INSERT INTO `work_portal`.`types` (`id`, `type_name`) VALUES (2, 'student');
INSERT INTO `work_portal`.`types` (`id`, `type_name`) VALUES (3, 'company');

COMMIT;
