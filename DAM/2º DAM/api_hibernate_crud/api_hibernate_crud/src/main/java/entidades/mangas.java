package entidades;

import javax.persistence.*;
import java.io.Serializable;
import java.math.BigInteger;
import java.time.LocalDate;
import java.util.Date;

@Entity
@Table(name = "mangas")
public class mangas {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;

    @Column(name = "title", nullable = false)
    private String title;

    @Column(name = "autor", nullable = false)
    private String autor;

    @Column(name = "genero", nullable = false)
    private String genero;

    @Column(name = "edicion", nullable = false)
    private String edicion;

    @Column(name = "url_imagen", nullable = false)
    private String urlImagen;

    @Column(name = "fecha_publicacion", nullable = false)
    private Date fechaPublicacion;

    @Column(name = "numero_capitulos", nullable = false)
    private int numeroCapitulos;

    public mangas() {
    }

    public mangas(int id, String title, String autor, String genero, String edicion, String urlImagen, Date fechaPublicacion, int numeroCapitulos) {
        this.id = id;
        this.title = title;
        this.autor = autor;
        this.genero = genero;
        this.edicion = edicion;
        this.urlImagen = urlImagen;
        this.fechaPublicacion = fechaPublicacion;
        this.numeroCapitulos = numeroCapitulos;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
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

    public String getUrlImagen() {
        return urlImagen;
    }

    public void setUrlImagen(String urlImagen) {
        this.urlImagen = urlImagen;
    }

    public Date getFechaPublicacion() {
        return fechaPublicacion;
    }

    public void setFechaPublicacion(Date fechaPublicacion) {
        this.fechaPublicacion = fechaPublicacion;
    }

    public int getNumeroCapitulos() {
        return numeroCapitulos;
    }

    public void setNumeroCapitulos(int numeroCapitulos) {
        this.numeroCapitulos = numeroCapitulos;
    }
}
