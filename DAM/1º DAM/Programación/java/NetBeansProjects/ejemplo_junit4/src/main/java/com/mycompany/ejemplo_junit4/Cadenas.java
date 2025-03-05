/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.ejemplo_junit4;
import org.junit.Test;
import static org.junit.Assert.*;
/**
 *
 * @author damci
 */
public class Cadenas {
        public String ofuscar(String cadena) {
        StringBuilder sb = new StringBuilder();
        for (int i = 0; i < cadena.length(); i++) {
            char c = cadena.charAt(i);
            sb.append((char) (c + 1));
        }
        return sb.toString();
    }
        
  public String conE(String cadena) {
    if (cadena.length() > 10) {
      throw new IllegalArgumentException("La cadena no puede tener más de 10 caracteres");
    }
    return cadena.replaceAll("[aeiouAEIOU]", "e");
  }
        
          public void invertirParte(String[] cadena) {
    int inicio = 1;
    int fin = cadena.length - 2;
    
    while (inicio < fin) {
      String temp = cadena[inicio];
      cadena[inicio] = cadena[fin];
      cadena[fin] = temp;
      inicio++;
      fin--;
    }
    
    if (cadena.length > 4) {
      throw new ArrayIndexOutOfBoundsException("La cadena no puede tener más de 4 elementos");
    }
  }

 
 
 
 
 
 
 
 
 
 
 
}
