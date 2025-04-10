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
public class Almacen {
    private String marca,talla,tipo,cantidad;

    public Almacen(String marca, String talla, String tipo,String cantidad) {
        this.marca = marca;
        this.talla = talla;
        this.tipo = tipo;
        this.cantidad=cantidad;
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

    public String getCantidad() {
        return cantidad;
    }

    
}
