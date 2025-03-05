/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.figuras;
import com.mycompany.figuras.operaciones.Valores;
import com.mycompany.figuras.Circulo;
import com.mycompany.figuras.Cilindro;
/**
 *
 * @author damci
 */
public class Figuras {

    public static void main(String[] args) {
    Circulo c1 = new Circulo();
    Circulo c2 = new Circulo(3.0);
    Cilindro c11 = new Cilindro();
    Cilindro c12 = new Cilindro(2.0,8.0);
        System.out.println("Area círculo: " + c1.area());
        System.out.println("Area círculo: " + c2.area());
        System.out.println("Area cilindro: " + c11.area());
        System.out.println("Area cilindro: " + c12.area());      
        System.out.println("Número de círculos " Circulo.nCirculos);
        System.out.println("Número de círculos " Cilindro.nCirculos);
        System.out.println("Area por defecto:" * valores.area());
        
}
}
