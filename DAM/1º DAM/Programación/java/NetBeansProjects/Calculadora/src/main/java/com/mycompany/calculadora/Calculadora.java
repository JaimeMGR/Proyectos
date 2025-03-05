/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.calculadora;

import java.util.Scanner;

/**
 *
 * @author Jaime
 */
public class Calculadora {

 public static void main(String[] args) {
 Scanner sc=new Scanner(System.in);
    System.out.println("¿Que quieres hacer?");
    System.out.print("Respuesta: ");
     String operación=sc.nextLine();
 float[] número=new float[2];
 float resultado=0;
 boolean mal=true;
 switch(operación){
    case "1" ->
         {
             operación="suma";
             System.out.println("");
             
             for (int i = 0; i < 2; i++) {
                 System.out.print("Primer número: ");
                 número[i]=sc.nextFloat();
             }
             
             resultado=número[0] + número[1];
             mal=false;
         }
 case "2" ->
         {
             operación="resta";
             System.out.println("");
             for (int i = 0; i < 2; i++) {
                 System.out.print("Segundo número: ");
                 número[i]=sc.nextFloat();
             }
             resultado=(número[0]) - (número[1]);
             mal=false;
         }
 case "3" ->
         {
             operación="multiplicación";
             System.out.println("");
             for (int i = 0; i < 2; i++) {
                 System.out.print("Numero "+(i+1)+": ");
                 número[i]=sc.nextFloat();
             }
             
             resultado=(número[0]) * (número[1]);
             mal=false;
         }
 case "4" ->
         {
             operación="División";
             System.out.println("");
             for (int i = 0; i < 2; i++) {
                 System.out.print("Numero "+(i+1)+": ");
                 número[i]=sc.nextFloat();
             }
             
             if(número[1]!=0){
                 resultado=(número[0])/(número[1]);
                 mal=false;
             }else{
                 mal=true;
             }       }
    default -> mal=true;
 }
    System.out.println("");
 if(mal==false){
    System.out.println("Resultado de la "+operación+": "+resultado);
 }
 else
 {
     System.out.println("ERROR: Cómprate una Casio");
 }
 }
}
