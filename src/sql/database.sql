create table administradores (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellido` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,

  CONSTRAINT `pk_idadministradores` PRIMARY KEY (`id`)
)ENGINE = InnoDB;

create table distribuidores (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellido` VARCHAR(100) NOT NULL,
  `celular` VARCHAR(100) NOT NULL,
  `edad` INT NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `licencia` VARCHAR(100) NOT NULL,
  `idadministrador` INT NOT NULL,

  CONSTRAINT `pk_distribuidores` PRIMARY KEY (`id`),
  CONSTRAINT `fk_distribuidores_administradores` FOREIGN KEY(`idadministrador`) REFERENCES `administradores` (`id`)
)ENGINE = InnoDB;

create table clientes (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombreempresa` VARCHAR(100) NOT NULL,
  `propietario` VARCHAR(100) NOT NULL,
  `ubicacion` VARCHAR(100) NOT NULL,
  `telefono` INT NOT NULL,
  `celular` VARCHAR(100) NOT NULL,
  `iddistribuidor` INT NOT NULL,

  CONSTRAINT `pk_clientes` PRIMARY KEY (`id`),
  CONSTRAINT `fk_clientes_distribuidores` FOREIGN KEY(`iddistribuidor`) REFERENCES `distribuidores` (`id`)
)ENGINE = InnoDB;