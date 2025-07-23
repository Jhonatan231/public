package com.example.practicasql.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.example.practicasql.entity.CuentaBancaria;

@Repository("cuentaRepository")
public interface CuentaRepository extends JpaRepository<CuentaBancaria, Integer> {
    List<CuentaBancaria> findByNumeroCuenta(String numeroCuenta);
}