*/
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package com.mycompany.numeroscodigos;

/**
 *
 * @author damci
 */
public class Numeroscodigos {
	public static void main(String[] args) {
		double numero = 3.1416;
		System.out.printf("El número originalmente es: %f\n", numero);
		double parteDecimal = numero % 1; // Lo que sobra de dividir al número entre 1
		double parteEntera = numero - parteDecimal; // Le quitamos la parte decimal usando una resta
		System.out.printf("Parte entera: %f. Parte decimal: %f\n", parteEntera, parteDecimal);
	}
}