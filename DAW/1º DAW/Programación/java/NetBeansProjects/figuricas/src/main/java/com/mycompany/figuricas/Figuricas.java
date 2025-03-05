/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.figuricas;
import java.util.Scanner;

/**
 *
 * @author damci
 */
public class Figuricas {
//    public static void main(String[] argd) {
//        Punto p1 = new Punto(10,10);
//        
//        Punto p1_1 = new Punto(10,10);
//        Punto p1_2 = new Punto(20,30);
//        Recta r1 = new Recta(p1_1,p1_2);
//        
//        Recta r2 = new Recta(new Punto(10,10), new Punto(20,30));
//        System.out.println("La recta r2 tiene las coordenadas siguientes: " 
//        + r2.getP1().getX() + ", " + r2.getP1().getY() + " ,"
//        + r2.getP2().getX() + ", " + r2.getP2().getY());
//    
//        Punto `lr2 = r2.getP1();
//        plr2.getX();
    
    
    
    
    
    
    
    
    static Scanner sc = new Scanner(System.in);
    static int menuPrincipal() {
        System.out.println("Seleccione una opción: ");
        System.out.println("(1) Crear punto");
        System.out.println("(2) Crear recta");
        System.out.println("(3) Crear circunferencia");
        System.out.println("(4) Calcular longitud de la recta");
        System.out.println("(5) Calcular área de la circunferencia");
        System.out.println("(0) Salir");
        String entrada = sc.nextLine();
        try {
            int opcion = Integer.parseInt(entrada);
            return switch (opcion) {
                case 1, 2, 3, 4, 5, 0 -> opcion;
                default -> -1;
            };
        } catch (Exception e) {
            return -1;
        }
    }
    static Punto crearPunto() {
        double coordX;
        double coordY;
        System.out.println("Seleccione un valor para la coordenada x: ");
        String entrada1 = sc.nextLine();
        System.out.println("Seleccione un valor para la coordenada y: ");
        String entrada2 = sc.nextLine();
        try {
            coordX = Double.parseDouble(entrada1);
            coordY = Double.parseDouble(entrada2);
            return new Punto(coordX, coordY);
        } catch (Exception e) {
            System.out.println("ERROR: No ha introducido un valor válido en alguna de las coordenadas");
            return null;
        }
    }
    static Recta crearRecta() {
        System.out.println("Punto de inicio de la recta: ");
        Punto p1 = crearPunto();
        if (p1 == null)
            return null;
        System.out.println("Punto final de la recta: ");
        Punto p2 = crearPunto();
        if (p2 == null)
            return null;
        else
            return new Recta(p1, p2);
    }
    static Circunferencia crearCircunferencia() {
        return new Circunferencia(crearRecta());
    }
    public static void main(String[] args) {
        boolean continuar = true;
        System.out.println("----CREAR GEOMETRÍA----");
        Punto p;
        Recta r = null;
        Circunferencia c = null;
        while (continuar) {
            int opcion = menuPrincipal();
            switch (opcion) {
                case 0:
                    continuar = false;
                    continue;
                case 1:
                    p = crearPunto();
                    System.out.println("Punto creado: ");
                    System.out.println(p);
                    continue;
                case 2:
                    r = crearRecta();
                    System.out.println("Recta creada: ");
                    System.out.println(r);
                    continue;
                case 3:
                    c = crearCircunferencia();
                    System.out.println("Circunferencia creada: ");
                    System.out.println(c);
                    continue;
                case 4:
                    if (r != null)
                        System.out.println("La longitud de la recta es " + r.calcularLongitud());
                    else
                        System.out.println("ERROR: Aún no hay ninguna recta creada");
                    continue;
                case 5:
                    if (c != null)
                        System.out.println("El área de la circunferencia es " + c.calcularArea());
                    else
                        System.out.println("ERROR: Aún no hay ninguna circunferencia creada");
                    continue;
                case -1:
                    System.out.println("ERROR: No has introducido una opción válida");
            }
        }
        System.out.println("Saliendo del programa...");
        sc.close();
    }
}