package com.example.tarea.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.example.tarea.entity.Empleado;

@Repository("empleadoRepository")

public interface EmpleadoRepository extends JpaRepository<Empleado, Integer> {

}
