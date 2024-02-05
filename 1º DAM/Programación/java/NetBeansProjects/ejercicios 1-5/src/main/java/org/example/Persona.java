package org.example;

import javax.persistence.Entity;
import javax.persistence.Id;
import java.time.LocalDate;
import java.util.Objects;

@Entity
public class Persona {
    @Id
    private String dni;
    private String nombre;

    private String PrimerApellido;
    private String SegundoApellido;
    private LocalDate Fnacimiento;

    // Constructor, getters y setters
    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getPrimerapellido() {
        return PrimerApellido;
    }

    public void setPrimerapellido(String primerApellido) {
        PrimerApellido = primerApellido;
    }

    public String getSegundoapellido() {
        return SegundoApellido;
    }

    public void setSegundoapellido(String segundoApellido) {
        SegundoApellido = segundoApellido;
    }

    public LocalDate getFnacimiento() {
        return Fnacimiento;
    }

    public void setFnacimiento(LocalDate fnacimiento) {
        Fnacimiento = fnacimiento;
    }
}
