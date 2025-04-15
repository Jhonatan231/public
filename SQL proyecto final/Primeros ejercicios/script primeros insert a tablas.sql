--Insertar registros en TB_Paciente
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, DirecPac, FecNac, SexoCli, CodEmp, FecReg, EstCivil, CodTelf)
VALUES (1, 'Juan', 'Pérez', 'Calle Falsa 123', TO_DATE('1990-01-15', 'YYYY-MM-DD'), 'M', 1, TO_DATE('2023-10-10', 'YYYY-MM-DD'), 'Soltero', '555-1234');

INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, DirecPac, FecNac, SexoCli, CodEmp, FecReg, EstCivil, CodTelf)
VALUES (2, 'María', 'Gómez', 'Avenida Siempreviva 742', TO_DATE('1985-04-10', 'YYYY-MM-DD'), 'F', 2, TO_DATE('2023-10-11', 'YYYY-MM-DD'), 'Casada', '555-5678');

INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, DirecPac, FecNac, SexoCli, CodEmp, FecReg, EstCivil, CodTelf)
VALUES (3, 'Carlos', 'Ruiz', 'Calle Libertad 456', TO_DATE('1992-05-20', 'YYYY-MM-DD'), 'M', 3, TO_DATE('2023-10-12', 'YYYY-MM-DD'), 'Soltero', '555-9101');

INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, DirecPac, FecNac, SexoCli, CodEmp, FecReg, EstCivil, CodTelf)
VALUES (4, 'Ana', 'Martínez', 'Pasaje Los Andes 78', TO_DATE('1978-11-30', 'YYYY-MM-DD'), 'F', 4, TO_DATE('2023-10-13', 'YYYY-MM-DD'), 'Divorciada', '555-1122');

INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, DirecPac, FecNac, SexoCli, CodEmp, FecReg, EstCivil, CodTelf)
VALUES (5, 'Jorge', 'Santos', 'Calle Central 89', TO_DATE('1980-08-25', 'YYYY-MM-DD'), 'M', 5, TO_DATE('2023-10-14', 'YYYY-MM-DD'), 'Casado', '555-3344');

--Insertar registros en TB_Pariente
INSERT INTO TB_Pariente (CodPar, NomPar, ApelPar, DirecPar, CodTelf)
VALUES (1, 'Luis', 'Pérez', 'Calle Falsa 124', '555-2233');

INSERT INTO TB_Pariente (CodPar, NomPar, ApelPar, DirecPar, CodTelf)
VALUES (2, 'Sofía', 'Gómez', 'Avenida Siempreviva 743', '555-7789');

INSERT INTO TB_Pariente (CodPar, NomPar, ApelPar, DirecPar, CodTelf)
VALUES (3, 'Marta', 'Ruiz', 'Calle Libertad 457', '555-9112');

INSERT INTO TB_Pariente (CodPar, NomPar, ApelPar, DirecPar, CodTelf)
VALUES (4, 'Eduardo', 'Martínez', 'Pasaje Los Andes 79', '555-2234');

INSERT INTO TB_Pariente (CodPar, NomPar, ApelPar, DirecPar, CodTelf)
VALUES (5, 'Carmen', 'Santos', 'Calle Central 90', '555-3355');

--Insertar registros en TB_Paciente_Pariente
INSERT INTO TB_Paciente_Pariente (CodPar, CodPac, Relacion)
VALUES (1, 1, 'Padre');

INSERT INTO TB_Paciente_Pariente (CodPar, CodPac, Relacion)
VALUES (2, 2, 'Hermana');

INSERT INTO TB_Paciente_Pariente (CodPar, CodPac, Relacion)
VALUES (3, 3, 'Madre');

INSERT INTO TB_Paciente_Pariente (CodPar, CodPac, Relacion)
VALUES (4, 4, 'Esposo');

INSERT INTO TB_Paciente_Pariente (CodPar, CodPac, Relacion)
VALUES (5, 5, 'Tía');

--Insertar registros en TB_Empleados
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf)
VALUES (1, 1, 'Pedro', 'López', 'Calle A 100', TO_DATE('1975-05-15', 'YYYY-MM-DD'), 'M', '12345678A', 1, 1, '555-1234');

INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf)
VALUES (2, 2, 'Lucía', 'Fernández', 'Calle B 200', TO_DATE('1982-06-20', 'YYYY-MM-DD'), 'F', '87654321B', 2, 2, '555-5678');

INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf)
VALUES (3, 3, 'Miguel', 'Rojas', 'Calle C 300', TO_DATE('1990-07-10', 'YYYY-MM-DD'), 'M', '12349876C', 3, 3, '555-9101');

INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf)
VALUES (4, 4, 'Raquel', 'Martínez', 'Calle D 400', TO_DATE('1987-08-30', 'YYYY-MM-DD'), 'F', '78901234D', 4, 1, '555-1122');

INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf)
VALUES (5, 5, 'Fernando', 'García', 'Calle E 500', TO_DATE('1985-09-25', 'YYYY-MM-DD'), 'M', '56789012E', 5, 2, '555-3344');

--Insertar registros en TB_Categoria
INSERT INTO TB_Categoria (CodCateg, Categoria)
VALUES (1, 'Administrador');

INSERT INTO TB_Categoria (CodCateg, Categoria)
VALUES (2, 'Médico');

INSERT INTO TB_Categoria (CodCateg, Categoria)
VALUES (3, 'Enfermera');

INSERT INTO TB_Categoria (CodCateg, Categoria)
VALUES (4, 'Recepcionista');

INSERT INTO TB_Categoria (CodCateg, Categoria)
VALUES (5, 'Técnico');

--Insertar registros en TB_Contrato
INSERT INTO TB_Contrato (CodContra, CodEmp, TipContra, HorasCont, Salario, EscalaSalarial, FecInicio, FecFin)
VALUES (1, 1, 'Indefinido', 40, 2500.00, 'Nivel 1', TO_DATE('2023-01-01', 'YYYY-MM-DD'), TO_DATE('2025-01-01', 'YYYY-MM-DD'));

INSERT INTO TB_Contrato (CodContra, CodEmp, TipContra, HorasCont, Salario, EscalaSalarial, FecInicio, FecFin)
VALUES (2, 2, 'Temporal', 20, 1500.00, 'Nivel 2', TO_DATE('2023-02-01', 'YYYY-MM-DD'), TO_DATE('2024-02-01', 'YYYY-MM-DD'));

INSERT INTO TB_Contrato (CodContra, CodEmp, TipContra, HorasCont, Salario, EscalaSalarial, FecInicio, FecFin)
VALUES (3, 3, 'Prácticas', 30, 1000.00, 'Nivel 3', TO_DATE('2023-03-01', 'YYYY-MM-DD'), TO_DATE('2023-09-01', 'YYYY-MM-DD'));

INSERT INTO TB_Contrato (CodContra, CodEmp, TipContra, HorasCont, Salario, EscalaSalarial, FecInicio, FecFin)
VALUES (4, 4, 'Indefinido', 40, 2000.00, 'Nivel 2', TO_DATE('2022-08-01', 'YYYY-MM-DD'), TO_DATE('2025-08-01', 'YYYY-MM-DD'));

INSERT INTO TB_Contrato (CodContra, CodEmp, TipContra, HorasCont, Salario, EscalaSalarial, FecInicio, FecFin)
VALUES (5, 5, 'Temporal', 25, 1800.00, 'Nivel 3', TO_DATE('2023-04-01', 'YYYY-MM-DD'), TO_DATE('2024-04-01', 'YYYY-MM-DD'));

--Insertar registros en TB_Departamento
INSERT INTO TB_Departamento (CodDepar, Nombre, Ubicacion)
VALUES (1, 'Administración', 'Planta Baja');

INSERT INTO TB_Departamento (CodDepar, Nombre, Ubicacion)
VALUES (2, 'Medicina', 'Segundo Piso');

INSERT INTO TB_Departamento (CodDepar, Nombre, Ubicacion)
VALUES (3, 'Enfermería', 'Tercer Piso');

INSERT INTO TB_Departamento (CodDepar, Nombre, Ubicacion)
VALUES (4, 'Recepción', 'Planta Baja');

INSERT INTO TB_Departamento (CodDepar, Nombre, Ubicacion)
VALUES (5, 'Técnico', 'Sótano');

