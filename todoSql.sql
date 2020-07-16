CREATE SCHEMA IF NOT EXISTS `todobd` ;

CREATE TABLE IF NOT EXISTS `todobd`.`todo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `completada` TINYINT NULL DEFAULT 0,
  `fecha_creacion` DATETIME NOT NULL,
  `fecha_completada` DATETIME NULL,
  PRIMARY KEY (`id`));
  
  CREATE TABLE IF NOT EXISTS `todobd`.`audit` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idTarea` INT NOT NULL,
  `accion` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `fecha` DATETIME NOT NULL,
  PRIMARY KEY (`id`));
  
  ALTER TABLE `todobd`.`audit` 
ADD INDEX `fk_audit_todo_idx` (`idTarea` ASC) VISIBLE;
;
ALTER TABLE `todobd`.`audit` 
ADD CONSTRAINT `fk_audit_todo`
  FOREIGN KEY (`idTarea`)
  REFERENCES `todobd`.`todo` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
