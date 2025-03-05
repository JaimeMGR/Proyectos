/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.cochepersistente;

import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;

/**
 *
 * @author Profesor
 */
public class CochePersistente {

    public static void main(String[] args) {
        Coche coche = new Coche("Seat León", 
                "7654GJN", "1.4 gassolina");
        
        try {
            //Escribir en archivo coche.ser
            FileOutputStream fileOut = new FileOutputStream("coche.ser");
            ObjectOutputStream out = new ObjectOutputStream(fileOut);
            
            //Escribir objeto
            out.writeObject(coche);
            
            //Cerrar
            out.close();
            fileOut.close();
            System.out.println("Objeto serializado en coches.net");
        }
        catch (IOException e) {
            e.printStackTrace();
        }
        
        try {
            //Flujo de entrada
            FileInputStream fileIn = new FileInputStream("coche.ser");
            ObjectInputStream in = new ObjectInputStream(fileIn);
            
            //Leer objeto
            Coche cocheLeido = (Coche) in.readObject();
            
            //Cerrar
            in.close();
            fileIn.close();
            System.out.println(cocheLeido.toString());
        }
        catch (Exception e)
        {
           e.printStackTrace();
        }
    }
}
