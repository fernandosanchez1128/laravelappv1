package com.example.desarrollar.el_hueco.Logica.Adapters.AdaptadoresContent;

import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.desarrollar.el_hueco.Modelo.Clases.ClaseImagen;
import com.example.desarrollar.el_hueco.Modelo.Clases.ClaseTexto;
import com.example.desarrollar.el_hueco.R;

import java.util.List;

/**
 * Created by Desarrollar on 23/02/2017.
 */

public class ComplexRecyclerViewAdapter extends RecyclerView.Adapter<RecyclerView.ViewHolder> {



    class ViewHolderImage extends RecyclerView.ViewHolder{

        //cardView imagen
        public CardView Card;
        public ImageView Imagen_Principal;
        public ImageView Me_gusta;
        public ImageView Comentar;
        public ImageView Compartir;

        public ViewHolderImage(View itemView){
            super(itemView);
            Card = (CardView) itemView.findViewById(R.id.cardview_Image);
            Imagen_Principal = (ImageView) itemView.findViewById(R.id.ImageContent);
            Me_gusta = (ImageView) itemView.findViewById(R.id.MeGusta);
            Comentar = (ImageView) itemView.findViewById(R.id.Comentar);
            Compartir = (ImageView) itemView.findViewById(R.id.Compartir);
        }

    }

    class ViewHolderText extends RecyclerView.ViewHolder{

        //cardView imagen
        public CardView Card;
        public TextView Texto;
        public ImageView Me_gusta;
        public ImageView Comentar;
        public ImageView Compartir;

        public ViewHolderText(View itemView){
            super(itemView);
            Card = (CardView) itemView.findViewById(R.id.cardview_Image);
            Texto = (TextView) itemView.findViewById(R.id.TextContent);
            Me_gusta = (ImageView) itemView.findViewById(R.id.MeGusta);
            Comentar = (ImageView) itemView.findViewById(R.id.Comentar);
            Compartir = (ImageView) itemView.findViewById(R.id.Compartir);
        }

    }


    // The items to display in your RecyclerView
    private List<Object> items;

    private final int USER = 0, IMAGE = 1;

    // Provide a suitable constructor (depends on the kind of dataset)
    public ComplexRecyclerViewAdapter(List<Object> items) {
        this.items = items;
    }

    // Return the size of your dataset (invoked by the layout manager)
    @Override
    public int getItemCount() {
        return this.items.size();
    }

    @Override
    public int getItemViewType(int position) {
        if (items.get(position) instanceof ClaseTexto) {
            return USER;
        } else if (items.get(position) instanceof ClaseImagen) {
            return IMAGE;
        }
        return -1;
    }

    @Override
    public RecyclerView.ViewHolder onCreateViewHolder(ViewGroup viewGroup, int viewType) {
        RecyclerView.ViewHolder viewHolder;
        LayoutInflater inflater = LayoutInflater.from(viewGroup.getContext());

        switch (viewType) {
            case USER:
                View v1 = inflater.inflate(R.layout.cardviewtexto, viewGroup, false);
                viewHolder = new ViewHolderText(v1);
                break;
            case IMAGE:
                View v2 = inflater.inflate(R.layout.cardviewimage, viewGroup, false);
                viewHolder = new ViewHolderImage(v2);
                break;
           default:
               View v = inflater.inflate(R.layout.cardviewtexto, viewGroup, false);
               viewHolder = new ViewHolderText(v);
                break;
        }
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(RecyclerView.ViewHolder viewHolder, int position) {
        switch (viewHolder.getItemViewType()) {
            case USER:
                ViewHolderText vh1 = (ViewHolderText) viewHolder;
                configureViewHolderText(vh1, position);
                break;
            case IMAGE:
                ViewHolderImage vh2 = (ViewHolderImage) viewHolder;
                configureViewHolderImage(vh2, position);
                break;
            default:
                ViewHolderText vh = (ViewHolderText) viewHolder;
                configureDefaultViewHolder(vh, position);
                break;
        }
    }

    private void configureDefaultViewHolder(ViewHolderText vh, int position) {
        ClaseTexto user = (ClaseTexto) items.get(position);
        if (user != null) {
            vh.Texto.setText(user.getTexto());
        }
    }

    private void configureViewHolderText(ViewHolderText vh1, int position) {
        ClaseTexto user = (ClaseTexto) items.get(position);
        if (user != null) {
            vh1.Texto.setText(user.getTexto());
        }
    }

    private void configureViewHolderImage(ViewHolderImage vh2, int position) {
        ClaseImagen user = (ClaseImagen) items.get(position);
        if (user != null) {
            vh2.Imagen_Principal.setImageBitmap(user.getImagen());
        }
    }


}