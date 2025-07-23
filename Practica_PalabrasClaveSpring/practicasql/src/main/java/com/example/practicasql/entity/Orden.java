package com.example.practicasql.entity;

import java.io.Serializable;
import java.util.Date;

import com.fasterxml.jackson.annotation.JsonBackReference;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.Table;
import lombok.Data;

@Data
@Entity
@Table(name = "ORDEN")
public class Orden implements Serializable {

    private static final long serialVersionUID = 8422133970670571006L;

    @Id
    @Column(name = "IDORDEN")
    private Integer idorden;

    @Column(name = "FECHA")
    private Date fecha;

    @Column(name = "MONTO")
    private Float monto;

    @ManyToOne
    @JoinColumn(name = "IDCLIENTE")
    @JsonBackReference
    private Cliente cliente;
}
