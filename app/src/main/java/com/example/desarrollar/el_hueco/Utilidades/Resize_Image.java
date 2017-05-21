package com.example.desarrollar.el_hueco.Utilidades;

import android.app.Activity;
import android.content.Context;
import android.net.Uri;
import android.view.View;
import android.widget.ImageView;

import com.squareup.picasso.Picasso;

/**
 * Created by Desarrollar on 01/02/2017.
 */

public class Resize_Image {


    public static void rezise(Context context,ImageView imageView, String url){

        /*Picasso.with(activity)
                .load(path)
                .resize(view.getWidth(),view.getHeight())
                .into((ImageView) view);*/


        Picasso.with(context)
                .load(url)
                .resize(50, 50)
                .centerCrop()
                .into(imageView);

    }


   // BitmapResize.rezise(photo,this,path);
}
