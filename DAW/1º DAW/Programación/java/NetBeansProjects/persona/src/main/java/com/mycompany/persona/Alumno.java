/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.persona;

import java.text.SimpleDateFormat;
import java.util.Date;

/**
 *
 * @author damci
 */
public class Alumno extends Persona{
    private int nia;

    public int getNia() {
        return nia;
    }

    public void setNia(int nia) {
        this.nia = nia;
    }

    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido1() {
        return apellido1;
    }

    public void setApellido1(String apellido1) {
        this.apellido1 = apellido1;
    }

    public String getApellido2() {
        return apellido2;
    }

    public void setApellido2(String apellido2) {
        this.apellido2 = apellido2;
    }

    public Date getFechanacimiento() {
        return fechanacimiento;
    }

    public void setFechanacimiento(Date fechanacimiento) {
        this.fechanacimiento = fechanacimiento;
    }

    public Alumno(int nia, String dni, String nombre, String apellido1, String apellido2, Date fechanacimiento) {
        super(dni, nombre, apellido1, apellido2, fechanacimiento);
        this.nia = nia;
    }

    @Override
    public String toString() {
        return "Alumno{" + "nia=" + nia + '}';
    }

    
    
    
}
