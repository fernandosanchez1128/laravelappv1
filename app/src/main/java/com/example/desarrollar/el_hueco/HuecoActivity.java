package com.example.desarrollar.el_hueco;

import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.v4.app.Fragment;
import android.support.v4.view.ViewPager;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;

import com.example.desarrollar.el_hueco.Logica.Adapters.ViewPagerAdapter;
import com.example.desarrollar.el_hueco.Logica.Fragments.Acerca_de;
import com.example.desarrollar.el_hueco.Logica.Fragments.Chat;
import com.example.desarrollar.el_hueco.Logica.Fragments.Content;

import java.util.ArrayList;
import java.util.List;

public class HuecoActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener, View.OnClickListener {

    ViewPager VPM;
    FloatingActionButton Insert,quit;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hueco);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
            this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        //////////////////////////////////////////
        VPM = (ViewPager) findViewById(R.id.ViewP);
        viewPager(VPM);
        //////////////////////////////////////////
       /* Insert = (FloatingActionButton) findViewById(R.id.fabinsert);
        Insert.setOnClickListener(this);
        quit = (FloatingActionButton) findViewById(R.id.fabquit);
        quit.setOnClickListener(this);*/
    }

    @Override
    public void onClick(View v) {
       /* switch (v.getId()){
            case R.id.fabinsert:
               // Content fragment = (Content) getFragmentManager().findFragmentById(R.id.Content);

                break;
            case R.id.fabquit:
               // Toast.makeText(this,"fabquit",Toast.LENGTH_SHORT).show();
                break;
        } */
    }


    public void viewPager(ViewPager mViewPager){

        List<Fragment> fragmentList = new ArrayList<Fragment>();

        fragmentList.add(new Content());
        fragmentList.add(new Chat());
        fragmentList.add(new Acerca_de());
        ViewPagerAdapter fragmentPageAdapter = new ViewPagerAdapter(getSupportFragmentManager(), fragmentList);
        mViewPager.setAdapter(fragmentPageAdapter);
        mViewPager.setCurrentItem(0);
    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.hueco, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.contenido) {
            VPM.setCurrentItem(0);
        } else if (id == R.id.chat) {
            VPM.setCurrentItem(1);
        } else if (id == R.id.acerca_de) {
            VPM.setCurrentItem(2);
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }


}
