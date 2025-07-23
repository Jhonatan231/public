package com.semillero.practica2.Config;

import com.semillero.practica2.Entity.Persona;

public interface JwtGeneratorInterface {
    String generateToken(Persona persona);
}
