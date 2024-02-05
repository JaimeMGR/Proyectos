
package com.mycompany.herencia_sobreescritura;

/**
 *
 * @author garci
 */

public class Herencia_sobreescritura {
            
        public static void main(String[] args) {
            ClaseC obj=new ClaseC();
            //Acceso desde el exterior de la clase C (metodo main)
            System.out.println("Campo c2 de C: "+obj.c2);
            System.out.println("Campo c1 de C: "+obj.c1);

            System.out.println("Campo c1 oculto de B = "+((ClaseB)obj).c1);
            System.out.println("Campo c1 oculto de A = "+((ClaseA)obj).c1);
            
            obj.c2="azul";
            obj.c1='k';
            
            //Casting Obj ClaseC a CaseB
            ClaseB obj3 = (ClaseB)obj;
            System.out.println("onj3.c2 "+obj3.c2);
            System.out.println("onj3.c2 "+obj3.c1);
            
            System.out.println("----Sobrescritura------");        //Acceso desde la misma clase C
            obj.verCampos();
       
            ClaseC obj2 = new ClaseC();
            obj2.metodoA();
            obj2.metodoB();
            obj2.metodoC();

            System.out.println("-------------------");
            obj2.metodoSobrescrito1();

            ((ClaseB)obj2).metodoSobrescrito1();
            ((ClaseA)obj2).metodoSobrescrito1();

            System.out.println("-------------------");
            obj.metodoSobrescrito2();
            
            //Mantiene el método sobrescrito de C
            B obj4 = (B)obj2;
            obj.metodoSobrescrito1();

            }
}