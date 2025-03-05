/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exament7;

/**
 *
 * @author damci
 */
public class Television extends Electrodoméstico{
    public int pulgadas;
    public int pulgadas_defecto = 20;
    public boolean netflix;
    public boolean netflix_defecto = false;
    public int preciofinal = 0;



    public int getPulgadas() {
        return pulgadas;
    }

    public void setPulgadas(int pulgadas) {
        this.pulgadas = pulgadas;
    }

    public int getPulgadas_defecto() {
        return pulgadas_defecto;
    }

    public void setPulgadas_defecto(int pulgadas_defecto) {
        this.pulgadas_defecto = pulgadas_defecto;
    }

    public boolean isNetflix() {
        return netflix;
    }

    public void setNetflix(boolean netflix) {
        this.netflix = netflix;
    }

    public boolean isNetflix_defecto() {
        return netflix_defecto;
    }

    public void setNetflix_defecto(boolean netflix_defecto) {
        this.netflix_defecto = netflix_defecto;
    }

    public int getPreciofinal() {
        return preciofinal;
    }

    public void setPreciofinal(int preciofinal) {
        this.preciofinal = preciofinal;
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

    public Television(int pulgadas, boolean netflix, int precio_base, String color, char consumo_energético, int peso) {
        this.pulgadas = pulgadas;
        this.netflix = netflix;
    }





    
    
    @Override
    public String toString() {
        return "Televisión : Tiene una resolución de " + pulgadas + ", un precio de " + precio_base + ", un precio final de "+ precio + "€, su consumo es de tipo " + consumo_energético + ", pesa un total de " + peso + " y tiene netflix en modo (true = activado / false = desactivado)" + netflix;
    }
    
    public void PrecioFinal(){
        if(pulgadas > 20){
            precio_base = (int) (precio_base * 1.3);
        }
        if(netflix = true && pulgadas > 20){
            precio_base = (int) (precio_base + 50);
        }
    }
}
