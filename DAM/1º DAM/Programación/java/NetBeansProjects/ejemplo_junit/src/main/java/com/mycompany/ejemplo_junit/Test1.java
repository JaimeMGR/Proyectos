/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejemplo_junit;

/**
 *
 * @author Profesor
 */
public class Test1 {
   public int multiplica(int a, int b) {
    return a*b;

    }

    public int factorial(int numero) {
        if (numero < 0) 
            throw new ArithmeticException("El factorial negativo no existe");
        else if (numero == 0)
            return 1;
        
        int factorial = numero;
        for(int i =(numero - 1); i > 1; i--){
            factorial = factorial * i;
        }
        return factorial;
    }
    
    public int sumar(int a, int b) {
    if (a<0 || b<0) throw new IllegalArgumentException("No se aceptan valores negativos");
    else return a+b;

    }
    public int Dividir(float a, float b)  {
        float division = a/b;
    if (a==0 && b==0) throw new IllegalArgumentException("0 no se puede dividir entre 0");
    
    else return (int) division;
    }
 
}
