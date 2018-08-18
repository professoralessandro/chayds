-- -----------------------------------------------------
-- Table `mydb`.`tb_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chayds_teste`.`tb_cargo` (
  `id_cargo` INT NOT NULL AUTO_INCREMENT,
  `cod_cargo` INT NOT NULL,
  `nome_cargo` VARCHAR(50) NOT NULL,
  `data_cria_cargo` DATE NOT NULL,
  PRIMARY KEY (`id_cargo`),
  UNIQUE INDEX `nome_cargo` (`nome_cargo` ASC)
  )
GO
INSERT INTO tb_cargo VALUES(1,'20180001','Gerente de Tecnologia da informacao(TI)',curdate()),
(2,'20180002','Gerente de marketing',curdate()),
(3,'20180003','Revendedor',curdate()),
(4,'20180004','Gerente de negocio',curdate())
GO
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;