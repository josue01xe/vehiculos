CREATE DATABASE vehiculos;
USE vehiculos;

CREATE TABLE reparaciones
(

idreparacion INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
fechareparacion DATE     NOT NULL,
tiporeparacion  VARCHAR(80) NOT NULL,
precio          DECIMAL(7,2) NOT NULL

)ENGINE = INNODB;

INSERT INTO reparaciones (fechareparacion, tiporeparacion, precio)VALUES
('2023-03-8', 'cambio de aceite', 200),
('2023-03-10', 'llantas nuevas', 1000);

SELECT * FROM reparaciones;


CREATE TABLE multas
(

idmulta INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
fechamulta DATE     NOT NULL,
motivo  VARCHAR(80) NOT NULL,
monto          DECIMAL(7,2) NOT NULL

)ENGINE = INNODB;

INSERT INTO multas (fechamulta, motivo, monto)VALUES
('2023-03-8', 'mal estacionamiento', 50),
('2023-03-10', 'no respetar el semaforo', 80);

SELECT * FROM multas;

CREATE TABLE seguros
(

idseguro INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
compañiaseguro   VARCHAR(50)     NOT NULL,
poliza           VARCHAR(80) NOT NULL,
precioanual           DECIMAL(7,2) NOT NULL

)ENGINE = INNODB;

INSERT INTO seguros (compañiaseguro, poliza, precioanual)VALUES
('Allstate', 'Responsabilidad civil', 10000),
('Geico', 'Cobertura completa', 20000);

SELECT * FROM seguros;

CREATE TABLE vehiculos
(
idvehiculo INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
idreparacion INT                NOT NULL,
idmulta        INT              NOT NULL,
idseguro       INT              NOT NULL,
numeroplaca    CHAR(6)         NOT NULL,
marca          VARCHAR(80)     NOT NULL,
modelo         VARCHAR(80)     NOT NULL,
año            DATE            NOT NULL,
tipocombustible VARCHAR(50)    NOT NULL,
CONSTRAINT fk_idreparacion_veh FOREIGN KEY (idreparacion) REFERENCES reparaciones (idreparacion),
CONSTRAINT fk_idmulta_veh FOREIGN KEY (idmulta) REFERENCES multas (idmulta),
CONSTRAINT fk_idseguro_veh FOREIGN KEY (idseguro) REFERENCES seguros (idseguro)

)ENGINE = INNODB;

INSERT INTO vehiculos (idreparacion, idmulta, idseguro, numeroplaca, marca, modelo, año, tipocombustible) VALUES
(1, 1, 1, '123456', 'toyota', 'corolla', '2016-05-15', 'gasolina'),
(1, 1, 1, 'AEF777', 'ford', 'focus', '2018-04-10', 'diesel');

SELECT * FROM vehiculos;

CREATE TABLE propietarios
(
idpropietario INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
idvehiculo    INT         NOT NULL,
apellidos     VARCHAR (50)NOT NULL,
nombres        VARCHAR(50) NOT NULL,
dni           CHAR(8)     NOT NULL,
telefono      CHAR(9)     NOT NULL,
direccion     VARCHAR(50)     NULL,
CONSTRAINT fk_idvehiculo_pro FOREIGN KEY (idvehiculo) REFERENCES vehiculos (idvehiculo),
CONSTRAINT uk_dni_pro UNIQUE (dni)

)ENGINE = INNODB;

INSERT INTO propietarios (idvehiculo, apellidos, nombres, dni, telefono)VALUES
(1, 'Ramirez Mendoza', 'Alejandro', '89582471', '987654219'),
(2, 'Flores Gutierrez', 'Miguel Carlos', '76582921', '912456789');

SELECT * FROM propietarios;