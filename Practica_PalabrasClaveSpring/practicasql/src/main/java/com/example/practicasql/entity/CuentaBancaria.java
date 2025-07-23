package com.example.practicasql.entity;

import java.io.Serializable;

import com.fasterxml.jackson.annotation.JsonBackReference;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.MapsId;
import jakarta.persistence.OneToOne;
import jakarta.persistence.Table;
import lombok.Data;

@Data
@Entity
@Table(name = "CUENTA_BANCARIA")
public class CuentaBancaria implements Serializable {

    private static final long serialVersionUID = 8943511945945335719L;    

    @Id
    @Column(name = "IDEMPLEADO")
    private Integer idempleado;

    @Column(name = "BANCO")
    private String banco;

    @Column(name = "NUMERO_CUENTA")
    private String numeroCuenta;

    @OneToOne
    @MapsId
    @JsonBackReference
    @JoinColumn(name = "IDEMPLEADO")
    private Empleado empleado;
}
