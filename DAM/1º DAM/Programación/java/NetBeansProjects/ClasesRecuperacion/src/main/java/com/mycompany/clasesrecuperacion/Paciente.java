/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.clasesrecuperacion;

/**
 *
 * @author damci
 */
public class Paciente extends Persona {
    private String grupoSanguineo;
    private String alergias;
    
    public Paciente(String nombre, String apellidos, String nif, String grupoSanguineo, String alergias) {
        super(nombre, apellidos, nif);
        this.grupoSanguineo = grupoSanguineo;
        this.alergias = alergias;
    }
    
    public String getGrupoSanguineo() {
        return grupoSanguineo;
    }
    
    public void setGrupoSanguineo(String grupoSanguineo) {
        this.grupoSanguineo = grupoSanguineo;
    }

    public String getAlergias() {
        return alergias;
    }

    public void setAlergias(String alergias) {
        this.alergias = alergias;
    }
}
