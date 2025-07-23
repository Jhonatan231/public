package com.example.practicasql.ws;

import com.example.practicasql.entity.Cliente;
import com.example.practicasql.repository.ClienteRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Page;
import org.springframework.data.domain.Pageable;
import org.springframework.data.domain.PageRequest;
import org.springframework.data.domain.Sort;
import org.springframework.format.annotation.DateTimeFormat;
import org.springframework.web.bind.annotation.*;

import java.util.Date;
import java.util.List;

@RestController
@RequestMapping("/clientes")
public class ClienteServicio {

    @Autowired
    private ClienteRepository clienteRepository;

    @GetMapping("/nombre/contiene/{texto}")
    public List<Cliente> buscarPorNombreContiene(@PathVariable String texto) {
        return clienteRepository.findByNombreContaining(texto);
    }

    @GetMapping("/apellido/{apellido}/nombre/{nombre}")
    public List<Cliente> buscarPorApellidoYNombre(@PathVariable String apellido, @PathVariable String nombre) {
        return clienteRepository.findByApellidoAndNombre(apellido, nombre);
    }

    @GetMapping("/apellido/o-nombre/{apellido}/{nombre}")
    public List<Cliente> buscarPorApellidoONombre(@PathVariable String apellido, @PathVariable String nombre) {
        return clienteRepository.findByApellidoOrNombre(apellido, nombre);
    }

    @GetMapping("/nombre/exacto/{nombre}")
    public Cliente buscarPorNombreExacto(@PathVariable String nombre) {
        return clienteRepository.findByNombreEquals(nombre);
    }

    @GetMapping("/fecha/entre/{desde}/{hasta}")
    public List<Cliente> buscarPorFechaEntre(
        @PathVariable @DateTimeFormat(iso = DateTimeFormat.ISO.DATE) Date desde,
        @PathVariable @DateTimeFormat(iso = DateTimeFormat.ISO.DATE) Date hasta) {
        return clienteRepository.findByFechaRegistroBetween(desde, hasta);
    }

    @GetMapping("/fecha/antes/{fecha}")
    public List<Cliente> buscarPorFechaAntes(@PathVariable @DateTimeFormat(iso = DateTimeFormat.ISO.DATE) Date fecha) {
        return clienteRepository.findByFechaRegistroBefore(fecha);
    }

    @GetMapping("/fecha/despues/{fecha}")
    public List<Cliente> buscarPorFechaDespues(@PathVariable @DateTimeFormat(iso = DateTimeFormat.ISO.DATE) Date fecha) {
        return clienteRepository.findByFechaRegistroAfter(fecha);
    }

    @GetMapping("/compras/menor/{monto}")
    public List<Cliente> buscarPorComprasMenor(@PathVariable Float monto) {
        return clienteRepository.findByTotalComprasLessThan(monto);
    }

    @GetMapping("/compras/menor-igual/{monto}")
    public List<Cliente> buscarPorComprasMenorIgual(@PathVariable Float monto) {
        return clienteRepository.findByTotalComprasLessThanEqual(monto);
    }

    @GetMapping("/compras/mayor/{monto}")
    public List<Cliente> buscarPorComprasMayor(@PathVariable Float monto) {
        return clienteRepository.findByTotalComprasGreaterThan(monto);
    }

    @GetMapping("/compras/mayor-igual/{monto}")
    public List<Cliente> buscarPorComprasMayorIgual(@PathVariable Float monto) {
        return clienteRepository.findByTotalComprasGreaterThanEqual(monto);
    }

    @GetMapping("/nit/nulo")
    public List<Cliente> buscarNitNulo() {
        return clienteRepository.findByNitIsNull();
    }

    @GetMapping("/nit/no-nulo")
    public List<Cliente> buscarNitNoNulo() {
        return clienteRepository.findByNitNotNull();
    }

    @GetMapping("/nombre/like/{nombre}")
    public List<Cliente> buscarPorNombreLike(@PathVariable String nombre) {
        return clienteRepository.findByNombreLike(nombre);
    }

    @GetMapping("/nombre/no-like/{nombre}")
    public List<Cliente> buscarPorNombreNoLike(@PathVariable String nombre) {
        return clienteRepository.findByNombreNotLike(nombre);
    }

    @GetMapping("/nombre/empezando/{prefijo}")
    public List<Cliente> buscarPorNombreEmpezando(@PathVariable String prefijo) {
        return clienteRepository.findByNombreStartingWith(prefijo);
    }

    @GetMapping("/nombre/terminando/{sufijo}")
    public List<Cliente> buscarPorNombreTerminando(@PathVariable String sufijo) {
        return clienteRepository.findByNombreEndingWith(sufijo);
    }

    @GetMapping("/nombre/ignorar-caso/{nombre}")
    public List<Cliente> buscarPorNombreIgnoreCase(@PathVariable String nombre) {
        return clienteRepository.findByNombreIgnoreCase(nombre);
    }

    @GetMapping("/apellido/no-es/{apellido}")
    public List<Cliente> buscarPorApellidoDiferente(@PathVariable String apellido) {
        return clienteRepository.findByApellidoNot(apellido);
    }

    @GetMapping("/id/en/{ids}")
    public List<Cliente> buscarPorIdEn(@PathVariable List<Integer> ids) {
        return clienteRepository.findByIdclienteIn(ids);
    }

    @GetMapping("/id/no-en/{ids}")
    public List<Cliente> buscarPorIdNoEn(@PathVariable List<Integer> ids) {
        return clienteRepository.findByIdclienteNotIn(ids);
    }

    @GetMapping("/nombre/orden-desc/{nombre}")
    public List<Cliente> buscarPorNombreOrdenDesc(@PathVariable String nombre) {
        return clienteRepository.findByNombreOrderByIdclienteDesc(nombre);
    }

    @GetMapping("/activos")
    public List<Cliente> buscarActivos() {
        return clienteRepository.findByActivoTrue();
    }

    @GetMapping("/inactivos")
    public List<Cliente> buscarInactivos() {
        return clienteRepository.findByActivoFalse();
    }

    @GetMapping("/nombre/contiene/upper/{texto}")
    public List<Cliente> buscarPorNombreContieneconUpper(@PathVariable String texto) {
        return clienteRepository.findByNombreContainingwithUpper(texto);
    }

    @GetMapping("/nombre/contiene/page/{texto}")
    public Page<Cliente> buscarPorNombreConPaginado(
        @PathVariable String texto,
        @RequestParam(defaultValue = "0") int page,
        @RequestParam(defaultValue = "2") int size,
        @RequestParam(defaultValue = "nombre") String sortBy,
        @RequestParam(defaultValue = "asc") String sortDir) {

        Sort sort = sortDir.equalsIgnoreCase("asc") ?
            Sort.by(sortBy).ascending() :
            Sort.by(sortBy).descending();

        Pageable pageable = PageRequest.of(page, size, sort);

        return clienteRepository.findByNombreContainingIgnoreCase(texto, pageable);
    }

    @GetMapping("/nombre/contiene/count/{texto}")
        public long contarClientesPorNombreContiene(@PathVariable String texto) {
    return clienteRepository.countByNombreContainingIgnoreCase(texto);
    }

    @PostMapping("/crear")
    public Cliente crearCliente(@RequestBody Cliente cliente) {
    return clienteRepository.save(cliente);
    }

    //111111111
   

    @Autowired
    private ClienteService clienteService;

    @GetMapping("/nombre/contiene/native/{texto}")
    public Page<Cliente> buscarPorNombreContieneNative(
        @PathVariable String texto,
        @RequestParam(defaultValue = "0") int page,
        @RequestParam(defaultValue = "2") int size) {

        return clienteService.buscarPorNombreConPaginacionNative(texto, page, size);
    }


}
