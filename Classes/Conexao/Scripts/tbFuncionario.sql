-- COGIGO PARA MUDAR OS CARACTERES DO BANCO PARA RECONHECER PT-BR
-- ALTER DATABASE `sua_base` CHARSET = Latin1 COLLATE = latin1_swedish_ci;

-- -----------------------------------------------------
-- Table `chayds_teste`.`tbFuncionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chayds_teste`.`tbFuncionario` (
  `idFuncionario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50),
  `cpf` VARCHAR(20),
  `rg` VARCHAR(20),
  `dataNascimento` DATE,
  `dataCadastro` DATE,
  `email` VARCHAR(60) UNIQUE,
  `nivelAcesso` VARCHAR(15),
  `ddd1` VARCHAR(5),
  `telefone` VARCHAR(15),
  `ddd2` VARCHAR(5),
  `celular` VARCHAR(15),
  `endereco` VARCHAR(50),
  `complemento` VARCHAR(20),
  `bairro` VARCHAR(35),
  `cidade` VARCHAR(35),
  `estado` VARCHAR(15),
  `cep` VARCHAR(15),
  `sexo` VARCHAR(8),
  `senha` VARCHAR(20),
  `dataContratacao` DATE,
  `comentContratacao` VARCHAR(350),
  `dataDemissao` DATE,
  `comentDemissao` VARCHAR(350),
  `escolaridade` VARCHAR(25),
  `expProfissional` VARCHAR(50),
  `cargo` VARCHAR(30),
  `gerenteResp` VARCHAR(50),
  `historico` VARCHAR(50),
  `departamento` VARCHAR(50),
  `imagem` VARCHAR(80),
  PRIMARY KEY (`idFuncionario`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)
  )
GO
INSERT INTO tbFuncionario VALUES(1,'Alessandro Funcionario','1234','','1990-03-28',curdate(),'alessandroFunc1@chayds.com.br','Usuario','013','33424849','013','996442358','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','M','123456', curdate(), '', '', '', '', '', '', '', '', '', ''),
(2,'Alessandro Funcionario','12345','','1990-03-28',curdate(),'alessandroFunc2@chayds.com.br','Usuario','013','33424849','013','996442358','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','M','123456', curdate(), '', '', '', '', '', '', '', '', '', ''),
(3,'Alessandro Funcionario','123456','','1990-03-28',curdate(),'alessandroFunc3@chayds.com.br','Usuario','013','33424849','013','996442358','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','M','123456', curdate(), '', '', '', '', '', '', '', '', '', '')
GO
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;