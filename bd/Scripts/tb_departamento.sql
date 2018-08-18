-- MySQL Script generated by MySQL Workbench
-- Fri Jun  8 11:32:01 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `chayds_teste` DEFAULT CHARACTER SET utf8 ;
USE `chayds_teste` ;

-- -----------------------------------------------------
-- Table `mydb`.`tb_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chayds_teste`.`tb_departamento` (
  `id_depart` INT NOT NULL AUTO_INCREMENT,
  `nome_depart` VARCHAR(50) NOT NULL,
  `cod_depart` INT NOT NULL,
  `geren_depart` VARCHAR(50) NOT NULL,
  `email_depart` VARCHAR(60) NOT NULL,
  `email_comer_depart` VARCHAR(60),
  `tel_depart` VARCHAR(15) NOT NULL,
  `data_depart` DATE NOT NULL,
  PRIMARY KEY (`id_depart`),
  UNIQUE INDEX `nome_depart_UNIQUE` (`nome_depart` ASC),
  UNIQUE INDEX `cod_depart_UNIQUE` (`cod_depart` ASC)
  )
GO
INSERT INTO tb_departamento VALUES(1,'Tecnologia da Informacao(TI)','20180001','Alessandro dos Santos','alessandro@chayds.com.br','comercial_ti@chayds.com.br','(13)3342-4849','2018-05-05'),
(2,'Fitoterapia','20180002','Everton Chayd','everton@chayds.com.br','comercial_fitoterapia@chayds.com.br','(13)3342-4849','2018-05-05'),
(3,'Teste','20180003','Alessandro dos Santos','alessandro@chayds.com.br','comercial_ti@chayds.com.br','(13)3342-4849','2018-05-05')
GO
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;