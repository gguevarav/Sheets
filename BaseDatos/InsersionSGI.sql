USE BDSheets;

INSERT INTO Area (NombreArea)
			VALUES('Finanzas');

INSERT INTO Departamento (NombreDepartamento, idArea)
			VALUES('TIC', 1);
			
INSERT INTO Puesto (NombrePuesto, idDepartamento)
			VALUES('Analista de Infraestructura Informática', 1);

INSERT INTO Persona (NombrePersona, ApellidoPersona, DireccionPersona, TelefonoPersona)
			VALUES('Gemis Daniel', 'Guevara Villeda', 'Finca Aztec, Los Amates Izabal', '3009-9704');

INSERT INTO Rol (NombreRol)
			VALUES('Administrador');
			
INSERT INTO Sede (NombreSede)
		VALUES('El Pataxte');			

INSERT INTO Usuario (idPersona, idPuesto, CorreoUsuario, idSede, EstadoUsuario)
			VALUES(1, 1, 'gguevara@naturaceites.com', 1, 'Activo');
			
INSERT INTO UsuarioApp (idPersona, idRol, UsuarioUsuarioApp, ContraseniaUsuarioApp)
			VALUES(1, 1, 'gguevara', 'e60c177bc95bb0d56e2f95ac372bde51');