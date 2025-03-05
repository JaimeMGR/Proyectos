 /*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.empresa_herencia;

/**
 *
 * @author damci
 */
public class Empresa {
    private String nombre;
    private String apellidos;
    private String DNI;
    private String categoría;
    private String ciudad;
    
    public String getCiudad() {
        return ciudad;
    }

    public void setCiudad(String ciudad) {
        this.ciudad = ciudad;
    }


    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellidos() {
        return apellidos;
    }

    public void setApellidos(String apellidos) {
        this.apellidos = apellidos;
    }

    public String getDNI() {
        return DNI;
    }

    public void setDNI(String DNI) {
        this.DNI = DNI;
    }

    public String getCategoría() {
        return categoría;
    }

    public void setCategoría(String categoría) {
        this.categoría = categoría;
    }

    public Empresa(String nombre, String apellidos, String DNI, String categoría, String ciudad) {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.DNI = DNI;
        this.categoría = categoría;
        this.ciudad = ciudad;
    }

    @Override
    public String toString() {
        return (nombre +" " +apellidos +" " +DNI +" " +categoría +" " +ciudad);
    }

    void setDirector(Empresa empresa) {
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
    }

    void setCliente1(Persona p1) {
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
    }
    
    
}
