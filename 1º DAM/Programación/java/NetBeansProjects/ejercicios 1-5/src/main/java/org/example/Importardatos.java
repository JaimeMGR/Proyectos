package org.example;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.util.Date;

class Importardatos {
    public static void main(String[] args) {
        String archivo = "C:\\Users\\damci\\IdeaProjects\\ejercicios 1-5\\src\\main\\resources\\datos_trabajadores.txt";
        EntityManagerFactory emf = Persistence.createEntityManagerFactory("$objectdb/db/agenda.odb");
        EntityManager em = emf.createEntityManager();

        try {
            em.getTransaction().begin();
            BufferedReader lector = new BufferedReader(new FileReader("C:\\Users\\damci\\IdeaProjects\\ejercicios 1-5\\src\\main\\resources\\datos_trabajadores.txt"));
            String linea;
            while ((linea = lector.readLine()) != null) {
                String[] valores = linea.split("#");
                Trabajador conductor = new Trabajador();
                conductor.setDni(valores[0]);
                conductor.setPrimerapellido(valores[1]);
                conductor.setSegundoapellido(valores[2]);
                conductor.setNombre(valores[3]);
                conductor.setFnacimiento (LocalDate.parse(valores[4]));// Convierte la cadena de fecha en Date
                conductor.setFcontrato(LocalDate.parse(valores[5]));
                conductor.setPuesto(valores[6]);

                em.persist(conductor);
            }

            em.getTransaction().commit();
            lector.close();

            System.out.println("Importación completada.");

        } catch (IOException e) {
            e.printStackTrace();
        } finally {
            em.close();
            emf.close();
        }
    }
}