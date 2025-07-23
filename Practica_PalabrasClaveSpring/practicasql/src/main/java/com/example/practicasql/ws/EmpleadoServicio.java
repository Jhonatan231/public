package com.example.practicasql.ws;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import com.example.practicasql.entity.Empleado;
import com.example.practicasql.entity.CuentaBancaria;
import com.example.practicasql.repository.EmpleadoRepository;
import com.example.practicasql.repository.CuentaBancariaRepository;

@RestController
@RequestMapping("/empleado")
public class EmpleadoServicio {

    @Autowired
    private EmpleadoRepository empleadoRepository;

    @Autowired
    private CuentaBancariaRepository cuentaBancariaRepository;

    @GetMapping("")
    public List<Empleado> obtenerTodos() {
        return empleadoRepository.findAll();
    }

    @GetMapping("/{id}")
    public ResponseEntity<Empleado> obtenerPorId(@PathVariable Integer idempleado) {
        return empleadoRepository.findById(idempleado)
            .map(ResponseEntity::ok)
            .orElse(ResponseEntity.notFound().build());
    }

    @PostMapping("/guardar")
    public Empleado guardar(@RequestBody Empleado empleado) {
        return empleadoRepository.save(empleado);
    }

    @GetMapping("/cuenta/{id}")
    public ResponseEntity<CuentaBancaria> obtenerCuentaPorEmpleado(@PathVariable Integer id) {
        return cuentaBancariaRepository.findById(id)
            .map(ResponseEntity::ok)
            .orElse(ResponseEntity.notFound().build());
    }

    @GetMapping("/con-cuenta/{id}")
    public ResponseEntity<CuentaBancaria> obtenerCuentaPorEmpleadoRel(@PathVariable Integer id) {
        Optional<Empleado> empleado = empleadoRepository.findById(id);
        return empleado.map(e -> ResponseEntity.ok(e.getCuentaBancaria()))
                       .orElse(ResponseEntity.notFound().build());
    }
}
