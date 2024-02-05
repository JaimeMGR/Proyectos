package servicios;

import com.google.gson.Gson;
import dao.mangasDAOInterface;
import dao.mangasDAOInterface;
import dto.mangasDTO;
import entidades.mangas;
import entidades.mangas;
import spark.Spark;

import java.util.List;
import java.util.Map;

public class mangasAPIREST {
    private mangasDAOInterface dao;
    private Gson gson = new Gson();

    public mangasAPIREST(mangasDAOInterface implementacion) {
        Spark.port(8080);
        dao = implementacion;
        //...

        // Endpoint para obtener todos los mangas
        Spark.get("/mangas", (request, response) -> {
            List<mangas> mangas = dao.devolverTodos();
            response.type("application/json");

            return this.gson.toJson(mangas);
        });


// Endpoint para obtener un mangas por su ID
        Spark.get("/mangas/id/:id", (request, response) -> {
            int id = Integer.parseInt(request.params(":id"));
            mangas mangas = dao.buscarPorId(id);
            response.type("application/json");
            if (mangas != null) {
                return gson.toJson(mangas);
            } else {
                response.status(404);
                return "Mueble no encontrado";
            }
        });


        //==========================================================================================================



        // Endpoint para obtener todas las imágenes de mangas
        Spark.get("/mangas/imagenes", (request, response) -> {
            List<String> imagenes = dao.devolverTodasImages();
            response.type("application/json");
            return gson.toJson(imagenes);
        });

        // Endpoint para obtener un resumen con solo el nombre el precio y la URL
        Spark.get("/mangas/resumenobjetos", (request, response) -> {
            List<Map<String, Object>> resumen = dao.devolverNombreImagenes();
            response.type("application/json");

            return this.gson.toJson(resumen);
        });


        // Endpoint para obtener el total de mangas
        Spark.get("/mangas/total", (request, response) -> {
            Long total = dao.totalmangas();
            response.type("application/json");
            return total.toString();
        });




        //=========================================================================================




        // Endpoint para buscar mangas por nombre (similar a LIKE)
        Spark.get("/mangas/buscar/:title", (request, response) -> {
            String title = request.params(":title");

            response.type("application/json");

            mangas manga = dao.buscarPorNombre(title);
            return gson.toJson(manga);
        });




        //CREAR UN mangas CON TODOS LOS DATOS
        Spark.post("/mangas", (request, response) -> {
            String body = request.body();
            mangas nuevomangas = gson.fromJson(body, mangas.class);

            mangas creado = dao.create(nuevomangas);
            response.type("application/json");
            return gson.toJson(creado);
        });

        // Endpoint para actualizar un mangas por su ID
        Spark.put("/mangas/:id", (request, response) -> {
            int id = Integer.parseInt(request.params(":id"));
            String body = request.body();
            mangas mangasActualizado = gson.fromJson(body, mangas.class);
            mangasActualizado.setId(id);
            mangas actualizado = dao.update(mangasActualizado);
            response.type("application/json");
            if (actualizado != null) {
                return gson.toJson(actualizado);
            } else {
                response.status(404);
                return "mangas no encontrado";
            }
        });

        // Endpoint para eliminar un mangas por su ID
        Spark.delete("/mangas/:id", (request, response) -> {
            int id = Integer.parseInt(request.params(":id"));
            boolean eliminado = dao.deleteById(id);
            response.type("application/json");
            if (eliminado) {
                return "mangas eliminado correctamente";
            } else {
                response.status(404);
                return "mangas no encontrado";
            }
        });

        //DEVOLVER DATOS DE MANERA PAGINADA DE TODOS LOS mangas
        Spark.get("/mangas/paginado/:pagina/:tam_pagina", (request, response) -> {
            Integer pagina = Integer.parseInt(request.params("pagina"));
            Integer tamaño_pagina = Integer.parseInt(request.params("tam_pagina"));

            List<mangas> mangas = dao.devolverTodos(pagina, tamaño_pagina);
            Long totalElementos = dao.totalmangas(); // Obtener el total de mangas

            RespuestaPaginacion<mangas> paginaResultado = new RespuestaPaginacion<>(mangas, totalElementos, pagina, tamaño_pagina);

            return gson.toJson(paginaResultado);
        });

        //En caso de intentar un endpoint incorrecto
        Spark.notFound((request, response) -> {
            response.type("application/json");
            return "{\"error\": \"Ruta no encontrada\",\"hint1\": \"/mangas\"," +
                    "\"hint2\": \"/mangas/paginado/:pagina/:tam_pagina\",\"hint3\": \"/mangas/id/:id\"}";
        });
    }
}
