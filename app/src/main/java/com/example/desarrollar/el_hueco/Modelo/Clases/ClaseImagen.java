package com.example.desarrollar.el_hueco.Modelo.Clases;


import android.graphics.Bitmap;
import android.provider.ContactsContract;

/**
 * Created by Desarrollar on 01/02/2017.
 */

public class ClaseImagen {


    Bitmap Imagen;
    private String Texto;

    public ClaseImagen(String texto) {
        Texto = texto;
    }

    public ClaseImagen(Bitmap Imagen){
        this.Imagen = Imagen;
    }

    public String getTexto() {
        return Texto;
    }

    public void setTexto(String texto) {
        Texto = texto;
    }

    public void setImagen(Bitmap Imagen){
        this.Imagen = Imagen;
    }

    public  Bitmap getImagen(){
        return Imagen;
    }

}
