package com.example.desarrollar.el_hueco.Logica.Fragments;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.desarrollar.el_hueco.R;

/**
 * Created by Desarrollar on 30/01/2017.
 */

public class Acerca_de extends Fragment {

    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.acerca_de,container,false);

        return view;
    }
}
