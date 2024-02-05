package org.example;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import java.time.LocalDate;

public class Main {
    public static void main(String[] args) {

        EntityManagerFactory emf;
        emf = Persistence.createEntityManagerFactory("$objectdb/db/agenda.odb");
        EntityManager em;
        em = emf.createEntityManager();
/**
 em.getTransaction().begin();
 Persona p = new Persona();
 p.setFnacimiento (LocalDate.parse("2003-05-19"));
 p.setNombre("Luis");
 p.setDni("222F");
 p.setPrimerapellido("Jiménez");
 p.setSegundoapellido("Ruiz");
 Persona p2 = new Persona();
 p2.setFnacimiento (LocalDate.parse("2002-12-13"));
 p2.setNombre("Jaime");
 p2.setDni("845684B");
 p2.setPrimerapellido("Molina");
 p2.setSegundoapellido("Granados");
 Trabajador t = new Trabajador();
 t.setFnacimiento (LocalDate.parse("1988-02-20"));
 t.setNombre("Enrique");
 t.setDni("859Y");
 t.setFcontrato(LocalDate.parse("2020-04-15"));
 t.setPrimerapellido("Fernández");
 t.setSegundoapellido("Caballero");
 t.setPuesto("Programador");
 Trabajador t2 = new Trabajador();
 t2.setFnacimiento (LocalDate.parse("1997-10-03"));
 t2.setNombre("Jorge");
 t2.setDni("75487O");
 t2.setFcontrato(LocalDate.parse("2022-06-07"));
 t2.setPrimerapellido("Rojas");
 t2.setSegundoapellido("Palma");
 t2.setPuesto("Limpiador");
 Vehiculo v = new Vehiculo();
 v.setMatricula("636GR");
 v.setConductor(p);
 v.setFechadematriculacion (LocalDate.parse("2005-09-07"));
 Vehiculo v2 = new Vehiculo();
 v2.setMatricula("1748BRJ");
 v2.setConductor(p2);
 v.setFechadematriculacion (LocalDate.parse("2004-12-15"));
 Coche c = new Coche();
 c.setMatricula("12345X");
 c.setConductor(p);
 c.setCombustibles("DIÉSEL");
 c.setFechadematriculacion (LocalDate.parse("2000-10-30"));
 Coche c2 = new Coche();
 c2.setMatricula("455115e");
 c2.setConductor(p2);
 c2.setCombustibles("GASOLINA");
 c2.setFechadematriculacion (LocalDate.parse("1978-05-02"));
 em.persist(v);
 em.persist(c);
 em.persist(p);
 em.persist(t);
 em.persist(v2);
 em.persist(c2);
 em.persist(p2);
 em.persist(t2);
 em.getTransaction().commit();
 */
        CRUD.menu(em);
        em.close();
        emf.close();
    }
}