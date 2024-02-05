class Main {
	public static void main(String[] args) {
		double numero = 3.1416;
		System.out.printf("El número originalmente es: %f\n", numero);
		double parteDecimal = numero % 1; // Lo que sobra de dividir al número entre 1
		double parteEntera = numero - parteDecimal; // Le quitamos la parte decimal usando una resta
		System.out.printf("Parte entera: %f. Parte decimal: %f\n", parteEntera, parteDecimal);
	}
}