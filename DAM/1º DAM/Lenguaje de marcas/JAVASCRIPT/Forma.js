class Forma {
    tipo = "";
    color = "";

    constructor(tipo, color)
    {
        this.tipo = tipo;
        this.color = color;
    }

    toString()
    {
        return super.toString() + `Tiene un área de 
                ${this.calcularArea()}<br></br>`;
    }

}

class Cuadrado extends Forma {
    lado=0;

    constructor(tipo, color, lado) {
        super(tipo, color);
        this.lado = lado;
    }

    calcularArea() {
        return this.lado*this.lado;
    }
}

class Circulo extends Forma {
    centro=0;
    radio=0;

    constructor(tipo, color, centro, radio) {
        super(tipo, color);
        this.centro = centro;
        this.radio = radio;
    }

    calcularArea() {
        return Math.PI*Math.pow(this.radio,2);
    }
}

class Triangulo extends Forma {
    base=0;
    altura=0;

    constructor(tipo, color, base, altura) {
        super(tipo, color);
        this.base = base;
        this.altura = altura;
    }

    calcularArea() {
        return this.base*this.altura/2;
    }
}