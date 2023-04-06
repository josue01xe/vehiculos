CREATE DATABASE vehiculos;
USE vehiculos;

CREATE TABLE vehiculos
(
idvehiculos INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
marca          VARCHAR(80)     NOT NULL,
modelo         VARCHAR(80)     NOT NULL,
año            DATE            NOT NULL,
tipocombustible VARCHAR(50)    NOT NULL,
color           VARCHAR(50)    NOT NULL,
numeroplaca    CHAR(6)         NOT NULL,
transmision     CHAR(1)        NOT NULL DEFAULT 'A',
kilometraje     DECIMAL (7,3)  NOT NULL,
tipovehiculo    VARCHAR(70)    NOT NULL,
fechacompra     DATE           NOT NULL

)ENGINE = INNODB;

INSERT INTO vehiculos(marca, modelo, año, tipocombustible, color, numeroplaca, transmision, kilometraje, tipovehiculo, fechacompra) VALUES
('toyota', 'corolla', '2016-05-15', 'gasolina', 'rojo', '123456', 'A', 150.000, 'automovil', '2022-10-20'),
('ford', 'focus', '2018-04-10', 'diesel', 'negro', 'AEF777', 'M', 100.000, 'automovil', '2023-01-10');

SELECT * FROM vehiculos;