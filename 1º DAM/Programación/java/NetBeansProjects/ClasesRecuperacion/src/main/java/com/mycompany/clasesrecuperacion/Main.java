/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package com.mycompany.clasesrecuperacion;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author damci
 */
public class Main {
    public static void main(String[] args) {
        Paciente paciente1 = new Paciente("Carmen", "López", "11111A", "A+", "");
        Paciente paciente2 = new Paciente("Pedro", "Ruiz", "22222B", "0-", "Cupresáceas");
        Paciente paciente3 = new Paciente("Luisa", "Pérez", "33333C", "B-", "");
        Paciente paciente4 = new Paciente("Pablo", "Sánchez", "44444D", "0+", "Gramíneas");

        Hospital hospital = new Hospital();
        hospital.agregarPaciente(paciente1);
        hospital.agregarPaciente(paciente2);
        hospital.agregarPaciente(paciente3);
        hospital.agregarPaciente(paciente4);
        hospital.listarPacientes();

    }
}