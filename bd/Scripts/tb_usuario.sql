-- -----------------------------------------------------
-- Table `mydb`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chayds_teste`.`tb_usuario` (
  `id_usu` INT NOT NULL AUTO_INCREMENT,
  `nome_usu` VARCHAR(50) NOT NULL,
  `cpf_usu` VARCHAR(11),
  `dt_nasc_usu` DATE NOT NULL,
  `dt_cad_usu` DATE,
  `sexo_usu` CHAR(1) NOT NULL,
  `email_usu` VARCHAR(60) NOT NULL,
  `nome_nivel_acesso` VARCHAR(50),
  `ddd_usu` VARCHAR(3),
  `tel_usu` VARCHAR(11),
  `end_usu` VARCHAR(40),
  `complemento_usu` VARCHAR(35),
  `bairro_usu` VARCHAR(35),
  `cidade_usu` VARCHAR(35),
  `estado_usu` CHAR(2),
  `cep_usu` VARCHAR(9),
  `senha_usu` VARCHAR(50),

  PRIMARY KEY (`id_usu`),
  UNIQUE INDEX `email_usu_UNIQUE` (`email_usu` ASC)
  )
GO
INSERT INTO tb_usuario VALUES(1,'Alessandro dos Santos','12345678910','1990-03-28',curdate(),'M','alessandro@chayds.com.br','Gerente administrador','013','33424849','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','123456'),
(2,'Funcionario teste','12345678101','1990-03-28',curdate(),'M','teste@teste.com','Teste','013','33424849','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','123456'),
(3,'Everton Chayd','12345678151','1990-03-28',curdate(),'M','everton_chayd@chayds.com.br','Gerente administrador','013','33424849','Rua Dona Risoleta de Moraes N28','Casa A','Jardim Progresso','Guaruja','SP','1463-080','123456')
GO
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;