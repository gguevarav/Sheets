DROP DATABASE BDSheets;

CREATE OR REPLACE DATABASE BDSheets;

ALTER DATABASE BDSheets CHARSET=utf8;

ALTER DATABASE BDSheets COLLATE=utf8_spanish_ci;

USE BDSheets;

CREATE TABLE Persona(
	idPersona				INTEGER					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombrePersona			VARCHAR(30) 			NOT NULL,
	ApellidoPersona			VARCHAR(30)				NOT NULL,
	DireccionPersona		VARCHAR(50),
	TelefonoPersona			VARCHAR(15)
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Rol(
	idRol 					TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombreRol				VARCHAR(15)				NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE UsuarioApp(
	idUsuario				TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	idPersona				INTEGER					NOT NULL,
	idRol					TINYINT					NOT NULL,
	UsuarioUsuarioApp		VARCHAR(25)				NOT NULL,
	ContraseniaUsuarioApp	TEXT					NOT NULL,
	INDEX (idPersona),
	FOREIGN KEY (idPersona)
		REFERENCES Persona(idPersona)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idRol),
	FOREIGN KEY (idRol)
		REFERENCES Rol(idRol)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Area(
	idArea					TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombreArea				VARCHAR(40)				NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Departamento(
	idDepartamento			TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombreDepartamento		VARCHAR(35)				NOT NULL,
	idArea					TINYINT					NOT NULL,
	INDEX (idArea),
	FOREIGN KEY (idArea)
		REFERENCES Area(idArea)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Puesto(
	idPuesto				TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombrePuesto			VARCHAR(40)				NOT NULL,
	idDepartamento 			TINYINT					NOT NULL,
	INDEX (idDepartamento),
	FOREIGN KEY (idDepartamento)
		REFERENCES Departamento(idDepartamento)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Sede(
	idSede					TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombreSede				VARCHAR(15)				NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Usuario(
	idUsuario				SMALLINT				NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	idPersona				INTEGER					NOT NULL,
	idPuesto				TINYINT					NOT NULL,
	CorreoUsuario			VARCHAR(100),
	idSede					TINYINT,
	EstadoUsuario			VARCHAR(10)				NOT NULL,
	INDEX (idPersona),
	FOREIGN KEY (idPersona)
		REFERENCES Persona(idPersona)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idPuesto),
	FOREIGN KEY (idPuesto)
		REFERENCES Puesto(idPuesto)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idSede),
	FOREIGN KEY (idSede)
		REFERENCES Sede(idSede)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Marca(
	idMarca					TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombreMarca				VARCHAR(20)				NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Modelo(
	idModelo				TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombreModelo			VARCHAR(25)				NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Procesador(
	idProcesador			TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	idMarca					TINYINT,
	idModelo				TINYINT,
	GeneracionProcesador	TINYINT,
	VelocidadRelojProcesador VARCHAR(30),
	INDEX (idMarca),
	FOREIGN KEY (idMarca)
		REFERENCES Marca(idMarca)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idModelo),
	FOREIGN KEY (idModelo)
		REFERENCES Modelo(idModelo)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Arquitectura(
	idArquitectura 			TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombreArquitectura		VARCHAR(10)
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE VersionSO(
	idVersionSO				TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombreVersionSO 					VARCHAR(40)				NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE EdicionSO(
	idEdicionSO				TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombreEdicionSO			VARCHAR(40)				NOT NULL 
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE SistemaOperativo(
	idSistemaOperativo		TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	idVersionSO				TINYINT,
	idEdicionSO				TINYINT,
	idArquitectura			TINYINT,
	INDEX (idVersionSO),
	FOREIGN KEY (idVersionSO)
		REFERENCES VersionSO(idVersionSO)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idEdicionSO),
	FOREIGN KEY (idEdicionSO)
		REFERENCES EdicionSO(idEdicionSO)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idArquitectura),
	FOREIGN KEY (idArquitectura)
		REFERENCES Arquitectura(idArquitectura)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE EdicionOffice(
	idEdicionOffice			TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	NombreEdicionOffice		VARCHAR(40)				NOT NULL
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Office(
	idOffice				TINYINT					NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	idEdicionOffice			TINYINT,
	idArquitectura 			TINYINT,
	INDEX (idEdicionOffice),
	FOREIGN KEY (idEdicionOffice)
		REFERENCES EdicionOffice(idEdicionOffice)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idArquitectura),
	FOREIGN KEY (idArquitectura)
		REFERENCES Arquitectura(idArquitectura)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;

CREATE TABLE Equipo(
	idEquipo 				SMALLINT				NOT NULL				PRIMARY KEY				AUTO_INCREMENT,
	ServiceTag 				VARCHAR(30)				NOT NULL,
	idSede					TINYINT,
	idMarca					TINYINT					NOT NULL,
	idModelo				TINYINT					NOT NULL,
	NombreDominioEquipo		VARCHAR(10),
	ColorEquipo				VARCHAR(30),
	idProcesador			TINYINT					NOT NULL,
	RAMEquipo				VARCHAR(8)				NOT NULL,
	DiscoDuroEquipo			VARCHAR(8)				NOT NULL,
	CargadorEquipo			TEXT,
	idSistemaOperativo		TINYINT					NOT NULL,
	idOffice				TINYINT,
	NumeroActivoFijoEquipo	VARCHAR(25),
	idDepartamento			TINYINT,
	EstadEquipoEquipo		VARCHAR(10),
	INDEX (idSede),
	FOREIGN KEY (idSede)
		REFERENCES Sede(idSede)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idMarca),
	FOREIGN KEY (idMarca)
		REFERENCES Marca(idMarca)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idModelo),
	FOREIGN KEY (idModelo)
		REFERENCES Modelo(idModelo)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idProcesador),
	FOREIGN KEY (idProcesador)
		REFERENCES Procesador(idProcesador)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idSistemaOperativo),
	FOREIGN KEY (idSistemaOperativo)
		REFERENCES SistemaOperativo(idSistemaOperativo)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idOffice),
	FOREIGN KEY (idOffice)
		REFERENCES Office(idOffice)
		ON DELETE CASCADE
		ON UPDATE NO ACTION,
	INDEX (idDepartamento),
	FOREIGN KEY (idDepartamento)
		REFERENCES Departamento(idDepartamento)
		ON DELETE CASCADE
		ON UPDATE NO ACTION
)ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_spanish_ci;