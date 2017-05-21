package com.example.desarrollar.el_hueco.Logica.Adapters;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;

import com.example.desarrollar.el_hueco.HuecoActivity;

import java.util.List;

/**
 * Created by Desarrollar on 30/01/2017.
 */

public class ViewPagerAdapter extends FragmentPagerAdapter {

    private List<Fragment> fragmentList;
    private HuecoActivity HA = new HuecoActivity();

    public ViewPagerAdapter(FragmentManager fm, List<Fragment>fragmentList) {
        super(fm);
        this.fragmentList = fragmentList;
    }

    @Override
    public Fragment getItem(int position) {
        return fragmentList.get(position);
    }

    @Override
    public int getCount() {
        return fragmentList.size();
    }
}
