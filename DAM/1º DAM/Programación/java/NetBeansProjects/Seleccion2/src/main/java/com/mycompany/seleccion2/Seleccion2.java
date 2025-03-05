/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.seleccion2;

import java.util.Scanner;

/**
 *
 * @author damci
 */

/*
Crear una lista de descuentos, si tienes 65 años te descuentan un 20%, 60 años 10 % hasta los 30 años 15%, hasta 20 años un 25%
*/
public class Seleccion2 {

    public static void main(String[] args) {
        System.out.println("¿Cuántos años tienes? ");
        Scanner sc = new Scanner(System.in);
        System.out.println("¿Cuanto cuestan tus productos? ");
        int Preciofinal = 0;
        int Edad = sc.nextInt();
        int Precio = sc.nextInt();
        if (Edad<=20){
            Preciofinal = (int)(Precio * 0.75);
            System.out.println("El precio es " + Preciofinal + "€");
        }
        else if (Edad<=30){
            Preciofinal = (int) (Precio * 0.15);
            System.out.println("El precio es " + Preciofinal + "€");  
        }
        else if (Edad<=60){
            Preciofinal = (int) (Precio * 0.9);
            System.out.println("El precio es " + Preciofinal + "€");
        }
        else if (Edad<65){
            Preciofinal = (int) (Precio * 0.9);
            System.out.println("El precio es " + Preciofinal + "€");
        }
        else if (Edad>=65) {
            Preciofinal = (int) (Precio * 0.8);
            System.out.println("El precio es " + Preciofinal + "€");
        }
.    }
}
    


