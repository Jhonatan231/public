CREATE TABLE TB_Paciente (
    CodPac INT PRIMARY KEY,
    NomCli VARCHAR(100),
    ApelCli VARCHAR(100),
    DirecPac VARCHAR(200),
    FecNac DATE,
    SexoCli CHAR(1),
    CodEmp INT,
    FecReg DATE,
    EstCivil VARCHAR(50),
    CodTelf VARCHAR(20),
    FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp)
);

CREATE TABLE TB_Pariente (
    CodPar INT PRIMARY KEY,
    NomPar VARCHAR(100),
    ApelPar VARCHAR(100),
    DirecPar VARCHAR(200),
    CodTelf VARCHAR(20)
);

CREATE TABLE TB_Paciente_Pariente (
    CodPar INT,
    CodPac INT,
    Relacion VARCHAR(50),
    PRIMARY KEY (CodPar, CodPac),
    FOREIGN KEY (CodPar) REFERENCES TB_Pariente(CodPar),
    FOREIGN KEY (CodPac) REFERENCES TB_Paciente(CodPac)
);

CREATE TABLE TB_Empleados (
    CodEmp INT PRIMARY KEY,
    CodDepar INT,
    NomEmp VARCHAR(100),
    ApelEmp VARCHAR(100),
    Direccion VARCHAR(200),
    FecNac DATE,
    SexEmp CHAR(1),
    DNIEmp VARCHAR(20),
    CodCateg INT,
    Turno INT,
    CodTelf VARCHAR(20),
    FOREIGN KEY (CodDepart) REFERENCES TB_Departamentos(CodDepart),
    FOREIGN KEY (CodCateg) REFERENCES TB_Categoria(CodCateg),
    FOREIGN KEY (Turno) REFERENCES TB_Horario(Turno)
);

CREATE TABLE TB_Categoria (
    CodCateg INT PRIMARY KEY,
    Categoria VARCHAR(100)
);

CREATE TABLE TB_Contrato (
    CodContra INT PRIMARY KEY,
    CodEmp INT,
    TipContra VARCHAR(200),
    HorasCont INT,
    Salario DECIMAL(10,2),
    EscalaSalarial VARCHAR(100),
    FecInicio DATE,
    FecFin DATE,
    FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp)
);

CREATE TABLE TB_Experiencia (
    CodExpe INT PRIMARY KEY,
    Posicion VARCHAR(100),
    FecIni DATE,
    FecFinal DATE,
    NomInst VARCHAR(100),
    CodEmp INT,
    FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp)
);

CREATE TABLE TB_Cualificaciones (
    CodCual INT PRIMARY KEY,
    CodEmp INT,
    FecCuali DATE,
    CualiObt VARCHAR(100),
    TipoInst VARCHAR(100),
    NomInst VARCHAR(100),
    FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp)
);

CREATE TABLE TB_MedicoExterno (
    CodMed INT PRIMARY KEY,
    CodDepar INT,
    NomMed VARCHAR(100),
    ApeMed VARCHAR(100),
    CodTelf VARCHAR(20),
    FOREIGN KEY (CodDepar) REFERENCES TB_Departament(CodDepar)
);

CREATE TABLE TB_Cita (
    CodCita INT PRIMARY KEY,
    CodPac INT,
    CodEmp INT,
    CodHab INT,
    FecHorCita DATE,
    FecEspSalida DATE,
    FecSalida DATE,
    FOREIGN KEY (CodPac) REFERENCES TB_Paciente(CodPac),
    FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp),
    FOREIGN KEY (CodHab) REFERENCES TB_Habitaciones(CodHab)
);

CREATE TABLE TB_Habitaciones (
    CodHab INT PRIMARY KEY,
    CodDepar INT,
    Bloque VARCHAR(50),
    Descripcion VARCHAR(200),
    CodTelf VARCHAR(20),
    FOREIGN KEY (CodDepar) REFERENCES TB_Departamentos(CodDepart)
);

CREATE TABLE TB_Departamentos (
	CodDepar INT,
    CodProd INT,
    Cantidad INT,
    PRIMARY KEY (CodDepar, CodProd),
    FOREIGN KEY (CodDepar) REFERENCES TB_Departament(CodDepar),
    FOREIGN KEY (CodProd) REFERENCES TB_Producto(CodProd)
);

CREATE TABLE TB_Camas (
    CodCamas INT PRIMARY KEY,
    CodHab INT,
    FOREIGN KEY (CodHab) REFERENCES TB_Habitaciones(CodHab)
);

CREATE TABLE TB_Producto (
    CodProd INT PRIMARY KEY,
    Nombre VARCHAR(100),
    Descripcion VARCHAR(200),
    CodTipo INT,
    CodProve INT,
    FOREIGN KEY (CodTipo) REFERENCES TB_TipoProducto(CodTipo),
    FOREIGN KEY (CodProve) REFERENCES TB_Proveedores(CodProve)
);

CREATE TABLE TB_Proveedores (
    CodProve INT PRIMARY KEY,
    Nombre VARCHAR(100),
    Descripcion VARCHAR(200),
    CodTelf VARCHAR(20)
);

CREATE TABLE TB_TipoProducto (
    CodTipo INT PRIMARY KEY,
    Tipo VARCHAR(50)
);

CREATE TABLE TB_Producto_Almacen (
    CodProd INT,
    CodNivel INT,
    Cantidad INT,
    CostoUnitario DECIMAL(10,2),
    PRIMARY KEY (CodProd, CodNivel),
    FOREIGN KEY (CodProd) REFERENCES TB_Producto(CodProd),
    FOREIGN KEY (CodNivel) REFERENCES TB_Almacen_Nivel(CodNivel)
);

CREATE TABLE TB_Almacen_Nivel (
    CodNivel INT PRIMARY KEY,
    Nivel VARCHAR(50)
);

CREATE TABLE TB_Pedido (
    CodPedido INT PRIMARY KEY,
    CodEmp INT,
    CodDepar INT,
    CodProd INT,
    Cantidad INT,
    Fecha DATE,
    FOREIGN KEY (CodEmp) REFERENCES TB_Empleados(CodEmp),
    FOREIGN KEY (CodDepar) REFERENCES TB_Departamentos(CodDepart),
    FOREIGN KEY (CodProd) REFERENCES TB_Producto(CodProd)
);

CREATE TABLE TB_Horario (
    Turno INT PRIMARY KEY,
    HEntrada TIME,
    HSalida TIME
);

CREATE TABLE TB_Medicacion (
    CodMed INT PRIMARY KEY,
    CodPac INT,
    CodCamas INT,
    CodProd INT,
    UnidadesDiarias INT,
    FecInic DATE,
    FecFin DATE,
    FOREIGN KEY (CodPac) REFERENCES TB_Paciente(CodPac),
    FOREIGN KEY (CodCamas) REFERENCES TB_Camas(CodCamas),
    FOREIGN KEY (CodProd) REFERENCES TB_Producto(CodProd)
);

CREATE TABLE TB_Paciente_MedicoExterno (
    CodMed INT,
    CodPac INT,
    PRIMARY KEY (CodMed, CodPac),
    FOREIGN KEY (CodMed) REFERENCES TB_MedicoExterno(CodMed),
    FOREIGN KEY (CodPac) REFERENCES TB_Paciente(CodPac)
);

CREATE TABLE TB_Departament (
	CodDepar INT PRIMARY KEY,
    NomDepar VARCHAR (200),
    Ubicacion VARCHAR (200),
    CodTelf INT
);

CREATE TABLE TB_Medicamen (
	CodMedica INT PRIMARY KEY,
    CodProd INT,
    Especialidad VARCHAR (200),
    Dosis VARCHAR (100),
    ModAminis VARCHAR (100),
    FOREIGN KEY (CodProd) REFERENCES TB_Producto(CodProd)
);

