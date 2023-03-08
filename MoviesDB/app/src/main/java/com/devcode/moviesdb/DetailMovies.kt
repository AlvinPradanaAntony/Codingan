package com.devcode.moviesdb

import android.content.Intent
import android.os.Build
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ImageButton
import android.widget.ImageView
import android.widget.TextView
import android.widget.Toast
import com.bumptech.glide.Glide
import com.bumptech.glide.request.RequestOptions
import com.google.android.material.appbar.CollapsingToolbarLayout


class DetailMovies : AppCompatActivity() {
    lateinit var toolbar:androidx.appcompat.widget.Toolbar
    lateinit var collapsingToolbarLayout: CollapsingToolbarLayout
    private lateinit var judul: TextView
    private lateinit var deskripsi: TextView
    private lateinit var photo: ImageView
    private lateinit var date: TextView
    private lateinit var sampul: ImageView

    private lateinit var button: ImageButton

    companion object {
        const val EXTRA_MOVIES = "extra_movies"
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail_movies)

        button = findViewById(R.id.action_share)


        button.setOnClickListener{
            var url = "https://www.youtube.com/watch?v=jTGwgkd_YCg"
            val shareIntent = Intent(Intent.ACTION_SEND)
            shareIntent.type = "text/plain"
            shareIntent.putExtra(Intent.EXTRA_TEXT, url)
            startActivity(Intent.createChooser(shareIntent, "Share using..."))
        }
//        val actionbar = supportActionBar
//        actionbar!!.title = "Detail Movie"
//        actionbar.setDisplayHomeAsUpEnabled(true)
//        val data = intent.getParcelableExtra<Movies>("DATA")
//       println(data)
//        Log.d("Detail Data", data?.name.toString())

        judul = findViewById(R.id.titleMovie)
        deskripsi = findViewById(R.id.deskripsi)
        photo = findViewById(R.id.cover_mvs)
        sampul = findViewById(R.id.sampul_cover)
        date = findViewById(R.id.realeseDate)
        toolbar=findViewById(R.id.toolbarId)

        setSupportActionBar(toolbar)
        supportActionBar?.setDisplayHomeAsUpEnabled(true)
        collapsingToolbarLayout=findViewById(R.id.collapsingLayoutId)

        val mov = if (Build.VERSION.SDK_INT >= 33) {
            intent.getParcelableExtra(EXTRA_MOVIES, Movies::class.java)
        } else {
            @Suppress("DEPRECATION")
            intent.getParcelableExtra(EXTRA_MOVIES)
        }
        if (mov != null) {
            collapsingToolbarLayout.title= mov.name
            judul.text = mov.name
            deskripsi.text = mov.description
            Glide.with(this)
                .load(mov.photo)
                .apply(RequestOptions())
                .into(photo)
            Glide.with(this)
                .load(mov.photosampul)
                .apply(RequestOptions())
                .into(sampul)
            date.text = mov.releaseDate
        } else {
            Toast.makeText(this, "Data Tidak Masuk", Toast.LENGTH_SHORT).show()
        }
    }


    override fun onSupportNavigateUp(): Boolean {
        finish()
        return true
    }
}