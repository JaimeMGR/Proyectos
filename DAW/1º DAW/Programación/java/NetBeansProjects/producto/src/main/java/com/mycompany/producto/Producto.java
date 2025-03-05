/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.producto;

/**
 *
 * @author damci
 */
public class Producto {

    private static int rebaja;
    private final double precio;

    public Producto(double precio) {
        this.precio = precio;
    }

    public static void infoRebajaActual() {
        System.out.println("Rebaja actual: " + rebaja + "%.");
    }

    public double getPrecioFinal() {
        return precio - (precio * rebaja / 100);
    }

    public static void main(String[] args) {
        //Creando 2 productos
        Producto p1 = new Producto(10);
        Producto p2 = new Producto(30);
        infoRebajaActual();
        System.out.println("Precio p1: " + p1.getPrecioFinal());
        System.out.println("Precio p2: " + p2.getPrecioFinal());
        //Primeras rebajas y se decide bajar todos los precios un 25%
        Producto.rebaja = 25;
        infoRebajaActual();
        System.out.println("Precio p1 primeras rebajas: " + p1.getPrecioFinal());
        System.out.println("Precio p2 primeras rebajas: " + p2.getPrecioFinal());
        //segundas rebajas y se decide bajar todos los precios a la mitad (50%)
        Producto.rebaja = 50;
        infoRebajaActual();
        System.out.println("Precio p1 segundas rebajas: " + p1.getPrecioFinal());
        System.out.println("Precio p2 segundas rebajas: " + p2.getPrecioFinal());
    }
}
