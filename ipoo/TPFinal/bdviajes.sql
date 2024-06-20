CREATE DATABASE bdviajes;

CREATE TABLE persona (
    idpersona BIGINT AUTO_INCREMENT,
    nombre VARCHAR(150),
    apellido VARCHAR(150),
    documento VARCHAR(15),
    telefono INT,
    PRIMARY KEY (idpersona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE empresa(
    idempresa BIGINT AUTO_INCREMENT,
    enombre VARCHAR(150),
    edireccion VARCHAR(150),
    PRIMARY KEY (idempresa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE responsable (
    idresponsable BIGINT AUTO_INCREMENT,
    idpersona BIGINT,
    numeroLicencia BIGINT,
    PRIMARY KEY (idresponsable),
    FOREIGN KEY (idpersona) REFERENCES persona(idpersona)
    ON UPDATE CASCADE
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE viaje (
    idviaje BIGINT AUTO_INCREMENT,
    destino VARCHAR(150),
    cantMaxPasajeros INT,
    idempresa BIGINT,
    idresponsable BIGINT,
    importe FLOAT,
    PRIMARY KEY (idviaje),
    FOREIGN KEY (idempresa) REFERENCES empresa (idempresa),
    FOREIGN KEY (idresponsable) REFERENCES responsable (idresponsable)
    ON UPDATE CASCADE
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE pasajero (
    idpasajero BIGINT AUTO_INCREMENT,
    idpersona BIGINT,
    idviaje BIGINT,
    PRIMARY KEY (idpasajero),
    FOREIGN KEY (idpersona) REFERENCES persona(idpersona)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    FOREIGN KEY (idviaje) REFERENCES viaje (idviaje)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
