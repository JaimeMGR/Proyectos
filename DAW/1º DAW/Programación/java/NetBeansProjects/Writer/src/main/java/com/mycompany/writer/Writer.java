/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.writer;

import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.io.StringWriter;

public class Writer {
    public static void fileWriter() {
        try {
            FileWriter fw = new FileWriter("fich1.txt");
            fw.write("Texto\n");
            fw.write("Más texto");
            fw.close();
        } catch (IOException var1) {
            System.out.println("Excepción:" + String.valueOf(var1));
        }
    }
    
    
    
    public static void StringWriter() {
        try {
            FileWriter fw = new FileWriter("fich1.txt");
            PrintWriter pw = new PrintWriter(fw);
            
            StringWriter sw = new StringWriter();
            sw.write("Texto\n");
            sw.write("Más texto");
            sw.close();
            
            pw.println(sw.toString());
            
            pw.close();
        }
        catch(IOException e){
            System.out.println("Excepción: " +e);
        }
    }
}
