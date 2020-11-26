drop database amiks;
create database amiks;

--Ver la estrucctuta de una tabla
SHOW COLUMNS from productos;

--Cambiar el nombre de una columna
ALTER TABLE productos CHANGE `precio` `precioBase` DOUBLE;

--Agregar una columna despues de otra
ALTER TABLE productos ADD precioVenta DOUBLE AFTER precioBase;