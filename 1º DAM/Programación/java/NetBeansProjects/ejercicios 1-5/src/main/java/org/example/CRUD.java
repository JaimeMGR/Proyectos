package org.example;

import javax.persistence.*;
import javax.persistence.criteria.CriteriaBuilder;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Predicate;
import javax.persistence.criteria.Root;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.util.Calendar;
import java.util.Date;
import java.util.List;
import java.util.Scanner;

public class CRUD {

    public static void menu(EntityManager em) {
        Scanner sc = new Scanner(System.in);
        System.out.println("------------------------------------------------------");
        System.out.println("¿Que quiere hacer?");
        System.out.println("1. Dar de alta a nuevo vehículo");
        System.out.println("2. Dar de alta a nueva persona");
        System.out.println("3. Dar de alta a nuevo trabajador");
        System.out.println("4. Consultar datos de vehículos");
        System.out.println("5. Modificar datos de vehículo");
        System.out.println("6. Eliminar datos de vehículos");
        System.out.println("7. Eliminar datos de coches");
        System.out.println("8. Filtrar");
        System.out.println("Pulsa cualquier otra letra para salir");
        System.out.println("------------------------------------------------------");
        switch (sc.nextLine()) {
            case "1":
                em.getTransaction().begin();
                Vehiculo v3 = new Vehiculo();
                System.out.println("introduzca matrícula");
                v3.setMatricula(sc.nextLine());
                Query query = em.createQuery("SELECT COUNT(v) FROM Vehiculo v WHERE v.matricula = :matricula");
                query.setParameter("matricula", v3.getMatricula());
                Long count = (Long) query.getSingleResult();
                if (count > 0) {
                    // La matrícula ya existe en la base de datos, mostrar mensaje de error
                    System.out.println("La matrícula ya existe en la base de datos");
                } else {
                    System.out.println("introduzca fecha de matriculación");
                    v3.setFechadematriculacion(LocalDate.parse(sc.nextLine()));

                    em.persist(v3);
                    em.getTransaction().commit();
                    System.out.println("Persona registrado correctamente");
                    System.out.println("------------------------------------------------------");
                    System.out.println("Fin del programa");
                }
                break;
            case "2":
                em.getTransaction().begin();
                Persona p3 = new Persona();
                System.out.println("introduzca nombre");
                p3.setNombre(sc.nextLine());
                System.out.println("introduzca dni");
                p3.setDni(sc.nextLine());
                Query querycomprobardni = em.createQuery("SELECT COUNT(p) FROM Persona p WHERE p.dni = :dni");
                querycomprobardni.setParameter("dni", p3.getDni());
                Long contador = (Long) querycomprobardni.getSingleResult();
                if (contador > 0) {
                    System.out.println("Esa persona ya existe en la base de datos");
                } else {
                    System.out.println("Introduzca fecha de nacimiento");
                    p3.setFnacimiento(LocalDate.parse(sc.nextLine()));
                    em.persist(p3);
                    em.getTransaction().commit();
                    System.out.println("Persona registrado correctamente");
                    System.out.println("------------------------------------------------------");
                    System.out.println("Fin del programa");
                }
                break;
            case "3":
                em.getTransaction().begin();
                Trabajador t3 = new Trabajador();
                System.out.println("introduzca nombre");
                t3.setNombre(sc.nextLine());
                System.out.println("introduzca dni");
                t3.setDni(sc.nextLine());
                Query querycomprobardni2 = em.createQuery("SELECT COUNT(p) FROM Persona p WHERE p.dni = :dni");
                querycomprobardni2.setParameter("dni", t3.getDni());
                Long contador2 = (Long) querycomprobardni2.getSingleResult();
                if (contador2 > 0) {
                    System.out.println("Esa persona ya existe en la base de datos");
                } else {
                    em.persist(t3);
                    em.getTransaction().commit();
                    System.out.println("Trabajador registrado correctamente");
                    System.out.println("------------------------------------------------------");
                    System.out.println("Fin del programa");
                }
                break;
            case "4":
                System.out.println("Introduzca la matrícula del vehículo");
                String matricula = sc.nextLine();
                TypedQuery<Vehiculo> queryconsultar = em.createQuery("SELECT v FROM Vehiculo v WHERE v.matricula = :matricula", Vehiculo.class);
                queryconsultar.setParameter("matricula", matricula);
                List<Vehiculo> results = queryconsultar.getResultList();
                if (!results.isEmpty()) {
                    Vehiculo v = results.get(0);
                    System.out.println("Datos del vehículo: "
                            + "Fecha de matriculación " + v.getFechadematriculacion() + ", matrícula del vehículo " + v.getMatricula() + ", conductor del vehículo " + v.getConductor());
                } else {
                    System.out.println("No se encontró ningún vehículo con la matrícula especificada.");
                }
                System.out.println("------------------------------------------------------");
                System.out.println("Fin del programa");
            case "5":
                em.getTransaction().begin();
                System.out.println("Introduce la matrícula del vehículo a modificar");
                String conductorModificar = sc.nextLine();
                TypedQuery<Vehiculo> queryModificar = em.createQuery("SELECT v FROM Vehiculo v WHERE v.matricula = :matricula", Vehiculo.class);
                queryModificar.setParameter("conductor", conductorModificar);
                List<Vehiculo> resultadosModificar = queryModificar.getResultList();
                if (!resultadosModificar.isEmpty()) {
                    Vehiculo vehiculoModificar = resultadosModificar.get(0);
                    System.out.println("Introduce la nueva fecha de matriculación");
                    vehiculoModificar.setFechadematriculacion(LocalDate.parse(sc.nextLine()));
                    em.getTransaction().commit();
                    System.out.println("Vehículo modificado correctamente");
                } else {
                    System.out.println("No se encontró ningún vehículo con la matrícula especificada");
                }
                System.out.println("------------------------------------------------------");
                System.out.println("Fin del programa");
                break;
            case "6":
                System.out.println("Introduce la matrícula del vehículo a eliminar");
                String matriculaEliminar = sc.nextLine();
                TypedQuery<Vehiculo> queryEliminar = em.createQuery("SELECT v FROM Vehiculo v WHERE v.matricula = :matricula", Vehiculo.class);
                queryEliminar.setParameter("matricula", matriculaEliminar);
                List<Vehiculo> resultadosEliminar = queryEliminar.getResultList();
                if (!resultadosEliminar.isEmpty()) {
                    Vehiculo vehiculoEliminar = resultadosEliminar.get(0);
                    em.getTransaction().begin();
                    em.remove(vehiculoEliminar);
                    em.getTransaction().commit();
                    System.out.println("Vehículo eliminado correctamente");
                } else {
                    System.out.println("No se encontró ningún vehículo con la matrícula especificada");
                }
                System.out.println("------------------------------------------------------");
                System.out.println("Fin del programa");
                break;
            case "7":
                System.out.println("Introduce la matrícula del coche a eliminar");
                String matriculaEliminarCoche = sc.nextLine();
                TypedQuery<Coche> queryEliminarCoche = em.createQuery("SELECT c FROM Coche c WHERE c.matricula = :matricula", Coche.class);
                queryEliminarCoche.setParameter("matricula", matriculaEliminarCoche);
                List<Coche> resultadosEliminarCoche = queryEliminarCoche.getResultList();
                if (!resultadosEliminarCoche.isEmpty()) {
                    Coche cocheEliminar = resultadosEliminarCoche.get(0);
                    em.getTransaction().begin();
                    em.remove(cocheEliminar);
                    em.getTransaction().commit();
                    System.out.println("Coche eliminado correctamente");
                } else {
                    System.out.println("No se encontró ningún coche con la matrícula especificada");
                }
                System.out.println("------------------------------------------------------");
                System.out.println("Fin del programa");
                break;
            case "8":
                System.out.println("Selecciona el método de filtro:");
                System.out.println("1.Filtrar mayores de edad");
                System.out.println("2.Filtrar por DNI igual a...");
                System.out.println("3.Filtrar por antigüedad mayor a...");
                System.out.println("4.Filtrar por nombre, apellido, apellido2");
                System.out.println("5.Alta trabajador");
                System.out.println("------------------------------------------------------");
                switch ((sc.nextLine())) {
                    case "1":

                        em.getTransaction().begin();


                        Calendar calendar = Calendar.getInstance();
                        calendar.add(Calendar.YEAR, -18); // Resta 18 años a la fecha actual

                        TypedQuery<Persona> querymayoredad = em.createQuery("SELECT p FROM Persona p WHERE p.Fnacimiento <= :fecha", Persona.class);
                        querymayoredad.setParameter("fecha", calendar.getTime());

                        List<Persona> resultado = querymayoredad.getResultList();

                        if (!resultado.isEmpty()) {
                            for (Persona p : resultado) {
                                System.out.println("Datos de la persona: "
                                        + "Fecha de nacimiento " + p.getFnacimiento() + ", nombre " + p.getNombre() + ", apellidos " + p.getPrimerapellido() + " " + p.getSegundoapellido() + ", DNI " + p.getDni());
                            }
                        } else {
                            System.out.println("No se encontraron personas mayores de 18 años.");
                        }

                        em.getTransaction().commit();

                        System.out.println("------------------------------------------------------");
                        System.out.println("Fin del programa");

                        break;
                    case "2":
                        System.out.println("Introduzca el dni de la persona");
                        String dni = sc.nextLine();
                        TypedQuery<Persona> querydni = em.createQuery("SELECT p FROM Persona p WHERE p.dni = :dni", Persona.class);
                        querydni.setParameter("dni", dni);
                        List<Persona> resultadodni = querydni.getResultList();
                        if (!resultadodni.isEmpty()) {
                            Persona p = resultadodni.get(0);
                            System.out.println("Datos de la persona: "
                                    + "Fecha de nacimiento " + p.getFnacimiento() + ", nombre " + p.getNombre() + ", apellidos " + p.getPrimerapellido() + " " + p.getSegundoapellido() + ", DNI " + p.getDni());
                        } else {
                            System.out.println("No se encontró ninguna persona con el dni especificado.");
                        }
                        System.out.println("------------------------------------------------------");
                        System.out.println("Fin del programa");
                        break;
                    case "3":

                        em.getTransaction().begin();


                        System.out.println("Escribe a partir de cuantos años fue el contrato");
                        Calendar calendar2 = Calendar.getInstance();
                        int cantidad = Integer.parseInt(sc.nextLine());
                        calendar2.add(Calendar.YEAR, -cantidad); // Resta los años que quieras a la fecha de contrato

                        TypedQuery<Trabajador> Namedquery = em.createQuery("SELECT t FROM Trabajador t WHERE t.fcontrato <= :fcontrato", Trabajador.class);
                        Namedquery.setParameter("fcontrato", calendar2);

                        List<Trabajador> resultadomayorque = Namedquery.getResultList();

                        if (!resultadomayorque.isEmpty()) {
                            for (Trabajador t : resultadomayorque) {
                                System.out.println("Datos de la persona: "
                                        + "Fecha de nacimiento " + t.getFnacimiento() + ", nombre " + t.getNombre() + ", apellidos " + t.getPrimerapellido() + " " + t.getSegundoapellido() + ", DNI " + t.getDni());
                            }
                        } else {
                            System.out.println("No se encontraron trabajadores.");
                        }

                        em.getTransaction().commit();

                        System.out.println("------------------------------------------------------");
                        System.out.println("Fin del programa");

                        break;

                    case "4":
                        System.out.println("Preguntar por nombre apellidos, si empieza por A mostrar los que empiezan por A");

                        try {
                            em.getTransaction().begin();

                            Scanner scanner = new Scanner(System.in);
                            System.out.println("Introduzca la letra para filtrar por nombre:");
                            String letra = scanner.nextLine();

                            TypedQuery<Persona> querynombreapellidos = em.createQuery("SELECT p FROM Persona p WHERE p.Nombre LIKE :letra", Persona.class);
                            querynombreapellidos.setParameter("letra", letra + "%");
                            List<Persona> resultadocaso4 = querynombreapellidos.getResultList();

                            if (!resultadocaso4.isEmpty()) {
                                for (Persona persona : resultadocaso4) {
                                    System.out.println("Datos de la persona: "
                                            + "Nombre: " + persona.getNombre()
                                            + ", Apellido1: " + persona.getPrimerapellido()
                                            + ", Apellido2: " + persona.getSegundoapellido());
                                }
                            } else {
                                System.out.println("No se encontraron personas cuyos nombres empiecen con la letra '" + letra + "'.");
                            }

                            em.getTransaction().commit();

                            System.out.println("------------------------------------------------------");
                            System.out.println("Fin del programa");
                        } finally {
                            // Cerrar recursos y manejar excepciones si es necesario
                        }
                        System.out.println("--------------------------");
                        System.out.println("Fin del programa");
                        break;
                    case "5":
                        System.out.println("Alta trabajador");
                        System.out.println("------------------------------------------------------");
                        Scanner scanner = new Scanner(System.in);
                        System.out.print("Introduzca el DNI: ");
                        dni = scanner.nextLine();

                        System.out.print("Introduzca el nombre: ");
                        String nombre = scanner.nextLine();

                        System.out.print("Introduzca el primer apellido: ");
                        String apellido1 = scanner.nextLine();

                        System.out.print("Introduzca el segundo apellido: ");
                        String apellido2 = scanner.nextLine();

                        System.out.print("Introduzca la fecha de nacimiento (formato: yyyy-MM-dd): ");
                        String fechaNacimientoString = scanner.nextLine();
                        LocalDate fechaNacimiento = LocalDate.parse(fechaNacimientoString);


                        em.getTransaction().begin();

                        Trabajador nuevoTrabajador = new Trabajador();
                        nuevoTrabajador.setNombre(nombre);
                        nuevoTrabajador.setPrimerapellido(apellido1);
                        nuevoTrabajador.setSegundoapellido(apellido2);
                        nuevoTrabajador.setFnacimiento(fechaNacimiento);
                        nuevoTrabajador.setDni(dni);

                        em.persist(nuevoTrabajador);
                        em.getTransaction().commit();

                        System.out.println("Trabajador registrado exitosamente.");
                        break;
                    default:
                        System.out.println("Opción inválida. Por favor, seleccione una opción válida.");
                        break;
                }

                System.out.println("--------------------------");
                System.out.println("Fin del programa");
                break;
            default:
                System.out.println("------------------------------------------------------");
                System.out.println("Fin del programa");
        }
    }
}
