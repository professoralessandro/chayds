-- COGIGO PARA MUDAR OS CARACTERES DO BANCO PARA RECONHECER PT-BR
-- ALTER DATABASE `sua_base` CHARSET = Latin1 COLLATE = latin1_swedish_ci;

-- -----------------------------------------------------
-- Table `mydb`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chayds_teste`.`tbEmpresa` (
  `idEmpresa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50),
  `cnpj` VARCHAR(20),
  `dataNascimento` VARCHAR(25),
  `dataCadastro` VARCHAR(25),
  `email` VARCHAR(60),
  `nivelAcesso` VARCHAR(15),
  `ddd1` VARCHAR(25),
  `telefone` VARCHAR(25),
  `ddd2` VARCHAR(25),
  `celular` VARCHAR(25),
  `endereco` VARCHAR(40),
  `complemento` VARCHAR(35),
  `bairro` VARCHAR(35),
  `cidade` VARCHAR(35),
  `estado` VARCHAR(25),
  `cep` VARCHAR(25),
  `senha` VARCHAR(50),
  `imagem` VARCHAR(80),
  PRIMARY KEY (`idEmpresa`),
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)
  )
GO
INSERT INTO tbEmpresa VALUES(1,'Empresa Teste 1','123456','2015-03-28',curdate(),'alessandro1@chayds.com.br','Usuario','013','33424849','013','996442358','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463080','123456',''),
(2,'Empresa Teste 2','1234567','2015-03-28',curdate(),'alessandro2@chayds.com.br','Gerente administrador','013','33424849','013','33424849','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','123456',''),
(3,'Empresa Teste 3','12345678','2015-03-28',curdate(),'alessandro3@chayds.com.br','Gerente administrador','013','33424849','013','33424849','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','123456','')
GO
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;