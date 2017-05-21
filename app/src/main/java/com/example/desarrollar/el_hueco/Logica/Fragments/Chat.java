package com.example.desarrollar.el_hueco.Logica.Fragments;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import com.example.desarrollar.el_hueco.R;

import hani.momanii.supernova_emoji_library.Actions.EmojIconActions;
import hani.momanii.supernova_emoji_library.Helper.EmojiconEditText;
import hani.momanii.supernova_emoji_library.Helper.EmojiconTextView;

/**
 * Created by Desarrollar on 30/01/2017.
 */

public class Chat extends Fragment {

    /*CheckBox mCheckBox;*/
    EmojiconEditText emojiconEditText;
    EmojiconTextView textView;
    ImageView emojiButton;
    ImageView submitButton;
    View rootView;
    EmojIconActions emojIcon;
    int SmileyIcons= R.drawable.beer;
    int KeyBoardIcon= hani.momanii.supernova_emoji_library.R.drawable.ic_action_keyboard;


    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.chat,container,false);

        rootView = (View) view.findViewById(R.id.root_view);
        emojiButton = (ImageView) view.findViewById(R.id.emoji_btn);
        //emojiButton.setBackgroundResource(R.drawable.beer);
        submitButton = (ImageView) view.findViewById(R.id.submit_btn);
        /*mCheckBox = (CheckBox) view.findViewById(R.id.use_system_default);*/
        emojiconEditText = (EmojiconEditText) view.findViewById(R.id.emojicon_edit_text);
        textView = (EmojiconTextView) view.findViewById(R.id.textView);
        emojIcon = new EmojIconActions(this.getContext(),rootView,emojiconEditText,emojiButton);
        emojIcon.ShowEmojIcon();
        emojIcon.setIconsIds(KeyBoardIcon,SmileyIcons);
        emojIcon.setKeyboardListener(new EmojIconActions.KeyboardListener() {

            @Override
            public void onKeyboardOpen() {
                Log.e("Keyboard","open");
            }

            @Override
            public void onKeyboardClose() {
                Log.e("Keyboard","close");
            }
        });

       /* mCheckBox.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {
                emojIcon.setUseSystemEmoji(b);
                textView.setUseSystemDefault(b);
            }
        });*/


        submitButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String newText = emojiconEditText.getText().toString();
                textView.setText(newText);
                emojiconEditText.setText("");

            }
        });
        return view;
    }
}
