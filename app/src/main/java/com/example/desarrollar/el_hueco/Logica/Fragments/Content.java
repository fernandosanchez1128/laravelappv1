package com.example.desarrollar.el_hueco.Logica.Fragments;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.design.widget.FloatingActionButton;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;


import com.example.desarrollar.el_hueco.Logica.Adapters.AdaptadoresContent.ComplexRecyclerViewAdapter;

import com.example.desarrollar.el_hueco.Modelo.Clases.ClaseImagen;
import com.example.desarrollar.el_hueco.Modelo.Clases.ClaseTexto;
import com.example.desarrollar.el_hueco.R;

import java.util.ArrayList;

/**
 * Created by Desarrollar on 30/01/2017.
 */

public class Content extends Fragment{

    private RecyclerView recycler;
    private RecyclerView.Adapter adapter;
    private RecyclerView.LayoutManager lManager;
    private Bitmap photo;
    private Bitmap photo2;
    private Bitmap photo3;
    private String id = "Texto";
    private FloatingActionButton fab;
    private View view;

    ArrayList<Object> items;


    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable final ViewGroup container, @Nullable Bundle savedInstanceState) {
        view = inflater.inflate(R.layout.content,container,false);

        photo = BitmapFactory.decodeResource(view.getContext().getResources(),R.drawable.unnamed);
        photo2 = BitmapFactory.decodeResource(view.getContext().getResources(),R.drawable.logohueco);
        photo3 = BitmapFactory.decodeResource(view.getContext().getResources(),R.drawable.paisaje);


        // Obtener el Recycler
        recycler = (RecyclerView) view.findViewById(R.id.Recycler_content);
        recycler.setHasFixedSize(true);

        // Usar un administrador para LinearLayout
        lManager = new LinearLayoutManager(this.getContext());
        recycler.setLayoutManager(lManager);

        bindDataToAdapter();

        // Crear un nuevo adaptador
        adapter = new ComplexRecyclerViewAdapter(items);
        recycler.setAdapter(adapter);

        fab = (FloatingActionButton) view.findViewById(R.id.fabinsert);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                adapter.notifyItemInserted(0);

            }
        });

        return view;
    }

    private ArrayList<Object> getSampleArrayList() {
        items = new ArrayList<>();
        items.add(new ClaseTexto("Dany Targaryen"));
        items.add(new ClaseTexto("Rob Stark"));
        items.add(new ClaseImagen(photo));
        items.add(new ClaseTexto("Jon Snow"));
        items.add(new ClaseImagen(photo3));
        items.add(new ClaseTexto("Tyrion Lanister"));
        return items;
    }

    private void bindDataToAdapter() {
        // Bind adapter to recycler view object
        recycler.setAdapter(new ComplexRecyclerViewAdapter(getSampleArrayList()));
    }



    double randomWithRange(double min, double max)
    {
        double range = Math.abs(max - min);
        return (Math.random() * range) + (min <= max ? min : max);
    }

}


