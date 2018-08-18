-- -----------------------------------------------------
-- Table `mydb`.`tb_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chayds_teste`.`tb_nivel_acesso` (
  `id_nivel_acesso` INT NOT NULL AUTO_INCREMENT,
  `cod_nivel_acesso` INT NOT NULL,
  `nome_nivel_acesso` VARCHAR(50) NOT NULL,
  `data_cria_nivel_acesso` DATE NOT NULL,
  PRIMARY KEY (`id_nivel_acesso`),
  UNIQUE INDEX `cod_nivel_acesso` (`cod_nivel_acesso` ASC),
  UNIQUE INDEX `nome_nivel_acesso` (`nome_nivel_acesso` ASC)
  )
GO
INSERT INTO tb_nivel_acesso VALUES
(1,'2018000','Teste',curdate()),
(2,'20180001','Usuario',curdate()),
(3,'20180002','funcionario',curdate()),
(4,'20180003','Atendente',curdate()),
(5,'20180004','Supervisor',curdate()),
(6,'20180005','Gerente administrador',curdate())
GO
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;