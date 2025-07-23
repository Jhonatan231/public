package com.example.practicasql.entity;

import java.io.Serializable;
import java.util.Date;
import java.util.List;

import com.fasterxml.jackson.annotation.JsonManagedReference;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;
import jakarta.persistence.SequenceGenerator;
import jakarta.persistence.Table;
import lombok.Data;

@Data
@Entity
@Table(name = "CLIENTE")
public class Cliente implements Serializable {

    private static final long serialVersionUID = 9223372036854775807L;



    @Id
    @GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "clienteSeqGen")
    @SequenceGenerator(name = "clienteSeqGen", sequenceName = "CLIENTE_SEQ", allocationSize = 1)
    @Column(name = "IDCLIENTE")
    private Integer idcliente;

    @Column(name = "NOMBRE")
    private String nombre;

    @Column(name = "APELLIDO")
    private String apellido;

    @Column(name = "NIT")
    private Integer nit;

    @Column(name = "FECHA_REGISTRO")
    private Date fechaRegistro;

    @Column(name = "TOTAL_COMPRAS")
    private Float totalCompras;

    @Column(name = "ACTIVO")
    private Boolean activo;

    @OneToMany(mappedBy = "cliente")
    @JsonManagedReference
    private List<Orden> ordenes;
}
