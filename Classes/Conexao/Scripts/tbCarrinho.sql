-- COGIGO PARA MUDAR OS CARACTERES DO BANCO PARA RECONHECER PT-BR
-- ALTER DATABASE `sua_base` CHARSET = Latin1 COLLATE = latin1_swedish_ci;

-- -----------------------------------------------------
-- Table `mydb`.`tbLog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chayds_teste`.`tbCarrinho` (
  `idCarrinho` INT NOT NULL,
  `QuantidadeProdutoCarrinho` INT,
  `dataCompraCarrinho` DATE,
  `valorTotalCarrinho` DECIMAL(10,2),
  `statusCarrinho` INT,
  `tipoFreteCarrinho` VARCHAR(6),
  `valorFreteCarrinho` DECIMAL(10,2),
  `alturaCarrinho` DECIMAL(10,2),
  `larguraCarrinho` DECIMAL(10,2),
  `comprimentoCarrinho` DECIMAL(10,2),
  `pesoCarrinho` DECIMAL(10,2),
  `codigoRastreio` VARCHAR(15),
  `comentarioCompraCarrinho` VARCHAR(350),
  `imagemCarrinho` VARCHAR(80),
  `videoCarrinho` VARCHAR(80),
  PRIMARY KEY (`idCarrinho`)
  )
GO
INSERT INTO tbCarrinho VALUES(1,3,curdate(),350.00,30,'S',19.50,30.00,30.00,30.00,3.00,'RA123456789BR','','',''),
(2,3,curdate(),350.00,30,'S',19.50,30.00,30.00,30.00,3.00,'RA123456789BR','','',''),
(3,3,curdate(),350.00,30,'S',19.50,30.00,30.00,30.00,3.00,'RA123456789BR','','','')
GO
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;