package formulario;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author 57304
 */
public class Ventas {
    private String nombre, cc, marca,talla,tipo,precio,cambio,Fecha;

    public Ventas(String nombre, String cc, String marca, String talla, String tipo, String precio, String cambio, String Fecha) {
        this.nombre = nombre;
        this.cc = cc;
        this.marca = marca;
        this.talla = talla;
        this.tipo = tipo;
        this.precio = precio;
        this.cambio = cambio;
        this.Fecha = Fecha;
    }

    public String getNombre() {
        return nombre;
    }

    public String getCc() {
        return cc;
    }

    public String getMarca() {
        return marca;
    }

    public String getTalla() {
        return talla;
    }

    public String getTipo() {
        return tipo;
    }

    public String getPrecio() {
        return precio;
    }

    public String getCambio() {
        return cambio;
    }

    public String getFecha() {
        return Fecha;
    }

    @Override
    public String toString() {
        return "RECIBO" + "\nNombre=" + nombre + "\nCC=" + cc + "\nMarca=" + marca + "\nTalla=" + talla + 
                "\nTipo de producto="+ tipo +"\nPrecio=" + precio + "\nCambio=" + cambio+
                "\nFecha="+Fecha;
    }

    
    
}
