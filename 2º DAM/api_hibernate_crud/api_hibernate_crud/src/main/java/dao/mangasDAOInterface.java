package dao;

import entidades.mangas;

import java.util.List;
import java.util.Map;

public interface mangasDAOInterface {

    List<mangas> devolverTodos();

    List<mangas> devolverTodos(int pagina, int tamaño);

    List<mangas> devolverMasCaros();

    List<String> devolverTodasImages();

    List<String> devolverimagenytitulo();

    List<Map<String, Object>> devolverNombreImagenes();

    Long totalmangas();

    mangas buscarPorAutor(String autor);

    mangas buscarPorGenero(String genero);

    mangas buscarPorEdicion(String edicion);

    mangas buscarPorId(int id);

    Double mediaPrecios();

    Double mediaPreciosMarca(String marca);

    mangas buscarPorNombre(String title);

    List<mangas> buscarEntrePrecios(Double min, Double max);

    List<mangas> buscarEntrePreciosMarca(Double min, Double max, String marca);

    List<mangas> buscarEntrePreciosMarcas(Double min, Double max, List<String> marcas);

    mangas create(mangas manga);

    mangas update(mangas manga);

    boolean deleteById(int id);

    boolean deleteAll();


}
