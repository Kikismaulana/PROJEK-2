package com.example.noufalibrahim.m_afi;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.TextView;

import org.w3c.dom.Text;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Locale;


public class IzinSiswa extends AppCompatActivity {


    private DatePickerDialog datePickerDialog;
    private SimpleDateFormat dateFormatter;
    private TextView tvDateResult;
    private Button btDatePicker;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_izin_siswa);


        // DatePicker
        dateFormatter = new SimpleDateFormat("dd-MM-yyyy", Locale.US);

        tvDateResult = (TextView) findViewById(R.id.tvTglMulai);
        tvDateResult = (TextView) findViewById(R.id.tvTglBerakhir);
        btDatePicker = (Button) findViewById(R.id.btnTglMulai);
        btDatePicker = (Button) findViewById(R.id.btnTglBerakhir);
        btDatePicker.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                showDateDialog();
            }
        });

        // BUTTON CANCEL
        Button btnBack = (Button) findViewById(R.id.btnCancelIzinSiswa);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(IzinSiswa.this, MainActivity.class));
                finish();
            }
        });
    }


    //DatePicker
        private void showDateDialog(){
        /**
         * Calendar untuk mendapatkan tanggal sekarang
         */
            Calendar newCalendar = Calendar.getInstance();

        /**
         * Initiate DatePicker dialog
         */
        datePickerDialog = new DatePickerDialog(this, new DatePickerDialog.OnDateSetListener(){

            @Override
            public void onDateSet (DatePicker view, int year, int monthOfYear, int dayOfMonth){
                Calendar newDate = Calendar.getInstance();
                newDate.set(year, monthOfYear, dayOfMonth);

                tvDateResult.setText("Tanggal Mulai : "+dateFormatter.format(newDate.getTime()));

            }
        }, newCalendar.get(Calendar.YEAR), newCalendar.get(Calendar.MONTH),
                newCalendar.get(Calendar.DAY_OF_MONTH));
        /**
         * Tampilkan DatePicker dialog
         */
        datePickerDialog.show();


    }



    }

