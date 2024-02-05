package servicios;

import java.util.List;

public class RespuestaPaginacion<T> {
    private List<T> elementos;
    private long totalElementos;
    private int numeroPagina;
    private int tamanioPagina;

    public RespuestaPaginacion(List<T> elementos, long totalElementos, int numeroPagina, int tamanioPagina) {
        this.elementos = elementos;
        this.totalElementos = totalElementos;
        this.numeroPagina = numeroPagina;
        this.tamanioPagina = tamanioPagina;
    }

    // Constructor vacío para deserialización JSON
    public RespuestaPaginacion() {
    }

    public List<T> getElementos() {
        return elementos;
    }

    public void setElementos(List<T> elementos) {
        this.elementos = elementos;
    }

    public long getTotalElementos() {
        return totalElementos;
    }

    public void setTotalElementos(long totalElementos) {
        this.totalElementos = totalElementos;
    }

    public int getNumeroPagina() {
        return numeroPagina;
    }

    public void setNumeroPagina(int numeroPagina) {
        this.numeroPagina = numeroPagina;
    }

    public int getTamanioPagina() {
        return tamanioPagina;
    }

    public void setTamanioPagina(int tamanioPagina) {
        this.tamanioPagina = tamanioPagina;
    }
}
