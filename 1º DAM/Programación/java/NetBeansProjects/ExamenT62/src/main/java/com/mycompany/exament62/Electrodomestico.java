/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exament62;

/**
 *
 * @author damci
 */
public class Electrodomestico {
    Float precioBase;
    String color;
    char consumo;
    int peso;

    public Electrodomestico(Float precioBase, String color, char consumo, int peso) {
        this.precioBase = precioBase;
        this.color = comprobarColor(color);
        this.consumo = comprobarConsumoEnergetico(consumo);
        this.peso = peso;
    }

    public Float getPrecioBase() {
        return precioBase;
    }

    public void setPrecioBase(Float precioBase) {
        this.precioBase = precioBase;
    }

    public String getColor() {
        return color;
    }

    public void setColor(String color) {
        this.color = comprobarColor(color);
    }

    public char getConsumo() {
        return consumo;
    }

    public void setConsumo(char consumo) {
        this.consumo = comprobarConsumoEnergetico(consumo);
    }

    public int getPeso() {
        return peso;
    }

    public void setPeso(int peso) {
        this.peso = peso;
    }
    
    private char comprobarConsumoEnergetico(char letra) {
        char nuevaLetra = Character.toUpperCase(letra);
        if (nuevaLetra >= 'A' && nuevaLetra <= 'F')
            return nuevaLetra;
        else return 'A';
    }
    
    private String comprobarColor(String color) {
        String nuevoColor = color.toLowerCase();
        
        return switch (nuevoColor) {
            case "blanco", "negro", "rojo", "azul", "gris" -> nuevoColor;
            default -> "blanco";
        };
    }

    @Override
    public String toString() {
        return "Electrodomestico{" + "precioBase=" + precioBase + ", color=" + color + ", consumo=" + consumo + ", peso=" + peso + '}';
    }
    
    Float precioFinal()
    {
        Float precio = precioBase;
        
        switch (consumo) {
            case 'A' -> precio = precio + 100;
            case 'B' -> precio = precio + 80;
            case 'C' -> precio = precio + 60;
            case 'D' -> precio = precio + 50;
            case 'E' -> precio = precio + 30;
            case 'F' -> precio = precio + 10;
        }
        
        if (peso >= 0 && peso <= 19)
            precio = precio + 10;
        else if (peso > 19 && peso <= 49)
            precio = precio + 50;
        else if (peso > 50 && peso <= 79)
            precio = precio + 80;            
        else 
            precio = precio + 100;
        
        return precio;
    }
}
