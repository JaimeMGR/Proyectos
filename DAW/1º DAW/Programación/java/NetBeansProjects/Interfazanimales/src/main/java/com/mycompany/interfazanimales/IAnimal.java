/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.interfazanimales;

/**
 *
 * @author damci
 */
public interface IAnimal {
   public void mover(int x, int y);
   public void comer(int cantidad);
   default String informe()
   {
       return("DATOS DEL ANIMAL ------------------------------------------------");
   }
}

