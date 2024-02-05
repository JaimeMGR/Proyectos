/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exament7;

/**
 *
 * @author damci
 */
public class Lavadora extends Electrodoméstico{
    private int carga;
    private int carga_defecto = 5;

    public int getCarga() {
        return carga;
    }

    public void setCarga(int carga) {
        this.carga = carga;
    }

    public int getCarga_defecto() {
        return carga_defecto;
    }

    public void setCarga_defecto(int carga_defecto) {
        this.carga_defecto = carga_defecto;
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

    public Lavadora(int carga, int precio_base, int precio, String color, char consumo_energético, int peso) {
        super(precio_base, precio, color, consumo_energético, peso);
        this.carga = carga;
    }


    
    @Override
    public String toString() {
        return "Lavadora: Tiene un precio base de " + precio_base + ", un precio final de "+ precio + "€ , un consumo tipo " + consumo_energético +", un peso de " + peso + "kg y soporta una carga de "+ carga + " kg";
    }

}
