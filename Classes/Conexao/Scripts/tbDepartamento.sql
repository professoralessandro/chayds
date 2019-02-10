-- COGIGO PARA MUDAR OS CARACTERES DO BANCO PARA RECONHECER PT-BR
-- ALTER DATABASE `sua_base` CHARSET = Latin1 COLLATE = latin1_swedish_ci;

-- -----------------------------------------------------
-- Table `chayds_teste`.`tbDepartamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chayds_teste`.`tbDepartamento` (
  `idDepartamento` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NULL,
  `gerente` VARCHAR(50) NULL,
  `email` VARCHAR(50) NULL,
  `emailComercial` VARCHAR(50) NULL,
  `ddd` VARCHAR(20) NULL,
  `telefone` VARCHAR(50) NULL,
  `dataCriacao` DATE null,
  PRIMARY KEY (`idDepartamento`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)
  )
GO
INSERT INTO tbDepartamento VALUES(1,'Saude','Alessandro dos Santos','alessandro@chayds.com.br','alessandro@chayds.com.br','013','33424849',curdate()),
(2,'Esportes','Everton Chayd','everton@chayds.com.br','everton@chayds.com.br','013','33424849',curdate())
GO
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;