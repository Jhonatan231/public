
-- TB_Proveedores
SELECT * FROM TB_Proveedores;
INSERT INTO TB_Proveedores (CodProve, Nombre, Descripcion, CodTelf) VALUES (1, 'Farmacia Central', 'Proveedor de medicamentos y suministros médicos', '98765432');
INSERT INTO TB_Proveedores (CodProve, Nombre, Descripcion, CodTelf) VALUES (2, 'Suministros Hospitalarios', 'Equipos y suministros para hospitales', '12345678');

-- TB_TipoProducto
SELECT * FROM TB_TipoProducto;
INSERT INTO TB_TipoProducto (CodTipo, Tipo) VALUES (1, 'Medicamento');
INSERT INTO TB_TipoProducto (CodTipo, Tipo) VALUES (2, 'Equipamiento');
INSERT INTO TB_TipoProducto (CodTipo, Tipo) VALUES (3, 'Suministros');

-- TB_Producto
SELECT * FROM TB_Producto;
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (1, 'Paracetamol', 'Analgésico y antipirético', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (2, 'Aspirina', 'Antiinflamatorio no esteroideo', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (3, 'Ibuprofeno', 'Antiinflamatorio', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (4, 'Amoxicilina', 'Antibiótico', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (5, 'Loratadina', 'Antihistamínico', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (6, 'Insulina', 'Hormona para diabetes', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (7, 'Ciprofloxacino', 'Antibiótico', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (8, 'Paracetamol + Cafeína', 'Analgésico combinado', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (9, 'Furosemida', 'Diurético', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (10, 'Omeprazol', 'Inhibidor de la bomba de protones', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (11, 'Salbutamol', 'Broncodilatador', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (12, 'Metformina', 'Antidiabético', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (13, 'Atorvastatina', 'Estatina', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (14, 'Warfarina', 'Anticoagulante', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (15, 'Cetirizina', 'Antihistamínico', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (16, 'Diclofenaco', 'Antiinflamatorio', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (17, 'Clonazepam', 'Ansiolítico', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (18, 'Fluoxetina', 'Antidepresivo', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (19, 'Lisinopril', 'Antihipertensivo', 1, 1);
INSERT INTO TB_Producto (CodProd, Nombre, Descripcion, CodTipo, CodProve) VALUES (20, 'Ranitidina', 'Antiacido', 1, 1);

-- TB_Departament
SELECT * FROM TB_Departament;
INSERT INTO TB_Departament (CodDepar, NomDepar, Ubicacion, CodTelf) VALUES (1, 'Urgencias', 'Nivel 1', 12345678);
INSERT INTO TB_Departament (CodDepar, NomDepar, Ubicacion, CodTelf) VALUES (2, 'Consulta Externa', 'Nivel 2', 23456789);
INSERT INTO TB_Departament (CodDepar, NomDepar, Ubicacion, CodTelf) VALUES (3, 'Pediatría', 'Nivel 3', 34567890);
INSERT INTO TB_Departament (CodDepar, NomDepar, Ubicacion, CodTelf) VALUES (4, 'Cirugía', 'Nivel 4', 45678901);
INSERT INTO TB_Departament (CodDepar, NomDepar, Ubicacion, CodTelf) VALUES (5, 'Oncología', 'Nivel 5', 56789012);


-- Consulta para mostrar todos los horarios
SELECT * FROM TB_Horario;

-- Inserción de datos en la tabla TB_Horario
INSERT INTO TB_Horario (Turno, HEntrada, HSalida) VALUES (1, TO_TIMESTAMP('07:00:00', 'HH24:MI:SS'), TO_TIMESTAMP('15:00:00', 'HH24:MI:SS'));
INSERT INTO TB_Horario (Turno, HEntrada, HSalida) VALUES (2, TO_TIMESTAMP('16:00:00', 'HH24:MI:SS'), TO_TIMESTAMP('21:59:59', 'HH24:MI:SS'));
INSERT INTO TB_Horario (Turno, HEntrada, HSalida) VALUES (3, TO_TIMESTAMP('08:00:00', 'HH24:MI:SS'), TO_TIMESTAMP('16:00:00', 'HH24:MI:SS'));
INSERT INTO TB_Horario (Turno, HEntrada, HSalida) VALUES (4, TO_TIMESTAMP('12:00:00', 'HH24:MI:SS'), TO_TIMESTAMP('20:00:00', 'HH24:MI:SS'));
INSERT INTO TB_Horario (Turno, HEntrada, HSalida) VALUES (5, TO_TIMESTAMP('22:00:00', 'HH24:MI:SS'), TO_TIMESTAMP('06:00:00', 'HH24:MI:SS'));


-- Inserción de datos en la tabla TB_Empleados
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (1, 1, 'Juan', 'Pérez', 'Calle 123', TO_DATE('1980-01-01', 'YYYY-MM-DD'), 'M', '12345678', 1, NULL, '98765432');
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (2, 1, 'María', 'Gómez', 'Calle 234', TO_DATE('1985-05-12', 'YYYY-MM-DD'), 'F', '87654321', 2, NULL, '12345678');
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (3, 2, 'Carlos', 'Sánchez', 'Calle 345', TO_DATE('1990-03-23', 'YYYY-MM-DD'), 'M', '45678901', 1, NULL, '23456789');
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (4, 2, 'Lucía', 'Fernández', 'Calle 456', TO_DATE('1995-07-30', 'YYYY-MM-DD'), 'F', '23456789', 2, NULL, '34567890');
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (5, 3, 'Pedro', 'López', 'Calle 567', TO_DATE('1982-09-15', 'YYYY-MM-DD'), 'M', '67890123', 3, NULL, '45678901');
-- (Agrega más empleados aquí)

-- Asignar turnos aleatorios a los empleados
UPDATE TB_Empleados
SET Turno = FLOOR(DBMS_RANDOM.VALUE(1, 6));  -- Genera un número aleatorio entre 1 y 5 (inclusive)

-- Consulta para verificar la inserción y actualización de los empleados
SELECT * FROM TB_Empleados;


-- Consulta para verificar los empleados antes de la inserción
SELECT * FROM TB_Empleados;

-- Inserción de datos en la tabla TB_Empleados con turnos aleatorios
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) 
VALUES (1, 1, 'Juan', 'Pérez', 'Calle 123', TO_DATE('1980-01-01', 'YYYY-MM-DD'), 'M', '12345678', 1, FLOOR(DBMS_RANDOM.VALUE(1, 6)), '98765432');

INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) 
VALUES (2, 2, 'María', 'Gómez', 'Avenida 456', TO_DATE('1990-02-02', 'YYYY-MM-DD'), 'F', '87654321', 2, FLOOR(DBMS_RANDOM.VALUE(1, 6)), '87654321');

INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) 
VALUES (3, 3, 'Luis', 'Ramírez', 'Calle 789', TO_DATE('1985-03-03', 'YYYY-MM-DD'), 'M', '23456789', 1, FLOOR(DBMS_RANDOM.VALUE(1, 6)), '76543210');

INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) 
VALUES (4, 4, 'Laura', 'Hernández', 'Calle 101', TO_DATE('1975-04-04', 'YYYY-MM-DD'), 'F', '34567890', 2, FLOOR(DBMS_RANDOM.VALUE(1, 6)), '65432109');

INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) 
VALUES (5, 5, 'Carlos', 'Martínez', 'Avenida 202', TO_DATE('1992-05-05', 'YYYY-MM-DD'), 'M', '45678901', 1, FLOOR(DBMS_RANDOM.VALUE(1, 6)), '54321098');

INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) 
VALUES (6, 1, 'Sandra', 'López', 'Calle 303', TO_DATE('1988-06-06', 'YYYY-MM-DD'), 'F', '56789012', 1, FLOOR(DBMS_RANDOM.VALUE(1, 6)), '43210987');

-- Consulta para verificar la inserción de empleados
SELECT * FROM TB_Empleados;

-- Inserción de datos en la tabla TB_Paciente
select * from TB_paciente;
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (1, 'Andrés', 'Mendoza', TO_DATE('1985-01-15', 'YYYY-MM-DD'), 'M', 'Calle A', '98765432');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (2, 'Fernanda', 'Cortez', TO_DATE('1990-03-25', 'YYYY-MM-DD'), 'F', 'Avenida B', '87654321');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (3, 'José', 'Gutiérrez', TO_DATE('1982-06-10', 'YYYY-MM-DD'), 'M', 'Calle C', '76543210');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (4, 'Patricia', 'López', TO_DATE('1978-08-05', 'YYYY-MM-DD'), 'F', 'Calle D', '65432109');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (5, 'Carlos', 'Salazar', TO_DATE('1995-10-20', 'YYYY-MM-DD'), 'M', 'Avenida E', '54321098');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (6, 'Sofía', 'Fernández', TO_DATE('1987-02-14', 'YYYY-MM-DD'), 'F', 'Calle F', '43210987');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (7, 'Luis', 'Torres', TO_DATE('1975-12-30', 'YYYY-MM-DD'), 'M', 'Avenida G', '32109876');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (8, 'María', 'Martínez', TO_DATE('1989-09-01', 'YYYY-MM-DD'), 'F', 'Calle H', '21098765');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (9, 'Jorge', 'Vargas', TO_DATE('1984-04-17', 'YYYY-MM-DD'), 'M', 'Avenida I', '10987654');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (10, 'Natalia', 'Reyes', TO_DATE('1992-07-19', 'YYYY-MM-DD'), 'F', 'Calle J', '98765432');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (11, 'Diego', 'Ceballos', TO_DATE('1980-05-11', 'YYYY-MM-DD'), 'M', 'Avenida K', '87654321');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (12, 'Luisa', 'González', TO_DATE('1983-11-22', 'YYYY-MM-DD'), 'F', 'Calle L', '76543210');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (13, 'Fernando', 'Suárez', TO_DATE('1996-09-09', 'YYYY-MM-DD'), 'M', 'Avenida M', '65432109');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (14, 'Gloria', 'Díaz', TO_DATE('1972-02-27', 'YYYY-MM-DD'), 'F', 'Calle N', '54321098');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (15, 'Samuel', 'Castillo', TO_DATE('1986-10-04', 'YYYY-MM-DD'), 'M', 'Avenida O', '43210987');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (16, 'Andrea', 'Pinto', TO_DATE('1994-03-30', 'YYYY-MM-DD'), 'F', 'Calle P', '32109876');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (17, 'Roberto', 'Mora', TO_DATE('1970-12-12', 'YYYY-MM-DD'), 'M', 'Avenida Q', '21098765');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (18, 'Cecilia', 'Bermúdez', TO_DATE('1981-08-21', 'YYYY-MM-DD'), 'F', 'Calle R', '10987654');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (19, 'Pablo', 'Maldonado', TO_DATE('1977-01-17', 'YYYY-MM-DD'), 'M', 'Avenida S', '98765432');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (20, 'Rosa', 'Valdez', TO_DATE('1993-05-15', 'YYYY-MM-DD'), 'F', 'Calle T', '87654321');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (21, 'Felipe', 'Salinas', TO_DATE('1988-07-14', 'YYYY-MM-DD'), 'M', 'Avenida U', '76543210');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (22, 'Verónica', 'Cruz', TO_DATE('1991-04-26', 'YYYY-MM-DD'), 'F', 'Calle V', '65432109');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (23, 'Eugenio', 'Ramos', TO_DATE('1979-03-08', 'YYYY-MM-DD'), 'M', 'Avenida W', '54321098');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (24, 'Marina', 'Ortega', TO_DATE('1984-06-18', 'YYYY-MM-DD'), 'F', 'Calle X', '43210987');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (25, 'Santiago', 'Arias', TO_DATE('1997-11-11', 'YYYY-MM-DD'), 'M', 'Avenida Y', '32109876');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (26, 'Carmen', 'Santos', TO_DATE('1982-02-05', 'YYYY-MM-DD'), 'F', 'Calle Z', '21098765');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (27, 'Manuel', 'Jiménez', TO_DATE('1976-09-09', 'YYYY-MM-DD'), 'M', 'Avenida AA', '10987654');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (28, 'Claudia', 'Guerrero', TO_DATE('1999-12-31', 'YYYY-MM-DD'), 'F', 'Calle BB', '98765432');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (29, 'Gustavo', 'Vasquez', TO_DATE('1980-04-20', 'YYYY-MM-DD'), 'M', 'Avenida CC', '87654321');
INSERT INTO TB_Paciente (CodPac, NomCli, ApelCli, FecNac, SexoCli, DirecPac, CodTelf) VALUES (30, 'Silvia', 'Cárdenas', TO_DATE('1995-01-02', 'YYYY-MM-DD'), 'F', 'Calle DD', '76543210');




-- Asegúrate de que los valores de CodDepar sean válidos según la tabla TB_Departament.
INSERT INTO TB_MedicoExterno (CodMed, CodDepar, NomMed, ApeMed, CodTelf) VALUES (1, 1, 'Dr. Luis', 'Alvarez', '87654321');
INSERT INTO TB_MedicoExterno (CodMed, CodDepar, NomMed, ApeMed, CodTelf) VALUES (2, 1, 'Dra. Carmen', 'Salinas', '76543210');
INSERT INTO TB_MedicoExterno (CodMed, CodDepar, NomMed, ApeMed, CodTelf) VALUES (3, 2, 'Dr. Ricardo', 'González', '65432109');
INSERT INTO TB_MedicoExterno (CodMed, CodDepar, NomMed, ApeMed, CodTelf) VALUES (4, 2, 'Dra. Isabel', 'Mora', '54321098');
INSERT INTO TB_MedicoExterno (CodMed, CodDepar, NomMed, ApeMed, CodTelf) VALUES (5, 3, 'Dr. Fernando', 'Ríos', '43210987');



-- TB_Consultas
SELECT * FROM TB_Consultas;
INSERT INTO TB_Consultas (CodCons, CodPac, CodMed, Fecha, Hora, Motivo, Descripcion) VALUES (1, 1, 1, TO_DATE('2024-10-20', 'YYYY-MM-DD'), '09:00', 'Chequeo Cardiológico', 'Consulta para chequeo general del corazón.');
INSERT INTO TB_Consultas (CodCons, CodPac, CodMed, Fecha, Hora, Motivo, Descripcion) VALUES (2, 2, 2, TO_DATE('2024-10-21', 'YYYY-MM-DD'), '10:00', 'Control Pediátrico', 'Revisión del crecimiento y desarrollo.');
INSERT INTO TB_Consultas (CodCons, CodPac, CodMed, Fecha, Hora, Motivo, Descripcion) VALUES (3, 3, 3, TO_DATE('2024-10-22', 'YYYY-MM-DD'), '11:00', 'Consulta de Cirugía', 'Evaluación para posible cirugía.');
INSERT INTO TB_Consultas (CodCons, CodPac, CodMed, Fecha, Hora, Motivo, Descripcion) VALUES (4, 4, 4, TO_DATE('2024-10-23', 'YYYY-MM-DD'), '08:30', 'Consulta Dermatológica', 'Revisión de una erupción cutánea.');
INSERT INTO TB_Consultas (CodCons, CodPac, CodMed, Fecha, Hora, Motivo, Descripcion) VALUES (5, 5, 5, TO_DATE('2024-10-24', 'YYYY-MM-DD'), '14:00', 'Chequeo Ginecológico', 'Examen anual de salud femenina.');
INSERT INTO TB_Consultas (CodCons, CodPac, CodMed, Fecha, Hora, Motivo, Descripcion) VALUES (6, 6, 6, TO_DATE('2024-10-25', 'YYYY-MM-DD'), '15:00', 'Consulta Neurológica', 'Evaluación de síntomas neurológicos.');
INSERT INTO TB_Consultas (CodCons, CodPac, CodMed, Fecha, Hora, Motivo, Descripcion) VALUES (7, 7, 7, TO_DATE('2024-10-26', 'YYYY-MM-DD'), '09:30', 'Consulta Oncológica', 'Revisión de tratamiento oncológico.');
INSERT INTO TB_Consultas (CodCons, CodPac, CodMed, Fecha, Hora, Motivo, Descripcion) VALUES (8, 8, 8, TO_DATE('2024-10-27', 'YYYY-MM-DD'), '13:00', 'Chequeo Visual', 'Evaluación de la vista.');
INSERT INTO TB_Consultas (CodCons, CodPac, CodMed, Fecha, Hora, Motivo, Descripcion) VALUES (9, 9, 9, TO_DATE('2024-10-28', 'YYYY-MM-DD'), '10:15', 'Consulta Traumatológica', 'Evaluación de lesiones deportivas.');
INSERT INTO TB_Consultas (CodCons, CodPac, CodMed, Fecha, Hora, Motivo, Descripcion) VALUES (10, 10, 10, TO_DATE('2024-10-29', 'YYYY-MM-DD'), '11:45', 'Consulta Psiquiátrica', 'Evaluación de salud mental.');

-- TB_Tratamientos
SELECT * FROM TB_Tratamientos;
INSERT INTO TB_Tratamientos (CodTra, CodCons, Descripcion, Medicamentos) VALUES (1, 1, 'Chequeo de rutina', 'Aspirina, Betabloqueantes');
INSERT INTO TB_Tratamientos (CodTra, CodCons, Descripcion, Medicamentos) VALUES (2, 2, 'Control de crecimiento', 'Multivitaminas');
INSERT INTO TB_Tratamientos (CodTra, CodCons, Descripcion, Medicamentos) VALUES (3, 3, 'Preparación para cirugía', 'Anestesia, Antibióticos');
INSERT INTO TB_Tratamientos (CodTra, CodCons, Descripcion, Medicamentos) VALUES (4, 4, 'Tratamiento de erupción', 'Cremas tópicas');
INSERT INTO TB_Tratamientos (CodTra, CodCons, Descripcion, Medicamentos) VALUES (5, 5, 'Examen de rutina', 'Anticonceptivos, Suplementos');
INSERT INTO TB_Tratamientos (CodTra, CodCons, Descripcion, Medicamentos) VALUES (6, 6, 'Evaluación de síntomas', 'Medicamentos para el dolor');
INSERT INTO TB_Tratamientos (CodTra, CodCons, Descripcion, Medicamentos) VALUES (7, 7, 'Seguimiento de tratamiento', 'Quimioterapia');
INSERT INTO TB_Tratamientos (CodTra, CodCons, Descripcion, Medicamentos) VALUES (8, 8, 'Examen visual', 'Gotas para los ojos');
INSERT INTO TB_Tratamientos (CodTra, CodCons, Descripcion, Medicamentos) VALUES (9, 9, 'Tratamiento de lesiones', 'Analgésicos, Fisioterapia');
INSERT INTO TB_Tratamientos (CodTra, CodCons, Descripcion, Medicamentos) VALUES (10, 10, 'Evaluación de salud mental', 'Antidepresivos');
