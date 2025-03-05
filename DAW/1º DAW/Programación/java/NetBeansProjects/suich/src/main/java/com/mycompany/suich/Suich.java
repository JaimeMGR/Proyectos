/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.suich;

/**
 *
 * @author damci
 */
public class Suich {

    public static void main(String[] args) {
    int dia = 1; // 1L, 2-M, 3-X, 4-J, 5-V
    switch (dia){
        case 1: System.out.println("Lunes");
        case 2: System.out.println("Martes");
        case 3: System.out.println("Miércoles");
        case 4: System.out.println("Jueves");
        case 5: System.out.println("Viernes");
                break;
        case 6,7: System.out.println("Fin de semana");
         break;
        default: System.out.println("Día desconocido");
        break;
    }
    }
}
