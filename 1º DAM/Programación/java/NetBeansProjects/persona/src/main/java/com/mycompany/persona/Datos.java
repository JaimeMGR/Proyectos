/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package com.mycompany.persona;

import java.text.SimpleDateFormat;
import java.util.Date;

/**
 *
 * @author damci
 */
public class Datos {
    public static void main(String[] args) {}
    
    {
    try{
    SimpleDateFormat d = new SimpleDateFormat("dd-MM-yy");
    Date jaime1 = d.parse("31-03-2016");
    Date jaime2 = d.parse("31-03-2016");
    Date jaime3 = d.parse("31-03-2016");
    Date jaime4 = d.parse("31-03-2016");

    Persona Jaime = new Persona("14789632N","Jaime","Molina","Granados",jaime1);
    Alumno Jaime2 = new Alumno(13123123,"14789632N","Jaime","Molina","Granados",jaime2);
    Trabajador Jaime3 = new Trabajador(213124,"14789632N","Jaime","Molina","Granados",jaime3);
    Profesor Jaime4 = new Profesor("Departamento",4636346,"14789632N","Jaime","Molina","Granados",jaime4);
}
    catch(Exception e)
    {}
}
}
