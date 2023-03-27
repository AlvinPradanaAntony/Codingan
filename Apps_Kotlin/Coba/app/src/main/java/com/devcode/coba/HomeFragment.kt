package com.devcode.coba

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.devcode.coba.databinding.FragmentHomeBinding


class HomeFragment : Fragment() {
    private var _binding: FragmentHomeBinding? = null
    private val binding get() = _binding!!

    private lateinit var rvMovies: RecyclerView
    private val list = ArrayList<Movies>()

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        _binding = FragmentHomeBinding.inflate(inflater, container, false)
        return binding.root
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)

        rvMovies = binding.recyclerView
        rvMovies.setHasFixedSize(true)
        list.addAll(getListMovies())
        showRecyclerList()
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
        rvMovies.layoutManager = LinearLayoutManager(requireContext())
        val listMovieAdapter = ListMoviesAdapter(list)
        rvMovies.adapter = listMovieAdapter
//        val listHeroAdapter = ListHeroAdapter(list) {hero ->
//            showSelectedHero(hero)
//        }
        listMovieAdapter.setOnItemClickCallback(object : ListMoviesAdapter.OnItemClickCallback {
            override fun onItemClicked(data: Movies) {
                Toast.makeText(requireContext(), "Kamu memilih " + data.name, Toast.LENGTH_SHORT).show()
            }
        })
    }
}