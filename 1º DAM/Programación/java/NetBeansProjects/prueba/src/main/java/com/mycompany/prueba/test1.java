/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.prueba;

/**
 *
 * @author damci
 */
public class test1 {
       public int multiplica(int a, int b){
           return a * b;
       }
       public int factorial(int numero) {
           int factorial = numero;
           
           for(int i =(numero - 1); i > 1; i--)
           {
               factorial = factorial * i;
           }
       
       return factorial;

}
}
