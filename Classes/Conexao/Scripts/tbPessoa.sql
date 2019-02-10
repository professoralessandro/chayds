-- COGIGO PARA MUDAR OS CARACTERES DO BANCO PARA RECONHECER PT-BR
-- ALTER DATABASE `sua_base` CHARSET = Latin1 COLLATE = latin1_swedish_ci;

-- -----------------------------------------------------
-- Table `mydb`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chayds_teste`.`tbPessoa` (
  `idPessoa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cpf` VARCHAR(20),
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
  `imagem` VARCHAR(80),
  PRIMARY KEY (`idPessoa`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)
  )
GO
INSERT INTO tbPessoa VALUES(1,'Alessandro dos Santos','123456789','1990-03-28',curdate(),'alessandro@chayds.com.br','Gerente','013','33424849','013','996442358','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','M','123456', '8aca6235-81fb-47c8-9f24-23a5a886bd1b.jpg'),
(2,'Ton Chayds','1234567891','1990-03-28',curdate(),'everton@chayds.com.br','Gerente','013','33424849','013','996442358','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','M','123456', 'profile.png'),
(3,'Teste','12345678910','1990-03-28',curdate(),'teste@chayds.com.br','Usuario','013','33424849','013','996442358','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','M','123456', 'profile.png')
GO
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;