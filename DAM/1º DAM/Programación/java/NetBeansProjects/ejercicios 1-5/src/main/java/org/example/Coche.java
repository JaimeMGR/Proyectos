package org.example;

import javax.persistence.*;
import java.util.Date;
import java.util.Objects;

@Entity
public class Coche extends Vehiculo{

    private enum combustibles
    {
        GASOLINA, DIÉSEL, ELÉCTRICO, HÍBRIDO
    }

    public  String combustibles;

    public String getCombustibles() {
        return combustibles;
    }

    public void setCombustibles(String combustibles) {
        this.combustibles = combustibles;
    }


}
