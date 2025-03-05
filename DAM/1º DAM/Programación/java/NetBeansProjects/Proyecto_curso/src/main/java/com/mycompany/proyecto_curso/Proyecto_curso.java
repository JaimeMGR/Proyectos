/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.proyecto_curso;

/**
 *
 * @author damci
 */
public class Proyecto_curso {
        public static void main(String[] args) {
        Alumno Juan=new Alumno("Juan", "López", 8);
        Alumno Maria=new Alumno("Maria", "Sánchez", 9);
        Alumno Juana=new Alumno("Juana", "Ruíz", 8);
        System.out.println("Número total de alumnos " + Clase_alumnos.getNAlumnos());
        System.out.println("La media total de los alumnos " + Clase_alumnos.getMedia_Total());
        System.out.println(Juan.toString());
        
        
        
    }
}
