/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exament7;

import java.util.ArrayList;

/**
 *
 * @author damci
 */
public class Electrodoméstico {
    private ArrayList<Electrodoméstico> ArrayElectrodoméstico; //Creamos el ArrayList
    
    public Electrodoméstico() {
        ArrayElectrodoméstico = new ArrayList<Electrodoméstico>();
    }
    
    public void añadirPersona(Electrodoméstico persona) {//Con este comando podemos añadir personas
        ArrayElectrodoméstico.add(persona);
    }

    public void listar() { //Con esta función podemos listar los objetos de la Arraylist(ArrayPersonas)
        for (Electrodoméstico electrodoméstico : ArrayElectrodoméstico) {
            System.out.println(electrodoméstico);
        }
    }
    
    
    public double precio;
    public int precio_base;
    public double precio_base_defecto = 100;
    public String color;
    public String[] colores_defecto = {"blanco", "negro", "rojo", "azul", "gris"};
    public String color_base = "blanco";
    public char consumo_energético;
    public char consumo_energético_base = 'A';
    public int peso;
    public double peso_base = 5;

    public Electrodoméstico(int precio_base,int precio , String color, char consumo_energético, int peso) {
        this.precio_base = precio_base;
        this.color = color;
        this.consumo_energético = consumo_energético;
        this.peso = peso;
    }


    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }

    public int getPrecio_base() {
        return precio_base;
    }

    public void setPrecio_base(int precio_base) {
        this.precio_base = precio_base;
    }

    public double getPrecio_base_defecto() {
        return precio_base_defecto;
    }

    public void setPrecio_base_defecto(double precio_base_defecto) {
        this.precio_base_defecto = precio_base_defecto;
    }

    public String getColor() {
        return color;
    }

    public void setColor(String color) {
        this.color = color;
    }

    public String[] getColores_defecto() {
        return colores_defecto;
    }

    public void setColores_defecto(String[] colores_defecto) {
        this.colores_defecto = colores_defecto;
    }

    public String getColor_base() {
        return color_base;
    }

    public void setColor_base(String color_base) {
        this.color_base = color_base;
    }

    public char getConsumo_energético() {
        return consumo_energético;
    }

    public void setConsumo_energético(char consumo_energético) {
        this.consumo_energético = consumo_energético;
    }



    public char getConsumo_energético_base() {
        return consumo_energético_base;
    }

    public void setConsumo_energético_base(char consumo_energético_base) {
        this.consumo_energético_base = consumo_energético_base;
    }

    public int getPeso() {
        return peso;
    }

    public void setPeso(int peso) {
        this.peso = peso;
    }

    public double getPeso_base() {
        return peso_base;
    }

    public void setPeso_base(double peso_base) {
        this.peso_base = peso_base;
    }







        
     public String toString() {
        return precio_base + color + consumo_energético + peso;
    }
     
    public double precioFinal() {
        double precio = getPrecio_base();
        switch (getConsumo_energético_base()) {
            case 'A':
                precio += 100;
                break;
            case 'B':
                precio += 80;
                break;
            case 'C':
                precio += 60;
                break;
            case 'D':
                precio += 50;
                break;
            case 'E':
                precio += 30;
                break;
            case 'F':
                precio += 10;
                break;
}
        return 0;
}
}