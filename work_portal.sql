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
  `username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id_idx` (`user_id` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
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
  `website` VARCHAR(45) NULL,
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


-- -----------------------------------------------------
-- Data for table `work_portal`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `work_portal`;
INSERT INTO `work_portal`.`users` (`id`, `email`, `password`, `type_id`) VALUES (1, 'aldoziflaj95@gmail.com', '$2y$10$JGt2SjdnHj.6nnlcSfMaaeEzP5F2jUoxnnnMaPvH1UTJxIBN4Rd9q', 2);
INSERT INTO `work_portal`.`users` (`id`, `email`, `password`, `type_id`) VALUES (DEFAULT, 'jamesbond@mi6.gov.uk', '$2y$10$a3AKOJZGP8FA2r4x5JFNGe4aHxhKNM8U1jPPcI.OQduQiWaXL.YgC', 1);
INSERT INTO `work_portal`.`users` (`id`, `email`, `password`, `type_id`) VALUES (DEFAULT, 'hr@infosoft.al', '$2y$10$PRLYHfgmYzMNgtct/0C.WO9uPBUi.VshZ8phNkGYyn8f3JsJhjhla', 3);
INSERT INTO `work_portal`.`users` (`id`, `email`, `password`, `type_id`) VALUES (DEFAULT, 'hr@ikub.al', '$2y$10$QYn8yvmK4HvFlwuWU/lB5.JxZC6k2tuQMNQLw6JAeQfbqsfMYRK06', 3);
INSERT INTO `work_portal`.`users` (`id`, `email`, `password`, `type_id`) VALUES (DEFAULT, 'adervishi@example.com', '$2y$10$nSchkxVj9RorQ9LcAnyZ0eZxk7/l4neJ89wsV7rjzDn5.Bs1v5Iy.', 2);
INSERT INTO `work_portal`.`users` (`id`, `email`, `password`, `type_id`) VALUES (DEFAULT, 'krist_hoxha@yxample.com', '$2y$10$EViCzU2WOYUIPwLPYf1BfuiFlPJHYSKnet5EA49cnb.5FXq7AeHGC', 2);
INSERT INTO `work_portal`.`users` (`id`, `email`, `password`, `type_id`) VALUES (DEFAULT, 'denis.turhani@hotmail.com', '$2y$10$G4XmCyVfCu0IgRMIqJ/Pz.YTOUIDQlgDNNr2kgrD/b9unVVhdxtc2', 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `work_portal`.`students`
-- -----------------------------------------------------
START TRANSACTION;
USE `work_portal`;
INSERT INTO `work_portal`.`students` (`id`, `first_name`, `last_name`, `user_id`, `cv_url`, `dob`, `degree`) VALUES (DEFAULT, 'Aldo', 'Ziflaj', 1, '', '1995-05-05', 'undergraduate');
INSERT INTO `work_portal`.`students` (`id`, `first_name`, `last_name`, `user_id`, `cv_url`, `dob`, `degree`) VALUES (DEFAULT, 'Alban', 'Dervishi', 5, '', '1975-11-04', 'master');
INSERT INTO `work_portal`.`students` (`id`, `first_name`, `last_name`, `user_id`, `cv_url`, `dob`, `degree`) VALUES (DEFAULT, 'Kristi', 'Hoxha', 6, '', '1990-07-11', 'master');
INSERT INTO `work_portal`.`students` (`id`, `first_name`, `last_name`, `user_id`, `cv_url`, `dob`, `degree`) VALUES (DEFAULT, 'Denis', 'Turhani', 7, '', '1994-02-14', 'undergraduate');

COMMIT;


-- -----------------------------------------------------
-- Data for table `work_portal`.`admins`
-- -----------------------------------------------------
START TRANSACTION;
USE `work_portal`;
INSERT INTO `work_portal`.`admins` (`id`, `first_name`, `last_name`, `user_id`, `username`) VALUES (DEFAULT, 'James', 'Bond', 2, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `work_portal`.`companies`
-- -----------------------------------------------------
START TRANSACTION;
USE `work_portal`;
INSERT INTO `work_portal`.`companies` (`id`, `company_name`, `user_id`, `description`, `website`) VALUES (DEFAULT, 'InfoSoft', 3, 'Lider i njohur në Shqipëri, me aftësi prijëse biznesi në industri, i suksesshëm dhe sfidues në tregun rajonal me një eksperiencë 20 vjecare', 'http://infosoft.al/');
INSERT INTO `work_portal`.`companies` (`id`, `company_name`, `user_id`, `description`, `website`) VALUES (DEFAULT, 'Ikub', 4, 'Kompania ikub.al sh.p.k. nisi punën e saj në vitin 2006, me një nga iniciativat më të suksesshme në treg, portalin e informacionit ikub.al.', 'http://kompania.ikub.al/');

COMMIT;
