/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.visibilidad;

/**
 *
 * @author damci
 */
public class trabajador {
        private String puesto;
        
        public String getPuesto(){
            return puesto;
        }
        
        public void setPuesto(String Puesto) {
            this.puesto = puesto;
        }
        
        void prueba()
        {
            Persona p = new Persona();
            p.nombre = "yo";
            p.nif = 123;
            
            this.nombre = "123";
            this.nif = "123";
        }
}