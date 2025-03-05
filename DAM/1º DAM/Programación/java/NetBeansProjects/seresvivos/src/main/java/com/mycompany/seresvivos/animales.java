/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.seresvivos;

/**
 *
 * @author damci
 */
public class animales {
    private String nombrecientifico;
    private String nombrecomun;
    private String peso;
    private String altura;
    private String comosealimenta;

    public String getNombrecientifico() {
        return nombrecientifico;
    }

    public void setNombrecientifico(String nombrecientifico) {
        this.nombrecientifico = nombrecientifico;
    }

    public String getNombrecomun() {
        return nombrecomun;
    }

    public void setNombrecomun(String nombrecomun) {
        this.nombrecomun = nombrecomun;
    }

    public String getPeso() {
        return peso;
    }

    public void setPeso(String peso) {
        this.peso = peso;
    }

    public String getAltura() {
        return altura;
    }

    public void setAltura(String altura) {
        this.altura = altura;
    }

    public String getComosealimenta() {
        return comosealimenta;
    }

    public void setComosealimenta(String comosealimenta) {
        this.comosealimenta = comosealimenta;
    }

    public animales(String nombrecientifico, String nombrecomun, String peso, String altura, String comosealimenta) {
        this.nombrecientifico = nombrecientifico;
        this.nombrecomun = nombrecomun;
        this.peso = peso;
        this.altura = altura;
        this.comosealimenta = comosealimenta;
    }

    @Override
    public String toString() {
        return  "nombre cientifico = " + nombrecientifico + ", nombre comun = " + nombrecomun + ", peso = " + peso + ", altura = " + altura + ", ¿como se alimenta? = Mediante" + comosealimenta;
    }
    
    
}
