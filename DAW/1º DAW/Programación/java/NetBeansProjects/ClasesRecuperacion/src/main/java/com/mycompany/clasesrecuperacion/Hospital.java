/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.clasesrecuperacion;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author damci
 */

public class Hospital {
    private ArrayList<Paciente> pacientes;

    public Hospital() {
        this.pacientes = new ArrayList<>();
    }

    public void agregarPaciente(Paciente paciente) {
        this.pacientes.add(paciente);
    }

    public ArrayList<Paciente> getPacientes() {
        return pacientes;
    }

    public void setPacientes(ArrayList<Paciente> pacientes) {
        this.pacientes = pacientes;
    }

    public void listarPacientes() {
        for (Paciente paciente : this.pacientes) {
            System.out.println("Nuevo paciente:");
            System.out.println();
            System.out.println("Nombre: " + paciente.getNombre());
            System.out.println("Apellidos: " + paciente.getApellidos());
            System.out.println("NIF: " + paciente.getNif());
            System.out.println("Grupo sanguíneo: " + paciente.getGrupoSanguineo());
            System.out.println("Alergias: " + paciente.getAlergias());
            System.out.println("------------------------------------------------------");
        }
    }
}
