package org.example;

import javax.persistence.Entity;
import javax.persistence.Id;
import java.time.LocalDate;
import java.util.Objects;

@Entity
public class Trabajador extends Persona{
    private LocalDate fcontrato;
    private String puesto;

    public Trabajador() {

    }

    public LocalDate getFcontrato() {
        return fcontrato;
    }

    public void setFcontrato(LocalDate fcontrato) {
        this.fcontrato = fcontrato;
    }

    public String getPuesto() {
        return puesto;
    }

    public void setPuesto(String puesto) {
        this.puesto = puesto;
    }



}
