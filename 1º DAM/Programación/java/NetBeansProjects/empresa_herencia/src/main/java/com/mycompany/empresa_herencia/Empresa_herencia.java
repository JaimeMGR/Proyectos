/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.empresa_herencia;

/**
 *
 * @author Profesor
 */
public class Empresa_herencia {

    public static void main(String[] args) {
        Persona p1 = new Persona("Carlos", "López", "12489X", "GR");
        Empleado e1 = new Empleado("Ana","Ruiz","23456F","Director");
        Empresa Ana = new Empresa("Ana","MLópez","2483F","Director"," ");
        Empresa Jorge = new Empresa("Jorge","Cruz","8318M","Programador"," ");
        Empresa Sergio = new Empresa("Sergio","Pérez","8312K","Administrativo"," ");
        Persona Luisa = new Persona("Luisa","Sánchez","8124G", "GR");
        Persona Carmen = new Persona("Carmen","Ruiz","4298P","ZA");
        
        
        p1.setCiudad("Ciudad Real");
        System.out.println(Ana.toString());
        System.out.println(Jorge.toString());
        System.out.println(Sergio.toString());
        System.out.println("------------------------------------");
        System.out.println(Luisa.toString());
        System.out.println(Carmen.toString());
    }
}
