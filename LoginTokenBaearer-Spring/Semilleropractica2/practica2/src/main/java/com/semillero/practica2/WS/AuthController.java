package com.semillero.practica2.WS;

import com.semillero.practica2.Entity.Persona;
import com.semillero.practica2.Repository.PersonRepository;
import com.semillero.practica2.Utilidad.Util;
import lombok.Data;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/noauth")
public class AuthController {

    @Autowired
    private PersonRepository personRepository;

    @Autowired
    private Util util;

    @PostMapping("/login")
    public ResponseEntity<?> login(@RequestBody LoginRequest request) {
        Persona user = personRepository.findByUserName(request.getUserName());
        if (user != null && user.getPassword().equals(request.getPassword())) {
            String token = util.generateToken(user.getUserName());
            return ResponseEntity.ok(new TokenResponse(token));
        }
        return ResponseEntity.status(401).body("Usuario o password inválido");
    }

    @Data
    static class LoginRequest {
        private String userName;
        private String password;
    }

    @Data
    static class TokenResponse {
        private final String token;
    }
}
