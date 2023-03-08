package com.devcode.moviesdb

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.Menu
import android.view.MenuItem
import android.widget.Toast
import androidx.appcompat.app.ActionBar
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.devcode.moviesdb.DetailMovies.Companion.EXTRA_MOVIES
import com.devcode.moviesdb.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity() {
    private lateinit var rvMovies: RecyclerView
    private val list = ArrayList<Movies>()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
//        supportActionBar!!.displayOptions = ActionBar.DISPLAY_SHOW_CUSTOM
//        supportActionBar!!.setCustomView(R.layout.activity_main)

//        rvMovies = binding.rvListmovie
//        rvMovies.setHasFixedSize(true)

        rvMovies = findViewById(R.id.rv_listmovie)
        rvMovies.setHasFixedSize(true)

        list.addAll(getListMovies())
        showRecyclerList()
    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        menuInflater.inflate(R.menu.menu_about, menu)
        return super.onCreateOptionsMenu(menu)
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        setMode(item.itemId)
        return super.onOptionsItemSelected(item)
    }

    private fun getListMovies(): ArrayList<Movies> {
        val dataName = resources.getStringArray(R.array.data_name)
        val dataDescription = resources.getStringArray(R.array.data_description)
        val dataPhoto = resources.obtainTypedArray(R.array.data_photo)
        val dataDate = resources.getStringArray(R.array.data_date)
        val dataPhotoSampul = resources.obtainTypedArray(R.array.data_photoSampul)
        val listMovie = ArrayList<Movies>()
        for (i in dataName.indices) {
            val movie = Movies(dataName[i], dataDescription[i], dataPhoto.getResourceId(i, -1), dataDate[i], dataPhotoSampul.getResourceId(i, -1),)
            listMovie.add(movie)
        }
        return listMovie
    }

    private fun showRecyclerList() {
        rvMovies.layoutManager = LinearLayoutManager(this)
        val listMovieAdapter = ListMoviesAdapter(list)
        rvMovies.adapter = listMovieAdapter
//        val listHeroAdapter = ListHeroAdapter(list) {hero ->
//            showSelectedHero(hero)
//        }
        listMovieAdapter.setOnItemClickCallback(object : ListMoviesAdapter.OnItemClickCallback {
            override fun onItemClicked(data: Movies) {
                showSelectedMovie(data)
            }
        })
    }

    private fun showSelectedMovie(movie: Movies) {
        val intentToDetail = Intent(this@MainActivity, DetailMovies::class.java)
        intentToDetail.putExtra(EXTRA_MOVIES, movie)
        startActivity(intentToDetail)
//        Toast.makeText(this, "Kamu memilih " + hero.name, Toast.LENGTH_SHORT).show()
    }

    private fun setMode(selectedMode: Int) {
        when (selectedMode) {
            R.id.aboutMe -> {
                val pindahIntent = Intent(this@MainActivity, About::class.java)
                startActivity(pindahIntent)
            }
        }
    }
}