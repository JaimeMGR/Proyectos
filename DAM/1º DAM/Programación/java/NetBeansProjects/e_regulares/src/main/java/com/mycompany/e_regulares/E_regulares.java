/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.e_regulares;

import java.util.Scanner;
import java.util.regex.Pattern;

/**
 *
 * @author damci
 */
public class E_regulares {

    public static void main(String[] args) {
        //ER
        String regExNIF = "[0-9]{7,8}-?[A-HJ-NP-TV-Z]";
        String regExTelefono = "[6|7|9][0-9]{8}";
        String regExtMail = "(.+)@(.+)";
        String regExMail = "[a-zA-Z0-9 +&*-]+(?:\\.[a-zA-Z0-9 +&*-]+)*@"
                + "(?:[a-zA-Z0-9-]+\\.)+[a-zA-Z]{2,7}";
        String cadena = "1234567D Lorem fistrum condemor a peich sexuarl 12547896Aese hombree sexuarl fistro diodenoo diodeno de la pradera."
                + "Apetecan torpedo pecador no te digo 5621059Y trigo por no llamarte Rodrigor."
                + " Te va a hasé 950200000 pupitaa por la 1166433P gloria de mi madre qué dise usteer torpedo quietooor te voy a borrar el cerito por la gloria de mi madre"
                + "no te digo pepepotamogranada@gmail.comtrigo por no 8993785-C llamarte Rodrigor."
                + " Apetecan ese hombree pecador benemeritaar te voy a borrar el cerito 1234578m quietooor fistro de la pradera."
                + " A gramenawer la caidita va usté muy cargadoo caballo blanco caballo negroorl 9876542Wva usté muy cargadoo benemeritaar pecador.";
        
        Scanner sc = new Scanner(cadena);
        
        //Tonto el que lo copie
        //Resto de cadena por escanear
        String resto = "";
        
        while (sc.hasNext())
        {
            if (sc.hasNext(Pattern.compile(regExNIF)))
            {            System.out.println("Encontrado NIF: "
                    + sc.next(Pattern.compile(regExNIF)));
        }
        
        else if (sc.hasNext(Pattern.compile(regExTelefono)))
        {
            System.out.println("Encontrado teléfono: "
                + sc.next(Pattern.compile(regExTelefono)));
        }
                else if (sc.hasNext(Pattern.compile(regExtMail)))
        {
            System.out.println("Encontrado correo: "
                + sc.next(Pattern.compile(regExtMail)));
        }
        else    
        {
                sc.next();
        }
    }
    }     
}