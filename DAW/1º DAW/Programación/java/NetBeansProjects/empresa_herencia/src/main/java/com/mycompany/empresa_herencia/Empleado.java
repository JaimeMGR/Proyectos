/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.empresa_herencia;

/**
 *
 * @author Profesor
 */
public class Empleado extends Persona {
    private String categoria;
    private float irpf;
    private String departamento;

    public Empleado(String nombre, String apellidos, String nif, String ciudad, String categoria, float irpf, String departamento) {
        super(nombre, apellidos, nif, ciudad);
        this.categoria = categoria;
        this.irpf = irpf;
        this.departamento = departamento;
    }

    public Empleado(String nombre, String apellidos, String nif,String categoria) {
        super(nombre, apellidos, nif);
        this.categoria = categoria;
        this.departamento="N/A";
        this.irpf = 5;
    }
      
    public String getCategoria() {
        return categoria;
    }

    public void setCategoria(String categoria) {
        this.categoria = categoria;
    }

    public float getIrpf() {
        return irpf;
    }

    public void setIrpf(float irpf) {
        this.irpf = irpf;
    }

    public String getDepartamento() {
        return departamento;
    }

    public void setDepartamento(String departamento) {
        this.departamento = departamento;
    }

    @Override
    public String toString() {
        return super.toString() + "\n"
                + categoria + "\n"
                + departamento;
    }

    
    
    
    
    
}
