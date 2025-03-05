/**
 * Clase que representa un producto en una tienda.
 */
class Producto {
    /**
     * Crea un producto.
     * @param {string} nombre - El nombre del producto.
     * @param {number} precio - El precio del producto.
     * @param {string} categoria - La categoría del producto.
     */
    constructor(nombre, precio, categoria) {
        this.nombre = nombre;
        this.precio = precio;
        this.categoria = categoria;
    }

    /**
     * Obtiene la información del producto.
     * @returns {string} Información detallada del producto.
     */
    obtenerInformacion() {
        return `Producto: ${this.nombre}, Precio: ${this.precio}€, Categoría: ${this.categoria}`;
    }
}

/**
 * Clase que representa una tienda.
 */
class Tienda {
    /**
     * Crea una tienda.
     * @param {string} nombre - El nombre de la tienda.
     */
    constructor(nombre) {
        this.nombre = nombre;
        this.productos = [];
    }

    /**
     * Agrega un producto a la tienda.
     * @param {Producto} producto - El producto a agregar.
     */
    agregarProducto(producto) {
        this.productos.push(producto);
    }

    /**
     * Elimina un producto de la tienda por su nombre.
     * @param {string} nombre - El nombre del producto a eliminar.
     */
    eliminarProducto(nombre) {
        this.productos = this.productos.filter(producto => producto.nombre !== nombre);
    }

    /**
     * Lista todos los productos disponibles en la tienda.
     * @returns {string[]} Lista de información de productos.
     */
    listarProductos() {
        return this.productos.map(producto => producto.obtenerInformacion());
    }

    /**
     * Busca un producto en la tienda por su nombre.
     * @param {string} nombre - El nombre del producto a buscar.
     * @returns {Producto|null} El producto encontrado o null si no existe.
     */
    buscarProducto(nombre) {
        return this.productos.find(producto => producto.nombre === nombre) || null;
    }
}