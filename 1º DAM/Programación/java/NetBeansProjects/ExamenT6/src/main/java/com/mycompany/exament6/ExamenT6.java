/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.exament6;

/**
 *
 * @author Jaime Molina Granados
 */
public class ExamenT6 {

public static void main(String[] args) {
    ListaPersonas lista = new ListaPersonas(); //Creamos una lista llamada listapersonas
    //Ahora añadimos a las personas que queramos gracias al constructor que he creado antes
    Persona Carmen = new Persona("Carmen", "López", "11111A");
    Persona Pedro = new Persona("Pedro", "Ruíz", "22222B");
    Persona Luisa = new Persona("Luisa", "Pérez", "33333C");
    Persona Pablo = new Persona("Pablo", "Sánchez", "44444D");
    //A continuación añado las personas a la lista por si necesitas buscar una en específico
    lista.añadirPersona(Carmen);
    lista.añadirPersona(Pedro);
    lista.añadirPersona(Luisa);
    lista.añadirPersona(Pablo);
    
    lista.listar(); //Con ela función listar que hemos creado antes enseñamos en la pantalla todos los miembros de la lista con sus datos
    
    Persona personaEncontrada = lista.buscarPersona("33333C");
    //Con la función buscarPersona que he creado antes vamos a buscar si hay algún valor nif de alguna persona que coincida con el que busco
    System.out.println(personaEncontrada); //Muestro en pantalla el resultado, si existe o no
    //Y ahora hago lo mismo pero con el nif 55555E
    personaEncontrada = lista.buscarPersona("55555E");
    System.out.println(personaEncontrada); }
}

