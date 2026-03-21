-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema golden_bee_market
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema golden_bee_market
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `golden_bee_market` DEFAULT CHARACTER SET utf8mb4 ;
USE `golden_bee_market` ;

-- -----------------------------------------------------
-- Table `golden_bee_market`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `golden_bee_market`.`users` (
  `id` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NULL,
  `phone` VARCHAR(10) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `kyc_status` VARCHAR(45) NULL,
  `id_image` VARCHAR(255) NULL,
  `role` VARCHAR(45) NULL,
  `rating` FLOAT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `golden_bee_market`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `golden_bee_market`.`categories` (
  `id` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NULL,
  `slug` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `golden_bee_market`.`listing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `golden_bee_market`.`listing` (
  `id` VARCHAR(45) NOT NULL,
  `title` VARCHAR(255) NULL,
  `domain` VARCHAR(255) NULL,
  `founding_year` YEAR(4) NULL,
  `programming_language` VARCHAR(255) NULL,
  `cms` VARCHAR(255) NULL,
  `hosting` VARCHAR(45) NULL,
  `monthly_traffic` INT NULL,
  `traffic_source` VARCHAR(255) NULL,
  `is_verified` TINYINT NULL DEFAULT 0,
  `operating_cost` DECIMAL(15,2) NULL,
  `monthly_profit` DECIMAL(15,2) NULL,
  `status` ENUM('pending', 'active', 'sold', 'hidden', 'rejected') NOT NULL DEFAULT 'pending',
  `monthly_revenue` DECIMAL(15,2) NULL,
  `slug` VARCHAR(255) NULL,
  `create_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `categories_id` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_listing_categories1_idx` (`categories_id` ASC),
  CONSTRAINT `fk_listing_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `golden_bee_market`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `golden_bee_market`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `golden_bee_market`.`messages` (
  `id` VARCHAR(45) NOT NULL,
  `sender_id` VARCHAR(45) NOT NULL,
  `receiver_id` VARCHAR(45) NOT NULL,
  `is_read` TINYINT NULL DEFAULT 0,
  `content` LONGTEXT NULL,
  `listing_id` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_messages_listing_idx` (`listing_id` ASC),
  INDEX `fk_messages_reciever_idx` (`receiver_id` ASC),
  INDEX `fk_messages_sender_idx` (`sender_id` ASC),
  CONSTRAINT `fk_messages_listing`
    FOREIGN KEY (`listing_id`)
    REFERENCES `golden_bee_market`.`listing` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_reciever`
    FOREIGN KEY (`receiver_id`)
    REFERENCES `golden_bee_market`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_sender`
    FOREIGN KEY (`sender_id`)
    REFERENCES `golden_bee_market`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `golden_bee_market`.`transactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `golden_bee_market`.`transactions` (
  `id` VARCHAR(45) NOT NULL,
  `buyer_id` VARCHAR(45) NOT NULL,
  `seller_id` VARCHAR(45) NOT NULL,
  `admin_id` VARCHAR(45) NULL,
  `status` VARCHAR(45) NOT NULL,
  `amount` DECIMAL(15,2) NULL,
  `create_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `listing_id` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_transactions_listing1_idx` (`listing_id` ASC),
  INDEX `fk_transactions_users1_idx` (`seller_id` ASC),
  INDEX `fk_transactions_buyer_idx` (`buyer_id` ASC),
  INDEX `fk_transactions_admin_idx` (`admin_id` ASC),
  CONSTRAINT `fk_transactions_listing1`
    FOREIGN KEY (`listing_id`)
    REFERENCES `golden_bee_market`.`listing` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transactions_seller`
    FOREIGN KEY (`seller_id`)
    REFERENCES `golden_bee_market`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transactions_buyer`
    FOREIGN KEY (`buyer_id`)
    REFERENCES `golden_bee_market`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transactions_admin`
    FOREIGN KEY (`admin_id`)
    REFERENCES `golden_bee_market`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `golden_bee_market`.`verifications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `golden_bee_market`.`verifications` (
  `id` VARCHAR(45) NOT NULL,
  `status` ENUM('pending', 'success', 'failed') NULL DEFAULT 'pending',
  `create_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `listing_id` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_verifications_listing1_idx` (`listing_id` ASC),
  CONSTRAINT `fk_verifications_listing1`
    FOREIGN KEY (`listing_id`)
    REFERENCES `golden_bee_market`.`listing` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
