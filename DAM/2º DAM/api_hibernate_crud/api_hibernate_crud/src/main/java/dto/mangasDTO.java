package dto;


import java.util.Date;

public class mangasDTO {
    private String nombre,autor,genero,edicion,url_imagen,fecha_publicacion,numero_capitulos;


    public mangasDTO(){}

    public mangasDTO(String nombre, String autor, String genero, String edicion, String url_imagen, Date fecha_publicacion, int numero_capitulos) {
        this.nombre = nombre;
        this.autor = autor;
        this.genero = genero;
        this.edicion = edicion;
        this.url_imagen = url_imagen;
        this.fecha_publicacion = String.valueOf(fecha_publicacion);
        this.numero_capitulos = String.valueOf(numero_capitulos);
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getAutor() {
        return autor;
    }

    public void setAutor(String autor) {
        this.autor = autor;
    }

    public String getGenero() {
        return genero;
    }

    public void setGenero(String genero) {
        this.genero = genero;
    }

    public String getEdicion() {
        return edicion;
    }

    public void setEdicion(String edicion) {
        this.edicion = edicion;
    }

    public String getUrl_imagen() {
        return url_imagen;
    }

    public void setUrl_imagen(String url_imagen) {
        this.url_imagen = url_imagen;
    }

    public String getFecha_publicacion() {
        return fecha_publicacion;
    }

    public void setFecha_publicacion(String fecha_publicacion) {
        this.fecha_publicacion = fecha_publicacion;
    }

    public String getNumero_capitulos() {
        return numero_capitulos;
    }

    public void setNumero_capitulos(String numero_capitulos) {
        this.numero_capitulos = numero_capitulos;
    }

    @Override
    public String toString() {
        return "mangasDTO{" +
                "nombre='" + nombre + '\'' +
                ", autor='" + autor + '\'' +
                ", genero='" + genero + '\'' +
                ", edicion='" + edicion + '\'' +
                ", url_imagen='" + url_imagen + '\'' +
                ", fecha_publicacion='" + fecha_publicacion + '\'' +
                ", numero_capitulos='" + numero_capitulos + '\'' +
                '}';
    }
}
