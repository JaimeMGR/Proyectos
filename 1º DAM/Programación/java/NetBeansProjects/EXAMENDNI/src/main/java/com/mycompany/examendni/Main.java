/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package com.mycompany.examendni;

/**
 *
 * @author damci
 */
public class Main {

    public static void main(String[] args) {                                                                      
        NIF nif1 = new NIF();
        nif1.leer();
        System.out.println(nif1);

        NIF nif2 = new NIF(12345678);
        System.out.println(nif2);

    }
}