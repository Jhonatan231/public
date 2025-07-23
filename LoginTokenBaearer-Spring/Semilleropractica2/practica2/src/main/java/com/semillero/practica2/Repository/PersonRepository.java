package com.semillero.practica2.Repository;

import com.semillero.practica2.Entity.Persona;
import org.springframework.data.jpa.repository.JpaRepository;

public interface PersonRepository extends JpaRepository<Persona, Long> {
    Persona findByUserName(String userName);
}


