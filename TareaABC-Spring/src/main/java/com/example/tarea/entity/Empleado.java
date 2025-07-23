package com.example.tarea.entity;

import java.io.Serializable;
import java.util.Date;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name="EMPLEADO")

public class Empleado implements Serializable{

    private static final long serialVersionUID = 4849403720266099034L;

    @Id
    @Column(name="IDEMPLEADO")
    private Integer idempleado;

    @Column(name="NOMBRE")
    private String nombre;

    @Column(name="APELLIDO")
    private String apellido;

    @Column(name="EDAD")
    private Integer edad;

    @Column(name="FECHA_INGRESO")
    private Date fechaIngreso;

    @Column(name="SUELDO")
    private Float sueldo;

    @Column(name="ACTIVO")
    private Boolean activo;

    public Integer getIdempleado() {
        return idempleado;
    }

    public void setIdempleado(Integer idempleado) {
        this.idempleado = idempleado;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido() {
        return apellido;
    }

    public void setApellido(String apellido) {
        this.apellido = apellido;
    }

    public Integer getEdad() {
        return edad;
    }

    public void setEdad(Integer edad) {
        this.edad = edad;
    }

    public Date getFechaIngreso() {
        return fechaIngreso;
    }

    public void setFechaIngreso(Date fechaIngreso) {
        this.fechaIngreso = fechaIngreso;
    }

    public Float getSueldo() {
        return sueldo;
    }

    public void setSueldo(Float sueldo) {
        this.sueldo = sueldo;
    }

    public Boolean getActivo() {
        return activo;
    }

    public void setActivo(Boolean activo) {
        this.activo = activo;
    }


}
