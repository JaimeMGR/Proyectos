/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.ventanacalculadora;import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;


import javax.swing.JLabel;
import java.awt.GridLayout;
import javax.swing.JTextField;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

public class VentanaCalculadora extends JFrame {

private JPanel contentPane;
private Calculadora codigo;
private JTextField textField;
private JTextField textField_1;

/**
* Launch the application.
*/
public static void main(String[] args) {
EventQueue.invokeLater(new Runnable() {
public void run() {
try {
VentanaCalculadora frame = new VentanaCalculadora();
frame.setVisible(true);
} catch (Exception e) {
e.printStackTrace();
}
}
});
}

/**
* Create the frame.
*/
public VentanaCalculadora() {
codigo = new Calculadora();
setTitle("Calculadora");
setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
setBounds(100, 100, 450, 300);
contentPane = new JPanel();
contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
contentPane.setLayout(new BorderLayout(0, 0));
setContentPane(contentPane);

JLabel labelRespuesta = new JLabel("0");
contentPane.add(labelRespuesta, BorderLayout.NORTH);

JPanel panel = new JPanel();
contentPane.add(panel, BorderLayout.CENTER);
panel.setLayout(new GridLayout(0, 2, 0, 0));

textField = new JTextField();
panel.add(textField);
textField.setColumns(10);

textField_1 = new JTextField();
panel.add(textField_1);
textField_1.setColumns(10);

JButton btnSuma = new JButton("Suma");
btnSuma.addActionListener(new ActionListener() {
public void actionPerformed(ActionEvent arg0) {
labelRespuesta.setText(codigo.sumar(textField.getText(), textField_1.getText()));
}
});
panel.add(btnSuma);

JButton btnResta = new JButton("Resta");
btnResta.addActionListener(new ActionListener() {
public void actionPerformed(ActionEvent e) {
labelRespuesta.setText(codigo.resta(textField.getText(), textField_1.getText()));
}
});
panel.add(btnResta);

JButton btnMultiplicacion = new JButton("Multiplicacion");
btnMultiplicacion.addActionListener(new ActionListener() {
public void actionPerformed(ActionEvent e) {
labelRespuesta.setText(codigo.multiplicar(textField.getText(), textField_1.getText()));
}
});
panel.add(btnMultiplicacion);

JButton btnDivision = new JButton("Division");
btnDivision.addActionListener(new ActionListener() {
public void actionPerformed(ActionEvent e) {
labelRespuesta.setText(codigo.dividir(textField.getText(), textField_1.getText()));
}
});
panel.add(btnDivision);
}
}

