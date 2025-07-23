package com.example.practicasql.ws;

import com.example.practicasql.entity.Cliente;
import com.example.practicasql.repository.ClienteRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.*;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ClienteService {

    @Autowired
    private ClienteRepository clienteRepository;

    public Page<Cliente> buscarPorNombreConPaginacionNative(String texto, int page, int size) {
        int offset = page * size;

        List<Cliente> clientes = clienteRepository.findByNombreContainingIgnoreCaseNative(texto, offset, size);
        long total = clienteRepository.countByNombreContainingIgnoreCaseNative(texto);

        Pageable pageable = PageRequest.of(page, size);
        return new PageImpl<>(clientes, pageable, total);
    }
}
