CREATE TABLE `administradores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellido` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `status` INT NOT NULL,

  CONSTRAINT `pk_idadministradores` PRIMARY KEY (`id`),
  CONSTRAINT `uq_correo` UNIQUE(`correo`)
)ENGINE = InnoDB;

CREATE TABLE `distribuidores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellido` VARCHAR(100) NOT NULL,
  `celular` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `licencia` VARCHAR(100) NOT NULL,
  `status` INT NOT NULL,
  `idadministrador` INT NOT NULL,

  CONSTRAINT `pk_distribuidores` PRIMARY KEY (`id`),
  CONSTRAINT `fk_distribuidores_administradores` FOREIGN KEY(`idadministrador`) REFERENCES `administradores` (`id`)
)ENGINE = InnoDB;

CREATE TABLE `clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombreempresa` VARCHAR(100) NOT NULL,
  `propietario` VARCHAR(100) NOT NULL,
  `ubicacion` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `celular` VARCHAR(100) NOT NULL,
  `status` INT NOT NULL,
  `iddistribuidor` INT NOT NULL,

  CONSTRAINT `pk_clientes` PRIMARY KEY (`id`),
  CONSTRAINT `fk_clientes_distribuidores` FOREIGN KEY(`iddistribuidor`) REFERENCES `distribuidores` (`id`)
)ENGINE = InnoDB;

CREATE TABLE `productos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NOT NULL,
  `precioBase` DOUBLE NOT NULL,
  `precioVenta` DOUBLE NOT NULL,
  `status` INT NOT NULL,

  CONSTRAINT `pk_productos` PRIMARY KEY (`id`)
)ENGINE = InnoDB;

CREATE TABLE `ventas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pagada` INT NULL,
  `vendida` INT NULL,
  `cambios` INT NULL,
  `consigna` INT NULL,
  `consignaanterior` INT NULL,
  `status` INT NOT NULL,
  `iddistribuidor` INT NOT NULL,
  `idproducto` INT NOT NULL,
  `idcliente` INT NOT NULL,

  CONSTRAINT `pk_ventas` PRIMARY KEY (`id`),
  CONSTRAINT `fk_ventas_distribuidores` FOREIGN KEY(`iddistribuidor`) REFERENCES `distribuidores` (`id`),
  CONSTRAINT `fk_ventas_productos` FOREIGN KEY(`idproducto`) REFERENCES `productos` (`id`),
  CONSTRAINT `fk_ventas_clientes` FOREIGN KEY(`idcliente`) REFERENCES `clientes` (`id`)
)ENGINE = InnoDB;

