package com.devcode.simplegithubapp

import android.app.SearchManager
import android.content.Context
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.View
import android.widget.Toast
import androidx.appcompat.widget.SearchView
import androidx.recyclerview.widget.LinearLayoutManager
import com.devcode.simplegithubapp.databinding.ActivityMainBinding
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MainActivity : AppCompatActivity() {
    private lateinit var binding: ActivityMainBinding
    private val list = ArrayList<UsersResponsesItem>()

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

        val searchManager = getSystemService(Context.SEARCH_SERVICE) as SearchManager
        binding.searchUsers.setSearchableInfo(searchManager.getSearchableInfo(componentName))
        binding.searchUsers.queryHint = "Search User"
        binding.searchUsers.setOnQueryTextListener(object : SearchView.OnQueryTextListener {
            override fun onQueryTextSubmit(query: String): Boolean {
                searchUser(query)
                return true
            }
            override fun onQueryTextChange(newText: String?): Boolean {
                return false
            }
        })

        ListDataUsers()
    }

    private fun ListDataUsers() {
        showLoading(true)
        val client = ApiConfig.getApiService().getUsers()
        client.enqueue(object : Callback<ArrayList<UsersResponsesItem>> {
            override fun onResponse(
                call: Call<ArrayList<UsersResponsesItem>>,
                response: Response<ArrayList<UsersResponsesItem>>
            ) {
                showLoading(false)
                if (response.isSuccessful) {
                    val responseBody = response.body()
                    if (responseBody != null) {
                        /*getListUsers(responseBody)*/
                        list.addAll(responseBody)
                        val adapter = ListUsersAdapter(list)
                        binding.recyclerView.adapter = adapter
                        adapter.setOnItemClickCallback(object :
                            ListUsersAdapter.OnItemClickCallback {
                            override fun onItemClicked(data: UsersResponsesItem) {
                                showSelectedData(data)
                            }
                        })
                    }
                } else {
                    Log.e(TAG, "onFailure: ${response.message()}")
                }
            }

            override fun onFailure(call: Call<ArrayList<UsersResponsesItem>>, t: Throwable) {
                showLoading(true)
                Log.e(TAG, "onFailure: ${t.message}")
            }
        })
    }

    private fun searchUser(query: String) {
        showLoading(true)
        val client = ApiConfig.getApiService().getListUsers(query)
        client.enqueue(object : Callback<GithubResponses> {
            override fun onResponse(
                call: Call<GithubResponses>,
                response: Response<GithubResponses>
            ) {
                showLoading(false)
                if (response.isSuccessful) {
                    val responseBody = response.body()?.items
                    if (responseBody != null) {
                        list.clear()
                        list.addAll(responseBody)
                        val adapter = ListUsersAdapter(list)
                        binding.recyclerView.adapter = adapter
                        adapter.setOnItemClickCallback(object :
                            ListUsersAdapter.OnItemClickCallback {
                            override fun onItemClicked(data: UsersResponsesItem) {
                                showSelectedData(data)
                            }
                        })
                    }
                } else {
                    Log.e(TAG, "onFailure: ${response.message()}")
                }
            }

            override fun onFailure(call: Call<GithubResponses>, t: Throwable) {
                showLoading(true)
                Log.e(TAG, "onFailure: ${t.message}")
            }
        })
    }

    private fun showSelectedData(data: UsersResponsesItem) {
        val intent = Intent(this@MainActivity, DetailActivity::class.java)
        intent.putExtra(DetailActivity.EXTRA_STATE, data.login)
        startActivity(intent)
    }

    private fun showLoading(isLoading: Boolean) {
        if (isLoading) {
            binding.progressBar.visibility = View.VISIBLE
        } else {
            binding.progressBar.visibility = View.GONE
        }
    }
}