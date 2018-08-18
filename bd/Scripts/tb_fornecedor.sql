-- -----------------------------------------------------
-- Table `mydb`.`tb_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chayds_teste`.`tb_fornecedor` (
  `id_forn` INT NOT NULL AUTO_INCREMENT,
  `nome_forn` VARCHAR(50) NOT NULL,
  `raz_soc_forn` VARCHAR(50) NOT NULL,
  `cod_forn` INT NOT NULL,
  `cnpj_forn` VARCHAR(35) NOT NULL,
  `dat_parc_forn` VARCHAR(50) NOT NULL,
  `tel_forn_1` VARCHAR(15) NOT NULL,
  `tel_forn_2` VARCHAR(15) NULL,
  `email_forn` VARCHAR(60) NOT NULL,
  `end_forn` VARCHAR(40) NOT NULL,
  `compl_forn` VARCHAR(35) NULL,
  `bairro_forn` VARCHAR(35) NULL,
  `cidade_forn` VARCHAR(35) NOT NULL,
  `estado_forn` CHAR(2) NOT NULL,
  `cep_forn` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`id_forn`),
  UNIQUE INDEX `nome_forn` (`nome_forn` ASC),
  UNIQUE INDEX `cod_forn` (`cod_forn` ASC),
  UNIQUE INDEX `cnpj_forn` (`cnpj_forn` ASC)
  )

GO
INSERT INTO tb_fornecedor VALUES(1,'Chayds interno','Vita Chayds',180001,'123456','2018-01-05','(13)99644-2358','(13)3342-4849','comercial@chayds.com.br','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080'),
(2,'Chayds interno2','Vita Chayds2',1800012,'1234562','2018-01-05','(13)99644-2358','(13)3342-4849','comercial@chayds.com.br','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080'),
(3,'Chayds Teste','Vita Chayds Teste',1800013,'1234563','2018-01-05','(13)99644-2358','(13)3342-4849','comercial@chayds.com.br','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080')
GO

ENGINE = InnoDB;
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;