package com.example.practicasql.repository;

import java.util.Date;
import java.util.List;

import org.springframework.data.domain.Pageable;
import org.springframework.data.domain.Page;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;


import com.example.practicasql.entity.Cliente;

public interface ClienteRepository extends JpaRepository<Cliente, Integer> {

    // Y
    List<Cliente> findByApellidoAndNombre(String apellido, String nombre);

    // O
    List<Cliente> findByApellidoOrNombre(String apellido, String nombre);

    // Es igual a
    Cliente findByNombreEquals(String nombre);

    // Entre
    List<Cliente> findByFechaRegistroBetween(Date desde, Date hasta);

    // Menor que
    List<Cliente> findByTotalComprasLessThan(Float totalCompras);

    // Menor o igual que
    List<Cliente> findByTotalComprasLessThanEqual(Float totalCompras);

    // Mayor que
    List<Cliente> findByTotalComprasGreaterThan(Float totalCompras);

    // Mayor o igual que
    List<Cliente> findByTotalComprasGreaterThanEqual(Float totalCompras);

    // Después de fecha
    List<Cliente> findByFechaRegistroAfter(Date fecha);

    // Antes de fecha
    List<Cliente> findByFechaRegistroBefore(Date fecha);

    // Es nulo
    List<Cliente> findByNitIsNull();

    // IsNotNull,NotNull
    List<Cliente> findByNitNotNull();

    // Igual(texto)
    List<Cliente> findByNombreLike(String nombre);

    // Diferente a
    List<Cliente> findByNombreNotLike(String nombre);

    // Empezando con
    List<Cliente> findByNombreStartingWith(String prefijo);

    // Terminado con
    List<Cliente> findByNombreEndingWith(String sufijo);

    // Contiene
    List<Cliente> findByNombreContaining(String texto);

    // OrderBy
    List<Cliente> findByNombreOrderByIdclienteDesc(String nombre);

    // No
    List<Cliente> findByApellidoNot(String apellido);

    // En
    List<Cliente> findByIdclienteIn(List<Integer> ids);

    // No en
    List<Cliente> findByIdclienteNotIn(List<Integer> ids);

    // Cierto
    List<Cliente> findByActivoTrue();

    // Falso
    List<Cliente> findByActivoFalse();

    // Ignorar caso
    List<Cliente> findByNombreIgnoreCase(String nombre);

    //containing con UPPER
    @Query("SELECT c FROM Cliente c WHERE UPPER(c.nombre) LIKE CONCAT('%', UPPER(:texto), '%')")
    List<Cliente> findByNombreContainingwithUpper(@Param("texto") String texto);

    //peageble
    @Query("SELECT c FROM Cliente c WHERE UPPER(c.nombre) LIKE CONCAT('%', UPPER(:texto), '%')")
    Page<Cliente> findByNombreContainingIgnoreCase(@Param("texto") String texto, Pageable pageable);

    // Contar clientes
    long countByNombreContainingIgnoreCase(String texto);

    //querynativo
    @Query(
    value = "SELECT * FROM CLIENTE c WHERE UPPER(c.NOMBRE) LIKE '%' || UPPER(:texto) || '%' ORDER BY c.NOMBRE ASC OFFSET :offset ROWS FETCH NEXT :limit ROWS ONLY",
    countQuery = "SELECT COUNT(*) FROM CLIENTE c WHERE UPPER(c.NOMBRE) LIKE '%' || UPPER(:texto) || '%'",
    nativeQuery = true
    )
    List<Cliente> findByNombreContainingIgnoreCaseNative(
    @Param("texto") String texto,
    @Param("offset") int offset,
    @Param("limit") int limit);

    @Query(
    value = "SELECT COUNT(*) FROM CLIENTE c WHERE UPPER(c.NOMBRE) LIKE '%' || UPPER(:texto) || '%'",
    nativeQuery = true
    )
    long countByNombreContainingIgnoreCaseNative(@Param("texto") String texto);


}
