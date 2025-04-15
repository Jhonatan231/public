Tablas sin dependencias:
*        TB_Departament
*        TB_Categoria
*        TB_TipoProducto
*        TB_Proveedores
*        TB_Horario
*        TB_Producto
*        TB_Pariente
*        TB_Empleados
*        TB_Contrato
*        TB_Experiencia
*        TB_Cualificaciones
*        TB_MedicoExterno
*        TB_Habitaciones
*        TB_Camas
*        TB_Producto_Almacen
*        TB_Almacen_Nivel
*        TB_Pedido
*        TB_Cita
Tablas con dependencias (que requieren que las anteriores existan):
*        TB_Paciente
*        TB_Paciente_Pariente
*        TB_Medicacion
*        TB_Paciente_MedicoExterno
*        TB_Departamentos
*        TB_Medicamen

--DATOS PARA CADA TABLA

-- TB_Categoria
SELECT * FROM TB_Categoria;
INSERT INTO TB_Categoria (CodCateg, Categoria) VALUES (1, 'Consulta Externa');
INSERT INTO TB_Categoria (CodCateg, Categoria) VALUES (2, 'Emergencias');
INSERT INTO TB_Categoria (CodCateg, Categoria) VALUES (3, 'Hospitalización');
INSERT INTO TB_Categoria (CodCateg, Categoria) VALUES (4, 'Cirugía');
INSERT INTO TB_Categoria (CodCateg, Categoria) VALUES (5, 'Pediatría');

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

-- TB_Empleados
SELECT * FROM TB_Empleados;
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (1, 1, 'Juan', 'Pérez', 'Calle 123', TO_DATE('1980-01-01', 'YYYY-MM-DD'), 'M', '12345678', 1, 1, '98765432');
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (2, 2, 'María', 'Gómez', 'Avenida 456', TO_DATE('1990-02-02', 'YYYY-MM-DD'), 'F', '87654321', 2, 2, '87654321');
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (3, 3, 'Luis', 'Ramírez', 'Calle 789', TO_DATE('1985-03-03', 'YYYY-MM-DD'), 'M', '23456789', 1, 1, '76543210');
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (4, 4, 'Laura', 'Hernández', 'Calle 101', TO_DATE('1975-04-04', 'YYYY-MM-DD'), 'F', '34567890', 2, 2, '65432109');
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (5, 5, 'Carlos', 'Martínez', 'Avenida 202', TO_DATE('1992-05-05', 'YYYY-MM-DD'), 'M', '45678901', 1, 1, '54321098');
INSERT INTO TB_Empleados (CodEmp, CodDepar, NomEmp, ApelEmp, Direccion, FecNac, SexEmp, DNIEmp, CodCateg, Turno, CodTelf) VALUES (6, 1, 'Sandra', 'López', 'Calle 303', TO_DATE('1988-06-06', 'YYYY-MM-DD'), 'F', '56789012', 1, 1, '43210987');

-- TB_Pacientes
SELECT * FROM TB_Pacientes;
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (1, 'Andrés', 'Mendoza', TO_DATE('1985-01-15', 'YYYY-MM-DD'), 'M', 'Calle A', '98765432');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (2, 'Fernanda', 'Cortez', TO_DATE('1990-03-25', 'YYYY-MM-DD'), 'F', 'Avenida B', '87654321');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (3, 'José', 'Gutiérrez', TO_DATE('1982-06-10', 'YYYY-MM-DD'), 'M', 'Calle C', '76543210');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (4, 'Patricia', 'López', TO_DATE('1978-08-05', 'YYYY-MM-DD'), 'F', 'Calle D', '65432109');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (5, 'Carlos', 'Salazar', TO_DATE('1995-10-20', 'YYYY-MM-DD'), 'M', 'Avenida E', '54321098');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (6, 'Sofía', 'Fernández', TO_DATE('1987-02-14', 'YYYY-MM-DD'), 'F', 'Calle F', '43210987');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (7, 'Luis', 'Torres', TO_DATE('1975-12-30', 'YYYY-MM-DD'), 'M', 'Avenida G', '32109876');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (8, 'María', 'Martínez', TO_DATE('1989-09-01', 'YYYY-MM-DD'), 'F', 'Calle H', '21098765');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (9, 'Jorge', 'Vargas', TO_DATE('1984-04-17', 'YYYY-MM-DD'), 'M', 'Avenida I', '10987654');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (10, 'Natalia', 'Reyes', TO_DATE('1992-07-19', 'YYYY-MM-DD'), 'F', 'Calle J', '98765432');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (11, 'Diego', 'Ceballos', TO_DATE('1980-05-11', 'YYYY-MM-DD'), 'M', 'Avenida K', '87654321');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (12, 'Luisa', 'González', TO_DATE('1983-11-22', 'YYYY-MM-DD'), 'F', 'Calle L', '76543210');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (13, 'Fernando', 'Suárez', TO_DATE('1996-09-09', 'YYYY-MM-DD'), 'M', 'Avenida M', '65432109');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (14, 'Gloria', 'Díaz', TO_DATE('1972-02-27', 'YYYY-MM-DD'), 'F', 'Calle N', '54321098');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (15, 'Samuel', 'Castillo', TO_DATE('1986-10-04', 'YYYY-MM-DD'), 'M', 'Avenida O', '43210987');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (16, 'Andrea', 'Pinto', TO_DATE('1994-03-30', 'YYYY-MM-DD'), 'F', 'Calle P', '32109876');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (17, 'Roberto', 'Mora', TO_DATE('1970-12-12', 'YYYY-MM-DD'), 'M', 'Avenida Q', '21098765');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (18, 'Cecilia', 'Bermúdez', TO_DATE('1981-08-21', 'YYYY-MM-DD'), 'F', 'Calle R', '10987654');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (19, 'Pablo', 'Maldonado', TO_DATE('1977-01-17', 'YYYY-MM-DD'), 'M', 'Avenida S', '98765432');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (20, 'Rosa', 'Valdez', TO_DATE('1993-05-15', 'YYYY-MM-DD'), 'F', 'Calle T', '87654321');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (21, 'Felipe', 'Salinas', TO_DATE('1988-07-14', 'YYYY-MM-DD'), 'M', 'Avenida U', '76543210');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (22, 'Verónica', 'Cruz', TO_DATE('1991-04-26', 'YYYY-MM-DD'), 'F', 'Calle V', '65432109');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (23, 'Eugenio', 'Ramos', TO_DATE('1979-03-08', 'YYYY-MM-DD'), 'M', 'Avenida W', '54321098');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (24, 'Marina', 'Ortega', TO_DATE('1984-06-18', 'YYYY-MM-DD'), 'F', 'Calle X', '43210987');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (25, 'Santiago', 'Arias', TO_DATE('1997-11-11', 'YYYY-MM-DD'), 'M', 'Avenida Y', '32109876');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (26, 'Carmen', 'Santos', TO_DATE('1982-02-05', 'YYYY-MM-DD'), 'F', 'Calle Z', '21098765');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (27, 'Manuel', 'Palacios', TO_DATE('1974-10-30', 'YYYY-MM-DD'), 'M', 'Avenida AA', '10987654');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (28, 'Silvia', 'Núñez', TO_DATE('1980-12-17', 'YYYY-MM-DD'), 'F', 'Calle BB', '98765432');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (29, 'Fernando', 'Zamora', TO_DATE('1989-03-03', 'YYYY-MM-DD'), 'M', 'Avenida CC', '87654321');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (30, 'Leticia', 'Gonzales', TO_DATE('1995-09-09', 'YYYY-MM-DD'), 'F', 'Calle DD', '76543210');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (31, 'Alberto', 'Castañeda', TO_DATE('1986-05-15', 'YYYY-MM-DD'), 'M', 'Avenida EE', '65432109');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (32, 'Gilda', 'Beltrán', TO_DATE('1992-02-14', 'YYYY-MM-DD'), 'F', 'Calle FF', '54321098');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (33, 'Oscar', 'Alvarado', TO_DATE('1978-10-20', 'YYYY-MM-DD'), 'M', 'Avenida GG', '43210987');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (34, 'Patricia', 'César', TO_DATE('1984-08-11', 'YYYY-MM-DD'), 'F', 'Calle HH', '32109876');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (35, 'Eduardo', 'Quintero', TO_DATE('1993-07-09', 'YYYY-MM-DD'), 'M', 'Avenida II', '21098765');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (36, 'Raquel', 'Arce', TO_DATE('1971-04-23', 'YYYY-MM-DD'), 'F', 'Calle JJ', '10987654');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (37, 'Hugo', 'López', TO_DATE('1985-05-30', 'YYYY-MM-DD'), 'M', 'Avenida KK', '98765432');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (38, 'Elena', 'Vallejo', TO_DATE('1990-09-15', 'YYYY-MM-DD'), 'F', 'Calle LL', '87654321');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (39, 'Felipe', 'Miranda', TO_DATE('1977-03-12', 'YYYY-MM-DD'), 'M', 'Avenida MM', '76543210');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (40, 'Ana', 'Tejada', TO_DATE('1988-01-28', 'YYYY-MM-DD'), 'F', 'Calle NN', '65432109');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (41, 'Cristian', 'Escobar', TO_DATE('1982-06-17', 'YYYY-MM-DD'), 'M', 'Avenida OO', '54321098');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (42, 'Patricia', 'Acosta', TO_DATE('1975-11-21', 'YYYY-MM-DD'), 'F', 'Calle PP', '43210987');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (43, 'Samuel', 'Moya', TO_DATE('1996-08-13', 'YYYY-MM-DD'), 'M', 'Avenida QQ', '32109876');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (44, 'Karla', 'Benítez', TO_DATE('1989-05-30', 'YYYY-MM-DD'), 'F', 'Calle RR', '21098765');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (45, 'Fernando', 'Gonzalez', TO_DATE('1980-01-25', 'YYYY-MM-DD'), 'M', 'Avenida SS', '10987654');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (46, 'Marisol', 'Pérez', TO_DATE('1991-03-18', 'YYYY-MM-DD'), 'F', 'Calle TT', '98765432');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (47, 'Nicolás', 'Hernández', TO_DATE('1976-04-12', 'YYYY-MM-DD'), 'M', 'Avenida UU', '87654321');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (48, 'Teresa', 'Cruz', TO_DATE('1994-06-05', 'YYYY-MM-DD'), 'F', 'Calle VV', '76543210');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (49, 'Javier', 'Mendoza', TO_DATE('1988-09-07', 'YYYY-MM-DD'), 'M', 'Avenida WW', '65432109');
INSERT INTO TB_Pacientes (CodPac, NomPac, ApelPac, FecNac, Genero, Direccion, Telefono) VALUES (50, 'Cynthia', 'Torres', TO_DATE('1993-12-29', 'YYYY-MM-DD'), 'F', 'Calle XX', '54321098');

-- TB_Medicos
SELECT * FROM TB_Medicos;
INSERT INTO TB_Medicos (CodMed, NomMed, ApelMed, Especialidad, CodTelf) VALUES (1, 'Dr. Juan', 'Martinez', 'Cardiología', '98765432');
INSERT INTO TB_Medicos (CodMed, NomMed, ApelMed, Especialidad, CodTelf) VALUES (2, 'Dra. Ana', 'Gómez', 'Pediatría', '87654321');
INSERT INTO TB_Medicos (CodMed, NomMed, ApelMed, Especialidad, CodTelf) VALUES (3, 'Dr. Carlos', 'Salas', 'Cirugía General', '76543210');
INSERT INTO TB_Medicos (CodMed, NomMed, ApelMed, Especialidad, CodTelf) VALUES (4, 'Dra. Laura', 'Cáceres', 'Dermatología', '65432109');
INSERT INTO TB_Medicos (CodMed, NomMed, ApelMed, Especialidad, CodTelf) VALUES (5, 'Dr. Ricardo', 'Pérez', 'Ginecología', '54321098');
INSERT INTO TB_Medicos (CodMed, NomMed, ApelMed, Especialidad, CodTelf) VALUES (6, 'Dra. Beatriz', 'Mendoza', 'Neurología', '43210987');
INSERT INTO TB_Medicos (CodMed, NomMed, ApelMed, Especialidad, CodTelf) VALUES (7, 'Dr. Gustavo', 'Rivas', 'Oncología', '32109876');
INSERT INTO TB_Medicos (CodMed, NomMed, ApelMed, Especialidad, CodTelf) VALUES (8, 'Dra. Patricia', 'Ramírez', 'Oftalmología', '21098765');
INSERT INTO TB_Medicos (CodMed, NomMed, ApelMed, Especialidad, CodTelf) VALUES (9, 'Dr. Hugo', 'Paz', 'Traumatología', '10987654');
INSERT INTO TB_Medicos (CodMed, NomMed, ApelMed, Especialidad, CodTelf) VALUES (10, 'Dra. Verónica', 'Cruz', 'Psiquiatría', '98765432');

-- TB_MedicosExternos
SELECT * FROM TB_MedicosExternos;
INSERT INTO TB_MedicosExternos (CodMedEx, NomMedEx, ApelMedEx, Especialidad, CodTelf) VALUES (1, 'Dr. Luis', 'Alvarez', 'Geriatría', '87654321');
INSERT INTO TB_MedicosExternos (CodMedEx, NomMedEx, ApelMedEx, Especialidad, CodTelf) VALUES (2, 'Dra. Carmen', 'Salinas', 'Endocrinología', '76543210');
INSERT INTO TB_MedicosExternos (CodMedEx, NomMedEx, ApelMedEx, Especialidad, CodTelf) VALUES (3, 'Dr. Ricardo', 'González', 'Alergología', '65432109');
INSERT INTO TB_MedicosExternos (CodMedEx, NomMedEx, ApelMedEx, Especialidad, CodTelf) VALUES (4, 'Dra. Isabel', 'Mora', 'Reumatología', '54321098');
INSERT INTO TB_MedicosExternos (CodMedEx, NomMedEx, ApelMedEx, Especialidad, CodTelf) VALUES (5, 'Dr. Fernando', 'Ríos', 'Fisioterapia', '43210987');

-- TB_Hospitales
SELECT * FROM TB_Hospitales;
INSERT INTO TB_Hospitales (CodHosp, NomHosp, Direccion, Telefono, Nivel) VALUES (1, 'Hospital Central', 'Avenida Libertador', '98765432', 5);
INSERT INTO TB_Hospitales (CodHosp, NomHosp, Direccion, Telefono, Nivel) VALUES (2, 'Hospital del Norte', 'Calle Independencia', '87654321', 4);
INSERT INTO TB_Hospitales (CodHosp, NomHosp, Direccion, Telefono, Nivel) VALUES (3, 'Hospital del Sur', 'Calle 9 de Octubre', '76543210', 3);
INSERT INTO TB_Hospitales (CodHosp, NomHosp, Direccion, Telefono, Nivel) VALUES (4, 'Hospital de Especialidades', 'Avenida 10 de Agosto', '65432109', 2);
INSERT INTO TB_Hospitales (CodHosp, NomHosp, Direccion, Telefono, Nivel) VALUES (5, 'Centro de Salud', 'Calle 24 de Mayo', '54321098', 1);

-- TB_Enfermedades
SELECT * FROM TB_Enfermedades;
INSERT INTO TB_Enfermedades (CodEnf, NomEnf, Descripcion) VALUES (1, 'Diabetes', 'Enfermedad crónica que afecta la forma en que el cuerpo procesa la glucosa en la sangre.');
INSERT INTO TB_Enfermedades (CodEnf, NomEnf, Descripcion) VALUES (2, 'Hipertensión', 'Aumento de la presión arterial que puede causar problemas en el corazón.');
INSERT INTO TB_Enfermedades (CodEnf, NomEnf, Descripcion) VALUES (3, 'Asma', 'Enfermedad respiratoria crónica que inflama y estrecha las vías respiratorias.');
INSERT INTO TB_Enfermedades (CodEnf, NomEnf, Descripcion) VALUES (4, 'Cáncer', 'Enfermedad en la que las células del cuerpo comienzan a crecer sin control.');
INSERT INTO TB_Enfermedades (CodEnf, NomEnf, Descripcion) VALUES (5, 'Artritis', 'Inflamación de las articulaciones que causa dolor y rigidez.');

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
