package com.example.noufalibrahim.m_afi;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

/**
 * Created by Noufal Ibrahim on 3/23/2018.
 */

public class lupa_password extends AppCompatActivity {
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.lupa_password);

        Button button = findViewById(R.id.btnCancelLupaPassword);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(lupa_password.this, login.class));
                finish();
            }
        });
    }
}
