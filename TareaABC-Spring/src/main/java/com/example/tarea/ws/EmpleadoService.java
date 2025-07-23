package com.example.tarea.ws;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.example.tarea.entity.Empleado;
import com.example.tarea.repository.EmpleadoRepository;

@RestController
@RequestMapping("/Empleado")

public class EmpleadoService {

    @Autowired
    EmpleadoRepository empleadoRepository;

    @GetMapping(path="/buscar")
    public List<Empleado> buscar(){
        return empleadoRepository.findAll();
    }

    @PostMapping(path="/guardar")
    public Empleado guardar(@RequestBody Empleado empleado){
        return empleadoRepository.save(empleado);
    }

    @DeleteMapping(path="eliminar/{idempleado}")
    public void eliminar(@PathVariable int idempleado){
        Optional<Empleado> empleado = empleadoRepository.findById(idempleado);
        if(empleado.isPresent())
            empleadoRepository.delete(empleado.get());
    }

}
