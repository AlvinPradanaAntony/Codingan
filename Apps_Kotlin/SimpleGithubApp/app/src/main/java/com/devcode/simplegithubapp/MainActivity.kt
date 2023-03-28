package com.devcode.simplegithubapp

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.View
import android.widget.Toast
import androidx.recyclerview.widget.LinearLayoutManager
import com.devcode.simplegithubapp.databinding.ActivityMainBinding
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MainActivity : AppCompatActivity() {
    private lateinit var binding: ActivityMainBinding
    /*private val list = ArrayList<ListUsersResponseItem>()*/
    companion object {
        private const val TAG = "MainActivity"
    }
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        val layoutManager = LinearLayoutManager(this)
        binding.recyclerView.layoutManager = layoutManager
        binding.recyclerView.setHasFixedSize(true)

        showRecycleView()
    }

    private fun showRecycleView(){
        showLoading(true)
        val client = ApiConfig.getApiService().getUsers()
        client.enqueue(object: Callback<ArrayList<ListUsersResponseItem>>{
            override fun onResponse(
                call: Call<ArrayList<ListUsersResponseItem>>,
                response: Response<ArrayList<ListUsersResponseItem>>
            ) {
                showLoading(false)
                if (response.isSuccessful) {
                    val responseBody = response.body()
                    if (responseBody != null) {
                        getListUsers(responseBody)
                    }
                } else {
                    Log.e(TAG, "onFailure: ${response.message()}")
                }
            }

            override fun onFailure(call: Call<ArrayList<ListUsersResponseItem>>, t: Throwable) {
                showLoading(true)
                Log.e(TAG, "onFailure: ${t.message}")
            }

        })
    }

    private fun getListUsers(ListUsersResponse: ArrayList<ListUsersResponseItem>){
        val listUsers = ArrayList<ListUsersResponseItem>()
        listUsers.addAll(ListUsersResponse)
        val adapter = RecyclerViewAdapter(listUsers)
        binding.recyclerView.adapter = adapter
    }

    private fun showLoading(isLoading: Boolean) {
        if (isLoading) {
            binding.progressBar.visibility = View.VISIBLE
        } else {
            binding.progressBar.visibility = View.GONE
        }
    }
}