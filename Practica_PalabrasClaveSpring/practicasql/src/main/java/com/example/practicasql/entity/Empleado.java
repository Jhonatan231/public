package com.example.practicasql.entity;

import java.io.Serializable;
import java.sql.Date;

import com.fasterxml.jackson.annotation.JsonManagedReference;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.OneToOne;
import jakarta.persistence.Table;
import lombok.Data;

@Data
@Entity
@Table(name = "EMPLEADO")
public class Empleado implements Serializable {

    private static final long serialVersionUID = 9223372036854775807L;

    @Id
    @Column(name = "IDEMPLEADO")
    private Integer idempleado;

    @Column(name = "NOMBRE")
    private String nombre;

    @Column(name = "APELLIDO")
    private String apellido;

    @Column(name = "EDAD")
    private Integer edad;

    @Column(name = "FECHA_INGRESO")
    private Date fechaIngreso;

    @Column(name = "SUELDO")
    private Integer sueldo;

    @Column(name = "ACTIVO")
    private boolean activo;

    @OneToOne(mappedBy = "empleado")
    @JsonManagedReference
    private CuentaBancaria cuentaBancaria;


 
}
