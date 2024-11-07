
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- datos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `datos`;

CREATE TABLE `datos`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `correo` VARCHAR(100) NOT NULL,
    `contrasena` VARCHAR(50) NOT NULL,
    `nombres` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- estudiantes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `estudiantes`;

CREATE TABLE `estudiantes`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `matricula` VARCHAR(10) NOT NULL,
    `carrera` TINYINT NOT NULL,
    `nombres` VARCHAR(200) NOT NULL,
    `apellidos` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- carreras
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `carreras`;

CREATE TABLE `carreras`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `carreras` TINYINT NOT NULL,
    `semestres` VARCHAR(50) NOT NULL,
    `clave` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
