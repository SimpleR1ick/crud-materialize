CREATE DATABASE crud;

USE crud;

CREATE TABLE `crud`.`clientes` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    `sobrenome` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `idade` INT(3) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;