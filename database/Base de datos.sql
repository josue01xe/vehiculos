CREATE DATABASE vehiculos;
USE vehiculos;

CREATE TABLE vehiculos
(
idvehiculo INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
marca          VARCHAR(80)     NOT NULL,
modelo         VARCHAR(80)     NOT NULL,
año            YEAR            NOT NULL,
tipocombustible VARCHAR(50)    NOT NULL,
color           VARCHAR(50)    NOT NULL,
numeroplaca    CHAR(6)         NOT NULL,
transmision     CHAR(1)        NOT NULL DEFAULT 'A',
kilometraje     DECIMAL (7,3)  NOT NULL,
tipovehiculo    VARCHAR(70)    NOT NULL,
fechacompra     DATE           NOT NULL

)ENGINE = INNODB;

INSERT INTO vehiculos(marca, modelo, año, tipocombustible, color, numeroplaca, transmision, kilometraje, tipovehiculo, fechacompra) VALUES
('toyota', 'corolla', '2017', 'gasolina', 'rojo', '123456', 'A', 150.000, 'automovil', '2022-10-20'),
('ford', 'focus', '2018', 'diesel', 'negro', 'AEF777', 'M', 100.000, 'automovil', '2023-01-10');

SELECT * FROM vehiculos;

DELIMITER $$
CREATE PROCEDURE spu_vehiculos_listar()
BEGIN
 SELECT idvehiculo,
        marca,
        modelo,
        año,
        tipocombustible,
        color,
        numeroplaca,
        transmision,
        kilometraje,
        tipovehiculo,
        fechacompra
 FROM vehiculos
 ORDER BY idvehiculo DESC;
END $$

 CALL spu_vehiculos_listar();
 
DELIMITER $$
CREATE PROCEDURE spu_vehiculos_registrar
(
  IN _marca           VARCHAR(80),
  IN _modelo          VARCHAR(80),
  IN _año             YEAR,
  IN _tipocombustible VARCHAR(50),
  IN _color           VARCHAR(50),
  IN _numeroplaca     CHAR(6),
  IN _transmision     CHAR(1),
  IN _kilometraje     DECIMAL(7,3),
  IN _tipovehiculo    VARCHAR(70),
  IN _fechacompra     DATE
)
BEGIN
  INSERT INTO vehiculos (marca, modelo, año, tipocombustible, color, numeroplaca, transmision, kilometraje, tipovehiculo, fechacompra) VALUES
  (_marca, _modelo, _año, _tipocombustible, _color, _numeroplaca, _transmision, _kilometraje, _tipovehiculo, _fechacompra);
  END $$
  
  CALL spu_vehiculos_registrar('tesla','cybertruck','2020','electrico','negro','987654','A','500.000','camioneta','2022-05-22')