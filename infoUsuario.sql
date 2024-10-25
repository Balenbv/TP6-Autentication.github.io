CREATE TABLE `usuario` (
    idUsuario bigint(20) NOT NULL,
    usNombre varchar(50),
    usPass int(11),
    usMail varchar(50),
    usDeshabilitado timestamp,
    PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `rol` (
    idRol bigint(20),
    rolDescripcion varchar(50),
    PRIMARY KEY(`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuariorol` (
    idUsuario bigint(20),
    idRol bigint(20),
    PRIMARY KEY (`idUsuario`, `idRol`),
    FOREIGN KEY (`idUsuario`) REFERENCES `usuario`(`idUsuario`) ON DELETE CASCADE,
    FOREIGN KEY (`idRol`) REFERENCES `rol`(`idRol`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;