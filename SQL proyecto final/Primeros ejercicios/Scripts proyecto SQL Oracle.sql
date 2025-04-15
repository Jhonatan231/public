CREATE TABLE TB_Paciente (
    CodPac NUMBER PRIMARY KEY,
    NomCli VARCHAR2(100),
    ApelCli VARCHAR2(100),
    DirecPac VARCHAR2(200),
    FecNac DATE,
    SexoCli CHAR(1),
    CodEmp NUMBER,
    FecReg DATE,
    EstCivil VARCHAR2(50),
    CodTelf VARCHAR2(20),
    CONSTRAINT fk_paciente_empleado FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp)
);

CREATE TABLE TB_Pariente (
    CodPar NUMBER PRIMARY KEY,
    NomPar VARCHAR2(100),
    ApelPar VARCHAR2(100),
    DirecPar VARCHAR2(200),
    CodTelf VARCHAR2(20)
);

CREATE TABLE TB_Paciente_Pariente (
    CodPar NUMBER,
    CodPac NUMBER,
    Relacion VARCHAR2(50),
    PRIMARY KEY (CodPar, CodPac),
    CONSTRAINT fk_paciente_pariente_par FOREIGN KEY (CodPar) REFERENCES TB_Pariente(CodPar),
    CONSTRAINT fk_paciente_pariente_pac FOREIGN KEY (CodPac) REFERENCES TB_Paciente(CodPac)
);

CREATE TABLE TB_Empleados (
    CodEmp NUMBER PRIMARY KEY,
    CodDepar NUMBER,
    NomEmp VARCHAR2(100),
    ApelEmp VARCHAR2(100),
    Direccion VARCHAR2(200),
    FecNac DATE,
    SexEmp CHAR(1),
    DNIEmp VARCHAR2(20),
    CodCateg NUMBER,
    Turno NUMBER,
    CodTelf VARCHAR2(20),
    CONSTRAINT fk_empleado_departamento FOREIGN KEY (CodDepar) REFERENCES TB_Departament(CodDepar),
    CONSTRAINT fk_empleado_categoria FOREIGN KEY (CodCateg) REFERENCES TB_Categoria(CodCateg),
    CONSTRAINT fk_empleado_horario FOREIGN KEY (Turno) REFERENCES TB_Horario(Turno)
);

CREATE TABLE TB_Categoria (
    CodCateg NUMBER PRIMARY KEY,
    Categoria VARCHAR2(100)
);

CREATE TABLE TB_Contrato (
    CodContra NUMBER PRIMARY KEY,
    CodEmp NUMBER,
    TipContra VARCHAR2(200),
    HorasCont NUMBER,
    Salario NUMBER(10,2),
    EscalaSalarial VARCHAR2(100),
    FecInicio DATE,
    FecFin DATE,
    CONSTRAINT fk_contrato_empleado FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp)
);

CREATE TABLE TB_Experiencia (
    CodExpe NUMBER PRIMARY KEY,
    Posicion VARCHAR2(100),
    FecIni DATE,
    FecFinal DATE,
    NomInst VARCHAR2(100),
    CodEmp NUMBER,
    CONSTRAINT fk_experiencia_empleado FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp)
);

CREATE TABLE TB_Cualificaciones (
    CodCual NUMBER PRIMARY KEY,
    CodEmp NUMBER,
    FecCuali DATE,
    CualiObt VARCHAR2(100),
    TipoInst VARCHAR2(100),
    NomInst VARCHAR2(100),
    CONSTRAINT fk_cualificaciones_empleado FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp)
);

CREATE TABLE TB_MedicoExterno (
    CodMed NUMBER PRIMARY KEY,
    CodDepar NUMBER,
    NomMed VARCHAR2(100),
    ApeMed VARCHAR2(100),
    CodTelf VARCHAR2(20),
    CONSTRAINT fk_medicoexterno_departamento FOREIGN KEY (CodDepar) REFERENCES TB_Departament(CodDepar)
);

CREATE TABLE TB_Cita (
    CodCita NUMBER PRIMARY KEY,
    CodPac NUMBER,
    CodEmp NUMBER,
    CodHab NUMBER,
    FecHorCita DATE,
    FecEspSalida DATE,
    FecSalida DATE,
    CONSTRAINT fk_cita_paciente FOREIGN KEY (CodPac) REFERENCES TB_Paciente(CodPac),
    CONSTRAINT fk_cita_empleado FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp),
    CONSTRAINT fk_cita_habitacion FOREIGN KEY (CodHab) REFERENCES TB_Habitaciones(CodHab)
);

CREATE TABLE TB_Habitaciones (
    CodHab NUMBER PRIMARY KEY,
    CodDepar NUMBER,
    Bloque VARCHAR2(50),
    Descripcion VARCHAR2(200),
    CodTelf VARCHAR2(20),
    CONSTRAINT fk_habitacion_departamento FOREIGN KEY (CodDepar) REFERENCES TB_Departament(CodDepar)
);

CREATE TABLE TB_Departamentos (
    CodDepar NUMBER,
    CodProd NUMBER,
    Cantidad NUMBER,
    PRIMARY KEY (CodDepar, CodProd),
    CONSTRAINT fk_departamento_prod FOREIGN KEY (CodProd) REFERENCES TB_Producto(CodProd)
);

CREATE TABLE TB_Camas (
    CodCamas NUMBER PRIMARY KEY,
    CodHab NUMBER,
    CONSTRAINT fk_cama_habitacion FOREIGN KEY (CodHab) REFERENCES TB_Habitaciones(CodHab)
);

CREATE TABLE TB_Producto (
    CodProd NUMBER PRIMARY KEY,
    Nombre VARCHAR2(100),
    Descripcion VARCHAR2(200),
    CodTipo NUMBER,
    CodProve NUMBER,
    CONSTRAINT fk_producto_tipoproducto FOREIGN KEY (CodTipo) REFERENCES TB_TipoProducto(CodTipo),
    CONSTRAINT fk_producto_proveedor FOREIGN KEY (CodProve) REFERENCES TB_Proveedores(CodProve)
);

CREATE TABLE TB_Proveedores (
    CodProve NUMBER PRIMARY KEY,
    Nombre VARCHAR2(100),
    Descripcion VARCHAR2(200),
    CodTelf VARCHAR2(20)
);

CREATE TABLE TB_TipoProducto (
    CodTipo NUMBER PRIMARY KEY,
    Tipo VARCHAR2(50)
);

CREATE TABLE TB_Producto_Almacen (
    CodProd NUMBER,
    CodNivel NUMBER,
    Cantidad NUMBER,
    CostoUnitario NUMBER(10,2),
    PRIMARY KEY (CodProd, CodNivel),
    CONSTRAINT fk_producto_almacen_producto FOREIGN KEY (CodProd) REFERENCES TB_Producto(CodProd),
    CONSTRAINT fk_producto_almacen_nivel FOREIGN KEY (CodNivel) REFERENCES TB_Almacen_Nivel(CodNivel)
);

CREATE TABLE TB_Almacen_Nivel (
    CodNivel NUMBER PRIMARY KEY,
    Nivel VARCHAR2(50)
);

CREATE TABLE TB_Pedido (
    CodPedido NUMBER PRIMARY KEY,
    CodEmp NUMBER,
    CodDepar NUMBER,
    CodProd NUMBER,
    Cantidad NUMBER,
    Fecha DATE,
    CONSTRAINT fk_pedido_empleado FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp),
    CONSTRAINT fk_pedido_departamento FOREIGN KEY (CodDepar) REFERENCES TB_Departament(CodDepar),
    CONSTRAINT fk_pedido_producto FOREIGN KEY (CodProd) REFERENCES TB_Producto(CodProd)
);

CREATE TABLE TB_Horario (
    Turno NUMBER PRIMARY KEY,
    HEntrada TIMESTAMP,
    HSalida TIMESTAMP
);

CREATE TABLE TB_Medicacion (
    CodMed NUMBER PRIMARY KEY,
    CodPac NUMBER,
    CodCamas NUMBER,
    CodProd NUMBER,
    UnidadesDiarias NUMBER,
    FecInic DATE,
    FecFin DATE,
    CONSTRAINT fk_medicacion_paciente FOREIGN KEY (CodPac) REFERENCES TB_Paciente(CodPac),
    CONSTRAINT fk_medicacion_cama FOREIGN KEY (CodCamas) REFERENCES TB_Camas(CodCamas),
    CONSTRAINT fk_medicacion_producto FOREIGN KEY (CodProd) REFERENCES TB_Producto(CodProd)
);

CREATE TABLE TB_Paciente_MedicoExterno (
    CodMed NUMBER,
    CodPac NUMBER,
    PRIMARY KEY (CodMed, CodPac),
    CONSTRAINT fk_paciente_medicoexterno_medico FOREIGN KEY (CodMed) REFERENCES TB_MedicoExterno(CodMed),
    CONSTRAINT fk_paciente_medicoexterno_paciente FOREIGN KEY (CodPac) REFERENCES TB_Paciente(CodPac)
);

CREATE TABLE TB_Departament (
    CodDepar NUMBER PRIMARY KEY,
    NomDepar VARCHAR2(200),
    Ubicacion VARCHAR2(200),
    CodTelf NUMBER
);

CREATE TABLE TB_Medicamen (
    CodMedica NUMBER PRIMARY KEY,
    CodProd NUMBER,
    Especialidad VARCHAR2(200),
    Dosis VARCHAR2(100),
    ModAminis VARCHAR2(100),
    CONSTRAINT fk_medicamen_producto FOREIGN KEY (CodProd) REFERENCES TB_Producto(CodProd)
);
