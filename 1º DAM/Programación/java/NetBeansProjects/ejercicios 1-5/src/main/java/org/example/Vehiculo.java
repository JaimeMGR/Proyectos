package org.example;

import javax.persistence.*;
import java.time.LocalDate;
import java.util.Objects;

@Entity
@Table(name = "vehiculo")
public class Vehiculo {
    @Id
    @Column(name = "id", nullable = false)

    private  String matricula;
    @Embedded
    private Persona conductor;

    private LocalDate fechadematriculacion;
    public String getMatricula() {
        return matricula;
    }

    public LocalDate getFechadematriculacion() {
        return fechadematriculacion;
    }

    public void setFechadematriculacion(LocalDate fechadematriculacion) {
        this.fechadematriculacion = fechadematriculacion;
    }

    public void setMatricula(String matricula) {
        this.matricula = matricula;
    }

    public Persona getConductor() {
        return conductor;
    }

    public void setConductor(Persona conductor) {
        this.conductor = conductor;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Vehiculo vehiculo = (Vehiculo) o;
        return Objects.equals(matricula, vehiculo.matricula) && Objects.equals(conductor, vehiculo.conductor) && Objects.equals(fechadematriculacion, vehiculo.fechadematriculacion);
    }

    @Override
    public int hashCode() {
        return Objects.hash(matricula, conductor, fechadematriculacion);
    }
}
